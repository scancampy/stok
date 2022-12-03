<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

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
			if($this->input->post('hididkota') !='') {
				$dataUpdate = array(
							'nama' => $this->input->post('nama'),
							'keterangan' => $this->input->post('keterangan')
						  );
				$this->kota_model->doUpdate($this->input->post('hididkota'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$cek = $this->kota_model->getAll('', 'nama = "'.$this->input->post('nama').'" ');
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'nama' => $this->input->post('nama'),
								'keterangan' => $this->input->post('keterangan'),
								'status' => 'active'
							  );
					$this->kota_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('kota');
		}

		$data = array();

		$data['kota'] = $this->kota_model->getAll('','',0,'urutan','asc');

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

$(document).on( 'click','.btnedit', function() { 
	var id = $(this).attr('kotaid');

	$.post('".base_url('kota/load')."', { idkota:id }, function(data) {
		var json = JSON.parse(data);
		$('#nama').val(json['data'][0].nama);
		$('#keterangan').html(json['data'][0].keterangan);
		$('#hididkota').val(json['data'][0].idkota);
		$('#title_modal').html('Edit Kota');
		$('#tablekotaserupa').html('<tr><td>-</td></tr>');
	});
});
		";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#keterangan').html('');
	$('#title_modal').html('Tambah Kota');	
	$('#tablekotaserupa').html('<tr><td>-</td></tr>');
});
		";

		// BARANG SERUPA
		$data['js'] .= "
$('#nama').on('keyup change blur', function(event) {
	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('kota/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);
		

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablekotaserupa').html(tableserupa); }
					else { $('#tablekotaserupa').html('<tr><td>-</td></tr>'); }				
				} else {
					$('#tablekotaserupa').html('<tr><td>-</td></tr>');
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
  'ordering': false,
  'info': true,
  'autoWidth': false,
  'responsive': true,
});";
*/
    	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data kota berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data kota berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Kota sudah ada.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data kota berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_kota', $data);
		$this->load->view('v_footer', $data);
	}

	public function del($idkota) {
		$this->kota_model->doDel($idkota);
		$this->session->set_flashdata('del_msg', true);

		redirect('kota');
	}

	public function changeurutan($idkota, $arah) {
		$this->kota_model->doAdjustUrutan($idkota, $arah);
		redirect('kota');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->kota_model->getAll($this->input->post('idkota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->kota_model->getAll("", "nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
