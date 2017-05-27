<?php
define("DIR_PATH", "/var/www/chat.home/");
require_once DIR_PATH . 'vendor/autoload.php';
use Chat\Core;
$chat = new Core('chat.home', '9000');
$chat->startSocket()->listenSocket();
