<?php
include "models/m_datapenyulang.php";

$dtp = new datapenyulang($connection);

if (@$_GET['act'] == '')
{
    ?>
    <!-- Page Heading ?page=g55cx09q2 -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Data Penyulang
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <!-- mulai konten -->
    <div class="row">

        <div class="col-lg-7">
            <div class="well well-sm">
                <form action="" method="post" class="form-inline">

                    <div class="form-group">
                        <input type="text" class="form-control" id="inputan" name="inputan" value="<?php if (isset($_POST['inputan']))
                        {
                            echo $_POST['inputan'];
                        } ?>" placeholder="Cari ID / Penyulang...">
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
                                <h4 class="modal-title">Tambah Data Baru</h4>
                            </div>

                            <form id="form0" action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-add">
                                    <div class="form-group">
                                        <label class="control-label" for="id_gp">ID Gardu Penyulang</label>
                                        <input type="text" name="id_gp" class="form-control" id="id_gp" placeholder="Masukkan ID Gardu Penyulang" required>
                                        <span id="result"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="nm_gp">Nama Penyulang</label>
                                        <input type="text" name="nm_gp" class="form-control" id="nm_gp" placeholder="Masukkan Nama Penyulang" required>
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
                                $id_gp = $connection->conn->real_escape_string($_POST['id_gp']);
                                $nm_gp = $connection->conn->real_escape_string($_POST['nm_gp']);

                                $dtp->tambah($id_gp, $nm_gp);

                                echo "<script>alert('Data berhasil disimpan');</script>";

                                echo "<script>window.location='?page=g55cx09q2';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <!-- zonk -->
        </div>

        <div class="col-lg-7">

            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tabel" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Opsi</th>
                            <th>ID Gardu Penyulang</th>
                            <th>Nama Penyulang</th>

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
                                $tampil = $dtp->cari($inputan);
                            }
                            else
                            {
                                $tampil = $dtp->tampil();
                            }
                        }
                        else
                        {
                            $tampil = $dtp->tampil();
                        }

                        $cek = $tampil->num_rows;
                        if ($cek < 1)
                        {
                            ?>
                            <tr>
                                <td colspan="3">Data tidak ditemukan</td>
                            </tr>
                            <?php
                        }
                        else
                        {

                            while ($row = $tampil->fetch_array())
                            {

                                echo "<tr>
										<td class='tmpil-tooltip'>
										<a id='edit_gp' data-toggle='modal' data-target='#edit' data-id='$row[0]' data-idgp='$row[0]' data-nmgp='$row[1]'>
										<button class='btn btn-info btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Ubah Data'><i class='fa fa-edit'></i></button></a>";

                                if (@$_SESSION['Admin'])
                                {
                                    echo "
										<a href='?page=g55cx09q2&act=del&no=$row[0]' onClick='return confirm(`Yakin ingin menghapus data ini?`)'>
										<button class='btn btn-danger btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button></a>";
                                }
                                echo "
										</td>
                                        <td>$row[0]</td>
                                        <td>$row[1]</td>
                                    	</tr>
										";
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
                            <h4 class="modal-title">Perbarui Data Penyulang</h4>
                        </div>

                        <form id="form" enctype="multipart/form-data">
                            <div class="modal-body" id="modal-edit">
                                <div class="form-group">
                                    <label class="control-label" for="id_gp">ID Gardu Penyulang</label>
                                    <input type="text" name="id_gp" class="form-control" id="id_gp" placeholder="Masukkan ID Gardu Penyulang" disabled>
                                </div>

                                <input type="hidden" name="id_garpen" id="id_garpen">

                                <div class="form-group">
                                    <label class="control-label" for="nm_gp">Nama Penyulang</label>
                                    <input type="text" name="nm_gp" class="form-control" id="nm_gp" placeholder="Masukkan Nama Penyulang" required>
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
                                $("#modal-add #id_gp").keyup(function ()
                                {
                                    var id_gp = $(this).val();

                                    if (id_gp.length > 1)
                                    {
                                        $("#modal-add #result").html('checking...');

                                        $.post("config/valid_idgp.php", $("#form0").serialize())
                                            .done(function (data)
                                            {
                                                $("#modal-add #result").html(data);
                                            });

                                        $.ajax({

                                            type: 'POST',
                                            url: 'config/valid_idgp.php',
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

                            $(document).on("click", "#edit_gp", function ()
                            {

                                var id_grd = $(this).data('id');

                                var idgp_grd = $(this).data('idgp');
                                var nmgp_grd = $(this).data('nmgp');


                                $("#modal-edit #id_garpen").val(id_grd);

                                $("#modal-edit #id_gp").val(idgp_grd);
                                $("#modal-edit #nm_gp").val(nmgp_grd);
                            })

                            $(document).ready(function (e)
                            {
                                $("#form").on("submit", (function (e)
                                {
                                    e.preventDefault();
                                    $.ajax({
                                        url: 'models/pcss_editgp.php',
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
                            })
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
    $dgi->hapus($_GET['no']);

    echo "<script>alert('Data terhapus');</script>";

    echo "<script>window.location='?page=g55cx09q2';</script>";
}
?>
