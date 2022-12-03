<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saham_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('saham', $data);
	}

	public function getAll($idsaham = '', $where = '', $limit = 0) {
		if($idsaham != '') {
			$this->db->where('idsaham', $idsaham);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('nama','asc');
		$q = $this->db->get('saham');

		return $q->result();
	}

	public function getKodeAll($kode = '', $where = '', $limit = 0) {
		if($kode != '') {
			$this->db->where('kode', $kode);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('nama','asc');
		$q = $this->db->get('saham');

		return $q->result();
	}

	public function doUpdate($idsaham, $data) {
		$this->db->where('idsaham', $idsaham);
		$this->db->update('saham', $data);
	}

	public function doDel($idsaham) {
		$this->db->where('idsaham', $idsaham);
		$this->db->update('saham', array('status' => 'deleted'));
	}

}
?>