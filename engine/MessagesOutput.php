<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PDOWorker.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/PaginationTrait.php");

/**
 * MessagesOutput
 *
 * Provides methods for displaying messages on the various pages
 */
class MessagesOutput
{
    use PaginationTrait;

    /**
     * PDO object
     */
    private static $pdoObj;

    private $allMessages = "SELECT * FROM `gb_messages`";
    private $publishedMessages = " WHERE PUBLISHED='Y'";

    /**
     * Gets PDO singleton instance
     */
    public function __construct()
    {
        self::$pdoObj = PDOWorker::getInstance();
    }

    /**
     * Finds messages with specified parameters
     *
     * @param string $options The additional query parameters
     *
     * @return array
     */
    private function getMessages($options = "")
    {
        return(self::$pdoObj->fetchAllAssoc($this->allMessages . $options));
    }

    /**
     * Finds published messages
     *
     * @return array
     */
    private function getPublishedMessages()
    {
        return($this->getMessages($this->publishedMessages));
    }

    /**
     * Counts all messages in a database
     *
     * @return int
     */
    private function countAllMessages()
    {
        return(count($this->getMessages()));
    }

    /**
     * Counts published messages in a database
     *
     * @return int
     */
    private function countPublishedMessages()
    {
        return(count($this->getPublishedMessages()));
    }

    /**
     * Counts a number of messages which will be displayed on a single page
     *
     * Depends on config options
     *
     * @param string $page Page URI
     *
     * @return int
     */
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

    /**
     * Gets messages for a specific user page
     *
     * @return array
     */
    public function getUserPage()
    {
        $offset = ($this->getPageNum() - 1) * USER_PAGE_MESSAGES;
        return($this->getMessages($this->publishedMessages . " ORDER BY ID DESC LIMIT " . USER_PAGE_MESSAGES . " OFFSET " . $offset));
    }

    /**
     * Gets messages for a specific admin page
     *
     * @return array
     */
    public function getAdminPage()
    {
        $offset = ($this->getPageNum() - 1) * ADMIN_PAGE_MESSAGES;
        return($this->getMessages(" ORDER BY ID DESC LIMIT " . ADMIN_PAGE_MESSAGES . " OFFSET " . $offset));
    }

    /**
     * Gets a specific message for a single message page
     *
     * @return array
     */
    public function getDetailPage()
    {
        return(self::$pdoObj->fetchRowAssoc($this->allMessages . " WHERE ID='" . $this->getMessageID() . "'"));
    }
}
