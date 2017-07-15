<?php
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_ukurgardu.php";

$connection = new Database($host, $user, $pass, $database);
$dhp = new datapengukuran($connection);


$no_gardu = $_POST['no_gardu'];
$tgl_ukur = $_POST['tgl_ukurx'];
$wkt_ukur = $_POST['wkt_ukurx'];

$petugas1 = $connection->conn->real_escape_string($_POST['petugas1']);
$petugas2 = $connection->conn->real_escape_string($_POST['petugas2']);
$no_kontrak = $connection->conn->real_escape_string($_POST['no_kontrak']);
$i_r = $connection->conn->real_escape_string($_POST['i_r']);
$i_s = $connection->conn->real_escape_string($_POST['i_s']);
$i_t = $connection->conn->real_escape_string($_POST['i_t']);
$i_n = $connection->conn->real_escape_string($_POST['i_n']);
$vrn = $connection->conn->real_escape_string($_POST['vrn']);
$vsn = $connection->conn->real_escape_string($_POST['vsn']);
$vtn = $connection->conn->real_escape_string($_POST['vtn']);
$vrs = $connection->conn->real_escape_string($_POST['vrs']);
$vrt = $connection->conn->real_escape_string($_POST['vrt']);
$vst = $connection->conn->real_escape_string($_POST['vst']);
// jurusan 1
$id_u1 = $connection->conn->real_escape_string($_POST['id_u1']);
$ir_u1 = $connection->conn->real_escape_string($_POST['ir_u1']);
$is_u1 = $connection->conn->real_escape_string($_POST['is_u1']);
$it_u1 = $connection->conn->real_escape_string($_POST['it_u1']);
$in_u1 = $connection->conn->real_escape_string($_POST['in_u1']);
$vrn_u1 = $connection->conn->real_escape_string($_POST['vrn_u1']);
$vsn_u1 = $connection->conn->real_escape_string($_POST['vsn_u1']);
$vtn_u1 = $connection->conn->real_escape_string($_POST['vtn_u1']);
$vrs_u1 = $connection->conn->real_escape_string($_POST['vrs_u1']);
$vrt_u1 = $connection->conn->real_escape_string($_POST['vrt_u1']);
$vst_u1 = $connection->conn->real_escape_string($_POST['vst_u1']);
// jurusan 2
$id_u2 = $connection->conn->real_escape_string($_POST['id_u2']);
$ir_u2 = $connection->conn->real_escape_string($_POST['ir_u2']);
$is_u2 = $connection->conn->real_escape_string($_POST['is_u2']);
$it_u2 = $connection->conn->real_escape_string($_POST['it_u2']);
$in_u2 = $connection->conn->real_escape_string($_POST['in_u2']);
$vrn_u2 = $connection->conn->real_escape_string($_POST['vrn_u2']);
$vsn_u2 = $connection->conn->real_escape_string($_POST['vsn_u2']);
$vtn_u2 = $connection->conn->real_escape_string($_POST['vtn_u2']);
$vrs_u2 = $connection->conn->real_escape_string($_POST['vrs_u2']);
$vrt_u2 = $connection->conn->real_escape_string($_POST['vrt_u2']);
$vst_u2 = $connection->conn->real_escape_string($_POST['vst_u2']);
// jurusan 3
$id_u3 = $connection->conn->real_escape_string($_POST['id_u3']);
$ir_u3 = $connection->conn->real_escape_string($_POST['ir_u3']);
$is_u3 = $connection->conn->real_escape_string($_POST['is_u3']);
$it_u3 = $connection->conn->real_escape_string($_POST['it_u3']);
$in_u3 = $connection->conn->real_escape_string($_POST['in_u3']);
$vrn_u3 = $connection->conn->real_escape_string($_POST['vrn_u3']);
$vsn_u3 = $connection->conn->real_escape_string($_POST['vsn_u3']);
$vtn_u3 = $connection->conn->real_escape_string($_POST['vtn_u3']);
$vrs_u3 = $connection->conn->real_escape_string($_POST['vrs_u3']);
$vrt_u3 = $connection->conn->real_escape_string($_POST['vrt_u3']);
$vst_u3 = $connection->conn->real_escape_string($_POST['vst_u3']);
// jurusan 4
$id_u4 = $connection->conn->real_escape_string($_POST['id_u4']);
$ir_u4 = $connection->conn->real_escape_string($_POST['ir_u4']);
$is_u4 = $connection->conn->real_escape_string($_POST['is_u4']);
$it_u4 = $connection->conn->real_escape_string($_POST['it_u4']);
$in_u4 = $connection->conn->real_escape_string($_POST['in_u4']);
$vrn_u4 = $connection->conn->real_escape_string($_POST['vrn_u4']);
$vsn_u4 = $connection->conn->real_escape_string($_POST['vsn_u4']);
$vtn_u4 = $connection->conn->real_escape_string($_POST['vtn_u4']);
$vrs_u4 = $connection->conn->real_escape_string($_POST['vrs_u4']);
$vrt_u4 = $connection->conn->real_escape_string($_POST['vrt_u4']);
$vst_u4 = $connection->conn->real_escape_string($_POST['vst_u4']);
// jurusan khusus 1
$id_k1 = $connection->conn->real_escape_string($_POST['id_k1']);
$ir_k1 = $connection->conn->real_escape_string($_POST['ir_k1']);
$is_k1 = $connection->conn->real_escape_string($_POST['is_k1']);
$it_k1 = $connection->conn->real_escape_string($_POST['it_k1']);
$in_k1 = $connection->conn->real_escape_string($_POST['in_k1']);
$vrn_k1 = $connection->conn->real_escape_string($_POST['vrn_k1']);
$vsn_k1 = $connection->conn->real_escape_string($_POST['vsn_k1']);
$vtn_k1 = $connection->conn->real_escape_string($_POST['vtn_k1']);
$vrs_k1 = $connection->conn->real_escape_string($_POST['vrs_k1']);
$vrt_k1 = $connection->conn->real_escape_string($_POST['vrt_k1']);
$vst_k1 = $connection->conn->real_escape_string($_POST['vst_k1']);
// jurusan khusus 2
$id_k2 = $connection->conn->real_escape_string($_POST['id_k2']);
$ir_k2 = $connection->conn->real_escape_string($_POST['ir_k2']);
$is_k2 = $connection->conn->real_escape_string($_POST['is_k2']);
$it_k2 = $connection->conn->real_escape_string($_POST['it_k2']);
$in_k2 = $connection->conn->real_escape_string($_POST['in_k2']);
$vrn_k2 = $connection->conn->real_escape_string($_POST['vrn_k2']);
$vsn_k2 = $connection->conn->real_escape_string($_POST['vsn_k2']);
$vtn_k2 = $connection->conn->real_escape_string($_POST['vtn_k2']);
$vrs_k2 = $connection->conn->real_escape_string($_POST['vrs_k2']);
$vrt_k2 = $connection->conn->real_escape_string($_POST['vrt_k2']);
$vst_k2 = $connection->conn->real_escape_string($_POST['vst_k2']);


$dhp->tambah("INSERT INTO ukurgardu_tb VALUES ('', '$no_gardu', '$petugas1', '$petugas2', '$no_kontrak', '$tgl_ukur', '$wkt_ukur', '$i_r', '$i_s', '$i_t', '$i_n', '$vrn', '$vsn', '$vtn', '$vrs', '$vrt', '$vst', '$id_u1', '$ir_u1', '$is_u1', '$it_u1', '$in_u1', '$vrn_u1', '$vsn_u1', '$vtn_u1', '$vrs_u1', '$vrt_u1', '$vst_u1', '$id_u2', '$ir_u2', '$is_u2', '$it_u2', '$in_u2', '$vrn_u2', '$vsn_u2', '$vtn_u2', '$vrs_u2', '$vrt_u2', '$vst_u2', '$id_u3', '$ir_u3', '$is_u3', '$it_u3', '$in_u3', '$vrn_u3', '$vsn_u3', '$vtn_u3', '$vrs_u3', '$vrt_u3', '$vst_u3', '$id_u4', '$ir_u4', '$is_u4', '$it_u4', '$in_u4', '$vrn_u4', '$vsn_u4', '$vtn_u4', '$vrs_u4', '$vrt_u4', '$vst_u4', '$id_k1', '$ir_k1', '$is_k1', '$it_k1', '$in_k1', '$vrn_k1', '$vsn_k1', '$vtn_k1', '$vrs_k1', '$vrt_k1', '$vst_k1', '$id_k2', '$ir_k2', '$is_k2', '$it_k2', '$in_k2', '$vrn_k2', '$vsn_k2', '$vtn_k2', '$vrs_k2', '$vrt_k2', '$vst_k2')");

echo "<script>alert('Data berhasil disimpan');</script>";

echo "<script>window.location='../index.php';</script>";
?>
