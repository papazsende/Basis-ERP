<?php
/**
 * Created by PhpStorm.
 * User: baris
 * Date: 13.12.2017
 * Time: 20:45
 */
?>
<script src="js/default.js"></script>
<link rel="stylesheet" href="css/style.css">
<!-- REHBERLIK SERVISI UPDATE FORM -->
<div id="overlay" class="pasive">
    <div id="odveli_anne" class="pasive">
        <span class="silbuton" onclick='popupkapat("odveli_anne")'></span>

        <div class="formcontainer">
            <h2>Anne Detay Bilgilerini Duzenle</h2>
            <form class="form-horizontal" method="POST" action="#">
                <input type="text" style="display: none" class="form-control" id="detayid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_a" placeholder="Anne Adı" name="a_a" value="<?php echo $a_a?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_sa" placeholder="<?php echo $a_sa; ?>" name="a_sa" value="<?php echo $a_sa;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_tc" placeholder="Anne TC" name="a_tc" value="<?php echo $a_tc;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_gsm" placeholder="Anne GSM" name="a_gsm" value="<?php echo $a_gsm;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_istel" placeholder="Anne İş Telefon" name="a_istel" value="<?php echo $a_istel;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_mail" placeholder="Anne Mail" name="a_mail" value="<?php echo $a_mail;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="a_is" placeholder="İşi Ünvanı" name="a_is" value="<?php echo $a_is;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select id="a_egtm" name="a_egtm">
                            <option value="<?php echo $a_egtm ?>"><?php echo $a_egtm ?></option>
                            <option value="Lise">Lise</option>
                            <option value="Ön Lisans">Ön Lisans</option>
                            <option value="Lisans">Lisans</option>
                            <option value="Yüksek Lisans">Yüksek Lisans</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="textarea" name="a_adres" rows="4" placeholder="Adres Bilgisi"><?php echo $a_adres; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="odveli_anne" type="submit" class="btn btn-success" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- BABA UPDATE FORM  -->
    <div id="odveli_baba" class="pasive">
        <span class="silbuton" onclick='popupkapat("odveli_baba")'></span>

        <div class="formcontainer">
            <h2>Baba Detay Bilgilerini Duzenle</h2>
            <form class="form-horizontal" method="POST" action="#">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_a" placeholder="Baba Adı" name="b_a" value="<?php echo $b_a?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_sa" placeholder="Baba Soyad" name="b_sa" value="<?php echo $b_sa;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_tc" placeholder="Baba TC" name="b_tc" value="<?php echo $b_tc;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_gsm" placeholder="Baba GSM" name="b_gsm" value="<?php echo $b_gsm;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_istel" placeholder="Baba İş telefon" name="b_istel" value="<?php echo $b_istel;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_mail" placeholder="Baba Mail" name="b_mail" value="<?php echo $b_mail;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="b_is" placeholder="İşi Ünvanı" name="b_is" value="<?php echo $b_is;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <select id="b_egtm" name="b_egtm">
                            <option value="<?php echo $b_egtm ?>"><?php echo $b_egtm ?></option>
                            <option value="Lise">Lise</option>
                            <option value="Ön Lisans">Ön Lisans</option>
                            <option value="Lisans">Lisans</option>
                            <option value="Yüksek Lisans">Yüksek Lisans</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <textarea class="textarea" name="b_adres" rows="4" placeholder="Adres Bilgisi"><?php echo $b_adres; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="odveli_baba" type="submit" class="btn btn-success" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- OGR UPDATE FORM  -->
    <div id="ogr_dty" class="pasive">
        <span class="silbuton" onclick='popupkapat("ogr_dty")'></span>

        <div class="formcontainer">
            <h2>Öğrenci Bilgilerini Duzenle</h2>
            <form class="form-horizontal" method="POST" action="#">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_a" placeholder="Öğrenci Adı" name="ogr_a" value="<?php echo $ogr_a?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_sa" placeholder="Öğrenci Soyad" name="ogr_sa" value="<?php echo $ogr_sa;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="date" class="form-control" style="height: 70px" id="ogr_dtar" placeholder="Öğrenci Doğum Tarihi" name="ogr_dtar" value="<?php echo $ogr_dtar;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_okl" placeholder="Öğrenci Okul" name="ogr_okl" value="<?php echo $ogr_okl;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_snfsv" placeholder="Öğrenci Sinif Seviyesi" name="ogr_snfsv" value="<?php echo $ogr_snfsv;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_mail" placeholder="Öğrenci Mail" name="ogr_mail" value="<?php echo $ogr_mail;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_sube" placeholder="Şubesi" name="ogr_sube" value="<?php echo $ogr_sube;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="ogr_kg" placeholder="Kan Grubu" name="ogr_kg" value="<?php echo $ogr_kg;?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="ogr_edit" type="submit" class="btn btn-success btn-block" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
