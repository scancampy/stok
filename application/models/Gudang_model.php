<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('gudang', $data);
	}

	public function getAll($idgudang = '', $where = '', $limit = 0) {
		if($idgudang != '') {
			$this->db->where('idgudang', $idgudang);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('nama','asc');
		$q = $this->db->get('gudang');

		return $q->result();
	}

	public function doUpdate($idgudang, $data) {
		$this->db->where('idgudang', $idgudang);
		$this->db->update('gudang', $data);
	}

	public function doDel($idgudang) {
		$this->db->where('idgudang', $idgudang);
		$this->db->update('gudang', array('status' => 'deleted'));
	}

}
?>