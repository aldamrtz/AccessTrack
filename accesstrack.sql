-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Sep 2024 pada 21.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accesstrack`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `departemen` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'Aminuddin Ihsan', 'aminuddin21@if.unjani.id', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `program_studi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nama_lengkap`, `nim`, `fakultas`, `program_studi`, `email`, `keterangan`) VALUES
(1, 'rey', '3411211117', 'fsi', 'informatika', 'reyajidarusalam@gmail.com', 'cape');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelaporan_csirt`
--

CREATE TABLE `pelaporan_csirt` (
  `id` int(11) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `email_pelapor` varchar(255) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `deskripsi_masalah` text NOT NULL,
  `bukti_file` varchar(255) DEFAULT NULL,
  `tanggal_pelaporan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelaporan_csirt`
--

INSERT INTO `pelaporan_csirt` (`id`, `nama_pelapor`, `email_pelapor`, `nip`, `fakultas`, `jurusan`, `bagian`, `nama_website`, `deskripsi_masalah`, `bukti_file`, `tanggal_pelaporan`, `status`) VALUES
(1, 'Budi Santoso', 'budi.santoso@email.com', '198501152010121001', 'Teknik (FT)', 'Teknik Elektro S-1', 'Mahasiswa', 'www.ft.ac.id', 'Tidak bisa akses website', 'bukti1.jpg', '2024-09-15 17:00:00', 'pending'),
(2, 'Siti Rahayu', 'siti.rahayu@email.com', '199003222011012002', 'Ekonomi dan Bisnis (FEB)', 'Manajemen S-1', 'Dosen', 'www.feb.ac.id', 'Error saat login', 'bukti2.png', '2024-09-15 17:00:00', 'approved'),
(3, 'Ahmad Yani', 'ahmad.yani@email.com', '197708302005011003', 'Sains dan Informatika (FSI)', 'Kimia S-1', 'Staff', 'www.fsi.ac.id', 'Serangan DDoS', 'bukti3.pdf', '2024-09-15 17:00:00', 'rejected'),
(4, 'Dewi Lestari', 'dewi.lestari@email.com', '200112252022032001', 'Kedokteran', 'Pendidikan Dokter S-1', 'Mahasiswa', 'www.fk.ac.id', 'Phishing email', 'bukti4.jpg', '2024-09-15 17:00:00', 'pending'),
(5, 'Eko Prasetyo', 'eko.prasetyo@email.com', '198209142007011004', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Hukum S-1', 'Dosen', 'www.fisip.ac.id', 'Malware terdeteksi', 'bukti5.png', '2024-09-15 17:00:00', 'approved'),
(6, 'Rina Wulandari', 'rina.wulandari@email.com', '199505062018032002', 'Teknologi Manufaktur (FTM)', 'Teknik Mesin S-1', 'Staff', 'www.ftm.ac.id', 'Website tidak responsif', 'bukti6.pdf', '2024-09-15 17:00:00', 'rejected'),
(7, 'Agus Setiawan', 'agus.setiawan@email.com', '198707072012121005', 'FITKES', 'Kesehatan Masyarakat S-1', 'Mahasiswa', 'www.fitkes.ac.id', 'Data breach', 'bukti7.jpg', '2024-09-15 17:00:00', 'pending'),
(8, 'Lina Kusuma', 'lina.kusuma@email.com', '199112102014032003', 'Farmasi', 'Farmasi S-1', 'Dosen', 'www.farmasi.ac.id', 'SQL Injection', 'bukti8.png', '2024-09-15 17:00:00', 'approved'),
(9, 'Hendra Wijaya', 'hendra.wijaya@email.com', '198303152009011006', 'Sains dan Informatika (FSI)', 'Sistem Informasi S-1', 'Staff', 'www.fsi.ac.id', 'Server down', 'bukti9.pdf', '2024-09-15 17:00:00', 'rejected'),
(10, 'Nita Pratiwi', 'nita.pratiwi@email.com', '200208182023032001', 'Kedokteran Gigi', 'Kedokteran Gigi S-1', 'Mahasiswa', 'www.fkg.ac.id', 'Virus terdeteksi', 'bukti10.jpg', '2024-09-15 17:00:00', 'pending'),
(11, 'Rudi Hartono', 'rudi.hartono@email.com', '198605052010011007', 'Teknik (FT)', 'Teknik Sipil S-1', 'Dosen', 'www.ft.ac.id', 'Kehilangan data', 'bukti11.png', '2024-09-15 17:00:00', 'approved'),
(12, 'Maya Sari', 'maya.sari@email.com', '199210102015032004', 'Ekonomi dan Bisnis (FEB)', 'Akuntansi S-1', 'Staff', 'www.feb.ac.id', 'Cross-site scripting', 'bukti12.pdf', '2024-09-15 17:00:00', 'rejected'),
(13, 'Dedi Kurniawan', 'dedi.kurniawan@email.com', '200005052021031001', 'Sains dan Informatika (FSI)', 'Teknik Informatika S-1', 'Mahasiswa', 'www.fsi.ac.id', 'Masalah konfigurasi', 'bukti13.jpg', '2024-09-15 17:00:00', 'pending'),
(14, 'Nia Anggraini', 'nia.anggraini@email.com', '198808082013022005', 'FITKES', 'Ilmu Keperawatan S-1', 'Dosen', 'www.fitkes.ac.id', 'Kesalahan database', 'bukti14.png', '2024-09-15 17:00:00', 'approved'),
(15, 'Irfan Maulana', 'irfan.maulana@email.com', '197912122005011008', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Pemerintahan S-1', 'Staff', 'www.fisip.ac.id', 'Masalah jaringan', 'bukti15.pdf', '2024-09-15 17:00:00', 'rejected'),
(16, 'Dina Fitriani', 'dina.fitriani@email.com', '200302022024032001', 'Teknologi Manufaktur (FTM)', 'Teknik Industri S-1', 'Mahasiswa', 'www.ftm.ac.id', 'Peretasan akun', 'bukti16.jpg', '2024-09-15 17:00:00', 'pending'),
(17, 'Rizki Ramadhan', 'rizki.ramadhan@email.com', '198909092014031009', 'Psikologi', 'Psikologi S-1', 'Dosen', 'www.psikologi.ac.id', 'Error 404', 'bukti17.png', '2024-09-15 17:00:00', 'approved'),
(18, 'Anita Permata', 'anita.permata@email.com', '199404042016032006', 'Farmasi', 'Profesi Apoteker', 'Staff', 'www.farmasi.ac.id', 'Masalah backup', 'bukti18.pdf', '2024-09-15 17:00:00', 'rejected'),
(19, 'Fajar Nugroho', 'fajar.nugroho@email.com', '200107072022031002', 'Teknik (FT)', 'Teknik Geomatika S-1', 'Mahasiswa', 'www.ft.ac.id', 'Kebocoran informasi', 'bukti19.jpg', '2024-09-15 17:00:00', 'pending'),
(20, 'Tri Wahyuni', 'tri.wahyuni@email.com', '198601012011012010', 'FITKES', 'Kebidanan S-1', 'Dosen', 'www.fitkes.ac.id', 'Kesalahan SSL', 'bukti20.png', '2024-09-15 17:00:00', 'approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_domain`
--

CREATE TABLE `pengajuan_domain` (
  `nomor_induk` varchar(15) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `email_penanggung_jawab` varchar(100) NOT NULL,
  `kontak_penanggung_jawab` varchar(50) NOT NULL,
  `sub_domain` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `ip_pointing` varchar(50) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status_pengajuan` enum('Domain Diajukan','Domain Diproses','Domain Diverifikasi','Domain Dikirim') DEFAULT 'Domain Diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_domain`
--

INSERT INTO `pengajuan_domain` (`nomor_induk`, `fakultas`, `prodi`, `penanggung_jawab`, `email_penanggung_jawab`, `kontak_penanggung_jawab`, `sub_domain`, `keterangan`, `ip_pointing`, `tgl_pengajuan`, `status_pengajuan`) VALUES
('341211001', 'Teknik (FT)', 'Teknik Elektro S-1', 'Budi Santoso', 'budi.santoso@gmail.com', '081234567890', 'elektro', 'Webiste Prodi', '192.168.1.1', '2024-08-30', 'Domain Diajukan'),
('341211002', 'Teknik (FT)', 'Teknik Kimia S-1', 'Siti Rahayu', 'siti.rahayu@gmail.com', '081234567891', 'kimia', 'Portal Mahasiswa', '192.168.1.2', '2024-08-30', 'Domain Diproses'),
('341211003', 'Teknologi Manufaktur (FTM)', 'Teknik Mesin S-1', 'Ahmad Yani', 'ahmad.yani@gmail.com', '081234567892', 'mesin', 'E-Learning', '192.168.1.3', '2024-08-30', 'Domain Diverifikasi'),
('341211004', 'Teknologi Manufaktur (FTM)', 'Teknik Industri S-1', 'Dewi Lestari', 'dewi.lestari@gmail.com', '081234567893', 'industri', 'Sistem Informasi', '192.168.1.4', '2024-08-30', 'Domain Dikirim'),
('341211005', 'Ekonomi dan Bisnis (FEB)', 'Akuntansi S-1', 'Rudi Hartono', 'rudi.hartono@gmail.com', '081234567894', 'akuntansi', 'Website Fakultas', '192.168.1.5', '2024-08-30', 'Domain Diajukan'),
('341211006', 'Ekonomi dan Bisnis (FEB)', 'Manajemen S-1', 'Rina Wati', 'rina.wati@gmail.com', '081234567895', 'manajemen', 'Repository', '192.168.1.6', '2024-08-30', 'Domain Diproses'),
('341211007', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Pemerintahan S-1', 'Agus Supriyanto', 'agus.supriyanto@gmail.com', '081234567896', 'pemerintahan', 'Jurnal Online', '192.168.1.7', '2024-08-30', 'Domain Diverifikasi'),
('341211008', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Hub. Internasional S-1', 'Maya Sari', 'maya.sari@gmail.com', '081234567897', 'hubint', 'Blog Mahasiswa', '192.168.1.8', '2024-08-30', 'Domain Dikirim'),
('341211009', 'Sains dan Informatika (FSI)', 'Kimia S-1', 'Dedi Kurniawan', 'dedi.kurniawan@gmail.com', '081234567898', 'kimiasains', 'Lab Virtual', '192.168.1.9', '2024-08-30', 'Domain Diajukan'),
('341211010', 'Sains dan Informatika (FSI)', 'Teknik Informatika S-1', 'Lia Permata', 'lia.permata@gmail.com', '081234567899', 'informatika', 'Sistem Akademik', '192.168.1.10', '2024-08-30', 'Domain Diproses'),
('341211011', 'Psikologi', 'Psikologi S-1', 'Hendra Wijaya', 'hendra.wijaya@gmail.com', '081234567800', 'psikologi', 'Konseling Online', '192.168.1.11', '2024-08-30', 'Domain Diverifikasi'),
('341211012', 'Farmasi', 'Farmasi S-1', 'Nita Puspita', 'nita.puspita@gmail.com', '081234567801', 'farmasi', 'Database Obat', '192.168.1.12', '2024-08-30', 'Domain Dikirim'),
('341211013', 'Kedokteran', 'Pendidikan Dokter S-1', 'Rizki Pratama', 'rizki.pratama@gmail.com', '081234567802', 'kedokteran', 'Telemedicine', '192.168.1.13', '2024-08-30', 'Domain Diajukan'),
('341211014', 'Kedokteran Gigi', 'Kedokteran Gigi S-1', 'Dina Maulida', 'dina.maulida@gmail.com', '081234567803', 'gigi', 'Klinik Online', '192.168.1.14', '2024-08-30', 'Domain Diproses'),
('341211015', 'FITKES', 'Ilmu Keperawatan S-1', 'Fajar Nugroho', 'fajar.nugroho@gmail.com', '081234567804', 'keperawatan', 'E-Health', '192.168.1.15', '2024-08-30', 'Domain Diverifikasi'),
('341211016', 'FITKES', 'Kesehatan Masyarakat S-1', 'Siska Putri', 'siska.putri@gmail.com', '081234567805', 'kesmas', 'Surveilans', '192.168.1.16', '2024-08-30', 'Domain Dikirim'),
('341211017', 'Teknik (FT)', 'Teknik Sipil S-1', 'Irfan Hakim', 'irfan.hakim@gmail.com', '081234567806', 'sipil', 'Proyek Akhir', '192.168.1.17', '2024-08-30', 'Domain Diajukan'),
('341211018', 'Teknologi Manufaktur (FTM)', 'Teknik Metalurgi S-1', 'Ella Fitriani', 'ella.fitriani@gmail.com', '081234567807', 'metalurgi', 'Lab Report', '192.168.1.18', '2024-08-30', 'Domain Diproses'),
('341211019', 'Ekonomi dan Bisnis (FEB)', 'Magister Manajemen S-2', 'Reza Saputra', 'reza.saputra@gmail.com', '081234567808', 'mm', 'Thesis Database', '192.168.1.19', '2024-08-30', 'Domain Diverifikasi'),
('341211020', 'Sains dan Informatika (FSI)', 'Sistem Informasi S-1', 'Anita Dewi', 'anita.dewi@gmail.com', '081234567809', 'si', 'Project Management', '192.168.1.20', '2024-08-30', 'Domain Dikirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_email`
--

CREATE TABLE `pengajuan_email` (
  `nim` varchar(15) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `email_diajukan` varchar(100) DEFAULT NULL,
  `email_pengguna` varchar(100) DEFAULT NULL,
  `ktm` varchar(255) DEFAULT NULL,
  `tgl_pengajuan` date NOT NULL DEFAULT current_timestamp(),
  `status_pengajuan` enum('Email Diajukan','Email Diproses','Email Diverifikasi','Email Dikirim') DEFAULT 'Email Diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_email`
--

INSERT INTO `pengajuan_email` (`nim`, `fakultas`, `prodi`, `nama_depan`, `nama_belakang`, `email_diajukan`, `email_pengguna`, `ktm`, `tgl_pengajuan`, `status_pengajuan`) VALUES
('341211001', 'Teknik (FT)', 'Teknik Elektro S-1', 'Budi', 'Santoso', 'budi.santoso@example.edu', 'budi.santoso@gmail.com', '341211001.jpg', '2024-08-30', 'Email Diproses'),
('341211002', 'Teknik (FT)', 'Teknik Kimia S-1', 'Siti', 'Rahayu', 'siti.rahayu@example.edu', 'siti.rahayu@gmail.com', '341211002.jpg', '2024-08-30', 'Email Dikirim'),
('341211003', 'Teknologi Manufaktur (FTM)', 'Teknik Mesin S-1', 'Ahmad', 'Yani', 'ahmad.yani@example.edu', 'ahmad.yani@gmail.com', '341211003.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211004', 'Teknologi Manufaktur (FTM)', 'Teknik Industri S-1', 'Dewi', 'Lestari', 'dewi.lestari@example.edu', 'dewi.lestari@gmail.com', '341211004.jpg', '2024-08-30', 'Email Diproses'),
('341211005', 'Ekonomi dan Bisnis (FEB)', 'Akuntansi S-1', 'Rudi', 'Hartono', 'rudi.hartono@example.edu', 'rudi.hartono@gmail.com', '341211005.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211006', 'Ekonomi dan Bisnis (FEB)', 'Manajemen S-1', 'Rina', 'Wati', 'rina.wati@example.edu', 'rina.wati@gmail.com', '341211006.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211007', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Pemerintahan S-1', 'Agus', 'Supriyanto', 'agus.supriyanto@example.edu', 'agus.supriyanto@gmail.com', '341211007.jpg', '2024-08-30', 'Email Dikirim'),
('341211008', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Hub. Internasional S-1', 'Maya', 'Sari', 'maya.sari@example.edu', 'maya.sari@gmail.com', '341211008.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211009', 'Sains dan Informatika (FSI)', 'Kimia S-1', 'Dedi', 'Kurniawan', 'dedi.kurniawan@example.edu', 'dedi.kurniawan@gmail.com', '341211009.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211010', 'Sains dan Informatika (FSI)', 'Teknik Informatika S-1', 'Lia', 'Permata', 'lia.permata@example.edu', 'lia.permata@gmail.com', '341211010.jpg', '2024-08-30', 'Email Diproses'),
('341211011', 'Psikologi', 'Psikologi S-1', 'Hendra', 'Wijaya', 'hendra.wijaya@example.edu', 'hendra.wijaya@gmail.com', '341211011.jpg', '2024-08-30', 'Email Diproses'),
('341211012', 'Farmasi', 'Farmasi S-1', 'Nita', 'Puspita', 'nita.puspita@example.edu', 'nita.puspita@gmail.com', '341211012.jpg', '2024-08-30', 'Email Diverifikasi'),
('341211013', 'Kedokteran', 'Pendidikan Dokter S-1', 'Rizki', 'Pratama', 'rizki.pratama@example.edu', 'rizki.pratama@gmail.com', '341211013.jpg', '2024-08-30', 'Email Diajukan'),
('341211014', 'Kedokteran Gigi', 'Kedokteran Gigi S-1', 'Dina', 'Maulida', 'dina.maulida@example.edu', 'dina.maulida@gmail.com', '341211014.jpg', '2024-08-30', 'Email Diajukan'),
('341211015', 'FITKES', 'Ilmu Keperawatan S-1', 'Fajar', 'Nugroho', 'fajar.nugroho@example.edu', 'fajar.nugroho@gmail.com', '341211015.jpg', '2024-08-30', 'Email Diajukan'),
('341211016', 'FITKES', 'Kesehatan Masyarakat S-1', 'Siska', 'Putri', 'siska.putri@example.edu', 'siska.putri@gmail.com', '341211016.jpg', '2024-08-30', 'Email Diajukan'),
('341211017', 'Teknik (FT)', 'Teknik Sipil S-1', 'Irfan', 'Hakim', 'irfan.hakim@example.edu', 'irfan.hakim@gmail.com', '341211017.jpg', '2024-08-30', 'Email Diajukan'),
('341211018', 'Teknologi Manufaktur (FTM)', 'Teknik Metalurgi S-1', 'Ella', 'Fitriani', 'ella.fitriani@example.edu', 'ella.fitriani@gmail.com', '341211018.jpg', '2024-08-30', 'Email Diajukan'),
('341211019', 'Ekonomi dan Bisnis (FEB)', 'Magister Manajemen S-2', 'Reza', 'Saputra', 'reza.saputra@example.edu', 'reza.saputra@gmail.com', '341211019.jpg', '2024-08-30', 'Email Diajukan'),
('341211020', 'Sains dan Informatika (FSI)', 'Sistem Informasi S-1', 'Anita', 'Dewi', 'anita.dewi@example.edu', 'anita.dewi@gmail.com', '341211020.jpg', '2024-08-30', 'Email Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_ka`
--

CREATE TABLE `pengajuan_ka` (
  `id_KA` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `identity_number` varchar(50) NOT NULL,
  `faculty_department` varchar(255) DEFAULT NULL,
  `program_studi` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `keterangan_pengajuan` text NOT NULL,
  `applicant_type` enum('Mahasiswa','Dosen','Staff') NOT NULL,
  `tanggal_pengajuan` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan_ka`
--

INSERT INTO `pengajuan_ka` (`id_KA`, `nama_lengkap`, `identity_number`, `faculty_department`, `program_studi`, `jabatan`, `divisi`, `email`, `keterangan_pengajuan`, `applicant_type`, `tanggal_pengajuan`, `status`) VALUES
(1, 'Budi Santoso', '3411211001', 'Teknik (FT)', 'Teknik Elektro S-1', NULL, NULL, 'budi.santoso@ft.ac.id', 'Kartu akses patah saat digunakan', 'Mahasiswa', '2024-09-16 00:00:00', 'approved'),
(2, 'Siti Rahayu', '3411211002', 'Ekonomi dan Bisnis (FEB)', 'Manajemen S-1', NULL, NULL, 'siti.rahayu@feb.ac.id', 'Kartu akses hilang di area kampus', 'Mahasiswa', '2024-09-16 00:00:00', 'pending'),
(3, 'Ahmad Yani', '3411211003', 'Sains dan Informatika (FSI)', 'Teknik Informatika S-1', NULL, NULL, 'ahmad.yani@fsi.ac.id', 'Kartu akses tidak terbaca oleh sistem', 'Mahasiswa', '2024-09-16 00:00:00', 'rejected'),
(4, 'Dewi Lestari', '3411211004', 'Kedokteran', 'Pendidikan Dokter S-1', NULL, NULL, 'dewi.lestari@fk.ac.id', 'Kartu akses terbelah menjadi dua', 'Mahasiswa', '2024-09-16 00:00:00', 'approved'),
(5, 'Eko Prasetyo', '3411211005', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Pemerintahan S-1', NULL, NULL, 'eko.prasetyo@fisip.ac.id', 'Kartu akses tertinggal di kendaraan umum', 'Mahasiswa', '2024-09-16 00:00:00', 'pending'),
(6, 'Rina Wulandari', '3411211006', 'Teknologi Manufaktur (FTM)', 'Teknik Mesin S-1', NULL, NULL, 'rina.wulandari@ftm.ac.id', 'Kartu akses tergores parah', 'Mahasiswa', '2024-09-16 00:00:00', 'rejected'),
(7, 'Agus Setiawan', '3411211007', 'FITKES', 'Kesehatan Masyarakat S-1', NULL, NULL, 'agus.setiawan@fitkes.ac.id', 'Kartu akses patah saat dibawa di saku', 'Mahasiswa', '2024-09-16 00:00:00', 'approved'),
(8, 'Lina Kusuma', '3411211008', 'Farmasi', 'Farmasi S-1', NULL, NULL, 'lina.kusuma@farmasi.ac.id', 'Kartu akses hilang saat kegiatan lapangan', 'Mahasiswa', '2024-09-16 00:00:00', 'pending'),
(9, 'Hendra Wijaya', '3411211009', 'Sains dan Informatika (FSI)', 'Sistem Informasi S-1', NULL, NULL, 'hendra.wijaya@fsi.ac.id', 'Kartu akses rusak terkena air', 'Mahasiswa', '2024-09-16 00:00:00', 'rejected'),
(10, 'Nita Pratiwi', '3411211010', 'Kedokteran Gigi', 'Kedokteran Gigi S-1', NULL, NULL, 'nita.pratiwi@fkg.ac.id', 'Kartu akses patah saat dikeluarkan dari dompet', 'Mahasiswa', '2024-09-16 00:00:00', 'approved'),
(11, 'Rudi Hartono', '3411211011', 'Teknik (FT)', 'Teknik Sipil S-1', 'Dosen', NULL, 'rudi.hartono@ft.ac.id', 'Kartu akses hilang saat pindah ruangan', 'Dosen', '2024-09-16 00:00:00', 'pending'),
(12, 'Maya Sari', '3411211012', 'Ekonomi dan Bisnis (FEB)', 'Akuntansi S-1', 'Dosen', NULL, 'maya.sari@feb.ac.id', 'Kartu akses rusak karena terlalu sering digunakan', 'Dosen', '2024-09-16 00:00:00', 'rejected'),
(13, 'Dedi Kurniawan', '3411211013', 'Sains dan Informatika (FSI)', 'Magister Kimia S-2', 'Dosen', NULL, 'dedi.kurniawan@fsi.ac.id', 'Kartu akses patah saat terjatuh', 'Dosen', '2024-09-16 00:00:00', 'approved'),
(14, 'Nia Anggraini', '3411211014', 'FITKES', 'Profesi Ners', 'Dosen', NULL, 'nia.anggraini@fitkes.ac.id', 'Kartu akses hilang saat mengajar di luar kampus', 'Dosen', '2024-09-16 00:00:00', 'pending'),
(15, 'Irfan Maulana', '3411211015', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Magister Hub. Internasional S-2', 'Dosen', NULL, 'irfan.maulana@fisip.ac.id', 'Kartu akses rusak karena terpapar panas', 'Dosen', '2024-09-16 00:00:00', 'rejected'),
(16, 'Dina Fitriani', '3411211016', 'Teknologi Manufaktur (FTM)', 'Teknik Industri S-1', 'Dosen', NULL, 'dina.fitriani@ftm.ac.id', 'Kartu akses patah saat terjepit pintu', 'Dosen', '2024-09-16 00:00:00', 'approved'),
(17, 'Rizki Ramadhan', '3411211017', 'Psikologi', 'Psikologi S-1', 'Dosen', NULL, 'rizki.ramadhan@psikologi.ac.id', 'Kartu akses hilang saat penelitian lapangan', 'Dosen', '2024-09-16 00:00:00', 'pending'),
(18, 'Anita Permata', '3411211018', 'Farmasi', 'Magister Farmasi S-2', 'Dosen', NULL, 'anita.permata@farmasi.ac.id', 'Kartu akses rusak karena terkena bahan kimia', 'Dosen', '2024-09-16 00:00:00', 'rejected'),
(19, 'Fajar Nugroho', '3411211019', 'Teknik (FT)', 'Magister Teknik Sipil S-2', 'Staff', NULL, 'fajar.nugroho@ft.ac.id', 'Kartu akses patah saat digunakan di pintu otomatis', 'Staff', '2024-09-16 00:00:00', 'approved'),
(20, 'Tri Wahyuni', '3411211020', 'FITKES', 'Teknologi Laboraturium Medis D-4', 'Staff', NULL, 'tri.wahyuni@fitkes.ac.id', 'Kartu akses hilang saat kunjungan ke laboratorium', 'Staff', '2024-09-16 00:00:00', 'pending'),
(21, 'Bambang Kusuma', '3411211021', 'Sains dan Informatika (FSI)', 'Kimia S-1', 'Staff', NULL, 'bambang.kusuma@fsi.ac.id', 'Kartu akses rusak karena terkena magnet', 'Staff', '2024-09-16 00:00:00', 'rejected'),
(22, 'Sari Indah', '3411211022', 'Ekonomi dan Bisnis (FEB)', 'Magister Manajemen S-2', 'Staff', NULL, 'sari.indah@feb.ac.id', 'Kartu akses patah saat digunakan di mesin absensi', 'Staff', '2024-09-16 00:00:00', 'approved'),
(23, 'Joko Santoso', '3411211023', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Ilmu Hukum S-1', 'Staff', NULL, 'joko.santoso@fisip.ac.id', 'Kartu akses hilang saat renovasi ruangan', 'Staff', '2024-09-16 00:00:00', 'pending'),
(24, 'Rina Putri', '3411211024', 'Kedokteran', 'Administrasi Rumah Sakit S-1', 'Staff', NULL, 'rina.putri@fk.ac.id', 'Kartu akses rusak karena terjatuh dari lantai atas', 'Staff', '2024-09-16 00:00:00', 'rejected'),
(25, 'Andi Prakoso', '3411211025', 'Teknologi Manufaktur (FTM)', 'Teknik Metalurgi S-1', 'Staff', NULL, 'andi.prakoso@ftm.ac.id', 'Kartu akses patah saat digunakan di parkir otomatis', 'Staff', '2024-09-16 00:00:00', 'approved'),
(26, 'Dewi Safitri', '3411211026', 'Kedokteran Gigi', 'Profesi Dokter Gigi', 'Staff', NULL, 'dewi.safitri@fkg.ac.id', 'Kartu akses hilang saat pelatihan di luar kota', 'Staff', '2024-09-16 00:00:00', 'pending'),
(27, 'Rudi Hermawan', '3411211027', 'FITKES', 'Kebidanan S-1', 'Staff', NULL, 'rudi.hermawan@fitkes.ac.id', 'Kartu akses rusak karena terlalu lama di bawah sinar matahari', 'Staff', '2024-09-16 00:00:00', 'rejected'),
(28, 'Nina Astuti', '3411211028', 'Farmasi', 'Profesi Apoteker', 'Staff', NULL, 'nina.astuti@farmasi.ac.id', 'Kartu akses patah saat terjepit di laci meja', 'Staff', '2024-09-16 00:00:00', 'approved'),
(29, 'Bima Arya', '3411211029', 'Psikologi', 'Psikologi S-1', 'Staff', NULL, 'bima.arya@psikologi.ac.id', 'Kartu akses hilang saat acara kampus', 'Staff', '2024-09-16 00:00:00', 'pending'),
(30, 'Lina Maharani', '3411211030', 'Teknik (FT)', 'Teknik Geomatika S-1', 'Staff', NULL, 'lina.maharani@ft.ac.id', 'Kartu akses rusak karena tergores kunci', 'Staff', '2024-09-16 00:00:00', 'rejected'),
(31, 'Agus Budiman', '3411211031', 'Sains dan Informatika (FSI)', 'Teknik Informatika S-1', 'Staff', NULL, 'agus.budiman@fsi.ac.id', 'Kartu akses patah saat dibawa dalam tas', 'Staff', '2024-09-16 00:00:00', 'approved'),
(32, 'Siti Nurhaliza', '3411211032', 'Ekonomi dan Bisnis (FEB)', 'Manajemen S-1', 'Staff', NULL, 'siti.nurhaliza@feb.ac.id', 'Kartu akses hilang saat berpindah ruang kerja', 'Staff', '2024-09-16 00:00:00', 'pending'),
(33, 'Dedi Mulyadi', '3411211033', 'Ilmu Sosial dan Ilmu Politik (FISIP)', 'Magister Ilmu Pemerintahan S-2', 'Staff', NULL, 'dedi.mulyadi@fisip.ac.id', 'Kartu akses rusak karena terkena minuman', 'Staff', '2024-09-16 00:00:00', 'rejected'),
(34, 'Rina Marlina', '3411211034', 'FITKES', 'Magister Kesehatan Masyarakat S-2', 'Staff', NULL, 'rina.marlina@fitkes.ac.id', 'Kartu akses patah saat digunakan di perpustakaan', 'Staff', '2024-09-16 00:00:00', 'approved'),
(35, 'Joko Widodo', '3411211035', 'Kedokteran', 'Magister Penuaan Kulit dan Estetika S-2', 'Staff', NULL, 'joko.widodo@fk.ac.id', 'Kartu akses hilang saat menghadiri seminar', 'Staff', '2024-09-16 00:00:00', 'pending'),
(36, 'Mega Indah', '3411211036', 'Teknologi Manufaktur (FTM)', 'Magister Manajemen Teknologi S-2', 'Staff', NULL, 'mega.indah@ftm.ac.id', 'Kartu akses rusak karena terjatuh ke dalam air', 'Staff', '2024-09-16 00:00:00', 'rejected');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `fakultas` varchar(100) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indeks untuk tabel `pelaporan_csirt`
--
ALTER TABLE `pelaporan_csirt`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajuan_domain`
--
ALTER TABLE `pengajuan_domain`
  ADD PRIMARY KEY (`nomor_induk`),
  ADD UNIQUE KEY `sub_domain` (`sub_domain`);

--
-- Indeks untuk tabel `pengajuan_email`
--
ALTER TABLE `pengajuan_email`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `email_diajukan` (`email_diajukan`);

--
-- Indeks untuk tabel `pengajuan_ka`
--
ALTER TABLE `pengajuan_ka`
  ADD PRIMARY KEY (`id_KA`);

--
-- Indeks untuk tabel `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelaporan_csirt`
--
ALTER TABLE `pelaporan_csirt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_ka`
--
ALTER TABLE `pengajuan_ka`
  MODIFY `id_KA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
