<?php

class datauser
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function tersedia($idcek)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT username FROM tb_user WHERE username = '$idcek'";

        $db->query($sql) or die ($db->error);
    }

    public function cari($inputan)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM tb_user WHERE username LIKE '%$inputan%' OR nama_lengkap LIKE '%$inputan%' ";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function tambah($usrnm, $pswd, $nmfull, $level)
    {

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO tb_user (username, password, nama_lengkap, level) VALUES ('$usrnm', '$pswd', '$nmfull', '$level')";

        $db->query($sql) or die ($db->error);
    }

    public function edit($sql)
    {
        $db = $this->mysqli->conn;
        $db->query($sql) or die ($db->error);
    }

    public function hapus($no)
    {
        $db = $this->mysqli->conn;
        $no = $db->real_escape_string($_GET['no']);
        $sql = "DELETE FROM tb_user WHERE kode_user = '$no'";
        $db->query($sql) or die ($db->error);
    }

}

?>
