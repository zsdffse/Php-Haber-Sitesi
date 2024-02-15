
<?php

include("_header.php");
include("php/baglanti.php");

$ID=$_GET['ID'];
 ?>





<?php
if (isset($_POST['KADI'])) {  
$ADSOYAD = $_POST['ADSOYAD'];
$KADI = $_POST['KADI'];
$EPOSTA = $_POST['EPOSTA'];
$SIFRE = $_POST['SIFRE'];
$HAKKINDA = $_POST['HAKKINDA'];
$TWITTER = $_POST['TWITTER'];
$FACEBOOK = $_POST['FACEBOOK'];
$TWITCH = $_POST['TWITCH'];
$INSTAGRAM = $_POST['INSTAGRAM'];




  $sql ="UPDATE kulanicilar SET ADSOYAD = '$ADSOYAD', KADI = '$KADI', EPOSTA = '$EPOSTA', SIFRE = '$SIFRE' , HAKKINDA = '$HAKKINDA', TWITTER = '$TWITTER', FACEBOOK = '$FACEBOOK', TWITCH = '$TWITCH', INSTAGRAM = '$INSTAGRAM'  WHERE ID = '$ID'";

  if (mysqli_query($baglanti, $sql)) {
    $mesaj = "Kayıt güncellendi.";
  } else {
    $mesaj = "Hata: " . mysqli_error($baglanti);
  }
  
  // AJAX kullanarak mesajı sayfada gösterin
  echo "<script>
          $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
              url:'_kullaniciListeleDetay.php',
              method:'post',
              data:$('form').serialize(),
              dataType:'text',
              success:function(strMessage){
                $('#Message').text(strMessage);
                $('#form')[0].reset();
                alert('Sayfa Başarıyla Güncellendi');
                location.reload();
              }
            });
          });

          $('#Message').text('$mesaj');
        </script>";
} 


              
              ?>











 <?php

 	$ID=$_GET['ID'];

 	$Sql=$baglanti->query("SELECT * FROM kulanicilar WHERE ID='$ID'");
 	$okukulaniciCek=$Sql->fetch_assoc();

  ?>
  <?php
  $baglanti->select_db('site');

  $sqlYetkiCek = $baglanti->query("SELECT YETKIADI FROM yetkiler ");
  ?>
 <div class="content-wrapper">
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0 text-dark">Anasayfa</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
             <li class="breadcrumb-item active"></li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
 <section class="content">
   <div class="col-md-12">
     <!-- Small boxes (Stat box) -->
     <!-- Main row -->
       <div class="card card-primary">
         <div class="card-header">
           <h3 class="card-title">Kullanıcı Ekleme Paneli</h3>
         </div>

  <div class="card">
       <form role="form" id="form" enctype="multipart/form-data" method="post" name="form">
         <div class="row">
         <div class="col-md-6">
           <div class="form-group">
             <div class="card-body">
           <label>Ad Soyad</label>
            <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['ADSOYAD']; ?>" name="ADSOYAD">
         </div>
         <div class="card-body">
           <label>Kullanıcı Adı</label>
           <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['KADI']; ?>" name="KADI">
         </div>
         <div class="card-body">
           <label>E-posta</label>
           <input type="email" class="form-control" id="" value="<?php echo $okukulaniciCek['EPOSTA']; ?>" name="EPOSTA">
         </div>
         <div class="card-body">
           <label>Şifre</label>
           <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['SIFRE']; ?>" name="SIFRE">
         </div>
         <div class="card-body">
           <label>Hakkında</label>
          <textarea name="HAKKINDA" rows="4" class="form-control"><?php echo $okukulaniciCek['HAKKINDA']; ?></textarea>
         </div>

         </div>
         </div>

         <div class="col-md-6">
         <div class="form-group">
       <div class="card-body">
         <label>Fotoğraf Adı</label>
          <input type="text" class="form-control" id="" placeholder="Fotoğraf Adı Giriniz" name="FOTOGRAFADI">
       </div>
       <div class="card-body">
         <label>Profil Fotoğrafı</label><br/>
            <input type="file" name="FOTOGRAF" id="FOTOGRAF" />
       </div>
       <div class="card-body">
         <label>Twitter Adı</label>
         <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['TWITTER']; ?>" name="TWITTER">
       </div>
       <div class="card-body">
         <label>Facebook Adı</label>
         <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['FACEBOOK']; ?>" name="FACEBOOK">
       </div>
       <div class="card-body">
         <label>Twitch Adı</label>
         <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['TWITCH']; ?>" name="TWITCH">
       </div>
       <div class="card-body">
         <label>İnstagram Adı</label>
      <input type="text" class="form-control" id="" value="<?php echo $okukulaniciCek['INSTAGRAM']; ?>" name="INSTAGRAM">
       </div>
     </div>
     </div>
     </div>

  </div>
         <div class="card-footer">
           <button type="submit" class="btn btn-primary">Kaydet</button>
         </div>
       </form>

            </div>
          </div>
        </section>
    </div>

<?php

include("footer.php");



 ?>


