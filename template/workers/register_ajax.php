<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php");

$error = [];
$name = $_POST["name"];
$email = $_POST["email"];
$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$keystring = $_POST["keystring"];

!empty($name) or $error["name"] = $LANG["EMPTY_FIELD"];

if (empty($email)) {
    $error["email"] = $LANG["EMPTY_FIELD"];
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error["email"] = $LANG["WRONG_EMAIL"];
} elseif (!empty($users->getUserID($email))) {
    $error["email"] = $LANG["ALREADY_REGISTERED"];
}

if (empty($password1)) {
    $error["password1"] = $LANG["EMPTY_FIELD"];
} elseif (strlen($password1) < 4) {
    $error["password1"] = $LANG["SHORT_PASSWORD"];
}

if (empty($password2)) {
    $error["password2"] = $LANG["EMPTY_FIELD"];
} elseif ($password2 != $password1) {
    $error["password2"] = $LANG["UNEQUAL_PASSWORD"];
}

if (empty($keystring)) {
    $error["keystring"] = $LANG["EMPTY_FIELD"];
} elseif ($_SESSION['captcha_keystring'] != $keystring) {
    $error["keystring"] = $LANG["WRONG_CAPTCHA"];
}

//unset($_SESSION['captcha_keystring']);

if (count($error) <= 0) {
    $hash = password_hash($password1, PASSWORD_DEFAULT);
    $users->addUser($name, $email, $hash);
    $users->startUserSession($email);
    $error["no_error"] = 1;
}

echo (json_encode($error));