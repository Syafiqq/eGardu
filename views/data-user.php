<?php
if (@$_SESSION['Admin'])
{

    include "models/m_user.php";

    $usr = new datauser($connection);

    if (@$_GET['act'] == '')
    {
        ?>
        <!-- Page Heading ?page=mfoa3i4fcid -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    User Management
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
                            } ?>" placeholder="Cari Nama / Username...">
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

                                <form id="reg-form" autocomplete="off" action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body" id="modal-add">
                                        <div class="form-group">
                                            <label class="control-label" for="usrnm">Username</label>
                                            <input type="text" name="usrnm" class="form-control" id="usrnm" placeholder="Masukkan Username" required>
                                            <span id="result"></span>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="pass">Password</label>
                                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan Password" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="nmfull">Nama Lengkap</label>
                                            <input type="text" name="nmfull" class="form-control" id="nmfull" placeholder="Masukkan Nama Lengkap" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="level">Level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option value="User">User</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer" id="modal-to">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <input type="submit" class="btn btn-primary" name="tambah" value="Simpan">
                                    </div>
                                </form>

                                <script src="assets/vendor/jquery/jquery.min.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function ()
                                    {
                                        $("#modal-add #usrnm").keyup(function ()
                                        {
                                            var usrnm = $(this).val();

                                            if (usrnm.length > 1)
                                            {
                                                $("#modal-add #result").html('checking...');

                                                $.post("config/valid_username.php", $("#reg-form").serialize())
                                                    .done(function (data)
                                                    {
                                                        $("#modal-add #result").html(data);
                                                    });

                                                $.ajax({

                                                    type: 'POST',
                                                    url: 'config/valid_username.php',
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
                                </script>

                                <?php
                                if (@$_POST['tambah'])
                                {
                                    $usrnm = $connection->conn->real_escape_string($_POST['usrnm']);
                                    $pswd = $connection->conn->real_escape_string($_POST['pass']);
                                    $nmfull = $connection->conn->real_escape_string($_POST['nmfull']);
                                    $level = $connection->conn->real_escape_string($_POST['level']);

                                    $usr->tambah($usrnm, $pswd, $nmfull, $level);

                                    echo "<script>alert('Data berhasil disimpan');</script>";

                                    echo "<script>window.location='?page=mfoa3i4fcid';</script>";
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
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Level</th>
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
                                    $tampil = $usr->cari($inputan);
                                }
                                else
                                {
                                    $tampil = $usr->tampil();
                                }
                            }
                            else
                            {
                                $tampil = $usr->tampil();
                            }

                            $cek = $tampil->num_rows;
                            if ($cek < 1)
                            {
                                ?>
                                <tr>
                                    <td colspan="4">Data tidak ditemukan</td>
                                </tr>
                                <?php
                            }
                            else
                            {

                                while ($row = $tampil->fetch_array())
                                {

                                    echo "<tr>
                                        <td class='tmpil-tooltip'>
										<a href='?page=mfoa3i4fcid&act=del&no=$row[0]' onClick='return confirm(`Yakin ingin menghapus data ini?`)'>
										<button class='btn btn-danger btn-xs' type='button' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o'></i></button></a>
										</td>
                                        <td>$row[1]</td>
										<td>$row[3]</td>
										<td>$row[4]</td>
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
        <?php
    }
    else if (@$_GET['act'] == 'del')
    {
        $usr->hapus($_GET['no']);

        echo "<script>alert('Data terhapus');</script>";

        echo "<script>window.location='?page=mfoa3i4fcid';</script>";
    }


}
else
{
    header("location: login.php");
}
?>
