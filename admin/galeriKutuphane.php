<?php



include("_header.php");

include("php/baglanti.php");




 ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
   <link rel="stylesheet" href="fluid-gallery.css">

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Galeri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
            <li class="breadcrumb-item active">Galeri</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="container">



  <div class="container gallery-container">



      <div class="tz-gallery">

          <div class="row mb-3">
              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/park.jpg">
                      <img src="images/park.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/benches.jpg">
                      <img src="images/benches.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/bridge.jpg">
                      <img src="images/bridge.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>
          </div>
            <div class="row">
              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/coast.jpg">
                      <img src="images/coast.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/rails.jpg">
                      <img src="images/rails.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="card">
                      <a class="lightbox" href="images/rocks.jpg">
                      <img src="images/rocks.jpg" alt="Park" class="card-img-top">
                      </a>
                  </div>
              </div>

          </div>

      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
      <script>
          baguetteBox.run('.tz-gallery');
      </script>
  </div>

  </div>


</div>


<?php



include("footer.php");





 ?>
