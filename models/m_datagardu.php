<?php

class datagardu
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagardu_tb ORDER BY no_gardu";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function cari($inputan)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagardu_tb WHERE no_gardu LIKE '%$inputan%' OR lokasi LIKE '%$inputan%' ";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function tambah($id_ginduk, $id_penyulang, $jns_gardu, $no_gardu, $lokasi, $merk_trafo, $no_seri, $daya, $fasa, $tap, $jml_jurusan, $lattitude, $longitude)
    {

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO datagardu_tb VALUES ('$id_ginduk', '$id_penyulang', '$jns_gardu', '$no_gardu', '$lokasi', '$merk_trafo', '$no_seri', '$daya', '$fasa', '$tap', '$jml_jurusan', '$lattitude', '$longitude')";

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
        $sql = "DELETE FROM datagardu_tb WHERE no_gardu = '$no'";
        $db->query($sql) or die ($db->error);
    }

    function __destruct()
    {
        $db = $this->mysqli->conn;
        $db->close();
    }
}

?>
