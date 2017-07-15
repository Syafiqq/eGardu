<?php
@session_start();
require_once('config/+koneksi.php');
require_once('models/database.php');

$connection = new Database($host, $user, $pass, $database);

if (@$_SESSION['Admin'] || @$_SESSION['User'])
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


        <?php
        $page = @$_GET['page'];
        $id = @$_GET['id'];
        if ($page == "gncg67nh8" || $page == "j9e3x2n9" || $page == "g55cx09q2" || $page == "ms4noi32r" || $page == "8932neu92d23ssw" || $page == "dyh2c3bh2x32un" || $page == "mfoa3i4fcid" || $page == "jf4qo3mx2d20dsk23")
        {
            // DataTables CSS 
            ?>
            <link href="assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
            <?php
            if ($id == "")
            {
                // custom CSS
                ?>
                <style type="text/css">

                    th, td {
                        white-space: nowrap;
                        text-align: center;
                    }
                </style>
                <?php
            }
            else
            {
                // custom CSS
                ?>
                <style type="text/css">

                    th {
                        width: 35%;
                    }

                    th, td {
                        white-space: nowrap;
                    }

                    #map {
                        height: 400px;
                        width: 100%;
                    }

                    #formplus {
                        display: none
                    }

                </style>
                <?php
            }

        }

        if ($page == "gncg67nh8" || $page == "8932neu92d23ssw" || $page == "dyh2c3bh2x32un" || $page == "jf4qo3mx2d20dsk23")
        {

            ?>
            <!-- Custom JQuery UI -->
            <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
            <?php
        }
        ?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->


    </head>

    <body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" title="Sistem Pendataan Status Gardu Trafo">S I A G A</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>
                        <?php
                        if (@$_SESSION['Admin'])
                        {
                            $user_terlogin = @$_SESSION['Admin'];
                        }
                        else if (@$_SESSION['User'])
                        {
                            $user_terlogin = @$_SESSION['User'];
                        }
                        include "models/m_index.php";
                        $ixu = new indexuser($connection);
                        $tampil = $ixu->tampil($user_terlogin);
                        $data_user = $tampil->fetch_array();
                        echo $data_user[3];
                        ?>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a style="color: red">
                                <i class="fa fa-user fa-fw"></i>
                                [ <?php echo $data_user[4]; ?> ]
                            </a>
                        </li>
                        <li>
                            <a id="edit-user" data-toggle="modal" data-target="#update" data-id="<?php echo $data_user[0]; ?>" data-usr="<?php echo $data_user[1]; ?>" data-pss="<?php echo $data_user[2]; ?>" data-nmf="<?php echo $data_user[3]; ?>" data-lvl="<?php echo $data_user[4]; ?>" href="javascript:void(0)">
                                <i class="fa fa-gear fa-fw"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php">
                                <i class="fa fa-sign-out fa-fw"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-home fa-fw"></i>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-table fa-fw"></i>
                                Rekapitulasi
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=gncg67nh8">Rekap Pengukuran</a>
                                </li>
                                <li>
                                    <a href="?page=jf4qo3mx2d20dsk23">Rekap Tegangan Ujung</a>
                                </li>
                                <li>
                                    <a href="?page=dyh2c3bh2x32un">Rekap Beban Trafo</a>
                                </li>
                                <li>
                                    <a href="?page=8932neu92d23ssw">Rekap Beban Imbang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-edit fa-fw"></i>
                                Info Gardu
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=j9e3x2n9">Data Gardu Induk</a>
                                </li>
                                <li>
                                    <a href="?page=g55cx09q2">Data Gardu Penyulang</a>
                                </li>
                                <li>
                                    <a href="?page=ms4noi32r">Data Gardu</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php
                        if (@$_SESSION['Admin'])
                        {
                            ?>
                            <li>
                                <a href="?page=mfoa3i4fcid">
                                    <i class="fa fa-users fa-fw"></i>
                                    User Management
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Edit Profile -->
                <div id="update" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Profile</h4>
                            </div>

                            <form id="formx" enctype="multipart/form-data">
                                <div class="modal-body" id="modal-update">

                                    <input type="hidden" name="kode_user" id="kode_user">

                                    <div class="form-group">
                                        <label class="control-label" for="usrnm">Username</label>
                                        <input type="text" name="usrnm" class="form-control" id="usrnm" placeholder="Masukkan Username" required>
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
                                        <select class="form-control" name="level" id="level" disabled>
                                            <option value="User">User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-primary" name="update" value="Simpan">
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- /. Edit Profile -->


                <?php
                $page = @$_GET['page'];
                $id = @$_GET['id'];

                if ($page == "fn9rec98wf3")
                {
                    include "views/input-ukurgardu.php";
                }
                else if ($page == "gncg67nh8")
                {
                    include "views/rekap-ukurgardu.php";
                }
                else if ($page == "j9e3x2n9")
                {
                    include "views/data-garduinduk.php";
                }
                else if ($page == "g55cx09q2")
                {
                    include "views/data-gardupenyulang.php";
                }
                else if ($page == "ms4noi32r")
                {
                    if ($id == "")
                    {
                        include "views/data-gardu.php";
                    }
                    else
                    {
                        include "views/detail-gardu.php";
                    }
                }
                else if ($page == "jf4qo3mx2d20dsk23")
                {
                    include "views/rekap-tegujung.php";
                }
                else if ($page == "dyh2c3bh2x32un")
                {
                    include "views/rekap-bebantrafo.php";
                }
                else if ($page == "8932neu92d23ssw")
                {
                    include "views/rekap-bebanimbang.php";
                }
                else if ($page == "mfoa3i4fcid")
                {
                    include "views/data-user.php";
                }
                else if ($page == "")
                {
                    ?>

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Selamat datang, <?php echo $data_user[3]; ?> !
                            </h1>
                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- mulai konten -->
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- zonk -->
                        </div>

                        <div class="col-lg-4">
                            <br>
                            <br>
                            <button type="button" class="btn btn-primary btn-block" onClick="window.location='?page=fn9rec98wf3';">Tambah Data Pengukuran</button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-default btn-block" onClick="window.location='?page=j9e3x2n9';">Tambah Data Gardu Induk</button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-default btn-block" onClick="window.location='?page=g55cx09q2';">Tambah Data Penyulang</button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-default btn-block" onClick="window.location='?page=ms4noi32r';">Tambah Data Gardu</button>
                            <br>
                            <br>
                        </div>

                        <div class="col-lg-4">
                            <!-- zonk -->
                        </div>
                    </div>

                    <?php
                }
                else
                {
                    include "views/404eror.php";
                }
                ?>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <footer class="main-footer">
            <div style="float:right">
                Powered by PT. PLN (Persero) Area Bali Selatan.
                <br>
                Copyright &copy; 2016 Wyn Eka Yuliana. All rights reserved.
            </div>
        </footer>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <!-- Edit Profile JavaScript -->
    <script type="text/javascript">
        $(document).on("click", "#edit-user", function ()
        {

            var id_usr = $(this).data('id');

            var usr_nm = $(this).data('usr');
            var pss_usr = $(this).data('pss');
            var nmf_usr = $(this).data('nmf');
            var lvl_usr = $(this).data('lvl');


            $("#modal-update #kode_user").val(id_usr);

            $("#modal-update #usrnm").val(usr_nm);
            $("#modal-update #pass").val(pss_usr);
            $("#modal-update #nmfull").val(nmf_usr);
            $("#modal-update #level").val(lvl_usr);
        })

        $(document).ready(function (e)
        {
            $("#formx").on("submit", (function (e)
            {
                e.preventDefault();
                $.ajax({
                    url: 'models/pcss_edituser.php',
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


        $(".tmpil-tooltip").tooltip({
            selector: "[data-toggle=tooltip]",
            trigger: "hover"
        });
    </script>


    <?php
    $page = @$_GET['page'];

    if ($page == "gncg67nh8" || $page == "j9e3x2n9" || $page == "g55cx09q2" || $page == "ms4noi32r" || $page == "8932neu92d23ssw" || $page == "dyh2c3bh2x32un" || $page == "mfoa3i4fcid" || $page == "jf4qo3mx2d20dsk23")
    {
        // DataTables JavaScript
        ?>
        <script src="assets/vendor/datatables/js/jquery.dataTables.js"></script>

        <script src="assets/vendor/datatables-plugins/dataTables.bootstrap.js"></script>

        <script type="text/javascript">
            $(function ()
            {
                $("#tabel").DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "sScrollX": "100%",
                    "bScrollCollapse": true,
                    "sScrollXInner": "100%"
                });
            });
        </script>
        <?php
    }

    if ($page == "gncg67nh8" || $page == "8932neu92d23ssw" || $page == "dyh2c3bh2x32un" || $page == "jf4qo3mx2d20dsk23")
    {
        ?>
        <!-- Srcipt JQuery UI -->
        <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
        <?php
    }

    if ($page == "gncg67nh8" || $page == "jf4qo3mx2d20dsk23" || $page == "dyh2c3bh2x32un" || $page == "8932neu92d23ssw")
    {
        // datepicker query
        ?>
        <script type="text/javascript">
            $(function ()
            {
                var dateFormat = "mm/dd/yy",
                    from = $("#tglawal")
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true
                        })
                        .on("change", function ()
                        {
                            to.datepicker("option", "minDate", getDate(this));
                        }),
                    to = $("#tglakhir").datepicker({
                        defaultDate: "+1w",
                        changeMonth: true
                    })
                        .on("change", function ()
                        {
                            from.datepicker("option", "maxDate", getDate(this));
                        });

                function getDate(element)
                {
                    var date;
                    try
                    {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error)
                    {
                        date = null;
                    }

                    return date;
                }
            });
        </script>
        <?php
    }


    ?>

    </body>

    </html>

    <?php
}
else
{
    header("location: login.php");
}

?>
