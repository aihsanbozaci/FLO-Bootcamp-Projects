<?php
require("fonksiyonlar.php");
$baglan = new Veritabani("localhost", "root", "aabbcc123", "dorduncuhafta");
$kayitlar = $baglan->veriCek($sql);

echo "
<a href='index.php'><b><-Anasayfa</b></a><br><hr><br>
<table width='100%' border='1' style=\"border: 1px solid black; border-collapse: collapse;\">
<tr align='center'>
<th>id</th>
<th>Adı Soyadı</th>
<th>T.C Kimlik No</th>
<th>Durum</th>
</tr>
";
foreach ($kayitlar as $satir) {
$id = $satir->idFonksiyon();
$adsoyad = $satir->adsoyadFonksiyon();
$tcno = $satir->tcnoFonksiyon();
$dogrulama = $satir->dogrulamaFonksiyon();

echo "
<tr align='center'>
<td>$id</td>
<td>$adsoyad</td>
<td>$tcno</td>
<td>$dogrulama</td>
</tr>
";
}
echo "</table>";

?>

