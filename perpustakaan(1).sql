-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 04:36 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nis_nip` varchar(180) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  `no_hp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nis_nip`, `alamat`, `jenis_kelamin`, `status`, `no_hp`) VALUES
(1, 'antoni saputra', '190602063', 'Desa Setanggor', 'Laki-Laki', 'Siswa', '081907711909'),
(2, 'nurlita', '8901912', 'Desa Keruak', 'Perempuan', 'Siswa', '0819119191'),
(3, 'ADITIA ARDI SAPUTRA', '0066603784', ' Selebung', 'Laki-Laki', 'Siswa', '08190585489'),
(4, 'ALFIN MAULANA', '0057995367', 'Keruak', 'Laki-Laki', 'Siswa', '0829293829323'),
(5, 'ALINA FITRIA', '0055169605', 'Jarowaru', 'Perempuan', 'Siswa', '081907246246'),
(6, 'ALPARIZI', '0062182161', 'Pijot', 'Laki-Laki', 'Siswa', '082907128457'),
(7, 'ANGGI FITRIANI', '0055679453', 'Tanjung Luar', 'Perempuan', 'Siswa', '081990274467');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `kategori` varchar(200) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `jumlah_buku` int(200) NOT NULL,
  `gambar_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `penulis`, `tahun_terbit`, `jumlah_buku`, `gambar_buku`) VALUES
(4, 'Pendidikan Agama Islam Dan Budi Pekerti Kelas XII', 'Agama Islam', 'Drs.H.A.Sholeh Dimyathi,MM', 2019, 15, '8fab1e27fe9dc1528436012566bfb73b.jpg'),
(5, 'Pendidikan Agama Islam Dan Budi Pekerti Kelas X', 'Agama Islam', 'Endi Suhendi Zen, MA.', 2016, 30, 'a677af46cdb7c2cae4436ee5556f8f6f.jpg'),
(6, 'Pendidikan Agama Islam Dan Budi Pekerti Kelas XI', 'Agama Islam', 'H.mustahdi, M.Ag', 2018, 24, 'd7ab4025ef116cd44c0a1308320541b5.jpg'),
(7, 'Bahasa Inggris Kelas XII', 'Bahasa Inggris', 'Prof. Utami Widiyati, M.A, Ph.D', 2018, 40, '44e275a6aa7887485a008d3827805cb1.jpg'),
(8, 'Bahasa Inggris Kelas X', 'Bahasa Inggris', 'Prof. Dr. Zuliati Rohmah, M.Pd.', 2016, 38, '89ff73ec34188a5a45926ac1548a56e6.jpg'),
(9, 'Bahasa Inggris Kelas XI', 'Bahasa Inggris', 'Naela khikmiah S.Pd', 2016, 48, '6e48e6edbe8282ce7655ca80780aa322.jpg'),
(10, 'Pendidikan Jasmani, Olahraga, dan Kesehatan kelas X', 'Penjaskes', 'Dr. Sudrajat Wiradihardja, M.Pd.', 2017, 36, '8503262f7842bb81c61971625b885338.jpg'),
(11, 'Pendidikan Jasmani, Olahraga, dan Kesehatan Kelas XI', 'Penjaskes', 'Sumaryoto, M.Pd', 2017, 25, '642ae760e7e2df8911c3d3ea0f7b2707.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bukukembali`
--

CREATE TABLE `bukukembali` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `nis_nip` varchar(200) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `batas_pinjam` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `jumlah_buku` int(200) NOT NULL,
  `denda` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukukembali`
--

INSERT INTO `bukukembali` (`id`, `nama_anggota`, `judul_buku`, `nis_nip`, `waktu_pinjam`, `batas_pinjam`, `waktu_kembali`, `jumlah_buku`, `denda`) VALUES
(9, 'antoni saputra', 'laskar pelangi', '190602063', '2022-06-24', '2022-06-30', '2022-06-24', 1, 0),
(10, 'antoni saputra', 'Pendidikan Agama Islam Dan Budi Pekerti Kelas XII', '190602063', '2022-06-10', '2022-06-23', '2022-06-24', 1, 1000),
(11, 'antoni saputra', 'Bahasa Inggris Kelas XI', '190602063', '2022-06-24', '2022-07-01', '2022-06-24', 2, 0),
(12, 'antoni saputra', 'Pendidikan Agama Islam Dan Budi Pekerti Kelas XII', '190602063', '2022-06-24', '2022-06-26', '2022-06-24', 1, 0),
(13, 'antoni saputra', 'Pendidikan Agama Islam Dan Budi Pekerti Kelas XII', '190602063', '2022-06-20', '2022-06-21', '2022-06-24', 1, 3000),
(14, 'antoni saputra', 'Pendidikan Jasmani, Olahraga, dan Kesehatan kelas X', '190602063', '2022-06-21', '2022-06-21', '2022-06-24', 2, 3000),
(15, 'antoni saputra', 'Pendidikan Agama Islam Dan Budi Pekerti Kelas X', '190602063', '2022-06-05', '2022-06-19', '2022-06-24', 1, 5000),
(16, 'antoni saputra', 'Pendidikan Jasmani, Olahraga, dan Kesehatan Kelas XI', '190602063', '2022-06-12', '2022-06-20', '2022-06-24', 2, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu_pembuatan` date NOT NULL,
  `informasi_singkat` text NOT NULL,
  `informasi_detail` text NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `judul`, `waktu_pembuatan`, `informasi_singkat`, `informasi_detail`, `gambar`) VALUES
(12, 'Kegiatan Sabtu Budaya SMAN 1 Keruak', '2022-06-24', '<p><strong>SMAN 1 Keruak</strong>&ndash; Kegiatan sabtu budaya di SMAN 1 Keruak dilakukan dengan penuh semangat dan suka cita, sehingga diharapkan mampu membentuk karakter mulia peserta didik yang akan menjadi generasi [..]</p>\r\n', '<p><strong>SMAN 1 Keruak</strong>&ndash; Kegiatan sabtu budaya di SMAN 1 Keruak dilakukan dengan penuh semangat dan suka cita, sehingga diharapkan mampu membentuk karakter mulia peserta didik yang akan menjadi generasi masa depan dan memiliki rasa cinta, kepedulian dan bangga dengan budaya lokal dan traditional. Sehingga, dengan adanya rasa pelestarian dan kebanggaan tersebut dapat menjadi nilai positif ke depan, akan terus menanamkan nilai-nilai luhur yang diwariskan agar bangsa ini semakin kuat, dengan tetap mempertahankan dan merawat budaya tradisional bangsa.</p>\r\n\r\n<p>&ldquo;Kegiatan Sabtu Budaya, berisi praktek-praktek. Baik tentang, kesehatan, gotong royong, permainan rakyat, olahraga traditional dan penguatan pengembangan organisasi sekolah. Jadi program dan inovasi yang ada, harus terus berjalan,&nbsp;berkesinambungan dan terus menerus meningkat kualitasnya. Sehingga menjadi kebiasaan yang dapat mengubah pola pikir atau perilaku masyarakat,&rdquo;.</p>\r\n\r\n<p>Sabtu Budaya di SMAN 1 Keruak tetap dapat berjalan sesuai dengan yang diharapkan, diamana dapat terlihat dari antusias siswa yang akan menampilkan ekspresi mereka di hadapan seluruh teman-temannya dan semua warga SMAN 1 Keruak.</p>\r\n', '83ff564b935abe439d447ba2bff5fffe.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(3, 'Agama Islam'),
(4, 'Bahasa Inggris'),
(5, 'Penjaskes'),
(6, 'PKWU');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama_admin`, `email`, `password`, `gambar`) VALUES
(1, 'nurulita', 'nurulita@gmail.com', '$2y$10$/qregiqWcQXEXqxfp0/QpekaPyqaP3/tEZ.kOYh9WlaIzir235rSy', '50391beb28824beab9a32b033aea9ac5.jpg'),
(2, 'admin', 'admin@gmail.com', '$2y$10$kBkvlkOPOdBf4suB7tslDOl1n7287oRK0e9OJMVYRJ2MJpRtO8PYe', '28d922776191f004cdf45c166f3ea01e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `nis_nip` varchar(200) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `waktu_pinjam` date NOT NULL,
  `waktu_kembali` date NOT NULL,
  `jumlah_buku` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukukembali`
--
ALTER TABLE `bukukembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bukukembali`
--
ALTER TABLE `bukukembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
