<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
    {
    	$servername = "localhost";  // Replace with your database server hostname or IP address
		$username = "root";  // Replace with your database username
		$password = "";  // Replace with your database password
		$databaseName = "k3990590_stok_new";  // Replace with the database name you want to check

		// Create a connection to the MySQL server
		$conn = new mysqli($servername, $username, $password);

		// Check the connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		// Query to check if the database exists
		$query = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'";
		$result = $conn->query($query);

		if ($result->num_rows ==0) {	
			//echo 'this';
			//die();
		    $query = "
CREATE DATABASE IF NOT EXISTS `k3990590_stok_new` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;";

			$result = $conn->query($query);
			//print_r($result); 
			//echo 'db created';

			// Create a connection to the MySQL server
			$conn = new mysqli($servername, $username, $password, 'k3990590_stok_new');

			$query = "
			CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
			INSERT INTO `admin` (`username`, `password`, `nama`, `last_login`, `status`) VALUES
('admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Admin1', '2023-08-01 05:00:27', 'active');";
			$result = $conn->query($query);

			$query = "
			CREATE TABLE `barang` (
  `idbarang` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `min_stok` double NOT NULL DEFAULT 1,
  `kode` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_satuan` double NOT NULL DEFAULT 1,
  `satuan_besar` varchar(50) NOT NULL,
  `satuan_kecil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
			CREATE TABLE `barang_hilang` (
  `nomor_nota` varchar(30) NOT NULL,
  `idgudang_asal` int(11) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `jumlah_besar` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
			CREATE TABLE `detil_pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `detil_pembelian_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsaham` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `detil_penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `detil_penjualan_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsaham` bigint(20) NOT NULL,
  `harga` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `lambang_kurs` varchar(50) NOT NULL,
  `konversi_rupiah` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `detil_retur_pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga_retur` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `detil_retur_penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `harga_retur` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `jumlah_besar` double NOT NULL,
  `urutan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "
CREATE TABLE `gudang` (
  `idgudang` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `hutangpiutang` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` text NOT NULL,
  `idrekening` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `jenis` enum('hutang','piutang','','') NOT NULL,
  `idkurs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `kota` (
  `idkota` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `urutan` bigint(20) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `kurs` (
  `idkurs` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `nilai_rupiah` double DEFAULT NULL,
  `lambang` varchar(10) NOT NULL,
  `urutan` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `pelanggan` (
  `idpelanggan` bigint(20) NOT NULL,
  `idkota` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `kode` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `saldo_awal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `pembelian` (
  `nomor_nota` varchar(50) NOT NULL,
  `idsupplier` bigint(20) NOT NULL,
  `tanggal_terima` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `nilai_rupiah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `penjualan` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal_jual` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `nilai_rupiah` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `penjualan_saham` (
  `nomor_nota` varchar(50) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `idkurs` int(11) NOT NULL,
  `idgudang` bigint(20) NOT NULL,
  `nomor_faktur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `rekening` (
  `idrekening` bigint(20) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `saldo_awal` double NOT NULL,
  `status` varchar(30) NOT NULL,
  `kode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `retur_pembelian` (
  `nomor_nota` varchar(100) NOT NULL,
  `idsupplier` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idgudang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `retur_penjualan` (
  `nomor_nota` varchar(100) NOT NULL,
  `idpelanggan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idgudang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `saham` (
  `idsaham` bigint(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `min_stok` double NOT NULL DEFAULT 1,
  `kode` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_satuan` double NOT NULL DEFAULT 1,
  `satuan_besar` varchar(50) NOT NULL,
  `satuan_kecil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `transaksi_bank` (
  `idtransfer` varchar(100) NOT NULL,
  `idrekening_asal` bigint(20) NOT NULL,
  `idrekening_tujuan` bigint(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nominal` double NOT NULL,
  `keterangan_asal` text NOT NULL,
  `keterangan_tujuan` text NOT NULL,
  `jenis_transaksi` enum('masuk','keluar','','') NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "CREATE TABLE `transfer_barang` (
  `nomor_nota` varchar(30) NOT NULL,
  `idgudang_asal` int(11) NOT NULL,
  `idgudang_tujuan` int(11) NOT NULL,
  `idbarang` bigint(20) NOT NULL,
  `jumlah_besar` double NOT NULL,
  `jumlah_kecil` double NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
			$result = $conn->query($query);

			$query = "ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `detil_pembelian`
  ADD PRIMARY KEY (`nomor_nota`,`idbarang`,`harga`,`urutan`);

ALTER TABLE `detil_pembelian_saham`
  ADD PRIMARY KEY (`nomor_nota`,`idsaham`,`harga`,`urutan`);

ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`nomor_nota`,`idbarang`,`harga`,`urutan`);

ALTER TABLE `detil_penjualan_saham`
  ADD PRIMARY KEY (`nomor_nota`,`idsaham`,`harga`,`urutan`);

ALTER TABLE `detil_retur_pembelian`
  ADD PRIMARY KEY (`nomor_nota`,`idbarang`,`harga_retur`,`urutan`);

ALTER TABLE `detil_retur_penjualan`
  ADD PRIMARY KEY (`nomor_nota`,`idbarang`,`harga_retur`,`urutan`);

ALTER TABLE `gudang`
  ADD PRIMARY KEY (`idgudang`);

ALTER TABLE `hutangpiutang`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `kota`
  ADD PRIMARY KEY (`idkota`);

ALTER TABLE `kurs`
  ADD PRIMARY KEY (`idkurs`);

ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `pembelian_saham`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `penjualan_saham`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `rekening`
  ADD PRIMARY KEY (`idrekening`);

ALTER TABLE `retur_pembelian`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `retur_penjualan`
  ADD PRIMARY KEY (`nomor_nota`);

ALTER TABLE `saham`
  ADD PRIMARY KEY (`idsaham`);

ALTER TABLE `transaksi_bank`
  ADD PRIMARY KEY (`idtransfer`);

ALTER TABLE `transfer_barang`
  ADD PRIMARY KEY (`nomor_nota`);";
			$result = $conn->multi_query($query);

			$query = "ALTER TABLE `barang`
  MODIFY `idbarang` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `gudang`
  MODIFY `idgudang` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `kota`
  MODIFY `idkota` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `kurs`
  MODIFY `idkurs` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `rekening`
  MODIFY `idrekening` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `saham`
  MODIFY `idsaham` bigint(20) NOT NULL AUTO_INCREMENT;";
			$result = $conn->multi_query($query);
			
		} 

		// Close the database connection
		// create database

		$conn->close();
		//die();

    	parent::__construct();
    }

	public function index()
	{
		//echo do_hash('password', 'md5'); // MD5
		if($this->input->post('btnlogin')) {
			$admin = $this->admin_model->doSignIn($this->input->post('username'),$this->input->post('password'));
			if($admin) {
 				$this->session->set_userdata('admin', $admin);
 				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error_message', true);
				redirect('');
			}
		}

		$this->load->view('v_login');
		
	}
}
