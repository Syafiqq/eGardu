<?php
include "models/m_datagarduinduk.php";

$dgi = new datagarduinduk($connection);

if (@$_GET['act'] == '')
{
    ?>
    <!-- Page Heading ?page=j9e3x2n9 -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Data Gardu Induk
            </h1>
        </div>
    </div>
    <!-- /.row -->
    <!-- mulai konten -->
    <div class="row">

        <div class="col-lg-8">
            <div class="well well-sm">
                <form action="" method="post" class="form-inline">

                    <div class="form-group">
                        <input type="text" class="form-control" id="inputan" name="inputan" value="<?php if (isset($_POST['inputan']))
                        {
                            echo $_POST['inputan'];
                        } ?>" placeholder="Cari ID / Nama Gardu Induk...">
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
                                        <label class="control-label" for="id_gi">ID Gardu Induk</label>
                                        <input type="text" name="id_gi" class="form-control" id="id_gi" placeholder="Masukkan ID Gardu Induk" required>
                                        <span id="result"></span>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label" for="nm_gi">Nama Gardu Induk</label>
                                        <input type="text" name="nm_gi" class="form-control" id="nm_gi" placeholder="Masukkan Nama Gardu Induk" required>
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
                                $id_gi = $connection->conn->real_escape_string($_POST['id_gi']);
                                $nm_gi = $connection->conn->real_escape_string($_POST['nm_gi']);

                                $dgi->tambah($id_gi, $nm_gi);

                                echo "<script>alert('Data berhasil disimpan');</script>";

                                echo "<script>window.location='?page=j9e3x2n9';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- zonk -->
        </div>

        <div class="col-lg-8">

            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tabel" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Opsi</th>
                            <th>ID Gardu Induk</th>
                            <th>Nama Gardu Induk</th>
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
                                $tampil = $dgi->cari($inputan);
                            }
                            else
                            {
                                $tampil = $dgi->tampil();
                            }
                        }
                        else
                        {
                            $tampil = $dgi->tampil();
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
										<a id='edit_gi' data-toggle='modal' data-target='#edit' data-id='$row[0]' data-idgi='$row[0]' data-nmgi='$row[1]'>
										<button class='btn btn-info btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Ubah Data'><i class='fa fa-edit'></i></button></a>";

                                if (@$_SESSION['Admin'])
                                {
                                    echo "
										<a href='?page=j9e3x2n9&act=del&no=$row[0]' onClick='return confirm(`Yakin ingin menghapus data ini?`)'>
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
                            <h4 class="modal-title">Perbarui Data Gardu Induk</h4>
                        </div>

                        <form id="form" enctype="multipart/form-data">
                            <div class="modal-body" id="modal-edit">
                                <div class="form-group">
                                    <label class="control-label" for="id_gi">ID Gardu Induk</label>
                                    <input type="text" name="id_gi" class="form-control" id="id_gi" placeholder="Masukkan ID Gardu Induk" disabled>
                                </div>

                                <input type="hidden" name="id_garind" id="id_garind">

                                <div class="form-group">
                                    <label class="control-label" for="nm_gi">Nama Gardu Induk</label>
                                    <input type="text" name="nm_gi" class="form-control" id="nm_gi" placeholder="Masukkan Nama Gardu Induk" required>
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
                                $("#modal-add #id_gi").keyup(function ()
                                {
                                    var id_gi = $(this).val();

                                    if (id_gi.length > 1)
                                    {
                                        $("#modal-add #result").html('checking...');

                                        $.post("config/valid_idgi.php", $("#form0").serialize())
                                            .done(function (data)
                                            {
                                                $("#modal-add #result").html(data);
                                            });

                                        $.ajax({

                                            type: 'POST',
                                            url: 'config/valid_idgi.php',
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

                            $(document).on("click", "#edit_gi", function ()
                            {

                                var id_grd = $(this).data('id');

                                var idgi_grd = $(this).data('idgi');
                                var nmgi_grd = $(this).data('nmgi');


                                $("#modal-edit #id_garind").val(id_grd);

                                $("#modal-edit #id_gi").val(idgi_grd);
                                $("#modal-edit #nm_gi").val(nmgi_grd);
                            })

                            $(document).ready(function (e)
                            {
                                $("#form").on("submit", (function (e)
                                {
                                    e.preventDefault();
                                    $.ajax({
                                        url: 'models/pcss_editgi.php',
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

    echo "<script>window.location='?page=j9e3x2n9';</script>";
}
?>
