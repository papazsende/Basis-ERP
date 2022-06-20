<?php
ob_start();
session_start();
include("ayar.php");
 ?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <meta name="viewport" content="width=650px, initial-scale=0.6, user-scalable=no">
</head>
<body onLoad="myFunction()">
<div id="loader" class="animate-bottom"></div>

<?php

include_once 'ayar.php';

global $username;
$username = $_SESSION["ad_soyad"];
$yetki = $_SESSION["yetki"];



include "navbar_module.php";

include "forms/modals.php";

?>



    <div class="left">
        <?php
        include("userbar.php");
        ?>

    </div>
    <div id="indexcontainer" class="animate-bottom" style="display: none;margin-top: 30px">

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

            <a href="ihtiyac_takip.php"> <div id="modulemain">
                <div class="moduletitle">Ihtiyac Takip</div>
                <img class="image" src="img/ihtiyac_takip.png" height="140px" />

            </div></a>
            <a href="ihtiyac_talep.php"><div id="modulemain">
                <div class="moduletitle">Ihtiyac Talep</div>
                <img class="image" src="img/ihtiyac_talep.png" height="140px" />

                </div></a>
            <a href="hizmet_talep.php">  <div id="modulemain">
                <div class="moduletitle">Hizmet Talep</div>
                <img class="image" src="img/is_takip.png" height="140px" />

                </div></a>
            <a href="is_takip.php"> <div id="modulemain">
                <div class="moduletitle">Is Takip</div>
                <img class="image" src="img/is_talep.png" height="140px" />

                </div></a>
           


        </div>

    </div>
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 0);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("indexcontainer").style.display = "block";

    }
</script>

</body>

</html>
