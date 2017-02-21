<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/config.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PDOWorker.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PaginationTrait.php");

class MessagesOutput
{
    use PaginationTrait;
    
    private static $pdoObj = null;
    private $allMessages = "SELECT * FROM `gb_messages`";
    private $publishedMessages = " WHERE PUBLISHED='Y'";

    //Gets PDO instance with the Database connection parameters
    public function __construct()
    {
        self::$pdoObj = new PDOWorker(DB_HOST, DB_NAME, DB_CHARSET, DB_USER, DB_PASSWORD);
    }

    private function getMessages($options = "")
    {
        return(self::$pdoObj->fetchAllAssoc($this->allMessages . $options));
    }

    private function getPublishedMessages()
    {
        return($this->getMessages($this->publishedMessages));
    }

    private function countAllMessages()
    {
        return(count($this->getMessages()));
    }

    private function countPublishedMessages()
    {
        return(count($this->getPublishedMessages()));
    }

    public function countPages($page)
    {
        if (strpos($page, ADMIN_PAGE) !== false) {
            $messagesCount = $this->countAllMessages();
            $pagesCount = floor($messagesCount / ADMIN_PAGE_MESSAGES);
            return(($messagesCount % ADMIN_PAGE_MESSAGES == 0) ? $pagesCount : $pagesCount + 1);

        } else {
            $messagesCount = $this->countPublishedMessages();
            $pagesCount = floor($messagesCount / USER_PAGE_MESSAGES);
            return(($messagesCount % USER_PAGE_MESSAGES == 0) ? $pagesCount : $pagesCount + 1);
        }
    }

    public function getUserPage()
    {
        $offset = ($this->getPageNum() - 1) * USER_PAGE_MESSAGES;
        return($this->getMessages($this->publishedMessages . " ORDER BY ID DESC LIMIT " . USER_PAGE_MESSAGES . " OFFSET " . $offset));
    }

    public function getAdminPage()
    {
        $offset = ($this->getPageNum() - 1) * ADMIN_PAGE_MESSAGES;
        return($this->getMessages(" ORDER BY ID DESC LIMIT " . ADMIN_PAGE_MESSAGES . " OFFSET " . $offset));
    }

    public function getDetailPage()
    {
        return(self::$pdoObj->fetchRowAssoc($this->allMessages . " WHERE ID='" . $this->getMessageID() . "'"));
    }
}
