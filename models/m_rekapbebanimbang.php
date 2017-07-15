<?php

class rekapbbnimbang
{

    private $mysqli;

    function __construct($conn)
    {
        $this->mysqli = $conn;
    }

    public function tampil()
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM v_rekap_garduimbangfix ORDER BY id_ukur_gardu";

        $query = $db->query($sql) or die ($db->error);

        return $query;

    }

    public function filter($tglawal, $tglakhir)
    {
        $db = $this->mysqli->conn;
        $sql = "SELECT * FROM v_rekap_garduimbangfix WHERE DATE_FORMAT(tgl_pengukuran,'%m/%d/%Y')>='$tglawal' and DATE_FORMAT(tgl_pengukuran,'%m/%d/%Y')<='$tglakhir' ORDER BY id_ukur_gardu";

        $query = $db->query($sql) or die ($db->error);

        return $query;
    }

}

?>
