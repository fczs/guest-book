<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PDOWorker.php");

class Users
{
    private static $pdoObj = null;

    //Gets PDO instance with the Database connection parameters
    public function __construct()
    {
        self::$pdoObj = new PDOWorker(DB_HOST, DB_NAME, DB_CHARSET, DB_USER, DB_PASSWORD);
    }

    public function getUserFields($idArr)
    {
        $users = self::$pdoObj->fetchAllAssoc("SELECT ID, NAME, EMAIL FROM `gb_user` WHERE ID IN (" . implode(',', $idArr) . ")");
        $userFields = [];
        foreach ($users as $user) {
            $userFields[$user["ID"]] = $user;
        }
        return $userFields;
    }

    public function addUser($name, $email, $password)
    {
        $user = array("name" => $name, "email" => $email, "password" => $password);
        self::$pdoObj->executePreparedStatement("INSERT INTO `gb_user` (NAME, EMAIL, PASSWORD) values (:name, :email, :password)", $user);
    }

    public function getUserID($email)
    {
        $data = array("email" => $email);
        return self::$pdoObj->fetchColAssoc("SELECT ID FROM `gb_user` WHERE EMAIL = :email", $data);
    }

    public function checkPassword($email, $password)
    {
        $data = array("email" => $email);
        $hash = self::$pdoObj->fetchColAssoc("SELECT PASSWORD FROM `gb_user` WHERE EMAIL = :email", $data);
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    public function startUserSession($email)
    {
        if (!empty($this->getUserID($email))) {
            $_SESSION["LOGIN_USER"] = $email;
        }
    }

    public function isUser()
    {
        return isset($_SESSION["LOGIN_USER"]) ? true : false;
    }

    public function isAdmin()
    {
        $group = "";
        if ($this->isUser()) {
            $data = array("email" => $_SESSION["LOGIN_USER"]);
            $group = self::$pdoObj->fetchColAssoc("SELECT GROUP_ID FROM `gb_user` WHERE EMAIL = :email", $data);
        }
        return $group == ADMIN_GROUP ? true : false;
    }

    public function getUserName()
    {
        $user_name = "";
        if ($this->isUser()) {
            $data = array("email" => $_SESSION["LOGIN_USER"]);
            $user_name = self::$pdoObj->fetchColAssoc("SELECT NAME FROM `gb_user` WHERE EMAIL = :email", $data);
        }
        return $user_name;
    }
}