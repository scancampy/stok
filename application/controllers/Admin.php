<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin')) {
        	redirect('');
        }
    }

	public function index()
	{
		if($this->input->post('btnsubmit')) {
			if($this->input->post('hidusername') !='') {
				$dataUpdate = array(
							'nama' => $this->input->post('nama')
						  );
				$this->admin_model->doUpdate($this->input->post('hidusername'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$dataInsert = array(
							'username' => $this->input->post('username'),
							'nama' => $this->input->post('nama'),
							'password' => do_hash($this->input->post('password'), 'md5'),
							'status' => 'active'
						  );
				$this->admin_model->doInsert($dataInsert);
				$this->session->set_flashdata('insert_msg', true);
			}

			redirect('admin');
		}

		$data = array();

		$data['admin'] = $this->admin_model->getAll();

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

$(document).on( 'click','.btnedit', function() { 
	var id = $(this).attr('username');

	$.post('".base_url('admin/load')."', { username:id }, function(data) {
		var json = JSON.parse(data);
		$('#username').val(json['data'][0].username);
		$('#username').attr('disabled', 'disabled');
		$('#nama').val(json['data'][0].nama);
		$('#passwordiv').hide();
		$('#repasswordiv').hide();
		$('#hidusername').val(id);
	
		$('#title_modal').html('EDIT USER');
		$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); 
	});
});
		";

		// VALIDATE
		$data['js'] .= "
		$('#formtambahuser').validate({
		    rules: {
		      username: {
		        required: true
		      },
		      nama: {
		        required: true
		      },
		      password: {
		        required: true
		      },
		      repass: {
		        required: true,
		        equalTo: '#password'
		      }
		    },
		    messages: {
		      username: {
		        required: 'Harus diisi'
		      },
		      nama: {
		        required: 'Harus diisi'
		      },
		      password: {
		        required: 'Harus diisi'
		      },
		      repass: {
		        required: 'Harus diisi dan harus sama dengan password'
		      }
		    },
		    errorElement: 'span',
		    errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		    },
		    highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		    },
		    unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		    }
		  });
		  ";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#passwordiv').show();
	$('#repasswordiv').show();
	$('#title_modal').html('TAMBAH USER');
	$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); 
});

		$('#modal-lg').on('shown.bs.modal', function () {
		    $('#username').focus();
		});
		";

		// BARANG SERUPA
		$data['js'] .= "
$('#username').on('keyup change blur', function(event) {

	var s = $(this).val().toLowerCase().split(' ').join('');
	$(this).val(s);
	
	if(s.trim() != '' ) {
		$.post('".base_url('admin/search')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
					if(json['data'][i].kode != $('#kode').val()) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].username.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					}
				}

				if(serupa > 0) { $('#tableserupa').html(tableserupa); }
				else { $('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";

		$data['js'] .= "
$('#nama').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('admin/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
					if(json['data'][i].kode != $('#kode').val()) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].username.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					}
				}

				if(serupa > 0) { $('#tableserupa').html(tableserupa); }
				else { $('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";



		// DATA TABLE
		$data['js'] .= "
$('#example2').DataTable({
  'paging': true,
  'lengthChange': false,
  'searching': true,
  'ordering': true,
  'info': true,
  'autoWidth': false,
  'responsive': true,
});";

    	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data user berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data user berhasil diperbaharui.'
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
		$this->load->view('admin/v_admin', $data);
		$this->load->view('v_footer', $data);
	}
	
	public function del($username) {
		$this->admin_model->doDel($username);
		$this->session->set_flashdata('del_msg', true);

		redirect('admin');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->admin_model->getAll($this->input->post('username'));
		echo json_encode(array('data' => $hasil));
	}

	public function search() {
		$hasil = $this->admin_model->getAll("", "username LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->admin_model->getAll("", "nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
