<?php

class datagarduinduk
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagarduinduk_tb ORDER BY id_tb_gardu_induk";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function cari($inputan)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagarduinduk_tb WHERE id_tb_gardu_induk LIKE '%$inputan%' OR nama_gardu_induk LIKE '%$inputan%' ";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function tambah($id_gi, $nm_gi)
    {

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO datagarduinduk_tb VALUES ('$id_gi', '$nm_gi')";

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
        $sql = "DELETE FROM datagarduinduk_tb WHERE id_tb_gardu_induk = '$no'";
        $db->query($sql) or die ($db->error);
    }

}

?>
