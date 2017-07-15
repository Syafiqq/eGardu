<?php
include "models/m_rekapukurgardu.php";

$dug = new dataukurgardu($connection);
?>
<!-- Page Heading ?page=gncg67nh8 -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Rekapitulasi Data Pengukuran Gardu
        </h1>
    </div>
</div>
<!-- /.row -->
<!-- mulai konten -->
<div class="row">

    <div class="col-lg-12">

        <div class="well well-sm">

            <form action="" method="post" class="form-inline">

                <div class="form-group">
                    <label for="tglawal">Dari tanggal:</label>
                    <input type="text" class="form-control" id="tglawal" name="tglawal" value="<?php if (isset($_POST['tglawal']))
                    {
                        echo $_POST['tglawal'];
                    } ?>">
                </div>
                <div class="form-group">
                    <label for="tglakhir">Sampai dengan:</label>
                    <input type="text" class="form-control" id="tglakhir" name="tglakhir" value="<?php if (isset($_POST['tglakhir']))
                    {
                        echo $_POST['tglakhir'];
                    } ?>">
                </div>

                <input type="submit" class="btn btn-default" value="Filter" name="filter">

                <div style="float: right">
                    <button type="submit" class="btn btn-success" formaction="download/xls_rkpukurgardu.php">
                        <i class="fa fa-download"></i>
                        Unduh
                    </button>
                </div>

            </form>

        </div>

    </div>

</div>

<div class="row">

    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <table id="tabel" class="table table-bordered table-hover table-striped">
                    <thead style="background-color: #fff">
                    <tr>
                        <th rowspan="2" style="vertical-align:middle">No. Gardu</th>
                        <th rowspan="2" style="vertical-align:middle">Gardu Induk</th>
                        <th rowspan="2" style="vertical-align:middle">Penyulang</th>
                        <th rowspan="2" style="vertical-align:middle">Lokasi</th>
                        <th rowspan="2" style="vertical-align:middle">Latitude</th>
                        <th rowspan="2" style="vertical-align:middle">Longitude</th>
                        <th rowspan="2" style="vertical-align:middle">Nama Petugas 1</th>
                        <th rowspan="2" style="vertical-align:middle">Nama Petugas 2</th>
                        <th rowspan="2" style="vertical-align:middle">No. Kontrak</th>
                        <th rowspan="2" style="vertical-align:middle">Tgl Pengukuran</th>
                        <th rowspan="2" style="vertical-align:middle">Waktu Pengukuran</th>
                        <th rowspan="2" style="vertical-align:middle">Arus R</th>
                        <th rowspan="2" style="vertical-align:middle">Arus S</th>
                        <th rowspan="2" style="vertical-align:middle">Arus T</th>
                        <th rowspan="2" style="vertical-align:middle">Arus N</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan RN</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan SN</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan TN</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan RS</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan RT</th>
                        <th rowspan="2" style="vertical-align:middle">Tegangan ST</th>
                        <th colspan="11">Jurusan 1</th>
                        <th colspan="11">Jurusan 2</th>
                        <th colspan="11">Jurusan 3</th>
                        <th colspan="11">Jurusan 4</th>
                        <th colspan="11">Jurusan Khusus 1</th>
                        <th colspan="11">Jurusan Khusus 2</th>

                    </tr>
                    <tr>
                        <!-- Jurusan 1 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>

                        <!-- Jurusan 2 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>

                        <!-- Jurusan 3 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>

                        <!-- Jurusan 4 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>

                        <!-- Jurusan Khusus 1 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>

                        <!-- Jurusan Khusus 2 -->
                        <th>ID Jurusan</th>
                        <th>Arus R</th>
                        <th>Arus S</th>
                        <th>Arus T</th>
                        <th>Arus N</th>
                        <th>Tegangan RN</th>
                        <th>Tegangan SN</th>
                        <th>Tegangan TN</th>
                        <th>Tegangan RS</th>
                        <th>Tegangan RT</th>
                        <th>Tegangan ST</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $tglawal = $connection->conn->real_escape_string(@$_POST['tglawal']);
                    $tglakhir = $connection->conn->real_escape_string(@$_POST['tglakhir']);
                    $filter = @$_POST['filter'];

                    if ($filter)
                    {
                        if ($tglawal != "" && $tglakhir != "")
                        {
                            $tampil = $dug->filter($tglawal, $tglakhir);
                        }
                        else
                        {
                            $tampil = $dug->tampil();
                        }
                    }
                    else
                    {
                        $tampil = $dug->tampil();
                    }

                    $cek = $tampil->num_rows;
                    if ($cek < 1)
                    {
                        ?>
                        <tr>
                            <td colspan="87" align="left" style="padding-left: 30px;">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    }
                    else
                    {

                        while ($row = $tampil->fetch_array())
                        {

                            $tgl = date('d F Y', strtotime($row[10]));
                            $wkt = date('H.i', strtotime($row[11]));

                            echo "<tr>
                                        <td>$row[1]</td>
                                        <td>$row[2]</td>
										<td>$row[3]</td>
										<td>$row[4]</td>
										<td>$row[5]</td>
										<td>$row[6]</td>
										<td>$row[7]</td>
										<td>$row[8]</td>
										<td>$row[9]</td>
										<td>$tgl</td>
										<td>$wkt</td>
										<td>$row[12]</td>
										<td>$row[13]</td>
										<td>$row[14]</td>
										<td>$row[15]</td>
										<td>$row[16]</td>
										<td>$row[17]</td>
										<td>$row[18]</td>
										<td>$row[19]</td>
										<td>$row[20]</td>
										<td>$row[21]</td>
										<td>$row[22]</td>
										<td>$row[23]</td>
										<td>$row[24]</td>
										<td>$row[25]</td>
										<td>$row[26]</td>
										<td>$row[27]</td>
										<td>$row[28]</td>
										<td>$row[29]</td>
										<td>$row[30]</td>
										<td>$row[31]</td>
										<td>$row[32]</td>
										<td>$row[33]</td>
										<td>$row[34]</td>
										<td>$row[35]</td>
										<td>$row[36]</td>
										<td>$row[37]</td>
										<td>$row[38]</td>
										<td>$row[39]</td>
										<td>$row[40]</td>
										<td>$row[41]</td>
										<td>$row[42]</td>
										<td>$row[43]</td>
										<td>$row[44]</td>
										<td>$row[45]</td>
										<td>$row[46]</td>
										<td>$row[47]</td>
										<td>$row[48]</td>
										<td>$row[49]</td>
										<td>$row[50]</td>
										<td>$row[51]</td>
										<td>$row[52]</td>
										<td>$row[53]</td>
										<td>$row[54]</td>
										<td>$row[55]</td>
										<td>$row[56]</td>
										<td>$row[57]</td>
										<td>$row[58]</td>
										<td>$row[59]</td>
										<td>$row[60]</td>
										<td>$row[61]</td>
										<td>$row[62]</td>
										<td>$row[63]</td>
										<td>$row[64]</td>
										<td>$row[65]</td>
										<td>$row[66]</td>
										<td>$row[67]</td>
										<td>$row[68]</td>
										<td>$row[69]</td>
										<td>$row[70]</td>
										<td>$row[71]</td>
										<td>$row[72]</td>
										<td>$row[73]</td>
										<td>$row[74]</td>
										<td>$row[75]</td>
										<td>$row[76]</td>
										<td>$row[77]</td>
										<td>$row[78]</td>
										<td>$row[79]</td>
										<td>$row[80]</td>
										<td>$row[81]</td>
										<td>$row[82]</td>
										<td>$row[83]</td>
										<td>$row[84]</td>
										<td>$row[85]</td>
										<td>$row[86]</td>
										<td>$row[87]</td>
                                    	</tr>
										";
                        }
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
