<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_datagardu.php";

$connection = new Database($host, $user, $pass, $database);
$dtg = new datagardu($connection);

$id_ginduk = $connection->conn->real_escape_string($_POST['id_ginduk']);
$id_penyulang = $connection->conn->real_escape_string($_POST['id_penyulang']);
$jns_gardu = $connection->conn->real_escape_string($_POST['jns_gardu']);
$id_gardu = $_POST['id_gardu'];
$lokasi = $connection->conn->real_escape_string($_POST['lokasi']);
$merk_trafo = $connection->conn->real_escape_string($_POST['merk_trafo']);
$no_seri = $connection->conn->real_escape_string($_POST['no_seri']);
$daya = $connection->conn->real_escape_string($_POST['daya']);
$fasa = $connection->conn->real_escape_string($_POST['fasa']);
$tap = $connection->conn->real_escape_string($_POST['tap']);
$jml_jurusan = $connection->conn->real_escape_string($_POST['jml_jurusan']);
$lattitude = $connection->conn->real_escape_string($_POST['lattitude']);
$longitude = $connection->conn->real_escape_string($_POST['longitude']);

$dtg->edit("UPDATE datagardu_tb SET id_tb_gardu_induk = '$id_ginduk', id_tb_gardu_penyulang = '$id_penyulang', jns_gardu = '$jns_gardu',  lokasi = '$lokasi', merk_trafo = '$merk_trafo', no_seri_trafo = '$no_seri', daya_trafo = '$daya', fasa = '$fasa', tap = '$tap', jml_jurusan = '$jml_jurusan', latitude = '$lattitude', longitude = '$longitude' WHERE no_gardu = '$id_gardu'");

echo "<script>alert('Data berhasil disimpan');</script>";

echo "<script>window.location='?page=ms4noi32r';</script>";
?>
