<?php
/**
 * Created by PhpStorm.
 * User: sion
 * Date: 27.05.2017
 * Time: 12:45
 */

namespace Chat;


class User {
	public $date_login;
	public $nickname;
	public $messages_count;
	public $messages_storage = [];
	public $id;
	public function __construct($nickname) {
		$this->date_login = (new \DateTime())->format("Y-m-d H:i:s");
		$this->nickname = $nickname;
	}
	public function getID() {
		if (empty($this->id)) {
			$this->id =  md5(md5($this->date_login) . $this->nickname . $this->id);
		}
		return $this->id;
	}
	public function addMessage(Message $message) {
		$this->messages_storage[] = $message;
		$this->messages_count ++;
	}
}