<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saham extends CI_Controller {

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
			if($this->input->post('hididsaham') !='') {
				$dataUpdate = array(
							'kode' => $this->input->post('kode'),
							'nama' => $this->input->post('nama'),
							'keterangan' => $this->input->post('keterangan'),
							'min_stok' => $this->input->post('min_stok'),
							'satuan_besar' => $this->input->post('satuan_besar'),
							'satuan_kecil' => $this->input->post('satuan_kecil')
						  );
				$this->saham_model->doUpdate($this->input->post('hididsaham'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$cek = $this->saham_model->getKodeAll($this->input->post('kode'));
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'kode' => $this->input->post('kode'),
								'nama' => $this->input->post('nama'),
								'keterangan' => $this->input->post('keterangan'),
								'min_stok' => $this->input->post('min_stok'),
								'satuan_besar' => $this->input->post('satuan_besar'),
								'satuan_kecil' => $this->input->post('satuan_kecil'),
								'status' => 'active'
							  );
					$this->saham_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('saham');
		}

		$data = array();

		$data['saham'] = $this->saham_model->getAll();

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

$(document).on( 'click','.btnedit', function() { 
	var id = $(this).attr('sahamid');

	$.post('".base_url('saham/load')."', { idsaham:id }, function(data) {
		var json = JSON.parse(data);
		$('#kode').val(json['data'][0].kode);
		$('#nama').val(json['data'][0].nama);
		$('#keterangan').val(json['data'][0].keterangan);
		$('#min_stok').val(json['data'][0].min_stok);
		$('#satuan_besar').val(json['data'][0].satuan_besar);
		$('#satuan_kecil').val(json['data'][0].satuan_kecil);
		$('#hididsaham').val(json['data'][0].idsaham);
		$('#title_modal').html('Edit Saham');
		$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); 
	});
});
		";

		// ADD 
		$data['js'] .= "

    $('#min_stok').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			//console.log(keyCode);	
		    if (keyCode < 48 || keyCode > 57) {
		    	if(keyCode != 46) {
		    		e.preventDefault();
				} else {
					if($(this).val().indexOf('.') !== -1) {
				        e.preventDefault();
				    } else if($(this).val().trim() == '') {
				    	e.preventDefault();
				    }
				}
		    }
		});
		
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#min_stok').val('1');
	$('#keterangan').val('');
	$('#title_modal').html('Tambah Saham');
	$('#tableserupa').html('<tr><td>-</td><td>-</td></tr>'); 
});
		";

		// SAHAM SERUPA
		$data['js'] .= "
$('#kode').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('saham/search')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
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
		$.post('".base_url('saham/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
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
	/*	$data['js'] .= "
$('#example2').DataTable({
  'paging': true,
  'lengthChange': false,
  'searching': true,
  'ordering': true,
  'info': true,
  'autoWidth': false,
  'responsive': true,
});";*/

    	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data saham berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data saham berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Kode saham sudah ada.'
  });
    	";
    	}


    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data saham berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_saham', $data);
		$this->load->view('v_footer', $data);
	}
	
	public function del($idsaham) {
		$this->saham_model->doDel($idsaham);
		$this->session->set_flashdata('del_msg', true);

		redirect('saham');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->saham_model->getAll($this->input->post('idsaham'));
		echo json_encode(array('data' => $hasil));
	}

	public function search() {
		$hasil = $this->saham_model->getAll("", "kode LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->saham_model->getAll("", "nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
