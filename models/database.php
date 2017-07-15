<?php

class Database
{
    public $conn;
    private $host;
    private $user;
    private $pass;
    private $database;

    function __construct($host, $user, $pass, $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;

        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database) or die (mysqli_error());
        if (!$this->conn)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

?>
