<?php //Müşteri ekleme formu sayfası
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
  <title>Müşteri Ekle</title>
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
          <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php"><?php echo "<img class='brand-logo' src='uploads/$resim' alt='logo'>";
                                                                              } ?>
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
            <h2 class="content-header-title">Müşteri Ekle</h2>
          </div>
        </div>
        <div class="content-body">
          <div class="col-lg-12">
            <div class="card-header">
              <div class="card-title">
                <h4>Yeni Kayıt Formu</h4>
              </div>
              <div class="card-body">
                <div class="basic-elements">
                  <form action="musteri-ekle.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Müşteri Adı Soyadı</label>
                          <input type="text" name="adsoyad" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Şirket Adı</label>
                          <input type="text" name="sirketad" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Bağlı Olduğu Vergi Dairesi</label>
                          <input type="text" name="vergidaire" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Vergi Numarası</label>
                          <input type="number" name="vergino" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Telefon</label>
                          <input type="number" name="telefon" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input id="example-email" class="form-control" type="email" name="email" required>
                        </div>
                        <div class="form-group">
                          <label>Adres</label>
                          <textarea class="form-control" name="adres" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                          <label>Logo Seç</label>
                          <input type="file" name="sirketlogo" id="logo" class="form-control" required="yes">
                        </div>
                      </div>
                    </div>
                    <button id="submit" name="kaydet" type="Submit" class="btn btn-primary btn-block">Kayıt Et</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
    include_once('partials/footer.php');
    ?>