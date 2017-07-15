<?php
include "models/m_datagardu.php";

$dtg = new datagardu($connection);

if (@$_GET['act'] == '')
{
    ?>
    <!-- Page Heading ?page=ms4noi32r -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Data Gardu Trafo
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
                        <input type="text" class="form-control" id="inputan" name="inputan" value="<?php if (isset($_POST['inputan']))
                        {
                            echo $_POST['inputan'];
                        } ?>" placeholder="Cari No. Gardu / Lokasi...">
                    </div>

                    <input type="submit" class="btn btn-default" value="Cari" name="cari">

                    <div style="float: right">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>

                </form>

                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Data Gardu</h4>
                            </div>

                            <form id="form0" action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-add">

                                    <div class="form-group">
                                        <label class="control-label" for="id_ginduk">ID Gardu Induk</label>
                                        <span class="tmpil-tooltip"><a data-toggle="tooltip" data-placement="bottom" title="Buat ID gardu induk baru" style="float: right" href="?page=j9e3x2n9">Buat baru</a></span>
                                        <select class="form-control" name="id_ginduk" id="id_ginduk" required>
                                            <option></option>
                                            <?php
                                            include "models/m_datagarduinduk.php";

                                            $dgi = new datagarduinduk($connection);
                                            $t_dgi = $dgi->tampil();
                                            while ($row = $t_dgi->fetch_array())
                                            {
                                                echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="id_penyulang">ID Gardu Penyulang</label>
                                        <span class="tmpil-tooltip"><a data-toggle="tooltip" data-placement="bottom" title="Buat ID penyulang baru" style="float: right" href="?page=g55cx09q2">Buat baru</a></span>
                                        <select class="form-control" name="id_penyulang" id="id_penyulang" required>
                                            <option></option>
                                            <?php
                                            include "models/m_datapenyulang.php";

                                            $dgp = new datapenyulang($connection);
                                            $t_dgp = $dgp->tampil();
                                            while ($row = $t_dgp->fetch_array())
                                            {
                                                echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="jns_gardu">Jenis Gardu</label>
                                        <select class="form-control" name="jns_gardu" id="jns_gardu">
                                            <option value="Portal">Portal</option>
                                            <option value="Cantol">Cantol</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="no_gardu">No. Gardu</label>
                                        <input class="form-control" placeholder="Masukkan No. Gardu" name="no_gardu" type="text" id="no_gardu" required>
                                        <span id="result"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="lokasi">Lokasi</label>
                                        <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Alamat">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="merk_trafo">Merk Trafo</label>
                                        <input type="text" name="merk_trafo" class="form-control" id="merk_trafo" placeholder="Masukkan Merk Trafo">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="no_seri">No. Seri Trafo</label>
                                        <input type="text" name="no_seri" class="form-control" id="no_seri" placeholder="Masukkan No. Seri Trafo">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="daya">Daya Trafo</label>
                                        <input type="text" name="daya" class="form-control" id="daya" placeholder="Masukkan Daya Trafo" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="fasa">Fasa</label>
                                        <input type="text" name="fasa" class="form-control" id="fasa" placeholder="Masukkan Fasa">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="tap">Tap</label>
                                        <input type="text" name="tap" class="form-control" id="tap" placeholder="Masukkan Tap">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="jml_jurusan">Jumlah Jurusan</label>
                                        <input type="text" name="jml_jurusan" class="form-control" id="jml_jurusan" placeholder="Masukkan Jumlah Jurusan">
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="control-label" for="koordinat">Koordinat</label>
                                        <span class="tmpil-tooltip">
                            				<input type="button" class="btn btn-default" value="Generate" name="koordinat" id="koordinat" data-toggle="tooltip" data-placement="right" title="Gunakan posisi perangkat saat ini sebagai koordinat posisi gardu">
                            				</span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="lattitude">Lattitude</label>
                                        <input type="text" name="lattitude" class="form-control" id="lattitude" placeholder="Masukkan Koordinat Lattitude">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="longitude">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Masukkan Koordinat Longitude">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                    <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                                </div>
                            </form>
                            <?php
                            if (@$_POST['tambah'])
                            {
                                $id_ginduk = $connection->conn->real_escape_string($_POST['id_ginduk']);
                                $id_penyulang = $connection->conn->real_escape_string($_POST['id_penyulang']);
                                $jns_gardu = $connection->conn->real_escape_string($_POST['jns_gardu']);
                                $no_gardu = $connection->conn->real_escape_string($_POST['no_gardu']);
                                $lokasi = $connection->conn->real_escape_string($_POST['lokasi']);
                                $merk_trafo = $connection->conn->real_escape_string($_POST['merk_trafo']);
                                $no_seri = $connection->conn->real_escape_string($_POST['no_seri']);
                                $daya = $connection->conn->real_escape_string($_POST['daya']);
                                $fasa = $connection->conn->real_escape_string($_POST['fasa']);
                                $tap = $connection->conn->real_escape_string($_POST['tap']);
                                $jml_jurusan = $connection->conn->real_escape_string($_POST['jml_jurusan']);
                                $lattitude = $connection->conn->real_escape_string($_POST['lattitude']);
                                $longitude = $connection->conn->real_escape_string($_POST['longitude']);

                                $dtg->tambah($id_ginduk, $id_penyulang, $jns_gardu, $no_gardu, $lokasi, $merk_trafo, $no_seri, $daya, $fasa, $tap, $jml_jurusan, $lattitude, $longitude);

                                echo "<script>alert('Data berhasil disimpan');</script>";

                                echo "<script>window.location='?page=ms4noi32r';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tabel" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr style="background: #fff">
                            <th>Opsi</th>
                            <th>ID Gardu Induk</th>
                            <th>ID Gardu Penyulang</th>
                            <th>No. Gardu</th>

                            <th width="36%">Lokasi</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $inputan = $connection->conn->real_escape_string(@$_POST['inputan']);
                        $cari = @$_POST['cari'];

                        if ($cari)
                        {
                            if ($inputan != "")
                            {
                                $tampil = $dtg->cari($inputan);
                            }
                            else
                            {
                                $tampil = $dtg->tampil();
                            }
                        }
                        else
                        {
                            $tampil = $dtg->tampil();
                        }

                        $cek = $tampil->num_rows;
                        if ($cek < 1)
                        {
                            ?>
                            <tr>
                                <td colspan="6">Data tidak ditemukan</td>
                            </tr>
                            <?php
                        }
                        else
                        {

                            while ($row = $tampil->fetch_array())
                            {

                                echo "<tr>
											<td class='tmpil-tooltip'>
												<a id='edit_gardu' data-toggle='modal' data-target='#edit' data-id='$row[3]' data-idgi='$row[0]' data-idgp='$row[1]' data-jg='$row[2]' data-nog='$row[3]' data-lokasi='$row[4]' data-merk='$row[5]' data-seri='$row[6]' data-daya='$row[7]' data-fasa='$row[8]' data-tap='$row[9]' data-jmlj='$row[10]' data-lat='$row[11]' data-longi='$row[12]'>
												<button class='btn btn-info btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Ubah Data'><i class='fa fa-edit'></i></button></a>";

                                if (@$_SESSION['Admin'])
                                {
                                    echo "<a href='?page=ms4noi32r&act=del&no=$row[3]' onClick='return confirm(`Yakin ingin menghapus data ini?`)'>
												<button class='btn btn-danger btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button></a>";
                                }
                                echo "
											</td>
                                    		<td>$row[0]</td>
                                    		<td>$row[1]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td><a href='?page=ms4noi32r&id=$row[3]'>Detail</a></td>
                                		</tr>";


                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="edit" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Perbarui Data Gardu</h4>
                        </div>

                        <form id="form" enctype="multipart/form-data">
                            <div class="modal-body" id="modal-edit">

                                <div class="form-group">
                                    <label class="control-label" for="id_ginduk">ID Gardu Induk</label>
                                    <select class="form-control" name="id_ginduk" id="id_ginduk" disabled>
                                        <option></option>
                                        <?php

                                        $te_dgi = $dgi->tampil();
                                        while ($row = $te_dgi->fetch_array())
                                        {
                                            echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="id_penyulang">ID Gardu Penyulang</label>
                                    <select class="form-control" name="id_penyulang" id="id_penyulang" disabled>
                                        <option></option>
                                        <?php

                                        $te_dgp = $dgp->tampil();
                                        while ($row = $te_dgp->fetch_array())
                                        {
                                            echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="jns_gardu">Jenis Gardu</label>
                                    <select class="form-control" name="jns_gardu" id="jns_gardu">
                                        <option value="Portal">Portal</option>
                                        <option value="Cantol">Cantol</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="no_gardu">No. Gardu</label>
                                    <input class="form-control" placeholder="Masukkan No. Gardu" name="no_gardu" id="no_gardu" disabled>
                                </div>

                                <input type="hidden" name="id_gardu" id="id_gardu">

                                <div class="form-group">
                                    <label class="control-label" for="lokasi">Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" id="lokasi" placeholder="Masukkan Alamat">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="merk_trafo">Merk Trafo</label>
                                    <input type="text" name="merk_trafo" class="form-control" id="merk_trafo" placeholder="Masukkan Merk Trafo">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="no_seri">No. Seri Trafo</label>
                                    <input type="text" name="no_seri" class="form-control" id="no_seri" placeholder="Masukkan No. Seri Trafo">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="daya">Daya Trafo</label>
                                    <input type="text" name="daya" class="form-control" id="daya" placeholder="Masukkan Daya Trafo" disabled>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="fasa">Fasa</label>
                                    <input type="text" name="fasa" class="form-control" id="fasa" placeholder="Masukkan Fasa">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="tap">Tap</label>
                                    <input type="text" name="tap" class="form-control" id="tap" placeholder="Masukkan Tap">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="jml_jurusan">Jumlah Jurusan</label>
                                    <input type="text" name="jml_jurusan" class="form-control" id="jml_jurusan" placeholder="Masukkan Jumlah Jurusan">
                                </div>

                                <div class="form-group form-inline">
                                    <label class="control-label" for="koordinat">Koordinat</label>
                                    <span class="tmpil-tooltip">
                            				<input type="button" class="btn btn-default" value="Generate" name="koordinat" id="koordinat" data-toggle="tooltip" data-placement="right" title="Gunakan posisi perangkat saat ini sebagai koordinat posisi gardu">
                            				</span>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="lattitude">Lattitude</label>
                                    <input type="text" name="lattitude" class="form-control" id="lattitude" placeholder="Masukkan Koordinat Lattitude">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="longitude">Longitude</label>
                                    <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Masukkan Koordinat Longitude">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" name="edit" value="Simpan">
                            </div>
                        </form>


                        <script src="assets/vendor/jquery/jquery.min.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function ()
                            {
                                $("#modal-add #no_gardu").keyup(function ()
                                {
                                    var no_gardu = $(this).val();

                                    if (no_gardu.length > 6)
                                    {
                                        $("#modal-add #result").html('checking...');

                                        $.post("config/valid_nogardu.php", $("#form0").serialize())
                                            .done(function (data)
                                            {
                                                $("#modal-add #result").html(data);
                                            });

                                        $.ajax({

                                            type: 'POST',
                                            url: 'config/valid_nogardu.php',
                                            data: $(this).serialize(),
                                            success: function (data)
                                            {
                                                $("#modal-add #result").html(data);
                                            }
                                        });
                                        return false;

                                    }
                                    else
                                    {
                                        $("#modal-add #result").html('');
                                    }
                                });

                            });


                            $(document).on("click", "#edit_gardu", function ()
                            {

                                var id_grd = $(this).data('id');

                                var idgi_grd = $(this).data('idgi');
                                var idgp_grd = $(this).data('idgp');
                                var jg_grd = $(this).data('jg');
                                var nog_grd = $(this).data('nog');
                                var lokasi_grd = $(this).data('lokasi');
                                var merk_grd = $(this).data('merk');
                                var seri_grd = $(this).data('seri');
                                var daya_grd = $(this).data('daya');
                                var fasa_grd = $(this).data('fasa');
                                var tap_grd = $(this).data('tap');
                                var jmlj_grd = $(this).data('jmlj');
                                var lat_grd = $(this).data('lat');
                                var longi_grd = $(this).data('longi');


                                $("#modal-edit #id_gardu").val(id_grd);

                                $("#modal-edit #id_ginduk").val(idgi_grd);
                                $("#modal-edit #id_penyulang").val(idgp_grd);
                                $("#modal-edit #jns_gardu").val(jg_grd);
                                $("#modal-edit #no_gardu").val(nog_grd);
                                $("#modal-edit #lokasi").val(lokasi_grd);
                                $("#modal-edit #merk_trafo").val(merk_grd);
                                $("#modal-edit #no_seri").val(seri_grd);
                                $("#modal-edit #daya").val(daya_grd);
                                $("#modal-edit #fasa").val(fasa_grd);
                                $("#modal-edit #tap").val(tap_grd);
                                $("#modal-edit #jml_jurusan").val(jmlj_grd);
                                $("#modal-edit #lattitude").val(lat_grd);
                                $("#modal-edit #longitude").val(longi_grd);
                            })

                            $(document).ready(function (e)
                            {
                                $("#form").on("submit", (function (e)
                                {
                                    e.preventDefault();
                                    $.ajax({
                                        url: 'models/pcss_editgardu.php',
                                        type: 'POST',
                                        data: new FormData(this),
                                        contentType: false,
                                        cache: false,
                                        processData: false,
                                        success: function (msg)
                                        {
                                            $('.table').html(msg);
                                        }

                                    });
                                }));
                            });

                            $(document).ready(function (f)
                            {
                                $("#form0").on("click", "#koordinat", (function (f)
                                {
                                    f.preventDefault();

                                    navigator.geolocation.getCurrentPosition(function (position)
                                    {

                                        // Get the coordinates of the current possition.
                                        var lat = position.coords.latitude;
                                        var lng = position.coords.longitude;

                                        $('#modal-add #lattitude').val(lat);
                                        $('#modal-add #longitude').val(lng);
                                    });
                                }));
                            });

                            $(document).ready(function (f)
                            {
                                $("#form").on("click", "#koordinat", (function (f)
                                {
                                    f.preventDefault();

                                    navigator.geolocation.getCurrentPosition(function (position)
                                    {

                                        // Get the coordinates of the current possition.
                                        var lat = position.coords.latitude;
                                        var lng = position.coords.longitude;

                                        $('#modal-edit #lattitude').val(lat);
                                        $('#modal-edit #longitude').val(lng);
                                    });
                                }));
                            });
                        </script>

                    </div>
                </div>
            </div>


        </div>

    </div>
    <?php
}
else if (@$_GET['act'] == 'del')
{
    $dtg->hapus($_GET['no']);

    echo "<script>alert('Data terhapus');</script>";

    echo "<script>window.location='?page=ms4noi32r';</script>";
}
?>
