<?php

include("php/baglanti.php");

/*
//içerik ekle

if(isset($_POST['submit'])) {

$BASLIK = $_POST['BASLIK'];
$ICERIK = $_POST['ICERIK'];
$TARIH=date('Y-m-d H:i:s');
$DURUM=$_POST['DURUM'];
$post_comment_number=$_POST['post_comment_number'];




$KATEGORI=$_POST['KATEGORI'];
$TAGS=$_POST['TAGS'];
$post_hits=$_POST['post_hits'];
if (isset($_POST['DURUM'])){
  $DURUM1="1";
}
else {
  $DURUM1="0";
}

    $resim_adi = $_FILES['resim']['name'];
    $resim_tmp = $_FILES['resim']['tmp_name'];
    $resim_yolu = "../../../uploads/".$resim_adi;
    move_uploaded_file($resim_tmp, $resim_yolu);
   
if ($_POST['ICERIK']) {


$sql = "INSERT INTO yazilar (BASLIK, ICERIK, YTARIHI, YKISI, DURUM , KAPAKRESMI,KATEGORI,TAGS) VALUES ('$BASLIK', '$ICERIK', '$TARIH', 'Admin', '$DURUM1','$resim_yolu','$KATEGORI','$TAGS')";
if ($baglanti->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $baglanti->error;
}
}
}
*/

//Sayfa EKleme
$SAYFAADI = $_POST['SAYFAADI'];
$URL = $_POST['URL'];
if ($_POST['URL']) {


$SQL = "INSERT INTO sayfalar (SAYFAADI,URL) VALUES ('$SAYFAADI', '$URL')";
if ($baglanti->query($SQL) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $SQL . "<br>" . $baglanti->error;
}

if (touch('../'.$URL)) {
    echo "$URL için değişiklik zamanı şimdiye ayarlandı";
} else {
    echo "$URL için değişiklik zamanı değiştirilemedi";

}

}
//Menü Ekleme
$MENUSEC = $_POST['MENUSEC'];
$MENUADI = $_POST['MENUADI'];
$SAYFASEC = $_POST['SAYFASEC'];
if ($_POST['MENUADI']) {


$Sql = "INSERT INTO menuler (MENUSEC,MENUADI,SAYFASEC) VALUES ('$MENUSEC', '$MENUADI','$SAYFASEC')";
if ($baglanti->query($Sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $Sql . "<br>" . $baglanti->error;
}

}
//Kategori Ekleme
$KATEGORIADI = $_POST['KATEGORIADI'];
$KATEGORIRENK = $_POST['KATEGORIRENK'];
if ($_POST['KATEGORIADI']) {

$Sql = "INSERT INTO Kategoriler (KATEGORIADI,KATEGORIRENK) VALUES ('$KATEGORIADI','$KATEGORIRENK')";
if ($baglanti->query($Sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $Sql . "<br>" . $baglanti->error;
}

}

//Kullanıcı EKleme

$ADSOYAD = $_POST['ADSOYAD'];
$KADI = $_POST['KADI'];
$EPOSTA = $_POST['EPOSTA'];
$SIFRE = $_POST['SIFRE'];
$HAKKINDA = $_POST['HAKKINDA'];
$FOTOGRAF = $_POST['FOTOGRAF'];
$TWITTER = $_POST['TWITTER'];
$FACEBOOK = $_POST['FACEBOOK'];
$TWITCH = $_POST['TWITCH'];
$INSTAGRAM = $_POST['INSTAGRAM'];
$YETKI_ID = $_POST['YETKI_ID'];

if ($_POST['KADI']) {


$sql = "INSERT INTO kulanicilar (ADSOYAD, KADI, EPOSTA, SIFRE, HAKKINDA,YETKI_ID,FOTOGRAF,TWITTER, FACEBOOK ,TWITCH,INSTAGRAM) VALUES ('$ADSOYAD', '$KADI', '$EPOSTA', '$SIFRE', '$HAKKINDA','$YETKI_ID','$FOTOGRAF','$TWITTER','$FACEBOOK','$TWITCH','$INSTAGRAM')";
if ($baglanti->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $baglanti->error;
}
}


//Yetki Ekleme

$YETKIADI = $_POST['YETKIADI'];
$YETKI_ID = $_POST['YETKI_ID'];
$ACIKLAMA = $_POST['ACIKLAMA'];


if ($_POST['ACIKLAMA']) {

$sql = "INSERT INTO yetkiler (YETKIADI,YETKI_ID,ACIKLAMA) VALUES ('$YETKIADI', '$YETKI_ID','$ACIKLAMA')";
if ($baglanti->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $baglanti->error;
}
}





$baglanti->close();


/*
// Dosya yükleme işlemi
$target_dir = '../../uploads/'; // Yükleme dizini
$KAPAKRESMI = $target_dir . basename($_FILES["KAPAKRESMI"]["name"]); // Yüklenecek dosya
$uploadOk = 1; // Yükleme işlemi başarılı mı?

// Dosya uzantısını kontrol et
$imageFileType = strtolower(pathinfo($KAPAKRESMI,PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sadece JPG, JPEG ve PNG dosyaları yüklenebilir.";
    $uploadOk = 0;
}

*/




 ?>
