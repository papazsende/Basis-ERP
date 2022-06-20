<?php

ob_start();
session_start();
include("ayar.php");

?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=650px, initial-scale=0.6, user-scalable=no">

</head>
<body onload="myFunction()">

<?php
include "forms/modals.php";

global $ad_soyad;
$ad_soyad = $_SESSION["ad_soyad"];
$yetki = $_SESSION['yetki'];

if(!isset($_SESSION['yetki'])) {
    echo 'hata';
}
if($yetki == "admin"){
    $silbuton = "silbuton";
    $onaybuton = "onaybuton";
    $detaybuton = "detaybuton";

    $sql_beklemede = $db->prepare("SELECT * FROM ihtiyac_talep WHERE  onay = 'beklemede' ORDER BY ihtiyac_tarih DESC");
    $sql_tamamlanan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'onaylandi' ORDER BY ihtiyac_tarih DESC");
    $sql_tamamlanmayan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'red' ORDER BY ihtiyac_tarih DESC");
    if(!isset($_POST['filterdata'])) {
        /* eger post bossa birsey yapmiyor */
        $sql_beklemede = $db->prepare("SELECT * FROM ihtiyac_talep WHERE  onay = 'beklemede' ORDER BY ihtiyac_tarih DESC");
        $sql_tamamlanan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'onaylandi' ORDER BY ihtiyac_tarih DESC");
        $sql_tamamlanmayan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'red' ORDER BY ihtiyac_tarih DESC");

    }else{
        /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */
        $inputdata = $_POST['filterdata'];
        $searchdata = "%$inputdata%";
        $sql_beklemede = $db->prepare( "SELECT * FROM ihtiyac_talep WHERE talep_eden LIKE :searchdata AND onay = 'beklemede' ORDER BY ihtiyac_tarih DESC");
        $sql_tamamlanan = $db->prepare( "SELECT * FROM ihtiyac_talep WHERE onay = 'onaylandi' AND talep_eden LIKE :searchdata ORDER BY ihtiyac_tarih DESC");
        $sql_tamamlanmayan =$db->prepare( "SELECT * FROM ihtiyac_talep WHERE onay = 'red' AND talep_eden LIKE :searchdata ORDER BY ihtiyac_tarih DESC");
        $sql_beklemede->bindParam(':searchdata',$searchdata);
        $sql_tamamlanan->bindParam(':searchdata',$searchdata);
        $sql_tamamlanmayan->bindParam(':searchdata',$searchdata);

    }
}else{

    $silbuton = "none";
    $onaybuton = "none";
    $detaybuton = "none";
    $sql_beklemede = $db->prepare("SELECT * FROM ihtiyac_talep WHERE  onay = 'beklemede' AND talep_eden = :adsoyad ORDER BY ihtiyac_tarih DESC");
    $sql_tamamlanan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'onaylandi'  AND talep_eden = :adsoyad ORDER BY ihtiyac_tarih DESC");
    $sql_tamamlanmayan = $db->prepare("SELECT * FROM ihtiyac_talep WHERE onay = 'red' AND talep_eden = :adsoyad  ORDER BY ihtiyac_tarih DESC");
    $sql_beklemede->bindParam(':adsoyad',$ad_soyad);
    $sql_tamamlanan->bindParam(':adsoyad',$ad_soyad);
    $sql_tamamlanmayan->bindParam(':adsoyad',$ad_soyad);


}

global $username;
global $talep_id;
$username = $_SESSION["ad_soyad"];


include "navbar_module.php";
if(isset($_POST['ihtiyacnot'])){
    $updateid = $_POST['detayid'];
    $durum = $_POST['durum'];
    $not = $_POST['not'];
    $sql_not = $db->prepare("UPDATE ihtiyac_talep SET onay = :durum,note = :note Where talep_id=:updateid");
    $sql_not->bindParam(':updateid',$updateid);
    $sql_not->bindParam(':durum',$durum);
    $sql_not->bindParam(':note',$not);


    if ($sql_not->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Talep Durumu Guncellendi ")';
        echo '</script>';
    } else {
        echo "Hata: " ;
    }

}
if(isset($_GET['ihtiyac_sil'])){
    $sil_id = $_GET['ihtiyac_sil'];
    $sql_sil = $db->prepare("DELETE FROM ihtiyac_talep WHERE talep_id = :sil_id");
    $sql_sil->bindParam(':sil_id',$sil_id);
    if($sql_sil->execute()){
        echo '<script language="javascript">';
        echo 'alert("Talep Basari ile silindi ")';
        echo '</script>';
    };

}

?>

<div id="maincontainer" class="animate-bottom">





    <div class="ihtiyaccontainer">
        <div class="filterbar">
            <form action="ihtiyac_takip.php" method="Post">
                <table>
                    <tr>
                        <td><input type="text" class="form-control" id="filterdata" placeholder="Filtreleme Yap" name="filterdata" style="float: right"></td>
                        <td>
                            <div class='butoncontainer'>
                                <?php
                                echo "<button onclick=\"return confirm('arama ve filtreleme islemi gerceklestirilsin mi?')\" name='filter' class='filterbutton' value='mehmet' type='submit'></button>"; ?>

                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
            <div class='hizmettitle yellow'>Ihtiyac Talep Listesi : BEKLEYEN </div>
            <div id="listcontainer" class="orta">
                    <?php
                    echo" 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <th>Talep ID</th>
                                <th>Tarih</th>
                                <th>Talep Eden</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>Detay</th>
                                <th>Onay</th>
                                <th>Not</th>

                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
                            $sql_beklemede->execute();
                            $results = $sql_beklemede-> fetchAll(PDO::FETCH_ASSOC);
                            // output data of each row
                            foreach($results as $row){
                            $talepeden =  $row["talep_eden"];
                            $ihtiyac_tarih=  $row["ihtiyac_tarih"];
                            $adet = $row["adet"];
                            $fiyat = $row["fiyat"];
                            $detay = $row["detay"];
                            $talep_id = $row["talep_id"];
                            $urun = $row["urun"];
                            $ihtiyac_onay = $row["onay"];
                            $note = $row['note'];
                            echo "<tr>
                                <td>$talep_id</td>    
                                <td>$ihtiyac_tarih</td>
                                <td>$talepeden</td>
                                <td>$urun</td>
                                <td>$adet</td>
                                <td>$fiyat</td>
                                <td>$detay</td>
                                <td>$ihtiyac_onay</td>
                                <td>$note</td>

                                <td style='width:20px'>
                                    <div class='butoncontainer'>
                                            <a href='ihtiyac_takip.php?ihtiyac_sil=$talep_id'> 
                                                    <button onclick=\"return confirm('$urun isimli Talebi silmek uzeresiniz?')\" name='red' class='$silbuton' value='$talep_id' type='submit'></button></a>
                                            <button onclick=\"listmodal('ihtiyacnot','$talep_id')\" name='bekle' class='$detaybuton' value='$talep_id' type='submit'></button>
                                    </div>
                                </td>
                                <div></div>

                            </tr>
                            ";
                            };


                            echo "
                            </tbody>
                        </table>
                   
                    ";



                    ?>
                </div>
             <div class='hizmettitle green'>Ihtiyac Talep Listesi : ONAYLANAN </div>
            <div id="listcontainer" class="orta">
                    <span class="close" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'></span>
                <?php
                $sql_tamamlanan->execute();


                echo" 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <th>Talep ID</th>
                                <th>Tarih</th>
                                <th>Talep Eden</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>Detay</th>
                                <th>Onay</th>
                                <th>Not</th>

                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
                        $results = $sql_tamamlanan-> fetchAll(PDO::FETCH_ASSOC);
                        // output data of each row
                        foreach($results as $row){
                        $talepeden =  $row["talep_eden"];
                        $ihtiyac_tarih=  $row["ihtiyac_tarih"];
                         $adet = $row["adet"];
                        $fiyat = $row["fiyat"]; $detay = $row["detay"];
                        $talep_id = $row["talep_id"];
                        $urun = $row["urun"];
                        $ihtiyac_onay = $row["onay"];
                        $note = $row['note'];
                            echo "<tr>
                                <td>$talep_id</td>    
                                <td>$ihtiyac_tarih</td>
                                <td>$talepeden</td>
                                <td>$urun</td>
                                <td>$adet</td>
                                <td>$fiyat</td>
                                <td>$detay</td>
                                <td>$ihtiyac_onay</td>
                                <td>$note</td>
                                <td style='width:20px'>
                                    <div class='butoncontainer'>
                                            <a href='ihtiyac_takip.php?ihtiyac_sil=$talep_id'> 
                                                    <button onclick=\"return confirm('$urun isimli Talebi silmek uzeresiniz?')\" name='red' class='$silbuton' value='$talep_id' type='submit'></button></a>
                                            <button onclick=\"listmodal('ihtiyacnot', '$talep_id')\" name='bekle' class='$detaybuton' value='$talep_id' type='submit'></button>
    
                                    </div>
                                </td>
                                <div></div>

                            </tr>
                            ";


                };


                echo "
                            </tbody>
                        </table>
                   
                    ";



                 ?>


            </div>
             <div class='hizmettitle red'>Ihtiyac Talep Listesi : REDDEDILEN </div>

            <div id="listcontainer" class="orta">

                    <span class="close" onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'></span>
                    <?php
                    $sql_tamamlanmayan->execute();


                    echo" 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                               
                                <th>Talep ID</th>
                                <th>Tarih</th>
                                <th>Talep Eden</th>
                                <th>Ürün</th>
                                <th>Adet</th>
                                <th>Fiyat</th>
                                <th>Detay</th>
                                <th>Onay</th>
                                <th>Not</th>
                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
                            $results = $sql_tamamlanmayan-> fetchAll(PDO::FETCH_ASSOC);
                            // output data of each row
                            foreach($results as $row){
                            $talepeden =  $row["talep_eden"];
                            $ihtiyac_tarih =  $row["ihtiyac_tarih"];
                            $adet = $row["adet"];
                            $fiyat = $row["fiyat"];
                            $detay = $row["detay"];
                            $talep_id = $row["talep_id"];
                            $urun = $row["urun"];
                            $ihtiyac_onay = $row["onay"];
                            $note = $row["note"];

                                echo "<tr>
                               
                                <td>$talep_id</td>   
                                <td>$ihtiyac_tarih</td>
                                <td>$talepeden</td>
                                <td>$urun</td>
                                <td>$adet</td>
                                <td>$fiyat</td>
                                <td>$detay</td>
                                <td>$ihtiyac_onay</td>
                                <td>$note</td>

                                <td style='width:20px'>
                                        <div class='butoncontainer'>
                                                <a href='ihtiyac_takip.php?ihtiyac_sil=$talep_id'> 
                                                    <button onclick=\"return confirm('$urun isimli Talebi silmek uzeresiniz?')\" name='red' class='$silbuton' value='$talep_id' type='submit'></button></a>
                                                <button onclick=\"listmodal('ihtiyacnot', '$talep_id')\" name='bekle' class='$detaybuton' value='$talep_id' type='submit'></button>
        
                                        </div>
                                </td>
                                <div>
                                

                            </tr>
                            ";


                    };


                    echo "
                            </tbody>
                        </table>
                   
                    ";

                     ?>


                </div>


            </div>
        </div>

<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 0);
    }

    function showPage() {
        document.getElementById("maincontainer").style.display = "block";

    }
</script>
</body>