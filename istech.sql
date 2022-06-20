-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Eki 2018, 15:33:51
-- Sunucu sürümü: 10.1.35-MariaDB
-- PHP Sürümü: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `istech`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmet_tbl`
--

CREATE TABLE `hizmet_tbl` (
  `hizmet_id` int(11) NOT NULL,
  `talep_eden` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `talep_edilen_is` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `talep_edilen` varchar(200) CHARACTER SET utf8 NOT NULL,
  `talep_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teslim_tarih` varchar(100) COLLATE utf8_turkish_ci DEFAULT '0000-00-00',
  `talep_detay` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `teslim_detay` varchar(300) COLLATE utf8_turkish_ci NOT NULL,
  `talep_durum` varchar(30) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'beklemede'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hizmet_tbl`
--

INSERT INTO `hizmet_tbl` (`hizmet_id`, `talep_eden`, `talep_edilen_is`, `talep_edilen`, `talep_tarih`, `teslim_tarih`, `talep_detay`, `teslim_detay`, `talep_durum`) VALUES
(1, 'Barış Çetin', 'FLL iş dağılımı', 'Enes Çetintaş', '2018-10-24 08:30:24', '2018-11-01', 'FLL iş bölümünün gerçekleştirilmesi', '', 'beklemede');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ihtiyac_talep`
--

CREATE TABLE `ihtiyac_talep` (
  `talep_id` int(11) NOT NULL,
  `talep_eden` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `urun` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `adet` int(10) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `detay` varchar(500) CHARACTER SET utf8 NOT NULL,
  `onay` varchar(20) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'beklemede',
  `ihtiyac_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` varchar(550) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `user_pwd` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `user_ns` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_auth` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `user_pwd`, `user_ns`, `user_auth`) VALUES
(1, '41164121910', '41164121910', 'Barış Çetin', 'admin'),
(4, 'enescetintas', 'enes.cetintas', 'Enes Çetintaş', 'user'),
(5, 'sedaonder', 'seda.onder', 'Seda Önder ', 'user'),
(6, 'serkanaydin', 'serkan.aydin.45', 'Serkan Aydın', 'admin'),
(7, 'emrebodur', 'emre.bodur', 'Emre.Bodur', 'user'),
(8, 'soykandurdagi', 'soykan.durdagi', 'Soykan Durdağı', 'user'),
(9, 'selincete', 'selin.cete', 'Selin Çete', 'user'),
(10, 'guldur', 'gul.dur', 'Gül Dur', 'user'),
(11, 'ahmetcetin', 'ahmet.cetin', 'Ahmet Çetin', 'user'),
(12, 'mirayaker', 'miray.aker', 'Miray Aker', 'user'),
(13, 'omerserkan', 'omer.serkan', 'Ömer Serkan Demiralay', 'user'),
(14, 'fatihtorun', 'fatih.torun', 'Fatih Torun', 'user'),
(15, 'gamzedemirbas', 'gamze.demirbas', 'Gamze Demirbaş', 'user'),
(16, 'mervearaci', 'merve.araci', 'Merve Aracı', 'user'),
(17, 'ebrukurtoglu', 'ebru.kurtoglu', 'Ebru Kurtoğlu', 'user'),
(18, 'selmakalaycioglu', 'selma.kalaycioglu', 'Selma Kalaycıoğlu', 'user'),
(19, 'muratsari', 'murat.sari', 'Murat Sarı', 'user'),
(20, 'aylindizman', 'aylin.dizman', 'Aylin Dizman', 'user');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `hizmet_tbl`
--
ALTER TABLE `hizmet_tbl`
  ADD PRIMARY KEY (`hizmet_id`);

--
-- Tablo için indeksler `ihtiyac_talep`
--
ALTER TABLE `ihtiyac_talep`
  ADD PRIMARY KEY (`talep_id`);

--
-- Tablo için indeksler `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `hizmet_tbl`
--
ALTER TABLE `hizmet_tbl`
  MODIFY `hizmet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `ihtiyac_talep`
--
ALTER TABLE `ihtiyac_talep`
  MODIFY `talep_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
