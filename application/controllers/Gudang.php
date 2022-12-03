<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

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
			if($this->input->post('hididgudang') !='') {
				$dataUpdate = array(
							'nama' => $this->input->post('nama'),
							'alamat' => $this->input->post('alamat'),
							'keterangan' => $this->input->post('keterangan'),
							'telepon' => $this->input->post('telepon')
						  );
				$this->gudang_model->doUpdate($this->input->post('hididgudang'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$cek = $this->gudang_model->getAll('', 'nama = "'.$this->input->post('nama').'" ');
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'nama' => $this->input->post('nama'),
								'alamat' => $this->input->post('alamat'),
								'keterangan' => $this->input->post('keterangan'),
								'telepon' => $this->input->post('telepon'),
								'status' => 'active'
							  );
					$this->gudang_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('gudang');
		}

		$data = array();

		$data['gudang'] = $this->gudang_model->getAll();

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

$(document).on( 'click','.btnedit', function() { 
	var id = $(this).attr('gudangid');

	$.post('".base_url('gudang/load')."', { idgudang:id }, function(data) {
		var json = JSON.parse(data);
		$('#nama').val(json['data'][0].nama);
		$('#keterangan').val(json['data'][0].keterangan);
		$('#alamat').val(json['data'][0].alamat);
		$('#telepon').val(json['data'][0].telepon);
		$('#hididgudang').val(json['data'][0].idgudang);
		$('#title_modal').html('Edit Gudang');
		$('#tablegudangserupa').html('<tr><td>-</td><td>-</td></tr>'); 
	});
});
		";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#alamat').val('');
	$('#keterangan').val('');
	$('#title_modal').html('Tambah Gudang');
	$('#tablegudangserupa').html('<tr><td>-</td><td>-</td></tr>'); 
});
		";

		// GUDANG SERUPA
		$data['js'] .= "
$('#nama').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('gudang/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].alamat.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablegudangserupa').html(tableserupa); }
				else { $('#tablegudangserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablegudangserupa').html('<tr><td>-</td><td>-</td></tr>');
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
    title: 'Data gudang berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data gudang berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Gudang sudah ada.'
  });
    	";
    	}


    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data gudang berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_gudang', $data);
		$this->load->view('v_footer', $data);
	}
	
	public function del($idgudang) {
		$this->gudang_model->doDel($idgudang);
		$this->session->set_flashdata('del_msg', true);

		redirect('gudang');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->gudang_model->getAll($this->input->post('idgudang'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->gudang_model->getAll("", "nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
