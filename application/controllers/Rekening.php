<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

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
			if($this->input->post('hididrekening') !='') {
				$dataUpdate = array(
							'kode' => $this->input->post('kode'),
							'nomor' => $this->input->post('nomor'),
							'keterangan' => $this->input->post('keterangan'),
							'bank' => $this->input->post('bank'),
							'saldo_awal' => $this->input->post('saldo_awal')
						  );
				$this->rekening_model->doUpdate($this->input->post('hididrekening'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {

				// cek dulu rekening sudah ada atau belum
				$cek = $this->rekening_model->getKodeAll( $this->input->post('kode'));
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'kode' => $this->input->post('kode'),
								'nomor' => $this->input->post('nomor'),
								'keterangan' => $this->input->post('keterangan'),
								'bank' => $this->input->post('bank'),
								'saldo_awal' => $this->input->post('saldo_awal'),
								'status' => 'active'
							  );
					$this->rekening_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('rekening');
		}

		$data = array();

		$data['rekening'] = $this->rekening_model->getAll();

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    
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

$(document).on( 'click','.btnedit', function() { 
	var id = $(this).attr('rekeningid');

	$.post('".base_url('rekening/load')."', { idrekening:id }, function(data) {
		var json = JSON.parse(data);
		$('#kode').val(json['data'][0].kode);
		$('#bank').val(json['data'][0].bank);
		$('#keterangan').val(json['data'][0].keterangan);
		$('#saldo_awal').val(json['data'][0].saldo_awal);
		$('#nomor').val(json['data'][0].nomor);
		$('#hididrekening').val(json['data'][0].idrekening);
		$('#title_modal').html('EDIT REKENING');
		$('#tablerekeningserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>'); 
	});
});
		";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#keterangan').val('');
	$('#title_modal').html('TAMBAH REKENING');
	$('#tablerekeningserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>'); 
});
		";

		// BARANG SERUPA
		$data['js'] .= "
$('#kode').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('rekening/search')."', { search:s }, function(data) {
			var json = JSON.parse(data);

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablerekeningserupa').html(tableserupa); }
				else { $('#tablerekeningserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablerekeningserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";

$data['js'] .= "
$('#nomor').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('rekening/searchnomor')."', { search:s }, function(data) {
			var json = JSON.parse(data);
			console.log(data);
			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablerekeningserupa').html(tableserupa); }
				else { $('#tablerekeningserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablerekeningserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";

		$data['js'] .= "
$('#bank').on('keyup change blur', function(event) {

	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('rekening/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);
			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablerekeningserupa').html(tableserupa); }
				else { $('#tablerekeningserupa').html('<tr><td>-</td><td>-</td></tr>'); }				
			} else {
				$('#tablerekeningserupa').html('<tr><td>-</td><td>-</td></tr>');
			}
		});
	}
});
";



		// DATA TABLE
		/*$data['js'] .= "
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
    title: 'Data rekening berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data rekening berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Kode rekening sudah ada.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data rekening berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_rekening', $data);
		$this->load->view('v_footer', $data);
	}
	
	public function del($idrekening) {
		$this->rekening_model->doDel($idrekening);
		$this->session->set_flashdata('del_msg', true);

		redirect('rekening');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->rekening_model->getAll($this->input->post('idrekening'));
		echo json_encode(array('data' => $hasil));
	}

	public function search() {
		$hasil = $this->rekening_model->getAll("", "kode LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->rekening_model->getAll("", "bank LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchnomor() {
		$hasil = $this->rekening_model->getAll("", "nomor LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
