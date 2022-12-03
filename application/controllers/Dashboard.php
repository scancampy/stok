<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin')) {
        	redirect('');
        }
    }

	public function index()
	{
		$this->load->view('v_header');
		$this->load->view('v_menu');
		$this->load->view('dashboard/v_dashboard');
		$this->load->view('v_footer');
	}

	public function signout() {
		$this->session->sess_destroy();
		redirect('');
	}
}
