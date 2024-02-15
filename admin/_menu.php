
<?php

include("php/baglanti.php");

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__))
{
  header("Location: index.php");
exit();
}
 ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->

    <li class="nav-header">Site Ayarları</li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa fa-bars"></i>
        <p>
          Menüler
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="menuEkle.php" class="nav-link">
            <i class="far fa fa-plus-circle nav-icon"></i>
            <p>Menü Ekle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="menuListele.php" class="nav-link">
            <i class="far fa fa-list nav-icon"></i>
            <p>Menü Listele</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="Kategoriler.php" class="nav-link">
          <i class="fa fa-th-large" aria-hidden="true"></i>
            <p>Kategoriler</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Sayfalar
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="sayfaEkle.php" class="nav-link">
            <i class="far fa fa-plus-circle nav-icon"></i>
            <p>Sayfa Ekle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="sayfaListele.php" class="nav-link">
            <i class="far fa fa-list nav-icon"></i>
            <p>Sayfa Listele</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa fa-edit"></i>
        <p>
          Haberler
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="yaziEkle.php" class="nav-link">
          <i class="far fa fa-plus-circle nav-icon"></i>
            <p>Haber Ekle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="YaziListele.php" class="nav-link">
            <i class="far fa fa-list nav-icon"></i>
            <p>Haber Listele</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="fa fa-comments" aria-hidden="true"></i>
        <p>
          Yorumlar
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="comments.php" class="nav-link">
          <i class="far fa fa-comment nav-icon"></i>

            <p>Yorumlar</p>
          </a>
        </li>

      </ul>
    </li>

    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa fa-edit"></i>
        <p>
          Galeri
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="GaleriEkle.php" class="nav-link">
          <i class="far fa fa-plus-circle nav-icon"></i>
            <p>Yeni  Ekle</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="galeriKutuphane.php" class="nav-link">
            <i class="far fa fa-list nav-icon"></i>
            <p>Kütüphane</p>
          </a>
        </li>
      </ul>
    </li>

  <?php

$Admin=$_SESSION['KADI'] ;
$adminSor=$baglanti->query("SELECT * FROM kulanicilar WHERE KADI='$Admin'");
$adminCek=$adminSor->fetch_assoc();
$yetkiid=$adminCek['YETKI_ID'];
if ($yetkiid!=1) {
}
else {
  echo '<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
    <i class="fa fa-cogs" aria-hidden="true"></i>
      <p>
        Kullanici Ayarları
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="kullaniciEkle.php" class="nav-link">
          <i class="far fa fa-plus-circle nav-icon"></i>
          <p>Kullanıcı Ekle</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="kullaniciListele.php" class="nav-link">
          <i class="far fa fa-list nav-icon"></i>
          <p>Kullanıcı Listele</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="yetkiler.php" class="nav-link">
          <i class="fa fa-user" aria-hidden="true"></i>
          <p>Yetkiler</p>
        </a>
      </li>

    </ul>
  </li>';
}

?>



<li class="nav-item has-treeview">
      <a href="SiteAyar.php" class="nav-link">
        <i class="fa fa-cogs" aria-hidden="true"></i>
        <p>
          Site Ayarları
          
        </p>
      </a>
    </li>
  </ul>
</nav>
