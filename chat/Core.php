<?php
/**
 * Created by PhpStorm.
 * User: sion
 * Date: 27.05.2017
 * Time: 12:17
 */

namespace Chat;

use Chat\Storage;
use Chat\Message;

class Core {
	public $clients = [];
	public $socket;
	public $host;
	public $changed;
	public $port;
	public $null = null;
	public $storage;

	public function __construct($host, $port) {
		$this->host = $host;
		$this->port = $port;
		$this->storage = new Storage(100);
	}

	public function startSocket(): Core {
		//Create TCP/IP sream socket
		$this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
		//reuseable port
		socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, 1);

		//bind socket to specified host
		socket_bind($this->socket, 0, $this->port);

		//listen to port
		socket_listen($this->socket);

		//create & add listning socket to the list
		$this->clients = array($this->socket);
		return $this;
	}

	public function listenSocket() {
		while (true) {
			//manage multipal connections
			$this->changed = $this->clients;
			//returns the socket resources in $changed array
			socket_select($this->changed, $this->null, $this->null, 0, 10);

			//check for new socket
			if (in_array($this->socket, $this->changed)) {
				$socket_new = socket_accept($this->socket); //accpet new socket
				$this->clients[] = $socket_new; //add socket to client array

				$header = socket_read($socket_new, 1024); //read data sent by the socket
				$headers = $this->getHeaders($header);
				$user_id = $this->getValueFromCookie($headers, 'id');

				if (!$this->storage->isUserExists($user_id)) {
					$id = ($this->storage->getUsersCount() + 1);
					$user = new User("User #{$id}");
					$this->storage->addUser($user);
				} else {
					$user = $this->storage->getUser($user_id);
				}

				$this->perform_handshaking($headers, $socket_new, $user->getID()); //perform websocket handshake
				socket_getpeername($socket_new, $ip); //get ip address of connected socket
				$response = $this->mask(json_encode(array('type' => 'system', 'id' => $user->getID(), 'class' => 'system-message', 'message' => $ip . ' connected'))); //prepare json data
				$this->send_message($response); //notify all users about new connection

				//make room for new socket
				$found_socket = array_search($this->socket, $this->changed);
				unset($this->changed[$found_socket]);
			}

			//loop through all connected sockets
			foreach ($this->changed as $changed_socket) {
				//check for any incomming data
				while (socket_recv($changed_socket, $buf, 1024, 0) >= 1) {
					$received_text = $this->unmask($buf); //unmask data
					if (!is_null($received_text) && !empty($message = json_decode($received_text, true))) {
						$message = new Message($message);
						var_dump($message);
						$this->storage->addMessage($message);
						$this->send_message($this->mask($message)); //send data
					}
					break 2; //exist this loop
				}

				$buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
				if ($buf === false) { // check disconnected client
					// remove client for $clients array
					$found_socket = array_search($changed_socket, $this->clients);
					socket_getpeername($changed_socket, $ip);
					unset($this->clients[$found_socket]);

					//notify all users about disconnected connection
					$response = $this->mask(json_encode(array('type' => 'system', 'message' => $ip . ' disconnected')));
					$this->send_message($response);
				}
			}
		}
		// close the listening socket
		socket_close($this->socket);
	}
	public function getValueFromCookie($headers, $key) {
		if (!empty($headers['Cookie'])) {
			$cookies = array_reduce(explode(";",$headers['Cookie']), function($carry, $item) {
				if (!$carry) $carry = [];
				list($key, $value) = explode("=", $item);
				$carry[$key] = $value;
				return $carry;
			});
			return $cookies[$key];
		}
		return null;
	}
	public function send_message($msg) {
		foreach ($this->clients as $changed_socket) {
			@socket_write($changed_socket, $msg, strlen($msg));
		}
		return true;
	}


	//Unmask incoming framed message
	public function unmask($text) {
		$length = ord($text[1]) & 127;
		if ($length == 126) {
			$masks = substr($text, 4, 4);
			$data = substr($text, 8);
		} elseif ($length == 127) {
			$masks = substr($text, 10, 4);
			$data = substr($text, 14);
		} else {
			$masks = substr($text, 2, 4);
			$data = substr($text, 6);
		}
		$text = "";
		for ($i = 0; $i < strlen($data); ++$i) {
			$text .= $data[$i] ^ $masks[$i % 4];
		}
		return $text;
	}

	//Encode message for transfer to client.
	public function mask($text) {
		$b1 = 0x80 | (0x1 & 0x0f);
		$length = strlen($text);

		if ($length <= 125)
			$header = pack('CC', $b1, $length);
		elseif ($length > 125 && $length < 65536)
			$header = pack('CCn', $b1, 126, $length);
		elseif ($length >= 65536)
			$header = pack('CCNN', $b1, 127, $length);
		return $header . $text;
	}
	public function getHeaders($received_header) {
		$headers = array();
		$lines = preg_split("/\r\n/", $received_header);
		foreach ($lines as $line) {
			$line = chop($line);
			if (preg_match('/\A(\S+): (.*)\z/', $line, $matches)) {
				$headers[$matches[1]] = $matches[2];
			}
		}
		return $headers;
	}
	//handshake new client.
	public function perform_handshaking($headers, $client_conn, $id) {
		$secKey = $headers['Sec-WebSocket-Key'];
		$secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
		//hand shaking header
		$upgrade = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
			"Upgrade: websocket\r\n" .
			"Connection: Upgrade\r\n" .
			"WebSocket-Origin: $this->host\r\n" .
			"WebSocket-User: $id\r\n" .
			"Set-Cookie: id=$id\r\n" .
			"WebSocket-Location: ws://$this->host:$this->port/chat.php\r\n" .
			"Sec-WebSocket-Accept:$secAccept\r\n\r\n";
		socket_write($client_conn, $upgrade, strlen($upgrade));
	}


}