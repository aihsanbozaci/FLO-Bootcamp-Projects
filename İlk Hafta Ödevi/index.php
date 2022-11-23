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

    $agilSayisi = 10;
    $agilKapasite = 14;
    $koyunSayisi = 150;

    $kapasite = $agilSayisi * $agilKapasite;
    $artan = $koyunSayisi - $kapasite;

    echo "Ağıl Sayısı: $agilSayisi <br> Ağıl Kapasitesi: $agilKapasite <br> Koyun Sayısı: $koyunSayisi<br>";
    echo "Toplam Kapasite: $kapasite <br><br>";



    $kalanKoyun = $koyunSayisi;

    for ($i = $agilSayisi; $i >= 1; $i--) {
        

        if ($kalanKoyun >= $agilKapasite) {
            echo "$i.Ağıl: $agilKapasite<br>";
        } else {

            if ($kalanKoyun >= 0) {
                echo "$i.Ağıl: $kalanKoyun<br>";
            } else {
                echo "$i.Ağıl: 0 <br>";
            }
            
        }

        $kalanKoyun = $kalanKoyun - $agilKapasite;

    }

    if ($artan > 0) {
        echo "<br> Artan Koyun: $artan<br>";
    }

?>