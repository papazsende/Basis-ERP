<?php

ob_start();
session_start();
include("ayar.php");
$yetki = $_SESSION["yetki"];
if($yetki != 'user'){
    header('Location: index.php');
}
require_once 'modules.php';

global $username;

$username = $_SESSION["ad_soyad"];
global $ad_soyad; ?>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta name="viewport" content="width=650px, initial-scale=0.6, user-scalable=no">

</head>
<body onLoad="myFunction()">

<div id="loader" class="animate-bottom"></div>

<?php
include "forms/modals.php";


$bugun = date("Y-m-d H:i:s");
if(!isset($_POST['red'])) {
    /* eger post bossa birsey yapmiyor */
}else{
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */

    $sil_id = $_POST['red'];
    $sql_red = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'tamamlanmadi' Where hizmet_id=:sil_id");
    $sql_red->bindParam(':sil_id',$sil_id);
    if ($sql_red->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Talep Red Edilenler listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: ";
    }
}
if(!isset($_POST['onay'])) {
    /* eger post bossa birsey yapmiyor */
}else{
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */

    $onay_id = $_POST['onay'];
    $sql_onay = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'tamamlandi' Where hizmet_id=:onay_id");
    $sql_onay->bindParam(':onay_id',$onay_id);
    if ($sql_onay->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Talep Red Edilenler listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: ";
    }
}
if(!isset($_POST['bekle'])) {
    /* eger post bossa birsey yapmiyor */
}else{
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */

    $bekle_id = $_POST['bekle'];
    $sql_bekle = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'beklemede' Where hizmet_id=:bekle_id");

    $sql_bekle->bindParam(':sil_id',$bekle_id);
    if ($sql_bekle->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Talep Red Edilenler listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: ";
    }
}

include "navbar_module.php";


    $sqlihtiyac = $db->prepare( "SELECT talep_id,ihtiyac_tarih,urun, talep_eden, birim, adet, fiyat,detay,onay FROM ihtiyac_talep WHERE talep_eden = :ad_soyad");
    $sqlihtiyac->bindParam(':ad_soyad',$ad_soyad);

?>
<div class="left">
    <?php
    include("userbar.php");

    ?>

</div>
<div id="indexcontainer" style=" display:block;margin-top: 30px" class="animate-bottom" >



        <div class="right">

            <div id="usercredit">
                <div class='maintitle blue' style='text-align: left'>DASHBOARD <span class='sagayasla glyphicon glyphicon-edit sagayasla '  style='margin-right: 20px;line-height: 40px;font-size: 24px'></span></div>
                <div class='kunye'>
                    <div class='kunyein'>
                        <div class='picture'>
                            <span class='ortala' style='width: 50px'><img src='img/avatar.png' class='img img-circle ortala' width='100%'> </span>
                        </div>
                        <div class='kunyetext'>
                            <?php echo $ad_soyad; ?> <br>
                            <strong><?php echo $yetki; ?><br>


                        </div>
                    </div>
                </div>
            </div>

            <?php ortakmoduller();






            ?>

        </div>


<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 0);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("maincontainer").style.display = "block";

    }
</script>

</body>