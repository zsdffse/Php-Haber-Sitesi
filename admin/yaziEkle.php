


<?php

include("_header.php");
include("php/baglanti.php");

if (!isset($_SESSION['KADI'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir.
    header("Location: giris.php");
    exit();
}

// Kullanıcı kimlik doğrulamasını geçti, haber ekleme işlemini gerçekleştir.

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
             <h3 class="card-title">Yazı Ekleme Paneli</h3>
           </div>
           <!-- /.card-header -->
           <!-- form start -->


<?php

if (!isset($_SESSION['KADI'])) {
    // Kullanıcı giriş yapmamış, yönlendirme yapabilirsiniz
    header("Location: giris.php");
    exit();
}
// Admin paneline giriş yaparken kullanıcının adını $_SESSION değişkeninde saklayın
//$_SESSION["KADI"] ="admin";

// Haber ekleyen kullanıcının adını alın
$ykisi = $_SESSION['KADI'];
//içerik ekle

if(isset($_POST['ICERIK'])) {

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

    $resim_adi = $_FILES['KAPAKRESMI']['name'];
    $resim_tmp = $_FILES['KAPAKRESMI']['tmp_name'];
    $resim_yolu = "../uploads/".$resim_adi;
    move_uploaded_file($resim_tmp, $resim_yolu);
   



$sql = "INSERT INTO yazilar (BASLIK, ICERIK, YTARIHI, YKISI, DURUM , KAPAKRESMI,KATEGORI,TAGS) VALUES ('$BASLIK', '$ICERIK', '$TARIH', '$ykisi', '$DURUM1','$resim_yolu','$KATEGORI','$TAGS')";
if ($baglanti->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $baglanti->error;
}
}



 ?>

           <form role="form" id="form" enctype="multipart/form-data" method="post">

             <?php
             $baglanti->select_db('site');

           $sql = $baglanti->query("SELECT KATEGORIADI FROM Kategoriler ");
             ?>
             <div class="card-body">
               <div class="form-group">
                 <label>Başlık</label>
                 <input type="text" class="form-control" id="" placeholder="Başlık" name="BASLIK">
               </div>
               <div class="form-group ">
                 <label>Kategori Seçiniz</label>
                 <select class="form-control" name="KATEGORI">
                   <option>Kategori Seçiniz</option>
                    <?php
                    while($sonuc = $sql->fetch_assoc()){

              echo '<option>'.$sonuc["KATEGORIADI"].'</option>';
                     }
                   ?>
                 </select>
                 <br/>
                 <div class="form-group">
                   <label>Taglar</label>
                   <input type="text" class="form-control" id="" placeholder="Tags" name="TAGS">
                 </div>

                    <input type="file" name="KAPAKRESMI">
                       
                    
                 
                       <div class="mb-3">
                           <textarea class="textarea" placeholder="Place some text here"
                                     style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="ICERIK "name="ICERIK"></textarea>
                         </div>
                         <div class="form-check">
                 <input type="checkbox" class="form-check-input" id="exampleCheck1" name="DURUM">
                 <label class="form-check-label" for="exampleCheck1">Yayınla</label>
               </div>
             </div>
             <!-- /.card-body -->

             <div class="card-footer">
               <button type="submit" class="btn btn-primary" name="submit" id="submit">Haber Ekle</button>
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


 <script>

/* $('#form').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url:"yaziEkle.php",
      method:"post",
      data:$("form").serialize(),
      dataType:"text",
      success:function(strMessage){
        $("Message").text(strMessage);
        $("#form")[0].reset();
        alert("yazı Başarıyla Eklendi");
        location.reload();
      }
    });

  });

  */
 </script>

 <script>
 $('#form').submit(function(e) {
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    url: "yaziEkle.php",
    method: "post",
    data: formData,
    dataType: "text",
    contentType: false,
    processData: false,
    success: function(strMessage) {
      $("#Message").text(strMessage);
      $("#form")[0].reset();
      alert("Yazı veya resim başarıyla eklendi");
      location.reload();
    }
  });
});

 </script>