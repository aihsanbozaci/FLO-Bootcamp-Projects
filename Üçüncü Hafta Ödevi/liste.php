<?php
include('baglan.php');
$sorgu = $baglan->query("select * from kayitlar order by id asc",PDO::FETCH_ASSOC);

echo "
<a href='index.php'><b><-Anasayfa</b></a><br><hr><br>
<table width='100%' border='1' style=\"border: 1px solid black; border-collapse: collapse;\">
<tr align='center'>
<th>Adı Soyadı</th>
<th>Telefon Numarası</th>
<th>İşlem</th>
</tr>
";
foreach ($sorgu as $satir) {
$id = $satir['id'];
$adsoyad = $satir['adsoyad'];
$telefon = $satir['telefon'];

echo "
<tr align='center'>
<td>$adsoyad</td>
<td>$telefon</td>
<td><a href='sil.php?id=$id' onclick=\"if (!confirm('Kaydı silmek istediğinize emin misiniz?')) return false;\">Sil</a></td>
</tr>
";
}
$toplam = $sorgu->rowCount();
echo "
<td align='center' colspan='5'>Sistemde Toplam -<b>$toplam</b>- Kayıt Var.</td>
</table>";

?>

