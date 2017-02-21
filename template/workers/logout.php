<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') die(0); //Only ajax requests
session_start();
unset($_SESSION["LOGIN_USER"]);
