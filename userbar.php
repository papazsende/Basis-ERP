<?php

global $kullaniciyetkisi;
global $imagepath;


$imagepath = "img/avatar.png";


$ad_soyad = $_SESSION["ad_soyad"];

echo "<div class='userbar'>
        <div class='maintitle blue' style='text-align: left'>DASHBOARD <span class='sagayasla glyphicon glyphicon-edit sagayasla '  style='margin-right: 20px;line-height: 40px;font-size: 24px'></span></div>
        <div class='kunye'>
        <div class='kunyein'>
                <div class='picture'>
                    <span class='ortala style='width: 50px'><img src='$imagepath' class='img img-circle ortala' width='100%'> </span>
                </div>
                <div class='kunyetext'>
                    $ad_soyad <br>
                    <strong>$kullaniciyetkisi<br>
                    $yetki
                
                </div>
            </div>
        </div>

        <div class='menu'>
            <a href='#' target='_blank'> <li><span class='glyphicon glyphicon-dashboard' >  </span> &nbsp;  Dashboard</li></a>
            <a href='#' target='_blank'> <li><span class='glyphicon glyphicon-user' >  </span> &nbsp;   Profilim</li></a>
            <a href='#' target='_blank'> <li><span class='glyphicon glyphicon-cog' >  </span> &nbsp;   Ayarlar</li></a>
            <a href='#' target='_blank'><li><span class='glyphicon glyphicon-globe' >  </span> &nbsp; İstek Haber</li></a>
            <a href='#' target='_blank'><li><span class='glyphicon glyphicon-headphones' >  </span> &nbsp;  Google Drive</li></a>
            <a href='#' target='_blank'><li><span class='glyphicon glyphicon-fire' >  </span> &nbsp;  K12 Giriş</li></a>
           
        </div>
        <div class='bottombuttonsmain'>
             <a href='#' ><div class='bottombutton'><span class='glyphicon-envelope'></span> </div></a>
             <a href='#' ><div class='bottombutton'><span class='glyphicon-inbox'></span> </div></a>

        </div>
     </div> 
    
     
     ";
unset ($kullaniciyetkisi);
