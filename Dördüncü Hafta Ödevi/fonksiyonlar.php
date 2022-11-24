<?php
require("kayitlar.php");
class Veritabani
{
    private $baglan;
    public function __construct($host, $kullanici, $sifre, $veritabani)
    {
        try {
            $this->baglan = new PDO("mysql:host=$host;dbname=$veritabani;charset=utf8", $kullanici, $sifre);
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
    public function __destruct()
    {
        $this->baglan = null;
    }
}
$baglan = new Veritabani("localhost", "root", "aabbcc123", "dorduncuhafta");
?>
