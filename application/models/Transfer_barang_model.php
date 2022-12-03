<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transfer_barang_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('transfer_barang', $data);
	}

	public function doInsertBarangHilang($data) {
		$this->db->insert('barang_hilang', $data);
	}

	public function getCountAll() {
		return $this->db->count_all_results('transfer_barang'); 
	}

	public function getCountAllBarangHilang() {
		return $this->db->count_all_results('barang_hilang'); 
	}


	public function getAllFree($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}

		$sql = "SELECT transfer_barang.*, r1.nama as 'namagudangasal', r2.nama as 'namagudangtujuan', barang.kode as 'kodebarang', barang.nama as 'namabarang' FROM `transfer_barang` 
INNER JOIN gudang AS r1 ON r1.idgudang = transfer_barang.idgudang_asal
INNER JOIN gudang AS r2 ON r2.idgudang = transfer_barang.idgudang_tujuan 
INNER JOIN barang ON barang.idbarang = transfer_barang.idbarang  
WHERE transfer_barang.nomor_nota LIKE '%".$search."%' OR r1.nama LIKE '%".$search."%' OR r2.nama LIKE '%".$search."%' OR barang.kode LIKE '%".$search."%' OR barang.nama LIKE '%".$search."%' ".$wherestr;

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAllFreeBarangHilang($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}

		$sql = "SELECT barang_hilang.*, r1.nama as 'namagudangasal', barang.kode as 'kodebarang', barang.nama as 'namabarang' FROM `barang_hilang` 
INNER JOIN gudang AS r1 ON r1.idgudang = barang_hilang.idgudang_asal
INNER JOIN barang ON barang.idbarang = barang_hilang.idbarang  
WHERE barang_hilang.nomor_nota LIKE '%".$search."%' OR r1.nama LIKE '%".$search."%' OR barang.kode LIKE '%".$search."%' OR barang.nama LIKE '%".$search."%' ".$wherestr;

		$q =$this->db->query($sql);
		return $q->result();
	}


	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('transfer_barang.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('barang', 'barang.idbarang = transfer_barang.idbarang', 'inner');
		$this->db->join('gudang AS r1', 'r1.idgudang = transfer_barang.idgudang_asal');
		$this->db->join('gudang AS r2', 'r2.idgudang = transfer_barang.idgudang_tujuan');
		$this->db->select("transfer_barang.*, barang.nama, barang.kode,	barang.satuan_besar, barang.satuan_kecil, barang.merk, r1.nama as 'namagudangasal', r2.nama as 'namagudangtujuan'");
		$this->db->where('transfer_barang.status', 'active');
		$this->db->order_by('transfer_barang.tanggal','asc');
		$q = $this->db->get('transfer_barang');

		return $q->result();
	}

	public function getAllBarangHilang($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('barang_hilang.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('barang', 'barang.idbarang = barang_hilang.idbarang', 'inner');		
		$this->db->join('gudang AS r1', 'r1.idgudang = barang_hilang.idgudang_asal');
		$this->db->select("barang_hilang.*, barang.nama, barang.kode, 	barang.satuan_besar, barang.satuan_kecil, barang.merk, r1.nama as 'namagudangasal'");
		$this->db->where('barang_hilang.status', 'active');
		$this->db->order_by('barang_hilang.tanggal','asc');
		$q = $this->db->get('barang_hilang');

		return $q->result();
	}

	public function doUpdate($nomor_nota, $data) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('transfer_barang', $data);
	}

	public function doUpdateBarangHilang($nomor_nota, $data) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('barang_hilang', $data);
	}

	public function doDel($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('transfer_barang', array('status' => 'deleted'));
	}

	public function doDelBarangHilang($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('barang_hilang', array('status' => 'deleted'));
	}

}
?>