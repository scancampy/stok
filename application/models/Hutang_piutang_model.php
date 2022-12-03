<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutang_piutang_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('hutangpiutang', $data);
	}

	public function getCountAll() {
		return $this->db->count_all_results('hutangpiutang'); 
	}

	public function getAllFree($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}
		$sql = "SELECT hutangpiutang.*, pelanggan.nama as `pelanggannama` FROM `hutangpiutang`
INNER JOIN pelanggan ON pelanggan.idpelanggan = hutangpiutang.idpelanggan
WHERE (pelanggan.nama LIKE '%".$search."%' OR hutangpiutang.nomor_nota LIKE '%".$search."%') ".$wherestr.";";

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('hutangpiutang.nomor_nota', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('pelanggan', 'pelanggan.idpelanggan = hutangpiutang.idpelanggan', 'inner');
		$this->db->join('kurs', 'kurs.idkurs = hutangpiutang.idkurs', 'inner');
		$this->db->join('rekening', 'rekening.idrekening = hutangpiutang.idrekening', 'inner');

		$this->db->select('hutangpiutang.*, pelanggan.nama as "pelanggannama", rekening.kode, kurs.nama as "kursnama"');
		$this->db->where('hutangpiutang.status', 'active');
		$this->db->order_by('hutangpiutang.tanggal','asc');
		$q = $this->db->get('hutangpiutang');

		return $q->result();
	}

	public function doUpdate($nomor_nota, $data) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('hutangpiutang', $data);
	}

	public function doDel($nomor_nota) {
		$this->db->where('nomor_nota', $nomor_nota);
		$this->db->update('hutangpiutang', array('status' => 'deleted'));
	}

}
?>