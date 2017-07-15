<?php
//Membuat Koneksi Mysql
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_rekapukurgardu.php";

$connection = new Database($host, $user, $pass, $database);
$dug = new dataukurgardu($connection);

$tglawal = $connection->conn->real_escape_string(@$_POST['tglawal']);
$tglakhir = $connection->conn->real_escape_string(@$_POST['tglakhir']);

//Membuat Query 
if ($tglawal != "" && $tglakhir != "")
{
    $tampil = $dug->filter($tglawal, $tglakhir);
}
else
{
    $tampil = $dug->tampil();
}

require_once '../assets/PHPExcel/Classes/PHPExcel.php';
$excel = new PHPExcel();

// Set document properties
$excel->getProperties()->setCreator("Eka Yuliana")
    ->setLastModifiedBy("PLN Bali Selatan")
    ->setTitle("Rekapitulasi Data Pengukuran Gardu")
    ->setSubject("PLN")
    ->setCategory("Rahasia");

// Set lebar kolom
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(5);

foreach (range('B', 'D') as $columnID)
{
    $excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(20);
}

$excel->getActiveSheet()->getColumnDimension('E')->setWidth(50);

foreach (range('F', 'G') as $columnID)
{
    $excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(18);
}

$excel->getActiveSheet()->getColumnDimension('H')->setWidth(23);
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(23);
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);

foreach (range('K', 'V') as $columnID)
{
    $excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(18);
}

for ($col = 'W'; $col !== 'CK'; $col++)
{
    $excel->getActiveSheet()
        ->getColumnDimension($col)
        ->setAutoSize(true);
}

// Mergecell, menyatukan beberapa kolom
$excel->setActiveSheetIndex(0)->mergeCells('A1:CJ1');
$excel->setActiveSheetIndex(0)->mergeCells('A2:CJ2');
$excel->setActiveSheetIndex(0)->mergeCells('A3:CJ3');

$excel->setActiveSheetIndex(0)->mergeCells('A4:A5');
$excel->setActiveSheetIndex(0)->mergeCells('B4:B5');
$excel->setActiveSheetIndex(0)->mergeCells('C4:C5');
$excel->setActiveSheetIndex(0)->mergeCells('D4:D5');
$excel->setActiveSheetIndex(0)->mergeCells('E4:E5');
$excel->setActiveSheetIndex(0)->mergeCells('F4:F5');
$excel->setActiveSheetIndex(0)->mergeCells('G4:G5');
$excel->setActiveSheetIndex(0)->mergeCells('H4:H5');
$excel->setActiveSheetIndex(0)->mergeCells('I4:I5');
$excel->setActiveSheetIndex(0)->mergeCells('J4:J5');
$excel->setActiveSheetIndex(0)->mergeCells('K4:K5');
$excel->setActiveSheetIndex(0)->mergeCells('L4:L5');
$excel->setActiveSheetIndex(0)->mergeCells('M4:M5');
$excel->setActiveSheetIndex(0)->mergeCells('N4:N5');
$excel->setActiveSheetIndex(0)->mergeCells('O4:O5');
$excel->setActiveSheetIndex(0)->mergeCells('P4:P5');
$excel->setActiveSheetIndex(0)->mergeCells('Q4:Q5');
$excel->setActiveSheetIndex(0)->mergeCells('R4:R5');
$excel->setActiveSheetIndex(0)->mergeCells('S4:S5');
$excel->setActiveSheetIndex(0)->mergeCells('T4:T5');
$excel->setActiveSheetIndex(0)->mergeCells('U4:U5');
$excel->setActiveSheetIndex(0)->mergeCells('V4:V5');

$excel->setActiveSheetIndex(0)->mergeCells('W4:AG4');
$excel->setActiveSheetIndex(0)->mergeCells('AH4:AR4');
$excel->setActiveSheetIndex(0)->mergeCells('AS4:BC4');
$excel->setActiveSheetIndex(0)->mergeCells('BD4:BN4');
$excel->setActiveSheetIndex(0)->mergeCells('BO4:BY4');
$excel->setActiveSheetIndex(0)->mergeCells('BZ4:CJ4');

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

    $rentang = 'Pada Tanggal ' . $tglstart . ' s/d ' . $tglend;
}
else
{
    $rentang = '';
}

// Tulis judul tabel   
$excel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'PT. PLN (Persero) Area Bali Selatan')
    ->setCellValue('A2', 'REKAPITULASI DATA PENGUKURAN GARDU')
    ->setCellValue('A3', $rentang)
    ->setCellValue('A' . $row, 'No')
    ->setCellValue('B' . $row, 'No. Gardu')
    ->setCellValue('C' . $row, 'Gardu Induk')
    ->setCellValue('D' . $row, 'Penyulang')
    ->setCellValue('E' . $row, 'Lokasi')
    ->setCellValue('F' . $row, 'Latitude')
    ->setCellValue('G' . $row, 'Longitude')
    ->setCellValue('H' . $row, 'Nama Petugas 1')
    ->setCellValue('I' . $row, 'Nama Petugas 2')
    ->setCellValue('J' . $row, 'No. Kontrak')
    ->setCellValue('K' . $row, 'Tgl Pengukuran')
    ->setCellValue('L' . $row, 'Waktu Pengukuran')
    ->setCellValue('M' . $row, 'Arus R')
    ->setCellValue('N' . $row, 'Arus S')
    ->setCellValue('O' . $row, 'Arus T')
    ->setCellValue('P' . $row, 'Arus N')
    ->setCellValue('Q' . $row, 'Tegangan RN')
    ->setCellValue('R' . $row, 'Tegangan SN')
    ->setCellValue('S' . $row, 'Tegangan TN')
    ->setCellValue('T' . $row, 'Tegangan RS')
    ->setCellValue('U' . $row, 'Tegangan RT')
    ->setCellValue('V' . $row, 'Tegangan ST')
    ->setCellValue('W' . $row, 'Jurusan 1')
    ->setCellValue('AH' . $row, 'Jurusan 2')
    ->setCellValue('AS' . $row, 'Jurusan 3')
    ->setCellValue('BD' . $row, 'Jurusan 4')
    ->setCellValue('BO' . $row, 'Jurusan Khusus 1')
    ->setCellValue('BZ' . $row, 'Jurusan Khusus 2')
    // jurusan 1
    ->setCellValue('W' . $row2, 'ID Jurusan')
    ->setCellValue('X' . $row2, 'Arus R')
    ->setCellValue('Y' . $row2, 'Arus S')
    ->setCellValue('Z' . $row2, 'Arus T')
    ->setCellValue('AA' . $row2, 'Arus N')
    ->setCellValue('AB' . $row2, 'Tegangan RN')
    ->setCellValue('AC' . $row2, 'Tegangan SN')
    ->setCellValue('AD' . $row2, 'Tegangan TN')
    ->setCellValue('AE' . $row2, 'Tegangan RS')
    ->setCellValue('AF' . $row2, 'Tegangan RT')
    ->setCellValue('AG' . $row2, 'Tegangan ST')
    // jurusan 2
    ->setCellValue('AH' . $row2, 'ID Jurusan')
    ->setCellValue('AI' . $row2, 'Arus R')
    ->setCellValue('AJ' . $row2, 'Arus S')
    ->setCellValue('AK' . $row2, 'Arus T')
    ->setCellValue('AL' . $row2, 'Arus N')
    ->setCellValue('AM' . $row2, 'Tegangan RN')
    ->setCellValue('AN' . $row2, 'Tegangan SN')
    ->setCellValue('AO' . $row2, 'Tegangan TN')
    ->setCellValue('AP' . $row2, 'Tegangan RS')
    ->setCellValue('AQ' . $row2, 'Tegangan RT')
    ->setCellValue('AR' . $row2, 'Tegangan ST')
    // jurusan 3
    ->setCellValue('AS' . $row2, 'ID Jurusan')
    ->setCellValue('AT' . $row2, 'Arus R')
    ->setCellValue('AU' . $row2, 'Arus S')
    ->setCellValue('AV' . $row2, 'Arus T')
    ->setCellValue('AW' . $row2, 'Arus N')
    ->setCellValue('AX' . $row2, 'Tegangan RN')
    ->setCellValue('AY' . $row2, 'Tegangan SN')
    ->setCellValue('AZ' . $row2, 'Tegangan TN')
    ->setCellValue('BA' . $row2, 'Tegangan RS')
    ->setCellValue('BB' . $row2, 'Tegangan RT')
    ->setCellValue('BC' . $row2, 'Tegangan ST')
    // jurusan 4
    ->setCellValue('BD' . $row2, 'ID Jurusan')
    ->setCellValue('BE' . $row2, 'Arus R')
    ->setCellValue('BF' . $row2, 'Arus S')
    ->setCellValue('BG' . $row2, 'Arus T')
    ->setCellValue('BH' . $row2, 'Arus N')
    ->setCellValue('BI' . $row2, 'Tegangan RN')
    ->setCellValue('BJ' . $row2, 'Tegangan SN')
    ->setCellValue('BK' . $row2, 'Tegangan TN')
    ->setCellValue('BL' . $row2, 'Tegangan RS')
    ->setCellValue('BM' . $row2, 'Tegangan RT')
    ->setCellValue('BN' . $row2, 'Tegangan ST')
    // jurusan khusus 1
    ->setCellValue('BO' . $row2, 'ID Jurusan')
    ->setCellValue('BP' . $row2, 'Arus R')
    ->setCellValue('BQ' . $row2, 'Arus S')
    ->setCellValue('BR' . $row2, 'Arus T')
    ->setCellValue('BS' . $row2, 'Arus N')
    ->setCellValue('BT' . $row2, 'Tegangan RN')
    ->setCellValue('BU' . $row2, 'Tegangan SN')
    ->setCellValue('BV' . $row2, 'Tegangan TN')
    ->setCellValue('BW' . $row2, 'Tegangan RS')
    ->setCellValue('BX' . $row2, 'Tegangan RT')
    ->setCellValue('BY' . $row2, 'Tegangan ST')
    // jurusan khusus 2
    ->setCellValue('BZ' . $row2, 'ID Jurusan')
    ->setCellValue('CA' . $row2, 'Arus R')
    ->setCellValue('CB' . $row2, 'Arus S')
    ->setCellValue('CC' . $row2, 'Arus T')
    ->setCellValue('CD' . $row2, 'Arus N')
    ->setCellValue('CE' . $row2, 'Tegangan RN')
    ->setCellValue('CF' . $row2, 'Tegangan SN')
    ->setCellValue('CG' . $row2, 'Tegangan TN')
    ->setCellValue('CH' . $row2, 'Tegangan RS')
    ->setCellValue('CI' . $row2, 'Tegangan RT')
    ->setCellValue('CJ' . $row2, 'Tegangan ST');

//Menggunakan TitleStylenya
$excel->getActiveSheet()->setSharedStyle($titlestyle, "A1:CJ3");

//Menggunakan HeaderStylenya
$excel->getActiveSheet()->setSharedStyle($headerstyle, "A4:CJ5");

$nomor = 1; // set nomor urut = 1;

$row2++; // pindah ke row bawahnya. 

// lakukan perulangan untuk menuliskan data siswa
while ($data = $tampil->fetch_array())
{
    $tgl = date('d F Y', strtotime($data[10]));
    $wkt = date('H.i', strtotime($data[11]));

    $excel->setActiveSheetIndex(0)
        ->setCellValueExplicit('A' . $row2, $nomor, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('B' . $row2, $data[1], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('C' . $row2, $data[2], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('D' . $row2, $data[3], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('E' . $row2, $data[4], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('F' . $row2, $data[5], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('G' . $row2, $data[6], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('H' . $row2, $data[7], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('I' . $row2, $data[8], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('J' . $row2, $data[9], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('K' . $row2, $tgl, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('L' . $row2, $wkt, PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('M' . $row2, $data[12], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('N' . $row2, $data[13], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('O' . $row2, $data[14], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('P' . $row2, $data[15], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('Q' . $row2, $data[16], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('R' . $row2, $data[17], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('S' . $row2, $data[18], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('T' . $row2, $data[19], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('U' . $row2, $data[20], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('V' . $row2, $data[21], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('W' . $row2, $data[22], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('X' . $row2, $data[23], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('Y' . $row2, $data[24], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('Z' . $row2, $data[25], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AA' . $row2, $data[26], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AB' . $row2, $data[27], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AC' . $row2, $data[28], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AD' . $row2, $data[29], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AE' . $row2, $data[30], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AF' . $row2, $data[31], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AG' . $row2, $data[32], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AH' . $row2, $data[33], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AI' . $row2, $data[34], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AJ' . $row2, $data[35], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AK' . $row2, $data[36], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AL' . $row2, $data[37], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AM' . $row2, $data[38], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AN' . $row2, $data[39], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AO' . $row2, $data[40], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AP' . $row2, $data[41], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AQ' . $row2, $data[42], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AR' . $row2, $data[43], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AS' . $row2, $data[44], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AT' . $row2, $data[45], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AU' . $row2, $data[46], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AV' . $row2, $data[47], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AW' . $row2, $data[48], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AX' . $row2, $data[49], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AY' . $row2, $data[50], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('AZ' . $row2, $data[51], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BA' . $row2, $data[52], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BB' . $row2, $data[53], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BC' . $row2, $data[54], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BD' . $row2, $data[55], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BE' . $row2, $data[56], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BF' . $row2, $data[57], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BG' . $row2, $data[58], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BH' . $row2, $data[59], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BI' . $row2, $data[60], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BJ' . $row2, $data[61], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BK' . $row2, $data[62], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BL' . $row2, $data[63], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BM' . $row2, $data[64], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BN' . $row2, $data[65], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BO' . $row2, $data[66], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BP' . $row2, $data[67], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BQ' . $row2, $data[68], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BR' . $row2, $data[69], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BS' . $row2, $data[70], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BT' . $row2, $data[71], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BU' . $row2, $data[72], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BV' . $row2, $data[73], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BW' . $row2, $data[74], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BX' . $row2, $data[75], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BY' . $row2, $data[76], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('BZ' . $row2, $data[77], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CA' . $row2, $data[78], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CB' . $row2, $data[79], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CC' . $row2, $data[80], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CD' . $row2, $data[81], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CE' . $row2, $data[82], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CF' . $row2, $data[83], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CG' . $row2, $data[84], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CH' . $row2, $data[85], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CI' . $row2, $data[86], PHPExcel_Cell_DataType::TYPE_STRING)
        ->setCellValueExplicit('CJ' . $row2, $data[87], PHPExcel_Cell_DataType::TYPE_STRING);

    $row2++; // pindah ke row bawahnya ($row2 + 1)
    $nomor++;
}

//Membuat garis di body tabel (isi data)
$excel->getActiveSheet()->setSharedStyle($bodystyle, "A6:CJ$row2");

// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
$excel->setActiveSheetIndex(0);

// Mencetak File Excel 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
if ($tglawal != "" && $tglakhir != "")
{
    header('Content-Disposition: attachment;filename=rekap-ukurgardu-trafo_' . $tglawal . '-to-' . $tglakhir . '.xlsx');
}
else
{
    header('Content-Disposition: attachment;filename=rekap-ukurgardu-trafo.xlsx');
}
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>
