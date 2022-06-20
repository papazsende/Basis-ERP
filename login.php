<?php

ob_start();
session_start();
include("ayar.php");
if (isset($_POST["kadi"]) && !empty($_POST["kadi"]) ) {
    $kadi = $_POST['kadi'];
}else{
    echo "<center>Lutfen Kullanici Adini Bos Birakmayiniz! <a href='index.php'>Geri Don</a></center>";
}

if (isset($_POST["sifre"]) && !empty($_POST["sifre"]) ) {
    $sifre = $_POST['sifre'];
}else{
    echo "<center>Lutfen Sifreyi Bos Birakmayiniz! <a href='index.php'>Geri Don</a></center>";
}


    $stmt = $db->prepare("SELECT * FROM user_tbl where username= :username and user_pwd = :password");
    $stmt->bindParam(':username',$kadi);
    $stmt->bindParam(':password',$sifre);

    $stmt->execute();
    if($stmt->rowCount() > 0){
        echo "success";
        while($row = $stmt->fetch()){
            $username = $row['username'];
            $password = $row['user_pwd'];
            $_SESSION['ad_soyad']= $row['user_ns'];
            $_SESSION['yetki']= $row['user_auth'];
            $_SESSION['login'] = $row['user_id'];
            $yetki = $row['user_auth'];
            $id = $row['user_id'];

            if($yetki == 'admin'){

                header('Location: admin.php');

            }
            if($yetki == 'user'){
                header('Location: user.php');

            }



        }
    }else{
        echo "<center>Kullanici Adi veya Sifrenizi Hatali Girdiniz! <a href='index.php'>Geri Don</a></center>";
    }


ob_end_flush();
?>