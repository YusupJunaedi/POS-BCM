-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 Jun 2020 pada 01.00
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Rokok'),
(2, 'Mie Instan'),
(3, 'Beras'),
(4, 'Pasta Gigi'),
(5, 'Sabun'),
(6, 'Makanan Ringan'),
(7, 'Minuman Ringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_trans` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `produk` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_trans`, `user`, `produk`, `qty`, `harga_total`, `tgl`, `status`) VALUES
(23, 4, 3, '33', 1, 15000, '2019-10-15', 2),
(24, 4, 3, '48', 14, 70000, '2019-10-15', 2),
(25, 4, 3, '42', 2, 14000, '2019-10-15', 2),
(26, 5, 3, '50', 1, 12000, '2019-10-15', 2),
(27, 5, 3, '1', 2, 48000, '2019-10-15', 2),
(28, 5, 3, '17', 6, 18000, '2019-10-15', 2),
(29, 6, 3, '38', 1, 18000, '2019-10-15', 1),
(30, 7, 3, '17', 6, 18000, '2019-10-15', 1),
(31, 1, 3, '19', 1, 2700, '2019-10-17', 1),
(32, 2, 6, '15', 1, 30000, '2020-02-08', 1),
(33, 2, 6, '1', 1, 24000, '2020-02-08', 1),
(34, 3, 3, '26', 3, 270000, '2020-06-18', 1),
(35, 3, 3, '17', 6, 18000, '2020-06-18', 1),
(36, 3, 3, '35', 8, 20000, '2020-06-18', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `berat`, `stok`, `img`) VALUES
(1, 1, 'Sampoerna Mild ', 24000, 20, 2000, 'images (1).jpg'),
(2, 1, 'Magnum Mild', 17000, 20, 500, '2.jpg'),
(7, 1, 'Dunhill mild', 23000, 20, 30, 'Dunhill1.jpg'),
(8, 1, 'Lucky Strike ', 20000, 20, 30, 'Lucky Strike1.jpg'),
(9, 1, 'Class Mild ', 20000, 20, 40, 'class mild1.jpg'),
(10, 1, 'Djinggo', 15000, 30, 30, 'djinggo1.jpg'),
(11, 1, 'Djarum Super', 20000, 25, 30, 'djarumsuper1.jpg'),
(12, 1, 'Djarum Super Mild ', 19000, 30, 30, 'djarum-super-mild1.jpg'),
(13, 1, 'Gudang Garam Filter', 18000, 20, 30, 'gudanggaramfilter1.jpg'),
(14, 1, 'Gudang Garam Merah ', 16000, 25, 30, 'gudanggarammerah1.jpg'),
(15, 1, 'Wismilak Premium Cigars', 30000, 30, 30, 'wismilakcigars1.png'),
(16, 1, 'Wismilak Premium Seleccion', 35000, 20, 30, 'wismilakpremium1.png'),
(17, 2, 'Indomie Goreng', 3000, 190, 40, 'indomiegoreng1.jpg'),
(18, 2, 'Indomie Kari Ayam', 2500, 185, 40, 'indomiekari1.jpg'),
(19, 2, 'ABC Selera Pedas', 2700, 190, 40, 'abcselerapedas1.jpg'),
(20, 2, 'ABC Ayam Bawang', 2400, 180, 40, 'abcayam1.jpg'),
(21, 2, 'Top Ramen Bakso Pedas', 3000, 190, 40, 'topramen1.png'),
(22, 2, 'Ramen Premium Ayam Pedas', 4000, 200, 40, 'ramenpedasayam1.png'),
(23, 3, 'Beras Kemudi', 70000, 10000, 30, 'beras-kemudi1.png'),
(24, 3, 'Beras Beneli Merak', 80000, 10000, 30, 'beras-beneli-merak1.png'),
(25, 3, 'Beras Maksyuss', 90000, 10000, 30, 'berasmaknyus1.png'),
(26, 3, 'Beras Cap Ayam Jago', 90000, 10000, 30, 'berasayamjago1.jpg'),
(27, 3, 'BPS Setra Ramos', 92000, 10000, 40, 'BPSsetraramos1.jpg'),
(28, 3, 'Beras Hoki', 94000, 10000, 40, 'berashoki1.jpg'),
(29, 4, 'Pepsodent Pencegah Gigi Berlubang', 4000, 100, 20, 'pepsodent1.jpg'),
(30, 4, 'Pepsodent Sensitive Expert', 20000, 100, 30, 'pepsodentsensitive1.jpg'),
(31, 4, 'Cipdatent Fresh Spring Mint', 5000, 100, 30, 'CiptadentFreshSpringMint1.png'),
(32, 4, 'Ciptadent Maxi Herbal', 6000, 100, 30, 'Cipdatentmaxiherbal1.png'),
(33, 4, 'Enzym Fresh Mint', 15000, 100, 30, 'EnzymFrestMint1.png'),
(34, 4, 'Enzym Classic Mint', 16000, 100, 30, 'EnzymClassicMild1.png'),
(35, 5, 'Nuvo Family Caring', 2500, 200, 30, 'sabunnuvofamilycaring1.jpg'),
(36, 5, 'Nuvo Family Nature', 2600, 200, 30, 'sabunnuvofamilynature1.jpg'),
(37, 5, 'Mild & Gentle Hair & Body Wash', 17000, 250, 30, 'Cussons1.png'),
(38, 5, 'Soft & Smooth Milk Bath', 18000, 250, 30, 'Cussonssoft1.png'),
(39, 5, 'Lorraine', 4000, 125, 30, 'sabunlorraine1.jpg'),
(40, 5, 'Sabrina ', 5000, 125, 30, 'sabunsabrina1.jpg'),
(41, 6, 'Biskuit Roma Kelapa', 10000, 300, 30, 'makananroma1.jpg'),
(42, 6, 'Malkist Crakers', 7000, 250, 30, 'makananromamalkist1.jpg'),
(43, 6, 'Roma Kelapa', 10000, 350, 30, 'makananroma2.jpg'),
(44, 6, 'GO Potato', 6000, 60, 30, 'makananpotato1.jpg'),
(45, 6, 'Malkrez Crakers', 12000, 85, 30, 'makananMalkrez_ayambakar1.png'),
(46, 6, 'Krupuk Finna Bawal Putih', 7000, 380, 30, 'makananfinnabawalputih1.jpg'),
(47, 6, 'Krupuk Finna Salada', 7500, 380, 30, 'makananfinnasalada1.jpg'),
(48, 7, 'Teh Botol Sosro', 5000, 350, 30, 'minumantehbotol1.jpg'),
(49, 7, 'Fruit Tea', 7000, 400, 30, 'minumanfruittea1.jpg'),
(50, 7, 'Torabika Cappucino', 12000, 250, 30, 'minumantorabikacappucino1.jpg'),
(51, 7, 'Tora Cafe', 9000, 220, 30, 'minumantoracafe1.jpg'),
(52, 7, 'Teh Rio', 22000, 4000, 30, 'minumantehrio1.jpg'),
(53, 7, 'Floridina', 30000, 5000, 30, 'minumanfloridina1.jpg'),
(54, 1, 'Astri Monica', 1000000, 600, 2, 'images (1)1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_suplier` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `id_kategori`, `nama_suplier`) VALUES
(1, 1, 'PT. HM Sampoerna Tbk'),
(2, 1, 'PT. Bentoel II Tbk'),
(3, 1, 'PT. Nojorono Tobacco Tbk'),
(4, 1, 'PT. Djarum'),
(5, 1, 'PT. Gudang Garam Tbk'),
(6, 1, 'PT. Wismilak IM Tbk'),
(7, 2, 'PT. Indofood Suksses M'),
(8, 2, 'PT. Sentrafood I'),
(9, 2, 'PT. Wicaksana OI Tbk'),
(10, 2, 'PT. ABC President'),
(11, 2, 'PT. Mayora indah Tbk'),
(12, 2, 'PT. Nissin Mas'),
(13, 3, 'PT. Tiga Pilar Sejahtera'),
(14, 3, 'PT. PBS'),
(15, 3, 'PT. Beras Indonesia'),
(16, 4, 'PT. Unilever'),
(17, 4, 'PT. Lion Wings'),
(18, 4, 'PT. Enzym B.I'),
(19, 5, 'PT. Sayap Mas Utama'),
(20, 5, 'PT. Cussons Indonesia'),
(21, 5, 'PT. Adimulia S.I'),
(22, 6, 'PT. Mayora Indah'),
(23, 6, 'PT. Siantar Top'),
(24, 6, 'PT. Sekar Laut'),
(25, 7, 'PT. Sinar Sosro'),
(26, 7, 'PT. Mayora Indah'),
(27, 7, 'PT. Tirta Alam Segar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_trans` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_trans`, `user_id`, `created`, `status`) VALUES
(1, 3, '0000-00-00 00:00:00', 1),
(2, 6, '0000-00-00 00:00:00', 0),
(3, 3, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transdet` int(11) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transdet`, `trans_id`, `user`, `produk_id`, `harga`, `berat`, `total_qty`, `total_berat`, `subtotal`) VALUES
(1, 1, 3, 19, 2700, 190, 1, 190, 2700),
(2, 2, 6, 15, 30000, 30, 1, 30, 30000),
(3, 2, 6, 1, 24000, 20, 1, 20, 24000),
(4, 3, 3, 26, 90000, 10000, 3, 30000, 270000),
(5, 3, 3, 17, 3000, 190, 6, 1140, 18000),
(6, 3, 3, 35, 2500, 200, 8, 1600, 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `nama_toko` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `email`, `no_tlp`, `nama_toko`, `alamat`, `password`, `role_id`) VALUES
(3, '0303150262', 'yusup junaedi2', 'nendyyusup79@gmail.com', '0857950707072', 'berkah cipta media2', 'kp.sungareun 03/06 ds.prianganjaya sukalarang sukabumi2', '$2y$10$tdWFZDhmXt.M2VTAYx0L0OZvxLKrUvwhMnYKXys7g32/6rNjfBt7u', 1),
(4, '1919119999', 'Admin', 'admin@gmail.com', '085795070707', 'admin', 'sukabumi', '$2y$10$jw7YLQDu81Qn0NYZ74cdj.7szKAqWAFDzOJozLJmp4e7pQjgoqfvS', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transdet`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_trans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transdet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
