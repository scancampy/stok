<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurs_model extends CI_Model {
	public function doInsert($data) {
		$q  = $this->db->get_where('kurs', array('status' => 'active'));
		$data['urutan'] = $q->num_rows() + 1;
		$this->db->insert('kurs', $data);
	}

	public function getAll($idkurs = '', $where = '', $limit = 0, $orderby ='', $ordertype='asc') {
		if($idkurs != '') {
			$this->db->where('idkurs', $idkurs);
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
		$q = $this->db->get('kurs');

		//echo $this->db->last_query();

		return $q->result();
	}

	public function doUpdate($idkurs, $data) {
		$this->db->where('idkurs', $idkurs);
		$this->db->update('kurs', $data);
	}

	public function doDel($idkurs) {
		$this->db->where('idkurs', $idkurs);
		$this->db->update('kurs', array('status' => 'deleted'));
	}

	public function doAdjustUrutan($idkurs, $arah) {
		$q = $this->db->get_where('kurs', array('idkurs' => $idkurs));
		$qrow = $q->row();

		$tempurutan = $qrow->urutan;
		if($arah == "up") {
			$h = $this->db->get_where('kurs', array('urutan' => $tempurutan-1, 'status' => 'active'));
			$hrow = $h->row();
			$this->db->where('idkurs', $hrow->idkurs);
			$this->db->update('kurs', array('urutan' => $tempurutan));

			$this->db->where('idkurs', $idkurs);
			$this->db->update('kurs', array('urutan' => $tempurutan - 1));			
		} else if($arah == "down") {
			$h = $this->db->get_where('kurs', array('urutan' => $tempurutan + 1, 'status' => 'active'));
			$hrow = $h->row();
			$this->db->where('idkurs', $hrow->idkurs);
			$this->db->update('kurs', array('urutan' => $tempurutan));

			$this->db->where('idkurs', $idkurs);
			$this->db->update('kurs', array('urutan' => $tempurutan + 1));			
		}
	}
}
?>