<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/Prolog.php");

$result = 0;
$id = $_POST["id"];

if ($users->isAdmin()) {
    $result = $management->publishMessage($id);
}

echo $result;