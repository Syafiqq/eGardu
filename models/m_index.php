<?php

class indexuser
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil($user_terlogin)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE kode_user = '$user_terlogin'";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

}

?>
