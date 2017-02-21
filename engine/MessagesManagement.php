<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PDOWorker.php");

class MessagesManagement
{
    private static $pdoObj = null;

    //Gets PDO instance with the Database connection parameters
    public function __construct()
    {
        self::$pdoObj = new PDOWorker(DB_HOST, DB_NAME, DB_CHARSET, DB_USER, DB_PASSWORD);
    }

    public function addMessage($author_id, $title, $message)
    {
        $data = array("author_id" => $author_id, "title" => $title, "message" => $message);
        return self::$pdoObj->executePreparedStatement("INSERT INTO `gb_messages` (AUTHOR_ID, TITLE, MESSAGE) values (:author_id, :title, :message)", $data);
    }

    public function deleteMessage($id)
    {
        $data = array("id" => $id);
        return self::$pdoObj->executePreparedStatement("DELETE FROM `gb_messages` WHERE ID = :id", $data);
    }

    public function publishMessage($id)
    {
        $data = array("id" => $id);
        return self::$pdoObj->executePreparedStatement("UPDATE `gb_messages` SET PUBLISHED='Y' WHERE ID = :id", $data);
    }
}