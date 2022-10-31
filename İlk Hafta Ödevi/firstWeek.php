<?php
//Örnek 1
/* 
Soru: Bir çiftlikte 5 ağıl var, her ağıl max. 30 koyun alabiliyor ve çiftlikte toplam 73 koyun var. İşlemler yapıldıktan sonra çıktı şu şekilde olmalı:
    Toplam Ağıl: 5
    Toplam Kapasite: 150
    Toplam Koyun: 73

    5. Ağıl: 30 Koyun
    4. Ağıl: 30 Koyun
    3. Ağıl: 13 Koyun
    2. Ağıl: 0 Koyun
    1. Ağıl: 0 Koyun
*/

//Örnek 2
/* 
Soru: Bir çiftlikte 3 ağıl var, her ağıl max. 45 koyun alabiliyor ve çiftlikte toplam 147 koyun var. İşlemler 
yapıldıktan sonra çıktı şu şekilde olmalı:
    Toplam Ağıl: 3
    Toplam Kapasite: 135
    Toplam Koyun: 147

    3. Ağıl: 45 Koyun
    2. Ağıl: 45 Koyun
    1. Ağıl: 45 Koyun
    Dışarıda Kalan: 12 Koyun
*/
/* Örnek 1 Parametreleriyle Gösterimi */
echo "Toplam Ağıl: 5 <br>";
echo "Toplam Kapasite: 150 <br>";
echo "Toplam Toplam Koyun: 73 <br><br>";

$agilSayisi = 5;
$agilKapasite = 30;
$topKoyun = 73;
$toplamKapasite = $agilKapasite * $agilSayisi;
$kalanKoyun = $topKoyun;
$disaridaKalan = $topKoyun - $toplamKapasite;

if ($topKoyun <= $toplamKapasite) {
    for ($kalanKoyun; $kalanKoyun >= 0; $kalanKoyun -= $agilKapasite) {
        if ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $agilKapasite" . "<br>";
        } elseif ($kalanKoyun > 0) {
            echo $agilSayisi-- . ". Ağıl: $kalanKoyun" . "<br>";
            while ($agilSayisi != 0) {
                echo $agilSayisi-- . ". Ağıl: 0" . "<br>";
            }
        }
    }
} else {
    for ($kalanKoyun; $kalanKoyun >= 0; $kalanKoyun -= $agilKapasite) {
        if ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $agilKapasite" . "<br>";
        } elseif ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $kalanKoyun" . "<br>";
            break;
            while ($agilSayisi != 0) {
                echo $agilSayisi-- . ". Ağıl: 0" . "<br>";
            }
        }
    }
    while ($topKoyun > $toplamKapasite) {
        echo "Dışarıda Kalan: " . $disaridaKalan . " koyun";
        break;
    }
}

echo "<br><hr><br>";


/* ---------------------------KODLAR AYNIDIR PARAMETRELER FARKLI. HER İKİ ÖRNEĞİ DE EKRANA YAZDIRIYORUM.------------------------------------- */


/* Örnek 2 Parametreleriyle Gösterimi */
echo "Toplam Ağıl: 3 <br>";
echo "Toplam Kapasite: 135 <br>";
echo "Toplam Toplam Koyun: 147 <br><br>";

$agilSayisi = 3;
$agilKapasite = 45;
$topKoyun = 147;
$toplamKapasite = $agilKapasite * $agilSayisi;
$kalanKoyun = $topKoyun;
$disaridaKalan = $topKoyun - $toplamKapasite;

if ($topKoyun <= $toplamKapasite) {
    for ($kalanKoyun; $kalanKoyun >= 0; $kalanKoyun -= $agilKapasite) {
        if ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $agilKapasite" . "<br>";
        } elseif ($kalanKoyun > 0) {
            echo $agilSayisi-- . ". Ağıl: $kalanKoyun" . "<br>";
            while ($agilSayisi != 0) {
                echo $agilSayisi-- . ". Ağıl: 0" . "<br>";
            }
        }
    }
} else {
    for ($kalanKoyun; $kalanKoyun >= 0; $kalanKoyun -= $agilKapasite) {
        if ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $agilKapasite" . "<br>";
        } elseif ($kalanKoyun >= $agilKapasite) {
            echo $agilSayisi-- . ". Ağıl: $kalanKoyun" . "<br>";
            break;
            while ($agilSayisi != 0) {
                echo $agilSayisi-- . ". Ağıl: 0" . "<br>";
            }
        }
    }
    while ($topKoyun > $toplamKapasite) {
        echo "Dışarıda Kalan: " . $disaridaKalan . " koyun";
        break;
    }
}
