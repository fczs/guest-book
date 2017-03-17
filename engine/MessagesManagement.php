<?php

/**
 * MessagesManagement
 *
 * Provides methods for working with messages
 */
class MessagesManagement
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
     * Adds a new message
     *
     * @param string $author_id
     * @param string $title
     * @param string $message
     *
     * @return bool
     */
    public function addMessage($author_id, $title, $message)
    {
        $data = array("author_id" => $author_id, "title" => $title, "message" => $message);
        return self::$pdoObj->executePreparedStatement("INSERT INTO `gb_messages` (AUTHOR_ID, TITLE, MESSAGE) values (:author_id, :title, :message)", $data);
    }

    /**
     * Deletes a message
     *
     * @param string $id Message ID
     *
     * @return bool
     */
    public function deleteMessage($id)
    {
        return self::$pdoObj->executePreparedStatement("DELETE FROM `gb_messages` WHERE ID = :id", array("id" => $id));
    }

    /**
     * Publishes a message after admin check
     *
     * @param string $id Message ID
     *
     * @return bool
     */
    public function publishMessage($id)
    {
        return self::$pdoObj->executePreparedStatement("UPDATE `gb_messages` SET PUBLISHED='Y' WHERE ID = :id", array("id" => $id));
    }
}