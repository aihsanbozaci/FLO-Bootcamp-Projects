<?php
include('baglan.php');
$id = $_GET["id"];
$sorgu = $baglan->exec("delete from kayitlar where id=$id");
if($sorgu){
    echo "<script>
    alert('Kayıt Silindi');
    window.location.href = 'liste.php';
    </script>";
}else{
    echo "Kayıt Silinemedi";
}

?>