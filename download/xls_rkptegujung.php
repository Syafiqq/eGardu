<?php
//Membuat Koneksi Mysql
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_rekaptegujung.php";

$connection = new Database($host, $user, $pass, $database);
$rtu = new rekaptegujung($connection);

$tglawal = $connection->conn->real_escape_string(@$_POST['tglawal']);
$tglakhir = $connection->conn->real_escape_string(@$_POST['tglakhir']);

//Membuat Query 
if ($tglawal != "" && $tglakhir != "")
{
    $tampil = $rtu->filter($tglawal, $tglakhir);
}
else
{
    $tampil = $rtu->tampil();
}

require_once '../assets/PHPExcel/Classes/PHPExcel.php';
$excel = new PHPExcel();

// Set document properties
$excel->getProperties()->setCreator("Eka Yuliana")
    ->setLastModifiedBy("PLN Bali Selatan")
    ->setTitle("Rekapitulasi Tegangan Ujung")
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
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(18);
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(18);

// Mergecell, menyatukan beberapa kolom
$excel->setActiveSheetIndex(0)->mergeCells('A1:O1');
$excel->setActiveSheetIndex(0)->mergeCells('A2:O2');
$excel->setActiveSheetIndex(0)->mergeCells('A3:O3');

$excel->setActiveSheetIndex(0)->mergeCells('A4:A5');
$excel->setActiveSheetIndex(0)->mergeCells('B4:B5');
$excel->setActiveSheetIndex(0)->mergeCells('C4:C5');
$excel->setActiveSheetIndex(0)->mergeCells('D4:D5');
$excel->setActiveSheetIndex(0)->mergeCells('E4:E5');
$excel->setActiveSheetIndex(0)->mergeCells('F4:F5');
$excel->setActiveSheetIndex(0)->mergeCells('G4:G5');
$excel->setActiveSheetIndex(0)->mergeCells('H4:H5');
$excel->setActiveSheetIndex(0)->mergeCells('I4:I5');

$excel->setActiveSheetIndex(0)->mergeCells('J4:O4');

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
        'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER),
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
//anak judul tabel
$row2 = 5;

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
    ->setCellValue('A2', 'REKAPITULASI TEGANGAN UJUNG')
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
    ->setCellValue('J' . $row, 'Status Tegangan Ujung')
    ->setCellValue('J' . $row2, 'Jurusan 1')
    ->setCellValue('K' . $row2, 'Jurusan 2')
    ->setCellValue('L' . $row2, 'Jurusan 3')
    ->setCellValue('M' . $row2, 'Jurusan 4')
    ->setCellValue('N' . $row2, 'Jurusan Khusus 1')
    ->setCellValue('O' . $row2, 'Jurusan Khusus 2');

//Menggunakan TitleStylenya
$excel->getActiveSheet()->setSharedStyle($titlestyle, "A1:O3");

//Menggunakan HeaderStylenya
$excel->getActiveSheet()->setSharedStyle($headerstyle, "A4:O5");

$nomor = 1; // set nomor urut = 1;

$row2++; // pindah ke row bawahnya. 

// lakukan perulangan untuk menuliskan data siswa
while ($data = $tampil->fetch_array())
{
    $tgl = date('d F Y', strtotime($data[7]));
    $wkt = date('H.i', strtotime($data[8]));

    $excel->setActiveSheetIndex(0)
        ->setCellValueExplicit('A' . $row2, $nomor, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('B' . $row2, $data[1], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('C' . $row2, $data[2], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('D' . $row2, $data[3], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('E' . $row2, $data[4], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('F' . $row2, $data[5], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('G' . $row2, $data[6], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('H' . $row2, $tgl, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('I' . $row2, $wkt, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('J' . $row2, $data[9], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('K' . $row2, $data[10], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('L' . $row2, $data[11], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('M' . $row2, $data[12], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('N' . $row2, $data[13], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('O' . $row2, $data[14], PHPExcel_Cell_DataType::TYPE_STRING);

    $row2++; // pindah ke row bawahnya ($row2 + 1)
    $nomor++;
}

//Membuat garis di body tabel (isi data)
$excel->getActiveSheet()->setSharedStyle($bodystyle, "A6:O$row2");

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$excel->setActiveSheetIndex(0);

// Mencetak File Excel 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
if ($tglawal != "" && $tglakhir != "")
{
    header('Content-Disposition: attachment;filename=rekap-teg-ujung_' . $tglawal . '-to-' . $tglakhir . '.xlsx');
}
else
{
    header('Content-Disposition: attachment;filename=rekap-teg-ujung.xlsx');
}
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
