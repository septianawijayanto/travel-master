-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2020 at 07:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_registrasi` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `id_registrasi`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Septiana Wijayanto', 'septianawijayanto81@gmail.com', '', NULL, '$2y$10$UwUFO1yION.8WyeLl2pCNebjeMr0XJegqf0bTUbZW.LeIo8P3pDDm', NULL, '2020-07-16 20:32:34', '2020-07-16 20:32:34'),
(2, 'pemesan', 'Ocak', 'rossa@gmail.com', '', NULL, '$2y$10$oJUKyjloobIraR6uhbHf0uzmJAeKC2pQiQfuv09gwP4BjVinR8fJK', NULL, '2020-07-17 01:31:15', '2020-07-17 01:31:15'),
(5, 'pemesan', 'eko', 'eko@gmail.com', '', NULL, '$2y$10$9GeTKuW6lHQ85ZbBQg1Y8udLkvy.mSNYCbViLg1Eec2XsSTRmbMMK', NULL, NULL, NULL),
(6, 'pemesan', 'akoa', 'eko12@gmail.com', 'REG20200717124551', NULL, '$2y$10$6H5l9dXYRsJASUyD.RSM2uZ6nlYKeWL7oVJtpMe3QY9vjpQX69VfK', NULL, NULL, NULL),
(7, 'pemesan', 'agung', 'agung@gmail.com', 'REG20200717194751', NULL, '$2y$10$sqdE/pk4kWceetN2D2EbhOa5HGQxcNv6DIXYq1X/nd7oTuqw3l2xO', NULL, NULL, NULL),
(8, 'pemesan', 'babang', 'babang@gmail.com', 'REG-20200717194851', NULL, '$2y$10$c6y5BCxzmwnhGBrH.lMPpeeMDQdIS42p8NBqvyqSw3ANJ8LoNLcCW', NULL, NULL, NULL),
(9, 'pemesan', 'b', 'b@gmail.com', 'REG-20200718120202', NULL, '$2y$10$OQ/G2oFEreyivdqDN4PF0e6seT5HFo1kdw.qqhXYD7P5fGrHQ3zA2', NULL, NULL, NULL),
(10, 'supir', 'Jarot', 'jarot@gmail.com', NULL, NULL, '$2y$10$xiLhL04oEWSPwjc/F/JPoOiQETJYbw/9i74VKgaoREXelsVQeTm7y', NULL, '2020-07-18 09:27:55', '2020-07-18 09:27:55'),
(20, 'supir', 'tulkijo', 'tulkijo@gmail.com', NULL, NULL, '$2y$10$SZte3dkst/IwmE3hfbtZNeAYhwzyydm1M24S9DYPjbb6FEhERy1cy', NULL, '2020-07-19 05:32:39', '2020-07-19 05:32:39'),
(21, 'supir', 'Paijo', 'paijo@gmail.com', NULL, NULL, '$2y$10$Ng971J0/jhNs1ik1Fh/G3O2LV47SuPNEc7ExPFkK0oJX/AxW123sa', NULL, '2020-07-20 05:10:34', '2020-07-20 05:10:34'),
(22, 'supir', 'paijem', 'paijem@gmail.com', NULL, NULL, '$2y$10$lLx.NYdGIqQX2S4ncZ0p.OLbhVMLaxfutYZy3eYpG2ZauXej9QSQu', NULL, '2020-07-20 05:11:34', '2020-07-20 05:11:34'),
(23, 'pemesan', 'Septiana Wijayanto', 'septi@gmail.com', 'REG-20200720122746', NULL, '$2y$10$DSxwpeTJb9PLZPZ1LwrF9ezKo10DTn66pkYeoxuZ06JXWoDo02KnO', NULL, NULL, NULL),
(24, 'pemesan', 'a@gmail.com', 'a@gmail.com', 'REG-20200720163202', NULL, '$2y$10$VZtYewrF.3yfgrWK/6xKROzl7g46tIGe0KZ9QkGcbrOStqqwGHd9y', NULL, NULL, NULL),
(25, 'pemesan', 'Iin', 'iin@gmail.com', 'REG-20200720170452', NULL, '$2y$10$hMjZaJJ/kFO0n9sg1NLkyOaLpjBgn4/f4riBXwH.q4h.cUJT7Kr5G', NULL, NULL, NULL),
(26, 'supir', 'Ayam', 'ayam@gmail.com', NULL, NULL, '$2y$10$u60.Lo/J7MWn1HEinxeLuuGkD3Lc3LrHy.LCkT1AaAFLAyzQAdTtC', NULL, '2020-07-20 10:41:24', '2020-07-20 10:41:24'),
(27, 'supir', 'Ayam', 'ayam3@gmail.com', NULL, NULL, '$2y$10$1Y2DTlpvYpLE2aUC7yJZv.3b0p0vb3flxaxI6wN8LMHl2uAEsYZQK', NULL, '2020-07-20 10:42:11', '2020-07-20 10:42:11'),
(28, 'pemesan', 'Aku', 'aku@gmail.com', 'REG-20200720215148', NULL, '$2y$10$NCSrPSQCaZZCcE0U/bzeQeMuqYuowr6WoEgBTZkLvBDpZ/f7EeqTm', NULL, NULL, NULL),
(29, 'pemesan', 'iin sahuri', 'iin123@gmail.com', 'REG-20200721093218', NULL, '$2y$10$8N0ZGubNS.H.pAGd/MI58Oc/oqUZNXV40a3mRrbO8tC3TGGheARWC', NULL, NULL, NULL),
(30, 'pemesan', 'Pemesan', 'pemesan@gmail.com', 'REG-20200727095152', NULL, '$2y$10$vavZSTxwBEvcl1Mpv3jA5.FFWCVIuFpQ4fr9KzpScdYPdKO.yE6Yy', NULL, NULL, NULL),
(31, 'supir', 'tulkijo', 'tulkijo565@gmail.com', NULL, NULL, '$2y$10$23KYVEWMoVYY0pvHC3qZMeM8ImwDPQkJ7SDwZiE2aUYFtj9XbcRpK', NULL, '2020-07-28 04:17:16', '2020-07-28 04:17:16'),
(32, 'pemesan', 'admin', 'admin@admin.com', 'REG-20200729233009', NULL, '$2y$10$KBqSFN7mM9yWWqOFrpZyu.kVpKWoEfKiaDu7BYqxzHhwYOD77TxDW', NULL, NULL, NULL),
(33, 'supir', 'jarbi', 'jarbi@gmail.com', NULL, NULL, '$2y$10$9laNR/JQnBqYBRz9u9IDyumQ0Lxg0whsk0QrxqQEFw/yNWx4RJee6', NULL, '2020-07-29 17:01:28', '2020-07-29 17:01:28'),
(34, 'supir', 'jarbi', 'jarb2i@gmail.com', NULL, NULL, '$2y$10$dCSKJiPzkCwgf/u50EHIbeyBXK1AyG5ykyw29QCI4IWqzthtjZSqa', NULL, '2020-07-29 17:02:02', '2020-07-29 17:02:02'),
(35, 'pemesan', 'hendra', 'hendra@gmail.com', 'REG-20200805113044', NULL, '$2y$10$F.kn0YAF.0cQWq.V/I.NmuBIjn6A/m/HNtz97YEntf1EIjeLT9Jam', NULL, NULL, NULL),
(36, 'supir', 'aa', 'as@gmail.com', NULL, NULL, '$2y$10$WkxWoB3UOGAaBLv.eWijbOwry3PzuO1EGuN.mVSWvm59JxcsNqg9C', NULL, '2020-08-18 05:35:47', '2020-08-18 05:35:47'),
(37, 'supir', 'a', 'bas@gmail.com', NULL, NULL, '$2y$10$bOuSKsIRrMhWH0tHhWAlq.OL5bugEU0uL9eUGwt4rychnz7uzMlnS', NULL, '2020-08-18 05:38:06', '2020-08-18 05:38:06'),
(38, 'supir', 'z', 'az@gmail.com', NULL, NULL, '$2y$10$tAjd.pvfJW51GzyiUPpICuHybsZmQjcmxvJ8A07gISX3YZzUEzzpK', NULL, '2020-08-18 05:50:34', '2020-08-18 05:50:34'),
(39, 'pemesan', 'Coba', 'coba@gmail.com', 'REG-20200828204339', NULL, '$2y$10$/7lnGwS2Ft3dc89O8ok7wOc6oABH5lZkoM6rraRtoCX2nLHHeEt0C', NULL, '2020-08-28 13:43:39', '2020-08-28 13:43:39'),
(40, 'pemesan', 'siti', 'siti@gmail.com', 'REG-20200828205424', NULL, '$2y$10$t4ijtosgtVCDaWB.U./M.OxWP5SBV/A6VZYVXu.J7vLlzc6FeDoCC', NULL, '2020-08-28 13:54:24', '2020-08-28 13:54:24'),
(41, 'supir', 'Moca', 'moca@gmail.com', NULL, NULL, '$2y$10$v6d9dgufEKxXnQDgkv3NyeX83r8g.kXzV8ng2nKakx8yqUIsD8ZWi', NULL, '2020-08-31 15:57:19', '2020-08-31 15:57:19'),
(42, 'pemesan', 'sayang', 'sayang@gmail.com', 'REG-20200831233156', NULL, '$2y$10$zErqB7lB6WCdK7aRa47luOH4XhXtybTRqKLJfOrstibL7yZ7uSr6q', NULL, '2020-08-31 16:31:56', '2020-08-31 16:31:56'),
(43, 'pemesan', 'Bot', 'bot@gmail.com', 'REG-20200831233629', NULL, '$2y$10$0g9kuA2XpopbBxb9xiT/EuH/HqxxUShdvc.gKM1jQ7z8hyEjb65ye', NULL, '2020-08-31 16:36:29', '2020-08-31 16:36:29'),
(44, 'pemesan', 'zahi', 'zahi@gmail.com', 'REG-20200831234149', NULL, '$2y$10$IPldAcnQC/PYMHSYE9tAherpvNT8Ni1KIoT9iuK/JcbLokD/.KrdO', NULL, '2020-08-31 16:41:49', '2020-08-31 16:41:49'),
(45, 'pemesan', 'aa', 'aaa@gmail.com', 'REG-20200901001908', NULL, '$2y$10$pwoFyrbCk3wek1lpu1FuVu8quneLRQ9.3Lp/Nxxf/y6ROLxDRfBUK', NULL, '2020-08-31 17:19:08', '2020-08-31 17:19:08'),
(46, 'pemesan', 'zzz', 'aaaaa2@gnail.com', 'REG-20200901003038', NULL, '$2y$10$nZljoENiKoStV4MJFRucuuJsjO8SqYwFjgT0jycZ.OpgtNdPjJmzO', NULL, '2020-08-31 17:30:38', '2020-08-31 17:30:38'),
(47, 'pemesan', 'aa', 'an@gmail.com', 'REG-20200901004041', NULL, '$2y$10$jUGbkDa8fvRAZj6396wUWeEg3cdCWBiA.f6EuviVrcqM1ipX5m78.', NULL, '2020-08-31 17:40:41', '2020-08-31 17:40:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
