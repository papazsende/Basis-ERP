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
    <div id="rhb_frm" class="pasive">
        <span class="silbuton" onclick='popupkapat("rhb_frm")'></span>

        <div class="formcontainer">
            <h2>Rehberlik Servisi Kayit Islemleri Formu</h2>
            <form class="form-horizontal" method="get" action="controller/kayit_update.php">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Mülakat / Görüşme Sonucu:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="rehberlik_mulakat" name="rehberlik_mulakat">
                            <option value="Olumlu">Olumlu</option>
                            <option value="Olumsuz">Olumsuz</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Uygulanan Test Sonucu:</label>
                    <div class="col-sm-12">
                            <input type="text" class="form-control" style="height: 70px" id="rehberlik_test" placeholder="Rehberlik Test Sonucu" name="rehberlik_test" value="<?php echo $rehberlik_test?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input name="rehberlik" type="submit" class="btn btn-block btn-success btn-lg" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="taksit_frm" class="pasive">
        <span class="silbuton" onclick='popupkapat("taksit_frm")'></span>

        <div class="formcontainer">
            <h2>Taksit Bilgileri Formu</h2>
            <form class="form-horizontal col-xs-12" method="GET" action="controller/kayit_update.php">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">
                <?php taksitsor($ogrenci_tc); ?>

                <div class="form-group">
                    <div class="col-sm-12">
                        <input name="taksitekle" type="submit" class="btn btn-block btn-success btn-lg" value="Guncelle">
                    </div>
                </div>
            </form>
            <form action="taksitevrak.php" class="form-horizontal col-xs-12" method="post">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">
                <input name="evrakyazdir" type="submit" class="btn btn-block btn-primary btn-lg" value="Evrak Yazdir">
                <br>

            </form>
        </div>
    </div>
    <div id="popupolcme" class="pasive">
        <span class="silbuton" onclick='popupkapat("popupolcme")'></span>

        <div class="formcontainer">
            <h2>Ölçme Değerlendirme Kayıt İşlemleri Formu</h2>
            <form class="form-horizontal" method="get" action="controller/kayit_update.php">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Türkçe OKS Sonucu:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="turkce_test" placeholder="Türkçe Test Sonucu" name="turkce_test" value="<?php echo $olcme_turkcesinav;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">İngilizce STS Sonucu:</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" style="height: 70px" id="rehberlik_test" placeholder="İngilizce Test Sonucu" name="ingilizce_test" value="<?php echo $olcme_ingilizcesinav;?>">
                    </div>
                </div>

                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="olcmeupdate" type="submit" class="btn btn-block btn-lg btn-success" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="popupdurum" class="pasive">
        <span class="silbuton" onclick='popupkapat("popupdurum")'></span>

        <div class="formcontainer">
            <h2>Kayıt Durumu</h2>
            <form class="form-horizontal" method="get" action="controller/kayit_update.php">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">

                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Kayıt durumu</label>
                    <div class="col-sm-12">
                        <select name="durum" class="form-control-lg">
                            <option value="Beklemede">Beklemede</option>
                            <option value="Görüşmede">Görüşmede</option>
                            <option value="Tamamlandı">Tamamlandı</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="durumupdate" type="submit" class="btn btn-block btn-lg btn-success" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="popuppr" class="pasive">
        <span class="silbuton" onclick='popupkapat("popuppr")'></span>

        <div class="formcontainer">
            <h2>Halkla ilişkiler Kayıt İşlemleri Formu</h2>
            <form class="form-horizontal" method="get" action="controller/kayit_update.php">
                <input type="text" style="display: none" class="form-control" id="guncelid" placeholder="<?php echo $ogrenci_tc;?>" name="detayid" value="<?php echo $detayid;?>">
                <div class="form-group">
                    <label class="control-label" for="okul_tanitimi">Kayıt olacağı okul:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="kayitokul" name="kayitokul">
                            <option value="<?php echo $kayitokul ?>"><?php echo $kayitokul ?></option>
                            <option value="Özel Beylikdüzü Ak Ortaokulu">Özel Beylikdüzü Ak Ortaokulu</option>
                            <option value="Özel Beylikdüzü Ak İlkokulu">Özel Beylikdüzü Ak İlkokulu</option>
                            <option value="Özel Beylikdüzü Ak Anadolu Lisesi">Özel Beylikdüzü Ak Anadolu Lisesi</option>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="okul_tanitimi">Okul Tanıtımı:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="okul_tanitimi" name="okul_tanitimi">
                            <option value="<?php echo $okultanitim ?>"><?php echo $okultanitim ?></option>

                            <option value="Gerçekleştirildi">Gerçekleştirildi</option>
                            <option value="Gerçekleştirilmedi">Gerçekleştirilmedi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Eğitim Ücretleri Bilgilendirmesi:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="egitim_ucretleri" name="egitim_ucretleri">
                            <option value="<?php echo $ucret ?>"><?php echo $ucret ?></option>
                            <option value="Gerçekleştirildi">Gerçekleştirildi</option>
                            <option value="Gerçekleştirilmedi">Gerçekleştirilmedi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Kayıt Basamakları Bilgilendirmesi:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="kayit_basamaklari" name="kayit_basamaklari">
                            <option value="<?php echo $kayitbasamak ?>"><?php echo $kayitbasamak ?></option>
                            <option value="Gerçekleştirildi">Gerçekleştirildi</option>
                            <option value="Gerçekleştirilmedi">Gerçekleştirilmedi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="rehberlik_test">Öğrenci Tanıma Formları:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="ontanima_formlari" name="ontanima_formlari">
                            <option value="<?php echo $ogrencitanima ?>"><?php echo $ogrencitanima ?></option>
                            <option value="Tamamlandı">Tamamlandı</option>
                            <option value="Tamamlanmadı">Tamamlanmadı</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rehberlik_test">Sözleşme Bilgilendirmesi:</label>
                    <div class="col-sm-12">
                        <select class="form-froup" id="sozlesme_bilgilendirme" name="sozlesme_bilgilendirme">
                            <option value="<?php echo $sozlesme ?>"><?php echo $sozlesme ?></option>
                            <option value="Gerçekleştirildi">Gerçekleştirildi</option>
                            <option value="Gerçekleştirilmedi">Gerçekleştirilmedi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Kurumun İlan Ettiği Yıllık Eğitim ve Öğretim Ücreti</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="i_fiyat" value="<?php echo $i_fiyat; ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Öğrencinin Kayıt Edildiği Eğitim ve Öğretim Ücreti</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="egt_ucr" value="<?php echo $egt_ucr ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Yemek Ücreti</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="ymk_ucr" value="<?php echo $ymk_ucr ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Kahvaltı Ücreti</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="khv_ucr" value="Dahil" readonly>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Ödeme Şekli</label>
                    <div class="col-sm-12">
                      <select name="odemesekli">
                          <option value="<?php echo $odemesekli; ?>"><?php echo $odemesekli; ?></option>
                          <option value="Peşin">Peşin</option>
                          <option value="Taksit">Taksit</option>
                      </select>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Taksit Başlangıç Tarihi</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" name="taksit_btar" value="Dahil">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Peşinat</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="pesinat" value="<?php echo $pesinat;?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Taksit Sayısı ve Tutarı</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="taksit_sayi" value="<?php echo $taksit_sayi ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Eğitim Bursu Alıyor mu?</label>
                    <div class="col-sm-12">
                        <select name="ogr_burs">
                            <option value="<?php echo $ogr_burs ?>"><?php echo $ogr_burs ?></option>
                            <option value="Hayır">Hayır</option>
                            <option value="Evet">Evet</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">Eğitim Bursu Alıyorsa Yüzdesi</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="burs_yuzde" value="<?php echo $burs_yuzde; ?>">
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">İndirim Alıyor mu?</label>
                    <div class="col-sm-12">
                        <select name="ogr_indirim">
                            <option value="<?php echo $ogr_indirim ?>"><?php echo $ogr_indirim ?></option>
                            <option value="Hayır">Hayır</option>
                            <option value="Evet">Evet</option>
                        </select>
                    </div>
                </div>
                <div class="form-group form-group-lg">
                    <label for="rehberlik_test">İndrim Kalemi</label>
                    <div class="col-sm-12">
                        <select name="indirim_klm">
                            <option value="<?php echo $indirim_klm ?>"><?php echo $indirim_klm ?></option>
                            <option value="YOK">YOK</option>
                            <option value="Kardeş İndirimi">Kardeş İndirimi</option>
                            <option value="Personel Çocuğu İndirimi">Personel Çocuğu İndirimi</option>
                            <option value="Kurumsal İndirim">Kurumsal İndirim</option>
                            <option value="Şehit / Gazi Çöcuğu İndirimi">Şehit / Gazi Çocuğu İndirimi</option>
                            <option value="Öğretmen Çocuğu İndirimi">Öğretmen Çocuğu İndirimi</option>
                            <option value="Başarı İndirimi">Başarı İndirimi</option>
                            <option value="Kurucu Çocuğu İndirimi">Kurucu Çocuğu İndirimi</option>
                            <option value="Kayıtlı Öğrenci İndirimi">Kayıtlı Öğrenci İndirimi</option>



                        </select>
                    </div>
                </div>

                <div class="form-group form-group-lg">
                    <label class="control-label" for="rehberlik_test">Not</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" name="halklailiskiler_not" value="<?php echo $not ?>"><?php echo $not ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="btn btn-success btn btn-block" name="prupdate" type="submit" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="kdveli_anne" class="pasive">
        <span class="silbuton" onclick='popupkapat("kdveli_anne")'></span>

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
                        <input name="kdveli_anne" type="submit" class="btn btn-success btn-block" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="kdveli_baba" class="pasive">
        <span class="silbuton" onclick='popupkapat("kdveli_baba")'></span>

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
                        <textarea class="textarea" name="b_adres" rows="4" placeholder="Baba Adres"><?php echo $b_adres; ?></textarea>

                    </div>
                </div>
                <div class="form-group">
                    <div class=" col-sm-12">
                        <input name="kdveli_baba" type="submit" class="btn btn-success btn-block" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="kayit_dty" class="pasive">
        <span class="silbuton" onclick='popupkapat("kayit_dty")'></span>

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
                        <input name="kayit_edit" type="submit" class="btn btn-success btn-block" value="Guncelle">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="iptalfrm" class="pasive">
        <span class="silbuton" onclick='popupkapat("iptalfrm")'></span>

        <div class="formcontainer">
            <h2>Kayit Iptali</h2>
            <form method="post" action="#">
                <input type="hidden" value="<?php echo $detayid; ?>" name="detayid" id="detayid">
                <textarea class="textarea" name="iptalnot" rows="4" placeholder="Detay belirtiniz"></textarea>
                <select id="iptalsebep" name="iptalsebep">Onay Durumu
                    <option value="Sebep 1">Sebep 1</option>
                    <option value="Sebep 2">Sebep 2</option>
                    <option value="Sebep 3">Sebep 3</option>
                </select>
                <button name="kayitiptal" class="btn btn-danger btn-block">Devam</button>

            </form>

        </div>
    </div>
</div>