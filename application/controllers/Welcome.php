<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		//echo do_hash('password', 'md5'); // MD5
		if($this->input->post('btnlogin')) {
			$admin = $this->admin_model->doSignIn($this->input->post('username'),$this->input->post('password'));
			if($admin) {
 				$this->session->set_userdata('admin', $admin);
 				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error_message', true);
				redirect('');
			}
		}

		$this->load->view('v_login');
	}
}
