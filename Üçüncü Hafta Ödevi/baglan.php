<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "root";
$mysqlsifre = "aabbcc123";
$veritabani = "thirdweekproject";
try {
    $baglan = new PDO("mysql:host=$mysqlsunucu;dbname=$veritabani;charset=utf8", $mysqlkullanici, $mysqlsifre);
    $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Bağlantı hatası: " . $e->getMessage()."<br>";
    }

?>