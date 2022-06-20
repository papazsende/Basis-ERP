<?php

ob_start();
session_start();
include("ayar.php");

?>

<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <META http-equiv=content-type content=text/html;charset=iso-8859-9>
    <META http-equiv=content-type content=text/html;charset=windows-1254>
    <META http-equiv=content-type content=text/html;charset=x-mac-turkish>
    <meta name="viewport" content="width=650px, initial-scale=0.6, user-scalable=no">

</head>

<script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    $.webshims.formcfg = {
        en: {
            dFormat: '-',
            dateSigns: '-',
            patterns: {
                d: "yy-mm-dd"
            }
        }
    };
</script>

<body onload="myFunction()">
<div id="loader" class="animate-bottom"></div>

<?php

$ad_soyad = $_SESSION["ad_soyad"];
include "navbar_module.php";


?>

<div id="maincontainer" style="display: none" class="animate-bottom">


        <div class="right">


                <div class="formcontainer">
                    <div class="maintitle"><h2>Hizmet Talebi Oluştur</h2></div>
                    <form class="form-horizontal" method="get" action="hizmet_insert.php">
                        <div class="form-group form-group-lg">
                            <label class="" for="talep_eden">Talep Eden Kisi :</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="talep_eden" placeholder="Talep Eden Kisi" name="talep_eden" value="<?php echo $ad_soyad; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group form-group-lg">
                            <label class="">Talep Edilen Kisi:</label>
                            <div class="col-sm-12">

                            <select class="form-froup" id="talep_edilen" name="talep_edilen">

                                <?php $sql = $db->prepare( "SELECT user_ns FROM user_tbl");
                                $sql->execute();
                                $results = $sql-> fetchAll(PDO::FETCH_ASSOC);
                                // output data of each row
                                foreach($results as $row){
                                // output data of each row
                                $ad_soyad =  $row["user_ns"];
                                ?>
                                <option value="<?php echo $ad_soyad; ?>"><?php echo $ad_soyad; }?></option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="" for="adet">Talep Edilen Is:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="talep_edilen_is" placeholder="Talep Edilen Is" name="talep_edilen_is">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="" for="teslim_tarih">Teslim Tarihi:</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control" id="teslim_tarih" placeholder="Detay Belirtiniz" name="teslim_tarih">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <label class="" for="adet">Detay:</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="talep_detay" placeholder="Detay Belirtiniz" name="talep_detay">
                            </div>
                        </div>
                        <div class="form-group form-group-lg">
                            <div class="col-sm-offset-0 col-sm-12">
                                <input class="btn btn-success btn-block" type="submit" value="Ekle">
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