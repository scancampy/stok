<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	public function getStokBarang($idbarang = '', $tglawal = '', $tglakhir = '', $idgudang = '') {
		$wheregudangpenjualan = '';
		if($idgudang != '') {
			$wheregudangpenjualan = " AND penjualan.idgudang = $idgudang ";
		}

		$wheregudangpembelian = '';
		if($idgudang != '') {
			$wheregudangpembelian = " AND pembelian.idgudang = $idgudang ";
		}

		$wheregudangreturpenjualan = '';
		if($idgudang != '') {
			$wheregudangreturpenjualan = " AND retur_penjualan.idgudang = $idgudang ";
		}
		$wheregudangreturpembelian = '';
		if($idgudang != '') {
			$wheregudangreturpembelian = " AND retur_pembelian.idgudang = $idgudang ";
		}
		$wheregudangtransferkeluar = '';
		if($idgudang != '') {
			$wheregudangtransferkeluar = " AND transfer_barang.idgudang_asal = $idgudang ";
		}
		$wheregudanghilangkeluar = '';
		if($idgudang != '') {
			$wheregudanghilangkeluar = " AND barang_hilang.idgudang_asal = $idgudang ";
		}

/*SELECT penjualan.tanggal_jual as tanggal, penjualan.nomor_nota, pelanggan.kode, gudang.nama, 'JUAL' AS tipetrans,
'' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,(SELECT SUM(detil_penjualan.jumlah_besar) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS jmlsatuanbesarkeluar, (SELECT SUM(detil_penjualan.jumlah_kecil) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS jmlsatuankecilkeluar, (SELECT SUM(detil_penjualan.harga) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS hargakeluar, (SELECT SUM(detil_penjualan.harga * detil_penjualan.jumlah_kecil) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS subtotalkeluar, 'J' AS 'inisialkode'
FROM penjualan
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = penjualan.idpelanggan
WHERE penjualan.status = 'active' AND penjualan.nomor_nota IN (SELECT detil_penjualan.nomor_nota FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang ) AND penjualan.tanggal_jual >= '$tglawal' AND penjualan.tanggal_jual <= '$tglakhir' $wheregudangpenjualan 

SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, pelanggan.kode, gudang.nama,'BELI' AS tipetrans,
(SELECT SUM(detil_pembelian.jumlah_besar) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS jmlsatuanbesarmasuk, (SELECT SUM(detil_pembelian.jumlah_kecil) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS jmlsatuankecilmasuk, (SELECT SUM(detil_pembelian.harga) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS hargamasuk, (SELECT SUM(detil_pembelian.harga * detil_pembelian.jumlah_kecil) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'B' AS 'inisialkode'
FROM pembelian
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = pembelian.idsupplier
WHERE pembelian.status = 'active' AND pembelian.nomor_nota IN (SELECT detil_pembelian.nomor_nota FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang ) AND pembelian.tanggal_terima >= '$tglawal' AND pembelian.tanggal_terima <= '$tglakhir' $wheregudangpembelian


SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, pelanggan.kode, gudang.nama, 'RETURJUAL' AS tipetrans,
'' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
(SELECT SUM(detil_retur_penjualan.jumlah_besar) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS jmlsatuanbesarkeluar, 
(SELECT SUM(detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS jmlsatuankecilkeluar, 
(SELECT SUM(detil_retur_penjualan.harga_retur) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS hargakeluar, 
(SELECT SUM(detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS subtotalkeluar, 'RJ' AS 'inisialkode'
FROM retur_penjualan
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_penjualan.idpelanggan
WHERE retur_penjualan.status = 'active' AND retur_penjualan.nomor_nota IN (SELECT detil_retur_penjualan.nomor_nota FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang ) AND retur_penjualan.tanggal >= '$tglawal' AND retur_penjualan.tanggal <= '$tglakhir' $wheregudangreturpenjualan

;

SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, pelanggan.kode, gudang.nama,'RETURBELI' AS tipetrans,
(SELECT SUM(detil_retur_pembelian.jumlah_besar) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS jmlsatuanbesarmasuk, 
(SELECT SUM(detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS jmlsatuankecilmasuk, 
(SELECT SUM(detil_retur_pembelian.harga_retur) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS hargamasuk, (SELECT SUM(detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'RB' AS 'inisialkode'
FROM retur_pembelian
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_pembelian.idsupplier
WHERE retur_pembelian.status = 'active' AND retur_pembelian.nomor_nota IN (SELECT detil_retur_pembelian.nomor_nota FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang ) AND retur_pembelian.tanggal >= '$tglawal' AND retur_pembelian.tanggal <= '$tglakhir' $wheregudangreturpembelian

*/

		$h = $this->db->query("
SELECT penjualan.tanggal_jual AS tanggal, penjualan.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan', gudang.nama, 'JUAL' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
detil_penjualan.jumlah_besar AS jmlsatuanbesarkeluar, detil_penjualan.jumlah_kecil AS jmlsatuankecilkeluar, detil_penjualan.harga AS hargakeluar, (detil_penjualan.harga * detil_penjualan.jumlah_kecil) AS subtotalkeluar, 'J' AS 'inisialkode'
FROM detil_penjualan
INNER JOIN penjualan ON penjualan.nomor_nota = detil_penjualan.nomor_nota
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = penjualan.idpelanggan
WHERE detil_penjualan.idbarang = $idbarang AND penjualan.status = 'active' AND penjualan.tanggal_jual >= '$tglawal' AND penjualan.tanggal_jual <= '$tglakhir' $wheregudangpenjualan
UNION
SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan', gudang.nama,'BELI' AS tipetrans, detil_pembelian.jumlah_besar AS jmlsatuanbesarmasuk, detil_pembelian.jumlah_kecil AS jmlsatuankecilmasuk, detil_pembelian.harga AS hargamasuk, (detil_pembelian.harga * detil_pembelian.jumlah_kecil) AS subtotalmasuk, '' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'B' AS 'inisialkode'
FROM detil_pembelian
INNER JOIN pembelian ON pembelian.nomor_nota = detil_pembelian.nomor_nota 
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = pembelian.idsupplier
WHERE pembelian.status = 'active' AND detil_pembelian.idbarang = $idbarang AND pembelian.tanggal_terima >= '$tglawal' AND pembelian.tanggal_terima <= '$tglakhir' $wheregudangpembelian 
UNION
SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan', gudang.nama, 'RETURJUAL' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
detil_retur_penjualan.jumlah_besar AS jmlsatuanbesarkeluar, detil_retur_penjualan.jumlah_kecil AS jmlsatuankecilkeluar, detil_retur_penjualan.harga_retur AS hargakeluar, (detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil) AS subtotalkeluar, 'RJ' AS 'inisialkode'
FROM detil_retur_penjualan
INNER JOIN retur_penjualan ON retur_penjualan.nomor_nota = detil_retur_penjualan.nomor_nota
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_penjualan.idpelanggan
WHERE retur_penjualan.status = 'active' AND detil_retur_penjualan.idbarang = $idbarang AND retur_penjualan.tanggal >= '$tglawal' AND retur_penjualan.tanggal <= '$tglakhir' $wheregudangreturpenjualan
UNION
SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan', gudang.nama,'RETURBELI' AS tipetrans,
detil_retur_pembelian.jumlah_besar AS jmlsatuanbesarmasuk, detil_retur_pembelian.jumlah_kecil AS jmlsatuankecilmasuk, detil_retur_pembelian.harga_retur AS hargamasuk, (detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'RB' AS 'inisialkode'
FROM detil_retur_pembelian 
INNER JOIN retur_pembelian ON retur_pembelian.nomor_nota = detil_retur_pembelian.nomor_nota
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_pembelian.idsupplier
WHERE retur_pembelian.status = 'active' AND detil_retur_pembelian.idbarang = $idbarang AND retur_pembelian.tanggal >= '$tglawal' AND retur_pembelian.tanggal <= '$tglakhir' $wheregudangreturpembelian
UNION
SELECT transfer_barang.tanggal AS tanggal, transfer_barang.nomor_nota, '' AS kode, '' as 'namapelanggan', gudang.nama, 'TRANSKELUAR' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
transfer_barang.jumlah_besar AS jmlsatuanbesarkeluar, transfer_barang.jumlah_kecil AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'TR' AS 'inisialkode'
FROM transfer_barang
INNER JOIN gudang ON gudang.idgudang = transfer_barang.idgudang_asal 
WHERE transfer_barang.idbarang = $idbarang  AND transfer_barang.status = 'active' AND transfer_barang.tanggal >= '$tglawal' AND transfer_barang.tanggal <= '$tglakhir' $wheregudangtransferkeluar
UNION 
SELECT transfer_barang.tanggal AS tanggal, transfer_barang.nomor_nota, '' AS kode, '' as 'namapelanggan', gudang.nama, 'TRANSMASUK' AS tipetrans, transfer_barang.jumlah_besar AS jmlsatuanbesarmasuk, transfer_barang.jumlah_kecil AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'TR' AS 'inisialkode'
FROM transfer_barang
INNER JOIN gudang ON gudang.idgudang = transfer_barang.idgudang_tujuan 
WHERE transfer_barang.idbarang = $idbarang  AND transfer_barang.status = 'active' AND transfer_barang.tanggal >= '$tglawal' AND transfer_barang.tanggal <= '$tglakhir' $wheregudangtransferkeluar
UNION
SELECT barang_hilang.tanggal AS tanggal, barang_hilang.nomor_nota, '' AS kode, '' as 'namapelanggan', gudang.nama, 'HILANG' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
barang_hilang.jumlah_besar AS jmlsatuanbesarkeluar, barang_hilang.jumlah_kecil AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar, 'BH' AS 'inisialkode'
FROM barang_hilang
INNER JOIN gudang ON gudang.idgudang = barang_hilang.idgudang_asal 
WHERE barang_hilang.idbarang = $idbarang  AND barang_hilang.status = 'active' AND barang_hilang.tanggal >= '$tglawal' AND barang_hilang.tanggal <= '$tglakhir' $wheregudanghilangkeluar
");
		
	//	echo $this->db->last_query();
	//	die();
		
		return $h->result();
	}

	public function getStokBarangSaldoAwal($idbarang = '', $tglawal = '', $idgudang = '') {
		$wheregudangpenjualan = '';
		if($idgudang != '') {
			$wheregudangpenjualan = " AND penjualan.idgudang = $idgudang ";
		}

		$wheregudangpembelian = '';
		if($idgudang != '') {
			$wheregudangpembelian = " AND pembelian.idgudang = $idgudang ";
		}

		$wheregudangreturpenjualan = '';
		if($idgudang != '') {
			$wheregudangreturpenjualan = " AND retur_penjualan.idgudang = $idgudang ";
		}
		$wheregudangreturpembelian = '';
		if($idgudang != '') {
			$wheregudangreturpembelian = " AND retur_pembelian.idgudang = $idgudang ";
		}
		$wheregudangtransferkeluar = '';
		if($idgudang != '') {
			$wheregudangtransferkeluar = " AND transfer_barang.idgudang_asal = $idgudang ";
		}
		$wheregudanghilangkeluar = '';
		if($idgudang != '') {
			$wheregudanghilangkeluar = " AND barang_hilang.idgudang_asal = $idgudang ";
		}


		/*
		SELECT penjualan.tanggal_jual as tanggal, penjualan.nomor_nota, pelanggan.kode, gudang.nama, 'JUAL' AS tipetrans,
'' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,(SELECT SUM(detil_penjualan.jumlah_besar) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS jmlsatuanbesarkeluar, (SELECT SUM(detil_penjualan.jumlah_kecil) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS jmlsatuankecilkeluar, (SELECT SUM(detil_penjualan.harga) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS hargakeluar, (SELECT SUM(detil_penjualan.harga * detil_penjualan.jumlah_kecil) FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang AND detil_penjualan.nomor_nota = penjualan.nomor_nota) AS subtotalkeluar
FROM penjualan
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = penjualan.idpelanggan
WHERE penjualan.status = 'active' AND penjualan.nomor_nota IN (SELECT detil_penjualan.nomor_nota FROM detil_penjualan WHERE detil_penjualan.idbarang = $idbarang ) AND penjualan.tanggal_jual < '$tglawal' $wheregudangpenjualan


SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, pelanggan.kode, gudang.nama,'BELI' AS tipetrans,
(SELECT SUM(detil_pembelian.jumlah_besar) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS jmlsatuanbesarmasuk, (SELECT SUM(detil_pembelian.jumlah_kecil) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS jmlsatuankecilmasuk, (SELECT SUM(detil_pembelian.harga) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS hargamasuk, (SELECT SUM(detil_pembelian.harga * detil_pembelian.jumlah_kecil) FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang AND detil_pembelian.nomor_nota = pembelian.nomor_nota) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM pembelian
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = pembelian.idsupplier
WHERE pembelian.status = 'active' AND pembelian.nomor_nota IN (SELECT detil_pembelian.nomor_nota FROM detil_pembelian WHERE detil_pembelian.idbarang = $idbarang ) AND pembelian.tanggal_terima < '$tglawal'  $wheregudangpembelian



SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, pelanggan.kode, gudang.nama, 'RETURJUAL' AS tipetrans,
'' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
(SELECT SUM(detil_retur_penjualan.jumlah_besar) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS jmlsatuanbesarkeluar, 
(SELECT SUM(detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS jmlsatuankecilkeluar, 
(SELECT SUM(detil_retur_penjualan.harga_retur) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS hargakeluar, 
(SELECT SUM(detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang AND detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota) AS subtotalkeluar
FROM retur_penjualan
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_penjualan.idpelanggan
WHERE retur_penjualan.status = 'active' AND retur_penjualan.nomor_nota IN (SELECT detil_retur_penjualan.nomor_nota FROM detil_retur_penjualan WHERE detil_retur_penjualan.idbarang = $idbarang ) AND retur_penjualan.tanggal < '$tglawal' $wheregudangreturpenjualan



SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, pelanggan.kode, gudang.nama,'RETURBELI' AS tipetrans,
(SELECT SUM(detil_retur_pembelian.jumlah_besar) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS jmlsatuanbesarmasuk, 
(SELECT SUM(detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS jmlsatuankecilmasuk, 
(SELECT SUM(detil_retur_pembelian.harga_retur) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS hargamasuk, (SELECT SUM(detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang AND detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM retur_pembelian
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_pembelian.idsupplier
WHERE retur_pembelian.status = 'active' AND retur_pembelian.nomor_nota IN (SELECT detil_retur_pembelian.nomor_nota FROM detil_retur_pembelian WHERE detil_retur_pembelian.idbarang = $idbarang ) AND retur_pembelian.tanggal < '$tglawal' $wheregudangreturpembelian 
*/
		$h = $this->db->query("SELECT penjualan.tanggal_jual AS tanggal, penjualan.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan',gudang.nama, 'JUAL' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
detil_penjualan.jumlah_besar AS jmlsatuanbesarkeluar, detil_penjualan.jumlah_kecil AS jmlsatuankecilkeluar, detil_penjualan.harga AS hargakeluar, (detil_penjualan.harga * detil_penjualan.jumlah_kecil) AS subtotalkeluar
FROM detil_penjualan
INNER JOIN penjualan ON penjualan.nomor_nota = detil_penjualan.nomor_nota
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = penjualan.idpelanggan
WHERE detil_penjualan.idbarang = $idbarang AND penjualan.status = 'active' AND penjualan.tanggal_jual < '$tglawal' $wheregudangpenjualan
UNION
SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan', gudang.nama,'BELI' AS tipetrans, detil_pembelian.jumlah_besar AS jmlsatuanbesarmasuk, detil_pembelian.jumlah_kecil AS jmlsatuankecilmasuk, detil_pembelian.harga AS hargamasuk, (detil_pembelian.harga * detil_pembelian.jumlah_kecil) AS subtotalmasuk, '' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM detil_pembelian
INNER JOIN pembelian ON pembelian.nomor_nota = detil_pembelian.nomor_nota 
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = pembelian.idsupplier
WHERE pembelian.status = 'active' AND detil_pembelian.idbarang = $idbarang AND pembelian.tanggal_terima < '$tglawal' $wheregudangpembelian
UNION
SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan',  gudang.nama, 'RETURJUAL' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
detil_retur_penjualan.jumlah_besar AS jmlsatuanbesarkeluar, detil_retur_penjualan.jumlah_kecil AS jmlsatuankecilkeluar, detil_retur_penjualan.harga_retur AS hargakeluar, (detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil) AS subtotalkeluar
FROM detil_retur_penjualan
INNER JOIN retur_penjualan ON retur_penjualan.nomor_nota = detil_retur_penjualan.nomor_nota
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_penjualan.idpelanggan
WHERE retur_penjualan.status = 'active' AND detil_retur_penjualan.idbarang = $idbarang AND retur_penjualan.tanggal < '$tglawal'  $wheregudangreturpenjualan $wheregudangreturpenjualan
UNION
SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, pelanggan.kode, pelanggan.nama as 'namapelanggan',  gudang.nama,'RETURBELI' AS tipetrans,
detil_retur_pembelian.jumlah_besar AS jmlsatuanbesarmasuk, detil_retur_pembelian.jumlah_kecil AS jmlsatuankecilmasuk, detil_retur_pembelian.harga_retur AS hargamasuk, (detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil) AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM detil_retur_pembelian 
INNER JOIN retur_pembelian ON retur_pembelian.nomor_nota = detil_retur_pembelian.nomor_nota
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_pembelian.idsupplier
WHERE retur_pembelian.status = 'active' AND detil_retur_pembelian.idbarang = $idbarang AND retur_pembelian.tanggal < '$tglawal'  $wheregudangreturpembelian
UNION
SELECT transfer_barang.tanggal AS tanggal, transfer_barang.nomor_nota, '' AS kode, '' as 'namapelanggan', gudang.nama, 'TRANSKELUAR' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
transfer_barang.jumlah_besar AS jmlsatuanbesarkeluar, transfer_barang.jumlah_kecil AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM transfer_barang
INNER JOIN gudang ON gudang.idgudang = transfer_barang.idgudang_asal 
WHERE transfer_barang.idbarang = $idbarang  AND transfer_barang.status = 'active' AND transfer_barang.tanggal < '$tglawal' $wheregudangtransferkeluar 
UNION 
SELECT transfer_barang.tanggal AS tanggal, transfer_barang.nomor_nota, '' AS kode, '' as 'namapelanggan',  gudang.nama, 'TRANSMASUK' AS tipetrans, transfer_barang.jumlah_besar AS jmlsatuanbesarmasuk, transfer_barang.jumlah_kecil AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
'' AS jmlsatuanbesarkeluar, '' AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM transfer_barang
INNER JOIN gudang ON gudang.idgudang = transfer_barang.idgudang_tujuan 
WHERE transfer_barang.idbarang = $idbarang  AND transfer_barang.status = 'active' AND transfer_barang.tanggal < '$tglawal' $wheregudangtransferkeluar
UNION
SELECT barang_hilang.tanggal AS tanggal, barang_hilang.nomor_nota, '' AS kode, '' as 'namapelanggan',  gudang.nama, 'HILANG' AS tipetrans, '' AS jmlsatuanbesarmasuk, '' AS jmlsatuankecilmasuk, '' AS hargamasuk, '' AS subtotalmasuk,
barang_hilang.jumlah_besar AS jmlsatuanbesarkeluar, barang_hilang.jumlah_kecil AS jmlsatuankecilkeluar, '' AS hargakeluar, '' AS subtotalkeluar
FROM barang_hilang
INNER JOIN gudang ON gudang.idgudang = barang_hilang.idgudang_asal 
WHERE barang_hilang.idbarang = $idbarang  AND barang_hilang.status = 'active' AND barang_hilang.tanggal < '$tglawal' $wheregudanghilangkeluar");


		return $h->result();
	}

	public function getBukuPelanggan($idpelanggan = '', $tglawal = '', $tglakhir = '') {
		$h = $this->db->query("SELECT penjualan.tanggal_jual as tanggal, penjualan.nomor_nota, 
(SELECT barang.nama FROM barang WHERE barang.idbarang = detil_penjualan.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, '' AS 'collybeli', '' AS 'jmlbeli', '' AS 'hargabeli', '' AS 'kredit', detil_penjualan.jumlah_besar AS 'collyjual', detil_penjualan.jumlah_kecil 'jmljual', detil_penjualan.harga AS 'hargajual', detil_penjualan.harga * detil_penjualan.jumlah_kecil AS 'debit', 'J' AS 'inisialkode', 'JUAL' AS 'jenistrans' 
FROM `detil_penjualan`, `penjualan` 
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang 
INNER JOIN kurs ON kurs.idkurs = penjualan.idkurs 
WHERE detil_penjualan.nomor_nota = penjualan.nomor_nota AND penjualan.idpelanggan = $idpelanggan AND penjualan.status = 'active' AND penjualan.tanggal_jual >= '$tglawal' AND penjualan.tanggal_jual <= '$tglakhir'
UNION
SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_pembelian.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, 
detil_pembelian.jumlah_besar  AS 'collybeli', 
detil_pembelian.jumlah_kecil AS 'jmlbeli', 
detil_pembelian.harga  AS 'hargabeli', 
detil_pembelian.harga * detil_pembelian.jumlah_kecil  AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'B' AS 'inisialkode','BELI' AS 'jenistrans' 
FROM `detil_pembelian`, `pembelian`
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
INNER JOIN kurs ON kurs.idkurs = pembelian.idkurs
WHERE detil_pembelian.nomor_nota = pembelian.nomor_nota AND pembelian.idsupplier = $idpelanggan AND pembelian.status = 'active' AND pembelian.tanggal_terima >= '$tglawal' AND pembelian.tanggal_terima <= '$tglakhir'
UNION
SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_retur_penjualan.idbarang) as tipetrans, gudang.nama as gudang, '' as valuta, 
detil_retur_penjualan.jumlah_besar  AS 'collybeli', detil_retur_penjualan.jumlah_kecil  AS 'jmlbeli', detil_retur_penjualan.harga_retur  AS 'hargabeli', detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil AS 'kredit',
''  AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'RJ' AS 'inisialkode','RETURJUAL' AS 'jenistrans' 
FROM `detil_retur_penjualan`, `retur_penjualan`
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota AND retur_penjualan.idpelanggan = $idpelanggan AND retur_penjualan.status = 'active' AND retur_penjualan.tanggal >= '$tglawal' AND retur_penjualan.tanggal <= '$tglakhir'
UNION
SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_retur_pembelian.idbarang) as tipetrans, gudang.nama as gudang, '' as valuta, 
''  AS 'collybeli', 
'' AS 'jmlbeli',
'' AS 'hargabeli', 
''  AS 'kredit',
detil_retur_pembelian.jumlah_besar AS 'collyjual', 
detil_retur_pembelian.jumlah_kecil AS 'jmljual', 
detil_retur_pembelian.harga_retur AS 'hargajual',  
detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil AS 'debit', 'RB' AS 'inisialkode','RETURBELI' AS 'jenistrans' 
FROM `detil_retur_pembelian`, `retur_pembelian`
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota AND retur_pembelian.idsupplier = $idpelanggan AND retur_pembelian.status = 'active' AND retur_pembelian.tanggal >= '$tglawal' AND retur_pembelian.tanggal <= '$tglakhir'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, UPPER(rekening.bank) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', hutangpiutang.nominal AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
'' AS 'debit', 'P' AS 'inisialkode','TERIMA PIUTANG' AS 'jenistrans'  
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir' AND hutangpiutang.jenis = 'piutang'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, UPPER(rekening.bank) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
hutangpiutang.nominal AS 'debit', 'H' AS 'inisialkode','BAYAR HUTANG' AS 'jenistrans'  
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir' AND hutangpiutang.jenis = 'hutang'
UNION
SELECT penjualan_saham.tanggal, penjualan_saham.nomor_nota,  UPPER(CONCAT('JUAL SAHAM ', saham.nama)) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
detil_penjualan_saham.jumlah_besar  AS 'collyjual', 
detil_penjualan_saham.jumlah_kecil  AS 'jmljual', 
detil_penjualan_saham.harga  AS 'hargajual',  
detil_penjualan_saham.harga * detil_penjualan_saham.jumlah_kecil AS 'debit', 'JSH' AS 'inisialkode','JUAL SAHAM' AS 'jenistrans'  
FROM detil_penjualan_saham
INNER JOIN penjualan_saham ON penjualan_saham.nomor_nota = detil_penjualan_saham.nomor_nota
INNER JOIN saham ON saham.idsaham = detil_penjualan_saham.idsaham
INNER JOIN kurs ON kurs.idkurs = penjualan_saham.idkurs
WHERE penjualan_saham.idpelanggan = $idpelanggan AND penjualan_saham.status = 'active' AND penjualan_saham.tanggal >= '$tglawal' AND penjualan_saham.tanggal <= '$tglakhir'
UNION
SELECT pembelian_saham.tanggal, pembelian_saham.nomor_nota, UPPER(CONCAT('BELI SAHAM ', saham.nama)) as tipetrans, '' as gudang, kurs.lambang as valuta, 
detil_pembelian_saham.jumlah_besar AS 'collybeli', detil_pembelian_saham.jumlah_kecil AS 'jmlbeli', detil_pembelian_saham.harga  AS 'hargabeli', detil_pembelian_saham.harga * detil_pembelian_saham.jumlah_kecil AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'BSH' AS 'inisialkode','BELI SAHAM' AS 'jenistrans' 
FROM `detil_pembelian_saham`
INNER JOIN pembelian_saham ON pembelian_saham.nomor_nota = detil_pembelian_saham.nomor_nota
INNER JOIN saham ON saham.idsaham = detil_pembelian_saham.idsaham
INNER JOIN kurs ON kurs.idkurs = pembelian_saham.idkurs
WHERE pembelian_saham.idpelanggan = $idpelanggan AND pembelian_saham.status = 'active' AND pembelian_saham.tanggal >= '$tglawal' AND pembelian_saham.tanggal <= '$tglakhir'
ORDER BY tanggal ASC");
		

		return $h->result();
	}

	// BACKUP
	/*
	public function getBukuPelanggan($idpelanggan = '', $tglawal = '', $tglakhir = '') {
		$h = $this->db->query("SELECT penjualan.tanggal_jual as tanggal, penjualan.nomor_nota, 
(SELECT barang.nama FROM barang WHERE barang.idbarang = detil_penjualan.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, '' AS 'collybeli', '' AS 'jmlbeli', '' AS 'hargabeli', '' AS 'kredit', detil_penjualan.jumlah_besar AS 'collyjual', detil_penjualan.jumlah_kecil 'jmljual', detil_penjualan.harga AS 'hargajual', detil_penjualan.harga * detil_penjualan.jumlah_kecil AS 'debit', 'J' AS 'inisialkode' 
FROM `detil_penjualan`, `penjualan` 
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang 
INNER JOIN kurs ON kurs.idkurs = penjualan.idkurs 
WHERE detil_penjualan.nomor_nota = penjualan.nomor_nota AND penjualan.idpelanggan = $idpelanggan AND penjualan.status = 'active' AND penjualan.tanggal_jual >= '$tglawal' AND penjualan.tanggal_jual <= '$tglakhir'
UNION
SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_pembelian.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, 
detil_pembelian.jumlah_besar  AS 'collybeli', 
detil_pembelian.jumlah_kecil AS 'jmlbeli', 
detil_pembelian.harga  AS 'hargabeli', 
detil_pembelian.harga * detil_pembelian.jumlah_kecil  AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'B' AS 'inisialkode' 
FROM `detil_pembelian`, `pembelian`
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
INNER JOIN kurs ON kurs.idkurs = pembelian.idkurs
WHERE detil_pembelian.nomor_nota = pembelian.nomor_nota AND pembelian.idsupplier = $idpelanggan AND pembelian.status = 'active' AND pembelian.tanggal_terima >= '$tglawal' AND pembelian.tanggal_terima <= '$tglakhir'
UNION
SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, 'RETURJUAL' as tipetrans, gudang.nama as gudang, '' as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
(SELECT SUM(detil_retur_penjualan.jumlah_besar) FROM detil_retur_penjualan WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota )  AS 'collyjual', 
(SELECT SUM(detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota )  AS 'jmljual', 
(SELECT SUM(detil_retur_penjualan.harga_retur) FROM detil_retur_penjualan WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota )  AS 'hargajual',  
(SELECT SUM(detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil) FROM detil_retur_penjualan WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota )  AS 'debit', 'RJ' AS 'inisialkode' 

FROM `retur_penjualan`
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
WHERE retur_penjualan.idpelanggan = $idpelanggan AND retur_penjualan.status = 'active' AND retur_penjualan.tanggal >= '$tglawal' AND retur_penjualan.tanggal <= '$tglakhir'
UNION
SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, 'RETURBELI' as tipetrans, gudang.nama as gudang, '' as valuta, 
(SELECT SUM(detil_retur_pembelian.jumlah_besar) FROM detil_retur_pembelian WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota )  AS 'collybeli', (SELECT SUM(detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota )  AS 'jmlbeli', (SELECT SUM(detil_retur_pembelian.harga_retur) FROM detil_retur_pembelian WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota )  AS 'hargabeli', (SELECT SUM(detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil) FROM detil_retur_pembelian WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota )  AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'RB' AS 'inisialkode' 
FROM `retur_pembelian`
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
WHERE retur_pembelian.idsupplier = $idpelanggan AND retur_pembelian.status = 'active' AND retur_pembelian.tanggal >= '$tglawal' AND retur_pembelian.tanggal <= '$tglakhir'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, 'TERIMA PIUTANG' as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', hutangpiutang.nominal AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
'' AS 'debit', 'P' AS 'inisialkode' 
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir' AND hutangpiutang.jenis = 'piutang'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, rekening.kode as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
hutangpiutang.nominal AS 'debit', 'H' AS 'inisialkode' 
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir' AND hutangpiutang.jenis = 'hutang'
UNION
SELECT penjualan_saham.tanggal, penjualan_saham.nomor_nota, 'JUAL SAHAM' as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
(SELECT SUM(detil_penjualan_saham.jumlah_besar) FROM detil_penjualan_saham WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota )  AS 'collyjual', 
(SELECT SUM(detil_penjualan_saham.jumlah_kecil) FROM detil_penjualan_saham WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota )  AS 'jmljual', 
(SELECT SUM(detil_penjualan_saham.harga) FROM detil_penjualan_saham WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota )  AS 'hargajual',  
(SELECT SUM(detil_penjualan_saham.harga * detil_penjualan_saham.jumlah_kecil) FROM detil_penjualan_saham WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota )  AS 'debit', 'JSH' AS 'inisialkode' 

FROM `penjualan_saham`
INNER JOIN gudang ON gudang.idgudang = penjualan_saham.idgudang
INNER JOIN kurs ON kurs.idkurs = penjualan_saham.idkurs
WHERE penjualan_saham.idpelanggan = $idpelanggan AND penjualan_saham.status = 'active' AND penjualan_saham.tanggal >= '$tglawal' AND penjualan_saham.tanggal <= '$tglakhir'
UNION
SELECT pembelian_saham.tanggal, pembelian_saham.nomor_nota, 'BELI SAHAM' as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, 
(SELECT SUM(detil_pembelian_saham.jumlah_besar) FROM detil_pembelian_saham WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota )  AS 'collybeli', (SELECT SUM(detil_pembelian_saham.jumlah_kecil) FROM detil_pembelian_saham WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota )  AS 'jmlbeli', (SELECT SUM(detil_pembelian_saham.harga) FROM detil_pembelian_saham WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota )  AS 'hargabeli', (SELECT SUM(detil_pembelian_saham.harga * detil_pembelian_saham.jumlah_kecil) FROM detil_pembelian_saham WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota )  AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'BSH' AS 'inisialkode' 
FROM `pembelian_saham`
INNER JOIN gudang ON gudang.idgudang = pembelian_saham.idgudang
INNER JOIN kurs ON kurs.idkurs = pembelian_saham.idkurs
WHERE pembelian_saham.idpelanggan = $idpelanggan AND pembelian_saham.status = 'active' AND pembelian_saham.tanggal >= '$tglawal' AND pembelian_saham.tanggal <= '$tglakhir'
ORDER BY tanggal ASC");
		

		return $h->result();
	}
	*/

	public function getBukuPelangganSaldoAwal($idpelanggan = '', $tglawal = '') {
		$h = $this->db->query("SELECT penjualan.tanggal_jual as tanggal, penjualan.nomor_nota, 
(SELECT barang.nama FROM barang WHERE barang.idbarang = detil_penjualan.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, '' AS 'collybeli', '' AS 'jmlbeli', '' AS 'hargabeli', '' AS 'kredit', detil_penjualan.jumlah_besar AS 'collyjual', detil_penjualan.jumlah_kecil 'jmljual', detil_penjualan.harga AS 'hargajual', detil_penjualan.harga * detil_penjualan.jumlah_kecil AS 'debit', 'J' AS 'inisialkode','JUAL' AS 'jenistrans' 
FROM `detil_penjualan`, `penjualan` 
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang 
INNER JOIN kurs ON kurs.idkurs = penjualan.idkurs 
WHERE detil_penjualan.nomor_nota = penjualan.nomor_nota AND penjualan.idpelanggan = $idpelanggan AND penjualan.status = 'active' AND penjualan.tanggal_jual < '$tglawal'
UNION
SELECT pembelian.tanggal_terima as tanggal, pembelian.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_pembelian.idbarang) as tipetrans, gudang.nama as gudang, kurs.lambang as valuta, 
detil_pembelian.jumlah_besar  AS 'collybeli', 
detil_pembelian.jumlah_kecil AS 'jmlbeli', 
detil_pembelian.harga  AS 'hargabeli', 
detil_pembelian.harga * detil_pembelian.jumlah_kecil  AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'B' AS 'inisialkode','BELI' AS 'jenistrans'  
FROM `detil_pembelian`, `pembelian`
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
INNER JOIN kurs ON kurs.idkurs = pembelian.idkurs
WHERE detil_pembelian.nomor_nota = pembelian.nomor_nota AND pembelian.idsupplier = $idpelanggan AND pembelian.status = 'active' AND pembelian.tanggal_terima < '$tglawal'
UNION
SELECT retur_penjualan.tanggal, retur_penjualan.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_retur_penjualan.idbarang) as tipetrans, gudang.nama as gudang, '' as valuta, 
detil_retur_penjualan.jumlah_besar  AS 'collybeli', detil_retur_penjualan.jumlah_kecil  AS 'jmlbeli', detil_retur_penjualan.harga_retur  AS 'hargabeli', detil_retur_penjualan.harga_retur * detil_retur_penjualan.jumlah_kecil AS 'kredit',
''  AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'RJ' AS 'inisialkode','RETURJUAL' AS 'jenistrans' 
FROM `detil_retur_penjualan`, `retur_penjualan`
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
WHERE detil_retur_penjualan.nomor_nota = retur_penjualan.nomor_nota AND retur_penjualan.idpelanggan = $idpelanggan AND retur_penjualan.status = 'active' AND retur_penjualan.tanggal < '$tglawal'
UNION
SELECT retur_pembelian.tanggal, retur_pembelian.nomor_nota, (SELECT barang.nama FROM barang WHERE barang.idbarang = detil_retur_pembelian.idbarang) as tipetrans, gudang.nama as gudang, '' as valuta, 
''  AS 'collybeli', 
'' AS 'jmlbeli',
'' AS 'hargabeli', 
''  AS 'kredit',
detil_retur_pembelian.jumlah_besar AS 'collyjual', 
detil_retur_pembelian.jumlah_kecil AS 'jmljual', 
detil_retur_pembelian.harga_retur AS 'hargajual',  
detil_retur_pembelian.harga_retur * detil_retur_pembelian.jumlah_kecil AS 'debit', 'RB' AS 'inisialkode','RETURBELI' AS 'jenistrans'  
FROM `detil_retur_pembelian`, `retur_pembelian`
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
WHERE detil_retur_pembelian.nomor_nota = retur_pembelian.nomor_nota AND retur_pembelian.idsupplier = $idpelanggan AND retur_pembelian.status = 'active' AND retur_pembelian.tanggal < '$tglawal'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, UPPER(rekening.bank) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', hutangpiutang.nominal AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
'' AS 'debit', 'P' AS 'inisialkode','TERIMA PIUTANG' AS 'jenistrans'  
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal < '$tglawal' AND hutangpiutang.jenis = 'piutang'
UNION
SELECT hutangpiutang.tanggal, hutangpiutang.nomor_nota, UPPER(rekening.bank) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
''  AS 'collyjual', ''  AS 'jmljual', ''  AS 'hargajual',
hutangpiutang.nominal AS 'debit', 'H' AS 'inisialkode','BAYAR HUTANG' AS 'jenistrans'  
FROM `hutangpiutang`
INNER JOIN kurs ON kurs.idkurs = hutangpiutang.idkurs
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idpelanggan = $idpelanggan AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal < '$tglawal' AND hutangpiutang.jenis = 'hutang'
UNION
SELECT penjualan_saham.tanggal, penjualan_saham.nomor_nota,  UPPER(CONCAT('JUAL SAHAM ', saham.nama)) as tipetrans, '' as gudang, kurs.lambang as valuta, 
''  AS 'collybeli', ''  AS 'jmlbeli', ''  AS 'hargabeli', '' AS 'kredit',
detil_penjualan_saham.jumlah_besar  AS 'collyjual', 
detil_penjualan_saham.jumlah_kecil  AS 'jmljual', 
detil_penjualan_saham.harga  AS 'hargajual',  
detil_penjualan_saham.harga * detil_penjualan_saham.jumlah_kecil AS 'debit', 'JSH' AS 'inisialkode','JUAL SAHAM' AS 'jenistrans'  
FROM detil_penjualan_saham
INNER JOIN penjualan_saham ON penjualan_saham.nomor_nota = detil_penjualan_saham.nomor_nota
INNER JOIN saham ON saham.idsaham = detil_penjualan_saham.idsaham
INNER JOIN kurs ON kurs.idkurs = penjualan_saham.idkurs
WHERE penjualan_saham.idpelanggan = $idpelanggan AND penjualan_saham.status = 'active' AND penjualan_saham.tanggal < '$tglawal' 
UNION
SELECT pembelian_saham.tanggal, pembelian_saham.nomor_nota, UPPER(CONCAT('BELI SAHAM ', saham.nama)) as tipetrans, '' as gudang, kurs.lambang as valuta, 
detil_pembelian_saham.jumlah_besar AS 'collybeli', detil_pembelian_saham.jumlah_kecil AS 'jmlbeli', detil_pembelian_saham.harga  AS 'hargabeli', detil_pembelian_saham.harga * detil_pembelian_saham.jumlah_kecil AS 'kredit',
'' AS 'collyjual', 
'' AS 'jmljual', 
'' AS 'hargajual',  
'' AS 'debit', 'BSH' AS 'inisialkode','BELI SAHAM' AS 'jenistrans' 
FROM `detil_pembelian_saham`
INNER JOIN pembelian_saham ON pembelian_saham.nomor_nota = detil_pembelian_saham.nomor_nota
INNER JOIN saham ON saham.idsaham = detil_pembelian_saham.idsaham
INNER JOIN kurs ON kurs.idkurs = pembelian_saham.idkurs
WHERE pembelian_saham.idpelanggan = $idpelanggan AND pembelian_saham.status = 'active' AND pembelian_saham.tanggal < '$tglawal'
ORDER BY tanggal ASC");
		

		return $h->result();
	}

	public function getSaham($idsaham = '', $tglawal = '', $tglakhir = '') {
		$h = $this->db->query("SELECT penjualan_saham.tanggal, penjualan_saham.nomor_nota, (SELECT saham.nama FROM saham WHERE saham.idsaham = detil_penjualan_saham.idsaham) AS tipetrans, '' AS jmlsatuanbesarbeli, '' AS jmlsatuankecilbeli, '' AS hargabeli, '' AS subtotalbeli, detil_penjualan_saham.jumlah_besar AS jmlsatuanbesarjual, detil_penjualan_saham.jumlah_kecil AS jmlsatuankeciljual, detil_penjualan_saham.harga AS hargajual, detil_penjualan_saham.harga * detil_penjualan_saham.jumlah_kecil AS subtotaljual, 'JSH' AS 'inisialkode', 'JUAL' AS jenistrans FROM `detil_penjualan_saham`, `penjualan_saham` WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota AND penjualan_saham.status = 'active' AND penjualan_saham.tanggal >= '$tglawal' AND penjualan_saham.tanggal <= '$tglakhir' AND detil_penjualan_saham.idsaham = $idsaham
UNION
SELECT pembelian_saham.tanggal, pembelian_saham.nomor_nota, (SELECT saham.nama FROM saham WHERE saham.idsaham = detil_pembelian_saham.idsaham)  AS tipetrans,
detil_pembelian_saham.jumlah_besar AS jmlsatuanbesarbeli,
detil_pembelian_saham.jumlah_kecil AS jmlsatuankecilbeli,
detil_pembelian_saham.harga AS hargabeli, 
detil_pembelian_saham.harga * detil_pembelian_saham.jumlah_kecil AS subtotalbeli,
'' AS jmlsatuanbesarjual, '' AS jmlsatuankeciljual, '' AS hargajual, '' AS subtotaljual, 'BSH' AS 'inisialkode', 'BELI' AS jenistrans
FROM `detil_pembelian_saham`, pembelian_saham
WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota AND pembelian_saham.status = 'active' AND pembelian_saham.tanggal >= '$tglawal' AND pembelian_saham.tanggal <= '$tglakhir' AND detil_pembelian_saham.idsaham = $idsaham
ORDER BY tanggal ASC");

		//echo $this->db->last_query();
		$hasil =  $h->result();
		return $hasil;
	}

	public function getSahamSaldoAwal($idsaham = '', $tglawal = '') {
		$h = $this->db->query("SELECT penjualan_saham.tanggal, penjualan_saham.nomor_nota, (SELECT saham.nama FROM saham WHERE saham.idsaham = detil_penjualan_saham.idsaham) AS tipetrans, '' AS jmlsatuanbesarbeli, '' AS jmlsatuankecilbeli, '' AS hargabeli, '' AS subtotalbeli, detil_penjualan_saham.jumlah_besar AS jmlsatuanbesarjual, detil_penjualan_saham.jumlah_kecil AS jmlsatuankeciljual, detil_penjualan_saham.harga AS hargajual, detil_penjualan_saham.harga * detil_penjualan_saham.jumlah_kecil AS subtotaljual, 'JSH' AS 'inisialkode', 'JUAL' AS jenistrans FROM `detil_penjualan_saham`, `penjualan_saham` WHERE detil_penjualan_saham.nomor_nota = penjualan_saham.nomor_nota AND penjualan_saham.status = 'active' AND penjualan_saham.tanggal < '$tglawal' AND detil_penjualan_saham.idsaham = $idsaham
UNION
SELECT pembelian_saham.tanggal, pembelian_saham.nomor_nota, (SELECT saham.nama FROM saham WHERE saham.idsaham = detil_pembelian_saham.idsaham)  AS tipetrans,
detil_pembelian_saham.jumlah_besar AS jmlsatuanbesarbeli,
detil_pembelian_saham.jumlah_kecil AS jmlsatuankecilbeli,
detil_pembelian_saham.harga AS hargabeli, 
detil_pembelian_saham.harga * detil_pembelian_saham.jumlah_kecil AS subtotalbeli,
'' AS jmlsatuanbesarjual, '' AS jmlsatuankeciljual, '' AS hargajual, '' AS subtotaljual, 'BSH' AS 'inisialkode', 'BELI' AS jenistrans
FROM `detil_pembelian_saham`, pembelian_saham
WHERE detil_pembelian_saham.nomor_nota = pembelian_saham.nomor_nota AND pembelian_saham.status = 'active' AND pembelian_saham.tanggal < '$tglawal'	 AND detil_pembelian_saham.idsaham = $idsaham
ORDER BY tanggal ASC");

		$hasil =  $h->result();
		return $hasil;
	}

	public function getBukuBank($idrekening = '', $tglawal = '', $tglakhir = '') {
		//CONCAT(transaksi_bank.keterangan_asal, ' ', transaksi_bank.keterangan_tujuan)
		$h = $this->db->query("SELECT hutangpiutang.nomor_nota, hutangpiutang.tanggal, 'HUTANG' as tipetrans, 'BAYAR HUTANG KE ' as 'keterangantrans', pelanggan.kode AS 'kode', pelanggan.nama AS 'nama', hutangpiutang.keterangan, rekening.kode AS 'koderek', '' AS debit, hutangpiutang.nominal AS kredit, 'H' AS 'inisialkode'  
FROM hutangpiutang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = hutangpiutang.idpelanggan
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idrekening= $idrekening AND hutangpiutang.jenis = 'hutang' AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir'
UNION
SELECT hutangpiutang.nomor_nota, hutangpiutang.tanggal, 'PIUTANG' as tipetrans,  'TERIMA BAYAR PIUTANG DARI ' as 'keterangantrans', pelanggan.kode AS 'kode', pelanggan.nama AS 'nama', hutangpiutang.keterangan, rekening.kode AS 'koderek', hutangpiutang.nominal AS debit, '' AS kredit , 'P' AS 'inisialkode'  
FROM hutangpiutang
INNER JOIN pelanggan ON pelanggan.idpelanggan = hutangpiutang.idpelanggan
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idrekening= $idrekening AND hutangpiutang.jenis = 'piutang' AND hutangpiutang.status = 'active'  AND hutangpiutang.tanggal >= '$tglawal' AND hutangpiutang.tanggal <= '$tglakhir'
UNION
SELECT transaksi_bank.idtransfer AS 'nomor_nota', transaksi_bank.tanggal, 'TRANSMASUK' as tipetrans, 'TRANSFER DARI ' as 'keterangantrans', R1.kode AS 'kode', R1.bank AS 'nama', transaksi_bank.keterangan_tujuan as 'keterangan', rekening.kode AS 'koderek', transaksi_bank.nominal AS debit, '' AS kredit , 'KM' AS 'inisialkode'  
FROM transaksi_bank
INNER JOIN rekening ON rekening.idrekening = transaksi_bank.idrekening_tujuan
INNER JOIN rekening AS R1 ON R1.idrekening = transaksi_bank.idrekening_asal
WHERE transaksi_bank.idrekening_tujuan= $idrekening AND transaksi_bank.jenis_transaksi = 'masuk' AND transaksi_bank.status = 'active'  AND transaksi_bank.tanggal >= '$tglawal' AND transaksi_bank.tanggal <= '$tglakhir'
UNION
SELECT transaksi_bank.idtransfer AS 'nomor_nota', transaksi_bank.tanggal, 'TRANSKELUAR' as tipetrans, 'TRANSFER KE ' as 'keterangantrans', R1.kode AS 'kode', R1.bank AS 'nama', transaksi_bank.keterangan_asal as 'keterangan', rekening.kode AS 'koderek', '' AS debit, transaksi_bank.nominal AS  kredit , 'KK' AS 'inisialkode'  
FROM transaksi_bank
INNER JOIN rekening ON rekening.idrekening = transaksi_bank.idrekening_asal
INNER JOIN rekening AS R1 ON R1.idrekening = transaksi_bank.idrekening_tujuan
WHERE transaksi_bank.idrekening_asal= $idrekening  AND transaksi_bank.status = 'active' AND transaksi_bank.tanggal >= '$tglawal' AND transaksi_bank.tanggal <= '$tglakhir'
ORDER BY tanggal ASC");

		return $h->result();
	}

	public function getSaldoAwal($idrekening = '', $tglawal = '') {
		$h = $this->db->query("SELECT hutangpiutang.nomor_nota, hutangpiutang.tanggal, 'HUTANG' as tipetrans, 'BAYAR HUTANG KE ' as 'keterangantrans', pelanggan.kode AS 'kode', hutangpiutang.keterangan, rekening.kode AS 'koderek', '' AS debit, hutangpiutang.nominal AS kredit  
FROM hutangpiutang 
INNER JOIN pelanggan ON pelanggan.idpelanggan = hutangpiutang.idpelanggan
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idrekening= $idrekening AND hutangpiutang.jenis = 'hutang' AND hutangpiutang.status = 'active' AND hutangpiutang.tanggal < '$tglawal'
UNION
SELECT hutangpiutang.nomor_nota, hutangpiutang.tanggal, 'PIUTANG' as tipetrans,  'TERIMA BAYAR PIUTANG DARI ' as 'keterangantrans', pelanggan.kode AS 'kode', hutangpiutang.keterangan, rekening.kode AS 'koderek', hutangpiutang.nominal AS debit, '' AS kredit 
FROM hutangpiutang
INNER JOIN pelanggan ON pelanggan.idpelanggan = hutangpiutang.idpelanggan
INNER JOIN rekening ON rekening.idrekening = hutangpiutang.idrekening
WHERE hutangpiutang.idrekening= $idrekening AND hutangpiutang.jenis = 'piutang' AND hutangpiutang.status = 'active'  AND hutangpiutang.tanggal < '$tglawal' 
UNION
SELECT transaksi_bank.idtransfer AS 'nomor_nota', transaksi_bank.tanggal, 'TRANSMASUK' as tipetrans, 'TRANSFER DARI ' as 'keterangantrans', R1.kode AS 'kode', CONCAT(transaksi_bank.keterangan_asal, ' ', transaksi_bank.keterangan_tujuan) as 'keterangan', rekening.kode AS 'koderek', transaksi_bank.nominal AS debit, '' AS kredit 
FROM transaksi_bank
INNER JOIN rekening ON rekening.idrekening = transaksi_bank.idrekening_tujuan
INNER JOIN rekening AS R1 ON R1.idrekening = transaksi_bank.idrekening_asal
WHERE transaksi_bank.idrekening_tujuan= $idrekening AND transaksi_bank.jenis_transaksi = 'masuk' AND transaksi_bank.status = 'active'  AND transaksi_bank.tanggal < '$tglawal' 
UNION
SELECT transaksi_bank.idtransfer AS 'nomor_nota', transaksi_bank.tanggal, 'TRANSKELUAR' as tipetrans, 'TRANSFER KE ' as 'keterangantrans', R1.kode AS 'kode', CONCAT(transaksi_bank.keterangan_asal, ' ', transaksi_bank.keterangan_tujuan) as 'keterangan', rekening.kode AS 'koderek', '' AS debit, transaksi_bank.nominal AS  kredit 
FROM transaksi_bank
INNER JOIN rekening ON rekening.idrekening = transaksi_bank.idrekening_asal
INNER JOIN rekening AS R1 ON R1.idrekening = transaksi_bank.idrekening_tujuan
WHERE transaksi_bank.idrekening_asal= $idrekening AND transaksi_bank.jenis_transaksi = 'keluar' AND transaksi_bank.status = 'active' AND transaksi_bank.tanggal < '$tglawal' 
ORDER BY tanggal ASC");

		$hasil =  $h->result();

		$awal = $this->db->get_where('rekening', array('idrekening' => $idrekening));
		$hawal = $awal->result();
		if(count($hawal) >0) {
			$saldoawal = $hawal[0]->saldo_awal;

			foreach($hasil as $key) {
				if($key->debit !='') {
					$saldoawal += $key->debit;
				}

				if($key->kredit !='') {
					$saldoawal -= $key->kredit;
				}	
			}

			return $saldoawal;
		} else {
			return 0;
		}

	}

	
}
?>