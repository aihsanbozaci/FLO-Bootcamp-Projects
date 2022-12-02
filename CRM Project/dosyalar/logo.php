<?php
// BU SAYFA YAZILIMIN KENDİ LOGOSUNU DEĞİŞTİRMEK İÇİN, ŞİRKET LOGOSUYLA ALAKASI YOK.
session_start();
if (!isset($_SESSION["username"])) {
  if (!isset($_SESSION["sifre"])) {
    header('location:../index.php');
  }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <title>Logo Yükle</title>
  <?php
  include_once('partials/head.php');
  include_once('fonksiyonlar.php');
  error_reporting(0);
  $kayitlar = $baglan->logoGoster($sql);
  foreach ($kayitlar as $satir) {
    $resim = $satir->resim();
  ?>
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="tablolar.php"><?php echo "<img class='brand-logo' src='uploads/$resim' alt='logo'>"; ?>
              <h3 class="brand-text">CRM Yazılımı</h3>
            </a></li>
          <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <li class=" nav-item"><a href="tablolar.php"><i class="ft-credit-card"></i><span class="menu-title" data-i18n="">Müşteriler</span></a>
          </li>
          <li class=" nav-item"><a href="musteri-formu.php"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Müşteri Ekle</span></a>
          </li>
          <li class=" nav-item"><a href="logo.php"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Logo Değiştir</span></a>
          </li>
          <li class=" nav-item"><a href="cikis.php"><i class="ft-power"></i><span class="menu-title" data-i18n="">Çıkış</span></a>
          </li>
        </ul>
      </div>
      <div class="navigation-background"></div>
    </div>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
          <div class="content-header-left col-md-4 col-12 mb-2">
            <h2 class="content-header-title">Logo Yükle</h2>
          </div>
        </div>
        <div class="content-body">
        </div>
        <section id="content-types">
          <br><br><br>
          <b style="color: black;">Mevcut Logo:</b>
          <br><br>
        <?php
        echo "<img src='uploads/$resim' alt='logo' width='300' height='270'>";
      }
        ?>
        <br><br><br>
        <div class="row">
          <div class="col-12 mt-3 mb-1">
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Resim Seç</label>
                <input type="file" name="resim" id="resim" class="form-control" required="yes">
              </div>
              <button id="submit" name="yukle" type="Submit" class="btn btn-primary">Logo Yükle</button>
              <br>
            </form>
          </div>
        </div>
        </section>

      </div>
    </div>

    <?php
    include_once('partials/footer.php');
    ?>