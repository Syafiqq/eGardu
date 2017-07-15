<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kelolagardu_db";

$dbcon = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

if ($_POST)
{
    $id_gi = strip_tags($_POST['id_gi']);

    $stmt = $dbcon->prepare("SELECT id_tb_gardu_induk FROM datagarduinduk_tb WHERE id_tb_gardu_induk =:id_gi");
    $stmt->execute(array(':id_gi' => $id_gi));
    $count = $stmt->rowCount();

    if ($count > 0)
    {
        echo "<span style='color:brown;'>Maaf, ID telah Digunakan</span>";
    }
    else
    {
        echo "<span style='color:green;'>ID dapat Digunakan</span>";
    }
}
?>
