<?php

class Users
{
    /**
     * PDO object
     */
    private static $pdoObj;

    /**
     * Gets PDO singleton instance
     */
    public function __construct()
    {
        self::$pdoObj = PDOWorker::getInstance();
    }

    /**
     * Gets user attributes from a database
     *
     * @param array $idArr An array of authors IDs
     *
     * @return array
     */
    public function getUserFields($idArr)
    {
        $users = self::$pdoObj->fetchAllAssoc("SELECT ID, NAME, EMAIL FROM `gb_user` WHERE ID IN (" . implode(',', $idArr) . ")");
        $userFields = [];
        foreach ($users as $user) {
            $userFields[$user["ID"]] = $user;
        }
        return $userFields;
    }

    /**
     * Adds new user after registration
     *
     * @param string $name
     * @param string $email
     * @param string $password
     *
     */
    public function addUser($name, $email, $password)
    {
        $user = array("name" => $name, "email" => $email, "password" => $password);
        self::$pdoObj->executePreparedStatement("INSERT INTO `gb_user` (NAME, EMAIL, PASSWORD) values (:name, :email, :password)", $user);
    }

    /**
     * Finds user ID with e-mail provided
     *
     * @param string $email
     *
     * @return string
     */
    public function getUserID($email)
    {
        return self::$pdoObj->fetchColAssoc("SELECT ID FROM `gb_user` WHERE EMAIL = :email", array("email" => $email));
    }

    /**
     * Checks password on authorization
     *
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function checkPassword($email, $password)
    {
        $hash = self::$pdoObj->fetchColAssoc("SELECT PASSWORD FROM `gb_user` WHERE EMAIL = :email", array("email" => $email));
        if (password_verify($password, $hash)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Starts user php session
     *
     * @param string $email
     *
     */
    public function startUserSession($email)
    {
        if (!empty($this->getUserID($email))) {
            $_SESSION["LOGIN_USER"] = $email;
        }
    }

    /**
     * Checks if an user is logged in
     *
     * @return bool
     */
    public function isUser()
    {
        return isset($_SESSION["LOGIN_USER"]) ? true : false;
    }

    /**
     * Checks if an authorized user is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        $group = "";
        if ($this->isUser()) {
            $data = array("email" => $_SESSION["LOGIN_USER"]);
            $group = self::$pdoObj->fetchColAssoc("SELECT GROUP_ID FROM `gb_user` WHERE EMAIL = :email", $data);
        }
        return $group == ADMIN_GROUP ? true : false;
    }

    /**
     * Finds a name of an authorized user
     *
     * @return string
     */
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