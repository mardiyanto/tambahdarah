-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Des 2023 pada 07.42
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
('RYU', 'f3770595e0cb4d9a988bd5da98d2187d', 'Rizky Yuni Utami'),
('januriawan', '21232f297a57a5a743894a0e4a801fc3', 'Fajar Januriawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_pengetahuan`
--

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL,
  `kode_penyakit` int(11) NOT NULL,
  `kode_gejala` int(11) NOT NULL,
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `basis_pengetahuan`
--

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
(1, 5, 1, 1.0, 0.6),
(2, 5, 2, 1.0, 0.6),
(3, 5, 3, 0.8, 0.4),
(4, 5, 4, 0.8, 0.4),
(5, 5, 5, 0.6, 0.2),
(6, 4, 6, 1.0, 0.8),
(7, 4, 7, 1.0, 0.8),
(8, 4, 8, 0.8, 0.4),
(9, 4, 9, 1.0, 0.8),
(10, 4, 17, 0.8, 0.4),
(11, 1, 1, 1.0, 0.4),
(12, 1, 5, 1.0, 0.8),
(13, 1, 4, 0.8, 0.4),
(14, 1, 10, 1.0, 0.8),
(15, 1, 11, 1.0, 0.8),
(16, 1, 12, 0.8, 0.4),
(17, 3, 1, 1.0, 0.8),
(18, 3, 5, 0.8, 0.4),
(19, 3, 13, 1.0, 0.8),
(20, 3, 14, 1.0, 0.4),
(21, 3, 15, 1.0, 0.8),
(22, 4, 1, 0.8, 0.4),
(23, 4, 7, 1.0, 0.4),
(24, 4, 8, 0.8, 0.4),
(25, 4, 17, 0.8, 0.4),
(26, 4, 18, 1.0, 0.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` int(11) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`) VALUES
(1, 'Kelelahan Berlebihan: Rasa lelah yang terus-menerus, bahkan setelah istirahat yang cukup.'),
(2, 'Infeksi yang Sering atau Berat: Rentan terhadap infeksi karena jumlah sel darah putih yang rendah.'),
(3, 'Memar dan Perdarahan yang Mudah: Perdarahan gusi yang berlebihan, memar tanpa sebab yang jelas, atau perdarahan yang sulit dihentikan.'),
(4, 'Napas Pendek: Terkadang dapat disertai dengan denyut jantung yang cepat.'),
(5, 'Pucat Kulit: Warna kulit yang pucat bisa menjadi tanda anemia yang parah.'),
(6, 'Kelelahan yang Luar Biasa: Kelelahan yang terus menerus bahkan setelah istirahat yang cukup, karena tubuh tidak dapat menghasilkan cukup sel darah merah untuk membawa oksigen ke seluruh tubuh.'),
(7, 'Kuning pada Kulit dan Mata (Jaundice): Kuningnya kulit, mata, dan kulit putih disebabkan oleh penumpukan bilirubin, sebuah zat yang dihasilkan ketika sel darah merah dihancurkan, dan biasanya disaring oleh hati.'),
(8, 'Urin Gelap: Urin yang tampak lebih gelap dari biasanya karena meningkatnya produksi bilirubin yang dikeluarkan melalui urin.'),
(9, 'Perubahan pada Selaput Lendir: Kulit dan mata yang kuning, selain itu, lidah dan gusi mungkin tampak pucat.'),
(10, 'Kuku Rapuh dan Rambut Rontok: Kuku menjadi rapuh dan mungkin ada kecenderungan rambut rontok lebih banyak dari biasanya.'),
(11, 'Pengalaman Rasa Lemah: Beberapa orang merasa lemah, lesu, atau kurang konsentrasi pada aktivitas sehari-hari.'),
(12, 'Gangguan Pada Lidah: Lidah yang menjadi pucat atau terasa tidak nyaman, atau kadang-kadang dapat muncul luka kecil pada sudut-sudut mulut.'),
(13, 'Gangguan pada Selaput Lendir: Lidah yang meradang (glossitis) atau tampak pucat, serta perubahan pada selaput lendir mulut.'),
(14, 'Gangguan Pencernaan: Gejala seperti diare, konstipasi, atau gangguan pencernaan lainnya.'),
(15, 'Gangguan Mental atau Emosional'),
(17, 'Peningkatan Detak Jantung (Tachycardia): Terkadang disertai dengan napas cepat atau terengah-engah.'),
(18, 'Perdarahan dan Memar yang Mudah: Terdapat cenderung lebih banyak perdarahan dan muncul memar dengan mudah.'),
(19, 'Kesemutan atau Mati Rasa: Terutama di tangan atau kaki.'),
(20, 'Perubahan Pada Sistem Saraf: Gangguan seperti kesulitan berjalan, kebingungan, atau bahkan demensia ringan pada kasus yang parah.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL DEFAULT '0',
  `penyakit` text NOT NULL,
  `gejala` text NOT NULL,
  `hasil_id` int(11) NOT NULL,
  `hasil_nilai` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `tanggal`, `penyakit`, `gejala`, `hasil_id`, `hasil_nilai`) VALUES
(1, '2023-12-04 15:29:08', 'a:0:{}', 'a:0:{}', 0, ''),
(2, '2023-12-04 16:01:24', 'a:4:{i:1;s:6:\"0.8346\";i:5;s:6:\"0.8140\";i:4;s:6:\"0.4757\";i:3;s:6:\"0.4547\";}', 'a:19:{i:1;s:1:\"1\";i:2;s:1:\"5\";i:3;s:1:\"1\";i:4;s:1:\"3\";i:5;s:1:\"1\";i:6;s:1:\"4\";i:7;s:1:\"2\";i:8;s:1:\"9\";i:9;s:1:\"8\";i:10;s:1:\"3\";i:11;s:1:\"4\";i:12;s:1:\"4\";i:13;s:1:\"4\";i:14;s:1:\"6\";i:15;s:1:\"1\";i:17;s:1:\"1\";i:18;s:1:\"5\";i:19;s:1:\"5\";i:20;s:1:\"5\";}', 1, '0.8346');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `ket`) VALUES
(1, 'Pasti ya', ''),
(2, 'Hampir pasti ya', ''),
(3, 'Kemungkinan besar ya', ''),
(4, 'Mungkin ya', ''),
(5, 'Tidak tahu', ''),
(6, 'Mungkin tidak', ''),
(7, 'Kemungkinan besar tidak', ''),
(8, 'Hampir pasti tidak', ''),
(9, 'Pasti tidak', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `show_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `det_penyakit` varchar(500) NOT NULL,
  `srn_penyakit` varchar(500) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `det_penyakit`, `srn_penyakit`, `gambar`) VALUES
(1, 'Anemia Defisiensi Besi', 'Salah satu penyebab paling umum anemia. Gejalanya meliputi kelelahan, kulit pucat, napas pendek, denyut jantung cepat, dan rambut rontok.', 'konsumsi obat 3x2 sehari', 'anemia-defisiensi-besi-1551067633.webp'),
(2, 'Anemia Defisiensi Vitamin B12', 'Penyebabnya bisa karena diet yang kurang vitamin B12 atau masalah penyerapan. Gejalanya meliputi kelelahan, kesemutan atau mati rasa di tangan dan kaki, gangguan pencernaan, serta perubahan mental seperti kebingungan atau depresi.', '3x1', 'anemia-defisiensi-vitamin-b12-dan-folat-1573614627.jpg'),
(3, 'Anemia Defisiensi Asam Folat', 'Kurangnya asam folat dalam tubuh dapat menyebabkan anemia. Gejalanya mirip dengan anemia defisiensi besi, yaitu kelelahan, kulit pucat, serta perubahan pada selaput lendir dan lidah.', '3x1', 'anemia-defisiensi-vitamin-b12-dan-folat-thumb-1573614627.jpg'),
(4, 'Anemia Hemolitik', 'Jenis anemia di mana sel darah merah dihancurkan lebih cepat dari biasanya. Gejalanya meliputi kelelahan, kuning pada kulit dan mata (jaundice), serta perubahan warna urine yang menjadi gelap.', '3x1', 'anemia-hemolitik-1573614704.webp'),
(5, 'Anemia Aplastik', 'Terjadi ketika sumsum tulang tidak membuat jumlah sel darah merah yang cukup. Gejalanya dapat termasuk kelelahan, infeksi yang sering, dan memar dengan mudah.', '3x1', 'Aplastic-Anaemia_indo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `kode_post` int(11) NOT NULL,
  `nama_post` varchar(50) NOT NULL,
  `det_post` varchar(15000) NOT NULL,
  `srn_post` varchar(15000) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  ADD PRIMARY KEY (`kode_pengetahuan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`kode_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basis_pengetahuan`
--
ALTER TABLE `basis_pengetahuan`
  MODIFY `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `kode_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kode_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `kode_post` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
