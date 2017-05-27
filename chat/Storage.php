<?php
/**
 * Created by PhpStorm.
 * User: sion
 * Date: 27.05.2017
 * Time: 11:49
 */

namespace Chat;


class Storage {
	protected $user_data = [];
	protected $limit;
	protected $user_count = 0;
	public function __construct($limit = 50) {
		$this->limit = $limit;
	}
	public function addUser(User $user) {
		$this->user_data[$user->getID()] = $user;
		$this->user_count++;
	}
	public function getUsers() {
		return $this->user_data;
	}
	public function getUsersCount() {
		return $this->user_count;
	}
	public function getUser($user_id) {
		if (isset($this->user_data[$user_id])) {
			return $this->user_data[$user_id];
		} else {
			return null;
		}
	}
	public function isUserExists($user_id) {
		return isset($this->user_data[$user_id]);
	}
	/**
	 * @param Message $message
	 * @method if count of array is bigger then limit - delete first message, insert new one
	 */
	public function addMessage(Message $message) {
		$this->user_data[$message->getAuthorID()]->addMessage($message);
	}
	public function getMessages($user_id = false) {
		if (!$user_id) {
			return $this->message_data;
		} else {
			if (!empty($this->message_data[$user_id])) {
				return $this->message_data[$user_id];
			} else {
				return [];
			}
		}
	}
}