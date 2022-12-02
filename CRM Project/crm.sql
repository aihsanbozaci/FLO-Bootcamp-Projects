-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 02 Ara 2022, 12:06:56
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `crm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `kullaniciadi`, `sifre`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `logo`
--

INSERT INTO `logo` (`id`, `resim`) VALUES
(3, 'hayvanlar-icin-yasal-duzenlemeler-sart-465085-5.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirketbilgileri`
--

DROP TABLE IF EXISTS `sirketbilgileri`;
CREATE TABLE IF NOT EXISTS `sirketbilgileri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `sirketad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `vergidaire` text COLLATE utf8_turkish_ci NOT NULL,
  `vergino` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `sirketlogo` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sirketbilgileri`
--

INSERT INTO `sirketbilgileri` (`id`, `adsoyad`, `sirketad`, `vergidaire`, `vergino`, `telefon`, `email`, `adres`, `sirketlogo`) VALUES
(1, 'Ahmet İhsan Bozacı', 'BOZACI TECH', 'Yenibosna Vergi Dairesi', '654897321', '55566644478', 'ahmetbozac@gmail.com', 'Ahmet Ev', 'GettyImages-175174320-581251b65f9b58564ccaffe2-e1512484272755-990x556.jpg'),
(2, 'Melda Demir', 'DEMIRCILER', 'Zeytinburnu Vergi Dairesi', '6549873241', '44778998712', 'melda@mail.com', 'Zeytinburnu Ev', 'hayvanlar-icin-yasal-duzenlemeler-sart-465085-5.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
