<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_datagarduinduk.php";

$connection = new Database($host, $user, $pass, $database);
$dgi = new datagarduinduk($connection);

$id_garind = $_POST['id_garind'];
$id_gi = $connection->conn->real_escape_string($_POST['id_gi']);
$nm_gi = $connection->conn->real_escape_string($_POST['nm_gi']);

$dgi->edit("UPDATE datagarduinduk_tb SET nama_gardu_induk = '$nm_gi' WHERE id_tb_gardu_induk = '$id_garind'");

echo "<script>alert('Data berhasil disimpan');</script>";

echo "<script>window.location='?page=j9e3x2n9';</script>";
?>
