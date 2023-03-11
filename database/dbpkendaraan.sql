-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 04:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpkendaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `nama`, `no_telp`, `alamat`) VALUES
(2, 'Johan Liebert', '089712345678', 'Depok Baru'),
(4, 'Leo Tsukinaga', '0891236172321', 'Kp. Citayam');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `idjkendaraan` int(11) NOT NULL,
  `jenis` enum('mobil','motor') NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`idjkendaraan`, `jenis`, `biaya`) VALUES
(1, 'mobil', 25000),
(3, 'motor', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `idlayanan` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`idlayanan`, `jenis_layanan`, `biaya`) VALUES
(1, 'Cuci Kilat', 7000),
(3, 'Cuci Biasa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `idpendaftar` int(11) NOT NULL,
  `antrean` varchar(50) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`idpendaftar`, `antrean`, `idcustomer`, `tgl_pendaftaran`) VALUES
(1, 'A1-1', 2, '2023-03-31'),
(3, 'A1-2', 4, '2023-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `no_nota` varchar(20) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `idjkendaraan` int(11) DEFAULT NULL,
  `idlayanan` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `metode_bayar` enum('cash','transfer') DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `no_nota`, `idcustomer`, `idjkendaraan`, `idlayanan`, `total_bayar`, `metode_bayar`, `tgl_transaksi`, `catatan`) VALUES
(1, '000A/01', 2, 1, 1, 32000, 'transfer', '2023-03-01', '-');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `hitung_total_bayar` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
    DECLARE total INT;
    SELECT (j.biaya + l.biaya) INTO total
    FROM jenis_kendaraan j
    JOIN layanan l ON l.idlayanan = NEW.idlayanan
    WHERE j.idjkendaraan = NEW.idjkendaraan;
    SET NEW.total_bayar = total;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `email`, `password`) VALUES
(1, 'admin', 'iniadmin@gmail.com', '$2y$10$QPLLha7mHKKqJiW3hyF1EeBpRrTyaCmEe6CcIUsTt5PMYz9f8TbQW'),
(2, 'leo', 'leoleo@gmail.com', '$2y$10$wJn2paJpZagkXuRrFEcsUOb1HJC5A5t700SOpFHT6OmNwzHgrhNce');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwpendaftar`
-- (See below for the actual view)
--
CREATE TABLE `vwpendaftar` (
`idpendaftar` int(11)
,`antrean` varchar(50)
,`nama` varchar(100)
,`tgl_pendaftaran` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtransaksi`
-- (See below for the actual view)
--
CREATE TABLE `vwtransaksi` (
`idtransaksi` int(11)
,`no_nota` varchar(20)
,`nama` varchar(100)
,`jenis_layanan` varchar(50)
,`total_bayar` int(11)
,`metode_bayar` enum('cash','transfer')
,`tgl_transaksi` date
,`catatan` text
,`jenis` enum('mobil','motor')
);

-- --------------------------------------------------------

--
-- Structure for view `vwpendaftar`
--
DROP TABLE IF EXISTS `vwpendaftar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwpendaftar`  AS SELECT `p`.`idpendaftar` AS `idpendaftar`, `p`.`antrean` AS `antrean`, `c`.`nama` AS `nama`, `p`.`tgl_pendaftaran` AS `tgl_pendaftaran` FROM (`pendaftaran` `p` join `customer` `c` on(`p`.`idcustomer` = `c`.`idcustomer`))  ;

-- --------------------------------------------------------

--
-- Structure for view `vwtransaksi`
--
DROP TABLE IF EXISTS `vwtransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtransaksi`  AS SELECT `t`.`idtransaksi` AS `idtransaksi`, `t`.`no_nota` AS `no_nota`, `c`.`nama` AS `nama`, `l`.`jenis_layanan` AS `jenis_layanan`, `t`.`total_bayar` AS `total_bayar`, `t`.`metode_bayar` AS `metode_bayar`, `t`.`tgl_transaksi` AS `tgl_transaksi`, `t`.`catatan` AS `catatan`, `j`.`jenis` AS `jenis` FROM (((`transaksi` `t` join `customer` `c` on(`t`.`idcustomer` = `c`.`idcustomer`)) join `layanan` `l` on(`t`.`idlayanan` = `l`.`idlayanan`)) join `jenis_kendaraan` `j` on(`t`.`idjkendaraan` = `j`.`idjkendaraan`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`idjkendaraan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`idlayanan`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`idpendaftar`),
  ADD KEY `idcustomer` (`idcustomer`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idcustomer` (`idcustomer`),
  ADD KEY `idjkendaraan` (`idjkendaraan`),
  ADD KEY `idlayanan` (`idlayanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `idjkendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `idlayanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `idpendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idjkendaraan`) REFERENCES `jenis_kendaraan` (`idjkendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`idlayanan`) REFERENCES `layanan` (`idlayanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
