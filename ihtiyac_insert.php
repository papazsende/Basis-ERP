<?php

ob_start();
session_start();
include("ayar.php");

/* Listele modulundeki popupdan gelecek veriler icin degiskenleri tanimladik */
global $talep_eden;
global $fiyat;
global $urun;
global $adet;
global $detay;
/* Get ile gelen verileri degiskenlerin icine cektik */
$talep_eden = $_GET['talep_eden'];
$urun = $_GET['urun'];
$fiyat = $_GET['fiyat'];
$adet = $_GET['adet'];
$detay = $_GET['detay'];



/* Sunucu baglantisi*/
// Check connection

/* Gelen verileri degiskenleri kullanarak sql sorgusu ile veri tabanina ekledik*/
$stmt = $db->prepare("INSERT INTO `ihtiyac_talep` (`talep_eden`, `urun`, `adet`, `fiyat`, `detay`)
VALUES (:talepeden, :urun, :adet, :fiyat, :detay); ");

    $stmt->bindParam(':talepeden',$talep_eden);
    $stmt->bindParam(':urun',$urun);
    $stmt->bindParam(':adet',$adet);
    $stmt->bindParam(':fiyat',$fiyat);
    $stmt->bindParam(':detay',$detay);
   if($stmt->execute()){
       echo "Kayit Basari ile Olusturuldu Anasayfaya yonlendiriliyorsunuz";
       header('Location: ihtiyac_takip.php');


   }else{
       echo "Beklenmeyen bir hata meydana geldi";
   }



?>