<?php
?>
<script src="js/default.js"></script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- REHBERLIK SERVISI UPDATE FORM -->
<div id="overlay" class="pasive">
    <div id="kayitmodal" class="pasive">
        <span class="silbuton" onclick='popupkapat("kayitmodal")'></span>

        <div class="formcontainer">
            <h2>BASIS KAYIT PORTAL</h2>
            <a href="kayit_module.php?rel=Yeni">
                <div id="modulemain">
                    <div class="moduletitle">Yeni Kayitlar</div>
                    <img class="image" src="images/kayit.png" height="100px"/>

                </div>
            </a>
            <a href="onkayit.php">
                <div id="modulemain">
                    <div class="moduletitle">Yeni Kayıt Oluştur</div>
                    <img class="image" src="images/yenikayit.png" height="100px" />
                </div>
            </a>
            <a href="ogrenci_list.php">
                <div id="modulemain">
                    <div class="moduletitle">Kayıt Yenileme</div>
                    <img class="image" src="images/ogrenci_listesi.png" height="100px" />
                </div>
            </a>
            <a href="kayit_module.php?rel=Ana">
                <div id="modulemain">
                    <div class="moduletitle">Ana Kayit Modulu</div>
                    <img class="image" src="images/icons_orange/kayit.png" height="100px"/>

                </div>
            </a>


        </div>
    </div>
    <div id="ihtiyacnot" class="pasive">
        <span class="silbuton" onclick='popupkapat("ihtiyacnot")'></span>

        <div class="formcontainer">
            <h2>Onay / Red Detay:</h2>
            <form method="post" action="ihtiyac_takip.php">
                <input type="hidden" id="detayid" name="detayid">
                <textarea class="textarea" name="not" rows="4" placeholder="Detay belirtiniz"></textarea>
                <select id="durum" name="durum">Onay Durumu
                    <option value="Onaylandi">Onaylandi</option>
                    <option value="Red">Reddedildi</option>
                    <option value="Beklemede">Beklemede</option>
                </select>
                <button name="ihtiyacnot" class="btn btn-success btn-block">Devam</button>

            </form>

        </div>
    </div>
    <div id="kayitislem" class="pasive">
        <div class="formcontainer">
            <h2>Kayit Onay / Red :</h2>
            <form method="post" action="ihtiyac_takip.php">
                <input type="hidden" id="detayid" name="detayid">
                <textarea class="textarea" name="not" rows="4" placeholder="Detay belirtiniz"></textarea>
                <select id="durum" name="durum">Onay Durumu
                    <option value="Onaylandi">Onaylandi</option>
                    <option value="Red">Reddedildi</option>
                    <option value="Beklemede">Beklemede</option>
                </select>
                <button name="ihtiyacnot" class="btn btn-success btn-block">Devam</button>

            </form>

        </div>

    </div>
</div>