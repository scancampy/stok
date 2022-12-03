<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('rekening', $data);
	}

	public function getAll($idrekening = '', $where = '', $limit = 0) {
		if($idrekening != '') {
			$this->db->where('idrekening', $idrekening);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('bank','asc');
		$q = $this->db->get('rekening');

		return $q->result();
	}

	public function getKodeAll($koderekening = '', $where = '', $limit = 0) {
		if($koderekening != '') {
			$this->db->where('kode', $koderekening);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('bank','asc');
		$q = $this->db->get('rekening');
		return $q->result();
	}

	public function doUpdate($idbrekening, $data) {
		$this->db->where('idrekening', $idbrekening);
		$this->db->update('rekening', $data);
	}

	public function doDel($idbrekening) {
		$this->db->where('idrekening', $idbrekening);
		$this->db->update('rekening', array('status' => 'deleted'));
	}

}
?>