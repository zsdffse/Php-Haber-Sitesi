<?php

include("_header.php");

include("php/baglanti.php");

 ?>



<?php
include("php/baglanti.php");

if(isset($_GET['delete'])) {
  $ID = $_GET['delete'];

  // Yazıyı veritabanından silme işlemi gerçekleştirilir.
  $sil = "DELETE FROM yazilar WHERE ID='$ID'";
  $result = mysqli_query($baglanti, $sil);

  // Silme işlemi başarılıysa yaziListele.php sayfasına yönlendirilir.
  if($result) {
    header("Location: yaziListele.php");
  }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<section class="content-header">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Yazı Listeleme Paneli</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">YazıListele</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->



    </div><!-- /.container-fluid -->
  </section>
<section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">listeleme</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tr>
                <th>ID</th>
                <th>Başlık</th>
                <th>YTarihi</th>
                <th>Ekleyen</th>
                <th>Durum</th>
                <th>Yorum</th>
                <th>İşlemler</th>
              </tr>
              <?php


    $sql = $baglanti->query("SELECT * FROM yazilar ORDER BY ID DESC ");

 // Sonuçları Alalım.
  while($sonuc = $sql->fetch_assoc()){
    $ID = $sonuc['ID']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
    $ICERIK = $sonuc['ICERIK'];
    echo '<tr>';
      echo '<td>'.$sonuc["ID"].'</td>';
      echo '<td>'.$sonuc["BASLIK"].'</td>';
      echo '<td>'.$sonuc["YTARIHI"].'</td>';
      echo '<td>'.$sonuc["YKISI"].'</td>';
      echo '<td>'.$sonuc["DURUM"].'</td>';
      echo '<td>7</td>';
      echo '<td>';

      echo '<a href="_yaziListeleDetay.php?ID='.$sonuc['ID'].'"class="btn btn-primary">Detay</a> ';
      echo '<a href="yaziListele.php?delete='.$sonuc['ID'].'" class="btn btn-danger" name= "delete"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>';
      echo '</td>';

      echo '</tr>';


  }
               ?>
             </table>
           </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div><!-- /.row -->

  </div>

</div>
</section>

<?php



include("footer.php");





 ?>


 <script>

 $('#form').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url:"yaziListele.php",
      method:"post",
      data:$("form").serialize(),
      dataType:"text",
      success:function(strMessage){
        $("Message").text(strMessage);
        $("#form")[0].reset();
        alert("yazı Başarıyla Silindi");
        location.reload();
      }
    });

  });
 </script>
