<?php

include('php/baglanti.php');

 ?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giriş Yap</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index2.html"><b>Mehmet</b>Ali</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Oturum Açmak İçin Bilgilerinizi Giriniz</p>

      <form action="giris.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="KADI">
          <div class="input-group-append input-group-text">
              <span class="fas fa-envelope"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Şifre" name="SIFRE">
          <div class="input-group-append input-group-text">
              <span class="fas fa-lock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Beni Hatırla
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


<?php
/*
ob_start();

session_start();

include("php/baglanti.php");

$KADI =$_POST['KADI'];
$SIFRE =$_POST['SIFRE'];

$sql = "SELECT * FROM kulanicilar WHERE KADI='".$KADI."' AND SIFRE='".$SIFRE."'";
$sonuc = $baglanti->query($sql);
if ($sonuc->num_rows > 0){
  {
    //Eğer var ise BAŞARILI komutunu veriyoruz.
    $_SESSION["LOGIN"] = "BAŞARILI";
    header("Location:index.php");

  }
  else
  {
    //Eğer yok ise BAŞARISIZ komutunu veriyoruz.

    $_SESSION["LOGIN"] = "BAŞARISIZ";
     header("Location:login.php");
  }
  //Son olarak ekrana giriş durumunu yazdırıyoruz.
  echo '<br> GİRİŞ '. $_SESSION["LOGIN"];
  }

ob_end_flush();
*/
 ?>



















<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
