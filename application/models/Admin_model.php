<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
	public function doSignIn($username, $password) {
		$res = $this->db->get_where('admin', array('username' => $username, 'status' => 'active'));

		if($res->num_rows() > 0) {
			$hres = $res->row();
			
			if(md5($password, $hres->password)) {
				$this->db->where('username', $username);
				$this->db->update('admin', array('last_login' => date('Y-m-d H:i:s')));
				return $hres;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function doInsert($data) {
		$this->db->insert('admin', $data);
	}

	public function getAll($username = '', $where = '', $limit = 0) {
		if($username != '') {
			$this->db->where('username', $username);
		}

		if($where != '') {
			$this->db->where($where);
		}

		if($limit > 0) {
			$this->db->limit($limit);
		}

		$this->db->where('status', 'active');
		$this->db->order_by('nama','asc');
		$q = $this->db->get('admin');

		return $q->result();
	}

	public function doUpdate($username, $data) {
		$this->db->where('username', $username);
		$this->db->update('admin', $data);
	}

	public function doDel($username) {
		$this->db->where('username', $username);
		$this->db->update('admin', array('status' => 'deleted'));
	}

	public function backupdb() {

       $tables = $this->db->list_tables();

       // Load the DB utility class
		$this->load->dbutil();
		$backupname = 'stok_'.date('d-m-Y his').'.sql';

		// Backup your entire database and assign it to a variable
		$prefs = array(
		        'tables'        => $tables,   // Array of tables to backup.
		        'ignore'        => array(),                     // List of tables to omit from the backup
		        'format'        => 'txt',                       // gzip, zip, txt
		        'filename'      => $backupname,              // File name - NEEDED ONLY WITH ZIP FILES
		        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
		        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
		        'newline'       => "\n"                         // Newline character used in backup file
		);

		$backup = $this->dbutil->backup($prefs);

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('./backup/'.$backupname, $backup);

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download($backupname, $backup);
	}
}
?>