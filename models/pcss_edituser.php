<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_user.php";

$connection = new Database($host, $user, $pass, $database);
$usr = new datauser($connection);

$kode_user = $_POST['kode_user'];
$usrnm = $connection->conn->real_escape_string($_POST['usrnm']);
$pswd = $connection->conn->real_escape_string($_POST['pass']);
$nmfull = $connection->conn->real_escape_string($_POST['nmfull']);

$usr->edit("UPDATE tb_user SET username = '$usrnm', password = '$pswd', nama_lengkap = '$nmfull' WHERE kode_user = '$kode_user'");

echo "<script>alert('Data berhasil disimpan');</script>";

echo "<script>window.location='';</script>";
?>
