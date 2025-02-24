-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 11:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvimam`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `nomor` int(11) NOT NULL,
  `project` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `link_project` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`nomor`, `project`, `keterangan`, `foto`, `link_project`) VALUES
(1, 'Portfolio Page', 'Project ini adalah salah satu tugas project yang diberikan untuk melaksanakan UTS matakuliah Pemrograman Internet. Project ini merupakan sebuah aplikasi portofolio berbasis website yang dirancang untuk menampilkan informasi diri secara profesional. Aplikasi ini mencakup konten seperti deskripsi pekerjaan sebagai desainer UI/UX, beberapa riwayat desain yang telah diselesaikan, data pribadi, dan kontak pribadi . Dengan antarmuka yang sederhana namun estetis, aplikasi ini dioptimalkan untuk memberikan pengalaman pengguna yang responsif dan mudah diakses.', 'Screenshot 2024-12-16 102200.png', 'https://portfolioprojectimamriyadi.on.drv.tw/portfolio/'),
(2, 'UI/UX Aplikasi Kasir Cafe', 'Project ini adalah salah satu tugas project besar UAS matakuliah Interaksi Manusia dan Komputer pada Semester 4 lalu, project ini dikerjakan secara berkelompok. Project ini merupakan prototipe rancangan antarmuka aplikasi kasir cafe yang dibuat menggunakan Figma. Dengan pendekatan minimalis dan modern, desain ini mempermudah pengguna untuk mengelola pesanan pelanggan, memantau stok barang, dan melakukan pembayaran. Fokus utama dari desain ini adalah user experience yang intuitif, dengan tata letak yang sederhana namun tetap estetis.', 'Screenshot 2024-12-21 095611.png', 'https://bit.ly/AplikasiKasirCafe'),
(3, 'Aplikasi Ziza Fish Farm Berbasis Web', 'Project ini adalah salah satu tugas besar UAS matakuliah Manajemen Proyek dan Perubahan, project ini dikerjakan secara berkelompok. Project ini merupakan website yang dirancang khusus untuk mempermudah proses jual beli ikan koi. Dengan antarmuka yang sederhana dan fungsional, aplikasi ini memungkinkan penjual untuk mengelola daftar produk, menampilkan informasi detail ikan koi, serta memberikan opsi pembelian bagi pelanggan. Sistem ini juga dilengkapi dengan fitur pencarian untuk mempermudah pelanggan menemukan ikan koi yang diinginkan. Kombinasi warna dan desainnya yang simpel tapi tetap estetik dirancang agar memudahkan pengguna.', 'Screenshot 2025-01-05 194833.png', 'http://zizafishfarm.my.id/login.php');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `nomor` int(11) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `sekolah_kampus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`nomor`, `pendidikan`, `tahun`, `sekolah_kampus`) VALUES
(1, 'SD', 2016, 'SD NEGERI JATIASIH 5 BEKASI'),
(2, 'SMP', 2019, 'SMP NEGERI 9 BEKASI'),
(3, 'MA', 2022, 'MA SWASTA ASSAADAH JAMANIS'),
(4, 'S1', 2026, 'UNIVERSITAS PERJUANGAN TASIKMALAYA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `jenis_kelamin`, `alamat`, `deskripsi`, `foto`) VALUES
(13, 'Imam Riyadi', 'Laki-laki', 'Jl. Sukasenang, Banyuresmi, Kec. Sukahening, Kabupaten Tasikmalaya, Jawa Barat 46155, Indonesia', 'Saya seorang mahasiswa semester lima di Universitas Perjuangan Tasikmalaya dalam program studi teknik informatika. Saya saat ini belajar berbagai mata kuliah, salah satunya adalah pemrograman internet. Saya tertarik pada pengembangan web, khususnya membuat sistem yang interaktif dan responsif.', 'Imam Riyadi.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
