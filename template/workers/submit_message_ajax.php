<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php");

$error = [];
$email = $_POST["email"];
$messageTitle = htmlspecialchars($_POST["messageTitle"], ENT_QUOTES);
$messageText = htmlspecialchars($_POST["messageText"], ENT_QUOTES);

!empty($messageTitle) or $error["messageTitle"] = $LANG["EMPTY_FIELD"];
!empty($messageText) or $error["messageText"] = $LANG["EMPTY_FIELD"];

if (count($error) <= 0) {
    $newMessage = $management->addMessage($users->getUserID($email), $messageTitle, $messageText);
    if ($newMessage) {
        $error["no_error"] = 1;
    } else {
        $error["messageTitle"] = $LANG["UNKNOWN_ERROR"];
    }    
}

echo (json_encode($error));