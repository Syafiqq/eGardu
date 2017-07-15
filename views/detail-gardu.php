<?php
include "config/cek_detailgardu.php";
$ckn = new ceknogardu($connection);
$tampil = $ckn->tampil();
$cekno = $tampil->num_rows;

if ($cekno < 1)
{
    include "views/404eror.php";
}

include "models/m_detailgardu.php";

$dtlg = new detailgardu($connection);
$tampil = $dtlg->tampil();
while ($row = $tampil->fetch_array())
{
?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Detail Gardu <?php echo "$row[3]"; ?>
        </h1>
    </div>
</div>
<!-- /.row -->
<!-- mulai konten -->
<div class="row">

    <div class="col-lg-6">

        <div class="panel panel-default">
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>ID Gardu Induk :</dt>
                    <dd><?php echo "$row[0]"; ?></dd>

                    <dt>ID Gardu Penyulang :</dt>
                    <dd><?php echo "$row[1]"; ?></dd>

                    <dt>Jenis Gardu :</dt>
                    <dd><?php echo "$row[2]"; ?></dd>

                    <dt>No. Gardu :</dt>
                    <dd><?php echo "$row[3]"; ?></dd>

                    <dt>Lokasi :</dt>
                    <dd><?php echo "$row[4]"; ?></dd>

                    <dt>Merk Trafo :</dt>
                    <dd><?php echo "$row[5]"; ?></dd>

                    <dt>No. Seri Trafo :</dt>
                    <dd><?php echo "$row[6]"; ?></dd>

                    <dt>Daya Trafo :</dt>
                    <dd><?php echo "$row[7]"; ?></dd>

                    <dt>Fasa :</dt>
                    <dd><?php echo "$row[8]"; ?></dd>

                    <dt>Tap :</dt>
                    <dd><?php echo "$row[9]"; ?></dd>

                    <dt>Jumlah Jurusan :</dt>
                    <dd><?php echo "$row[10]"; ?></dd>

                    <dt>Lattitude :</dt>
                    <dd><?php echo "$row[11]"; ?></dd>

                    <dt>Longitude :</dt>
                    <dd><?php echo "$row[12]"; ?></dd>
                </dl>
            </div>
        </div>

    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Peta Lokasi
            </div>
            <div class="panel-body">

                <form role="form">
                    <div class="form-group">
                        <div id="map"></div>
                    </div>

                    <div class="form-group tmpil-tooltip">
                        <button id="setrute" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="right" title="Klik untuk menampilkan rute menuju lokasi gardu dari posisi Anda saat ini">Tampilkan Rute</button>
                    </div>

                </form>

                <script>
                    function initMap()
                    {

                        var posgardu = {lat: <?php echo "$row[11]"; ?>, lng: <?php echo "$row[12]"; ?>};

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 16,
                            center: posgardu
                        });

                        var marker = new google.maps.Marker({
                            position: posgardu,
                            map: map,
                            icon: 'assets/images/gardu-marker(32).png'
                        });

                        document.getElementById('setrute').addEventListener('click', function ()
                        {

                            var directionsService = new google.maps.DirectionsService;
                            var directionsDisplay = new google.maps.DirectionsRenderer;

                            // HTML5 geolocation.
                            // lat: position.coords.latitude,
                            // lng: position.coords.longitude
                            if (navigator.geolocation)
                            {
                                navigator.geolocation.getCurrentPosition(function (position)
                                {
                                    var posskrg = {
                                        lat: position.coords.latitude,
                                        lng: position.coords.longitude
                                    };

                                    var marker = new google.maps.Marker({
                                        position: posskrg,
                                        map: map,
                                        icon: 'assets/images/map-person.png'
                                    });

                                    directionsDisplay.setMap(map);

                                    calculateAndDisplayRoute(directionsService, directionsDisplay, posskrg, posgardu);

                                    document.getElementById('mode').addEventListener('change', function ()
                                    {
                                        calculateAndDisplayRoute(directionsService, directionsDisplay, posskrg, posgardu);
                                    });

                                });
                            }
                        });

                    }

                    function calculateAndDisplayRoute(directionsService, directionsDisplay, posskrg, posgardu)
                    {
                        directionsService.route({
                            origin: posskrg,
                            destination: posgardu,
                            travelMode: 'DRIVING'
                        }, function (response, status)
                        {
                            if (status == 'OK')
                            {
                                directionsDisplay.setDirections(response);
                            } else
                            {
                                window.alert('Directions request failed due to ' + status);
                            }
                        });
                    }

                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsl66s4Q8Cq4LLx9X88KB3uM4G2LCPUao&callback=initMap"></script>

            </div>
        </div>
    </div>
    <?php } ?>
</div>
