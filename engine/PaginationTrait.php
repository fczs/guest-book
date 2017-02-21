<?php

Trait PaginationTrait
{
    public function getPageUri()
    {
        return $_SERVER["REQUEST_URI"];
    }

    public function getPageNum()
    {
        $pageNum = 1;
        if (!empty($_GET["PAGE"])) {
            $pageNum = $_GET["PAGE"];
        }
        return $pageNum;
    }

    public function getMessageID()
    {
        return $_GET["ID"];
    }
}