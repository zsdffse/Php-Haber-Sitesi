<?php

include("_header.php");
include("php/baglanti.php");


 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sayfa Düzenleme Paneli</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">SayfaDüzenleme</li>
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
          <?php
          $ID=$_GET['ID'];
          $Sql=$baglanti->query("SELECT * FROM sayfalar WHERE ID='$ID'");
          $sonuc=$Sql->fetch_assoc();

          ?>
          <!-- form start -->
          <form role="form" id="form" enctype="multipart/form-data" method="post">
            <div class="card-body">
              <div class="form-group col-md-12">
                <label>Sayfa Adı Düzenle</label>
                <input type="text" class="form-control" id="" placeholder="Sayfa Adı" name="yeniSAYFAADI" value="<?php echo $sonuc['SAYFAADI']; ?>">
              </div>
              <div class="form-group col-md-12">
                <label>URL Düzenle</label>
                <input type="text" class="form-control" id="" placeholder="Sayfa URL" name="YeniURL" value="<?php echo $sonuc['URL']; ?>">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary" value="Kaydet">Güncelle</button>
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

 <script>

 $('#form').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url:"_sorguEkle.php",
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
