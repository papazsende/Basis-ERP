
<!DOCTYPE html>
<html>
<head>
<?php
global $yetki;
$yetki = $_SESSION["yetki"];
?>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/default.js"></script>



</head>

<div class='top'>
        <div id='navbar'>
            <a href="<?php echo $yetki; ?>.php">
            <div class='logo' style="margin-top: 10px; margin-bottom: 10px">
                <img width="100px" src='img/istech.png'>
            </div>
            </a>

            <div class="iconmain">
                <div class="icon">
                    <img src='' style="opacity: 0" width="100%">
                </div>
                <a style="text-decoration: none;" href="<?php echo $yetki; ?>.php">
                    <div class="icon">
                        <img src='img/butons/home.png' width="100%">
                    </div>
                </a>
                <a href="#"">
                <div class="icon">
                    <img src='img/butons/help.png' width="100%">
                </div>
                </a>
                <a href="logout.php">
                <div class="icon">
                    <img src='img/butons/close.png' width="100%">
                </div>
                </a>

                <?php
                $ad_soyad = $_SESSION['ad_soyad'];
                if(!isset($_SESSION["login"])){
                    header("Location:index.php");
                }
                else {

                } ?>


            </div>
        </div>
</div>
