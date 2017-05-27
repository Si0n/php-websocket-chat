<?php
/**
 * Created by PhpStorm.
 * User: sion
 * Date: 27.05.2017
 * Time: 11:57
 */

namespace Chat;


class Message {
	public $date;
	public $author_id;
	public $message;
	public $type;
	public function __construct(array $socket_message) {
		var_dump($socket_message);
		$this->date = (new \DateTime())->format("Y-m-d H:i:s");
		$this->author_id = $socket_message['id'] ?? '';
		$this->message = $socket_message['message'] ?? '';
		$this->type = $socket_message['type'] ?? '';
	}
	public function __toString():string {
		return json_encode((array)$this);
	}
	public function getAuthorID() {
		return $this->author_id;
	}
}