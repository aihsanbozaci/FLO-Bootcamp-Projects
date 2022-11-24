<?php
require("kayitlar.php");
$baglan = new Veritabani("localhost", "root", "aabbcc123", "dorduncuhafta");
class Veritabani
{
    private $baglan;
    
    private $host = 'localhost';
    private $kullanici = "root";
    private $sifre = "aabbcc123";
    private $veritabani = "dorduncuhafta";

    public function __construct()
    {
        try {
            $this->baglan = new PDO("mysql:host=$this->host;dbname=$this->veritabani;charset=utf8", $this->kullanici, $this->sifre);
            $this->baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            echo "Bağlantı hatası: " . $e->getMessage() . "<br>";
        }
    }
    public function veriCek($sql)
    {
        $sql = "select * from kayitlar order by id asc";
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
    public function veriEkle($adsoyad,$tcno){
        $sql = "insert into kayitlar (id,adsoyad, tcno) values (null,?,?)";
        $sorgu = $this->baglan->prepare($sql);
        $sorgu->execute([$adsoyad,$tcno]);
    }   
}
?>
