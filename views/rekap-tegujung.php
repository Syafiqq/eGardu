<?php
include "models/m_rekaptegujung.php";

$rtu = new rekaptegujung($connection);
?>
<!-- Page Heading ?page= -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Rekapitulasi Tegangan Ujung
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
                    <button type="submit" class="btn btn-success" formaction="download/xls_rkptegujung.php">
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
                    <thead>
                    <tr style="background: #fff">
                        <th rowspan="2" style="vertical-align:middle">No. Gardu</th>
                        <th rowspan="2" style="vertical-align:middle">Gardu Induk</th>
                        <th rowspan="2" style="vertical-align:middle">Penyulang</th>
                        <th rowspan="2" style="vertical-align:middle">Lokasi</th>
                        <th rowspan="2" style="vertical-align:middle">Latitude</th>
                        <th rowspan="2" style="vertical-align:middle">Longitude</th>
                        <th rowspan="2" style="vertical-align:middle">Tgl Pengukuran</th>
                        <th rowspan="2" style="vertical-align:middle">Waktu Pengukuran</th>
                        <th colspan="6">Status Tegangan Ujung</th>
                    </tr>

                    <tr>
                        <th>Jurusan 1</th>
                        <th>Jurusan 2</th>
                        <th>Jurusan 3</th>
                        <th>Jurusan 4</th>
                        <th>Jurusan Khusus 1</th>
                        <th>Jurusan Khusus 2</th>
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
                            $tampil = $rtu->filter($tglawal, $tglakhir);
                        }
                        else
                        {
                            $tampil = $rtu->tampil();
                        }
                    }
                    else
                    {
                        $tampil = $rtu->tampil();
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

                            $tgl = date('d F Y', strtotime($row[7]));
                            $wkt = date('H.i', strtotime($row[8]));

                            echo "<tr>
                                    		<td>$row[1]</td>
                                    		<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>
                                    		<td>$row[6]</td>
											<td>$tgl</td>
											<td>$wkt</td>
											<td>$row[9]</td>
											<td>$row[10]</td>
                                    		<td>$row[11]</td>
											<td>$row[12]</td>
											<td>$row[13]</td>
											<td>$row[14]</td>
                                		</tr>";

                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
