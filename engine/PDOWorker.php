<?php

/**
 * PDOWorker singleton class
 *
 * Provides methods for working with a database using PDO
 */
class PDOWorker
{
    /**
     * Singleton instance
     */
    private static $instance = null;

    /**
     * PDO connection
     */
    private $PDO;

    /**
     * Private constructor represents a connection to a database with config parameters
     */
    private function __construct()
    {
        try {
            $this->PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASSWORD);
            //Disable emulated prepared statement when using the MySQL driver
            $this->PDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            //Writes error message to a log file
            file_put_contents(ROOT_DIR . '/engine/log/error.log', date("d.m.Y H:i:s") . ": " . $e->getMessage() . "\n", FILE_APPEND);
            die("SYSTEM ERROR");
        }
    }

    /**
     * Makes the instance available as a singleton
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new PDOWorker();
        }
        return self::$instance;
    }

    /**
     * Prepares a statement and executes query
     *
     * @param string $statement An SQL statement
     * @param string $data Query data
     *
     * @return bool
     */
    public function executePreparedStatement($statement, $data)
    {
        return $this->PDO->prepare($statement)->execute($data);
    }


    /**
     * Executes query and returns all rows in assoc array
     *
     * @param string $statement An SQL statement
     *
     * @return array
     */
    public function fetchAllAssoc($statement)
    {
        return $this->PDO->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Executes query and returns one row in assoc array
     *
     * @param string $statement An SQL statement
     *
     * @return array
     */
    public function fetchRowAssoc($statement)
    {
        return $this->PDO->query($statement)->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Executes query and selects one column only
     *
     * @param string $statement An SQL statement
     * @param string $data Query data
     *
     * @return string
     */
    public function fetchColAssoc($statement, $data)
    {
        $dbData = $this->PDO->prepare($statement);
        $dbData->execute($data);
        return $dbData->fetchColumn();
    }

    /**
     * Disable object cloning
     */
    public function __clone()
    {
        return false;
    }

    /**
     * Disable creating via unserialize
     */
    public function __wakeup()
    {
        return false;
    }
}