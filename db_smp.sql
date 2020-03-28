-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 05:51 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `status` enum('Aktif','Blokir') NOT NULL,
  `hak_akses` enum('admin','user','panitia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `username`, `password`, `telepon`, `foto`, `alamat`, `status`, `hak_akses`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '085326897470', 'author-4.jpg', 'Jakarta Raya', 'Aktif', 'admin'),
(2, 'panitia', 'panitia@gmail.com', 'panitia', 'd32b1673837a6a45f795c13ea67ec79e', '081234567', 'TerasTekno.png', 'Jakarta', 'Aktif', 'panitia');

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(3, 'Katolik'),
(4, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'PNS'),
(2, 'Dokter'),
(3, 'TNI/POLRI'),
(4, 'Buruh'),
(5, 'Karyawan Swasta'),
(6, 'Petani'),
(7, 'Nelayan'),
(8, 'Wiraswasta'),
(9, 'IRT');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `id_agama` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kk` varchar(50) NOT NULL,
  `ijazah` varchar(50) NOT NULL,
  `asal_sekolah` enum('SD','MI') NOT NULL,
  `nilai_sekolah` int(11) NOT NULL,
  `nilai_un` int(11) NOT NULL,
  `status` enum('Menunggu','Lulus','Tidak Lulus') NOT NULL,
  `kirim` enum('Tidak','Ya') NOT NULL,
  `tgl_daftar` date NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `id_agama`, `email`, `password`, `alamat`, `telepon`, `jenis_kelamin`, `foto`, `kk`, `ijazah`, `asal_sekolah`, `nilai_sekolah`, `nilai_un`, `status`, `kirim`, `tgl_daftar`, `keterangan`) VALUES
(26, 'Ucup', 'Banta', '2020-11-30', 1, 'ucup@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'Batam', '0876542345', 'Laki-laki', 'bjarne_stroustrup.jpg', 'Play-Regular.ttf', 'league_info.txt', 'MI', 60, 70, 'Tidak Lulus', 'Ya', '2020-02-06', 'data palsu'),
(40, 'Adhia Sasmita', 'PENEBAL', '1999-10-10', 4, 'user@gmail.com1', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(41, 'Afrianti Alyana', 'TAMERAN', '1999-10-11', 1, 'user@gmail.com2', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(42, 'Aina', 'TAMERAN', '1999-10-12', 4, 'user@gmail.com3', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA TAMERAN', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(43, 'Altia Miranda', 'TAMERAN', '1999-10-13', 1, 'user@gmail.com4', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN SIANDAL', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(44, 'Alyani', 'TAMERAN', '1999-10-14', 1, 'user@gmail.com5', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANTARA', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(45, 'Apriza Putri', 'PENEBAL', '1999-10-15', 4, 'user@gmail.com6', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(46, 'Asya Aulia Pebiyani', 'TAMERAN', '1999-10-16', 1, 'user@gmail.com7', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(47, 'Ayu Marina', 'PENEBAL', '1999-10-17', 4, 'user@gmail.com8', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(48, 'Bela Riska Haryanti', 'TAMERAN', '1999-10-18', 1, 'user@gmail.com9', 'ee11cbb19052e40b07aac0ca060c23ee', 'SEI GELAM', '85274079529', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(49, 'Cuime', 'TAMERAN', '1999-10-19', 4, 'user@gmail.com10', 'ee11cbb19052e40b07aac0ca060c23ee', 'TAMERAN', '82386066199', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(50, 'Desi', 'TAMERAN', '1999-10-20', 4, 'user@gmail.com11', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82386066199', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(51, 'Desma Normayanti', 'TAMERAN', '1999-10-21', 1, 'user@gmail.com12', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN SIANDAL', '82386066199', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(52, 'Desmawati', 'TAMERAN', '1999-10-22', 1, 'user@gmail.com13', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(53, 'Dewi Susanti', 'PENAMPI', '1999-10-23', 4, 'user@gmail.com14', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(54, 'Diancon', 'TAMERAN', '1999-10-24', 4, 'user@gmail.com15', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DAMAI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(55, 'Elvia Vionnylu', 'TAMERAN', '1999-10-25', 4, 'user@gmail.com16', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(56, 'Eni Aryanti', 'TAMERAN', '1999-10-26', 1, 'user@gmail.com17', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DAMAI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(57, 'Enjeli', 'TAMERAN', '1999-10-27', 1, 'user@gmail.com18', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(58, 'Erlinawati', 'PENEBAL', '1999-10-28', 4, 'user@gmail.com19', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANAK KEMBUNG', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(59, 'Erma Suci Amanda', 'PENEBAL', '1999-10-29', 1, 'user@gmail.com20', 'ee11cbb19052e40b07aac0ca060c23ee', 'SIMPANG MAHANG', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(60, 'Fahira', 'PENEBAL', '1999-10-30', 1, 'user@gmail.com21', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN SIMPANG MADI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(61, 'Febby Azharini', 'Tameran', '1999-10-31', 1, 'user@gmail.com22', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(62, 'Febriyani', 'PENAMPI', '1999-11-01', 4, 'user@gmail.com23', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(63, 'Fiona Fazira', 'Tameran', '1999-11-02', 1, 'user@gmail.com24', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Daud', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(64, 'Fitrah Ramadana', 'TAMERAN', '1999-11-03', 1, 'user@gmail.com25', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(65, 'Fitria Novita Sari', 'BATAM', '1999-11-04', 1, 'user@gmail.com26', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(66, 'Fitria Ramadani', 'TAMERAN', '1999-11-05', 1, 'user@gmail.com27', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(67, 'Gusmawati', 'PENEBAL', '1999-11-06', 1, 'user@gmail.com28', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(68, 'Gusti Sulastri', 'Ketamputih', '1999-11-07', 1, 'user@gmail.com29', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jl. Seliau', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(69, 'Gustilawati Ningsih', 'tanjung padang', '1999-11-08', 1, 'user@gmail.com30', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jl.Utama', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(70, 'Hindriyani', 'PENAMPI', '1999-11-09', 4, 'user@gmail.com31', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(71, 'Hopita', 'PENEBAL', '1999-11-10', 4, 'user@gmail.com32', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(72, 'Ika Rahmadia', 'TAMERAN', '1999-11-11', 1, 'user@gmail.com33', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(73, 'Ira Susana', 'TAMERAN', '1999-11-12', 1, 'user@gmail.com34', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA, TAMERAN', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(74, 'Iskandar', 'TAMERAN', '1999-11-13', 1, 'user@gmail.com35', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(75, 'Jina', 'TANJUNG PADANG', '1999-11-14', 1, 'user@gmail.com36', 'ee11cbb19052e40b07aac0ca060c23ee', 'SIANDAL', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(76, 'Juliana', 'TAMERAN', '1999-11-15', 1, 'user@gmail.com37', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA, TAMERAN', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(77, 'Juliana', 'TAMERAN', '1999-11-16', 1, 'user@gmail.com38', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(78, 'Kamisah', 'Tameran', '1999-11-17', 1, 'user@gmail.com39', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Daud', '85274076966', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(79, 'Karisma', 'PENEBAL', '1999-11-18', 1, 'user@gmail.com40', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(80, 'Laila Isma Agustina', 'PENEBAL', '1999-11-19', 1, 'user@gmail.com41', 'ee11cbb19052e40b07aac0ca060c23ee', 'PENEBAL TENGAH', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(81, 'Lala Suprianti', 'SUNGAI TENGGILING', '1999-11-20', 1, 'user@gmail.com42', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(82, 'Leni Sofianti', 'TAMERAN', '1999-11-21', 1, 'user@gmail.com43', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(83, 'Lilis Sasmita', 'TANJUNG PADANG', '1999-11-22', 1, 'user@gmail.com44', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANTARA', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(84, 'Maryati', 'TAMERAN', '1999-11-23', 1, 'user@gmail.com45', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(85, 'Maysya Aulia', 'TAMERAN', '1999-11-24', 1, 'user@gmail.com46', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(86, 'Mega Santika', 'TAMERAN', '1999-11-25', 1, 'user@gmail.com47', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(87, 'Meli', 'PENEBAL', '1999-11-26', 4, 'user@gmail.com48', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(88, 'Meli Safitri', 'TAMERAN', '1999-11-27', 1, 'user@gmail.com49', 'ee11cbb19052e40b07aac0ca060c23ee', 'SINDAL', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(89, 'Melyana', 'PENEBAL', '1999-11-28', 4, 'user@gmail.com50', 'ee11cbb19052e40b07aac0ca060c23ee', 'PENEBAL TENGAH', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(90, 'Mira', 'TAMERAN', '1999-11-29', 1, 'user@gmail.com51', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(91, 'Monika', 'TAMERAN', '1999-11-30', 4, 'user@gmail.com52', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(92, 'Muhira Rani', 'PENEBAL', '1999-12-01', 1, 'user@gmail.com53', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(93, 'Murni Nurzaleha', 'TAMERAN', '1999-12-02', 1, 'user@gmail.com54', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '82307978575', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(94, 'Mutia Putri', 'TAMERAN', '1999-12-03', 1, 'user@gmail.com55', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(95, 'Nabila', 'TAMERAN', '1999-12-04', 1, 'user@gmail.com56', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(96, 'Nadia', 'TAMERAN', '1999-12-05', 1, 'user@gmail.com57', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(97, 'Nadia Putri', 'BENGKALIS', '1999-12-06', 1, 'user@gmail.com58', 'ee11cbb19052e40b07aac0ca060c23ee', 'SIANDAL', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(98, 'Natasya', 'TAMERAN', '1999-12-07', 1, 'user@gmail.com59', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANTARA', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(99, 'Nelsih Sari', 'PENEBAL', '1999-12-08', 4, 'user@gmail.com60', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN PENEBAL TENGAH', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(100, 'Nika Adriani', 'TAMERAN', '1999-12-09', 1, 'user@gmail.com61', 'ee11cbb19052e40b07aac0ca060c23ee', 'SIANDAL', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(101, 'Nor Afida', 'PENEBAL', '1999-12-10', 1, 'user@gmail.com62', 'ee11cbb19052e40b07aac0ca060c23ee', 'PENEBAL', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(102, 'Nor Sapika', 'PENEBAL', '1999-12-11', 1, 'user@gmail.com63', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(103, 'Nor Sri Anisa', 'TAMERAN', '1999-12-12', 1, 'user@gmail.com64', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(104, 'Nur Amiza', 'TAMERAN', '1999-12-13', 1, 'user@gmail.com65', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(105, 'Nur Annisa Sufriani', 'TAMERAN', '1999-12-14', 1, 'user@gmail.com66', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '85272476213', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(106, 'Nur Elisa Putri', 'TAMERAN', '1999-12-15', 1, 'user@gmail.com67', 'ee11cbb19052e40b07aac0ca060c23ee', 'KEMPAS TINGGI', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(107, 'Nur Fatiha', 'Tameran', '1999-12-16', 1, 'user@gmail.com68', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(108, 'Nur Melfiyani', 'TAMERAN', '1999-12-17', 1, 'user@gmail.com69', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(109, 'Nurasiah', 'TAMERAN', '1999-12-18', 1, 'user@gmail.com70', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(110, 'Nurfatiha', 'penebal', '1999-12-19', 1, 'user@gmail.com71', 'ee11cbb19052e40b07aac0ca060c23ee', 'dusun penebal tengah', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(111, 'Nurul Asyifa', 'TAMERAN', '1999-12-20', 1, 'user@gmail.com72', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(112, 'Nurul Azzimah', 'PENEBAL', '1999-12-21', 1, 'user@gmail.com73', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN PENEBAL TENGAH', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(113, 'Nurul Hidayah', 'Tameran', '1999-12-22', 1, 'user@gmail.com74', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(114, 'Nurul Mawaddah', 'PENEBAL', '1999-12-23', 1, 'user@gmail.com75', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(115, 'Nurul Syafila', 'TAMERAN', '1999-12-24', 1, 'user@gmail.com76', 'ee11cbb19052e40b07aac0ca060c23ee', 'SUNGAI BERANG', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(116, 'Putri Alya Ramadhani', 'bengkalis', '1999-12-25', 1, 'user@gmail.com77', 'ee11cbb19052e40b07aac0ca060c23ee', 'dusun simpang mahang', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(117, 'Putri Ningsih', 'DAKAL', '1999-12-26', 1, 'user@gmail.com78', 'ee11cbb19052e40b07aac0ca060c23ee', 'PELABUHAN', '82266195056', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(118, 'Putri Syafrinda', 'TAMERAN', '1999-12-27', 1, 'user@gmail.com79', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(119, 'Putri Wahyuni', 'penebal', '1999-12-28', 1, 'user@gmail.com80', 'ee11cbb19052e40b07aac0ca060c23ee', 'dusun 01', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(120, 'Qurratu Syifa', 'TAMERAN', '1999-12-29', 1, 'user@gmail.com81', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(121, 'Rahmadani', 'TAMERAN', '1999-12-30', 1, 'user@gmail.com82', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(122, 'Restina zura', 'Tameran', '1999-12-31', 1, 'user@gmail.com83', 'ee11cbb19052e40b07aac0ca060c23ee', 'Jl.Utama desa damai', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(123, 'Rindiani', 'TAMERAN', '2000-01-01', 1, 'user@gmail.com84', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(124, 'Rini', 'PENAMPI', '2000-01-02', 4, 'user@gmail.com85', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(125, 'Riska Afriana', 'TAMERAN', '2000-01-03', 1, 'user@gmail.com86', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DAMAI GG. KESEHATAN', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(126, 'Risma Azizi Fitri', 'Tameran', '2000-01-04', 1, 'user@gmail.com87', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(127, 'Sandra Tiur Mauli', 'PENEBAL', '2000-01-05', 1, 'user@gmail.com88', 'ee11cbb19052e40b07aac0ca060c23ee', 'PENEBAL', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(128, 'Sarah Suhaila', 'TAMERAN', '2000-01-06', 1, 'user@gmail.com89', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DAMAI', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(129, 'Sazrina Sri Juniati', 'TAMERAN', '2000-01-07', 1, 'user@gmail.com90', 'ee11cbb19052e40b07aac0ca060c23ee', 'SEI BERANG', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(130, 'Selfia Maya Shofi', 'TAMERAN', '2000-01-08', 1, 'user@gmail.com91', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(131, 'Selvi', 'Dumai', '2000-01-09', 4, 'user@gmail.com92', 'ee11cbb19052e40b07aac0ca060c23ee', 'Tameran', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(132, 'Selviana Sari', 'TAMERAN', '2000-01-10', 1, 'user@gmail.com93', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '82383886104', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(133, 'Shinta', 'Penebal', '2000-01-11', 4, 'user@gmail.com94', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(134, 'Siti Intan Rahmawati', 'PENEBAL', '2000-01-12', 1, 'user@gmail.com95', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(135, 'Siti Maisarah', 'PENEBAL', '2000-01-13', 1, 'user@gmail.com96', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(136, 'Siti Murasih', 'TAMERAN', '2000-01-14', 1, 'user@gmail.com97', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(137, 'Siti Nurdiana', 'TAMERAN', '2000-01-15', 1, 'user@gmail.com98', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL. UTAMA DAMAI', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(138, 'Siti Payung', 'PENEBAL', '2000-01-16', 4, 'user@gmail.com99', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANAK KEMBUNG', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(139, 'Siti Salmah', 'PENEBAL', '2000-01-17', 1, 'user@gmail.com100', 'ee11cbb19052e40b07aac0ca060c23ee', 'DUSUN ANAK KEMBUNG', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(140, 'Siti Zulaika', 'TAMERAN', '2000-01-18', 1, 'user@gmail.com101', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANTARA', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(141, 'Sofia', 'TAMERAN', '2000-01-19', 1, 'user@gmail.com102', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(142, 'Sopiah', 'TAMERAN', '2000-01-20', 1, 'user@gmail.com103', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(143, 'Sri Mulyani', 'TAMERAN', '2000-01-21', 1, 'user@gmail.com104', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANTARA', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(144, 'Sri Sukma', 'TAMERAN', '2000-01-22', 1, 'user@gmail.com105', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA TAMERAN', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(145, 'Suci Mulyani', 'Tameran', '2000-01-23', 1, 'user@gmail.com106', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(146, 'Sumarni', 'TAMERAN', '2000-01-24', 1, 'user@gmail.com107', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(147, 'Sumiyati', 'TAMERAN', '2000-01-25', 1, 'user@gmail.com108', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL. KAMPUNG JAWA', '82285566853', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(148, 'Supianti', 'TAMERAN', '2000-01-26', 1, 'user@gmail.com109', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(149, 'Suri Wahyuni', 'PENEBAL', '2000-01-27', 1, 'user@gmail.com110', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA PENEBAL', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(150, 'Surinawati', 'TAMERAN', '2000-01-28', 1, 'user@gmail.com111', 'ee11cbb19052e40b07aac0ca060c23ee', 'SEI BERANG', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(151, 'Suryani', 'TAMERAN', '2000-01-29', 4, 'user@gmail.com112', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(152, 'Susan Wulandari', 'TAMERAN', '2000-01-30', 1, 'user@gmail.com113', 'ee11cbb19052e40b07aac0ca060c23ee', 'UTAMA', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(153, 'Susilawati', 'TAMERAN', '2000-01-31', 4, 'user@gmail.com114', 'ee11cbb19052e40b07aac0ca060c23ee', 'TAMERAN', '82174267600', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(154, 'Susirawati', 'TAMERAN', '2000-02-01', 1, 'user@gmail.com115', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA DESA DAMAI', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(155, 'Syafira', 'TAMERAN', '2000-02-02', 1, 'user@gmail.com116', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL UTAMA TAMERAN', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(156, 'Tiara Silvia', 'penebal', '2000-02-03', 1, 'user@gmail.com117', 'ee11cbb19052e40b07aac0ca060c23ee', 'dusun simpang mahang', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(157, 'Veronika', 'Tameran', '2000-02-04', 4, 'user@gmail.com118', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(158, 'Wina Trisdayani', 'PENAMPI', '2000-02-05', 4, 'user@gmail.com119', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA, DUSUN KELEBUK', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(159, 'Windy Putri Wahyuni', 'PENEBAL', '2000-02-06', 1, 'user@gmail.com120', 'ee11cbb19052e40b07aac0ca060c23ee', 'SIMPANG MAHANG', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(160, 'Wiwi Trisdayani', 'PENAMPI', '2000-02-07', 4, 'user@gmail.com121', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL.UTAMA', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 60, 70, '', '', '2020-02-15', ''),
(161, 'Yulia Rohani', 'PENEBAL', '2000-02-08', 1, 'user@gmail.com122', 'ee11cbb19052e40b07aac0ca060c23ee', 'ANAK KEMBUNG', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(162, 'Zielda Indriany', 'TAMERAN', '2000-02-09', 1, 'user@gmail.com123', 'ee11cbb19052e40b07aac0ca060c23ee', 'JL. UTAMA DAMAI', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(163, 'Zuraida', 'Tameran', '2000-02-10', 1, 'user@gmail.com124', 'ee11cbb19052e40b07aac0ca060c23ee', 'Sungai Berang', '85321748351', 'Perempuan', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'MI', 60, 70, '', '', '2020-02-15', ''),
(164, 'Budi Santoso', 'Bengkali', '2000-02-11', 1, 'budisantoso@gmail.com', 'bcd724d15cde8c47650fda962968f102', 'Jl. Pembangunan', '82312334511', 'Laki-laki', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 78, 80, '', '', '2020-02-15', ''),
(165, 'Arya Hidayat', 'Bengkalis', '2000-02-12', 1, 'aryahidayat@gmail.com', 'bcd724d15cde8c47650fda962968f102', 'Jl. Antara', '81323123345', 'Laki-laki', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 75, 79, '', '', '2020-02-15', ''),
(166, 'Agus Rahman', 'Bengkalis', '2000-02-13', 1, 'agusrahman@gmail.com', 'bcd724d15cde8c47650fda962968f102', 'Jl. Bantan', '82134561234', 'Laki-laki', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 80, 86, '', '', '2020-02-15', ''),
(167, 'Robert Bagus', 'Bengkalis', '2000-02-14', 2, 'robertbagus@gmail.com', 'bcd724d15cde8c47650fda962968f102', 'Jl. Ahmad Yani', '81133425694', 'Laki-laki', 'siswa.jpeg', 'kk.jpg', 'ijazah.jpg', 'SD', 88, 90, 'Lulus', 'Ya', '2020-02-15', 'Selamat!');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `id_kerja_ayah` int(11) NOT NULL,
  `id_kerja_ibu` int(11) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tempat_lahir_ayah` varchar(50) NOT NULL,
  `tempat_lahir_ibu` varchar(50) NOT NULL,
  `tgl_lahir_ayah` date NOT NULL,
  `tgl_lahir_ibu` date NOT NULL,
  `telepon_ayah` varchar(15) NOT NULL,
  `telepon_ibu` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id_wali`, `id_siswa`, `nama_ayah`, `nama_ibu`, `id_kerja_ayah`, `id_kerja_ibu`, `alamat`, `tempat_lahir_ayah`, `tempat_lahir_ibu`, `tgl_lahir_ayah`, `tgl_lahir_ibu`, `telepon_ayah`, `telepon_ibu`) VALUES
(6, 26, 'boy', 'ayu', 3, 2, 'Batam', 'Jakarta', 'Bandung', '2020-02-04', '2020-02-06', '0876534', '8345655'),
(40, 40, 'A KENG', 'SUPATMI', 8, 8, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-10-10', '1989-10-10', '085274079529', '085274079529'),
(41, 41, 'WISNU WARDANA', 'HERLINAWATI', 8, 9, 'UTAMA', 'TAMERAN', 'TAMERAN', '1989-10-11', '1989-10-11', '085274079529', '085274079529'),
(42, 42, 'AHAI', 'RINA', 4, 9, 'UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-10-12', '1989-10-12', '085274079529', '085274079529'),
(43, 43, 'SYAFRIZAL', 'IRA YUNITA', 4, 9, 'DUSUN SIANDAL', 'TAMERAN', 'TAMERAN', '1989-10-13', '1989-10-13', '085274079529', '085274079529'),
(44, 44, 'DEDY IRAWAN', 'RAHAYU', 4, 9, 'ANTARA', 'TAMERAN', 'TAMERAN', '1989-10-14', '1989-10-14', '085274079529', '085274079529'),
(45, 45, 'KIMLING', 'LENI', 4, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1989-10-15', '1989-10-15', '085274079529', '085274079529'),
(46, 46, 'AMRAN', 'JUMIYATEN', 4, 6, 'UTAMA', 'TAMERAN', 'TAMERAN', '1989-10-16', '1989-10-16', '085274079529', '085274079529'),
(47, 47, 'AGUAN', 'JUMIYATEN', 4, 6, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-10-17', '1989-10-17', '085274079529', '085274079529'),
(48, 48, 'ABD. ARIS', 'JULINAR', 4, 9, 'SEI GELAM', 'TAMERAN', 'TAMERAN', '1989-10-18', '1989-10-18', '085274079529', '085274079529'),
(49, 49, 'ASAM', 'ROYANI', 7, 6, 'TAMERAN', 'TAMERAN', 'TAMERAN', '1989-10-19', '1989-10-19', '082386066199', '082386066199'),
(50, 50, 'ACAI', 'ANI', 4, 9, 'Sungai Berang', 'TAMERAN', 'TAMERAN', '1989-10-20', '1989-10-20', '082386066199', '082386066199'),
(51, 51, 'NORMAN', 'KARMILA HARYANTI', 5, 9, 'DUSUN SIANDAL', 'TAMERAN', 'TAMERAN', '1989-10-21', '1989-10-21', '082386066199', '082386066199'),
(52, 52, 'KEFRI', 'SUKARNI', 8, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-10-22', '1989-10-22', '085274076966', '085274076966'),
(53, 53, 'ATAN ALS ATONG', 'ANI', 6, 9, 'UTAMA', 'PENAMPI', 'PENAMPI', '1989-10-23', '1989-10-23', '085274076966', '085274076966'),
(54, 54, 'KEKDENG', 'CUM', 2, 9, 'JL.UTAMA DAMAI', 'TAMERAN', 'TAMERAN', '1989-10-24', '1989-10-24', '085274076966', '085274076966'),
(55, 55, 'JONNY', 'ENGDIANTI', 6, 6, 'UTAMA', 'TAMERAN', 'TAMERAN', '1989-10-25', '1989-10-25', '085274076966', '085274076966'),
(56, 56, 'AMTAR', 'ASIAH', 5, 9, 'JL.UTAMA DAMAI', 'TAMERAN', 'TAMERAN', '1989-10-26', '1989-10-26', '085274076966', '085274076966'),
(57, 57, 'ZULKARNAIN', 'ASSUHARNI', 6, 1, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-10-27', '1989-10-27', '085274076966', '085274076966'),
(58, 58, 'SERIANTO', 'AYAN', 4, 9, 'ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-10-28', '1989-10-28', '085274076966', '085274076966'),
(59, 59, 'ABDUL KADIR', 'ILAWATI', 7, 9, 'SIMPANG MAHANG', 'PENEBAL', 'PENEBAL', '1989-10-29', '1989-10-29', '085274076966', '085274076966'),
(60, 60, 'NASRUN', 'JUNAIDA', 8, 8, 'DUSUN SIMPANG MADI', 'PENEBAL', 'PENEBAL', '1989-10-30', '1989-10-30', '085274076966', '085274076966'),
(61, 61, 'ZAHARI', 'AMTINI', 4, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1989-10-31', '1989-10-31', '085274076966', '085274076966'),
(62, 62, 'ASUAT', 'AHON', 7, 9, 'UTAMA', 'PENAMPI', 'PENAMPI', '1989-11-01', '1989-11-01', '085274076966', '085274076966'),
(63, 63, 'EFENDI', 'SARINA', 4, 9, 'Sungai Daud', 'Tameran', 'Tameran', '1989-11-02', '1989-11-02', '085274076966', '085274076966'),
(64, 64, 'ARIFIN', 'ISNAWATI', 4, 6, 'Sungai Berang', 'TAMERAN', 'TAMERAN', '1989-11-03', '1989-11-03', '085274076966', '085274076966'),
(65, 65, 'MUH ROSYID', 'SITI NURLINA', 8, 9, 'JL.UTAMA PENEBAL', 'BATAM', 'BATAM', '1989-11-04', '1989-11-04', '085274076966', '085274076966'),
(66, 66, 'NIZAMI', 'RINDA MIYATI', 8, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1989-11-05', '1989-11-05', '085274076966', '085274076966'),
(67, 67, 'ILYAS', 'MARLINA', 7, 6, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-11-06', '1989-11-06', '085274076966', '085274076966'),
(68, 68, 'Hasan. R', 'Sartini', 4, 9, 'Jl. Seliau', 'Ketamputih', 'Ketamputih', '1989-11-07', '1989-11-07', '085274076966', '085274076966'),
(69, 69, 'zulkifli', 'maryati', 8, 9, 'Jl.Utama', 'tanjung padang', 'tanjung padang', '1989-11-08', '1989-11-08', '085274076966', '085274076966'),
(70, 70, 'YOSEF', 'FATIMAH', 7, 9, 'JL.UTAMA', 'PENAMPI', 'PENAMPI', '1989-11-09', '1989-11-09', '085274076966', '085274076966'),
(71, 71, 'OBEE', 'NIYU', 4, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1989-11-10', '1989-11-10', '085274076966', '085274076966'),
(72, 72, 'KATWADI', 'ERDAWATI', 6, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1989-11-11', '1989-11-11', '085274076966', '085274076966'),
(73, 73, 'AMIRUDIN', 'TUMINAH', 8, 9, 'UTAMA, TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-12', '1989-11-12', '085274076966', '085274076966'),
(74, 74, 'RUSLAN', 'AZIAN LINAWATI', 8, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-13', '1989-11-13', '085274076966', '085274076966'),
(75, 75, 'JARMADI', 'SAEMAH', 2, 6, 'SIANDAL', 'TANJUNG PADANG', 'TANJUNG PADANG', '1989-11-14', '1989-11-14', '085274076966', '085274076966'),
(76, 76, 'RUSDI', 'MARLINA', 4, 9, 'UTAMA, TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-15', '1989-11-15', '085274076966', '085274076966'),
(77, 77, 'BUKHARI', 'AISYAH', 6, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1989-11-16', '1989-11-16', '085274076966', '085274076966'),
(78, 78, 'HENDRI', 'AMRINA', 8, 9, 'Sungai Daud', 'Tameran', 'Tameran', '1989-11-17', '1989-11-17', '085274076966', '085274076966'),
(79, 79, 'AHMAD', 'DIANA', 4, 6, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-11-18', '1989-11-18', '082307978575', '082307978575'),
(80, 80, 'A.MANAP', 'SITI FATIMAH', 4, 9, 'PENEBAL TENGAH', 'PENEBAL', 'PENEBAL', '1989-11-19', '1989-11-19', '082307978575', '082307978575'),
(81, 81, 'MAHADAR', 'SUKARSIH', 5, 9, 'JL.UTAMA DESA DAMAI', 'SUNGAI TENGGILING', 'SUNGAI TENGGILING', '1989-11-20', '1989-11-20', '082307978575', '082307978575'),
(82, 82, 'MUSA', 'NUR LELAWATI', 7, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-21', '1989-11-21', '082307978575', '082307978575'),
(83, 83, 'ZAMRI', 'MARYANI', 4, 9, 'ANTARA', 'TANJUNG PADANG', 'TANJUNG PADANG', '1989-11-22', '1989-11-22', '082307978575', '082307978575'),
(84, 84, 'IDRIS', 'ERDAWATI', 5, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1989-11-23', '1989-11-23', '082307978575', '082307978575'),
(85, 85, 'M.SYARIF', 'JULIANA', 2, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-24', '1989-11-24', '082307978575', '082307978575'),
(86, 86, 'ZAINURIS', 'FALIMAH', 6, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-25', '1989-11-25', '082307978575', '082307978575'),
(87, 87, 'BONG ALWI', 'ALEE', 4, 6, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1989-11-26', '1989-11-26', '082307978575', '082307978575'),
(88, 88, 'EKO SUBIONO', 'JULIANA', 8, 9, 'SINDAL', 'TAMERAN', 'TAMERAN', '1989-11-27', '1989-11-27', '082307978575', '082307978575'),
(89, 89, 'HARTONO', 'ERNA', 8, 9, 'PENEBAL TENGAH', 'PENEBAL', 'PENEBAL', '1989-11-28', '1989-11-28', '082307978575', '082307978575'),
(90, 90, 'ANDAI', 'ASUAN', 6, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-29', '1989-11-29', '082307978575', '082307978575'),
(91, 91, 'BASIR', 'ANI', 2, 0, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1989-11-30', '1989-11-30', '082307978575', '082307978575'),
(92, 92, 'ZULMAINI', 'ASMAH', 6, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1989-12-01', '1989-12-01', '082307978575', '082307978575'),
(93, 93, 'IZHAR', 'SURYATI', 5, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1979-12-02', '1979-12-02', '082307978575', '082307978575'),
(94, 94, 'MUKHTAR', 'NURBAITI', 6, 9, 'UTAMA', 'TAMERAN', 'TAMERAN', '1979-12-03', '1979-12-03', '085272476213', '085272476213'),
(95, 95, 'KHAIDIR', 'NURAINI', 4, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-04', '1979-12-04', '085272476213', '085272476213'),
(96, 96, 'IZHAR', 'SRI LUSNI', 4, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1979-12-05', '1979-12-05', '085272476213', '085272476213'),
(97, 97, 'MUZIR', 'SURYA NINGSIH', 2, 9, 'SIANDAL', 'BENGKALIS', 'BENGKALIS', '1979-12-06', '1979-12-06', '085272476213', '085272476213'),
(98, 98, 'SYAMRI HUSIN', 'MAZNAH', 6, 6, 'ANTARA', 'TAMERAN', 'TAMERAN', '1979-12-07', '1979-12-07', '085272476213', '085272476213'),
(99, 99, 'HARTONO', 'ERNA', 8, 6, 'DUSUN PENEBAL TENGAH', 'PENEBAL', 'PENEBAL', '1979-12-08', '1979-12-08', '085272476213', '085272476213'),
(100, 100, 'BENI HAMDANI', 'RUSLAINI', 8, 9, 'SIANDAL', 'TAMERAN', 'TAMERAN', '1979-12-09', '1979-12-09', '085272476213', '085272476213'),
(101, 101, 'BACHTIAR', 'ATIK', 8, 9, 'PENEBAL', 'PENEBAL', 'PENEBAL', '1979-12-10', '1979-12-10', '085272476213', '085272476213'),
(102, 102, 'AGUSSALIM', 'FAUZIAH', 7, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1979-12-11', '1979-12-11', '085272476213', '085272476213'),
(103, 103, 'SARTONO', 'ASTUTI', 7, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1979-12-12', '1979-12-12', '085272476213', '085272476213'),
(104, 104, 'AMIN', 'ERAH', 4, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1979-12-13', '1979-12-13', '085272476213', '085272476213'),
(105, 105, 'SYAFRI', 'ROHANI', 5, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-14', '1979-12-14', '085272476213', '085272476213'),
(106, 106, 'JEFRIDEN', 'ZALEHA', 8, 9, 'KEMPAS TINGGI', 'TAMERAN', 'TAMERAN', '1979-12-15', '1979-12-15', '082266195056', '082266195056'),
(107, 107, 'SUKARTO', 'SARIAH', 5, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1979-12-16', '1979-12-16', '082266195056', '082266195056'),
(108, 108, 'AHMAD ZAKI', 'SANAWATI', 4, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-17', '1979-12-17', '082266195056', '082266195056'),
(109, 109, 'AHMAD', 'RATINEM', 4, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-18', '1979-12-18', '082266195056', '082266195056'),
(110, 110, 'pahrul', 'sunarti', 8, 9, 'dusun penebal tengah', 'penebal', 'penebal', '1979-12-19', '1979-12-19', '082266195056', '082266195056'),
(111, 111, 'SARUAN', 'JULAIDA', 2, 9, 'Sungai Berang', 'TAMERAN', 'TAMERAN', '1979-12-20', '1979-12-20', '082266195056', '082266195056'),
(112, 112, 'M. DAUD', 'AYANG', 8, 6, 'DUSUN PENEBAL TENGAH', 'PENEBAL', 'PENEBAL', '1979-12-21', '1979-12-21', '082266195056', '082266195056'),
(113, 113, 'ZAKARIA', 'LINDAWATI', 7, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1979-12-22', '1979-12-22', '082266195056', '082266195056'),
(114, 114, 'M.MUSRIN', 'FATIMAH', 6, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1979-12-23', '1979-12-23', '082266195056', '082266195056'),
(115, 115, 'SYAFE\'I', 'MARYAM', 2, 6, 'SUNGAI BERANG', 'TAMERAN', 'TAMERAN', '1979-12-24', '1979-12-24', '082266195056', '082266195056'),
(116, 116, 'ahmadi', 'sri listari', 6, 9, 'dusun simpang mahang', 'bengkalis', 'bengkalis', '1979-12-25', '1979-12-25', '082266195056', '082266195056'),
(117, 117, 'TAMBUN', 'ALINA', 4, 9, 'PELABUHAN', 'DAKAL', 'DAKAL', '1979-12-26', '1979-12-26', '082266195056', '082266195056'),
(118, 118, 'ABDULLAH', 'MARYANI', 4, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-27', '1979-12-27', '082383886104', '082383886104'),
(119, 119, 'ramli', 'nurhayati', 4, 9, 'dusun 01', 'penebal', 'penebal', '1979-12-28', '1979-12-28', '082383886104', '082383886104'),
(120, 120, 'EMI SYAFRUDDIN', 'MIFTAHUL JANNAH', 2, 1, 'UTAMA', 'TAMERAN', 'TAMERAN', '1979-12-29', '1979-12-29', '082383886104', '082383886104'),
(121, 121, 'BUKHARI', 'SURYATI', 4, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1979-12-30', '1979-12-30', '082383886104', '082383886104'),
(122, 122, 'BUKHARI', 'Nora', 0, 0, 'Jl.Utama desa damai', 'Tameran', 'Tameran', '1979-12-31', '1979-12-31', '082383886104', '082383886104'),
(123, 123, 'ZAINAL ABIDIN', 'KAMALIA', 5, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-01', '1980-01-01', '082383886104', '082383886104'),
(124, 124, 'HASING', 'ANA', 4, 9, 'JL.UTAMA', 'PENAMPI', 'PENAMPI', '1980-01-02', '1980-01-02', '082383886104', '082383886104'),
(125, 125, 'RUSLAN', 'MISMIATI', 4, 9, 'JL.UTAMA DAMAI GG. KESEHATAN', 'TAMERAN', 'TAMERAN', '1980-01-03', '1980-01-03', '082383886104', '082383886104'),
(126, 126, 'RUSLAN', 'AZIAN LINAWATI', 5, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1980-01-04', '1980-01-04', '082383886104', '082383886104'),
(127, 127, 'SABARUDDIN', 'NURSAH', 6, 6, 'PENEBAL', 'PENEBAL', 'PENEBAL', '1980-01-05', '1980-01-05', '082383886104', '082383886104'),
(128, 128, 'RAMLI', 'ARBAIYAH', 4, 9, 'JL.UTAMA DAMAI', 'TAMERAN', 'TAMERAN', '1980-01-06', '1980-01-06', '082383886104', '082383886104'),
(129, 129, 'ZULKIFLI', 'SITI NURBAYA', 6, 9, 'SEI BERANG', 'TAMERAN', 'TAMERAN', '1980-01-07', '1980-01-07', '082383886104', '082383886104'),
(130, 130, 'NIZAMI', 'RINDA MIYANTI', 8, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-08', '1980-01-08', '082383886104', '082383886104'),
(131, 131, 'A CUAN', 'ACIAN', 8, 8, 'Tameran', 'Dumai', 'Dumai', '1980-01-09', '1980-01-09', '082383886104', '082383886104'),
(132, 132, 'SUPRIADI', 'SABRINA', 8, 6, 'UTAMA', 'TAMERAN', 'TAMERAN', '1980-01-10', '1980-01-10', '082383886104', '082383886104'),
(133, 133, 'WIDI', 'ASUAN', 5, 9, 'Sungai Berang', 'Penebal', 'Penebal', '1980-01-11', '1980-01-11', '082285566853', '082285566853'),
(134, 134, 'BUDI RAHMAN', 'MISWARTI', 8, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1980-01-12', '1980-01-12', '082285566853', '082285566853'),
(135, 135, 'AMAT', 'MARYANI', 6, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1980-01-13', '1980-01-13', '082285566853', '082285566853'),
(136, 136, 'MUJIONO', 'ROHAYU', 6, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-14', '1980-01-14', '082285566853', '082285566853'),
(137, 137, 'BUKHARI', 'FARIDAWATI', 4, 9, 'JL. UTAMA DAMAI', 'TAMERAN', 'TAMERAN', '1980-01-15', '1980-01-15', '082285566853', '082285566853'),
(138, 138, 'TEENG', 'SINAH', 7, 9, 'ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1980-01-16', '1980-01-16', '082285566853', '082285566853'),
(139, 139, 'AMAT', 'MARYANI', 6, 6, 'DUSUN ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1980-01-17', '1980-01-17', '082285566853', '082285566853'),
(140, 140, 'ZULKIFLI', 'ROBIAH', 7, 6, 'ANTARA', 'TAMERAN', 'TAMERAN', '1980-01-18', '1980-01-18', '082285566853', '082285566853'),
(141, 141, 'JONI HENDRI', 'JULIANA', 5, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-19', '1980-01-19', '082285566853', '082285566853'),
(142, 142, 'AZMAN', 'HAMIDAH', 5, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-20', '1980-01-20', '082285566853', '082285566853'),
(143, 143, 'AZMAN', 'HAMIDAH', 4, 9, 'ANTARA', 'TAMERAN', 'TAMERAN', '1980-01-21', '1980-01-21', '082285566853', '082285566853'),
(144, 144, 'SALEH', 'NORMALA', 6, 9, 'JL.UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-22', '1980-01-22', '082285566853', '082285566853'),
(145, 145, 'SULAIMAN', 'MISUWARNI', 6, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1980-01-23', '1980-01-23', '082285566853', '082285566853'),
(146, 146, 'ROZALI', 'JULIANA', 6, 2, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1980-01-24', '1980-01-24', '082285566853', '082285566853'),
(147, 147, 'HERIYANTO', 'NENENG', 4, 6, 'JL. KAMPUNG JAWA', 'TAMERAN', 'TAMERAN', '1980-01-25', '1980-01-25', '082285566853', '082285566853'),
(148, 148, 'WAGIMAN ( ALM )', 'JAMILAH', 2, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-26', '1980-01-26', '082174267600', '082174267600'),
(149, 149, 'M.BASRI', 'MISRATEN', 6, 9, 'JL.UTAMA PENEBAL', 'PENEBAL', 'PENEBAL', '1980-01-27', '1980-01-27', '082174267600', '082174267600'),
(150, 150, 'KEFRI', 'SUKARNI', 8, 9, 'SEI BERANG', 'TAMERAN', 'TAMERAN', '1980-01-28', '1980-01-28', '082174267600', '082174267600'),
(151, 151, 'ASE', 'PUYONG', 4, 6, 'UTAMA', 'TAMERAN', 'TAMERAN', '1980-01-29', '1980-01-29', '082174267600', '082174267600'),
(152, 152, 'KHAIDIR', 'ANITA', 4, 9, 'UTAMA', 'TAMERAN', 'TAMERAN', '1980-01-30', '1980-01-30', '082174267600', '082174267600'),
(153, 153, 'AKUN', 'ALING', 6, 6, 'TAMERAN', 'TAMERAN', 'TAMERAN', '1980-01-31', '1980-01-31', '082174267600', '082174267600'),
(154, 154, 'ISNIN', 'KAMISAH', 0, 9, 'JL.UTAMA DESA DAMAI', 'TAMERAN', 'TAMERAN', '1980-02-01', '1980-02-01', '085321748351', '085321748351'),
(155, 155, 'SYAFRI', 'RITA', 4, 9, 'JL UTAMA TAMERAN', 'TAMERAN', 'TAMERAN', '1980-02-02', '1980-02-02', '085321748351', '085321748351'),
(156, 156, 'lalu jumawan ningrat', 'wiwin sunarsih', 8, 9, 'dusun simpang mahang', 'penebal', 'penebal', '1980-02-03', '1980-02-03', '085321748351', '085321748351'),
(157, 157, 'WIRA', 'AMAN', 6, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1980-02-04', '1980-02-04', '085321748351', '085321748351'),
(158, 158, 'DIO PENDEKRI', 'YANTI', 8, 9, 'JL.UTAMA, DUSUN KELEBUK', 'PENAMPI', 'PENAMPI', '1980-02-05', '1980-02-05', '085321748351', '085321748351'),
(159, 159, 'NUR WAHID', 'NONA SILA', 8, 9, 'SIMPANG MAHANG', 'PENEBAL', 'PENEBAL', '1980-02-06', '1980-02-06', '085321748351', '085321748351'),
(160, 160, 'DIO PENDIKRI', 'YANTI', 2, 9, 'JL.UTAMA', 'PENAMPI', 'PENAMPI', '1980-02-07', '1980-02-07', '085321748351', '085321748351'),
(161, 161, 'NURDIN', 'ROSMAINI LUBIS', 6, 9, 'ANAK KEMBUNG', 'PENEBAL', 'PENEBAL', '1980-02-08', '1980-02-08', '085321748351', '085321748351'),
(162, 162, 'ZAMZAMI', 'HERNA', 1, 9, 'JL. UTAMA DAMAI', 'TAMERAN', 'TAMERAN', '1980-02-09', '1980-02-09', '085321748351', '085321748351'),
(163, 163, 'ZAKARIA', 'LINDAWATI', 7, 9, 'Sungai Berang', 'Tameran', 'Tameran', '1980-02-10', '1980-02-10', '085321748351', '085321748351'),
(164, 164, 'Santoso', 'Sinta', 6, 9, 'Jl. Pramuka', 'Bantan', 'Batam', '1980-02-19', '1980-02-19', '081123114512', '081123114512'),
(165, 165, 'Bagas', 'Ayu', 2, 9, 'Jl. Pramuka', 'Bengkalis', 'Jakarta', '1989-10-10', '1989-10-10', '081231233155', '081231233155'),
(166, 166, 'Rahmad', 'Rita', 8, 9, 'Jl. Bantan', 'Pekanbaru', 'Batam', '1989-11-11', '1989-11-11', '082234112311', '082234112311'),
(167, 167, 'Randy', 'Jessica', 5, 9, 'Jl. Antara', 'Bandung', 'Jakarta', '1988-11-10', '1988-11-10', '089912123411', '089912123411');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
