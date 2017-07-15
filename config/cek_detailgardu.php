<?php

class ceknogardu
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $id = mysqli_real_escape_string($db, $_GET['id']);
        $sql = "SELECT * FROM datagardu_tb WHERE no_gardu = '$id'";

        $query = $db->query($sql);

        return $query;
    }
}

?>
