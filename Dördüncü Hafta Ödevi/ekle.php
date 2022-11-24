<?php
require("fonksiyonlar.php");
if(isset($_POST['kaydet'])){
    $adsoyad = $_POST['adsoyad'];
    $tcno = $_POST['tcno'];
    $baglan->veriEkle($adsoyad,$tcno);
    echo "<script> alert('Kayıt Oluşturuldu!'); window.location.href = 'index.php'; </script>";
}
?>
