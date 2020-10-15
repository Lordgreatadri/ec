<?php


class PGSQLDB
{
    /**
     * @var mixed
     */
    protected $_hostname;
    protected $_charset;
    protected $_dbname;
    protected $_username;
    protected $_password;
    protected $_dbdriver;

    protected $pdo = NULL;
    protected $statement = NULL;

    public $error = "";
    public $lastID = NULL;

    /** 
     * MConnect constructor.
     */
    function __construct() {

        //call to the config file
        $config = require "database.php";

        $this->_hostname = $config['pgsql']['host'];
        $this->_charset = $config['pgsql']['charset'];
        $this->_dbname = $config['pgsql']['db'];
        $this->_username = $config['pgsql']['dbuser'];
        $this->_password = $config['pgsql']['dbpass'];
        // $this->_dbdriver = $config['pgsql']['dbdriver'];

        try {
            //echo "DB Details: $this->_hostname | $this->_charset\n";
            $dsn = "pgsql:host=$this->_hostname;port=5432;dbname=$this->_dbname;user=$this->_username;password=$this->_password";

            if (isset($this->_dbname)) {
                $dsn .= ";dbname=" . $this->_dbname;
            }

            $this->pdo = new PDO(
                $dsn, $this->_username, $this->_password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (Exception $exception) {
            print_r($exception);

            die();
        }
    }


    public function exec($sql, $data =  NULL) {
        try {
            $this->statement = $this->pdo->prepare($sql);

            $this->statement->execute($data);

            $this->lastID = $this->pdo->lastInsertId();

        } catch (Exception $exception) {

            $this->error = $exception;

            return false;
        }

        $this->statement = NULL;

        return true;
    }


    public function fetchAll($sql, $cond = NULL, $key = NULL, $value = NULL) {
        $result = [];

        try {
            $this->statement = $this->pdo->prepare($sql);
            $this->statement->execute($cond);

            // Sort in given order
            if (isset($key)) {
                if (isset($value)) {
                    if (is_callable($value)) {
                        while ($row = $this->statement->fetch(PDO::FETCH_NAMED)) {
                            $result[$row[$key]] = $value($row);
                        }
                    } else {
                        while ($row = $this->statement->fetch(PDO::FETCH_NAMED)) {
                            $result[$row[$key]] = $row[$value];
                        }
                    }
                } else {
                    while ($row = $this->statement->fetch(PDO::FETCH_NAMED)) {
                        $result[$row[$key]] = $row;
                    }
                }
            }
            // No key-value sort order
            else {
                $result = $this->statement->fetchAll();
            }
        } catch (Exception $exception) {
            $this->error = $exception;

            return false;
        }
        // Return result
        $this->statement = NULL;

        return count($result)==0 ? false : $result ;
    }

    public function fetch($sql, $cond = NULL, $sort = NULL) {
        $result = [];

        try {
            $this->statement = $this->pdo->prepare($sql);

            $this->statement->execute($cond);

            if (is_callable($sort)) {
                while ($row = $this->statement->fetch(PDO::FETCH_NAMED)) {
                    $result = $sort($row);
                }
            } else {
                while ($row = $this->statement->fetch(PDO::FETCH_NAMED)) {
                    $result = $row;
                }
            }
        } catch (Exception $exception) {

            $this->error = $exception;

            return false;
        }

        // Return result
        $this->statement = NULL;

        return count($result)==0 ? false : $result ;
    }


    public function fetchColumn($sql, $cond = NULL) {
        $this->statement = $this->pdo->prepare($sql);

        $this->statement->execute($cond);

        $result = $this->statement->fetchAll(PDO::FETCH_COLUMN, 0);

        return count($result)==0 ? false : $result;
    }

    function start () {
        // start() : auto-commit off
        $this->pdo->beginTransaction();
    }

    function end ($commit = 1) {
        // end() : commit or roll back?

        if ($commit) {
            $this->pdo->commit();
        }   else {
            $this->pdo->rollBack();
        }
    }

    /**
     * Close connections when done
     */
    function __destruct()
    {
        if ($this->statement !== NULL) {
            $this->statement = NULL;
        }

        if ($this->pdo !== NULL) {
            $this->pdo = NULL;
        }
    }
}