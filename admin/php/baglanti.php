<?php
/*
mysqli_connect("localhost", "root", "") or
    die("could not connect: " . mysql_error());
mysql_select_db("site");
*/


$hostadresi        =	"localhost";
$kullaniciadi      =	"root";
$sifre             =	"";
$veritabani        =	"site";

$baglanti = mysqli_connect($hostadresi,$kullaniciadi,$sifre,$veritabani);
if (mysqli_connect_errno())
{
    echo "MySQL bağlantısı başarısız: " . mysqli_connect_error();

}

$AnaSayfa = "http://localhost/site/index.php";

$baglanti->set_charset("utf8");
$baglanti->query('SET NAMES utf8');




 ?>
