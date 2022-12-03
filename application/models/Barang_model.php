<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('barang', $data);
	}

	public function getAll($idbarang = '', $where = '', $limit = 0) {
		if($idbarang != '') {
			$this->db->where('idbarang', $idbarang);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('nama','asc');
		$q = $this->db->get('barang');

		return $q->result();
	}

	public function getKodeAll($kode, $where = '', $limit = 0) {
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
		$q = $this->db->get('barang');

		return $q->result();
	}

	public function doUpdate($idbarang, $data) {
		$this->db->where('idbarang', $idbarang);
		$this->db->update('barang', $data);
	}

	public function doDel($idbarang) {
		$this->db->where('idbarang', $idbarang);
		$this->db->update('barang', array('status' => 'deleted'));
	}

}
?>