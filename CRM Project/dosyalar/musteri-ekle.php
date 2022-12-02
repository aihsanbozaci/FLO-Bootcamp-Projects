<?php //Müşteri bilgisi ve logosunu ekleme sayfası
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}

include_once('fonksiyonlar.php');
//Kayıt ve logo yükleme işlemleri
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
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "<script> alert('Hata: Bu dosya tipi resim değildir!'); window.location.href = 'musteri-formu.php'; </script>";
      $uploadOk = 0;
    }
    
// Aynı dosyanın olup olmadığı kontrolü
if (file_exists($target_file)) {
    "<script> alert('Hata: Bu isimde bir logo zaten kullanılmaktadır!'); window.location.href = 'musteri-formu.php'; </script>";;
    $uploadOk = 0;
  }

// Dosya boyutu kontrolü
if ($_FILES["sirketlogo"]["size"] > 200000) {
  echo "<script> alert('Hata: Dosya 2MB'dan büyük olamaz!'); window.location.href = 'musteri-formu.php'; </script>";
  $uploadOk = 0;
}

// İzin verilen formatlar
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "<script> alert('Hata: Yalnızca JPG, JPEG ve PNG dosyaları yüklenebilmektedir!'); window.location.href = 'musteri-formu.php'; </script>";
  $uploadOk = 0;
}

// Farklı bir hatanın olup olmadığını kontrol ediyor
if ($uploadOk == 0) {
  echo "<script> alert('Hata: Bu logo zaten kullanımda, farklı isimde bir logo yükleyiniz!'); window.location.href = 'musteri-formu.php'; </script>";
// Her şey yolundaysa yükler
} else {
  if (move_uploaded_file($_FILES["sirketlogo"]["tmp_name"], $target_file)) {
    echo "<script> alert('Kayıt başarıyla oluşturuldu!'); window.location.href = 'musteri-formu.php'; </script>";
    $sirketlogo = $_FILES["sirketlogo"]["name"];
    $baglan->musteriEkle($adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo);
  }
}


    echo "<script> alert('Kayıt Oluşturuldu!'); window.location.href = 'musteri-formu.php'; </script>";
}


?>