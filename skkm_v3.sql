-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Apr 2016 pada 18.56
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skkm_v3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `deskripsi`
--

CREATE TABLE IF NOT EXISTS `deskripsi` (
`id` int(11) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `lokasi_kegiatan` varchar(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `des_create` datetime DEFAULT NULL,
  `des_modify` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deskripsi`
--

INSERT INTO `deskripsi` (`id`, `nama_kegiatan`, `deskripsi`, `lokasi_kegiatan`, `tanggal_mulai`, `tanggal_akhir`, `des_create`, `des_modify`) VALUES
(1, 'Himpunan Mahasiswa Teknik Informatika', 'Kabinet Garuda Periode 2016', 'PENS', '2016-01-01', '2016-12-31', '2016-01-20 20:38:13', '2016-01-21 20:34:45'),
(2, 'Taekwondo', 'ghap', 'PENS', '2016-01-01', '2016-01-29', '2016-01-21 11:51:29', NULL),
(3, 'Himpunan Mahasiswa Teknik Informatika', 'natasya Adela', 'f', '2016-03-12', '2016-03-25', '2016-03-23 20:08:30', '2016-03-26 16:35:58'),
(4, 'Taekwondo', 'f', 'PENS', '2016-03-18', '2016-03-27', '2016-03-26 19:24:06', NULL),
(5, 'Enumeration', 'GOOD', 'PENS', '2016-03-19', '2016-03-19', '2016-03-27 21:13:10', NULL),
(6, 'Himpunan Mahasiswa Teknik Informatika', 'fsffs', 'afdf', '2016-03-19', '2016-03-13', '2016-03-29 17:02:18', NULL),
(7, 'Orientasi Mahasiswa Baru 1', '2014/2015', 'PENS', '2016-03-13', '2016-03-26', '2016-03-30 18:27:52', NULL),
(8, 'Upacara ', 'merdeka', 'PENS', '2016-08-17', '2016-08-17', '2016-04-01 16:59:45', NULL),
(9, 'Himpunan Mahasiswa Teknik Elektronika', 'PA', 'PENS', '2016-04-21', '2016-04-22', '2016-04-04 13:13:19', '2016-04-04 13:13:37'),
(10, 'JRC', 'ELKA', 'PENS', '2016-04-22', '2016-04-22', '2016-04-04 13:25:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE IF NOT EXISTS `hak_akses` (
`id` int(11) NOT NULL,
  `kode_akses` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `waktu_create` datetime NOT NULL,
  `waktu_modify` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `kode_akses`, `email`, `waktu_create`, `waktu_modify`) VALUES
(1, 1, 'admin@pens.ac.id', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'rama@pens.ac.id', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 'ramasatriafb@it.student.pens.ac.id', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'natasyadela@pens.ac.id', '0000-00-00 00:00:00', '2016-04-03 21:06:49'),
(7, 1, 'natasyadela@pens.ac.id', '2016-04-03 21:27:58', '2016-04-03 21:31:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
`id` int(11) NOT NULL,
  `nama` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `nama`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
`id` int(11) NOT NULL,
  `departemen_id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alias` varchar(50) NOT NULL,
  `inggris` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `departemen_id`, `nama`, `alias`, `inggris`) VALUES
(1, 1, 'Elektronika', 'Elka', 'Electronics Engineering'),
(2, 1, 'Telekomunikasi', 'Telkom', 'Telecomunication Engineering'),
(3, 1, 'Elektro Industri', 'Elin', 'Electro Industry Engineering'),
(4, 2, 'Teknik Informatika', 'IT', 'Informatics Engineering'),
(5, 3, 'Teknik Mekatronik', 'MK', 'Mechatronics Engineering'),
(6, 2, 'Teknik Komputer', 'TK', 'Computer Engineering'),
(7, 4, 'Multimedia Broadcasting', 'MM', 'Technology Multimedia Broadcasting'),
(8, 3, 'Sistem Pembangkitan Energi', 'SPE', 'Energy Generation System'),
(9, 4, 'Teknologi Game', 'Game', 'Game Technology');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `kegiatan_mahasiswa` (
`id` int(11) NOT NULL,
  `id_poin_kegiatan` int(11) DEFAULT NULL,
  `id_deskripsi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bukti` varchar(100) DEFAULT NULL,
  `validasi` varchar(20) DEFAULT NULL,
  `kegiatan_create` datetime DEFAULT NULL,
  `kegiatan_modify` datetime DEFAULT NULL,
  `waktu_validasi_mahasiswa` datetime NOT NULL,
  `waktu_validasi_admin` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan_mahasiswa`
--

INSERT INTO `kegiatan_mahasiswa` (`id`, `id_poin_kegiatan`, `id_deskripsi`, `id_user`, `bukti`, `validasi`, `kegiatan_create`, `kegiatan_modify`, `waktu_validasi_mahasiswa`, `waktu_validasi_admin`) VALUES
(8, 2, 1, 2103131035, NULL, NULL, '2016-01-21 20:48:29', '2016-01-21 21:32:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 1, 2103131058, '/sim_skkm/uploads/10.png', 'Tervalidasi', '2016-01-26 09:31:43', NULL, '2016-04-02 16:14:26', '2016-04-04 13:27:52'),
(11, 4, 2, 2103131058, NULL, NULL, '2016-01-26 09:31:59', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 3, 3, 2103131035, NULL, NULL, '2016-03-27 17:29:21', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 3, 3, 2103131058, '/sim_skkm/uploads/131.png', 'Tervalidasi', '2016-03-27 17:29:21', NULL, '2016-04-02 16:12:05', '2016-04-01 23:17:14'),
(14, 7, 4, 2103131047, NULL, NULL, '2016-03-27 17:51:18', NULL, '2016-03-31 20:51:16', '0000-00-00 00:00:00'),
(16, 5, 4, 2103131047, NULL, NULL, '2016-03-27 21:25:14', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 1, 6, 2103131035, '/sim_skkm/uploads/17.pdf', 'Tervalidasi', '2016-03-29 17:03:17', NULL, '2016-04-03 20:55:59', '2016-04-03 20:56:29'),
(18, 1, 6, 2103131047, '/sim_skkm/uploads/18.png', 'Tervalidasi', '2016-03-29 17:03:17', NULL, '2016-04-01 13:35:16', '2016-04-01 13:35:44'),
(19, 12, 8, 2103131035, '/sim_skkm/uploads/19.jpg', 'Tervalidasi', '2016-04-01 17:00:46', NULL, '2016-04-01 17:02:42', '2016-04-01 17:03:24'),
(20, 13, 9, 2103131035, NULL, NULL, '2016-04-04 13:14:48', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 13, 9, 2103131058, '/sim_skkm/uploads/21.pdf', 'Tervalidasi', '2016-04-04 13:14:48', NULL, '2016-04-04 13:20:52', '2016-04-04 13:21:40'),
(22, 10, 10, 2103131035, NULL, NULL, '2016-04-04 13:25:45', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 10, 10, 2103131058, '/sim_skkm/uploads/23.jpg', 'Tervalidasi', '2016-04-04 13:25:46', NULL, '2016-04-04 13:26:39', '2016-04-04 13:27:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `program_studi_id` int(11) DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `program_studi_id`, `jurusan_id`) VALUES
(1, '1 D3 Teknik Informatika A', 1, 4),
(2, '1 D3 Teknik Informatika B', 1, 4),
(3, '1 D4 Teknik Informatika A', 2, 4),
(4, '1 D4 Teknik Informatika B', 2, 4),
(5, '2 D3 Teknik Informatika A', 1, 4),
(6, '2 D3 Teknik Informatika B', 1, 4),
(7, '2 D4 Teknik Informatika A', 2, 4),
(8, '2 D4 Teknik Informatika B', 2, 4),
(9, '3 D3 Teknik Informatika A', 1, 4),
(10, '3 D3 Teknik Informatika B', 1, 4),
(11, '3 D4 Teknik Informatika A', 2, 4),
(12, '3 D4 Teknik Informatika B', 2, 4),
(13, '4 D4 Teknik Informatika A', 2, 4),
(14, '4 D4 Teknik Informatika B', 2, 4),
(15, '1 LJ Teknik Informatika', 3, 4),
(16, '2 LJ Teknik Informatika', 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_skkm`
--

CREATE TABLE IF NOT EXISTS `log_skkm` (
`id` int(11) NOT NULL,
  `waktu_log` datetime NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `aktivitas` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_skkm`
--

INSERT INTO `log_skkm` (`id`, `waktu_log`, `nama_user`, `aktivitas`) VALUES
(1, '2016-01-21 09:39:45', 'M Ramasatria Firmansyah', 'Login'),
(2, '2016-01-21 20:00:38', 'M Ramasatria Firmansyah', 'Login'),
(3, '2016-01-21 20:02:48', 'M Ramasatria Firmansyah', 'Login'),
(4, '2016-01-21 20:05:46', 'M Ramasatria Firmansyah', 'Logout'),
(5, '2016-01-21 20:07:05', 'M Ramasatria Firmansyah', 'Login'),
(10, '2016-01-21 20:22:41', 'M Ramasatria Firmansyah', 'Mengedit Poin Kepanitiaan dengan id = 1'),
(11, '2016-01-21 20:31:29', 'M Ramasatria Firmansyah', 'Menambah Deskripsi Kepanitiaan'),
(12, '2016-01-21 20:34:45', 'M Ramasatria Firmansyah', 'Mengedit Deskripsi = 1'),
(16, '2016-01-21 20:44:01', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti Organisasi Mahasiswa sebanyak 1'),
(17, '2016-01-21 20:44:01', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti Organisasi Mahasiswa sebanyak 2'),
(18, '2016-01-21 20:48:29', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti Organisasi Mahasiswa sebanyak 2'),
(19, '2016-01-21 20:55:01', 'M Ramasatria Firmansyah', 'Mengedit Kegiatan Mahasiswa yang diikuti oleh M Ramasatria Firmansyah pada kegiatan dengan id = 1'),
(20, '2016-01-21 21:04:26', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti Organisasi Mahasiswa sebanyak 1'),
(26, '2016-01-21 21:25:37', 'M Ramasatria Firmansyah', 'Mengedit Kegiatan Mahasiswa yang diikuti oleh NRP =  pada kegiatan dengan id = 8'),
(27, '2016-01-21 21:29:04', 'M Ramasatria Firmansyah', 'Mengedit Kegiatan Mahasiswa yang diikuti oleh NRP =  pada kegiatan dengan id = 8'),
(28, '2016-01-21 21:32:03', 'M Ramasatria Firmansyah', 'Mengedit Kegiatan Mahasiswa dengan id = 8'),
(29, '0000-00-00 00:00:00', 'M Ramasatria Firmansyah', 'Menghapus kegiatan dengan id = 6'),
(30, '2016-01-21 21:49:21', 'M Ramasatria Firmansyah', 'Logout'),
(31, '2016-01-21 22:01:32', 'M Ramasatria Firmansyah', 'Login'),
(32, '2016-01-21 23:17:22', 'M Ramasatria Firmansyah', 'Logout'),
(33, '2016-01-22 09:48:57', 'M Ramasatria Firmansyah', 'Login'),
(34, '2016-01-22 11:22:25', 'M Ramasatria Firmansyah', 'Logout'),
(35, '2016-01-22 13:57:44', 'M Ramasatria Firmansyah', 'Login'),
(36, '2016-01-22 14:00:12', 'M Ramasatria Firmansyah', 'Logout'),
(37, '2016-01-25 20:33:11', 'M Ramasatria Firmansyah', 'Login'),
(38, '2016-01-25 22:46:02', 'M Ramasatria Firmansyah', 'Logout'),
(39, '2016-01-26 00:31:03', 'M Ramasatria Firmansyah', 'Login'),
(40, '2016-01-26 00:48:30', 'M Ramasatria Firmansyah', 'Logout'),
(41, '2016-01-26 09:26:39', 'M Ramasatria Firmansyah', 'Login'),
(42, '2016-01-26 09:31:17', 'M Ramasatria Firmansyah', 'Logout'),
(43, '2016-01-26 09:31:23', 'M Ramasatria Firmansyah', 'Login'),
(44, '2016-01-26 09:31:43', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti Organisasi Mahasiswa sebanyak 1'),
(45, '2016-01-26 09:31:59', 'M Ramasatria Firmansyah', 'Mengisi Mahasiswa yang mengikuti UKM sebanyak 1'),
(46, '2016-01-26 09:32:09', 'M Ramasatria Firmansyah', 'Logout'),
(47, '2016-01-26 09:32:21', 'M Ramasatria Firmansyah', 'Login'),
(48, '2016-01-26 09:32:32', 'M Ramasatria Firmansyah', 'Logout'),
(49, '2016-01-26 09:32:37', 'M Ramasatria Firmansyah', 'Login'),
(50, '0000-00-00 00:00:00', 'admin@pens.ac.id', 'Menambah User'),
(51, '2016-04-03 21:27:58', 'admin@pens.ac.id', 'Menambah User'),
(52, '2016-04-03 21:31:34', 'admin@pens.ac.id', 'Merubah User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nrp` varchar(15) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `jenis_kelamin_id` int(11) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `kelas_id`, `jenis_kelamin_id`, `email`, `no_telp`, `alamat`) VALUES
('2103131035', 'Merinda Icha Ferawati', 10, 2, 'merindaicha@it.student.pens.ac.id', '12', 'jombang'),
('2103131039', 'Agrippina Griseldis Jemima Walujo', 10, 2, 'agrippinagjw@it.student.pens.ac.id', '13', 'Bangkalan'),
('2103131047', 'Yunita Rahayu', 10, 2, 'yunitarahayu@it.student.pens.ac.id', '123', 'Gresik'),
('2103131052', 'Galuh Maghfira', 10, 2, 'galuhmaghfira@it.student.pens.ac.id', '12', 'Waru Sidoarjo'),
('2103131053', 'Ian Prakarsa Wangi', 10, 1, 'iblack@it.student.pens.ac.id', '1', 'Sidoarjo'),
('2103131055', 'Mirra Ariesta Amalia Adiba', 10, 2, 'mirraariesta@it.student.pens.ac.id', '12', 'Surabaya'),
('2103131056', 'Berdawati Sukmaning Samudro', 10, 2, 'berdawatiss@it.student.pens.ac.id', '1', 'Surabaya'),
('2103131057', 'Bima Prakoso', 10, 1, 'bimaprakoso@it.student.pens.ac.id', '1', 'Pasuruan'),
('2103131058', 'M Ramasatria Firmansyah', 10, 1, 'ramasatriafb@it.student.pens.ac.id', '083897887725', 'Bumi Wonorejo Asri C2 / 23 Surabaya'),
('2103131059', 'Intan Permata Amalia', 10, 2, 'intanpermata@it.student.pens.ac.id', '2', 'Sidoarjo'),
('2103131060', 'Moch Ardhy Windhy Saputra', 10, 1, 'windhywinz@it.student.pens.ac.id', '1', 'Bojonegoro');

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `organisasi_mahasiswa` (
`id` int(11) NOT NULL,
  `nama_ormawa` varchar(50) NOT NULL,
  `status_ormawa` varchar(50) NOT NULL,
  `waktu_create` datetime NOT NULL,
  `waktu_modify` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organisasi_mahasiswa`
--

INSERT INTO `organisasi_mahasiswa` (`id`, `nama_ormawa`, `status_ormawa`, `waktu_create`, `waktu_modify`) VALUES
(1, 'Himpunan Mahasiswa Teknik Elektronika', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Himpunan Mahasiswa Teknik Telekomunikasi', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Himpunan Mahasiswa Teknik Elektro Industri', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Himpunan Mahasiswa Teknik Mekatronika', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Himpunan Mahasiswa Teknik Multimedia Broadcasting', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Himpunan Mahasiswa Sistem Pembangkitan Energi', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Himpunan Mahasiswa Teknik Komputer', 'Organisasi Mahasiswa', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Taekwondo', 'UKM', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Enumeration', 'Kepanitiaan', '2016-03-27 21:12:46', '0000-00-00 00:00:00'),
(13, 'Orientasi Mahasiswa Baru', 'Kegiatan Wajib', '2016-03-31 18:56:08', '0000-00-00 00:00:00'),
(14, 'Upacara ', 'Kegiatan Wajib', '2016-04-01 16:58:36', '0000-00-00 00:00:00'),
(15, 'Lomba Proyek Akhir', 'Kegiatan Wajib', '2016-04-04 13:11:17', '2016-04-04 13:11:29'),
(16, 'BEM', 'Organisisasi Mahasiswa', '2016-04-04 13:23:32', '0000-00-00 00:00:00'),
(17, 'BEM', 'Organisisasi Mahasiswa', '2016-04-04 13:23:44', '0000-00-00 00:00:00'),
(18, 'JRC', 'Kepanitiaan', '2016-04-04 13:24:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia_acara`
--

CREATE TABLE IF NOT EXISTS `panitia_acara` (
`id` int(11) NOT NULL,
  `nama_kepanitiaan` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu_create` datetime NOT NULL,
  `waktu_modify` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panitia_acara`
--

INSERT INTO `panitia_acara` (`id`, `nama_kepanitiaan`, `status`, `waktu_create`, `waktu_modify`) VALUES
(2, 'Enumeration', 'Kepanitiaan', '2016-03-27 20:54:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nomor` int(8) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `noid` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `staff` int(2) NOT NULL,
  `jurusan` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `sex` int(2) NOT NULL,
  `agama` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` int(10) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`nomor`, `nip`, `noid`, `nama`, `staff`, `jurusan`, `username`, `sex`, `agama`, `email`, `jabatan`, `alamat`) VALUES
(1, '12345', '123', 'Rama', 1, 4, 'rama', 1, 1, 'rama@pens.ac.id', 1, 'hayoo'),
(2, '4321', '321', 'Super Administrator', 1, 4, 'admin', 1, 1, 'admin@pens.ac.id', 1, 'kemahasiswaan'),
(77, '77', '77', 'Natasya Adela', 1, 4, 'natasyadela', 2, 1, 'natasyadela@pens.ac.id', 2, 'Ddd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin_kegiatan`
--

CREATE TABLE IF NOT EXISTS `poin_kegiatan` (
`id` int(11) NOT NULL,
  `jenis_kegiatan` varchar(50) NOT NULL,
  `tingkat_partisipasi` varchar(50) NOT NULL,
  `poin_kegiatan` varchar(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `waktu_create` datetime NOT NULL,
  `waktu_modify` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `poin_kegiatan`
--

INSERT INTO `poin_kegiatan` (`id`, `jenis_kegiatan`, `tingkat_partisipasi`, `poin_kegiatan`, `status`, `waktu_create`, `waktu_modify`) VALUES
(1, 'Organisasi Mahasiswa', 'Ketua', '5', 'Kepanitiaan', '0000-00-00 00:00:00', '2016-03-26 17:04:59'),
(2, 'Organisasi Mahasiswa', 'Menteri / Kadep / Kadiv ', '2', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Organisasi Mahasiswa', 'Anggota / Staff', '1', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'UKM', 'Ketua', '4', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'UKM', 'Menteri / Kadep / Kadiv ', '2', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'UKM', 'Anggota / Staff', '1', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Kepanitiaan', 'Ketua', '2', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Kepanitiaan', 'Sekretaris/Bendahara/Kadiv ', '1', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Kepanitiaan', 'Anggota', '0.5', 'Kepanitiaan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Orientasi Mahasiswa Baru', 'Peserta', '1', 'Kegiatan Wajib', '2016-04-01 16:33:12', '0000-00-00 00:00:00'),
(12, 'Upacara 17 Agustus', 'Peserta', '1', 'Kegiatan Wajib', '2016-04-01 16:40:18', '0000-00-00 00:00:00'),
(13, 'Lomba Proyek', 'Peserta', '1.5', 'Kegiatan Wajib', '2016-04-04 13:12:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE IF NOT EXISTS `program_studi` (
`id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`id`, `nama`) VALUES
(1, 'Diploma 3'),
(2, 'Diploma 4'),
(3, 'Lanjut Jenjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `status`) VALUES
(1, 'admin@pens.ac.id', 'e04f28cc33cb20274dd3ff44e600a923', ''),
(2, 'rama@pens.ac.id', 'e04f28cc33cb20274dd3ff44e600a923', ''),
(771, 'natasyadela@pens.ac.id', 'ff4232b7342593246d9953bd24c6b5cd', ''),
(2103131031, 'windaratna@it.pens.ac.id', 'winda', ''),
(2103131032, 'husnimubarok@it.pens.ac.id', 'husni', ''),
(2103131034, 'siskaamelia@it.student.pens.ac.id', 'siska', ''),
(2103131035, 'merindaicha@it.student.pens.ac.id', '9088e8c69e4625a75b5068a3f77d777b', ''),
(2103131036, 'rhenosulistyo@it.student.pens.ac.id', 'mboren', ''),
(2103131037, 'bimantara@it.student.pens.ac.id', 'djoer', ''),
(2103131038, 'imun@it.student.pens.ac.id', 'imun', ''),
(2103131039, 'agrippinagjw@it.student.pens.ac.id', '1bf23ad594ca8d179771fbe5870f6390', ''),
(2103131040, 'ido12321@it.student.pens.ac.id', 'ido', ''),
(2103131043, 'iftitahsita@it.student.pens.ac.id', 'devi', ''),
(2103131044, 'yasin@it.student.pens.ac.id', 'yasin', ''),
(2103131046, 'muhammadsulistyo@it.student.pens.ac.id', 'mamad', ''),
(2103131047, 'yunitarahayu@it.student.pens.ac.id', '771393b4e52f91157c7a2dc3ab198037', ''),
(2103131048, 'ghoziseptiandri@it.student.pens.ac.id', 'ghozi', ''),
(2103131051, 'faizadinegoro@it.student.pens.ac.id', 'faiz', ''),
(2103131052, 'galuhmaghfira@it.student.pens.ac.id', '7e67f82b2528050191537b600c15f48e', ''),
(2103131053, 'iblack@it.student.pens.ac.id', 'a71a448d3d8474653e831749b8e71fcc', ''),
(2103131055, 'mirraariesta@it.student.pens.ac.id', '8e38239a2820c104db8107f7a06381e6', ''),
(2103131056, 'berdawati@it.student.pens.ac.id', '1364cba01e0ee80ef4381175bd6cf0d3', ''),
(2103131057, 'bimaprakoso@it.student.pens.ac.id', '7fcba392d4dcca33791a44cd892b2112', ''),
(2103131058, 'ramasatriafb@it.student.pens.ac.id', 'e04f28cc33cb20274dd3ff44e600a923', 'Mahasiswa'),
(2103131059, 'intanpermata@it.student.pens.ac.id', 'b1098cab9c2db3eb9f576eb66c33449c', ''),
(2103131060, 'windhywinz@it.student.pens.ac.id', '9cc8d67b8ce51414d97fc1c8886ff492', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deskripsi`
--
ALTER TABLE `deskripsi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `jurusan_nama` (`nama`), ADD KEY `departemen_id` (`departemen_id`);

--
-- Indexes for table `kegiatan_mahasiswa`
--
ALTER TABLE `kegiatan_mahasiswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id`), ADD KEY `program_studi_id` (`program_studi_id`), ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `log_skkm`
--
ALTER TABLE `log_skkm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`nrp`), ADD UNIQUE KEY `email` (`email`), ADD KEY `kelas_id` (`kelas_id`), ADD KEY `jenis_kelamin_id` (`jenis_kelamin_id`);

--
-- Indexes for table `organisasi_mahasiswa`
--
ALTER TABLE `organisasi_mahasiswa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panitia_acara`
--
ALTER TABLE `panitia_acara`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `poin_kegiatan`
--
ALTER TABLE `poin_kegiatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deskripsi`
--
ALTER TABLE `deskripsi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kegiatan_mahasiswa`
--
ALTER TABLE `kegiatan_mahasiswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `log_skkm`
--
ALTER TABLE `log_skkm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `organisasi_mahasiswa`
--
ALTER TABLE `organisasi_mahasiswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `panitia_acara`
--
ALTER TABLE `panitia_acara`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `poin_kegiatan`
--
ALTER TABLE `poin_kegiatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
