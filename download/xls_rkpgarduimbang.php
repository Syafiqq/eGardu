<?php
//Membuat Koneksi Mysql
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_rekapbebanimbang.php";

$connection = new Database($host, $user, $pass, $database);
$rbi = new rekapbbnimbang($connection);

$tglawal = $connection->conn->real_escape_string(@$_POST['tglawal']);
$tglakhir = $connection->conn->real_escape_string(@$_POST['tglakhir']);

//Membuat Query 
if ($tglawal != "" && $tglakhir != "")
{
    $tampil = $rbi->filter($tglawal, $tglakhir);
}
else
{
    $tampil = $rbi->tampil();
}

require_once '../assets/PHPExcel/Classes/PHPExcel.php';
$excel = new PHPExcel();

// Set document properties
$excel->getProperties()->setCreator("Eka Yuliana")
    ->setLastModifiedBy("PLN Bali Selatan")
    ->setTitle("Rekapitulasi Beban Imbang")
    ->setSubject("PLN")
    ->setCategory("Rahasia");

// Set lebar kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(25);

// Mergecell, menyatukan beberapa kolom
$excel->setActiveSheetIndex(0)->mergeCells('A1:R1');
$excel->setActiveSheetIndex(0)->mergeCells('A2:R2');
$excel->setActiveSheetIndex(0)->mergeCells('A3:R3');

//Mengeset Style nya
$titlestyle = new PHPExcel_Style();
$headerstyle = new PHPExcel_Style();
$bodystyle = new PHPExcel_Style();

//setting title style
$titlestyle->applyFromArray(
    array('font' => array(
        'bold' => true,
        'color' => array('rgb' => '000000')),
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
    ));

//setting header style
$headerstyle->applyFromArray(
    array('font' => array(
        'bold' => true,
        'color' => array('rgb' => '000000')),
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('argb' => 'FFEEEEEE')),
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'borders' => array('bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
            'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        )
    ));

//setting body style
$bodystyle->applyFromArray(
    array('fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('argb' => 'FFFFFFFF')),
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'borders' => array(
            'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            'right' => array('style' => PHPExcel_Style_Border::BORDER_MEDIUM),
            'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
            'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
        )
    ));

// mulai dari baris ke 4
$row = 4;

if ($tglawal != "" && $tglakhir != "")
{
    $tglstart = date('d F Y', strtotime($tglawal));
    $tglend = date('d F Y', strtotime($tglakhir));

    $rentang = 'Berdasarkan Data Pengukuran Gardu pada Tanggal ' . $tglstart . ' s/d ' . $tglend;
}
else
{
    $rentang = 'Berdasarkan Data Pengukuran Gardu';
}

// Tulis judul tabel   
$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'PT. PLN (Persero) Area Bali Selatan')
    ->setCellValue('A2', 'REKAPITULASI BEBAN IMBANG')
    ->setCellValue('A3', $rentang)
    ->setCellValue('A' . $row, 'No')
    ->setCellValue('B' . $row, 'No. Gardu')
    ->setCellValue('C' . $row, 'Gardu Induk')
    ->setCellValue('D' . $row, 'Penyulang')
    ->setCellValue('E' . $row, 'Lokasi')
    ->setCellValue('F' . $row, 'Latitude')
    ->setCellValue('G' . $row, 'Longitude')
    ->setCellValue('H' . $row, 'Tgl Pengukuran')
    ->setCellValue('I' . $row, 'Waktu Pengukuran')
    ->setCellValue('J' . $row, 'Arus R')
    ->setCellValue('K' . $row, 'Arus S')
    ->setCellValue('L' . $row, 'Arus T')
    ->setCellValue('M' . $row, 'Rata-Rata')
    ->setCellValue('N' . $row, 'Const a')
    ->setCellValue('O' . $row, 'Const b')
    ->setCellValue('P' . $row, 'Const c')
    ->setCellValue('Q' . $row, 'Prosen Imbang')
    ->setCellValue('R' . $row, 'Status Beban');

//Menggunakan TitleStylenya
$excel->getActiveSheet()->setSharedStyle($titlestyle, "A1:R3");

//Menggunakan HeaderStylenya
$excel->getActiveSheet()->setSharedStyle($headerstyle, "A4:R4");

$nomor = 1; // set nomor urut = 1;

$row++; // pindah ke row bawahnya. 

// lakukan perulangan untuk menuliskan data siswa
while ($data = $tampil->fetch_array())
{
    $tgl = date('d F Y', strtotime($data[7]));
    $wkt = date('H.i', strtotime($data[8]));

    $excel->setActiveSheetIndex(0)
        ->setCellValueExplicit('A' . $row, $nomor, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('B' . $row, $data[1], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('C' . $row, $data[2], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('D' . $row, $data[3], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('E' . $row, $data[4], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('F' . $row, $data[5], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('G' . $row, $data[6], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('H' . $row, $tgl, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('I' . $row, $wkt, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('J' . $row, $data[9], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('K' . $row, $data[10], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('L' . $row, $data[11], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('M' . $row, $data[12], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('N' . $row, $data[13], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('O' . $row, $data[14], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('P' . $row, $data[15], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('Q' . $row, $data[16], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('R' . $row, $data[17], PHPExcel_Cell_DataType::TYPE_STRING);

    $row++; // pindah ke row bawahnya ($row + 1)
    $nomor++;
}

//Membuat garis di body tabel (isi data)
$excel->getActiveSheet()->setSharedStyle($bodystyle, "A5:R$row");

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$excel->setActiveSheetIndex(0);

// Mencetak File Excel 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
if ($tglawal != "" && $tglakhir != "")
{
    header('Content-Disposition: attachment;filename=rekap-bbngardu-imbang_' . $tglawal . '-to-' . $tglakhir . '.xlsx');
}
else
{
    header('Content-Disposition: attachment;filename=rekap-bbngardu-imbang.xlsx');
}
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
