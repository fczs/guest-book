<?php

//PATH
define('ROOT_DIR', $_SERVER["DOCUMENT_ROOT"]);
define('TEMPLATE_DIR', ROOT_DIR . "/template");
define('LANG_DIR', ROOT_DIR . "/lang");

//Language settings
define('LANG', "ru");

//Messages output settings
define('USER_PAGE_MESSAGES', "10");
define('ADMIN_PAGE', "messages");
define('ADMIN_PAGE_MESSAGES', "10");
define('ADMIN_MESSAGE_LENGTH', "120");

//Database connection
define('DB_HOST', "localhost");
define('DB_NAME', "guestbook");
define('DB_CHARSET', "utf8");
define('DB_USER', "");
define('DB_PASSWORD', "");

//User groups
define('ADMIN_GROUP', "1");