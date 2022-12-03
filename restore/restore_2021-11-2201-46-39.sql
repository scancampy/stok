#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin Stok', '2021-11-22 12:33:15', 'active');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('adminponi', '5f4dcc3b5aa765d61d8327deb882cf99', 'Poni 2', NULL, 'active');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('siaphapus', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bisa dihapus', NULL, 'deleted');


#
# TABLE STRUCTURE FOR: barang
#

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `idbarang` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `min_stok` double NOT NULL DEFAULT 1,
  `kode` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_satuan` double NOT NULL DEFAULT 1,
  `satuan_besar` varchar(50) NOT NULL,
  `satuan_kecil` varchar(50) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('2', 'Sapu Lidi 2', '', 'Sapu lidi aja 2', '100', 'BR-003', 'active', '1', 'lusin', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('3', 'Vacuum Cleaner', '', 'Automatic Vacumm Cleaner', '1', 'BR-002', 'deleted', '1', 'buah', 'buah');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('4', 'Pembersih Kaca', '', 'Pembersih kaca', '10', 'BR-005', 'active', '1', 'buah', 'buah');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('5', 'Cek 1', '', 'kwogko', '155', 'BR-006', 'active', '1', 'lusin', 'lot');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('6', 'Tas', '', 'gwegwg', '80.44', 'BR-007', 'active', '1', 'buah', 'buah');


#
# TABLE STRUCTURE FOR: barang_hilang
#

DROP TABLE IF EXISTS `barang_hilang`;

CREATE TABLE `barang_hilang` (
  `nomor_nota` varchar(30) NOT NULL,
  `idgudang_asal` int(11) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `jumlah_besar` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('001-TRAB', 2, '4', '44', '55.12', 'ewegweg', '2021-09-14 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('SIAPHAPUSHILANG', 1, '5', '10', '55', 'fwefk', '2021-09-26 00:00:00', 'deleted');


#
# TABLE STRUCTURE FOR: detil_pembelian
#

DROP TABLE IF EXISTS `detil_pembelian`;

CREATE TABLE `detil_pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idbarang`,`harga`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '2', '3523525', '11', '33', 'USD', '13000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '4', '23525', '44', '125', 'USD', '13000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '4', '124215.25', '11.55', '10.05', 'USD', '13000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BB123', '4', '1244555', '10', '6', 'USD', '13000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('egegj', '4', '2235', '5', '1', 'USD', '13000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('siaphapus', '4', '1001010', '5', '5', 'USD', '13000', 1);


#
# TABLE STRUCTURE FOR: detil_pembelian_saham
#

DROP TABLE IF EXISTS `detil_pembelian_saham`;

CREATE TABLE `detil_pembelian_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsaham` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idsaham`,`harga`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('00006', '3', '60000', '5', '15', 'USD', '13000', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('0145', '4', '15000', '10', '10', 'USD', '13000', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('0545', '3', '15000', '100', '10', 'USD', '13000', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BELISHM1', '2', '674747', '89', '77.9', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BELISHM1', '3', '34534', '66', '6', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('fefwegg', '3', '24241', '5', '2', 'USD', '13000', 1);


#
# TABLE STRUCTURE FOR: detil_penjualan
#

DROP TABLE IF EXISTS `detil_penjualan`;

CREATE TABLE `detil_penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idbarang`,`harga`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1231415', '4', '1000000', '5', '5', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3275285738', '4', '100000', '1', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('346363', '4', '190000', '10', '10', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('463634634', '2', '43636', '6', '8', 'SGD', '10600', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('463634634', '4', '7547474', '5', '6', 'SGD', '10600', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('aege', '5', '3535', '14', '1', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('afsas', '4', '12323', '10', '4', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('COBATES', '4', '5536346.5757', '55.77', '66.34', 'SGD', '10600', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('DESK', '4', '12345.646', '55.566', '10', 'SGD', '10600', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('gwgwg', '4', '325252', '6', '5', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TESBARU', '2', '23424', '11.44', '10', 'SGD', '1060099', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TESBARU', '4', '123123123', '5', '4', 'USD', '13000', 1);


#
# TABLE STRUCTURE FOR: detil_penjualan_saham
#

DROP TABLE IF EXISTS `detil_penjualan_saham`;

CREATE TABLE `detil_penjualan_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsaham` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idsaham`,`harga`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('0004', '3', '70000', '10', '100', 'USD', '13000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('00145', '4', '14000', '1000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('00456', '4', '15000', '10', '100', 'Rupee', '24000.4412', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('ads', '3', '155', '1', '1', 'USD', '13000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('COBAJUALSAHAM', '4', '134', '4', '5', 'SGD', '1060099', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('fewf', '4', '2424', '4', '1', 'USD', '13000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('gege', '3', '352352', '55', '10', 'USD', '13000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TRSSAHAM', '2', '32352', '1', '4', 'USD', '13000', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TRSSAHAM', '3', '234235', '10', '10', 'USD', '13000', 1);


#
# TABLE STRUCTURE FOR: detil_retur_pembelian
#

DROP TABLE IF EXISTS `detil_retur_pembelian`;

CREATE TABLE `detil_retur_pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga_retur` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idbarang`,`harga_retur`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('feg', '5', '144', '1', '1', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('JUIK', '2', '1500000', '1', '6', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETUR B1', '4', '121455', '11.25', '10.5', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETUR BARU', '4', '35353.55', '55.2', '11.4', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('SILAHHAPUS', '4', '155355', '5', '2', 1);


#
# TABLE STRUCTURE FOR: detil_retur_penjualan
#

DROP TABLE IF EXISTS `detil_retur_penjualan`;

CREATE TABLE `detil_retur_penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga_retur` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`,`idbarang`,`harga_retur`,`urutan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('ABC123', '4', '12444.22', '30.45', '10.22', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('geeg', '4', '1245', '5', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETUR C', '2', '2525.55', '10.5', '55.22', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETURA', '2', '23424.255', '54.344', '10.56', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETURA', '2', '12423423.3344', '12.56', '11.55', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('SIAPHAPUS', '2', '325325', '55', '353', 1);


#
# TABLE STRUCTURE FOR: gudang
#

DROP TABLE IF EXISTS `gudang`;

CREATE TABLE `gudang` (
  `idgudang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`idgudang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (1, 'Margomulyo', 'Margomulyo', '124225', 'ggrokgr', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (2, 'Rungkut', 'Rungkut', '55959', 'erorgkk', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (3, 'gege', 'eree', '2325235', 'nntnt', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (4, 'Margomulyo 3', 'Margomulyo', '124225', 'ggrokgr', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (5, 'Margomulyo 2', 'Margomulyo', '124225', 'ggrokgr', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (6, 'TSFF', 'eryery', '23525', 'ereye', 'active');


#
# TABLE STRUCTURE FOR: hutangpiutang
#

DROP TABLE IF EXISTS `hutangpiutang`;

CREATE TABLE `hutangpiutang` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` text NOT NULL,
  `idrekening` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis` enum('hutang','piutang','','') NOT NULL,
  `idkurs` int(11) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000004', '5', '2021-09-01 00:00:00', '150000', 'Bayar piutang ke linda', '4', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000005', '1', '2021-10-10 00:00:00', '150000', 'Bayar hutang linda', '1', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000006', '1', '2021-10-10 00:00:00', '90000', 'Bayar piutang linda', '4', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('10', '0', '2021-11-07 00:00:00', '12153', 'rehh', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('11', '1', '2021-11-07 00:00:00', '14241', 'asd', '4', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('12', '1', '2021-11-07 00:00:00', '14214', 'ggwee', '4', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('13', '1', '2021-11-07 00:00:00', '124214', 'fefe', '0', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('7', '0', '2021-11-07 00:00:00', '14124124', 'regreg', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('8', '0', '2021-11-07 00:00:00', '5235', 'erh', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('9', '0', '2021-11-07 00:00:00', '1525', '23', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('BOLEHHAPUS', '1', '2021-09-20 00:00:00', '523525', 'egwegwg', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('HUT1', '5', '2021-09-22 00:00:00', '12314.555', '235rt ret', '1', 'active', 'hutang', 3);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('PIUTANG11', '1', '2021-10-05 00:00:00', '1233.555', 'piutang keterangan', '1', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('SIAPHAPUS', '5', '2021-09-27 00:00:00', '235252', 'fwefwg', '1', 'deleted', 'piutang', 2);


#
# TABLE STRUCTURE FOR: kota
#

DROP TABLE IF EXISTS `kota`;

CREATE TABLE `kota` (
  `idkota` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `urutan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`idkota`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('1', 'Surabaya', '3', 'Kota Surabaya', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('2', 'Kediri', '5', 'Jawa Timur, Kediri', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('3', 'Malang', '2', 'Jawa Timur Malang', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('4', 'Sidoarjo', '1', 'Jawa Timur', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('5', 'hihiu', '5', 'fhf', 'deleted');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('6', 'Jombang', '4', 'Jawa Timur', 'active');


#
# TABLE STRUCTURE FOR: kurs
#

DROP TABLE IF EXISTS `kurs`;

CREATE TABLE `kurs` (
  `idkurs` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(70) NOT NULL,
  `nilai_rupiah` double DEFAULT NULL,
  `lambang` varchar(10) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`idkurs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (1, 'US Dollar', '13000', 'USD', 1, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (2, 'Yen Japan', '130', 'JPY', 3, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (3, 'Singapore Dollar', '1060099', 'SGD', 4, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (4, 'Bisa Hapus', '25235', 'B', 2, 'deleted');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (5, 'RUPEE', '24000.4412', 'Rupee', 4, 'active');


#
# TABLE STRUCTURE FOR: pelanggan
#

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `idpelanggan` bigint(20) NOT NULL AUTO_INCREMENT,
  `idkota` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `kode` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `saldo_awal` double NOT NULL,
  PRIMARY KEY (`idpelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('1', '3', 'Linda', 'Malang kota', '2525235', 'James', 'egwegwe', 'CEK134', 'active', '1500000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('2', '6', 'Test Kentang', 'Purimas Legian Paradise H3/25', '+6285850745583', 'UUI', 'frgwgweg', 'PL-002', 'deleted', '10000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('3', '4', 'Bisa hapus', 'wegwge', '624634636', 'wegokwgo', 'weg', 'PL-003', 'deleted', '2523525');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('4', '1', 'Tes Bauh', 'Purimas', '8329823948394', 'wgwg', 'Keterangan purimas', 'PL-005', 'deleted', '14000001');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('5', '1', 'Toni', 'Sukolilo', '25226463', 'Udin', 'Keterangan Sukolilo', 'PL-005', 'active', '15000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('6', '1', 'Test Bawang', 'Purimas', '8329823948394', 'wgwg', 'Keterangan purimas', 'PL-005', 'active', '14000001');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('7', '1', 'Test amr', 'Purimas', '8329823948394', 'Iku', 'Keterangan purimas', 'PL-005', 'active', '14000001');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('8', '1', 'Budi', 'Tes', '3525252', 'Budi', 'egwge6', 'BUD1', 'active', '8786.8899');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('9', '1', 'efokweo', 'wegwg', '322525', 'q3we', 'wegwegw', 'TES1234', 'active', '33525252');


#
# TABLE STRUCTURE FOR: pembelian
#

DROP TABLE IF EXISTS `pembelian`;

CREATE TABLE `pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsupplier` bigint(20) NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `nilai_rupiah` double NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('BARUBELI', '1', '2021-09-03 00:00:00', '2021-09-30 00:00:00', 'KET BARU', '1', 'active', 'BARUFAK', 1, '13000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('BB123', '5', '2021-10-02 00:00:00', '2021-09-21 00:00:00', 'TEST 123', '1', 'active', 'FAKTONI', 1, '13000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('egegj', '0', '2021-11-05 00:00:00', '2021-11-05 00:00:00', 'rhe', '1', 'active', 'rr2', 1, '13000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('siaphapus', '1', '2021-09-17 00:00:00', '2021-09-20 00:00:00', 'tes', '1', 'deleted', 'siap hapus', 1, '13000');


#
# TABLE STRUCTURE FOR: pembelian_saham
#

DROP TABLE IF EXISTS `pembelian_saham`;

CREATE TABLE `pembelian_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('00006', '9', '2021-10-10 00:00:00', 'jual saham', 'active', 1, '0', '');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('0145', '1', '2021-10-17 00:00:00', 'weg', 'active', 1, '1', 'TES123');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('0545', '6', '2021-10-17 00:00:00', 'Avafe', 'active', 1, '0', '');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('BELISHM1', '1', '2021-09-08 00:00:00', 'Beli saham 2', 'active', 2, '0', '');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('fefwegg', '1', '2021-11-05 00:00:00', 'fefef', 'active', 1, '1', '-');


#
# TABLE STRUCTURE FOR: penjualan
#

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal_jual` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `nilai_rupiah` double NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1231415', '5', '2021-09-16 00:00:00', '2021-09-30 00:00:00', '', '2', 'active', '12535Aff3', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3275285738', '1', '2021-09-01 00:00:00', '2021-09-30 00:00:00', '', '2', 'active', 'FAK-445566', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('346363', '1', '2021-09-23 00:00:00', '2021-09-28 00:00:00', '', '1', 'active', '32525', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('463634634', '5', '2021-09-15 00:00:00', '2021-09-28 00:00:00', '', '1', 'active', '654', 3, '10600');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('aege', '0', '2021-11-05 00:00:00', '2021-11-05 00:00:00', 'rgrg', '1', 'active', 'Cwgeg', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('afsas', '1', '2021-09-01 00:00:00', '2021-10-09 00:00:00', 'Gudang Rungkut', '2', 'active', 'ewgwg', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('BISAHAPUS', '6', '2021-09-09 00:00:00', '2021-09-22 00:00:00', '', '1', 'deleted', 'AFWF', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('COBATES', '5', '2021-09-15 00:00:00', '2021-09-29 00:00:00', 'TES COBA', '2', 'active', 'TESCOBA', 3, '10600');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('DESK', '7', '2021-09-01 00:00:00', '2021-09-30 00:00:00', 'Yus Desk', '2', 'active', 'YusDesk', 3, '10600');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('gwgwg', '1', '2021-09-23 00:00:00', '2021-09-13 00:00:00', 'wgwgewe', '1', 'active', '322523', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('TESBARU', '1', '2021-10-26 00:00:00', '2021-12-26 00:00:00', 'wewf', '2', 'active', 'kwqkw', 3, '1060099');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('UUYSD', '5', '2021-09-15 00:00:00', '2021-09-30 00:00:00', 'Feewf', '1', 'active', 'TED', 1, '13000');


#
# TABLE STRUCTURE FOR: penjualan_saham
#

DROP TABLE IF EXISTS `penjualan_saham`;

CREATE TABLE `penjualan_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('0004', '6', '2021-10-10 00:00:00', 'Jual SAHAM', 'active', 1, '0', '');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('00145', '1', '2021-10-17 00:00:00', 'yen sjas', 'active', 2, '0', '');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('00456', '1', '2021-10-17 00:00:00', 'wegewg', 'active', 5, '2', 'FAk123');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('ads', '0', '2021-11-05 00:00:00', 'ewg', 'active', 1, '1', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('COBAJUALSAHAM', '5', '2021-11-03 00:00:00', 'wegwg', 'active', 3, '1', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('fewf', '1', '2021-11-05 00:00:00', 'geg', 'active', 1, '1', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('gege', '1', '2021-10-24 00:00:00', 'wwgwe', 'active', 1, '1', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('TRSSAHAM', '1', '2021-09-21 00:00:00', 'trsaham 2', 'active', 1, '0', '');


#
# TABLE STRUCTURE FOR: rekening
#

DROP TABLE IF EXISTS `rekening`;

CREATE TABLE `rekening` (
  `idrekening` bigint(20) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `saldo_awal` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `kode` varchar(50) NOT NULL,
  PRIMARY KEY (`idrekening`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('1', '2335325', 'BCA', 'weg', '140000', 'active', 'REK-01');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('2', '12313141241', 'Mandiri Tbk', 'Normal', '15000000', 'active', 'MAN02');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('3', '52352', 'bisa hapus', 'srgj', '53262', 'deleted', '28492849');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('4', '1332523236', 'BCA', 'Tes', '13356.573', 'active', 'BCA01');


#
# TABLE STRUCTURE FOR: retur_pembelian
#

DROP TABLE IF EXISTS `retur_pembelian`;

CREATE TABLE `retur_pembelian` (
  `nomor_nota` varchar(100) NOT NULL,
  `idsupplier` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idgudang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('feg', '0', '2021-11-05 00:00:00', 1, 'egweg', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('JUIK', '5', '2021-09-13 00:00:00', 2, 'JUIK', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('RETUR B1', '6', '2021-11-30 00:00:00', 1, 'RETUR BELI', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('RETUR BARU', '1', '2021-09-28 00:00:00', 1, 'TES', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('SILAHHAPUS', '1', '2021-09-22 00:00:00', 1, 'egeg', 'active');


#
# TABLE STRUCTURE FOR: retur_penjualan
#

DROP TABLE IF EXISTS `retur_penjualan`;

CREATE TABLE `retur_penjualan` (
  `nomor_nota` varchar(100) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idgudang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('ABC123', '5', '2021-10-15 00:00:00', 2, 'og okweg owekg', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('geeg', '1', '2021-11-05 00:00:00', 1, 'eweg', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('RETUR C', '1', '2021-09-29 00:00:00', 1, 'RETUR C', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('RETURA', '1', '2021-09-16 00:00:00', 2, 'Gudang Rungkut', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('SIAPHAPUS', '7', '2021-10-01 00:00:00', 2, 'reherh', 'deleted');


#
# TABLE STRUCTURE FOR: saham
#

DROP TABLE IF EXISTS `saham`;

CREATE TABLE `saham` (
  `idsaham` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `min_stok` double NOT NULL DEFAULT 1,
  `kode` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_satuan` double NOT NULL DEFAULT 1,
  `satuan_besar` varchar(50) NOT NULL,
  `satuan_kecil` varchar(50) NOT NULL,
  PRIMARY KEY (`idsaham`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('1', 'BCA2', '', 'fkso2', '1000', 'SH02', 'deleted', '1', 'lot2', 'lot2');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('2', 'Saham A', '', 'Saham A', '1.77', 'SH11', 'active', '1', 'Lot', 'Lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('3', 'Saham 2', '', 'sahamm 2', '998', 'SH2', 'active', '1', 'Lot', 'Lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('4', 'Saham 3', '', 'owkro', '10.5', 'SH3', 'active', '1', 'Lot', 'Lembar');


#
# TABLE STRUCTURE FOR: transaksi_bank
#

DROP TABLE IF EXISTS `transaksi_bank`;

CREATE TABLE `transaksi_bank` (
  `idtransfer` varchar(100) NOT NULL,
  `idrekening_asal` bigint(20) NOT NULL,
  `idrekening_tujuan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` double NOT NULL,
  `keterangan_asal` text NOT NULL,
  `keterangan_tujuan` text NOT NULL,
  `jenis_transaksi` enum('masuk','keluar','','') NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`idtransfer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('001-2341', '2', '4', '2021-09-20 00:00:00', '150000', 'keterangan asal mandiiri', 'keterangan tujuan bca', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('002-AA1', '1', '4', '2021-09-28 00:00:00', '1555115', 'Tes', 'egwg', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('3', '0', '0', '2021-10-24 00:00:00', '1515', 'eg', 'egg', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('4', '4', '1', '2021-10-24 00:00:00', '566777', 'wgwg', 'ewegwe', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('5', '4', '2', '2021-10-24 00:00:00', '555555', 'geg', 'weg', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('siaphapus', '4', '2', '2021-09-29 00:00:00', '144566', 'wegwg', 'ffwf', 'keluar', 'active');


#
# TABLE STRUCTURE FOR: transfer_barang
#

DROP TABLE IF EXISTS `transfer_barang`;

CREATE TABLE `transfer_barang` (
  `nomor_nota` varchar(30) NOT NULL,
  `idgudang_asal` int(11) NOT NULL,
  `idgudang_tujuan` int(11) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `jumlah_besar` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`nomor_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('002-TT33', 1, 2, '2', '11', '55.3', 'beerre', '2021-09-23 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('SIAPHAPUS', 2, 1, '2', '140', '555', 'kete', '2021-09-07 00:00:00', 'deleted');


