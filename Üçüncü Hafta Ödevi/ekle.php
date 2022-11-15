<?php
include('baglan.php');
function guvenlik($metin = ''){
    $metin = htmlspecialchars(strip_tags($metin));
    return $metin;
}
if(isset($_POST['adsoyad'], $_POST['telefon'])){
    $telefon = guvenlik($_POST['telefon']);
    $adsoyad = guvenlik($_POST['adsoyad']);
    
    if($adsoyad == '' || strlen($telefon)<10){
        echo "<script> alert('Bilgilerden bir veya daha fazlası hatalı!'); window.location.href = 'index.php'; </script>";
        die();
    }
    
    $sorgu = $baglan->prepare("INSERT INTO kayitlar SET adsoyad=?, telefon=?");
    $ekle = $sorgu->execute(array($adsoyad,$telefon));
    
    if($ekle){
        echo "<script> alert('Kayıt Oluşturuldu!'); window.location.href = 'index.php'; </script>";
    }else{
        echo "<script> alert('Hata Oluştu!'); window.location.href = 'index.php'; </script>";
    }
}


?>