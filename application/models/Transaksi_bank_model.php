<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_bank_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('transaksi_bank', $data);
	}

	public function getCountAll() {
		return $this->db->count_all_results('transaksi_bank'); 
	}

	public function getAllFree($search, $where = '') {
		$wherestr = '';
		if($where != '') {
			$wherestr = ' AND '.$where;
		}

		$sql = "SELECT transaksi_bank.*, r1.nomor as 'rekeningnomor', r1.bank as 'rekeningbank', r1.kode as 'rekeningkode', r2.nomor as 'rekeningnomortujuan', r2.bank as 'rekeningbanktujuan', r2.kode as 'rekeningkodetujuan' FROM `transaksi_bank` 
INNER JOIN rekening AS r1 ON r1.idrekening = transaksi_bank.idrekening_asal
INNER JOIN rekening AS r2 ON r2.idrekening = transaksi_bank.idrekening_tujuan WHERE transaksi_bank.idtransfer LIKE '%".$search."%' ".$wherestr;

		$q =$this->db->query($sql);
		return $q->result();
	}

	public function getAll($nomor_nota = '', $where = '', $limit = 0) {
		if($nomor_nota != '') {
			$this->db->where('transaksi_bank.idtransfer', $nomor_nota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->join('rekening AS r1', 'r1.idrekening = transaksi_bank.idrekening_asal', 'inner');
		$this->db->join('rekening AS r2', 'r2.idrekening = transaksi_bank.idrekening_tujuan', 'inner');

		$this->db->select("transaksi_bank.*, r1.nomor as 'rekeningnomor', r1.bank as 'rekeningbank', r1.kode as 'rekeningkode', r2.nomor as 'rekeningnomortujuan', r2.bank as 'rekeningbanktujuan', r2.kode as 'rekeningkodetujuan'");
		$this->db->where('transaksi_bank.status', 'active');
		$this->db->order_by('transaksi_bank.tanggal','asc');
		$q = $this->db->get('transaksi_bank');

		//echo $this->db->last_query();

		return $q->result();
	}

	public function doUpdate($nomor_nota, $data) {
		$this->db->where('idtransfer', $nomor_nota);
		$this->db->update('transaksi_bank', $data);
	}

	public function doDel($nomor_nota) {
		$this->db->where('idtransfer', $nomor_nota);
		$this->db->update('transaksi_bank', array('status' => 'deleted'));
	}

}
?>