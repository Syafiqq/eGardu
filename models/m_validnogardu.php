<?php
include "config/valid_nogardu.php";
$vng = new validnogardu($connection);

$tampil = $vng->tampil();
$cekn = $tampil->num_rows;

if ($cekn > 0)
{
    echo "<span style='color:brown;'>Maaf, Nomor telah Digunakan</span>";
}
else
{
    echo "<span style='color:green;'>Nomor Tersedia</span>";
}
?>
