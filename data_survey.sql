-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Mar 2020 pada 02.12
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_survey`
--

CREATE TABLE `data_survey` (
  `ID` int(5) NOT NULL,
  `Nama_Even` varchar(200) NOT NULL,
  `Y` date NOT NULL,
  `X` date NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_survey`
--

INSERT INTO `data_survey` (`ID`, `Nama_Even`, `Y`, `X`, `Foto`, `deskripsi`) VALUES
(1, 'Sertifikasi Oraclec', '2020-03-11', '2020-03-12', '<img src=\'foto\\foto03.jpg\' width=\'400\' />', 'Pengetahuan tentang Administrasi Database Oracle sangat diperlukan, terutama untuk seorang Database Administrator (DBA). Dengan pengetahuan tentang Administrasi seorang Database Administrator dapat mengelola Database dalam berbagai hal, contohnya antara lain networking database, backup data, recovery data, manage memory, manage storage dan masih banyak pengetahuan lain yang akan di dapat. Selain dapat mengelola database seorang Database Administrator yang memiliki kemampuan Administrasi Database juga dapat mengatasi permasalahan yang terjadi pada server database seperti tuning, defragment, dan lain-lain.'),
(2, 'Sertifikasi Mikrotik', '2020-03-19', '2020-03-21', '<img src=\'foto\\foto02.jpg\' width=\'400\' />', 'engertian Mikrotik dan Fungsinya,- Mikrotik adalah sistem operasi dan perangkat lunak yang dapat digunakan untuk menjadikan komputer manjadi router network yang handal, mencakup berbagai fitur yang dibuat untuk IP network dan jaringan wireless, cocok digunakan oleh ISP, provider hotspot dan warnet.'),
(3, 'Sertifikasi Cisco', '2020-03-27', '2020-03-31', '<img src=\'foto\\foto01.jpg\' width=\'400\' />', 'Sertifikasi Cisco adalah sertifikasi yang dikeluarkan oleh vendor teknologi jaringan komputer ternama Cisco System sebagai bukti pengetahuan dan keahlian si pemiliknya dalam menangani jaringan komputer berbasis produk Cisco System sesuai dengan kualifikasi yang ditentukan oleh sertifikasi tersebut..'),
(91, 'EVENT BOB', '2020-03-12', '2020-03-14', '<img src=\'foto\\bob.jpg\' width=\'400\' />', 'Sertifikasi Cisco adalah sertifikasi yang dikeluarkan oleh vendor teknologi jaringan komputer ternama Cisco System sebagai bukti pengetahuan dan keahlian si pemiliknya dalam menangani jaringan komputer berbasis produk Cisco System sesuai dengan kualifikasi yang ditentukan oleh sertifikasi tersebut..');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_survey`
--
ALTER TABLE `data_survey`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_survey`
--
ALTER TABLE `data_survey`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
