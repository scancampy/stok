<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {
	public function doInsert($data, $databarang) {
		$this->db->insert('pembelian', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_pembelian', $value);
		}
	}

	public function getAllFree($search,$where) {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT pembelian.*, pelanggan.nama as `pelanggannama`, gudang.nama as `gudangnama` FROM `pembelian`
INNER JOIN pelanggan ON pelanggan.idpelanggan = pembelian.idsupplier
INNER JOIN gudang ON gudang.idgudang = pembelian.idgudang
WHERE (gudang.nama LIKE '%".$search."%' OR pelanggan.nama LIKE '%".$search."%' OR pembelian.nomor_nota LIKE '%".$search."%' OR pembelian.nomor_faktur LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('pembelian.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('pelanggan', 'pelanggan.idpelanggan = pembelian.idsupplier', 'inner');
		$this->db->join('gudang', 'gudang.idgudang = pembelian.idgudang', 'inner');		
		$this->db->join('kurs', 'kurs.idkurs = pembelian.idkurs', 'inner');
		$this->db->select('pembelian.*, pelanggan.nama as "pelanggannama", gudang.nama as "gudangnama", kurs.nama as "kursnama"');

		$this->db->where('pembelian.status', 'active');
		$this->db->order_by('pembelian.tanggal_terima','asc');
		$q = $this->db->get('pembelian');

		return $q->result();
	}

	public function getAllBarang($nomor_nota) {
		$this->db->join('barang', 'barang.idbarang = detil_pembelian.idbarang', 'inner');
		$this->db->select('detil_pembelian.*, barang.nama, barang.kode');
		$this->db->order_by('detil_pembelian.urutan','asc');
		$q = $this->db->get_where('detil_pembelian', array('detil_pembelian.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function getTotalHarga($nomor_nota) {
		$this->db->select('sum(harga * jumlah_kecil) as "total" ');
		$q = $this->db->get_where('detil_pembelian', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doUpdate($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('pembelian', $data);

		$this->db->delete('detil_pembelian', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_pembelian', $value);
		}
	}

	public function doDel($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('pembelian', array('status' => 'deleted'));
	}

	public function getAllReturFree($search, $where) {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT retur_pembelian.*, pelanggan.nama as `pelanggannama`, gudang.nama as `gudangnama` FROM `retur_pembelian`
INNER JOIN pelanggan ON pelanggan.idpelanggan = retur_pembelian.idsupplier
INNER JOIN gudang ON gudang.idgudang = retur_pembelian.idgudang
WHERE (gudang.nama LIKE '%".$search."%' OR pelanggan.nama LIKE '%".$search."%' OR retur_pembelian.nomor_nota LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAllRetur($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('retur_pembelian.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('pelanggan', 'pelanggan.idpelanggan = retur_pembelian.idsupplier', 'inner');
		$this->db->join('gudang', 'gudang.idgudang = retur_pembelian.idgudang', 'inner');
		$this->db->select('retur_pembelian.*, pelanggan.nama as "pelanggannama", gudang.nama as "gudangnama"');
		$this->db->where('retur_pembelian.status', 'active');
		$this->db->order_by('retur_pembelian.tanggal','asc');
		$q = $this->db->get('retur_pembelian');

		return $q->result();
	}

	public function doInsertRetur($data, $databarang) {
		$this->db->insert('retur_pembelian', $data);

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_retur_pembelian', $value);
		}
	}

	public function getAllBarangRetur($nomor_nota) {
		$this->db->join('barang', 'barang.idbarang = detil_retur_pembelian.idbarang', 'inner');
		$this->db->select('detil_retur_pembelian.*, barang.nama, barang.kode');
		$this->db->order_by('detil_retur_pembelian.urutan','asc');
		$q = $this->db->get_where('detil_retur_pembelian', array('detil_retur_pembelian.nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doUpdateRetur($nomor_nota, $data, $databarang) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('retur_pembelian', $data);

		$this->db->delete('detil_retur_pembelian', array('nomor_nota' => $nomor_nota));

		foreach ($databarang as $key => $value) {
			$this->db->insert('detil_retur_pembelian', $value);
		}
	}

	public function getTotalHargaRetur($nomor_nota) {
		$this->db->select('sum(harga_retur * jumlah_kecil) as "total" ');
		$q = $this->db->get_where('detil_retur_pembelian', array('nomor_nota' => $nomor_nota));
		return $q->result();
	}

	public function doDelRetur($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('retur_pembelian', array('status' => 'deleted'));
	}
}
?>