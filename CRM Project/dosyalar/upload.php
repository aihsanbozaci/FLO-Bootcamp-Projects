<?php
//Dosya yükleme
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}
include('fonksiyonlar.php');
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["resim"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Dosyanın resim olup olmadığı kontrolü
if(isset($_POST["yukle"])) {
  $baglan->logoTemizle();
  $check = getimagesize($_FILES["resim"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "<script> alert('Hata: Bu dosya tipi resim değildir!'); window.location.href = 'logo.php'; </script>";
    $uploadOk = 0;
  }
}

// Dosya boyutu kontrolü
if ($_FILES["resim"]["size"] > 200000) {
  echo "<script> alert('Hata: Dosya 2MB'dan büyük olamaz!'); window.location.href = 'logo.php'; </script>";
  $uploadOk = 0;
}

// İzin verilen formatlar
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "<script> alert('Hata: Yalnızca JPG, JPEG ve PNG dosyaları yüklenebilmektedir!'); window.location.href = 'logo.php'; </script>";
  $uploadOk = 0;
}

// Farklı bir hatanın olup olmadığını kontrol ediyor
if ($uploadOk == 0) {
  echo "<script> alert('Hata: Resim yüklenemedi!'); window.location.href = 'logo.php'; </script>";
// Her şey yolundaysa yükler
} else {
  if (move_uploaded_file($_FILES["resim"]["tmp_name"], $target_file)) {
    echo "<script> alert('Resim başarıyla yüklendi!'); window.location.href = 'logo.php'; </script>";
    $resim = $_FILES["resim"]["name"];
    $baglan->logoYukle($resim);
  }
}
?>