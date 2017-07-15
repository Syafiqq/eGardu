<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kelolagardu_db";

$dbcon = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

if ($_POST)
{
    $id_gp = strip_tags($_POST['id_gp']);

    $stmt = $dbcon->prepare("SELECT id_tb_gardu_penyulang FROM datagardupenyulang_tb WHERE id_tb_gardu_penyulang =:id_gp");
    $stmt->execute(array(':id_gp' => $id_gp));
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
