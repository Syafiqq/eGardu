<?php

class datapengukuran
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tambah($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }

}

?>
