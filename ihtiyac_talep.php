<?php

ob_start();
session_start();
include("ayar.php");

?>

<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <META http-equiv=content-type content=text/html;charset=iso-8859-9>
    <META http-equiv=content-type content=text/html;charset=windows-1254>
    <META http-equiv=content-type content=text/html;charset=x-mac-turkish>
    <meta name="viewport" content="width=650px, initial-scale=0.6, user-scalable=no">

</head>
<body onload="myFunction()">
<div id="loader" class="animate-bottom"></div>

<?php




$ad_soyad = $_SESSION["ad_soyad"];
include "navbar_module.php";


?>

<div id="maincontainer" style="display: none" class="animate-bottom">


        <div class="right">

                <div class="formcontainer">
                    <div class="maintitle"><h2>Ihtiyac Talebi Oluştur</h2></div>
                    <form class="form-horizontal" method="get" action="ihtiyac_insert.php">
                        <div class="form-group form-group-lg">
                            <label class="control-label" for="talep_eden">Talep Eden Kisi :</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="talep_eden" placeholder="Talep Eden Kisi" value="<?php echo $ad_soyad; ?>" name="talep_eden" readonly>
                            </div>
                        </div>



                        <div class="form-group form-group-lg">
                            <label class="control-label" for="urun">Talep Edilen Urun:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="urun" placeholder="Urun Adini Giriniz" name="urun">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="control-label" for="adet">Adet:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="adet" placeholder="Adet Belirtiniz" name="adet">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="control-label" for="adet">Fiyat:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="fiyat" placeholder="Fiyat Belirtiniz" name="fiyat">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="control-label" for="adet">Detay:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="detay" placeholder="Detay Belirtiniz" name="detay">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="col-sm-offset-0 col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" value="Ekle">
                            </div>
                        </div>
                    </form>
                </div>


        </div>

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
</html>