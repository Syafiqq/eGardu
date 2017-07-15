<?php

class datalogin
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function masuk($user, $pass)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE username = '$user' and password = '$pass'";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

}

?>
