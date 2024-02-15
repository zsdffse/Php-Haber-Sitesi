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
  </div>
  <!-- /.content-header -->
  <?php
  $query5 = "SELECT * FROM sayfalar";
  $select_all_pages = mysqli_query($baglanti,$query5);
  $al_pages = mysqli_num_rows($select_all_pages);

    ?>
    <?php
    $query6 = "SELECT * FROM menuler";
    $select_all_menu = mysqli_query($baglanti,$query6);
    $al_menu = mysqli_num_rows($select_all_menu);

      ?>

            <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-clipboard"></i>
                  </div>
                  <hr>
                  <?php
                  $query = "SELECT * FROM yazilar";
                  $select_all_posts = mysqli_query($baglanti,$query);
                  $post_count = mysqli_num_rows($select_all_posts);
                  echo "<div class = 'mr-5'>{$post_count} Haber </div>";



                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="yaziListele.php">
                  <span class="float-left">Detaylı Bilgi</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-comment"></i>
                  </div>
                    <hr>
                  <?php
                  $query2 = "SELECT * FROM yorumlar";
                  $select_all_comments = mysqli_query($baglanti,$query2);
                  $post_comments = mysqli_num_rows($select_all_comments);
                  echo "<div class = 'mr-5'>{$post_comments} Yorum </div>";

                    ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="comments.php">
                  <span class="float-left">Detaylı Bilgi</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-list-ul"></i>
                  </div>
                  <hr>
                <?php
                $query3 = "SELECT * FROM kategoriler";
                $select_all_categories = mysqli_query($baglanti,$query3);
                $post_categories = mysqli_num_rows($select_all_categories);
                echo "<div class = 'mr-5'>{$post_categories} Kategori </div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="kategoriler.php">
                  <span class="float-left">Detaylı Bilgi</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <hr>
                <?php
                $query4 = "SELECT * FROM kulanicilar";
                $select_all_ussers = mysqli_query($baglanti,$query4);
                $al_ussers = mysqli_num_rows($select_all_ussers);
                echo "<div class = 'mr-5'>{$al_ussers} Kullanıcı </div>";

                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="kullaniciListele.php">
                  <span class="float-left">Detaylı Bilgi</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart', 'bar']});
                    google.charts.setOnLoadCallback(drawStuff);

                    function drawStuff() {

                      var button = document.getElementById('change-chart');
                      var chartDiv = document.getElementById('chart_div');

                      var data = google.visualization.arrayToDataTable([
                        ['', ''],
                        ['Haberler',<?php echo $post_count; ?>, ],
                        ['Yorumlar',<?php echo $post_comments; ?>, ],
                        ['Kategoriler',<?php echo $post_categories; ?>, ],
                        ['Kullanıcılar',<?php echo $al_ussers; ?>, ],
                        ['Sayfalar',<?php echo $al_pages; ?>, ],
                        ['Menüler',<?php echo $al_menu; ?>, ]

                      ]);

                      var materialOptions = {
                        width: 900,
                        chart: {
                          title: '',
                          subtitle: ''
                        },
                        series: {
                          0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
                          1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
                        },
                        axes: {
                          y: {
                            distance: {label: ''}, // Left y-axis.
                            brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
                          }
                        }
                      };

                      var classicOptions = {
                        width: 900,
                        series: {
                          0: {targetAxisIndex: 0},
                          1: {targetAxisIndex: 1}
                        },
                        title: 'Nearby galaxies - distance on the left, brightness on the right',
                        vAxes: {
                          // Adds titles to each axis.
                          0: {title: 'parsecs'},
                          1: {title: 'apparent magnitude'}
                        }
                      };

                      function drawMaterialChart() {
                        var materialChart = new google.charts.Bar(chartDiv);
                        materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                        button.innerText = 'Change to Classic';
                        button.onclick = drawClassicChart;
                      }

                      function drawClassicChart() {
                        var classicChart = new google.visualization.ColumnChart(chartDiv);
                        classicChart.draw(data, classicOptions);
                        button.innerText = 'Change to Material';
                        button.onclick = drawMaterialChart;
                      }

                      drawMaterialChart();
                  };
                  </script>
                   <div id="chart_div" style="width:auto; height: 400px;"></div>
            </div>

            <?php
            $query2 = "SELECT * FROM yorumlar WHERE comment_status ='approved'";
            $select_all_approved = mysqli_query($baglanti,$query2);
            $comment_approved = mysqli_num_rows($select_all_approved);


              ?>

              <div class="col-md-6">
              <script type="text/javascript">
              google.charts.load("current", {packages:["corechart"]});
              google.charts.setOnLoadCallback(drawChart);
              function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Onaylanan Yorumlar', 'Onaylanmayan Yorumlar'],
                ['Onaylanan Yorumlar', <?php echo $comment_approved ; ?>],
                ['Onaylanmayan Yorumlar', <?php echo ($post_comments - $comment_approved); ?>]
              ]);

              var options = {
                title: '',
                is3D: true,
              };

              var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
              chart.draw(data, options);
            }
            </script>

            <div id="piechart_3d" style="width: auto; height: 500px;"></div>
            </div>
          </div>

</div>
<!-- /.content-wrapper -->

<?php



include("footer.php");





 ?>
