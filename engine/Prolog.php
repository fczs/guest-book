<?php

session_start();

require_once('config.php');
require_once(LANG_DIR . '/' . LANG . '.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/MessagesOutput.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Users.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/MessagesManagement.php");

$messages = new MessagesOutput();
$users = new Users();
$management = new MessagesManagement();