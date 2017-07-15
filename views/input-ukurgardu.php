<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
?>

<!-- Page Heading ?page=fn9rec98wf3 -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Form Hasil Pengukuran Gardu
        </h1>
    </div>
</div>
<!-- /.row -->
<!-- mulai konten -->
<div class="row">
    <div class="col-lg-12">

        <form action="models/pcss_ukurgardu.php" method="post" enctype="multipart/form-data">

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="no_gardu">No. Gardu</label>
                            <span class="tmpil-tooltip"><a data-toggle="tooltip" data-placement="bottom" title="Buat no. gardu baru" style="float: right" href="?page=ms4noi32r">Buat baru</a></span>
                            <select class="form-control" name="no_gardu" id="no_gardu" required>
                                <option></option>
                                <?php
                                include "models/m_datagardu.php";

                                $dtg = new datagardu($connection);
                                $t_dtg = $dtg->tampil();
                                while ($row = $t_dtg->fetch_array())
                                {
                                    echo "<option value='$row[3]'>$row[3]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="tgl_ukur">Tgl Pengukuran</label>
                            <input type="text" class="form-control" id="tgl_ukur" value="" disabled>
                            <input type="hidden" name="tgl_ukurx" id="tgl_ukurx" value="<?php
                            $today = date("Y-m-d");
                            echo $today;
                            ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="wkt_ukur">Waktu Pengukuran</label>
                            <input type="text" class="form-control" id="wkt_ukur" value="" disabled>
                            <input type="hidden" name="wkt_ukurx" id="wkt_ukurx" value="<?php
                            $today1 = date("H:i:s");
                            echo $today1;
                            ?>">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label" for="petugas1">Nama Petugas 1</label>
                            <input type="text" name="petugas1" class="form-control" id="petugas1" placeholder="Nama Petugas 1">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="petugas2">Nama Petugas 2</label>
                            <input type="text" name="petugas2" class="form-control" id="petugas2" placeholder="Nama Petugas 2">
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="no_kontrak">No. Kontrak</label>
                            <input type="text" name="no_kontrak" class="form-control" id="no_kontrak" placeholder="No. Kontrak">
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="col-lg-5">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="i_r">Arus R</label>
                                <input type="text" name="i_r" class="form-control" id="i_r" placeholder="IR" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="i_s">Arus S</label>
                                <input type="text" name="i_s" class="form-control" id="i_s" placeholder="IS" required>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="control-label" for="i_t">Arus T</label>
                                <input type="text" name="i_t" class="form-control" id="i_t" placeholder="IT" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="i_n">Arus N</label>
                                <input type="text" name="i_n" class="form-control" id="i_n" placeholder="IN" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label" for="vrn">Tegangan RN</label>
                                <input type="text" name="vrn" class="form-control" id="vrn" placeholder="VRN" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="vsn">Tegangan SN</label>
                                <input type="text" name="vsn" class="form-control" id="vsn" placeholder="VSN" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="vtn">Tegangan TN</label>
                                <input type="text" name="vtn" class="form-control" id="vtn" placeholder="VTN" required>
                            </div>

                        </div>
                        <div class="col-lg-6">

                            <div class="form-group">
                                <label class="control-label" for="vrs">Tegangan RS</label>
                                <input type="text" name="vrs" class="form-control" id="vrs" placeholder="VRS" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="vrt">Tegangan RT</label>
                                <input type="text" name="vrt" class="form-control" id="vrt" placeholder="VRT" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="vst">Tegangan ST</label>
                                <input type="text" name="vst" class="form-control" id="vst" placeholder="VST" required>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7">

                        <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        <h4 class="panel-title">
                                            <b>Jurusan Umum</b>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-pills">
                                            <li class="active">
                                                <a href="#jurusan1" data-toggle="tab">Jurusan 1</a>
                                            </li>
                                            <li>
                                                <a href="#jurusan2" data-toggle="tab">Jurusan 2</a>
                                            </li>
                                            <li>
                                                <a href="#jurusan3" data-toggle="tab">Jurusan 3</a>
                                            </li>
                                            <li>
                                                <a href="#jurusan4" data-toggle="tab">Jurusan 4</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="jurusan1">
                                                <!-- isi jurusan1 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_u1">ID Jurusan</label>
                                                        <input type="text" name="id_u1" class="form-control" id="id_u1">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_u1">Arus R</label>
                                                        <input type="text" name="ir_u1" class="form-control" id="ir_u1" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_u1">Arus S</label>
                                                        <input type="text" name="is_u1" class="form-control" id="is_u1" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_u1">Arus T</label>
                                                        <input type="text" name="it_u1" class="form-control" id="it_u1" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_u1">Arus N</label>
                                                        <input type="text" name="in_u1" class="form-control" id="in_u1" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_u1">Tegangan RN</label>
                                                        <input type="text" name="vrn_u1" class="form-control" id="vrn_u1" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_u1">Tegangan SN</label>
                                                        <input type="text" name="vsn_u1" class="form-control" id="vsn_u1" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_u1">Tegangan TN</label>
                                                        <input type="text" name="vtn_u1" class="form-control" id="vtn_u1" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_u1">Tegangan RS</label>
                                                        <input type="text" name="vrs_u1" class="form-control" id="vrs_u1" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_u1">Tegangan RT</label>
                                                        <input type="text" name="vrt_u1" class="form-control" id="vrt_u1" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_u1">Tegangan ST</label>
                                                        <input type="text" name="vst_u1" class="form-control" id="vst_u1" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusan1 -->

                                            </div>

                                            <div class="tab-pane fade" id="jurusan2">
                                                <!-- isi jurusan2 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_u2">ID Jurusan</label>
                                                        <input type="text" name="id_u2" class="form-control" id="id_u2">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_u2">Arus R</label>
                                                        <input type="text" name="ir_u2" class="form-control" id="ir_u2" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_u2">Arus S</label>
                                                        <input type="text" name="is_u2" class="form-control" id="is_u2" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_u2">Arus T</label>
                                                        <input type="text" name="it_u2" class="form-control" id="it_u2" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_u2">Arus N</label>
                                                        <input type="text" name="in_u2" class="form-control" id="in_u2" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_u2">Tegangan RN</label>
                                                        <input type="text" name="vrn_u2" class="form-control" id="vrn_u2" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_u2">Tegangan SN</label>
                                                        <input type="text" name="vsn_u2" class="form-control" id="vsn_u2" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_u2">Tegangan TN</label>
                                                        <input type="text" name="vtn_u2" class="form-control" id="vtn_u2" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_u2">Tegangan RS</label>
                                                        <input type="text" name="vrs_u2" class="form-control" id="vrs_u2" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_u2">Tegangan RT</label>
                                                        <input type="text" name="vrt_u2" class="form-control" id="vrt_u2" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_u2">Tegangan ST</label>
                                                        <input type="text" name="vst_u2" class="form-control" id="vst_u2" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusan2 -->
                                            </div>

                                            <div class="tab-pane fade" id="jurusan3">
                                                <!-- isi jurusan3 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_u3">ID Jurusan</label>
                                                        <input type="text" name="id_u3" class="form-control" id="id_u3">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_u3">Arus R</label>
                                                        <input type="text" name="ir_u3" class="form-control" id="ir_u3" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_u3">Arus S</label>
                                                        <input type="text" name="is_u3" class="form-control" id="is_u3" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_u3">Arus T</label>
                                                        <input type="text" name="it_u3" class="form-control" id="it_u3" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_u3">Arus N</label>
                                                        <input type="text" name="in_u3" class="form-control" id="in_u3" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_u3">Tegangan RN</label>
                                                        <input type="text" name="vrn_u3" class="form-control" id="vrn_u3" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_u3">Tegangan SN</label>
                                                        <input type="text" name="vsn_u3" class="form-control" id="vsn_u3" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_u3">Tegangan TN</label>
                                                        <input type="text" name="vtn_u3" class="form-control" id="vtn_u3" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_u3">Tegangan RS</label>
                                                        <input type="text" name="vrs_u3" class="form-control" id="vrs_u3" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_u3">Tegangan RT</label>
                                                        <input type="text" name="vrt_u3" class="form-control" id="vrt_u3" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_u3">Tegangan ST</label>
                                                        <input type="text" name="vst_u3" class="form-control" id="vst_u3" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusan3 -->
                                            </div>

                                            <div class="tab-pane fade" id="jurusan4">
                                                <!-- isi jurusan4 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_u4">ID Jurusan</label>
                                                        <input type="text" name="id_u4" class="form-control" id="id_u4">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_u4">Arus R</label>
                                                        <input type="text" name="ir_u4" class="form-control" id="ir_u4" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_u4">Arus S</label>
                                                        <input type="text" name="is_u4" class="form-control" id="is_u4" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_u4">Arus T</label>
                                                        <input type="text" name="it_u4" class="form-control" id="it_u4" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_u4">Arus N</label>
                                                        <input type="text" name="in_u4" class="form-control" id="in_u4" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_u4">Tegangan RN</label>
                                                        <input type="text" name="vrn_u4" class="form-control" id="vrn_u4" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_u4">Tegangan SN</label>
                                                        <input type="text" name="vsn_u4" class="form-control" id="vsn_u4" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_u4">Tegangan TN</label>
                                                        <input type="text" name="vtn_u4" class="form-control" id="vtn_u4" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_u4">Tegangan RS</label>
                                                        <input type="text" name="vrs_u4" class="form-control" id="vrs_u4" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_u4">Tegangan RT</label>
                                                        <input type="text" name="vrt_u4" class="form-control" id="vrt_u4" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_u4">Tegangan ST</label>
                                                        <input type="text" name="vst_u4" class="form-control" id="vst_u4" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusan4 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.panel-body -->
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        <h4 class="panel-title">
                                            <b>Jurusan Khusus</b>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-pills">
                                            <li class="active">
                                                <a href="#khusus1" data-toggle="tab">Jurusan Khusus 1</a>
                                            </li>
                                            <li>
                                                <a href="#khusus2" data-toggle="tab">Jurusan Khusus 2</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">

                                            <div class="tab-pane fade in active" id="khusus1">
                                                <!-- isi jurusank1 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_k1">ID Jurusan</label>
                                                        <input type="text" name="id_k1" class="form-control" id="id_k1">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_k1">Arus R</label>
                                                        <input type="text" name="ir_k1" class="form-control" id="ir_k1" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_k1">Arus S</label>
                                                        <input type="text" name="is_k1" class="form-control" id="is_k1" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_k1">Arus T</label>
                                                        <input type="text" name="it_k1" class="form-control" id="it_k1" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_k1">Arus N</label>
                                                        <input type="text" name="in_k1" class="form-control" id="in_k1" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_k1">Tegangan RN</label>
                                                        <input type="text" name="vrn_k1" class="form-control" id="vrn_k1" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_k1">Tegangan SN</label>
                                                        <input type="text" name="vsn_k1" class="form-control" id="vsn_k1" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_k1">Tegangan TN</label>
                                                        <input type="text" name="vtn_k1" class="form-control" id="vtn_k1" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_k1">Tegangan RS</label>
                                                        <input type="text" name="vrs_k1" class="form-control" id="vrs_k1" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_k1">Tegangan RT</label>
                                                        <input type="text" name="vrt_k1" class="form-control" id="vrt_k1" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_k1">Tegangan ST</label>
                                                        <input type="text" name="vst_k1" class="form-control" id="vst_k1" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusank1 -->
                                            </div>

                                            <div class="tab-pane fade" id="khusus2">
                                                <!-- isi jurusank2 -->
                                                <br>
                                                <div class="col-lg-12">
                                                    <div class="form-group form-inline">
                                                        <label class="control-label" for="id_k2">ID Jurusan</label>
                                                        <input type="text" name="id_k2" class="form-control" id="id_k2">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="ir_k2">Arus R</label>
                                                        <input type="text" name="ir_k2" class="form-control" id="ir_k2" placeholder="IR">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="is_k2">Arus S</label>
                                                        <input type="text" name="is_k2" class="form-control" id="is_k2" placeholder="IS">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="it_k2">Arus T</label>
                                                        <input type="text" name="it_k2" class="form-control" id="it_k2" placeholder="IT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="in_k2">Arus N</label>
                                                        <input type="text" name="in_k2" class="form-control" id="in_k2" placeholder="IN">
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="control-label" for="vrn_k2">Tegangan RN</label>
                                                        <input type="text" name="vrn_k2" class="form-control" id="vrn_k2" placeholder="VRN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vsn_k2">Tegangan SN</label>
                                                        <input type="text" name="vsn_k2" class="form-control" id="vsn_k2" placeholder="VSN">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vtn_k2">Tegangan TN</label>
                                                        <input type="text" name="vtn_k2" class="form-control" id="vtn_k2" placeholder="VTN">
                                                    </div>

                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrs_k2">Tegangan RS</label>
                                                        <input type="text" name="vrs_k2" class="form-control" id="vrs_k2" placeholder="VRS">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vrt_k2">Tegangan RT</label>
                                                        <input type="text" name="vrt_k2" class="form-control" id="vrt_k2" placeholder="VRT">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="vst_k2">Tegangan ST</label>
                                                        <input type="text" name="vst_k2" class="form-control" id="vst_k2" placeholder="VST">
                                                    </div>
                                                </div>
                                                <!-- /.isi jurusank2 -->
                                            </div>

                                        </div>

                                    </div>
                                    <!-- /.panel-body -->
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div style="float: right;margin-bottom: 15px">
                <button class="btn btn-default" onClick="window.location='index.php';">Kembali</button>

                <button type="reset" class="btn btn-danger">Reset</button>

                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>

            </div>

        </form>

        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ()
            {
                var tgl_ukur = jQuery('#tgl_ukur');
                var wkt_ukur = jQuery('#wkt_ukur');

                function updateTime()
                {
                    var now = new Date();
                    var dd = now.getDate();
                    var MM = now.getMonth() + 1;
                    var yy = now.getFullYear();
                    var hh = now.getHours();
                    var mm = now.getMinutes();
                    var ss = now.getSeconds();

                    if (MM < 10)
                    {
                        MM = '0' + MM;
                    }

                    if (dd < 10)
                    {
                        dd = '0' + dd;
                    }

                    if (hh < 10)
                    {
                        hh = '0' + hh;
                    }

                    if (mm < 10)
                    {
                        mm = '0' + mm;
                    }

                    if (ss < 10)
                    {
                        ss = '0' + ss;
                    }

                    console.log(MM);
                    console.log(dd);

                    console.log(hh);
                    console.log(mm);
                    console.log(ss);

                    tgl_ukur.val(yy + "-" + MM + "-" + dd);
                    wkt_ukur.val(hh + ":" + mm + ":" + ss);
                }

                updateTime();
                setInterval(updateTime, 1000); // 1 * 1000 miliseconds
            });
        </script>

    </div>
</div>
