<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
	public function doInsert($data) {
		$this->db->insert('pelanggan', $data);
	}

	public function getAll($idpelanggan = '', $where = '', $limit = 0) {
		if($idpelanggan != '') {
			$this->db->where('pelanggan.idpelanggan', $idpelanggan);
		}

		$this->db->join('kota', 'kota.idkota = pelanggan.idkota');
		$this->db->select('pelanggan.*, kota.nama as `namakota`');

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('pelanggan.status', 'active');
		$this->db->order_by('pelanggan.nama','asc');
		$q = $this->db->get('pelanggan');

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
		$this->db->order_by('kode','asc');
		$q = $this->db->get('pelanggan');

		return $q->result();
	}

	public function doUpdate($idpelanggan, $data) {
		$this->db->where('idpelanggan', $idpelanggan);
		$this->db->update('pelanggan', $data);
	}

	public function doDel($idpelanggan) {
		$this->db->where('idpelanggan', $idpelanggan);
		$this->db->update('pelanggan', array('status' => 'deleted'));
	}

}
?>