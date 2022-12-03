<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

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
			if($this->input->post('hididpelanggan') !='') {
				$dataUpdate = array(
							'kode' => $this->input->post('kode'),
							'nama' => $this->input->post('nama'),
							'keterangan' => $this->input->post('keterangan'),
							'alamat' => $this->input->post('alamat'),
							'contact_person' => $this->input->post('contact_person'),
							'idkota' => $this->input->post('idkota'),
							'telepon' => $this->input->post('telepon'),	
							'saldo_awal' => $this->input->post('saldo_awal'),	
							'status' => 'active'
						  );
				$this->pelanggan_model->doUpdate($this->input->post('hididpelanggan'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$cek = $this->pelanggan_model->getKodeAll( $this->input->post('kode'));
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'kode' => $this->input->post('kode'),
								'nama' => $this->input->post('nama'),
								'keterangan' => $this->input->post('keterangan'),
								'alamat' => $this->input->post('alamat'),
								'contact_person' => $this->input->post('contact_person'),
								'idkota' => $this->input->post('idkota'),
								'telepon' => $this->input->post('telepon'),	
								'saldo_awal' => $this->input->post('saldo_awal'),	
								'status' => 'active'
							  );
					$this->pelanggan_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('pelanggan');
		}

		$data = array();

		$data['pelanggan'] = $this->pelanggan_model->getAll();
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
	var id = $(this).attr('pelangganid');

	$.post('".base_url('pelanggan/load')."', { idpelanggan:id }, function(data) {
		var json = JSON.parse(data);
		$('#kode').val(json['data'][0].kode);
		$('#nama').val(json['data'][0].nama);
		$('#keterangan').val(json['data'][0].keterangan);
		$('#alamat').val(json['data'][0].alamat);
		$('#telepon').val(json['data'][0].telepon);
		$('#contact_person').val(json['data'][0].contact_person);
		$('#saldo_awal').val(json['data'][0].saldo_awal);
		$('#hididpelanggan').val(json['data'][0].idpelanggan);
		$('#idkota').val(json['data'][0].idkota);
		$('#title_modal').html('EDIT PELANGGAN');
		$('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>');
	});
});
		";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden], input[type=number]').val('');
	$('#idkota').val($('#idkota option:first').val());
	$('#alamat').val('');
	$('#keterangan').val('');
	$('#title_modal').html('TAMBAH PELANGGAN');	
	$('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>');
});
		";

		// BARANG SERUPA
		$data['js'] .= "
$('#kode').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('pelanggan/search')."', { search:s }, function(data) {
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

				if(serupa > 0) { $('#tablepelangganserupa').html(tableserupa); }
				else { $('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";

		$data['js'] .= "

		$('#saldo_awal').on('keypress', function(e) {
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

$('#nama').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('pelanggan/searchnama')."', { search:s }, function(data) {
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

				if(serupa > 0) { $('#tablepelangganserupa').html(tableserupa); }
				else { $('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablepelangganserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";



		// DATA TABLE
/*		$data['js'] .= "
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
    title: 'Data pelanggan berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pelanggan berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Kode pelanggan sudah ada.'
  });
    	";
    	}


    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pelanggan berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_pelanggan', $data);
		$this->load->view('v_footer', $data);
	}

	public function del($idpelanggan) {
		$this->pelanggan_model->doDel($idpelanggan);
		$this->session->set_flashdata('del_msg', true);

		redirect('pelanggan');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->pelanggan_model->getAll($this->input->post('idpelanggan'));
		echo json_encode(array('data' => $hasil));
	}

	public function search() {
		$hasil = $this->pelanggan_model->getAll("", "kode LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil, 'search' => $this->input->post('search')));
	}

	public function searchnama() {
		$hasil = $this->pelanggan_model->getAll("", "pelanggan.nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
