<?php

include("_header.php");
include("php/baglanti.php");

 ?>
  <?php
include("php/baglanti.php");

if(isset($_GET['delete'])) {
  $ID = $_GET['delete'];

  // Yazıyı veritabanından silme işlemi gerçekleştirilir.
  $sil = "DELETE FROM yetkiler WHERE ID='$ID'";
  $result = mysqli_query($baglanti, $sil);

  
  if($result) {
    header("Location: yetkiler.php");
  }
}
?>

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Yetki Ekleme Paneli</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                <li class="breadcrumb-item active">yetkiler</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

          <section class="content">

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" id="form" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                        <label>Yetki Adı</label>
                        <input type="text" class="form-control" id="" placeholder="Yetki Adı Giriniz" name="YETKIADI">
                      </div>
                      <div class="card-body">
                          <label>Yetki ID</label>
                          <input type="text" class="form-control" id="" placeholder="Yetki ID Giriniz" name="YETKI_ID">
                        </div>
                      <br/>
                      <div class="card-body">
                        <label>Açıklama</label>
                        <textarea name="ACIKLAMA" rows="4"  placeholder="Açıklama Giriniz" class="form-control"></textarea>
                      </div>

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>
                      </div>
                    </div>
                    <!-- /.card-body -->

                  </form>

  </section>
  <!-- /.content -->
  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Yetki Listeleme Paneli</h3>

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
                  <th>Yetki Adı</th>
                  <th>Yetki ID</th>
                  <th>Açıklama</th>
                  <th>İşlemler</th>
                </tr>

                <?php

     $sqlyetki = $baglanti->query("SELECT * FROM yetkiler");

  // Sonuçları Alalım.
   while($sonuc = $sqlyetki->fetch_assoc()){
     echo '<tr>';
       echo '<td>'.$sonuc["ID"].'</td>';
       echo '<td>'.$sonuc["YETKIADI"].'</td>';
       echo '<td>'.$sonuc["YETKI_ID"].'</td>';
       echo '<td>'.$sonuc["ACIKLAMA"].'</td>';
       echo '<td>';

       echo '<a href="yetkiDetay.php?ID='.$sonuc['ID'].'"class="btn btn-primary">Detay</a> ';
       echo '<a href="yetkiler.php?delete='.$sonuc['ID'].'" class="btn btn-danger"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>' ;
       echo '</td>';

       echo '</tr>';


       }
           ?>
               </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->

    </div>

  </div>
  </section>

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
        alert("yetki Başarıyla Eklendi");
        location.reload();
      }
    });

  });
 </script>
