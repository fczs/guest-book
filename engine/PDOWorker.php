<?php

require_once($_SERVER["DOCUMENT_ROOT"] . "/engine/config.php");
require_once(LANG_DIR . '/' . LANG . '.php');

class PDOWorker
{
    //Singleton instance
    private static $PDOInstance;

    //Creates a PDO connection to a MySQL data base
    public function __construct($dbHost, $dbName, $charset, $dbUser, $dbPassword)
    {
        if (!self::$PDOInstance) {
            try {
                self::$PDOInstance = new PDO('mysql:host=' . $dbHost . ';dbname=' . $dbName . ';charset=' . $charset, $dbUser, $dbPassword);
                //Disable emulated prepared statement when using the MySQL driver
                self::$PDOInstance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (PDOException $e) {
                //Writes error message to a log file
                file_put_contents(ROOT_DIR . '/engine/log/error.log', date("d.m.Y H:i:s") . ": " . $e->getMessage() . "\n", FILE_APPEND);
                die($LANG["DB_CONNECTION_ERROR"]);
            }
        }
        return self::$PDOInstance;
    }

    //Prepares a statement and executes query
    public function executePreparedStatement($statement, $data)
    {
        return self::$PDOInstance->prepare($statement)->execute($data);
    }

    //Execute query and return all rows in assoc array
    public function fetchAllAssoc($statement)
    {
        return self::$PDOInstance->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Execute query and return one row in assoc array
    public function fetchRowAssoc($statement)
    {
        return self::$PDOInstance->query($statement)->fetch(PDO::FETCH_ASSOC);
    }

    //Execute query and select one column only
    public function fetchColAssoc($statement, $data)
    {
        $dbData = self::$PDOInstance->prepare($statement);
        $dbData->execute($data);
        return $dbData->fetchColumn();
    }
}