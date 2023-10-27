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

INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin1', '2023-10-06 03:28:15', 'active');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('adminponi', '5f4dcc3b5aa765d61d8327deb882cf99', 'Poni 2', NULL, 'deleted');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('devi', 'f5c2db1f19bdde37e740e86b70d0534f', 'devi lissan', NULL, 'deleted');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('diana', '21232f297a57a5a743894a0e4a801fc3', 'lie diana', NULL, 'deleted');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('dv', 'f5c2db1f19bdde37e740e86b70d0534f', 'devi', '2023-03-26 05:38:45', 'active');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('dv123', 'f5c2db1f19bdde37e740e86b70d0534f', 'devi ', NULL, 'active');
INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES ('dvl', '5f4dcc3b5aa765d61d8327deb882cf99', 'devi lissan', NULL, 'deleted');
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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4;

INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('2', 'Sapu Lidi 2', '', 'Sapu lidi aja 2', '100', 'lidi', 'deleted', '1', 'ikat', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('3', 'Vacuum Cleaner', '', 'Automatic Vacumm Cleaner', '1', 'BR-002', 'deleted', '1', 'buah', 'buah');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('4', 'Pembersih Kaca', '', 'Pembersih kaca', '10', 'BR-005', 'deleted', '1', 'buah', 'buah');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('5', 'Cek 1', '', 'kwogko', '155', 'BR-006', 'deleted', '1', 'lusin', 'lot');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('6', 'Tas', '', 'gwegwg', '80.44', 'BR-007', 'deleted', '1', 'buah', 'buah');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('7', 'pala bunga', '', '', '1', 'pala', 'deleted', '1', 'koli', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('8', 'merica hitam', '', '', '1', 'mh', 'deleted', '1', 'koli', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('9', 'bunga pala', '', 'ambon', '0', 'bp', 'active', '1', 'koli', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('10', 'baju ', '', 'okkk', '100', 'bj', 'deleted', '1', 'lusin', 'lembar');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('11', 'merica hitam', '', 'ss', '1', 'mrcht', 'active', '1', 'koli', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('12', 'cengkeh', '', '0', '0', 'ck', 'active', '1', 'colly', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('13', 'botol', '', '', '0', 'btl', 'deleted', '1', 'dos', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('14', 'kedawung', '', 'kg', '1', 'kdw', 'deleted', '1', 'colly', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('15', 'merica putih', '', 'abc', '1', 'mrcpt', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('16', 'baterei baru', '', '', '1', 'baterei', 'deleted', '1', 'dos.', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('17', 'kedawung', '', '0', '1', 'kdw', 'active', '1', 'karung', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('18', 'kemiri', '', 'tsn', '1', 'kmr', 'active', '1', 'karung', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('19', 'mente glondong', '', 'abcdefg', '1', 'mente', 'active', '1', 'colli', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('20', 'gagang cengkeh', '', '', '1', 'ggck', 'active', '1', 'karung', 'kilo');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('21', 'kelopak cengkeh', '', '', '1', 'klpck', 'active', '1', 'krg', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('22', 'kopra', '', '', '1', 'kpr', 'active', '1', 'krg', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('23', 'wijen makassar', '', '', '1', 'wjn', 'active', '1', 'krg', 'kilogram');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('24', 'ctgroup.', '', '', '1', 'cg', 'active', '1', 'lbr', 'lbr');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('25', 'saham bri.', '', '', '1', 'bri', 'active', '1', 'lbr', 'lbr');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('26', 'handuk', '', 'baru bekas', '2', 'hdk', 'active', '1', 'lembar ', 'lembar');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('27', 'baju renang', '', '', '1', 'bjr', 'active', '1', 'lusin', 'lembar');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('28', 'abu cengkeh', '', 'abu', '1', 'abck', 'active', '1', 'krg', 'kgs');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('29', 'cengkeh tua', '', '', '1', 'ckt', 'active', '1', 'krg', ' kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('30', 'polong', '', '', '1', 'pl', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('31', 'baju kaos', '', '', '1', 'bkaos', 'active', '1', 'lusin', 'lbr');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('32', 'biji mati', '', '', '1', 'bm', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('33', 'gagang cengkeh menir', '', '', '1', 'ggckmn', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('34', 'celana panjang', '', 'abc', '1', 'cp', 'active', '1', 'lbr', 'lbr');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('35', 'bolpen', '', '1', '1', 'bolpoint', 'active', '1', 'lusin', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('36', 'kotak', '', '', '1', 'box', 'active', '1', 'biji', 'biji');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('37', 'kacang hijau', '', 'mung bean', '1', 'kch', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('38', 'kacang merah', '', 'red bean', '1', 'kcm', 'active', '1', 'krg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('39', 'diffuser', '', '', '1', 'dff', 'active', '1', 'lusin', 'botol');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('40', 'telur', '', '', '1', 'tlr', 'active', '1', 'kg', 'kg');
INSERT INTO `barang` (`idbarang`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('41', 'sabun batang', '', '', '1', 'sabun', 'active', '1', 'lusin', 'biji');


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
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('10', 18, '12', '229', '23080202', '', '2023-05-13 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('11', 17, '12', '2892', '79392.2', '', '2023-07-09 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('2', 13, '12', '900', '79.999', 'xooo', '2021-11-03 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('3', 19, '15', '100', '60000.368', 'later', '2022-01-05 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('4', 15, '12', '5', '300', '1233', '2022-01-06 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('5', 18, '12', '1', '67.8', '', '2022-07-03 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('6', 18, '12', '1', '100', '', '2022-10-02 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('7', 18, '12', '1', '60.303203', 'cde', '2023-01-08 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('8', 28, '37', '2903', '20838832.222', '', '2023-03-26 00:00:00', 'active');
INSERT INTO `barang_hilang` (`nomor_nota`, `idgudang_asal`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('9', 18, '12', '899', '899201.22', '', '2023-05-13 00:00:00', 'active');
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

INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '17', '46790', '30000.378', '500', 'Rupee', '24000.4412', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '20', '8673', '2500.55', '100', 'Rupee', '24000.4412', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1', '9', '800000', '200', '100', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '9', '135000', '25000.338', '50', 'aud', '15000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '12', '120000', '6720.45', '90', 'aud', '15000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/22', '14', '1000', '10', '100', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '9', '150297.309', '60.2', '1', 'chf', '20000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '33', '10900.9738683', '26.3983973973', '1', 'chf', '20000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10', '2', '108290.98', '1000', '1000000', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '28', '650900', '2500.5', '100', 'aud', '15000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '31', '60000', '12', '1', 'aud', '15000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/23', '12', '135600', '65.29229', '1', 'aud', '15000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/23', '41', '220.123', '233090', '233', 'aud', '15000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11', '12', '110500', '600.449844', '10', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22', '9', '100', '12', '15', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22', '17', '800923.22', '100000', '100', 'JPY', '130', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '12', '108000', '600.65', '10', 'gbp', '19000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '25', '4000', '1000', '1000', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '27', '150900', '12', '1', 'gbp', '19000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '29', '1', '61', '1', 'gbp', '19000', 4);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22', '9', '115000', '25000.4', '50', 'usd', '14500', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22', '22', '10600', '468.9', '5', 'usd', '14500', 4);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22', '26', '77500', '100', '100', 'usd', '14500', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22', '28', '9030', '5000.75', '109', 'usd', '14500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '12', '90773.22', '193893.227879', '909', 'hkd', '2000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '12', '126939', '761000833.22298', '65002', 'hkd', '2000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '28', '90892.3', '79279.33', '65', 'hkd', '2000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('14/22', '27', '45750', '1200', '10', 'aud', '15000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('14/22', '29', '100000', '600', '10', 'aud', '15000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('15/23', '12', '99300.222', '42002.3', '70', 'chf', '20000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('15/23', '12', '120790.23', '482902.33', '80', 'chf', '20000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('15/23', '27', '2903.22', '12', '1', 'chf', '20000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '9', '89.67', '782077', '200', 'gbp', '19000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '13', '280902', '100000', '10', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '9', '900', '60', '1', 'idr', '1', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '13', '250', '1500', '15', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '23', '10092.3022', '109389.19839', '2093', 'krw', '12', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '12', '90500', '80', '4800.68', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '19', '17690', '10', '600.37', 'JPY', '130', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '22', '10962', '890', '89003.12', 'JPY', '130', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/22', '18', '10500', '6000', '100', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/22', '29', '108393.2873933', '10993.3004', '16', 'idr', '1', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/22sh', '9', '3', '15', '1', 'usd', '14500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23', '37', '5090.3', '2974940.2', '7728', 'eur', '15000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23', '38', '3092.3', '1989383.2298', '36', 'eur', '15000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('25', '9', '7500', '1500', '15', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('26', '16', '600', '5005', '50', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3/22', '6', '5000', '200', '2', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3/22sh', '24', '3.17', '200000', '200000', 'usd', '14500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3/23', '30', '5000.20833', '109093093.1', '10903', 'usd', '14500', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3/23', '31', '90000', '12', '1', 'usd', '14500', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/22', '9', '200932', '60000.39784', '100', 'hkd', '2000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/22', '31', '3932.2093', '12', '1', 'hkd', '2000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/22', '33', '25078', '130.39', '5', 'hkd', '2000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('4/21sh', '2', '200000.2', '10', '10', 'USD', '13000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('4/22', '9', '180900', '70000', '100', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('4/22', '19', '23476', '16378.3', '200', 'gbp', '19000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('4/22', '21', '20870', '2500.568', '100', 'gbp', '19000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('5/21', '7', '100500.5', '200000.3', '20', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/2', '9', '20', '5500', '55', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '11', '56500', '5000.889', '100', 'gbp', '19000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '19', '10890', '10000.76', '100', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '21', '67500', '56600', '566', 'gbp', '19000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23', '27', '108397393.222', '12', '1', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/22', '17', '25700', '900.8', '1000', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/22', '20', '45800', '12562.3', '67', 'JPY', '130', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/22', '22', '7090', '9720.2', '90', 'JPY', '130', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/sh', '25', '3500', '5000', '5000', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('52/sh', '25', '3575', '3000', '3000', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('53/sh', '25', '3250', '2000', '2000', 'idr', '1', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23', '12', '135700', '111008393.092', '793839', 'JPY', '130', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '2', '3523525', '33', '11', 'USD', '13000', 3);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '4', '23525', '125', '44', 'USD', '13000', 2);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BARUBELI', '4', '124215.25', '10.05', '11.55', 'USD', '13000', 1);
INSERT INTO `detil_pembelian` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BB123', '4', '1244555', '10', '6', 'USD', '13000', 1);
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

INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '13', '8900', '500000', '5000', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '14', '9689', '200', '2', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('0992', '16', '2093', '6700', '67', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '4', '7866.2', '58900', '589', 'rmb', '2500', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '9', '1400', '89800', '898', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21sh', '5', '1980', '10000', '100', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '5', '568.9', '787800', '7878', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '20', '2008.7', '100', '1', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '20', '9732.33', '30900', '309', 'JPY', '130', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10', '8', '300.9', '1', '100', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '8', '100', '99999900', '999999', 'gbp', '19000', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '16', '1500', '1', '1', 'gbp', '19000', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '16', '1750', '10000', '100', 'gbp', '19000', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22sh', '15', '1235', '90000', '900', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('111', '12', '4800', '59900', '599', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('111', '15', '1000', '276300', '2763', 'JPY', '130', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('111', '17', '1203', '9000', '90', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22sh', '14', '7800', '368300', '3683', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22sh', '17', '1600', '78200', '782', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23SH', '16', '2203.2', '5600', '560', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23SH', '16', '2829.1', '7600', '76', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('15/22', '5', '1500', '10000', '100', 'rmb', '2500', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '8', '119', '10000', '100', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '17', '10993.22', '90900', '909', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '5', '1005', '78500', '785', 'chf', '20000', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '6', '7765', '5600', '56', 'chf', '20000', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '7', '1670', '18900', '189', 'chf', '20000', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22sh', '6', '8000', '5000', '50', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23sh', '18', '32.33783', '9000', '9000', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('25', '6', '550', '3300', '33', 'SGD', '1060099', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/23', '18', '30.892', '5', '5', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/23', '19', '0.09', '767', '767', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '9', '1368', '90009', '90009273', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '10', '21.6', '889', '88900', 'JPY', '130', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '10', '56.39', '5780', '578000', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23sh', '13', '378.12222', '9000', '90', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23sh', '13', '3793.11111', '1000', '10', 'JPY', '130', 3);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23sh', '13', '10893.2', '100', '1', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23', '12', '98933.2', '209300', '2093', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23', '18', '10893.309', '1', '1', 'JPY', '130', 1);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BELISHM1', '2', '674747', '77.9', '89', 'JPY', '130', 2);
INSERT INTO `detil_pembelian_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('BELISHM1', '3', '34534', '6', '66', 'JPY', '130', 1);


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

INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '9', '109980', '3000.449', '15', 'JPY', '130', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '28', '3390', '2500', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1', '8', '109009.2', '900000', '900', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '11', '70000', '5927.3', '100', 'hkd', '2000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '15', '56500', '10079.3', '20', 'hkd', '2000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/22', '14', '250', '12500', '125', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '34', '81798.202902902', '109', '109', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '9', '6857', '10909', '90', 'gbp', '19000', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '18', '10500', '700.89', '35', 'gbp', '19000', 5);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '27', '15760', '60', '5', 'gbp', '19000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '28', '6500', '30', '1', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '29', '145000', '3600', '60', 'gbp', '19000', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22', '30', '3500', '70000.1', '70', 'gbp', '19000', 6);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/23', '12', '140900', '4000.93933', '66', 'aud', '15000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/23', '12', '152357.22', '60.22223', '1', 'aud', '15000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('101', '10', '190000', '200', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22', '9', '600', '125', '9525', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22', '12', '120000', '60', '1', 'idr', '1', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22', '26', '900', '1000', '10', 'idr', '1', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '15', '145000', '2870.9', '55', 'Rupee', '24000.4412', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '19', '15400', '48000.45', '600', 'Rupee', '24000.4412', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '20', '25600', '300.55', '50', 'Rupee', '24000.4412', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '22', '3500', '60000', '10000', 'Rupee', '24000.4412', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22', '27', '12000', '12', '1', 'Rupee', '24000.4412', 5);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1231415', '4', '1000000', '5', '5', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12345', '8', '123123', '23', '2', 'rmb', '1500', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12345', '10', '10000', '100', '10', 'rmb', '1500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13', '9', '150', '1000', '100', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22SH', '19', '20000', '80.5', '1', 'gbp', '19000', 5);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22SH', '20', '25400', '87.5', '2', 'gbp', '19000', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22SH', '23', '2600', '15000.65', '300', 'gbp', '19000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22SH', '27', '109000', '120', '10', 'gbp', '19000', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/22SH', '30', '3500', '60007.5', '1000', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '12', '109909', '65.9999', '1', 'peso', '12', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '12', '137920.22', '36000.9292', '600', 'peso', '12', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '28', '8500.86', '90991783.200282', '9099', 'peso', '12', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23', '28', '9000', '1000733.1222', '10', 'peso', '12', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('16', '9', '72', '125', '12', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '10', '18898', '200', '2400', 'rmb', '2500', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '11', '50000', '2', '100', 'rmb', '2500', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '12', '109000', '100', '6000', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '9', '150000', '2000', '20', 'JPY', '130', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '12', '116500', '60000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '19', '20793', '60.678087', '1', 'JPY', '130', 5);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '20', '12730', '7000', '60', 'JPY', '130', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22', '22', '1326', '2688.2', '100', 'JPY', '130', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/22sh', '12', '200', '10000', '100', 'usd', '14500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '28', '10900.398', '259.35', '10', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '12', '100000', '67', '1', 'idr', '1', 4);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '12', '109000', '60', '1', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '15', '57600', '9000000', '900', 'idr', '1', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22', '23', '11550', '80730', '88', 'idr', '1', 3);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/22', '31', '503.22', '144', '12', 'SGD', '1060099', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23', '37', '10302.3', '30.2979393', '1', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23072023', '28', '18800', '1098280.11', '100', 'SGD', '1060099', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('24/22', '9', '156290', '109093.3', '100', 'eur', '15000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('24/22', '12', '90293.9', '600.39', '10', 'eur', '15000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('24/23', '37', '11869.2', '12079386.42', '9279', 'eur', '15000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('27', '9', '75', '552', '55', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3', '9', '135987', '9867', '10', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3/23', '9', '109392.303093', '240.4984', '20', 'hkd', '2000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('30/23', '31', '15782.093', '24', '2', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('32/2', '20', '25', '2500', '25', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3275285738', '4', '100000', '1', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('33/2', '12', '120000', '6000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('346363', '4', '190000', '10', '10', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('35/2', '17', '600', '3000', '30', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('36/2', '9', '110000', '60', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('38/2', '21', '25', '1500', '15', 'usd', '14500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('4/21sh', '5', '100000', '10', '10', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('463634634', '2', '43636', '6', '8', 'SGD', '10600', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('463634634', '4', '7547474', '5', '6', 'SGD', '10600', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('5', '16', '25', '100', '10', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('5/21', '8', '800000', '100000', '1', 'USD', '13000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('5/22', '14', '500', '100', '10', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('5/22sh', '24', '3.1572385', '200000', '200000', 'usd', '14500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '12', '109000', '36000', '600', 'SGD', '1060099', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '20', '15000', '800', '20', 'SGD', '1060099', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23', '31', '3792303.222', '263833', '2322', 'rmb', '2000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23', '39', '380839', '600', '50', 'rmb', '2000', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/22', '9', '130750', '7000', '100', 'Rupee', '24000.4412', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('51/22', '12', '108750', '60.6', '1', 'Rupee', '24000.4412', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('52/22', '17', '20700', '400', '10', 'JPY', '130', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('52/22', '22', '2985', '400.56', '10', 'JPY', '130', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('555', '8', '5000', '111', '324', 'rmb', '1500', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('555', '10', '10000', '123', '12', 'rmb', '1500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('6/22', '13', '600', '50', '5', 'idr', '1', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('6/22sh', '24', '68.1', '2000', '2000', 'usd', '14500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('7', '13', '23', '330', '33', 'rmb', '2500', 1);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23', '12', '150283', '5400.93397', '90', 'chf', '20000', 2);
INSERT INTO `detil_penjualan` (`nomor_nota`, `idbarang`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23', '41', '197373839.2', '24', '2', 'chf', '20000', 1);
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

INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('011', '16', '2793.2', '9000', '90', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '12', '9999', '5600', '560', 'gbp', '19000', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('021022', '16', '2090', '1000', '10', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1', '5', '1900', '20000', '20000', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1', '6', '7900', '2500', '25', 'JPY', '130', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1', '7', '2100', '8900', '89', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '5', '1980', '100', '10000', 'idr', '1', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '7', '1908.27', '90', '9000', 'idr', '1', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/21', '8', '267.89', '45', '4500', 'idr', '1', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/22sh', '3', '68.31', '2000', '7000', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '12', '8763.53', '2300', '23', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('1/23', '16', '2973.2', '1000', '10', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10', '3', '10900', '100', '1', 'Rupee', '24000.4412', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '6', '7125', '5500', '55', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '9', '1675', '28900', '289', 'JPY', '130', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('10/22sh', '16', '1900', '10000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22sh', '5', '900', '10000', '100', 'JPY', '130', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22sh', '12', '10890', '90900', '909', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('11/22sh', '13', '8105', '6780000', '6780', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('111', '6', '9801', '5000', '50', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('111', '14', '11290', '99900', '999', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('12/22sh', '18', '40.57933', '100', '100', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23SH', '16', '3821.2', '90000', '900', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('13/23SH', '16', '20993.2', '100', '1', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('15/22', '6', '12', '10000', '100', 'aud', '15000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '5', '90900', '999', '999', 'aud', '15000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '6', '7500', '982200', '9822', 'aud', '15000', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2', '7', '2090', '100000', '1000', 'aud', '15000', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '13', '8934.22', '90900', '909', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('2/23', '15', '900.283', '837800', '8378', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('20/23', '6', '39839.2083198', '100', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('20/23', '8', '112.37339', '9000', '90', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22sh', '6', '7600', '5000', '50', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22sh', '7', '1880', '900000', '9000', 'JPY', '130', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('22/22sh', '8', '202', '56700', '567', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/22sh', '6', '8500', '100', '1', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23', '16', '1500', '2300', '23', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('23/23', '23', '302', '9000', '90', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3', '5', '2000', '5690', '5690', 'gbp', '19000', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3', '6', '7900', '1000', '10', 'gbp', '19000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('3', '7', '2150', '349000', '349', 'gbp', '19000', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '3', '3.2883', '908628390', '90988', 'JPY', '130', 3);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '6', '8872', '10000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/22', '8', '267', '90000', '900', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23', '13', '39373.1138033', '8900', '89', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('50/23', '13', '39983.2', '10000', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('60/22sh', '11', '78.9', '100', '100', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('60/22sh', '11', '80.9', '900', '900', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23sh', '24', '1273', '2838300', '28383', 'JPY', '130', 2);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('9/23sh', '26', '52', '1090200', '10902', 'JPY', '130', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TESBARU', '11', '150', '4000', '1000', 'chf', '20000', 1);
INSERT INTO `detil_penjualan_saham` (`nomor_nota`, `idsaham`, `harga`, `jumlah_kecil`, `jumlah_besar`, `lambang_kurs`, `konversi_rupiah`, `urutan`) VALUES ('TRSSAHAM', '2', '32352', '4', '1', 'USD', '13000', 2);
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

INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('021022', '28', '3096', '50.8883', '2', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1', '7', '90', '1000', '10', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/21', '9', '135000', '180.9', '3', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/21', '12', '120000', '600.56', '10', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10', '2', '8898.09', '10', '100', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10/22', '12', '109750', '6000.8', '100', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('11/22', '19', '10540', '6000.85', '100', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('11/22', '19', '25600', '8000.5', '100', 3);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('11/22', '25', '4587', '55', '55', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('12/22', '12', '100000', '6000.78', '100', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '12', '90229.90002', '79389238.22', '3683', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '12', '90892', '9930202.222', '883', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '12', '99890', '122.33', '2', 3);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2', '2', '2900', '700', '1', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2', '11', '100.5', '7000000', '10000', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('22/22', '9', '156280', '12', '7038.33', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('22/22', '11', '57600', '56', '30923', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('23/23', '37', '18983.2', '680037.222', '68', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('24/22', '9', '108933', '70.9', '1', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('24/22', '21', '15750', '10000.39', '10', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('30/22', '27', '892839.2982', '18', '7', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('30/22', '28', '140791', '10838382.398', '28938', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50//22', '9', '109270', '60000.68', '100', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50//22', '12', '109000', '12000.7979', '200', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/22', '9', '135000', '8000.75', '800', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/22', '20', '26300', '9800.75', '98', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/22', '22', '3467', '2000.88', '100', 3);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/23', '31', '373932.000273383', '6', '0.5', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('51/22', '12', '109000', '60000.7979', '100', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('51/22', '19', '20600', '8100.57', '90', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('9/23', '12', '135772', '101801.2933', '20903', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('9/23', '35', '100383', '12', '1', 2);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('JUIK', '2', '1500000', '1', '6', 1);
INSERT INTO `detil_retur_pembelian` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('RETUR B1', '4', '121455', '10.5', '11.25', 1);
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

INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('02102022', '28', '2076', '25.95', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1', '10', '99800', '1200', '100', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/21', '11', '57800', '108.09', '2', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/21', '15', '59000', '100.44', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/22', '12', '150', '10', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('1/23', '31', '1090390.20223', '132', '11', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10/22', '9', '100500', '1', '1', 4);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10/22', '17', '9200', '200.56', '10', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10/22', '20', '7500', '5000.68', '200', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('10/22', '31', '10900', '60', '5', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('11/22', '15', '55750', '10000.65', '200', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('11/22', '28', '3500', '5000', '400', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('12/22', '9', '101000', '2000.75', '20', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('12/22', '17', '10900', '7000.48', '32', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('12/22', '28', '20000', '1', '1', 4);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('12/22', '29', '108750', '6000.6', '19', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/22', '11', '89600', '50000', '50', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/22', '18', '19000', '45.7', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/22', '26', '88999', '6', '6', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '12', '109890.222', '3416.552', '56', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '12', '115200.8223648', '1499.2933', '25', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('13/23', '28', '9077.28282', '26.9833', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2', '8', '9800.2', '10', '500', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2/22', '15', '67092', '1099', '55029', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2/22', '15', '80782', '50', '2500.387', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('2/23', '9', '150892', '1002083.298394', '20', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('22/22', '18', '93900', '100', '50000.33', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('22/22', '19', '60200', '200', '12000.56', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('22/22', '22', '2050', '99', '9900', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('23/22', '31', '90000', '6', '0.5', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('23/23', '37', '10000', '15.33', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('25/22', '27', '4592', '120', '10', 3);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('25/22', '28', '10933', '30.404', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('25/22', '29', '80900', '67.4', '1', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('3/23', '20', '25000.3978393', '28001.9832', '109', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('30/23', '35', '12.2903329383', '1080', '90', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('5', '10', '90000', '12', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('5', '11', '89000', '600', '12', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/22', '9', '128000', '120.39', '2', 2);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/22', '12', '109000', '60.66', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('50/23', '39', '89382.2298273', '12', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('52/22', '9', '190000', '1', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('9/23', '12', '130500', '60.33', '1', 1);
INSERT INTO `detil_retur_penjualan` (`nomor_nota`, `idbarang`, `harga_retur`, `jumlah_kecil`, `jumlah_besar`, `urutan`) VALUES ('ABC123', '4', '12444.22', '30.45', '10.22', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (1, 'Margomulyo', 'Margomulyo', '124225', 'TES', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (2, 'Rungkut', 'Rungkut', '55959', 'erorgkk', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (3, 'gege', 'eree', '2325235', 'nntnt', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (4, 'jakarta', 'manyargresik dll', '021-99000655', '123-hs', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (5, 'rungkut industry 3', 'Rungkut', '55959', 'erorgkk', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (6, 'kalianak', 'manyargresik dll', '031-99000655', '123-hs', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (7, 'kalianak 23', 'kalianak 78', '031-9007772', '53/2', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (8, 'a1', 'kalianak 55/1', 'nil', 'tuhshdbj', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (9, 'a1', 'kalianak 55/1', 'nil', '2021', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (10, 'a1', 'kalianak 55/1', 'nil', '2022', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (11, 'a1', 'kalianak 55/1', 'nil', '2023', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (12, 'a1', 'kalianak 55/1', 'nil', '20999999', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (13, 'pluit', 'jawa', '031-88966829', '', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (14, 'pluit', 'jawa', '031-88966829', '', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (15, 'pluit', 'jawa', '031-88966829', 'jakarta 123', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (16, 'romo', 'romokalisari', '031-889278292', 'none', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (17, 'a2', 'kalianak tengah', '031-7316682', 'tengah', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (18, 'a1', 'kalianak depan', '031-7927300', 'depan', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (19, 'a3', 'kalianak belakang', '031-478327846', 'belakang', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (20, 'gudang t', '55t', '1', '', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (21, '55t', '55t', '1', '2022.', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (22, 'citraland', 'citraland', '081123', '', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (23, 'mandiri', 'surabaya', '123', 'gudang saham.', 'deleted');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (24, 'hksp1', 'singapore', '1', 'gudang saham', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (25, 'batal', 'batal', '1', 'gudang batal.', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (26, 'npsp', 'sp', '1', 'singapore', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (27, 'sby1', 'surabaya', '031-20202', '1', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (28, 'wiyung', 'wiyung', '03183783', '', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (29, 'tpr', 'citraland', '0', '1', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (30, 'pakal', 'pakal', '09022893', '1', 'active');
INSERT INTO `gudang` (`idgudang`, `nama`, `alamat`, `telepon`, `keterangan`, `status`) VALUES (31, 'manyar', 'surabaya', '1', '1', 'active');


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
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000006', '10', '2021-10-05 00:00:00', '1000000', '', '1', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000007', '10', '2021-10-11 00:00:00', '100000000', '', '5', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('0000008', '11', '2021-10-20 00:00:00', '1000000', '', '8', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('01', '10', '2021-10-05 00:00:00', '800000', '', '4', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('10', '19', '2021-11-03 00:00:00', '1273839303028', 'dhdjdkd', '9', 'active', 'hutang', 3);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('11', '19', '2021-11-03 00:00:00', '1829277', 'ok test test', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('12', '20', '2021-11-03 00:00:00', '979665432356', '', '10', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('13', '19', '2021-12-01 00:00:00', '111908', 'xxxxx', '6', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('14', '14', '2021-12-01 00:00:00', '10988.988', '', '9', 'active', 'piutang', 5);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('15', '17', '2022-01-05 00:00:00', '10900938.9', '', '6', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('16', '14', '2022-01-05 00:00:00', '88336839.448', '', '9', 'active', 'hutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('17', '19', '2022-01-05 00:00:00', '88933', '', '10', 'active', 'hutang', 5);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('18', '19', '2022-01-05 00:00:00', '308397393', '', '12', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('19', '17', '2022-01-06 00:00:00', '550000', '', '9', 'active', 'hutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('20', '17', '2022-01-06 00:00:00', '750000000', '', '9', 'active', 'piutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('21', '24', '2022-01-07 00:00:00', '10999000', '', '11', 'active', 'piutang', 1);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('22', '24', '2022-01-07 00:00:00', '265000', '', '11', 'active', 'piutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('23', '24', '2022-01-07 00:00:00', '700000', '', '11', 'active', 'hutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('24', '24', '2022-01-07 00:00:00', '535000', '', '11', 'active', 'hutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('25', '24', '2022-01-07 00:00:00', '785000', '', '11', 'active', 'piutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('26', '26', '2022-01-05 00:00:00', '1500000', '', '11', 'active', 'hutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('27', '26', '2022-01-06 00:00:00', '255000', '', '9', 'active', 'hutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('28', '26', '2022-01-06 00:00:00', '125000', '', '11', 'active', 'piutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('29', '26', '2022-01-06 00:00:00', '157500', '', '11', 'active', 'piutang', 12);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('30', '31', '2022-02-11 00:00:00', '1', '', '23', 'active', 'piutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('31', '29', '2009-02-11 00:00:00', '552500', '', '0', 'active', 'hutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('32', '29', '2009-02-11 00:00:00', '1', '', '23', 'active', 'piutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('33', '29', '2009-02-11 00:00:00', '1', '', '16', 'active', 'piutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('34', '34', '2022-05-22 00:00:00', '1909273.78998', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('35', '34', '2022-05-22 00:00:00', '808279.9062', '', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('36', '37', '2022-07-03 00:00:00', '109000000', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('37', '35', '2022-07-03 00:00:00', '900000000', '', '11', 'active', 'hutang', 9);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('38', '49', '2022-07-03 00:00:00', '1000000', '', '18', 'active', 'hutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('39', '35', '2022-07-03 00:00:00', '100000', '', '11', 'active', 'piutang', 9);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('40', '37', '2022-07-03 00:00:00', '782693017930.2783', '', '9', 'active', 'piutang', 5);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('41', '49', '2022-07-03 00:00:00', '55000', 'apa ini', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('42', '37', '2022-07-03 00:00:00', '1', 'test 123 test', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('43', '20', '2022-10-02 00:00:00', '100000', '', '11', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('44', '20', '2022-10-02 00:00:00', '988991', '', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('45', '19', '2022-12-10 00:00:00', '100000000', '123', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('46', '19', '2022-12-10 00:00:00', '0.9093', '', '11', 'active', 'piutang', 8);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('47', '19', '2022-12-10 00:00:00', '90.37', '', '8', 'active', 'piutang', 10);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('48', '6', '2023-01-08 00:00:00', '18090311', '', '34', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('49', '34', '2023-01-08 00:00:00', '10993937.20893', '', '35', 'active', 'hutang', 6);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('50', '21', '2023-01-08 00:00:00', '0.092', '', '34', 'active', 'hutang', 10);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('51', '6', '2023-01-08 00:00:00', '90.2387', '', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('52', '34', '2023-01-08 00:00:00', '0.29893', '', '35', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('53', '21', '2023-01-08 00:00:00', '109339.22', '', '9', 'active', 'piutang', 8);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('54', '37', '2023-02-15 00:00:00', '1093', '', '11', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('55', '37', '2023-02-15 00:00:00', '208931.29', '', '9', 'active', 'piutang', 14);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('56', '57', '2023-02-15 00:00:00', '89992783', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('57', '66', '2023-03-26 00:00:00', '9090.393', '', '37', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('58', '66', '2023-03-26 00:00:00', '3684.203', '', '37', 'active', 'piutang', 7);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('59', '68', '2023-05-13 00:00:00', '1099.22', 'dkdkhdks', '38', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('60', '68', '2023-05-13 00:00:00', '0.19833', '289802-188222', '38', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('61', '68', '2023-05-13 00:00:00', '80383.111', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('62', '68', '2023-05-13 00:00:00', '97933.222', '', '9', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('63', '68', '2000-05-14 00:00:00', '90', 'iu2', '38', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('64', '19', '1990-05-14 00:00:00', '89', 'bca', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('65', '19', '2029-05-14 00:00:00', '8999', 'devi', '38', 'active', 'piutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('66', '62', '2023-07-09 00:00:00', '10892821', '', '39', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('67', '70', '2023-07-09 00:00:00', '89822.1', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('68', '70', '2023-07-09 00:00:00', '0.82', '', '9', 'active', 'hutang', 2);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('69', '69', '2023-07-09 00:00:00', '901.28', '', '11', 'active', 'piutang', 13);
INSERT INTO `hutangpiutang` (`nomor_nota`, `idpelanggan`, `tanggal`, `nominal`, `keterangan`, `idrekening`, `status`, `jenis`, `idkurs`) VALUES ('9', '20', '2021-11-03 00:00:00', '97547909644', '', '6', 'active', 'hutang', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('1', 'Surabaya', '3', 'Kota Surabaya', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('2', 'Kediri', '5', 'Jawa Timur', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('3', 'Malang', '2', 'Jawa Timur ', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('4', 'bandung', '1', 'jawa barat', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('5', 'hihiu', '5', 'fhf', 'deleted');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('6', 'Jombang', '4', 'Jawa Timur', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('7', 'makassar', '6', 'sulawesi selatan', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('8', 'toli-toli', '7', 'sulawesi', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('9', 'solo', '8', 'jawa', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('10', 'semarang', '9', 'jawa', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('11', 'trenggalek', '10', 'jawa timur', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('12', 'semarang', '11', 'jawa barat', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('13', 'ternate', '12', 'sulawesi', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('14', 'ambon', '13', 'maluku', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('15', 'jakarta', '14', 'abc', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('16', 'wonogiri', '15', 'jatim', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('17', 'singapore', '16', 'singapore', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('18', 'manado', '17', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('19', 'luwuk', '18', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('20', 'samarinda', '19', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('21', 'bau bau', '20', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('22', 'rangkas bitung', '21', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('23', 'china', '22', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('24', 'jember', '23', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('25', 'malaysia', '24', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('26', 'penang', '25', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('27', 'purwokerto', '26', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('28', 'singaraja', '27', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('29', 'kendari', '28', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('30', 'bali', '29', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('31', 'tulung agung', '30', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('32', 'boyolali', '31', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('33', 'maumere', '32', '', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('34', 'medan', '33', 'nil', 'active');
INSERT INTO `kota` (`idkota`, `nama`, `urutan`, `keterangan`, `status`) VALUES ('35', 'flores', '34', '', 'active');


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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (1, 'yuan', '2500', 'rmb', 1, 'deleted');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (2, 'Yen Japan', '130', 'JPY', 3, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (3, 'Singapore Dollar', '1060099', 'SGD', 4, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (4, 'Bisa Hapus', '25235', 'B', 2, 'deleted');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (5, 'RUPEE', '24000.4412', 'Rupee', 4, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (6, 'sterling', '19000', 'gbp', 5, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (7, 'euro', '15000', 'eur', 6, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (8, 'hongkong dollar', '2000', 'hkd', 7, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (9, 'swiss franc', '20000', 'chf', 8, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (10, 'australian dollar', '15000', 'aud', 9, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (11, 'korean won', '500.99', 'krw', 10, 'deleted');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (12, 'rupiah', '1', 'idr', 11, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (13, 'us dollar', '14500', 'usd', 10, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (14, 'korea won', '12', 'krw', 11, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (15, 'chinese yuan', '2000', 'rmb', 12, 'active');
INSERT INTO `kurs` (`idkurs`, `nama`, `nilai_rupiah`, `lambang`, `urutan`, `status`) VALUES (16, 'philipinnes peso', '12', 'peso', 13, 'active');


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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('1', '3', 'Linda', 'Malang kota', '2525235', 'okta', 'egwegwe', 'gjkigghjjjhhh', 'deleted', '1500000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('2', '6', 'Test Kentang', 'Purimas Legian Paradise H3/25', '+6285850745583', 'UUI', 'frgwgweg', 'PL-002', 'deleted', '10000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('3', '4', 'Bisa hapus', 'wegwge', '624634636', 'wegokwgo', 'weg', 'PL-003', 'deleted', '2523525');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('4', '1', 'Tes Bauh', 'Purimas', '8329823948394', 'wgwg', 'Keterangan purimas', 'PL-005', 'deleted', '14000001');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('5', '1', 'Toni', 'abc', '25226463', 'Udin', 'Keterangan Sukolilo', 'PL-005', 'active', '15000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('6', '9', 'calvin khoe', 'test', '8329823948394', 'calvin', 'Keterangan purimas', 'ckk', 'active', '12.333');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('7', '1', 'Test amr', 'Purimas', '8329823948394', 'Iku', 'Keterangan purimas', 'YU', 'deleted', '14000001');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('8', '1', 'Budi', 'Tes', '3525252', 'Budi', 'egwge6', 'stefanus', 'active', '8786.8899');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('9', '4', 'ujuuu', '', '', 'devi', '', 'ujjjj', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('10', '1', 'devi ', '', '', 'devi l', '', 'dvl', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('11', '4', 'diana lsn', '', '', 'diana', '', 'dn', 'deleted', '0.2');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('12', '3', 'devi lissan', 'manyar sabrangan', '031-9998901', 'devi lissan 123', 'ok 123h', 'devi', 'deleted', '0.2');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('13', '4', 'elly lie', 'wiyung 12/333', '081-3339902829', 'elly', 'no keterangan', 'elly', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('14', '1', 'mandiri sekuritas', 'mandiri', '', 'wina', '', 'mdsb', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('15', '4', 'ddd', 'oiooi', '0933', 'devi', 'sss', 'dvl', 'deleted', '1000000.2');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('16', '4', 'ddd', 'oiooi', '0933', 'devi', 'sss', 'dvl', 'deleted', '1000000.2');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('17', '1', 'danreksa', 'barat sby', '031-88966829', 'aa', 'new 2021', 'dana', 'active', '0.4');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('18', '8', 'bca sekuritas', 'surabaya', '031-7936389', 'diana', '2022', 'best', 'deleted', '10000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('19', '1', 'devi lissan', 'cland', '', 'devi', '', 'dvl', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('20', '4', 'diana lissan', 'citraland', '', 'diana', '2001', 'dnl', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('21', '4', 'elly lissan', '', '', 'elly', '', 'ely', 'active', '9098202.9');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('22', '4', 'willy', '', '0516876672', 'none', '', 'wl', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('23', '3', 'jak', 'malang 1123jj', '0316869021', 'jao', '102028', 'jaksub', 'active', '1000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('24', '11', 'andika ternate', 'aaa', '031-892793', 'andi', 'shkh', 'anditnt', 'active', '100000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('25', '4', 'joko mente.', '', '0', 'joko', '', 'jkmt', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('26', '1', 'herisb', '', '04119363903', 'heri', '', 'herisb', 'active', '907837293');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('27', '1', 'bca sekuritas', 'surabaya 12344567', '031-993028', 'abc', '2021', 'best', 'active', '900000.787');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('28', '1', 'np sp', '', '', 'abc', '', 'np1', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('29', '17', 'hksp1', '', '', 'a', '', 'hksp1', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('30', '1', 'pt.123', '', '', 'aa', '', '123', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('31', '17', 'batal', '', '', '1', '', 'batal', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('32', '17', 'npsp', 'abc', '', 'a', '', 'npsp', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('33', '1', 'kenzo khoe', '', '0316627811', 'ken', '', 'kk', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('34', '4', 'kenzo', 'xisjdl', '031-8392729', 'kenken', 'baru', 'kkhoe', 'active', '2637.57');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('35', '1', 'william sb', '', '0811837393', 'william', '', 'wlsb', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('36', '16', 'calvin khoe', 'n/a', '03198302', 'calvin', 'dkdjkdjdk', 'ckhoe', 'active', '6873.2933');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('37', '17', 'jao ay king', 'sjdhdkatestsss', '091936220', 'jak', '01927', 'jak', 'active', '7630.8364');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('38', '13', 'erwin ternate', 'ai293bs', '0927-1829337', 'erwin', '', 'ewtnt', 'active', '709020022');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('39', '8', 'margaret', 'asbdmdkf', '83801830', 'ret', '9abc', 'mar', 'active', '762839');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('40', '10', 'siswanto', '', '', 'sis-s', '', 'sis', 'active', '900000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('41', '9', 'artini', '', '0361029373', 'artini', '', 'art', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('42', '1', 'universal mas sb', 'xxxxx', '031-283946930', 'william', 'xxxxx12345', 'umsb', 'deleted', '9000000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('43', '16', 'universal mas bali', '', '', 'bali', '', 'umbl', 'deleted', '903837');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('44', '17', 'credit 1 sp', '', '', 'diana', '', 'cssp', 'active', '100.3');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('45', '17', 'uob sp 1', '', '', 'diana', '', 'uobsp', 'active', '37490.222');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('46', '7', 'ss mks', '', '0382027837', 'mks', '', 'ssmks', 'active', '1073836');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('47', '14', 'annie manado', '', '019330028', 'anniee', '', 'akmnd', 'active', '900000');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('48', '17', 'bnp sp', 'singapore', '72037890', 'bnp', '', 'bnpsp', 'active', '100.3');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('49', '4', 'margaret', 's123', '0318976927', 'rett', '', 'ret', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('50', '17', 'abn sp', '', '', 'aaa', '', 'aasp', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('51', '4', 'abdullah luwuk', '', '', 'abdullah', '', 'abdlw', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('52', '3', 'alan magelang', '', '', 'alan', '', 'alanmgl', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('53', '15', 'aling jakarta', '', '', 'aling', '', 'alingjkt', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('54', '4', 'test', '', '', 'test', '', 'dummy', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('55', '15', 'edy jakarta', '', '', 'edyy', '', 'edyjkt', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('56', '3', 'fanny manado', '', '', 'fanny', '', 'fannymnd', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('57', '23', 'putu bali', '', '', 'putu', '', 'putu', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('58', '4', 'batal', '', '0', 'none', '', 'batal1', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('59', '4', 'SALAH', '', '', 'NONE', '', 'salAH', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('60', '2', 'gudang garam', '', '', 'abc', '', 'gg', 'deleted', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('61', '21', 'jarum ', '', '', 'bbb', '', 'jrkd', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('62', '4', 'bri ', '', '', 'abc', '', 'brids', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('63', '4', 'mandiri sekuritas', '', '', 'ab', '', 'mansek', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('64', '7', 'titi manado', '', '', 'titi', '', 'titimnd', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('65', '17', 'batal sg', '', '', 'batal', '', 'batal', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('66', '18', 'tina toon manado', 'abcdef', '03183793', 'tina', 'nil', 'tinamnd', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('67', '1', 'cws sby', 'dhkdj', '0319927300', 'devi', '1.000', 'cws', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('68', '28', 'i kadek singaraja', '', '', 'kadek', '', 'ikdsnrj', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('69', '1', 'jeje surabaya', '', '03189927901', 'je', '', 'jejesby', 'active', '0');
INSERT INTO `pelanggan` (`idpelanggan`, `idkota`, `nama`, `alamat`, `telepon`, `contact_person`, `keterangan`, `kode`, `status`, `saldo_awal`) VALUES ('70', '1', 'lady', '', '03189917920', 'l', '', 'ladysby', 'active', '0');


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

INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('021022', '20', '2022-10-02 00:00:00', '2022-10-02 00:00:00', '', '18', 'active', '021022', 5, '24000.4412');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1', '21', '2021-10-20 00:00:00', '2021-10-20 00:00:00', 'diana', '8', 'active', '1', 1, '2500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/21', '20', '2022-01-05 00:00:00', '2022-01-05 00:00:00', 'SDHKDHKD', '18', 'active', '1/21', 10, '15000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/22', '5', '2022-01-06 00:00:00', '2022-01-06 00:00:00', '', '18', 'active', '1', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/23', '34', '2023-01-08 00:00:00', '2023-01-08 00:00:00', '179373kdkhkdn', '16', 'active', '1/23', 9, '20000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('10', '19', '2021-12-01 00:00:00', '2021-12-01 00:00:00', '', '16', 'active', '10', 1, '2500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('10/22', '49', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '18', 'active', '10/22', 10, '15000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('10/23', '69', '2023-07-09 00:00:00', '2023-07-09 00:00:00', '', '26', 'active', '10/23', 10, '15000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('11', '24', '2022-03-16 00:00:00', '2022-03-16 00:00:00', '', '18', 'active', '11', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('11/22', '25', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '20', 'active', '11', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('12/22', '20', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '1', 'active', '11/22', 6, '19000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('13/22', '35', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '19', 'active', '13/22', 13, '14500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('13/23', '68', '2023-05-13 00:00:00', '2023-05-13 00:00:00', '', '18', 'active', '13/23', 8, '2000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('14/22', '37', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '22', 'active', '14/22', 10, '15000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('15/23', '68', '2023-05-13 00:00:00', '2023-05-13 00:00:00', '', '18', 'active', '13/23', 9, '20000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2', '19', '2021-10-27 00:00:00', '2021-10-27 00:00:00', 'xxx coba', '8', 'active', '2', 6, '19000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2/22', '5', '2022-01-06 00:00:00', '2022-01-06 00:00:00', '', '18', 'active', '2/22', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2/23', '6', '2023-01-08 00:00:00', '2023-01-08 00:00:00', 'dkdkddls082937923', '20', 'active', '2/23', 14, '12');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('22/22', '34', '2022-05-22 00:00:00', '2022-05-22 00:00:00', '', '26', 'active', '22/22', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23/22', '19', '2022-12-10 00:00:00', '2022-12-10 00:00:00', 'ddkhd', '22', 'active', '23/22', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23/22sh', '31', '2009-07-30 00:00:00', '2022-02-11 00:00:00', '', '25', 'active', '1', 13, '14500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23/23', '66', '2023-03-26 00:00:00', '2023-03-26 00:00:00', '', '20', 'active', '23/23', 7, '15000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('25', '26', '2022-01-01 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '25', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('26', '26', '2022-01-02 00:00:00', '2022-01-07 00:00:00', '', '20', 'active', '26', 1, '2500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3/22', '17', '2022-01-06 00:00:00', '2022-01-06 00:00:00', '', '18', 'active', '2', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3/22sh', '29', '2009-07-23 00:00:00', '2022-02-11 00:00:00', '', '18', 'active', '1', 13, '14500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3/23', '21', '2023-01-08 00:00:00', '2023-01-08 00:00:00', '', '24', 'active', '3/23', 13, '14500');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('30/22', '37', '2023-02-15 00:00:00', '2023-02-15 00:00:00', '', '27', 'active', '30/22', 8, '2000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('4/21sh', '1', '2021-10-04 00:00:00', '2021-10-04 00:00:00', '', '1', 'active', '4/21sh', 1, '13000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('4/22', '19', '2022-03-14 00:00:00', '2022-03-14 00:00:00', '', '20', 'active', '4/22', 6, '19000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('5/21', '10', '2021-10-05 00:00:00', '2021-10-05 00:00:00', '', '1', 'active', '5/21', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('50/2', '24', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '50/2', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('50/22', '19', '2022-02-15 00:00:00', '2022-02-15 00:00:00', '', '13', 'active', '50/22', 6, '19000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('50/23', '67', '2023-05-01 00:00:00', '2023-05-01 00:00:00', 'aao', '26', 'active', '50/23', 6, '19000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('51/22', '19', '2022-02-15 00:00:00', '2022-02-15 00:00:00', '', '18', 'active', '51/22', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('51/sh', '30', '2022-02-11 00:00:00', '2022-02-11 00:00:00', '', '23', 'active', '1', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('52/sh', '30', '2022-02-11 00:00:00', '2022-02-11 00:00:00', '', '23', 'active', '2', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('53/sh', '30', '2022-02-11 00:00:00', '2022-02-11 00:00:00', '', '23', 'active', '3', 12, '1');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('9/23', '70', '2023-07-09 00:00:00', '2023-07-09 00:00:00', '', '31', 'active', '9/23', 2, '130');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('BARUBELI', '1', '2021-09-03 00:00:00', '2021-09-30 00:00:00', 'KET BARU', '1', 'active', 'BARUFAK', 1, '13000');
INSERT INTO `pembelian` (`nomor_nota`, `idsupplier`, `tanggal_terima`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('BB123', '5', '2021-10-02 00:00:00', '2021-09-21 00:00:00', 'TEST 123', '1', 'active', 'FAKTONI', 1, '13000');
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

INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('021022', '62', '2022-10-02 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('0992', '62', '2025-05-14 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/21', '14', '2022-01-05 00:00:00', '', 'active', 1, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/21sh', '14', '2021-10-20 00:00:00', '', 'active', 2, '4', '1/21sh');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/23', '17', '2023-01-08 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('10', '14', '2021-12-01 00:00:00', '', 'active', 1, '8', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('10/22sh', '49', '2022-07-03 00:00:00', '', 'active', 6, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('11/22sh', '17', '2022-07-03 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('111', '62', '2022-12-10 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('13/22sh', '14', '2022-07-03 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('13/23SH', '68', '2023-05-13 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('15/22', '24', '2022-01-18 00:00:00', '', 'active', 1, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('2/23', '63', '2023-01-08 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('22/22', '17', '2022-05-22 00:00:00', '', 'active', 9, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('22/22sh', '8', '2022-05-22 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('23/23sh', '62', '2023-03-26 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('25', '25', '2022-01-02 00:00:00', '', 'active', 3, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('30/23', '37', '2023-02-15 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('50/22', '17', '2022-02-16 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('50/23sh', '62', '2023-05-01 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('9/23', '14', '2023-07-09 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `pembelian_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('BELISHM1', '0', '2021-09-08 00:00:00', 'Beli saham 2', 'active', 2, '0', '');


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

INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('021022', '20', '2022-10-01 00:00:00', '2022-10-02 00:00:00', '', '18', 'active', '021022', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1', '8', '2021-10-20 00:00:00', '2021-10-20 00:00:00', 'baru masuk', '8', 'active', '1', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/21', '19', '2022-01-05 00:00:00', '2022-01-05 00:00:00', '', '17', 'active', '1/21', 8, '2000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/22', '17', '2022-01-06 00:00:00', '2022-01-06 00:00:00', '', '18', 'active', '1/22', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1/23', '34', '2023-01-08 00:00:00', '2023-01-08 00:00:00', '', '18', 'active', '1/23', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('10/22', '19', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '20', 'active', '10/22', 6, '19000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('10/23', '70', '2023-07-09 00:00:00', '2023-07-09 00:00:00', '', '31', 'active', '10/23', 10, '15000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('101', '10', '2021-10-11 00:00:00', '2021-10-11 00:00:00', '123 go', '4', 'active', '101', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('11/22', '24', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '11/22', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('12/22', '49', '2022-07-03 00:00:00', '2022-07-03 00:00:00', 'test 123', '16', 'active', '11/22', 5, '24000.4412');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('1231415', '5', '2021-09-16 00:00:00', '2021-09-30 00:00:00', '', '2', 'active', '12535Aff3', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('12345', '11', '2021-10-22 00:00:00', '2021-10-22 00:00:00', '', '4', 'active', '123/2', 1, '1500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('13', '25', '2022-01-01 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '13', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('13/22SH', '22', '2022-07-03 00:00:00', '2022-07-03 00:00:00', '', '17', 'active', '13/22SH', 6, '19000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('13/23', '68', '2023-05-13 00:00:00', '2023-05-13 00:00:00', '', '18', 'active', '13/23', 16, '12');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('16', '25', '2022-01-02 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '16', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2', '19', '2021-10-27 00:00:00', '2021-10-27 00:00:00', '', '8', 'active', '2', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2/22', '19', '2022-03-14 00:00:00', '2022-03-14 00:00:00', '', '18', 'active', '1/22', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2/22sh', '28', '2022-02-11 00:00:00', '2022-02-11 00:00:00', 'titipan', '17', 'active', 'np1', 13, '14500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('2/23', '6', '2023-01-08 00:00:00', '2023-01-08 00:00:00', '', '22', 'active', '2/23', 6, '19000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('22/22', '34', '2022-05-22 00:00:00', '2022-05-22 00:00:00', '', '19', 'active', '22/22', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23/22', '19', '2022-11-10 00:00:00', '2022-11-10 00:00:00', 'abc', '19', 'active', '23/22', 3, '1060099');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23/23', '66', '2023-03-26 00:00:00', '2023-03-26 00:00:00', 'abc', '28', 'active', '1/23', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('23072023', '19', '2023-07-23 00:00:00', '2023-07-23 00:00:00', '', '22', 'active', '23072023', 3, '1060099');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('24/22', '19', '2022-12-10 00:00:00', '2022-12-10 00:00:00', 'cdh', '22', 'active', '24/22', 7, '15000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('24/23', '66', '2023-03-26 00:00:00', '2023-03-26 00:00:00', '', '22', 'active', '24/23', 7, '15000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('27', '26', '2022-01-03 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '27', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3', '20', '2021-11-30 00:00:00', '2021-11-30 00:00:00', '', '8', 'active', '3', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3/23', '21', '2023-01-08 00:00:00', '2023-01-08 00:00:00', '', '1', 'active', '3/23', 8, '2000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('30/23', '37', '2023-02-15 00:00:00', '2023-02-15 00:00:00', 'abc', '18', 'active', '30/23', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('32/2', '24', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '32/2', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('3275285738', '1', '2021-09-01 00:00:00', '2021-09-30 00:00:00', '', '2', 'active', 'FAK-445566', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('33/2', '24', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '33/2', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('346363', '1', '2021-09-23 00:00:00', '2021-09-28 00:00:00', '', '1', 'active', '32525', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('35/2', '24', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '35/2', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('36/2', '26', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '36/2', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('38/2', '24', '2022-02-08 00:00:00', '2022-02-08 00:00:00', '', '18', 'active', '38/2', 13, '14500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('4/21sh', '1', '2021-10-04 00:00:00', '2021-10-04 00:00:00', '', '1', 'active', '4/21sh', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('463634634', '5', '2021-09-15 00:00:00', '2021-09-28 00:00:00', '', '1', 'active', '654', 3, '10600');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('5', '25', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '5', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('5/21', '10', '2021-10-05 00:00:00', '2021-10-05 00:00:00', '', '1', 'active', '5/21', 1, '13000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('5/22', '24', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '5/22', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('5/22sh', '29', '2009-07-21 00:00:00', '2022-02-11 00:00:00', '', '18', 'active', '1', 13, '14500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('50/22', '19', '2022-02-15 00:00:00', '2022-02-15 00:00:00', '', '16', 'active', '50/22', 3, '1060099');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('50/23', '67', '2023-05-01 00:00:00', '2023-05-01 00:00:00', '', '29', 'active', '50/23', 15, '2000');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('51/22', '19', '2022-02-15 00:00:00', '2022-02-15 00:00:00', '', '22', 'active', '51/22', 5, '24000.4412');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('52/22', '19', '2022-02-15 00:00:00', '2022-02-15 00:00:00', '', '18', 'active', '52/22', 2, '130');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('555', '11', '2021-10-22 00:00:00', '2021-10-22 00:00:00', '', '4', 'active', '123', 1, '1500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('6/22', '25', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '6', 12, '1');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('6/22sh', '32', '2022-02-11 00:00:00', '2022-02-11 00:00:00', '', '26', 'active', '2', 13, '14500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('7', '25', '2022-01-07 00:00:00', '2022-01-07 00:00:00', '', '18', 'active', '7', 1, '2500');
INSERT INTO `penjualan` (`nomor_nota`, `idpelanggan`, `tanggal_jual`, `tanggal_jatuh_tempo`, `keterangan`, `idgudang`, `status`, `nomor_faktur`, `idkurs`, `nilai_rupiah`) VALUES ('9/23', '69', '2023-07-09 00:00:00', '2023-07-09 00:00:00', '', '31', 'active', '9/23', 9, '20000');
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

INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('011', '62', '2000-05-14 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('021022', '62', '2022-10-02 00:00:00', '', 'active', 6, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1', '14', '2021-10-31 00:00:00', '', 'active', 2, '8', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/21', '17', '2022-01-05 00:00:00', 'coco', 'active', 12, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/22sh', '28', '2022-02-11 00:00:00', 'cg', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('1/23', '17', '2023-01-08 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('10', '14', '2021-12-01 00:00:00', '', 'active', 5, '8', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('10/22sh', '17', '2022-07-03 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('11/22sh', '14', '2022-07-03 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('111', '17', '2022-12-10 00:00:00', 'shjd', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('12/22sh', '48', '2022-07-03 00:00:00', '', 'active', 6, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('13/23SH', '68', '2023-05-13 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('15/22', '25', '2022-01-01 00:00:00', '', 'active', 10, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('2', '17', '2021-10-31 00:00:00', 'JDJJDDK', 'active', 10, '8', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('2/23', '63', '2023-01-08 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('20/23', '37', '2023-02-15 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('22/22sh', '17', '2022-05-22 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('23/22sh', '17', '2022-05-22 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('23/23', '63', '2023-03-26 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('3', '18', '2021-10-31 00:00:00', '', 'active', 6, '8', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('50/22', '17', '2022-02-16 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('50/23', '62', '2023-05-01 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('60/22sh', '29', '2022-02-16 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('9/23sh', '62', '2023-07-09 00:00:00', '', 'active', 2, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('TESBARU', '8', '2022-06-12 00:00:00', 'tes', 'active', 9, '18', '-');
INSERT INTO `penjualan_saham` (`nomor_nota`, `idpelanggan`, `tanggal`, `keterangan`, `status`, `idkurs`, `idgudang`, `nomor_faktur`) VALUES ('TRSSAHAM', '0', '2021-09-21 00:00:00', 'trsaham 2', 'active', 1, '0', '');


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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('1', '2335325', 'BCA', 'weg', '140000.5944484', 'deleted', 'REK-01');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('2', '12313141241', 'Mandiri Tbk', 'Normal', '15000000', 'deleted', 'MAN02');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('3', '52352', 'bisa hapus', 'srgj', '53262', 'deleted', '28492849');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('4', '102882927', 'BCA', 'Tes', '130.23', 'deleted', 'casbytidr2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('5', '19282928', 'bca', '', '0', 'deleted', 'bca02');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('6', '152008981628', 'mandiri', '01/01/2021', '20000.34', 'active', 'mdsbtr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('7', '76864477-9754', 'bri', '2018 buka', '90000.8', 'deleted', 'brisbytidr2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('8', '78263883', 'bca sby usd giro', 'buka 2020', '0.3', 'active', 'casbtusd1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('9', '9283836889-1', 'bca', 'open 2020', '0', 'active', 'casbtr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('10', '8020378', 'bni', '', '1000000000', 'active', 'bnisbgr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('11', '009139373937', 'uob surabaya', '', '120000', 'active', 'uobsbtr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('12', '00936394404972828', 'bsi ', '', '0.9999', 'active', 'brisbtu2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('13', '09279368101-29991', 'mandiri tabungan 2', '', '100.2297', 'active', 'mdsbtr2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('14', 'ac.001', 'bank aman', '', '0', 'active', 'bank1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('15', 'ac.005', 'bank pusat', '', '0', 'active', 'bank2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('16', 'herison.sb ac1', 'ac', '', '0', 'active', 'hrsb');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('17', 'memeng ac.1', 'memeng ac.2', '', '0', 'active', 'mmsb');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('18', 'no.1', 'npsp', '', '0', 'active', 'bsptu1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('19', 'no.2', 'np2', '', '0', 'deleted', 'np2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('20', 'np2', 'npsp', '', '0', 'deleted', 'np2');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('21', '1', 'npsp', '', '0', 'deleted', 'np1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('22', 'ac.no.2', 'hksp2', '', '0', 'active', 'hksp');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('23', 'ac.no.1', 'hksp1', '', '0', 'active', 'hksp1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('24', 'ac', 'hksp credit usd', '', '0', 'active', 'hkspcusd');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('25', 'ac.', 'bunga usd', '', '0', 'deleted', 'b-usd');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('26', 'ac.0', 'bunga usd', '', '0', 'active', 'b-usd');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('27', 'ac.', 'hkspbond usd.', '', '0', 'active', 'hkspbond');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('28', 'ac.', 'hksp saham.', '', '0', 'active', 'hkspsh');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('29', 'ac.', 'fee-usd', '', '0', 'active', 'fee-usd');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('30', 'ac.', 'batal', '', '0', 'active', 'batal');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('31', 'ac.', 'batal1', '', '0', 'deleted', 'batal1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('32', 'ac', 'npsp', '', '0', 'active', 'npsp');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('33', 'saaf', 'gwgwge', 'brb', '235235', 'active', 'B-USD');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('34', '1098393808209', 'danamon rupiah 1', '', '0', 'active', 'dsbtr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('35', '69830378', 'danamon usd 1', '', '0', 'active', 'dsbtu1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('36', '0', 'fee idr', '', '0', 'active', 'fee-idr');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('37', '001838739001-29927', 'commonwealth ', 'surabaya 1', '0', 'active', 'cwsbtr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('38', '09110081982-281819', 'ocbc nisp', 'sub', '0', 'active', 'nisptusd1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('39', 'a/c.1992783638', 'nisp tab idr 1', '', '0', 'active', 'nisptidr1');
INSERT INTO `rekening` (`idrekening`, `nomor`, `bank`, `keterangan`, `saldo_awal`, `status`, `kode`) VALUES ('40', 'a/c.09208202979', 'bri idr 1', '', '0', 'active', 'brisbtidr1');


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

INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('021022', '20', '2022-10-02 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1', '11', '2021-10-20 00:00:00', 4, 'tower', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1/21', '20', '2022-01-05 00:00:00', 18, 'DIANA', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('10', '19', '2021-12-01 00:00:00', 8, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('10/22', '49', '2022-07-03 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('11/22', '35', '2022-07-03 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('12/22', '37', '2022-07-03 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('13/23', '68', '2023-05-13 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('2', '19', '2021-10-27 00:00:00', 8, 'retur', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('22/22', '34', '2022-05-22 00:00:00', 13, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('23/23', '66', '2023-03-26 00:00:00', 24, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('24/22', '19', '2022-11-10 00:00:00', 20, 'ohkhd', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('30/22', '37', '2023-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('50//22', '19', '2022-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('50/22', '19', '2022-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('50/23', '67', '2023-05-01 00:00:00', 18, 'accchkd', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('51/22', '19', '2022-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('9/23', '69', '2023-07-09 00:00:00', 30, '', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('JUIK', '5', '2021-09-13 00:00:00', 2, 'JUIK', 'active');
INSERT INTO `retur_pembelian` (`nomor_nota`, `idsupplier`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('RETUR B1', '6', '0000-00-00 00:00:00', 1, 'RETUR BELI', 'active');
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

INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('02102022', '20', '2022-10-02 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1', '19', '2021-11-30 00:00:00', 8, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1/21', '19', '2022-01-05 00:00:00', 17, 'XOXXX', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1/22', '19', '2022-03-14 00:00:00', 1, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('1/23', '21', '2023-01-08 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('10/22', '19', '2022-07-03 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('11/22', '35', '2022-07-03 00:00:00', 17, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('12/22', '20', '2022-07-03 00:00:00', 1, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('13/22', '19', '2022-07-03 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('13/23', '68', '2023-05-13 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('2', '10', '2021-10-20 00:00:00', 4, 'balik retur salah', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('2/22', '19', '2022-01-14 00:00:00', 13, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('2/23', '34', '2023-01-08 00:00:00', 26, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('22/22', '34', '2022-05-22 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('23/22', '19', '2022-12-10 00:00:00', 26, '123344', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('23/23', '66', '2023-03-26 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('25/22', '20', '2022-11-10 00:00:00', 23, 'efgh', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('3/23', '6', '2023-01-08 00:00:00', 13, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('30/23', '37', '2023-02-15 00:00:00', 22, '19982937', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('5', '19', '2021-10-27 00:00:00', 8, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('50/22', '19', '2022-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('50/23', '67', '2023-05-01 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('52/22', '19', '2022-02-15 00:00:00', 18, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('9/23', '69', '2023-07-09 00:00:00', 31, '', 'active');
INSERT INTO `retur_penjualan` (`nomor_nota`, `idpelanggan`, `tanggal`, `idgudang`, `keterangan`, `status`) VALUES ('ABC123', '5', '2021-10-15 00:00:00', 2, 'og okweg owekg', 'active');
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('1', 'BCA2', '', 'fkso2', '1000', 'SH02', 'deleted', '1', 'lot2', 'lot2');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('2', 'Saham A', '', 'Saham A', '1.77', 'SH11', 'deleted', '1', 'Lot', 'Lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('3', 'Saham 2', '', 'sahamm 2', '998', 'SH2', 'active', '1', 'Lot', 'Lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('4', 'Saham 3', '', 'owkro', '10.5', 'SH3', 'active', '1', 'Lot', 'Lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('5', 'bri agro', '', '2021', '10', 'agro', 'active', '1', 'lot', 'lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('6', 'bank bca', '', '2021', '1', 'bbca', 'active', '1', 'lot', 'lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('7', 'bri syariah', '', '2021', '1', 'bris', 'active', '1', 'lot', 'lembar');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('8', 'bukopin', '', '200', '1', 'bbkp', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('9', 'per gas', '', 'baru', '1', 'pgas', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('10', 'saham 5', '', '', '1', 'sh5', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('11', 'citigroupd', '', '', '1', 'citi', 'active', '1', 'lbr', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('12', 'bank jago', '', '', '1', 'arto', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('13', 'bni', '', '', '1', 'bbni', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('14', 'mandiri', '', '', '1', 'bmri', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('15', 'emtek', '', '', '1', 'emtk', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('16', 'aneka tambang', '', 'antam', '1', 'antm', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('17', 'pt timah', '', 'timah', '1', 'tins', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('18', 'bank of americA', '', '', '1', 'bac', 'active', '1', 'LBR', 'LBR');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('19', 'CREDIT SUISSE', '', 'CS', '1', 'CS', 'active', '1', 'LBR', 'LBR');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('20', 'panin', '', '', '1', 'pnbn', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('21', 'hsbc', '', '', '1', 'hsbcpl', 'active', '1', 'lbr', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('22', 'bri', '', '', '1', 'bbri', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('23', 'nicl', '', '', '1', 'nicl', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('24', 'bank aladin', '', '', '1', 'bank', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('25', 'medco', '', '', '1', 'medc', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('26', 'dewa dharma', '', '', '1', 'dewa', 'active', '1', 'lot', 'lbr');
INSERT INTO `saham` (`idsaham`, `nama`, `merk`, `keterangan`, `min_stok`, `kode`, `status`, `jumlah_satuan`, `satuan_besar`, `satuan_kecil`) VALUES ('27', 'disney', '', '', '1', 'dsn', 'active', '1', 'lbr', 'lbr');


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
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('10', '9', '11', '2022-01-06 00:00:00', '150000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('11', '9', '11', '2022-01-06 00:00:00', '100000000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('12', '14', '15', '2022-01-06 00:00:00', '5000000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('13', '14', '15', '2022-01-06 00:00:00', '15000000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('14', '15', '14', '2022-01-07 00:00:00', '25000000', 'via kas', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('15', '15', '14', '2022-01-06 00:00:00', '350000000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('16', '16', '11', '2022-01-06 00:00:00', '50000000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('17', '17', '11', '2022-01-07 00:00:00', '366000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('18', '23', '24', '2009-07-01 00:00:00', '22190.92', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('19', '24', '23', '2009-07-01 00:00:00', '22190.92', '08-07-09', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('2', '9', '6', '2021-11-03 00:00:00', '200182927', 'dhdjdh', 'ddoasj', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('20', '24', '25', '2009-07-01 00:00:00', '4.36', 'b-bunga=01/07>08/07-09@%=7h.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('21', '23', '24', '2009-07-08 00:00:00', '22195.28', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('22', '24', '23', '2009-07-08 00:00:00', '22195.28', '15-07-09', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('23', '27', '23', '2009-07-15 00:00:00', '5812.5', 'bunga cimb niaga.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('24', '23', '24', '2009-07-15 00:00:00', '22199.64', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('25', '24', '25', '2009-07-08 00:00:00', '4.36', 'b-bunga=08/07>15/07-09@', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('26', '24', '23', '2009-07-15 00:00:00', '16387.14', '22-07-09.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('27', '24', '25', '2009-07-15 00:00:00', '3.22', 'b-bunga=15/07>22/07-09@', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('28', '24', '23', '2009-07-22 00:00:00', '8224.95', '29-07-09', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('29', '24', '25', '2009-07-22 00:00:00', '1.62', 'b-bunga=22/07>29/07-09@=7h.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('30', '24', '23', '2009-07-23 00:00:00', '2551.94', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('31', '24', '25', '2009-07-23 00:00:00', '2551.94', '01-08-09', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('32', '24', '25', '2009-07-23 00:00:00', '1', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('33', '25', '23', '2009-07-23 00:00:00', '0.36', '', 'd-bunga=07-09.', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('34', '27', '23', '2009-07-27 00:00:00', '8437.5', 'bunga csse eparg.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('35', '27', '23', '2009-07-27 00:00:00', '8750', 'bunga smfg', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('36', '27', '23', '2009-07-28 00:00:00', '6468.75', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('37', '27', '23', '2009-07-29 00:00:00', '4350', 'bunga unibanco uniao.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('38', '23', '24', '2009-07-29 00:00:00', '8226.57', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('39', '27', '23', '2009-07-17 00:00:00', '9375', 'bunga rep of indonesia.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('4', '6', '8', '2021-12-01 00:00:00', '1000.892', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('40', '23', '29', '2009-07-17 00:00:00', '1209.59', 'custodian/equities fee.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('41', '23', '28', '2009-07-23 00:00:00', '634000', 'buy=634,000.-hsbc bank 1m epsilon fix  cpn nte citigroup=24-08-09.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('42', '28', '23', '2009-07-21 00:00:00', '631447.7', 'jual=200,000lbr citigroup.', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('43', '23', '24', '2009-07-22 00:00:00', '16390.36', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('44', '6', '9', '2022-02-16 00:00:00', '909992.3', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('45', '6', '11', '2022-02-16 00:00:00', '89.783', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('46', '9', '11', '2022-03-15 00:00:00', '1000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('47', '9', '11', '2022-05-22 00:00:00', '90263.273', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('48', '12', '9', '2022-05-22 00:00:00', '567000', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('49', '11', '9', '2022-05-22 00:00:00', '125373947292', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('5', '9', '11', '2021-12-01 00:00:00', '89273', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('50', '10', '12', '2022-07-03 00:00:00', '100.982', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('51', '11', '9', '2022-07-03 00:00:00', '900', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('52', '9', '11', '2022-07-03 00:00:00', '2', 'test123', 'test 678', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('53', '8', '23', '2022-10-02 00:00:00', '10930332.3', 'abc', 'def', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('54', '9', '6', '2022-12-10 00:00:00', '0.090090893', 'abcd', 'efgh', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('55', '13', '26', '2022-12-10 00:00:00', '9092.3093', 'abcdef', 'ghijk', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('56', '34', '35', '2023-01-08 00:00:00', '10909303.2223', 'abcdef', 'ghijkl', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('57', '9', '35', '2023-01-08 00:00:00', '9038043', '12345', '678910', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('58', '11', '34', '2023-01-08 00:00:00', '0.09092', 'abc', 'def', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('59', '37', '9', '2023-03-26 00:00:00', '0.933', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('6', '9', '12', '2022-01-05 00:00:00', '901000', 'xdjdh', 'dhdj', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('60', '11', '37', '2023-03-26 00:00:00', '0.0003033', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('61', '9', '38', '2023-05-13 00:00:00', '0.2922001', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('62', '11', '38', '2023-05-13 00:00:00', '308398.222', 'abc', 'def', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('63', '11', '38', '2023-05-13 00:00:00', '89', '', '', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('64', '11', '38', '2023-05-13 00:00:00', '7937933', '123', '456', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('65', '39', '9', '2023-07-09 00:00:00', '1839393.2922', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('66', '9', '38', '2023-07-09 00:00:00', '38983.2', 'abc', 'def', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('67', '9', '39', '2023-07-09 00:00:00', '38933112.222', '12345', '678910', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('68', '11', '9', '2023-07-09 00:00:00', '892.1', '', '', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('7', '6', '11', '2022-01-05 00:00:00', '907793.1', 'ddojs', 'dddkj', 'masuk', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('8', '9', '12', '2022-01-05 00:00:00', '8090971', '', '', 'keluar', 'active');
INSERT INTO `transaksi_bank` (`idtransfer`, `idrekening_asal`, `idrekening_tujuan`, `tanggal`, `nominal`, `keterangan_asal`, `keterangan_tujuan`, `jenis_transaksi`, `status`) VALUES ('9', '9', '11', '2022-01-06 00:00:00', '175000', '', '', 'masuk', 'active');
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
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('1', 11, 1, '9', '2', '90000', '', '2021-11-03 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('10', 22, 20, '12', '500', '37983.4', 'abcder', '2022-12-10 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('11', 18, 17, '12', '108', '10937223', 'abc', '2023-01-08 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('12', 17, 28, '37', '1', '10.33333', '', '2023-03-26 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('13', 18, 22, '12', '292892', '98191981910.2229', '', '2023-05-13 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('14', 18, 31, '12', '99722', '939212.3', '', '2023-07-09 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('15', 22, 18, '12', '902', '838982.22', '', '2023-07-09 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('16', 30, 18, '12', '293893', '197933.222', '', '2023-07-09 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('3', 5, 11, '12', '100', '600000', '', '2021-12-01 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('4', 1, 15, '12', '90', '65000', '', '2021-12-01 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('5', 18, 17, '12', '90', '5400.92', 'now', '2022-01-05 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('6', 18, 13, '12', '100', '6000', '', '2022-01-06 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('7', 17, 19, '12', '105', '6000.88', '', '2022-07-03 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('8', 25, 26, '31', '12', '140', '', '2022-07-03 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('9', 18, 17, '12', '900', '900.2983', 'abc', '2022-12-10 00:00:00', 'active');
INSERT INTO `transfer_barang` (`nomor_nota`, `idgudang_asal`, `idgudang_tujuan`, `idbarang`, `jumlah_besar`, `jumlah_kecil`, `keterangan`, `tanggal`, `status`) VALUES ('SIAPHAPUS', 2, 1, '2', '140', '555', 'kete', '2021-09-07 00:00:00', 'deleted');


