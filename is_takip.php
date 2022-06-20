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


$yetki = $_SESSION['yetki'];
if ((!$yetki == 'admin') && (!$yetki == 'user')) {
    header("Location:admin.php");

} else {


}

global $username;
global $talep_id;
$username = $_SESSION["ad_soyad"];
$bugun = date("Y-m-d");

include "navbar_module.php";
if ($yetki == "admin") {
    $silbuton = "silbuton";
    $onaybuton = "onaybuton";
    $detaybuton = "detaybuton";
    if (!isset($_POST['filterdata'])) {
        /* eger post bossa birsey yapmiyor */

        $sql_beklemede = $db->prepare("SELECT * FROM hizmet_tbl WHERE  talep_durum = 'beklemede' ORDER BY talep_tarih DESC");
        $sql_tamamlanan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlandi' ORDER BY teslim_tarih DESC");
        $sql_tamamlanmayan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlanmadi' ORDER BY teslim_tarih DESC");
        $sql_beklemede->bindParam(':bugun', $bugun);
        $sql_tamamlanmayan->bindParam(':bugun', $bugun);

    } else {
        /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */


        $inputdata = $_POST['filterdata'];
        $searchdata = "%$inputdata%";
        $sql_beklemede = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_edilen LIKE :searchdata AND talep_durum = 'beklemede' ORDER BY talep_tarih DESC");
        $sql_tamamlanan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlandi' AND talep_edilen LIKE :searchdata ORDER BY teslim_tarih DESC");
        $sql_tamamlanmayan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlanmadi' AND talep_edilen LIKE :searchdata ORDER BY talep_tarih DESC");
        $sql_beklemede->bindParam(':searchdata', $searchdata);
        $sql_tamamlanan->bindParam(':searchdata', $searchdata);
        $sql_tamamlanmayan->bindParam(':searchdata', $searchdata);

    }
} else {

    $silbuton = "none";
    $onaybuton = "none";
    $detaybuton = "none";
    $sql_beklemede = $db->prepare("SELECT * FROM hizmet_tbl WHERE  talep_durum = 'beklemede' AND talep_edilen = :adsoyad OR talep_eden = :adsoyad ORDER BY talep_tarih DESC");
    $sql_tamamlanan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlandi'  AND talep_edilen = :adsoyad OR talep_eden = :adsoyad ORDER BY talep_tarih DESC");
    $sql_tamamlanmayan = $db->prepare("SELECT * FROM hizmet_tbl WHERE talep_durum = 'tamamlanmadi' AND talep_edilen = :adsoyad OR talep_eden = :adsoyad  ORDER BY talep_tarih DESC");
    $sql_beklemede->bindParam(':adsoyad', $ad_soyad);
    $sql_tamamlanan->bindParam(':adsoyad', $ad_soyad);
    $sql_tamamlanmayan->bindParam(':adsoyad', $ad_soyad);


}


if (!isset($_POST['red'])) {
    /* eger post bossa birsey yapmiyor */
} else {
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */

    $sil_id = $_POST['red'];
    $sql_red = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'tamamlanmadi' Where hizmet_id=:sil_id");
    $sql_red->bindParam(':sil_id', $sil_id);

    if ($sql_red->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Hizmet Red Edilenler listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: silemedik ";
    }
}
if (!isset($_POST['onay'])) {
    /* eger post bossa birsey yapmiyor */
} else {
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */


    $onay_id = $_POST['onay'];
    $sql_onay = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'tamamlandi' Where hizmet_id=:onay_id");
    $sql_onay->bindParam(':onay_id', $onay_id);

    if ($sql_onay->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Hizmet Onay listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: onay";
    }
}
if (!isset($_POST['bekle'])) {
    /* eger post bossa birsey yapmiyor */
} else {
    /* eger post doluysa degiskene aktariyor ve gelen id uzerinden veri tabanindaki kaydi siliyoruz */


    $bekle_id = $_POST['bekle'];
    $sql_bekle = $db->prepare("UPDATE hizmet_tbl SET talep_durum = 'beklemede' Where hizmet_id=:bekle_id");
    $sql_bekle->bindParam(':bekle_id', $bekle_id);

    if ($sql_bekle->execute()) {
        echo '<script language="javascript">';
        echo 'alert("Hizmet, Bekleyenler listesine Tasindi ")';
        echo '</script>';
    } else {
        echo "Hata: onay";
    }
}

?>

<div id="maincontainer" class="animate-bottom">


    <div class="ihtiyaccontainer">
        <div class="filterbar">
            <form action="is_takip.php" method="Post">
                <table>
                    <tr>
                        <td><input type="text" class="form-control" id="filterdata" placeholder="Filtreleme Yap"
                                   name="filterdata" style="float: right"></td>
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
        <div class='hizmettitle yellow'>Hizmet Takip Listesi : BEKLEYEN</div>
        <div id="listcontainer" class="orta">
            <span class="close"
                  onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'></span>
            <?php
            $sql_beklemede->execute();

            echo " 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <th>Talep Eden</th>
                                <th>Talep Edilen Kisi</th>
                                <th>Talep Tarih</th>
                                <th>Is</th>
                                <th>Talep Durum</th>
                                <th>Talep Detay</th>
                                <th>Teslim Tarihi</th>
                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
            $results = $sql_beklemede->fetchAll(PDO::FETCH_ASSOC);
            // output data of each row
            foreach ($results as $row) {
            $hizmet_id = $row["hizmet_id"];
            $talepeden = $row["talep_eden"];
            $talep_edilen = $row["talep_edilen"];
            $talep_tarih = $row["talep_tarih"];
            $talep_edilen_is = $row["talep_edilen_is"];
            $talep_durum = $row["talep_durum"];
            $talep_detay = $row["talep_detay"];
            $teslim_tarih = $row["teslim_tarih"];
            echo "<tr>
                                <td>$talepeden</td>    
                                <td>$talep_edilen</td>
                                <td>$talep_tarih</td>
                                <td>$talep_edilen_is</td>
                                <td>$talep_durum</td>
                                <td>$talep_detay</td>
                                <td>$teslim_tarih</td>
                                <td style='width:20px'>
                                    <div class='butoncontainer'>
                                        <form action='is_takip.php' method='post'>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Red Ediyorsunuz,Onayliyor musunuz?')\" name='red' class='silbuton' value='$hizmet_id' type='submit'></button>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Onayliyorsunuz,Onayliyor musunuz?')\" name='onay' class='onaybuton' value='$hizmet_id' type='submit'></button>
    
                                        </form>
                                    </div>
                                </td>
                                <div></div>

                            </tr>
                            ";


            }


            echo "
                            </tbody>
                        </table>
                   
                    ";


            ?>
        </div>

        <div class='hizmettitle green'>Hizmet Takip Listesi : TAMAMLANAN</div>
        <div id="listcontainer" class="orta">
            <span class="close"
                  onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'></span>
            <?php
            $sql_tamamlanan->execute();

            echo " 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <th>Talep Eden</th>
                                <th>Talep Eden Birim</th>
                                <th>Talep Edilen Birim</th>
                                <th>Talep Edilen Kisi</th>
                                <th>Talep Tarih</th>
                                <th>Is</th>
                                <th>Talep Durum</th>
                                <th>Talep Detay</th>
                                <th>Teslim Tarihi</th>
                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
            $results = $sql_tamamlanan->fetchAll(PDO::FETCH_ASSOC);
            // output data of each row
            foreach ($results as $row) {
            $hizmet_id = $row["hizmet_id"];
            $talepeden = $row["talep_eden"];
            $talep_edilen = $row["talep_edilen"];
            $talep_tarih = $row["talep_tarih"];
            $talep_edilen_is = $row["talep_edilen_is"];
            $talep_durum = $row["talep_durum"];
            $talep_detay = $row["talep_detay"];
            $teslim_tarih = $row["teslim_tarih"];
            echo "<tr>
                                <td>$talepeden</td>    

                                <td>$talep_edilen</td>
                                <td>$talep_tarih</td>
                                <td>$talep_edilen_is</td>
                                <td>$talep_durum</td>
                                <td>$talep_detay</td>
                                <td>$teslim_tarih</td>
                                <td style='width:20px'>
                                    <div class='butoncontainer'>
                                        <form action='is_takip.php' method='post'>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Red Ediyorsunuz,Onayliyor musunuz?')\" name='red' class='silbuton' value='$hizmet_id' type='submit'></button>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Beklemeye aliyorsunuz ?')\" name='bekle' class='detaybuton' value='$hizmet_id'  type='submit'></button>
    
                                        </form>
                                    </div>
                                </td>
                                <div></div>

                            </tr>
                            ";


            }


            echo "
                            </tbody>
                        </table>
                   
                    ";


            ?>
        </div>
        <div class='hizmettitle red'>Hizmet Takip Listesi : TAMAMLANMAYAN</div>
        <div id="listcontainer" class="orta">
            <?php
            $sql_tamamlanmayan->execute();

            echo " 
                        <table class='table table-striped'>
                            <thead>
                            <tr>
                                <th>Talep Eden</th>
                                <th>Talep Edilen Kisi</th>
                                <th>Talep Tarih</th>
                                <th>Is</th>
                                <th>Talep Durum</th>
                                <th>Talep Detay</th>
                                <th>Teslim Tarihi</th>
                                <th style='width:10px;' onclick='popupac()'>Duzenle </th>

                            </tr>
                            </thead>
                            <tbody>
                            ";
            $results = $sql_tamamlanmayan->fetchAll(PDO::FETCH_ASSOC);
            // output data of each row
            foreach ($results as $row) {
            $hizmet_id = $row["hizmet_id"];
            $talepeden = $row["talep_eden"];
            $talep_edilen = $row["talep_edilen"];
            $talep_tarih = $row["talep_tarih"];
            $talep_edilen_is = $row["talep_edilen_is"];
            $talep_durum = $row["talep_durum"];
            $talep_detay = $row["talep_detay"];
            $teslim_tarih = $row["teslim_tarih"];
            echo "<tr>
                                <td>$talepeden</td>    
                                <td>$talep_edilen</td>
                                <td>$talep_tarih</td>
                                <td>$talep_edilen_is</td>
                                <td>$talep_durum</td>
                                <td>$talep_detay</td>
                                <td>$teslim_tarih</td>
                                <td style='width:20px'>
                                    <div class='butoncontainer'>
                                        <form action='is_takip.php' method='post'>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Red Ediyorsunuz,Onayliyor musunuz?')\" name='red' class='silbuton' value='$talep_id' type='submit'></button>
                                            <button onclick=\"return confirm('$talep_edilen_is isimli Talebi Onayliyorsunuz,Onayliyor musunuz?')\" name='onay' class='onaybuton' value='$hizmet_id' name='onay' type='submit'></button>
    
                                        </form>
                                    </div>
                                </td>
                                <div></div>

                            </tr>
                            ";


            }


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
</html>