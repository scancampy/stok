<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_saham_model extends CI_Model {
	public function doInsert($data, $databarang) {
		$this->db->insert('penjualan_saham', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_penjualan_saham', $value);
		}
	}

	public function doInsertBeli($data, $databarang) {
		$this->db->insert('pembelian_saham', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_pembelian_saham', $value);
		}
	}

	public function getAllFree($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT penjualan_saham.*, kurs.lambang FROM `penjualan_saham`
INNER JOIN kurs ON kurs.idkurs = penjualan_saham.idkurs
WHERE (penjualan_saham.nomor_nota LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAllFreeBeli($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT pembelian_saham.*, kurs.lambang FROM `pembelian_saham`
INNER JOIN kurs ON kurs.idkurs = pembelian_saham.idkurs
WHERE (pembelian_saham.nomor_nota LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('penjualan_saham.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('kurs', 'kurs.idkurs = penjualan_saham.idkurs', 'inner');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = penjualan_saham.idpelanggan', 'left');

		$this->db->select('penjualan_saham.*, pelanggan.nama as "pelanggannama",kurs.nama as "kursnama"');
		$this->db->where('penjualan_saham.status', 'active');
		$this->db->order_by('penjualan_saham.tanggal','asc');
		$q = $this->db->get('penjualan_saham');

		return $q->result();
	}

	public function getAllBeli($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('pembelian_saham.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('kurs', 'kurs.idkurs = pembelian_saham.idkurs', 'inner');
		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pembelian_saham.idpelanggan', 'left');

		$this->db->select('pembelian_saham.*,kurs.nama as "kursnama", pelanggan.nama as "pelanggannama"');
		$this->db->where('pembelian_saham.status', 'active');
		$this->db->order_by('pembelian_saham.tanggal','asc');
		$q = $this->db->get('pembelian_saham');

		return $q->result();
	}

	public function getAllBarang($nomor_nota) {
		$this->db->join('saham', 'saham.idsaham = detil_penjualan_saham.idsaham', 'inner');
		$this->db->select('detil_penjualan_saham.*, saham.nama, saham.kode');
		$this->db->order_by('detil_penjualan_saham.urutan','asc');
		$q = $this->db->get_where('detil_penjualan_saham', array('detil_penjualan_saham.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function getAllBarangBeli($nomor_nota) {
		$this->db->join('saham', 'saham.idsaham = detil_pembelian_saham.idsaham', 'inner');
		$this->db->select('detil_pembelian_saham.*, saham.nama, saham.kode');
		$this->db->order_by('detil_pembelian_saham.urutan','asc');
		$q = $this->db->get_where('detil_pembelian_saham', array('detil_pembelian_saham.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function getTotalHarga($nomor_nota) {
		$this->db->select('sum(jumlah_kecil * harga) as "total" ');
		$q = $this->db->get_where('detil_penjualan_saham', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function getTotalHargaBeli($nomor_nota) {
		$this->db->select('sum(jumlah_kecil * harga) as "total" ');
		$q = $this->db->get_where('detil_pembelian_saham', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doUpdate($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('penjualan_saham', $data);

		$this->db->delete('detil_penjualan_saham', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_penjualan_saham', $value);
		}
	}

	public function doUpdateBeli($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('pembelian_saham', $data);

		$this->db->delete('detil_pembelian_saham', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_pembelian_saham', $value);
		}
	}

	public function doDel($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('penjualan_saham', array('status' => 'deleted'));
	}

	public function doDelBeli($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('pembelian_saham', array('status' => 'deleted'));
	}

	public function doDelRetur($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('retur_penjualan', array('status' => 'deleted'));
	}
}
?>