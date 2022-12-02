<?php

//İşlemler class içinde metotlarla bu sayfadan yaptırılıyor.

error_reporting(0);
session_start();  
if(!isset($_SESSION["username"])){
   if(!isset($_SESSION["sifre"])){
       header('location:../index.php');
   }
}
require('kayitlar.php');
class Veritabani
{
    public $baglan;
    public function __construct($host, $kullanici, $sifre, $veritabani)
    {
        try {
            $this->baglan = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8", $kullanici, $sifre);
            $this->baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Bağlantı hatası: " . $e->getMessage() . "<br>";
        }
    }


    public function musteriEkle($adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo){
        $sql = "insert into sirketbilgileri (id,adsoyad,sirketad,vergidaire,vergino,telefon,email,adres,sirketlogo) values (null,?,?,?,?,?,?,?,?)";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute([$adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo]);
    }
    
    public function musteriKayitlari($sql){
        $sql = "select * from sirketbilgileri order by id asc";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute();
        while ($kayit = $sorgu->fetch()) {
            $kayitlar[] = new Kayitlar($kayit);
        }
        if (!empty($kayitlar)) {
            return $kayitlar;
        } else {
            return null;
        }
    }
    public function musteriBilgisi($sql){
        $id = $_GET['id'];
        $sql = "select * from sirketbilgileri order by id=$id";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute();
        while ($kayit = $sorgu->fetch()) {
            $kayitlar[] = new Kayitlar($kayit);
        }
        if (!empty($kayitlar)) {
            return $kayitlar;
        } else {
            return null;
        }
    }

    public function musteriDuzenle($adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo)
    {
        $id = $_GET['id'];
        $sql = "update sirketbilgileri set adsoyad=?,sirketad=?,vergidaire=?,vergino=?,telefon=?,email=?,adres=?,sirketlogo=? where id=$id";
        $sorgu = $this->baglan->prepare($sql);
        return $sorgu->execute([$adsoyad,$sirketad,$vergidaire,$vergino,$telefon,$email,$adres,$sirketlogo]);
    }

    public function kayitSil()
    {
        $id = $_GET['id'];
        $sql = "delete from sirketbilgileri where id=$id";
        $sorgu = $this->baglan->prepare($sql);
        return $sorgu->execute([$id]);
    }
    public function csvKaydet(){
        $sql = "select * from sirketbilgileri order by id asc";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute();
            $ayrac = ",";
            $dosyaAdi = "musteriler_".date('d-m-Y').".csv";
            $fo = fopen('php://memory','w');
            $satirlar = array('-ID-','-ADI SOYADI-','-SIRKET ADI-','-VERGI DAIRESI-','-VERGI NO-','-TELEFON-','-E-POSTA-','-ADRES-');
            fputcsv($fo,$satirlar,$ayrac);
        while($satir = $sorgu->fetch()){
            $kayitlar = array($satir['id'],$satir['adsoyad'],$satir['sirketad'],$satir['vergidaire'],$satir['vergino'],$satir['telefon'],$satir['email'],$satir['adres']);
            fputcsv($fo, $kayitlar, $ayrac);
        }  
            fseek($fo,0);
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="'. $dosyaAdi .'";');
            fpassthru($fo);
        fclose($fo);
        exit;
    }

    public function logoYukle($resim){     //Yazılımın kendi logosunu da değiştirebiliyoruz.
        $sql = "insert into logo (id,resim) values (null,?)";
        $sorgu = $this->baglan->prepare($sql);
        return $sorgu->execute([$resim]);
    }  

    public function logoTemizle(){        //Yazılımın kendisi için logo yüklenirken yeni bir logo yüklenmeden önce eski yüklenenler hem dosya yolundan hem veritabanından silinecek ve yer kaplamayacaklar.
        $klasor = "uploads";
        $dosyalar = glob($klasor.'/*');
        foreach($dosyalar as $dosya){
            if(is_file($dosya)){
                unlink($dosya);         
            }
        }
        $sqlSil = "delete from logo where id";
        $sorgu = $this->baglan->prepare($sqlSil);
        return $sorgu->execute();
    } 

    public function logoGoster($sql){
        $sql = "select * from logo order by id";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute();
        while ($kayit = $sorgu->fetch()) {
            $kayitlar[] = new YazilimLogo($kayit);
        }
        if (!empty($kayitlar)) {
            return $kayitlar;
        } else {
            return null;
        }
    }

    public function __destruct()
    {
        $this->baglan = null;
    }

}
$baglan = new Veritabani("localhost", "root", "", "crm");
