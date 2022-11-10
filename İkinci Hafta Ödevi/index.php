<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 10px;
    }

    input[type=number] {
      width: 40px;
    }

    input[name=ekle] {
      float: right;
      background-color: #3b5998;
      color: white;
      font-weight: bold;
    }

    td[id=urunfiyat],
    td[id=urunadet] {
      text-align: center;
    }
  </style>
</head>

<body>
  <form method="POST" action="index.php">
    <table style="width:100%;">
      <tr>
        <th>Ürün Adı</th>
        <th>Ürün Fiyatı</th>
        <th>Adet</th>
      </tr>
      <tr>
        <td>Ülker Çikolatalı Gofret 40 gr.</td>
        <td id="urunfiyat">10 TL</td>
        <td id="urunadet"><input type="number" name="urun0" value="0" min="0"></td>
      </tr>
      <tr>
        <td>Eti Damak Kare Çikolata 60 gr.</td>
        <td id="urunfiyat">20 TL</td>
        <td id="urunadet"><input type="number" name="urun1" value="0"></td>
      </tr>
      <tr>
        <td>Nestle Bitter Çikolata 50 gr.</td>
        <td id="urunfiyat">20 TL</td>
        <td id="urunadet"><input type="number" name="urun2" value="0"></td>
      </tr>
    </table>
    <br>
    <input type="submit" name="ekle" value="Ürünü Sepete Ekle">
  </form>
  <br><br><br><br><br><br><br><br><br><br>

  <?php

  session_start();

  $_SESSION['urunler'] = array();

  if (isset($_SESSION['urun0'])) {
    if ($_POST) {
      $urunAdet0 = $_SESSION['urun0'] += $_POST['urun0'];
      $urunAdet1 = $_SESSION['urun1'] += $_POST['urun1'];
      $urunAdet2 = $_SESSION['urun2'] += $_POST['urun2'];
      array_push($_SESSION['urunler'], $urunAdet0, $urunAdet1, $urunAdet2);
    } else {
      $urunAdet0 = $_SESSION['urun0'];
      $urunAdet1 = $_SESSION['urun1'];
      $urunAdet2 = $_SESSION['urun2'];
    }
  } else {
    $urunAdet0 = $_SESSION['urun0'] = 0;
    $urunAdet1 = $_SESSION['urun1'] = 0;
    $urunAdet2 = $_SESSION['urun2'] = 0;
    if ($_POST) {
      $urunAdet0 = $_SESSION['urun0'] = $_POST['urun0'];
      $urunAdet1 = $_SESSION['urun1'] = $_POST['urun1'];
      $urunAdet2 = $_SESSION['urun2'] = $_POST['urun2'];
      array_push($_SESSION['urunler'], $urunAdet0, $urunAdet1, $urunAdet2);
    }
  }
  $urunFiyat0 = $urunAdet0 * 10;
  $urunFiyat1 = $urunAdet1 * 20;
  $urunFiyat2 = $urunAdet2 * 20;
  $toplam = $urunFiyat0 + $urunFiyat1 + $urunFiyat2;





  echo "
    <table width='100%'>
    <tr>
    <th>Ürün Adı</td>
    <th>Adet</td>
    <th>Toplam</td>
    </tr>
    <tr>
    <td>Ülker Çikolatalı Gofret 40 gr.</td>
    <td id='urunadet'>$urunAdet0</td>
    <td id='urunfiyat'>$urunFiyat0 TL</td>
  </tr>
  <tr>
    <td>Eti Damak Kare Çikolata 60 gr.</td>
    <td id='urunadet'>$urunAdet1</td>
    <td id='urunfiyat'>$urunFiyat1 TL</td>
  </tr>
  <tr>
    <td>Nestle Bitter Çikolata 50 gr.</td>
    <td id='urunadet'>$urunAdet2</td>
    <td id='urunfiyat'>$urunFiyat2 TL</td>
  </tr>
  <tr>
    <td colspan='2'>Genel Toplam</td>
    <td id='urunfiyat'>$toplam TL</td>
  </tr>
</table>
    ";

  ?>

</body>

</html>
