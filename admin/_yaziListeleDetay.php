<?php

include("_header.php");
include("php/baglanti.php");

 ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
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
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
     <div class="col-md-12">
       <!-- Small boxes (Stat box) -->
       <!-- Main row -->
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">detay</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->


           <form role="form" id="form" enctype="multipart/form-data" method="post" name="form">


             <?php
             $ID=$_GET['ID'];
             $Sql=$baglanti->query("SELECT * FROM yazilar WHERE ID='$ID'");
             $sonuc=$Sql->fetch_assoc();

             ?>

 


             <?php
              if (isset($_POST['BASLIK'])) {  
  $BASLIK = $_POST['BASLIK'];
  $TAGS = $_POST['TAGS'];
  $ICERIK = $_POST['ICERIK'];

  $resim_yolu = $_FILES['KAPAKRESMI']['name'];
  $gecici_dosya = $_FILES['KAPAKRESMI']['tmp_name'];
  $boyut = $_FILES['KAPAKRESMI']['size'];
  $tip = $_FILES['KAPAKRESMI']['type'];

  if ($resim_yolu) {
    // Eski resmi silmek için önce dosya yolunu bulun
    $eski_resim_yolu = $sonuc['KAPAKRESMI'];
    unlink($eski_resim_yolu);

    // Yeni resmi kaydetmek için dosya yolunu oluşturun
    $hedef_dizin = "../uploads/";
    $hedef_dosya = $hedef_dizin . basename($resim_yolu);

    // Yeni resmi sunucuya kaydedin
    if (move_uploaded_file($gecici_dosya, $hedef_dosya)) {
      $mesaj = "Resim dosyası başarıyla yüklendi.";
    } else {
      $mesaj = "Resim dosyası yüklenirken bir hata oluştu.";
    }
  }

  $sql ="UPDATE yazilar SET BASLIK = '$BASLIK', TAGS = '$TAGS', KAPAKRESMI = '$hedef_dosya', ICERIK = '$ICERIK' WHERE ID = '$ID'";

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
              url:'_yaziListeleDetay.php',
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
        



             <div class="card-body">
               <div class="form-group">
                 <label>Başlık</label>
                 <input type="text" class="form-control" id="BASLIK" name="BASLIK"  value="<?php echo $sonuc['BASLIK']; ?>">
               </div>
               <div class="form-group">
                 <label>YTarihi</label>
                 <input type="text" class="form-control" id="YTARIHI" name="YTARIHI" disabled value="<?php echo $sonuc['YTARIHI']; ?>">
               </div>
               <div class="form-group">
                 <label>Editor</label>
                 <input type="text" class="form-control" id="YKISI" name="YKISI" disabled value="<?php echo $sonuc['YKISI']; ?>">
               </div>
               <div class="form-group">
                 <label>Taglar</label>
                 <input type="text" class="form-control" id="" placeholder="Tags" name="TAGS" value="<?php echo $sonuc['TAGS']; ?>">
               </div>

               <div class="form-group">
                 <label>Resim</label>
                 <input type="file" class="form-control" id="KAPAKRESMI" name="KAPAKRESMI"  value="<?php echo $sonuc['KAPAKRESMI']; ?>">
               </div>
                         <div class="mb-3">
                           <textarea class="textarea" placeholder="Place some text here"
                                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="ICERIK" name="ICERIK"><?php echo $sonuc['ICERIK']; ?></textarea>
                         </div>
             </div>
             <!-- /.card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary" value="<?php $sonuc["ID"];  ?>" name="haber_guncelle">Güncelle</button>
             </div>

           </form>
         </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <?php



 include("footer.php");


 ?>

 <!--
 <script>

 $('#form').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url:"_yaziListeleDetay.php",
      method:"post",
      data:$("form").serialize(),
      dataType:"text",
      success:function(strMessage){
        $("Message").text(strMessage);
        $("#form")[0].reset();
        alert("Sayfa Başarıyla Güncellendi");
        location.reload();
      }
    });

  });
 </script>
-->
