<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kelolagardu_db";

$dbcon = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

if ($_POST)
{
    $no_gardu = strip_tags($_POST['no_gardu']);

    $stmt = $dbcon->prepare("SELECT no_gardu FROM datagardu_tb WHERE no_gardu =:no_gardu");
    $stmt->execute(array(':no_gardu' => $no_gardu));
    $count = $stmt->rowCount();

    if ($count > 0)
    {
        echo "<span style='color:brown;'>Maaf, No. Gardu telah Digunakan</span>";
    }
    else
    {
        echo "<span style='color:green;'>No. Gardu dapat Digunakan</span>";
    }
}
?>
