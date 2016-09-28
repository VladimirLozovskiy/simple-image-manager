<?php

namespace database;

use \PDO;

class enterDb
{
    /**
     * variable for object of connection to database
     *
     * @var PDO
     */
    private $pdo;

    /**
     * variable for hosting where databased is placed
     *
     * @var string
     */
    private $db_host = "localhost";

    /**
     * variable for user-name
     *
     * @var string
     */
    private $db_user = "root";

    /**
     * variable for password
     *
     * @var string
     */
    private $db_pass = "";

    /**
     * variable for database-name
     *
     * @var string
     */
    private $db_name = "testadyax";

    /**
     * Function for connecting to DB
     *
     */
    public function connect()
    {
        try {
            $this->pdo = new PDO(
                "mysql:host=$this->db_host;dbname=$this->db_name",
                "$this->db_user",
                "$this->db_pass",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                )
            );
        } catch (\PDOException $e) {
            die("Connection failed:" . $e->getMessage());
        }
        return $this->pdo;
    }
}