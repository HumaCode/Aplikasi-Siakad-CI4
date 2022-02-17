-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2022 pada 09.53
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kd_dosen` varchar(10) DEFAULT NULL,
  `nidn` varchar(10) DEFAULT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `foto` varchar(125) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `kd_dosen`, `nidn`, `nama_dosen`, `foto`, `password`) VALUES
(1, 'DSN2021', '1111111111', 'Dosen 1', 'dosen.jpg', '12345'),
(2, 'DSN2021', '1111111112', 'Dosen 2', 'dosen.jpg', '12345'),
(3, 'DSN2021', '1111111113', 'Dosen 3', 'dosen.jpg', '12345'),
(4, 'DSN2021', '1111111114', 'Dosen 4', 'dosen.jpg', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fakultas`
--

CREATE TABLE `tbl_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fakultas`
--

INSERT INTO `tbl_fakultas` (`id_fakultas`, `fakultas`) VALUES
(1, 'Ekonomi dan Bisnis'),
(2, 'Teknik dan Ilmu Komputer'),
(4, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(11) NOT NULL,
  `gedung` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `gedung`) VALUES
(1, 'Gedung A'),
(2, 'Gedung B'),
(4, 'Gedung C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_makul` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_prodi`, `id_ta`, `id_kelas`, `id_makul`, `id_dosen`, `hari`, `waktu`, `id_ruangan`, `kuota`) VALUES
(1, 4, 6, 1, 1, 1, 'Senin', '08:00-10:00', 2, 20),
(2, 4, 6, 1, 10, 2, 'Selasa', '08:00-12:00', 1, 20),
(3, 4, 6, 1, 9, 2, 'Senin', '11:00-12:00', 3, 20),
(4, 4, 6, 1, 8, 3, 'Senin', '13:00-14:00', 2, 20),
(5, 4, 6, 1, 6, 3, 'Rabu', '08:00-09:00', 3, 20),
(6, 4, 6, 1, 4, 4, 'Kamis', '08:00-09:00', 2, 20),
(7, 4, 6, 1, 3, 1, 'Jumat', '08:00-10:00', 2, 20),
(8, 4, 6, 1, 2, 3, 'Rabu', '09:00-10:00', 4, 20),
(9, 4, 6, 1, 7, 1, 'Kamis', '08:00-10:00', 1, 20),
(10, 4, 6, 1, 5, 3, 'Jumat', '09:00-10:00', 1, 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `th_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `id_prodi`, `id_dosen`, `th_angkatan`) VALUES
(1, 'MI-Pagi', 4, 1, 2021),
(2, 'TE-Pagi', 7, 2, 2021),
(4, 'S1-Pagi', 8, 2, 2021),
(5, 'TO-Pagi', 5, 4, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  `p1` int(1) DEFAULT 0,
  `p2` int(1) DEFAULT 0,
  `p3` int(1) DEFAULT 0,
  `p4` int(1) DEFAULT 0,
  `p5` int(1) DEFAULT 0,
  `p6` int(1) DEFAULT 0,
  `p7` int(1) DEFAULT 0,
  `p8` int(1) DEFAULT 0,
  `p9` int(1) DEFAULT 0,
  `p10` int(1) DEFAULT 0,
  `p11` int(1) DEFAULT 0,
  `p12` int(1) DEFAULT 0,
  `p13` int(1) DEFAULT 0,
  `p14` int(1) DEFAULT 0,
  `p15` int(1) DEFAULT 0,
  `p16` int(1) DEFAULT 0,
  `p17` int(1) DEFAULT 0,
  `p18` int(1) DEFAULT 0,
  `nilai_tugas` int(11) DEFAULT 0,
  `nilai_uts` int(11) DEFAULT 0,
  `nilai_uas` int(11) DEFAULT 0,
  `nilai_akhir` int(11) DEFAULT 0,
  `nilai_huruf` varchar(1) DEFAULT '-',
  `bobot` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `id_mhs`, `id_jadwal`, `id_ta`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`, `p16`, `p17`, `p18`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `nilai_huruf`, `bobot`) VALUES
(22, 7, 1, 6, 2, 2, 0, 1, 2, 2, 0, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 70, 100, 80, 85, 'B', 3),
(23, 7, 8, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 100, 100, 100, 100, 'A', 4),
(24, 7, 7, 6, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 2, 2, 2, 2, 2, 2, 2, 100, 90, 90, 90, 'A', 4),
(25, 7, 6, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 80, 80, 80, 83, 'B', 3),
(26, 7, 10, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 90, 80, 80, 85, 'B', 3),
(28, 7, 5, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 100, 90, 90, 93, 'A', 4),
(29, 7, 9, 6, 1, 0, 0, 0, 2, 2, 2, 2, 2, 2, 2, 2, 1, 2, 2, 2, 2, 2, 90, 90, 90, 88, 'A', 4),
(30, 7, 4, 6, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 80, 90, 95, 92, 'A', 4),
(31, 7, 3, 6, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0),
(32, 7, 2, 6, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 90, 80, 90, 89, 'A', 4),
(33, 6, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(34, 6, 8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(35, 6, 7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(36, 6, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(37, 6, 10, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(39, 6, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(40, 6, 9, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(41, 6, 4, 6, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(42, 6, 3, 6, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0),
(43, 6, 2, 6, 2, 2, 1, 0, 1, 2, 2, 0, 2, 0, 2, 0, 2, 2, 2, 2, 0, 2, 100, 100, 100, 95, 'A', 4),
(44, 2, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(45, 2, 8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(46, 2, 7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(47, 2, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(48, 2, 10, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(49, 2, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(50, 2, 9, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(51, 2, 4, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(52, 2, 3, 6, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0),
(53, 2, 2, 6, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 'E', 0),
(54, 1, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(55, 1, 8, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(56, 1, 7, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(57, 1, 6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(58, 1, 10, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(59, 1, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(60, 1, 9, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(61, 1, 4, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'E', 0),
(62, 1, 3, 6, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', 0),
(63, 1, 2, 6, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 'E', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_makul`
--

CREATE TABLE `tbl_makul` (
  `id_makul` int(11) NOT NULL,
  `kd_makul` varchar(20) DEFAULT NULL,
  `makul` varchar(50) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `smt` int(11) DEFAULT NULL,
  `semester` varchar(25) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_makul`
--

INSERT INTO `tbl_makul` (`id_makul`, `kd_makul`, `makul`, `sks`, `kategori`, `smt`, `semester`, `id_prodi`) VALUES
(1, '202101', 'Pancasila', 2, 'Wajib', 1, 'Ganjil', 4),
(2, '202102', 'Studi Kemuhammadiyahan 1', 1, 'Wajib', 1, 'Ganjil', 4),
(3, '202103', 'Bahasa Indonesia', 2, 'Wajib', 1, 'Ganjil', 4),
(4, '202104', 'Manajeman Umum', 2, 'Wajib', 1, 'Ganjil', 4),
(5, '202105', 'Akuntansi Dasar', 2, 'Wajib', 1, 'Ganjil', 4),
(6, '202106', 'Bahasa Inggris 1', 2, 'Wajib', 1, 'Ganjil', 4),
(7, '202107', 'Algoritma dan Pemprogaman Terstruktur', 4, 'Wajib', 1, 'Ganjil', 4),
(8, '202108', 'Matematika', 2, 'Wajib', 1, 'Ganjil', 4),
(9, '202109', 'Pengenalan Sistem Informasi', 1, 'Wajib', 1, 'Ganjil', 4),
(10, '202110', 'Komunikasi Data dan Jaringan Komputer', 4, 'Wajib', 1, 'Ganjil', 4),
(11, '202111', 'Studi Islam 1', 1, 'Wajib', 2, 'Genap', 4),
(12, '202112', 'Kewarganegaraan', 2, 'Wajib', 2, 'Genap', 4),
(13, '202113', 'Bahasa Inggris  II', 2, 'Wajib', 2, 'Genap', 4),
(14, '202114', 'Statistik Dasar', 2, 'Wajib', 2, 'Genap', 4),
(15, '202115', 'Aplikasi Pemprograman I', 4, 'Wajib', 2, 'Genap', 4),
(16, '202116', 'Organisasi Komputer', 2, 'Wajib', 2, 'Genap', 4),
(17, '20217', 'Aljabar Linier', 2, 'Wajib', 2, 'Genap', 4),
(18, '202118', 'Sistem Informasi Manajemen', 2, 'Wajib', 2, 'Genap', 4),
(19, '202119', 'Sistem Basis Data', 3, 'Wajib', 2, 'Genap', 4),
(20, '202120', 'MYOB', 3, 'Wajib', 2, 'Genap', 4),
(21, '202121', 'Studi Kemuhammadiyahan II', 2, 'Wajib', 3, 'Ganjil', 4),
(22, '202122', 'Interaksi Manusia dan Komputer', 2, 'Wajib', 3, 'Ganjil', 4),
(23, '202123', 'Statistik Lanjut', 3, 'Wajib', 3, 'Ganjil', 4),
(24, '202124', 'Aplikasi Pemprograman II', 4, 'Wajib', 3, 'Ganjil', 4),
(25, '202125', 'Struktur Data', 4, 'Wajib', 3, 'Ganjil', 4),
(26, '202126', 'Sistem Berkas', 2, 'Wajib', 3, 'Ganjil', 4),
(27, '202127', 'Sistem Operasi', 3, 'Wajib', 3, 'Ganjil', 4),
(28, '202128', 'Analisa Design dan Sistem Informasi', 2, 'Wajib', 3, 'Ganjil', 4),
(29, '202129', 'Studi Islam II', 2, 'Wajib', 4, 'Genap', 4),
(30, '202130', 'Metodelogi Penelitian', 2, 'Wajib', 4, 'Genap', 4),
(31, '202131', 'Riset Operasi', 3, 'Wajib', 4, 'Genap', 4),
(32, '202132', 'Rekayasa Perangkat Lunak', 3, 'Wajib', 4, 'Genap', 4),
(33, '202133', 'E-Commerce', 4, 'Wajib', 4, 'Genap', 4),
(34, '202134', 'Pemprogaman Java', 4, 'Wajib', 4, 'Genap', 4),
(35, '202135', 'Pemprograman Berorientasi Objek', 4, 'Wajib', 5, 'Ganjil', 4),
(36, '202136', 'Pemprogaman Web', 4, 'Wajib', 5, 'Ganjil', 4),
(37, '202137', 'Praktek Kerja Lapangan', 4, 'Wajib', 5, 'Ganjil', 4),
(38, '202138', 'Kewirausahaan', 2, 'Wajib', 5, 'Ganjil', 4),
(39, '202139', 'Proyek Pemprograman', 4, 'Wajib', 5, 'Ganjil', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mhs`
--

CREATE TABLE `tbl_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama_mhs` varchar(255) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `password` varchar(125) DEFAULT NULL,
  `foto_mhs` varchar(125) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mhs`
--

INSERT INTO `tbl_mhs` (`id_mhs`, `nim`, `nama_mhs`, `id_prodi`, `password`, `foto_mhs`, `id_kelas`) VALUES
(1, '202103010008', 'Mahasiswa 1', 4, '12345', 'default.png', 1),
(2, '202103010009', 'Mahasiswa 2', 4, '12345', 'default.png', 1),
(4, '201903010007', 'Mahasiswa 4', 5, '12345', '1644673436_a6ba42020a740a8be9ae.png', NULL),
(5, '201903010006', 'Mahasiswa 5', 7, '12345', '1644673465_e67722547545863ca0ae.png', 2),
(6, '201903010005', 'Mahasiswa 6', 4, '12345', '1644673507_84094ec77a851cde8911.png', 1),
(7, '201903010004', 'Mahasiswa 7', 4, '12345', '1644673538_32d181bfea48f34b1d66.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `kd_prodi` varchar(20) DEFAULT NULL,
  `prodi` varchar(125) DEFAULT NULL,
  `jenjang` varchar(20) DEFAULT NULL,
  `ka_prodi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`id_prodi`, `id_fakultas`, `kd_prodi`, `prodi`, `jenjang`, `ka_prodi`) VALUES
(4, 2, 'MI', 'Manajemen Informatika', 'D3', 'Dosen 1'),
(5, 2, 'TO', 'Teknik Otomotif', 'D3', 'Dosen 2'),
(7, 2, 'TE', 'Elektronika', 'D3', 'Dosen 3'),
(8, 2, 'S1', 'Informatika', 'S1', 'Dosen 4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `id_gedung` int(11) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(1, 1, 'Lab Komputer'),
(2, 1, 'Ruang A'),
(3, 2, 'Ruang B'),
(4, 2, 'Ruang A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ta`
--

CREATE TABLE `tbl_ta` (
  `id_ta` int(11) NOT NULL,
  `ta` varchar(20) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ta`
--

INSERT INTO `tbl_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2020/2021', 'Ganjil', 0),
(2, '2020/2021', 'Genap', 0),
(3, '2022/2023', 'Genap', 0),
(6, '2022/2023', 'Ganjil', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'admin.png'),
(2, 'Mango User', 'user', '12345', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `tbl_makul`
--
ALTER TABLE `tbl_makul`
  ADD PRIMARY KEY (`id_makul`);

--
-- Indeks untuk tabel `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_fakultas`
--
ALTER TABLE `tbl_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tbl_makul`
--
ALTER TABLE `tbl_makul`
  MODIFY `id_makul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `tbl_mhs`
--
ALTER TABLE `tbl_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_ta`
--
ALTER TABLE `tbl_ta`
  MODIFY `id_ta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
