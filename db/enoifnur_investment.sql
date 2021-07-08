-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2021 at 06:32 AM
-- Server version: 10.3.27-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enoifnur_investment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `ewallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bwallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pm` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ewallet`, `bwallet`, `pm`, `email`, `password`) VALUES
(1, '', '3Hd5cUeuUCqsixvUxetWUEvwd72eqrbkhg', '', 'admin@enoinvest.cash', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessage`
--

CREATE TABLE `adminmessage` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adminmessage`
--

INSERT INTO `adminmessage` (`id`, `email`, `message`, `title`, `image`, `status`, `msgid`, `date`) VALUES
(21, 'ayoungchief@gmail.com', 'Your Account is Dormant', 'Your Account', '', 0, 'Ce26uAB1d5', '2021-03-06 09:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `btc` double NOT NULL,
  `eth` double NOT NULL,
  `pm` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `usd` double NOT NULL,
  `image` tinyblob NOT NULL,
  `btctnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tnxid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `referred` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `btc`
--

INSERT INTO `btc` (`id`, `btc`, `eth`, `pm`, `usd`, `image`, `btctnx`, `email`, `status`, `tnxid`, `refcode`, `referred`, `date`) VALUES
(42, 0.06401126598281298, 0, '', 2000, '', '78dhfgssks', 'ayoungchief@gmail.com', 'approved', 'tnx601240db1544d', 'r1DsABg27Q', '', '2021-01-28 04:43:07'),
(43, 0.10487604385748352, 0, '', 5000, '', 'yuuvfgfjhkijo', 'prestigeguv10@gmail.com', 'pending', 'tnx6042585956a6d', '43CCghB2dl', '', '2021-03-05 16:12:09'),
(44, 0.10487604385748352, 0, '', 5000, '', 'yuuvfgfjhkijo', 'prestigeguv10@gmail.com', 'approved', 'tnx604258fdddc98', '43CCghB2dl', '', '2021-03-05 16:14:53'),
(45, 0.020697030452161817, 0, '', 1000, '', '1GUgxMaDgZ3', 'carogold4life@gmail.com', 'approved', 'tnx6043591fd7951', 'hSS0XQ8eB6', '', '2021-03-06 10:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `messageadmin`
--

CREATE TABLE `messageadmin` (
  `id` int(6) NOT NULL,
  `email` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` blob NOT NULL,
  `status` tinyint(4) NOT NULL,
  `msgid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package1`
--

CREATE TABLE `package1` (
  `id` int(6) NOT NULL,
  `email` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `pname` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(11) NOT NULL,
  `froms` double NOT NULL,
  `tos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `package1`
--

INSERT INTO `package1` (`id`, `email`, `pname`, `increase`, `bonus`, `duration`, `froms`, `tos`) VALUES
(5, 'admin@webbiitmedia.com', 'Mini Plan', 1, 5, 10, 100, 999),
(6, 'prestigeguy10@gmail.com', 'Maximum', 2, 40, 20, 200, 1000),
(8, 'admin@enoinvest.cash', 'Mega', 20, 20, 1, 5000, 10000),
(9, 'admin@enoinvest.cash', 'Gold Package', 50, 20, 1, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `wl` int(200) NOT NULL,
  `rb` int(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `cy` varchar(200) NOT NULL,
  `hea` varchar(200) NOT NULL,
  `act` varchar(200) NOT NULL,
  `inert` varchar(200) NOT NULL,
  `jso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sname`, `wl`, `rb`, `currency`, `branch`, `bname`, `baddress`, `email`, `phone`, `title`, `logo`, `cy`, `hea`, `act`, `inert`, `jso`) VALUES
(2, 'enoinvest.cash', 200, 20, '', '', 'Enoinvest Cash', '', 'admin@enoinvest.cash', '+234 703 683 8739', 'Welcome to Enoinvest Cash', 'logo3.png', '2021', '../../vendor/twilio/sdk/Services/header.php', 'https://scriptsdemo.website/superadmin/btc_activation.php', '../../vendor/twilio/sdk/Services/initializer.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `tfa`
--

CREATE TABLE `tfa` (
  `id` int(6) NOT NULL,
  `email` varchar(100) NOT NULL,
  `secret` varchar(100) NOT NULL,
  `qrcode` blob NOT NULL,
  `result` int(12) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tfa`
--

INSERT INTO `tfa` (`id`, `email`, `secret`, `qrcode`, `result`, `date`) VALUES
(4, 'carogold4life@gmail.com', '2QJDNVYWYGCMLLWM', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246456e6f696e766573742b4361736825334673656372657425334432514a444e5659575947434d4c4c574d2673697a653d32303078323030266563633d4d, 1, '2021-03-06 10:37:18'),
(5, 'carogold4life@gmail.com', '2QJDNVYWYGCMLLWM', 0x68747470733a2f2f6170692e71727365727665722e636f6d2f76312f6372656174652d71722d636f64652f3f646174613d6f747061757468253341253246253246746f7470253246456e6f696e766573742b4361736825334673656372657425334432514a444e5659575947434d4c4c574d2673697a653d32303078323030266563633d4d, 1, '2021-03-06 10:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `refcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `package` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `verify` tinyint(4) NOT NULL,
  `session` tinyint(4) NOT NULL,
  `activate` tinyint(4) NOT NULL,
  `referred` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profit` double NOT NULL,
  `refbonus` double NOT NULL,
  `walletbalance` double NOT NULL,
  `pm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eth` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `btc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `2fa` tinyint(4) NOT NULL,
  `pname` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `increase` double NOT NULL,
  `bonus` double NOT NULL,
  `duration` int(111) NOT NULL,
  `pdate` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `froms` double NOT NULL,
  `usd` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `refcode`, `package`, `image`, `verify`, `session`, `activate`, `referred`, `profit`, `refbonus`, `walletbalance`, `pm`, `eth`, `btc`, `2fa`, `pname`, `increase`, `bonus`, `duration`, `pdate`, `froms`, `usd`, `date`, `phone`, `address`, `country`) VALUES
(119, 'adislove', 'ayoungchief@gmail.com', 'Tennis@12', 'gJsaeHj)Mh', 'r1DsABg27Q', '', 'DSC_0569-removebg-preview.png', 1, 1, 0, '', 0, 0, 200, '', '', 'jfhfkfhdkdjdhdkdhdhdtdhdkh', 0, ' Maxi Plan', 1.5, 10, 10, '2021-01-27 23:51:24', 1000, 1000, '2021-01-28 04:35:26', '090808776876', 'jkfhfkshshsksttddjkjjgdl', 'Nigeria'),
(120, 'prestigeguy', 'prestigeguy10@gmail.com', 'prestigeguy', 'aSZNWVl(d4', 'uWwUhb91cy', '', '855528536_about_us.jpg,215965171_20160609PHT31661_original.jpg', 1, 1, 0, '', 0, 0, 182115, '', '', '', 0, ' Maximum', 2, 40, 20, '0', 200, 5000, '2021-03-04 12:03:53', '09033834777', 'M8 ogo oluwa', 'Nigeria'),
(122, 'admin', 'prestigeguy@gmail.com', 'prestige', 'MP8scSNw82', 'D5HuldJS7N', '', '', 0, 0, 0, '', 0, 0, 20, '', '', '', 0, '', 0, 0, 0, '', 0, 0, '2021-03-04 12:24:38', '09033834777', 'M8 ogo oluwa', 'Nigeria'),
(124, 'caroline', 'carogold4life@gmail.com', '11111111', 'B4MAVCtu]C', 'hSS0XQ8eB6', '', '268289962_WhatsApp_Image_2021-02-16_at_11.49.51-removebg-preview.png,119984779_fff-removebg-preview.png', 1, 1, 1, '', 0, 0, 1106, '', '', '1GUgxMaDgZ3HumCp32LfBdrHcxR7e2wrcj', 0, ' Gold Package', 50, 20, 1, '2021-03-06 05:41:57', 500, 1000, '2021-03-06 10:16:25', '08095644677', '24 Oslo Avenue', 'United States'),
(125, 'Vizzini22', 'valentineusiomoifo@gmail.com', '123456', '}eZhh52cSs', 'uRdSXs3AlN', '', '', 0, 0, 0, '', 0, 0, 20, '', '', '', 0, '', 0, 0, 0, '0', 0, 0, '2021-03-07 05:24:52', '', '', 'Ã…land Islands');

-- --------------------------------------------------------

--
-- Table structure for table `wbtc`
--

CREATE TABLE `wbtc` (
  `id` int(11) NOT NULL,
  `moni` double NOT NULL,
  `mode` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `wal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wbtc`
--

INSERT INTO `wbtc` (`id`, `moni`, `mode`, `email`, `status`, `tnx`, `wal`, `date`) VALUES
(20, 500, 'btc', 'ayoungchief@gmail.com', 'completed', 'tnx60124155caea1', 'jfhfkfhdkdjdhdkdhdhdtdhdkh', '2021-01-28 04:45:09'),
(21, 200, 'btc', 'ayoungchief@gmail.com', 'completed', 'tnx6040c97ccfd62', 'jfhfkfhdkdjdhdkdhdhdtdhdkh', '2021-03-04 11:50:20'),
(22, 200, 'btc', 'prestigeguy10@gmail.com', 'pending', 'tnx6041c758dd2da', '', '2021-03-05 05:53:28'),
(23, 2000, 'btc', 'prestigeguy10@gmail.com', 'pending', 'tnx6041c76e9ecf4', '', '2021-03-05 05:53:50'),
(24, 200, 'btc', 'prestigeguy10@gmail.com', 'pending', 'tnx6041c7c217a23', '', '2021-03-05 05:55:14'),
(25, 200, 'btc', 'prestigeguv10@gmail.com', 'pending', 'tnx60425a5699d2a', '', '2021-03-05 16:20:38'),
(26, 200, 'btc', 'prestigeguv10@gmail.com', 'pending', 'tnx60425ae6987a4', '', '2021-03-05 16:23:02'),
(27, 200, 'btc', 'prestigeguv10@gmail.com', 'pending', 'tnx60426ea116f16', '', '2021-03-05 17:47:13'),
(28, 200, 'btc', 'ayoungchief@gmail.com', 'completed', 'tnx604354bd06c10', 'jfhfkfhdkdjdhdkdhdhdtdhdkh', '2021-03-06 10:09:01'),
(29, 200, 'btc', 'prestigeguy10@gmail.com', 'pending', 'tnx6043b3358994c', '', '2021-03-06 16:52:05'),
(30, 8000, 'eth', 'prestigeguy10@gmail.com', 'pending', 'tnx604419a583f9c', '', '2021-03-07 00:09:09'),
(31, 8000, 'btc', 'prestigeguy10@gmail.com', 'pending', 'tnx604419f226c36', '', '2021-03-07 00:10:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessage`
--
ALTER TABLE `adminmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageadmin`
--
ALTER TABLE `messageadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package1`
--
ALTER TABLE `package1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tfa`
--
ALTER TABLE `tfa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wbtc`
--
ALTER TABLE `wbtc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminmessage`
--
ALTER TABLE `adminmessage`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `messageadmin`
--
ALTER TABLE `messageadmin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `package1`
--
ALTER TABLE `package1`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tfa`
--
ALTER TABLE `tfa`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `wbtc`
--
ALTER TABLE `wbtc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
