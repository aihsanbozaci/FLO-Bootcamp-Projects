<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Sayfası</title>
</head>
<body style="text-align: center;">
    <br>
    <a href="index.php">Anasayfa</a> - <a href="liste.php">Liste</a><br><br><hr>

    <form method="post" action="ekle.php">
        <br>
        <b>Adınız Soyadınız:</b><br>
        <input type="text" name="adsoyad" size="50" required>
        <br><br>
        <b>Telefon Numaranız:</b><br>
        <input type="telefon" name="telefon" size="50" minlength="10" required>
        <br><br>
        <input type="submit" value="Bilgileri Kaydet" style="background-color: dodgerblue; color:white;">
    </form>

</body>
</html>