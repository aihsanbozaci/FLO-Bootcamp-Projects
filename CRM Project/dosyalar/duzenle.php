<?php 
//Düzenleme sayfası, kayıt bilgileri veritabanından çekiliyor, üzerinde düzenleme yapabiliyoruz.
error_reporting(0);
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <title>Müşteri Düzenle</title>
    <?php
    include_once('partials/head.php');
    include_once('fonksiyonlar.php');
    $kayitlar = $baglan->logoGoster($sql);
    foreach ($kayitlar as $satir) {
        $resim = $satir->resim();
    ?>
        <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="tablolar.php"><?php echo "<img class='brand-logo' src='uploads/$resim' alt='logo'>";
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
                </ul>
            </div>
            <div class="navigation-background"></div>
        </div>

        <div class="app-content content">
            <div class="content-wrapper">
                <div class="content-wrapper-before"></div>
                <div class="content-header row">
                    <div class="content-header-left col-md-4 col-12 mb-2">
                        <h2 class="content-header-title">Müşteri Düzenle</h2>
                    </div>
                </div>
                <div class="content-body">
                    <div class="col-lg-12">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Kayıt Düzenleme Formu</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-elements">
                                    <?php
                                    $tablolar = $baglan->musteriBilgisi($sql);
                                    foreach ($tablolar as $satir) {
                                        $sirketID = $satir->sirketID();
                                        $adsoyad = $satir->adsoyad();
                                        $sirketad = $satir->sirketad();
                                        $vergidaire = $satir->vergidaire();
                                        $vergino = $satir->vergino();
                                        $telefon = $satir->telefon();
                                        $email = $satir->email();
                                        $adres = $satir->adres();
                                        $sirketlogo = $satir->sirketlogo();
                                    }
                                    ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Müşteri Adı Soyadı</label>
                                                    <input type="text" name="adsoyad" class="form-control" value="<?php echo $adsoyad ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Şirket Adı</label>
                                                    <input type="text" name="sirketad" class="form-control" value="<?php echo $sirketad ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Bağlı Olduğu Vergi Dairesi</label>
                                                    <input type="text" name="vergidaire" class="form-control" value="<?php echo $vergidaire ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Vergi Numarası</label>
                                                    <input type="number" name="vergino" class="form-control" value="<?php echo $vergino ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Telefon</label>
                                                    <input type="number" name="telefon" class="form-control" value="<?php echo $telefon ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input id="example-email" class="form-control" type="email" name="email" value="<?php echo $email ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Adres</label>
                                                    <textarea class="form-control" name="adres" rows="3" required><?php echo $adres ?></textarea>
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
<?php
include_once('fonksiyonlar.php');

$target_dir = "uploads/sirketlogolari/";
$target_file = $target_dir . basename($_FILES["sirketlogo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST['kaydet'])){
    $adsoyad = $_POST['adsoyad'];
    $sirketad = $_POST['sirketad'];
    $vergidaire = $_POST['vergidaire'];
    $vergino = $_POST['vergino'];
    $telefon = $_POST['telefon'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $check = getimagesize($_FILES["sirketlogo"]["tmp_name"]);
    $eskiLogo = unlink("uploads/sirketlogolari/$sirketlogo");  //Yeni logo yüklerken eskisini sildiriyoruz, alandan tasarruf ediyoruz.
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "<script> alert('Hata: Bu dosya tipi resim değildir!'); window.location.href = 'tablolar.php'; </script>";
      $uploadOk = 0;
    }
    
// Aynı dosyanın olup olmadığı kontrolü
if (file_exists($target_file)) {
    "<script> alert('Hata: Bu isimde bir logo zaten kullanılmaktadır!'); window.location.href = 'tablolar.php'; </script>";;
    $uploadOk = 0;
  }

// Dosya boyutu kontrolü
if ($_FILES["sirketlogo"]["size"] > 200000) {
  echo "<script> alert('Hata: Dosya 2MB'dan büyük olamaz!'); window.location.href = 'tablolar.php'; </script>";
  $uploadOk = 0;
}

// İzin verilen formatlar
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "<script> alert('Hata: Yalnızca JPG, JPEG ve PNG dosyaları yüklenebilmektedir!'); window.location.href = 'tablolar.php'; </script>";
  $uploadOk = 0;
}

// Farklı bir hatanın olup olmadığını kontrol ediyor
if ($uploadOk == 0) {
  echo "<script> alert('Hata: Bu logo zaten kullanımda, farklı isimde bir logo yükleyiniz!'); window.location.href = 'tablolar.php'; </script>";
// Her şey yolundaysa yükler
} else {
  if (move_uploaded_file($_FILES["sirketlogo"]["tmp_name"], $target_file)) {
    echo "<script> alert('Kayıt başarıyla düzenlendi!'); window.location.href = 'tablolar.php'; </script>";
    $sirketlogo = $_FILES["sirketlogo"]["name"];
    $baglan->musteriDuzenle($adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo);
  }
}


    echo "<script> alert('Kayıt Oluşturuldu!'); window.location.href = 'tablolar.php'; </script>";
}


?>