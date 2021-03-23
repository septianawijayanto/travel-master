-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Sep 2020 pada 07.01
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` time NOT NULL,
  `biaya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kode`, `tujuan`, `jam`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 'KJ-1', 'Kerinci-Jambi Pagi', '08:00:00', 150000, '2020-07-15 01:42:41', '2020-08-05 03:47:50'),
(2, 'KJ-2', 'Kerinci-Jambi Sore', '19:00:00', 150000, '2020-07-16 18:50:20', '2020-08-05 03:47:59'),
(3, 'KJ-3', 'Jambi-Kerinci Pagi', '08:00:00', 150000, '2020-07-16 18:50:45', '2020-08-09 02:29:54'),
(4, 'KJ-4', 'Jambi-Kerinci Sore', '19:00:00', 150000, '2020-07-16 18:51:23', '2020-08-05 03:48:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_03_27_064849_create_table_karyawan', 1),
(4, '2020_03_30_090713_create_jadwal_table', 2),
(5, '2020_07_15_082712_create_jadwal_table', 3),
(6, '2020_07_15_082802_create_pemesan_table', 4),
(7, '2020_07_15_082852_create_karyawan_table', 5),
(8, '2020_07_15_091614_create_pemesan_table', 6),
(9, '2020_07_17_030118_create_sopir_table', 7),
(10, '2020_07_17_031408_create_supir_table', 8),
(11, '2020_07_17_054143_create_bangku_table', 9),
(12, '2020_07_17_124045_ad_id_registrasi', 10),
(13, '2020_07_17_201352_create_pemesanan_table', 11),
(14, '2020_07_18_122105__add_id_pemesanan_table', 12),
(15, '2020_07_18_163506__add_id_supir_table', 13),
(16, '2020_07_18_165600__add_tanggal_table', 14),
(17, '2020_07_18_165945__add_tanggal_table', 15),
(18, '2020_07_20_173153__add_mobil_table', 16),
(24, '2020_07_27_205310__create_kursi_table', 17),
(26, '2020_07_27_205513__add_no_kursi_table', 18),
(27, '2020_07_27_211804__create_kursi_pemesanan_table', 19),
(28, '2020_07_27_215951__add_kursi_pemesan_table', 20),
(29, '2020_07_27_220250__add_pemesanan_id_table', 21),
(30, '2020_07_28_101534__add_id_kursi_table', 22),
(31, '2020_07_28_105452__add_kursi_table', 23),
(32, '2020_07_30_162038__add_almt_jmpt_table', 24),
(33, '2020_07_30_204129__create_bangku_table', 25),
(34, '2020_07_30_204952__add_id_bangku_table', 26),
(35, '2020_08_01_141741__add_id_bangku_table', 27),
(36, '2020_08_04_125518__add_bkttf_table_c', 28),
(37, '2020_08_05_102602__add_kd_table', 29),
(38, '2020_08_05_111458__create_bangku_pemesanan_table', 30),
(39, '2020_08_05_113333__create_mobil_table', 31),
(40, '2020_08_05_113637__create_mobil_pemesanan_table', 32),
(41, '2020_08_05_114014__add_merk_table', 33),
(42, '2020_08_05_115402__create_mobil_pemesanan_table', 34),
(43, '2020_08_06_170121__add_kd_mobil_table', 35),
(44, '2020_08_06_172948__add_bangku_mobil_table', 36),
(45, '2020_08_21_203420__add_is_verifikasi_table', 37),
(46, '2020_08_28_115826__create_mobil_pemesanan_table', 38),
(47, '2020_08_29_144034__add_sudah_table', 39),
(48, '2020_08_31_231713__add_avatar_users', 40),
(49, '2020_09_01_000324__add_photo_users', 41),
(50, '2020_09_01_000519__add_photo_users', 42),
(51, '2020_09_01_003510__add_bkttf_users', 43),
(52, '2020_09_01_070133__add_photo_users', 44);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bangku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_kursi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id`, `kd_mobil`, `merk`, `no_pol`, `bangku`, `jml_kursi`, `tahun`, `created_at`, `updated_at`) VALUES
(1, 'KM-1', 'AVP', 'BH 1245 CK', '1', '7', 2019, '2020-08-06 10:36:23', '2020-08-06 16:27:54'),
(2, 'KM-1', 'AVP', 'BH 1245 CK', '2', '7', 2019, '2020-08-06 10:37:23', '2020-08-06 10:37:23'),
(3, 'KM-1', 'AVP', 'BH 1245 CK', '3', '7', 2019, '2020-08-06 10:37:32', '2020-08-06 10:37:32'),
(4, 'KM-1', 'AVP', 'BH 1245 CK', '4', '7', 2019, '2020-08-06 10:37:41', '2020-08-06 10:37:41'),
(5, 'KM-1', 'AVP', 'BH 1245 CK', '5', '7', 2019, '2020-08-06 10:37:52', '2020-08-06 10:37:52'),
(6, 'KM-1', 'APV', 'BH 1245 CK', '6', '7', 2019, NULL, NULL),
(7, 'KM-1', 'APV', 'BH 1245 CK\r\n', '7', '7', 0, NULL, NULL),
(10, 'KM-2', 'Grand Maxn', 'BH 6788 ZN', '1', '7', 2016, '2020-09-06 15:59:04', '2020-09-06 15:59:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil_pemesanan`
--

CREATE TABLE `mobil_pemesanan` (
  `mobil_id` bigint(20) UNSIGNED NOT NULL,
  `pemesanan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mobil_pemesanan`
--

INSERT INTO `mobil_pemesanan` (`mobil_id`, `pemesanan_id`) VALUES
(1, 1),
(1, 5),
(1, 6),
(1, 7),
(1, 9),
(2, 1),
(2, 8),
(3, 2),
(3, 6),
(4, 3),
(5, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pemesanan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bkttf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_penumpang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `almt_jmpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_verifikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_pemesanan`, `bkttf`, `user_id`, `id_jadwal`, `jumlah_penumpang`, `alamat`, `almt_jmpt`, `jenis_kelamin`, `tanggal_pesan`, `no_hp`, `created_at`, `updated_at`, `is_verifikasi`) VALUES
(1, 'P-0905082302', 'bktf.jpg', 10, 1, '2', 'Jambi', 'Jambi Sebrang', 'P', '2020-09-09', '08899888', '2020-09-05 01:23:02', '2020-09-06 15:58:36', 1),
(2, 'P-0905082428', NULL, 11, 2, '1', 'Kerinci', 'Kerinci', 'L', '2020-09-08', '0899988899', '2020-09-05 01:24:28', '2020-09-05 07:14:33', NULL),
(3, 'P-0905082959', 'bktf.jpg', 12, 3, '1', 'Jambi', 'Kota Baru', 'P', '2020-09-08', '088999', '2020-09-05 01:29:59', '2020-09-05 01:36:56', 1),
(5, 'P-0905152750', NULL, 13, 1, '1', 'Jambi', 'Pakuan Baru', 'L', '2020-12-31', '07788777', '2020-09-05 08:27:50', '2020-09-06 15:43:15', 0),
(6, 'P-0906111335', 'bktf.jpg', 15, 1, '2', 'a', 'a', 'L', '2020-09-08', '088889988', '2020-09-06 04:13:35', '2020-09-06 04:14:13', 1),
(7, 'P-0906225524', 'bktf.jpg', 16, 4, '2', 'Jambi', 'The Hook', 'L', '2020-09-09', '0888929992', '2020-09-06 15:55:24', '2020-09-06 15:56:56', 1),
(8, 'P-0907081916', 'admin.png', 19, 3, '1', 'a', 'q', 'L', '2020-12-31', '9999', '2020-09-07 01:19:16', '2020-09-07 01:20:03', 1),
(9, 'P-0911170237', 'png.png', 20, 1, '1', 's', '2', 'P', '2020-09-12', '54', '2020-09-11 10:02:37', '2020-09-11 10:04:32', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date DEFAULT NULL,
  `mobil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_supir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id`, `tanggal`, `mobil`, `id_jadwal`, `user_id`, `nama_supir`, `avatar`, `alamat`, `jenis_kelamin`, `no_hp`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020-09-08', 'Grand Max', 1, 3, 'Reza Oktriandi', 'Tanpa judul.png', 'Kerinci', 'L', '0899228832', 'B', '2020-09-05 01:11:53', '2020-09-06 07:21:32'),
(2, '2020-09-08', 'APV', 2, 4, 'Bram Hima Junata', NULL, 'Kerinci', 'L', '0898890009', 'N', '2020-09-05 01:13:44', '2020-09-05 01:13:44'),
(3, '2020-09-08', 'Grand Max', 3, 5, 'Prija Putra', NULL, 'Kerinci', 'L', '08238990228', 'B', '2020-09-05 01:15:03', '2020-09-05 01:15:03'),
(4, '2020-09-08', 'APV', 4, 6, 'Depa Saputra', NULL, 'Jambi', 'L', '0823889989', 'B', '2020-09-05 01:16:10', '2020-09-06 07:23:25'),
(5, '2020-09-09', 'APV', 1, 7, 'Andre Agustian', NULL, 'Jambi', 'L', '0882992833', 'N', '2020-09-05 01:17:21', '2020-09-05 01:17:21'),
(6, '2020-09-09', 'Grand Max', 3, 8, 'Permadi', NULL, 'Kerinci', 'L', '088829998', 'B', '2020-09-05 01:18:09', '2020-09-06 16:00:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_registrasi` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `photo`, `email`, `id_registrasi`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Septiana Wijayanto', 'aku.jpg', 'septianawijayanto81@gmail.com', 'REG-20200905080625', NULL, '$2y$10$4W5TeYXrG/9lTf38A30PjeCdDXhhDbnBZ9UuONVinW.3T1Hz0ygYy', NULL, '2020-09-05 01:06:25', '2020-09-05 01:06:25'),
(3, 'supir', 'Reza Oktriandi', NULL, 'reza@gmail.com', NULL, NULL, '$2y$10$JQ1O/MjQgHgk6r0.aIvly.C2hmFdRCkb.EZpYFFiaRvtCyOU8h8py', NULL, '2020-09-05 01:11:53', '2020-09-05 01:11:53'),
(4, 'supir', 'Bram Hima Junata', NULL, 'bram@gmail.com', NULL, NULL, '$2y$10$C73lPPoUd6s8ES30Dv2qvOHNop.o6jCbKdA3NC.FJeUcJ/wb7NefG', NULL, '2020-09-05 01:13:44', '2020-09-05 01:13:44'),
(5, 'supir', 'Prija Putra', NULL, 'putra@gmail.com', NULL, NULL, '$2y$10$K61jlXM6b73Y1e/SpyTr0O4VLbU84rJPBLscTwADZJ27GGMfvh/Ve', NULL, '2020-09-05 01:15:03', '2020-09-05 01:15:03'),
(6, 'supir', 'Depa Saputra', NULL, 'depa@gmail.com', NULL, NULL, '$2y$10$HEqqc/oVCwSO6pQAUnaEYu/uynxbWDZUI9niqGRjbqR3til1rrsXO', NULL, '2020-09-05 01:16:10', '2020-09-05 01:16:10'),
(7, 'supir', 'Andre Agustian', NULL, 'andre@gmail.com', NULL, NULL, '$2y$10$pB01brnmCi7Msj6cAVc/2.t0o./1oHpUWT4P4NsbJPEnhesl1.12q', NULL, '2020-09-05 01:17:21', '2020-09-05 01:17:21'),
(8, 'supir', 'Permadi', NULL, 'permadi@gmail.com', NULL, NULL, '$2y$10$tN.ioJ1luaQddmabEDg/nO1XvXHEysopSMOhzaqFvfcwyMXSDdpCO', NULL, '2020-09-05 01:18:09', '2020-09-05 01:18:09'),
(10, 'pemesan', 'Rossa', 'pp.jpg', 'rossa@gmail.com', 'REG-20200905082214', NULL, '$2y$10$wjLKoXdodI9dyUWDObq49Odj6Naiu.Oa9IbCRPRsINZ8bzs6lUYcu', NULL, '2020-09-05 01:22:14', '2020-09-05 01:22:14'),
(11, 'pemesan', 'Eko Ilham', 'pp (1).jpg', 'eko@gmail.com', 'REG-20200905082344', NULL, '$2y$10$HTZYHDncRyxnUKwfRAXzQu0htGMRQ4H7ovRaCnUT2oo3GoB3yi.2y', NULL, '2020-09-05 01:23:44', '2020-09-05 01:23:44'),
(12, 'pemesan', 'Yessi', 'logo.png', 'yessinovriyani048@gmail.com', 'REG-20200905082917', NULL, '$2y$10$rZOy.u5F1WFEnzpHAepmSeUHU/N9t47Z.d/0NIDeWdezSpoBfIMDu', NULL, '2020-09-05 01:29:17', '2020-09-05 01:29:17'),
(13, 'pemesan', 'Agung', 'Tanpa judul.png', 'agung@gmail.com', 'REG-20200905083038', NULL, '$2y$10$3vwZkyaof/xN.YL0oy2uzOs4uTfoH837u9G29DL8/ubHVGqLqlzCq', NULL, '2020-09-05 01:30:38', '2020-09-05 01:30:38'),
(14, 'pemesan', 'Bsbsng', 'bktf.jpg', 'babang@gmail.com', 'REG-20200905145720', NULL, '$2y$10$KeTImz.eEQ684XbNIPjjduKq63iSYTj3URUov4mT/7W6gM8wEqagG', NULL, '2020-09-05 07:57:20', '2020-09-05 07:57:20'),
(15, 'pemesan', 'Neng', 'png.png', 'neng@gmail.com', 'REG-20200906111302', NULL, '$2y$10$XbPFuPtccoK.SQLrvfkf0.m1kDUCab1.TYlvIHqwHN7ZAxvjmap8a', NULL, '2020-09-06 04:13:02', '2020-09-06 04:13:02'),
(16, 'pemesan', 'Siti Hadijah', 'png.png', 'siti@gmail.com', 'REG-20200906225441', NULL, '$2y$10$KpMJCZcr6lb6ozpkUj50FuT3CwanqyFS8gQiSOr3zazCn7D4d3lIK', NULL, '2020-09-06 15:54:41', '2020-09-06 15:54:41'),
(17, 'supir', 'Bro', NULL, 'btro@gmail.com', NULL, NULL, '$2y$10$5oxGtmloAdI4TwpPSCXTzuPnulYwefIMXYrzU2y7SnEfqwgS95M1.', NULL, '2020-09-06 16:00:27', '2020-09-06 16:00:27'),
(18, 'admin', 'Adminisator', 'admin.png', 'admin@admin.com', 'REG-20200906230627', NULL, '$2y$10$VbbwMfCYBNdSWjUBN/ZQMOMmkUT0BUvRQozi32BahiNvPXEZqlDi.', NULL, '2020-09-06 16:06:27', '2020-09-06 16:06:27'),
(19, 'pemesan', 'septi', 'pp.jpg', 'septi@gmail.com', 'REG-20200907081731', NULL, '$2y$10$9GaTie1SkFyOI6YFK5nk1e/gB5H7OaiFli0m4Gqpfi.yz1FTZC31.', NULL, '2020-09-07 01:17:31', '2020-09-07 01:17:31'),
(20, 'pemesan', 'Pemesan', 'admin.png', 'pemesan@gmail.com', 'REG-20200911170113', NULL, '$2y$10$zGZPeZNG3zJtVWQUbZnhRuUMaynxXF5UzsLsf.IzVbS5KEOtACXw6', NULL, '2020-09-11 10:01:13', '2020-09-11 10:01:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mobil_pemesanan`
--
ALTER TABLE `mobil_pemesanan`
  ADD PRIMARY KEY (`mobil_id`,`pemesanan_id`),
  ADD KEY `mobil_pemesanan_pemesanan_id_foreign` (`pemesanan_id`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_user_id_foreign` (`user_id`),
  ADD KEY `pemesanan_id_jadwal_foreign` (`id_jadwal`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supir_no_hp_unique` (`no_hp`),
  ADD KEY `supir_id_jadwal_foreign` (`id_jadwal`),
  ADD KEY `supir_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `supir`
--
ALTER TABLE `supir`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mobil_pemesanan`
--
ALTER TABLE `mobil_pemesanan`
  ADD CONSTRAINT `mobil_pemesanan_mobil_id_foreign` FOREIGN KEY (`mobil_id`) REFERENCES `mobil` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mobil_pemesanan_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `pemesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD CONSTRAINT `supir_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`),
  ADD CONSTRAINT `supir_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
