<?php
@session_start();
require_once('config/+koneksi.php');
require_once('models/database.php');
include "models/m_login.php";

$connection = new Database($host, $user, $pass, $database);
$dlog = new datalogin($connection);

if (@$_SESSION['Admin'] || @$_SESSION['User'])
{
    header("location: index.php");
}
else
{
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Pendataan Status Gardu Trafo</title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="assets/vendor/metisMenu/metisMenu.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="assets/vendor/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="user" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pass" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login" value="Login" class="btn btn-lg btn-success btn-block">
                            </fieldset>
                        </form>

                        <?php
                        $user = $connection->conn->real_escape_string(@$_POST['user']);
                        $pass = $connection->conn->real_escape_string(@$_POST['pass']);
                        $login = @$_POST['login'];

                        if ($login)
                        {
                            if ($user == "" || $pass == "")
                            {
                                ?>
                                <script type="text/javascript">alert("Username atau Password Tidak Boleh Kosong");</script> <?php
                            } else
                            {
                            $tampil = $dlog->masuk($user, $pass);
                            $data = $tampil->fetch_array();
                            $cek = $tampil->num_rows;
                            if ($cek >= 1)
                            {
                                if ($data['level'] == "Admin")
                                {
                                    @$_SESSION['Admin'] = $data['kode_user'];
                                    header("location: index.php");
                                }
                                else if ($data['level'] == "User")
                                {
                                    @$_SESSION['User'] = $data['kode_user'];
                                    header("location: index.php");
                                }
                            } else
                            {
                            ?>
                                <script type="text/javascript">alert("Login Gagal");</script> <?php
                            }
                            }
                        }

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    </body>

    </html>

    <?php
}
?>
