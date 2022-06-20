<?php

ob_start();
session_start();
/* Listele modulundeki popupdan gelecek veriler icin degiskenleri tanimladik */
include "ayar.php";
$yetki = $_SESSION['yetki'];
global $talep_eden;

global $talep_edilen;
global $teslim_tarih;
global $talep_detay;
global $talep_edilen_is;
/* Get ile gelen verileri degiskenlerin icine cektik */
$talep_eden = $_GET['talep_eden'];
$talep_edilen = $_GET['talep_edilen'];

$teslim_tarih = $_GET['teslim_tarih'];
$talep_detay = $_GET['talep_detay'];
$talep_edilen_is = $_GET['talep_edilen_is'];




/* Gelen verileri degiskenleri kullanarak sql sorgusu ile veri tabanina ekledik*/

$sql = $db->prepare( "INSERT INTO `hizmet_tbl` (`talep_eden`, `talep_edilen`,`talep_edilen_is`,`teslim_tarih`, `talep_detay`)
VALUES (:talep_eden,:talep_edilen,:talep_edilen_is,:teslim_tarih,:talep_detay)");
$sql->bindParam(':talep_eden',$talep_eden);
$sql->bindParam(':talep_edilen',$talep_edilen);
$sql->bindParam(':talep_edilen_is',$talep_edilen_is);
$sql->bindParam(':teslim_tarih',$teslim_tarih);
$sql->bindParam(':talep_detay',$talep_detay);

if($sql->execute()){
    echo "Kayit Basari ile Olusturuldu Anasayfaya yonlendiriliyorsunuz";
    if($yetki == "admin"){

        header('Location: is_takip.php');

    }elseif ($yetki== "user"){

        header('Location: is_takip.php');

    }
} else {
    echo "Hata: ";
    echo $talep_eden;
    echo $talep_edilen;

    echo $teslim_tarih;
    echo $talep_detay;
    echo $talep_edilen_is;

}


$yetki = $_SESSION["yetki"];

