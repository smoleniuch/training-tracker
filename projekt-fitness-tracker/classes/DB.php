<?php
require_once("core/init.php");
class DB
{
    private static $_instance = null;
    private $_pdo;
    private $_query;
    private $_result;
    private $_error = false;
    private $_count = 0;

    private function __construct()
    {
        try {
            $this->_pdo = new PDO("mysql:host=" . Config::get("mysql/host") .
                            ";dbname=" . Config::get("mysql/database") .
                            ";charset=" . Config::get("mysql/charset"), Config::get("mysql/username"), Config::get("mysql/password"));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DB();
        }


        return self::$_instance;
    }
    /**
     * Make query with prepare statement
     * Result of queries are save using constant PDO::FETCH_OBJ
     * @param  string $stmt   statement to execute
     * @param  array  $params optional values to bind.
     * @return object         current working instance of db.
     */
    public function query($stmt, $params = array())
    {
        $this->_error = false;

        if ($this->_query = $this->_pdo->prepare($stmt)) {
            if ($this->_query->execute($params)) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_OBJ);
            }
            $this->_count = $this->_query->rowCount();
        } else {
            $this->_error = true;
        }

        return $this;
    }
    /**
     * gets current query result.
     * @return array query results.
     */
    public function result()
    {
        return $this->_result;
    }
    /**
     * count query results
     * @return int amount of results.
     */
    public function count()
    {
        return $this->_count;
    }

    public function error()
    {
        return $this->_error;
    }
}
