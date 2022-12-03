<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {
	public function doInsert($data, $databarang) {
		$this->db->insert('penjualan', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_penjualan', $value);
		}
	}

	public function getAllFree($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT penjualan.*, pelanggan.nama as `pelanggannama`, gudang.nama as `gudangnama` FROM `penjualan`
INNER JOIN pelanggan ON pelanggan.idpelanggan = penjualan.idpelanggan
INNER JOIN gudang ON gudang.idgudang = penjualan.idgudang
WHERE (gudang.nama LIKE '%".$search."%' OR pelanggan.nama LIKE '%".$search."%' OR penjualan.nomor_nota LIKE '%".$search."%' OR penjualan.nomor_faktur LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('penjualan.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('pelanggan', 'pelanggan.idpelanggan = penjualan.idpelanggan', 'inner');
		$this->db->join('gudang', 'gudang.idgudang = penjualan.idgudang', 'inner');
		$this->db->join('kurs', 'kurs.idkurs = penjualan.idkurs', 'inner');

		$this->db->select('penjualan.*, pelanggan.nama as "pelanggannama", gudang.nama as "gudangnama", kurs.nama as "kursnama"');
		$this->db->where('penjualan.status', 'active');
		$this->db->order_by('penjualan.tanggal_jual','asc');
		$q = $this->db->get('penjualan');

		//return $this->db->last_query();

		return $q->result();
	}

	public function getAllBarang($nomor_nota) {
		$this->db->join('barang', 'barang.idbarang = detil_penjualan.idbarang', 'inner');
		$this->db->select('detil_penjualan.*, barang.nama, barang.kode');
		$this->db->order_by('detil_penjualan.urutan','asc');
		$q = $this->db->get_where('detil_penjualan', array('detil_penjualan.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function getTotalHarga($nomor_nota) {
		$this->db->select('sum(harga * jumlah_kecil) as "total" ');
		$q = $this->db->get_where('detil_penjualan', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doUpdate($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('penjualan', $data);

		$this->db->delete('detil_penjualan', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_penjualan', $value);
		}
	}

	public function doDel($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('penjualan', array('status' => 'deleted'));
	}

	public function getAllReturFree($search, $where) {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}

		$sql = "SELECT retur_penjualan.*, pelanggan.nama as `pelanggannama`, gudang.nama as `gudangnama` FROM `retur_penjualan`
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_penjualan.idpelanggan
INNER JOIN gudang ON gudang.idgudang = retur_penjualan.idgudang
WHERE (gudang.nama LIKE '%".$search."%' OR pelanggan.nama LIKE '%".$search."%' OR retur_penjualan.nomor_nota LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAllRetur($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('retur_penjualan.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('pelanggan', 'pelanggan.idpelanggan = retur_penjualan.idpelanggan', 'inner');
		$this->db->join('gudang', 'gudang.idgudang = retur_penjualan.idgudang', 'inner');
		$this->db->select('retur_penjualan.*, pelanggan.nama as "pelanggannama", gudang.nama as "gudangnama"');
		$this->db->where('retur_penjualan.status', 'active');
		$this->db->order_by('retur_penjualan.tanggal','asc');
		$q = $this->db->get('retur_penjualan');

		return $q->result();
	}

	public function doInsertRetur($data, $databarang) {
		$this->db->insert('retur_penjualan', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_retur_penjualan', $value);
		}
	}

	public function getAllBarangRetur($nomor_nota) {
		$this->db->join('barang', 'barang.idbarang = detil_retur_penjualan.idbarang', 'inner');
		$this->db->select('detil_retur_penjualan.*, barang.nama, barang.kode');
		$this->db->order_by('detil_retur_penjualan.urutan','asc');
		$q = $this->db->get_where('detil_retur_penjualan', array('detil_retur_penjualan.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doUpdateRetur($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('retur_penjualan', $data);

		$this->db->delete('detil_retur_penjualan', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_retur_penjualan', $value);
		}
	}

	public function getTotalHargaRetur($nomor_nota) {
		$this->db->select('sum(harga_retur * jumlah_kecil) as "total" ');
		$q = $this->db->get_where('detil_retur_penjualan', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doDelRetur($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('retur_penjualan', array('status' => 'deleted'));
	}
}
?>