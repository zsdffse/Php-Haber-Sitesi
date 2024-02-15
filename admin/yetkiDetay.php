<?php

include("_header.php");
include("php/baglanti.php");


 ?>
 <?php
 $ID=$_GET['ID'];

 $SqlDetay=$baglanti->query("SELECT * FROM yetkiler WHERE ID='$ID'");
 $sonucDetay=$SqlDetay->fetch_assoc();

 ?>








<?php

if (isset($_POST['YETKIADI'])) {  
$YETKIADI = $_POST['YETKIADI'];
$ACIKLAMA = $_POST['ACIKLAMA'];



  $sql ="UPDATE yetkiler SET YETKIADI = '$YETKIADI', ACIKLAMA = '$ACIKLAMA'  WHERE ID = '$ID'";

  if (mysqli_query($baglanti, $sql)) {
    $mesaj = "Kayıt güncellendi.";
  } else {
    $mesaj = "Hata: " . mysqli_error($baglanti);
  }
  } 


              
    ?>
  <script>
          $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
              url:'yetkiDetay.php',
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
        </script>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Yetki Detay Paneli</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">YetkilerDetay</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="col-md-12">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" id="form" enctype="multipart/form-data" method="post">
            <div class="card-body">
                <label>Yetki Adı</label>
                <input type="text" class="form-control" id="" value="<?php echo $sonucDetay['YETKIADI']; ?>" name="YETKIADI">
              </div>
              <br/>
                <div class="card-body">
                <label>Açıklama</label>
                <textarea name="ACIKLAMA" rows="4" class="form-control"><?php echo $sonucDetay['ACIKLAMA']; ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
          </form>
        </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>


<?php

include("footer.php");

 ?>


