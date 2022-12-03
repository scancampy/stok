<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota_model extends CI_Model {
	public function doInsert($data) {
		$q  = $this->db->get_where('kota', array('status' => 'active'));
		$data['urutan'] = $q->num_rows() + 1;
		$this->db->insert('kota', $data);
	}

	public function getAll($idkota = '', $where = '', $limit = 0, $orderby ='', $ordertype='asc') {
		if($idkota != '') {
			$this->db->where('idkota', $idkota);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		if($orderby != '') {
			$this->db->order_by($orderby, $ordertype);
		}

		$this->db->where('status', 'active');
		$q = $this->db->get('kota');

		//echo $this->db->last_query();

		return $q->result();
	}

	public function doUpdate($idkota, $data) {
		$this->db->where('idkota', $idkota);
		$this->db->update('kota', $data);
	}

	public function doDel($idkota) {
		$this->db->where('idkota', $idkota);
		$this->db->update('kota', array('status' => 'deleted'));
	}

	public function doAdjustUrutan($idkota, $arah) {
		$q = $this->db->get_where('kota', array('idkota' => $idkota));
		$qrow = $q->row();

		$tempurutan = $qrow->urutan;
		if($arah == "up") {
			$h = $this->db->get_where('kota', array('urutan' => $tempurutan-1, 'status' => 'active'));
			$hrow = $h->row();
			$this->db->where('idkota', $hrow->idkota);
			$this->db->update('kota', array('urutan' => $tempurutan));

			$this->db->where('idkota', $idkota);
			$this->db->update('kota', array('urutan' => $tempurutan - 1));			
		} else if($arah == "down") {
			$h = $this->db->get_where('kota', array('urutan' => $tempurutan + 1, 'status' => 'active'));
			$hrow = $h->row();
			$this->db->where('idkota', $hrow->idkota);
			$this->db->update('kota', array('urutan' => $tempurutan));

			$this->db->where('idkota', $idkota);
			$this->db->update('kota', array('urutan' => $tempurutan + 1));			
		}
	}
}
?>