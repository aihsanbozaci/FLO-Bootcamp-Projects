<?php
// Çıkış sayfası
    session_start();
    session_destroy();
    header( "Refresh:5; url='../index.php'");
    echo 'Çıkış yapıldı. 5 saniye içinde giriş ekranına yönlendirileceksiniz..';
?>