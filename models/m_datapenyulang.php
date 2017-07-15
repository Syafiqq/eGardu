<?php

class datapenyulang
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagardupenyulang_tb ORDER BY id_tb_gardu_penyulang";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function cari($inputan)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM datagardupenyulang_tb WHERE id_tb_gardu_penyulang LIKE '%$inputan%' OR nama_penyulang LIKE '%$inputan%' ";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

    public function tambah($id_gp, $nm_gp)
    {

        $db = $this->mysqli->conn;
        $sql = "INSERT INTO datagardupenyulang_tb VALUES ('$id_gp', '$nm_gp')";

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
        $sql = "DELETE FROM datagardupenyulang_tb WHERE id_tb_gardu_penyulang = '$no'";
        $db->query($sql) or die ($db->error);
    }

}

?>
