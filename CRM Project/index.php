<?php
session_start();  //Kullanıcı girişi kontrolü ve sessionlar
try {
  $baglan = new PDO("mysql:host=localhost; dbname=crm", "root", "");
  $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if (isset($_POST["login"])) {
    $sql = "select * from admin where kullaniciadi = :kullaniciadi and sifre = :sifre";
    $sorgu = $baglan->prepare($sql);
    $sorgu->execute(
      array(
        'kullaniciadi'     =>     strip_tags($_POST["kullaniciadi"]),
        'sifre'     =>     strip_tags($_POST["sifre"])
      )
    );
    $sayac = $sorgu->rowCount();
    if ($sayac > 0) {
      $_SESSION["kullaniciadi"] = strip_tags($_POST["kullaniciadi"]);
      $_SESSION["sifre"] = strip_tags($_POST["sifre"]);
      header("location:dosyalar/tablolar.php");
    } else {
      echo "<script> alert('Hatalı Giriş!'); </script>";
    }
  }
} catch (PDOException $e) {
  echo "Bağlantı hatası: " . $e->getMessage() . "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Girişi</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="dosyalar/theme-assets/css/login-style.css">
</head>

<body>
  <div id="login-form-wrap">
    <h2>Admin Girişi</h2>
    <form id="login-form" action="" method="post">
      <p>
        <input type="text" id="kullaniciadi" name="kullaniciadi" placeholder="Kullanıcı Adı" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="password" id="sifre" name="sifre" placeholder="Şifre" required><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" name="login" id="login" value="GİRİŞ">
      </p>
    </form>
    <br>
  </div>
</body>

</html>