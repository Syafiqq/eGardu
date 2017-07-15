<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "kelolagardu_db";

$dbcon = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pass);

if ($_POST)
{
    $usrnm = strip_tags($_POST['usrnm']);

    $stmt = $dbcon->prepare("SELECT username FROM tb_user WHERE username =:usrnm");
    $stmt->execute(array(':usrnm' => $usrnm));
    $count = $stmt->rowCount();

    if ($count > 0)
    {
        echo "<span style='color:brown;'>Maaf, Username telah Digunakan</span>";
    }
    else
    {
        echo "<span style='color:green;'>Username dapat Digunakan</span>";
    }
}
?>
