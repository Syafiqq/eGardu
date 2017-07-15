<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_datapenyulang.php";

$connection = new Database($host, $user, $pass, $database);
$dtp = new datapenyulang($connection);

$id_garpen = $_POST['id_garpen'];
$id_gp = $connection->conn->real_escape_string($_POST['id_gp']);
$nm_gp = $connection->conn->real_escape_string($_POST['nm_gp']);

$dtp->edit("UPDATE datagarduinduk_tb SET nama_penyulang = '$nm_gp' WHERE id_tb_gardu_penyulang = '$id_garpen'");

echo "<script>alert('Data berhasil disimpan');</script>";

echo "<script>window.location='?page=g55cx09q2';</script>";
?>
