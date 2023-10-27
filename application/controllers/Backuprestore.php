<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backuprestore extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin')) {
        	redirect('');
        }
    }

	public function index()
	{
		
		$data = array();

		if($this->input->post('btnbackup')) {
			$this->session->set_flashdata('backup_success', true);
			$this->admin_model->backupdb();
		}

		if($this->input->post('btnreset')) {
			$this->session->set_flashdata('db_reset', true);
			$this->admin_model->resetdb();
		}

		if($this->input->post('btnrestore')) {
			$config['file_name'] = 'restore_'.date('Y-m-dh-i-s').'.sql';
			$config['upload_path']          = './restore/';
			$config['allowed_types']        = '*';
			$config['max_size']             = 100000000;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('filerestore'))
			{
			      $error = array('error' => $this->upload->display_errors());
			      print_r($error); die();
			}
			else
			{
			    $folder = FCPATH;
			    $folder = str_replace('\\', '/', $folder);  
			    $path = $folder.'restore/';
			    $sql_filename = $config['file_name'];

			    $sql_contents = file_get_contents($path.$sql_filename);
    			$sql_contents = explode(";", $sql_contents);


			    foreach($sql_contents as $a => $query)
			    {
			    	
			       	if(!empty(trim($query))) {
			            $result = $this->db->query($query);			           
			        } 
			    }

			    $this->session->set_flashdata('restore_success', true);
			    redirect('backuprestore');
			}
		}

		$data['admin'] = $this->admin_model->getAll();

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
		";

		

		// TOMBOL RESTORE
		$data['js'] .= "
			$('#btnrestore').on('click', function() {
				$('#divfilerestore').hide();
				$('#showloader').show();
			});
		";
    	// SWEET ALERT
    	if($this->session->flashdata('restore_success')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Restorasi database telah sukses dilakukan.'
  });
    	";
    	}

    	if($this->session->flashdata('backup_success')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Backup database berhasil dilakukan.'
  });
    	";
    	}

    	if($this->session->flashdata('db_reset')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Database berhasil direset.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data user berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('backuprestore/v_backup_restore', $data);
		$this->load->view('v_footer', $data);
	}
}
