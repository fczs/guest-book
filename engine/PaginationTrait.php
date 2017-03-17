<?php

/**
 * PaginationTrait
 *
 * Methods for working with page attributes
 */
Trait PaginationTrait
{
    /**
     * Returns page URI
     *
     * @return string
     */
    public function getPageUri()
    {
        return $_SERVER["REQUEST_URI"];
    }

    /**
     * Returns page number
     *
     * @return int
     */
    public function getPageNum()
    {
        $pageNum = 1;
        if (!empty($_GET["PAGE"])) {
            $pageNum = $_GET["PAGE"];
        }
        return $pageNum;
    }

    /**
     * Returns message ID
     *
     * @return string
     */
    public function getMessageID()
    {
        return $_GET["ID"];
    }
}