<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php");

$error = [];
$email = $_POST["email"];
$messageTitle = $_POST["messageTitle"];
$messageText = $_POST["messageText"];

!empty($messageTitle) or $error["messageTitle"] = EMPTY_FIELD;
!empty($messageText) or $error["messageText"] = EMPTY_FIELD;

if (count($error) <= 0) {
    $newMessage = $management->addMessage($users->getUserID($email), $messageTitle, $messageText);
    if ($newMessage) {
        $error["no_error"] = 1;
    } else {
        $error["messageTitle"] = UNKNOWN_ERROR;
    }    
}

echo (json_encode($error));