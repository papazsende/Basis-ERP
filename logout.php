<?php
session_start();
ob_start();
session_destroy();
echo "<center>Cikis Yaptiniz. Ana Sayfaya Yonlendiriliyorsunuz.</center>";
header("Refresh: 2; url=index.php");
ob_end_flush();
?>

<head>
    <link rel="stylesheet" type="text/css" href="css/logout.css">


</head>
