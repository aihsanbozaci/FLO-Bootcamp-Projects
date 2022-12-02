<?php
//CSV Olarak kaydediyoruz.
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}
include_once('fonksiyonlar.php');
$baglan->csvKaydet();
?>