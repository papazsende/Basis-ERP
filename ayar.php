
<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=istech','root','');

}catch(Exception $e){

    echo "hata";
}
// Check connection
$db->query("SET NAMES 'utf8'");

?>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <META http-equiv=content-type content=text/html;charset=iso-8859-9>
    <META http-equiv=content-type content=text/html;charset=windows-1254>
    <META http-equiv=content-type content=text/html;charset=x-mac-turkish>

</head>

