-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Eki 2021, 17:50:54
-- Sunucu sürümü: 8.0.18
-- PHP Sürümü: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ekch`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `devices`
--

CREATE TABLE `devices` (
  `device_id` int(11) NOT NULL,
  `device_uid` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_appid` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_lang` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_os` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_regdate` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_ctoken` varchar(255) COLLATE utf8_bin NOT NULL,
  `device_substatus` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `devices`
--

INSERT INTO `devices` (`device_id`, `device_uid`, `device_appid`, `device_lang`, `device_os`, `device_regdate`, `device_ctoken`, `device_substatus`) VALUES
(5, 'ek8829172638493', '1872638', 'tr', 'ios', '2021-10-04 14:27:16', 'IL67fOBgDwnEV3dq', '7days'),
(6, 'ek8829172638493', '1872638', 'tr', 'ios', '2021-10-04 14:27:16', 'IL67fOBgDwnEV3dq', '7days'),
(7, 'ek8829172638493', '1872638', 'tr', 'android', '2021-10-04 14:27:16', 'IL67fOBgDwnEV3dq', '7days');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `log_os` varchar(255) COLLATE utf8_bin NOT NULL,
  `log_appid` varchar(255) COLLATE utf8_bin NOT NULL,
  `log_tokenid` varchar(255) COLLATE utf8_bin NOT NULL,
  `log_status` varchar(255) COLLATE utf8_bin NOT NULL,
  `log_callback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `log`
--

INSERT INTO `log` (`log_id`, `log_date`, `log_os`, `log_appid`, `log_tokenid`, `log_status`, `log_callback`) VALUES
(1, '2021-10-04 20:08:48', 'ios', '1872638', 'IL67fOBgD22EV3dq', 'continues', 0),
(2, '2021-10-04 20:08:52', 'ios', '1872638', 'IL67fOBgD22EV3dq', 'expired', 0),
(3, '2021-10-04 20:10:34', 'ios', '1872638', 'IL67fOBgD22EV3dq', 'continues', 1),
(4, '2021-10-04 20:10:36', 'android', '1872638', 'IL67fOBgD22EV3dq', 'continues', 0),
(5, '2021-10-04 20:11:38', 'android', '1872638', 'IL67fOBgD22EV3dq', 'expired', 1),
(6, '2021-10-04 20:14:35', 'ios', '1872638', 'IL67fOBgD22EV3dq', 'continues', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` int(11) NOT NULL,
  `subscription_buydate` varchar(255) COLLATE utf8_bin NOT NULL,
  `subscription_device_token` varchar(255) COLLATE utf8_bin NOT NULL,
  `subscription_appid` varchar(255) COLLATE utf8_bin NOT NULL,
  `subscription_expire_date` varchar(255) COLLATE utf8_bin NOT NULL,
  `subscription_status` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Tablo döküm verisi `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `subscription_buydate`, `subscription_device_token`, `subscription_appid`, `subscription_expire_date`, `subscription_status`) VALUES
(10, '2021-10-04 18:14:35', 'IL67fOBgDwnEV3dq', '1872638', '2021-10-11 16:27:12', 'continues'),
(24, '2021-10-04 18:14:35', 'IL67fOBgD22EV3dq2', '18726383', '2021-10-04 20:11:38', 'expired'),
(25, '2021-10-04 18:14:35', 'IL67fOBgD22EV3dq', '1872638', '2021-10-11 20:14:35', 'continues');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Tablo için indeksler `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Tablo için indeksler `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `subscription`
--
ALTER TABLE `subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
