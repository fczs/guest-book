<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php");

$error = [];
$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    $error["email"] = $LANG["EMPTY_FIELD"];
}

if (empty($password)) {
    $error["password"] = $LANG["EMPTY_FIELD"];
} elseif (!$users->checkPassword($email, $password)) {
    $error["password"] = $LANG["WRONG_PASSWORD"];
}

if (count($error) <= 0) {
    $users->startUserSession($email);
    $error["no_error"] = 1;
}

echo (json_encode($error));