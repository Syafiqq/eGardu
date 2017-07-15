<?php

class detailgardu
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $id = $db->real_escape_string($_GET['id']);
        $sql = "SELECT * FROM datagardu_tb WHERE no_gardu = '$id'";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }
}

?>
