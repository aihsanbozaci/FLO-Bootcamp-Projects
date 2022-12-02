<?php
//Kayıt bilgilerinin çekildiği ve fonksiyona aktarıldığı sayfa
error_reporting(0);
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}

class Kayitlar
{
    private $id,$adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo;
    public function __construct($dbRow)
    {
        $this->id = $dbRow['id'];
        $this->adsoyad = $dbRow['adsoyad'];
        $this->sirketad = $dbRow['sirketad'];
        $this->vergidaire = $dbRow['vergidaire'];
        $this->vergino = $dbRow['vergino'];
        $this->telefon = $dbRow['telefon'];
        $this->email = $dbRow['email'];
        $this->adres = $dbRow['adres'];
        $this->sirketlogo = $dbRow['sirketlogo'];
    }
    public function sirketID()
    {
        return $this->id;
    }
    public function adsoyad()
    {
        return $this->adsoyad;
    }
    public function sirketad()
    {
        return $this->sirketad;
    }
    public function vergidaire()
    {
        return $this->vergidaire;
    }
    public function vergino()
    {
        return $this->vergino;
    }
    public function telefon()
    {
        return $this->telefon;
    }
    public function email()
    {
        return $this->email;
    }
    public function adres()
    {
        return $this->adres;
    }
    public function sirketlogo()
    {
        return $this->sirketlogo;
    }
}


class YazilimLogo
{
    private $id, $resim;
    public function __construct($dbRow)
    {
        $this->id = $dbRow['id'];
        $this->resim = $dbRow['resim'];
    }
    public function logoID()
    {
        return $this->id;
    }
    public function resim()
    {
        return $this->resim;
    }
    
}

?>