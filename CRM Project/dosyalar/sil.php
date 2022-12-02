<?php //Kayıt silme
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}
include_once('fonksiyonlar.php');
$baglan->musteriBilgisi($sql);
foreach ($tablolar as $satir) {
    $sirketlogo = $satir->sirketlogo();
}
$baglan->kayitSil();
echo "<script> alert('Kayıt başarıyla silindi!'); window.location.href = 'tablolar.php'; </script>";
?>