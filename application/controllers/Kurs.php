<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurs extends CI_Controller {

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
			if($this->input->post('hididkurs') !='') {
				$dataUpdate = array(
							'nama' => $this->input->post('nama'),
							'nilai_rupiah' =>  $this->input->post('nilai_rupiah'),
							'lambang' => $this->input->post('lambang'),
						  );
				$this->kurs_model->doUpdate($this->input->post('hididkurs'), $dataUpdate);
				$this->session->set_flashdata('update_msg', true);
			} else {
				$cek = $this->kurs_model->getAll('', 'nama = "'.$this->input->post('nama').'" OR lambang = "'.$this->input->post('lambang').'" ');
				if(count($cek) > 0) {
					$this->session->set_flashdata('invalid_code', true);
				} else {
					$dataInsert = array(
								'nama' => $this->input->post('nama'),
								'nilai_rupiah' => $this->input->post('nilai_rupiah'),
								'lambang' => $this->input->post('lambang'),
								'status' => 'active'
							  );
					$this->kurs_model->doInsert($dataInsert);
					$this->session->set_flashdata('insert_msg', true);
				}
			}

			redirect('kurs');
		}

		$data = array();

		$data['kurs'] = $this->kurs_model->getAll('','',0,'urutan','asc');

		// EDIT
		$data['js'] = "
var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

function numberWithCommas(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
		}

		$('#nilai_rupiah').on('keypress', function(e) {
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
	var id = $(this).attr('kursid');

	$.post('".base_url('kurs/load')."', { idkurs:id }, function(data) {
		var json = JSON.parse(data);
		$('#nama').val(json['data'][0].nama);
		$('#lambang').val(json['data'][0].lambang);
		$('#nilai_rupiah').val(json['data'][0].nilai_rupiah);
		$('#hididkurs').val(json['data'][0].idkurs);
		$('#title_modal').html('Edit kurs');
		$('#tablekursserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>');
	});
});
		";

		// ADD 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	$('form input[type=text], input[type=hidden]').val('');
	$('#title_modal').html('TAMBAH KURS');	
	$('#tablekursserupa').html('<tr><td>-</td><td>-</td><td>-</td></tr>');
});
		";

		// BARANG SERUPA
		$data['js'] .= "
$('#nama').on('keyup change blur', function(event) {
	var s = $(this).val();
	if(s.trim() != '' ) {
		$.post('".base_url('kurs/searchnama')."', { search:s }, function(data) {
			var json = JSON.parse(data);
		

			if(json['data'].length > 0) {
				var tableserupa = '';
				var serupa=0;
				for(var i =0; i < json['data'].length; i++) {
						tableserupa += '<tr>';
						tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].lambang.toUpperCase() + '</td>';
						tableserupa += '<td>' + json['data'][i].nilai_rupiah.toUpperCase() + '</td>';
						tableserupa += '</tr>';
						serupa++;
					
				}

				if(serupa > 0) { $('#tablekursserupa').html(tableserupa); }
					else { $('#tablekursserupa').html('<tr><td>-</td></tr>'); }				
				} else {
					$('#tablekursserupa').html('<tr><td>-</td></tr>');
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
    title: 'Data kurs berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data kurs berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('invalid_code')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'error',
    title: 'Kurs sudah ada.'
  });
    	";
    	}


    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data kurs berhasil dihapus.'
  });
    	";
    	}

		$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('master/v_kurs', $data);
		$this->load->view('v_footer', $data);
	}

	public function del($idkurs) {
		$this->kurs_model->doDel($idkurs);
		$this->session->set_flashdata('del_msg', true);

		redirect('kurs');
	}

	public function changeurutan($idkurs, $arah) {
		$this->kurs_model->doAdjustUrutan($idkurs, $arah);
		redirect('kurs');
	}


	//AJAX CALL
	public function load() {
		$hasil = $this->kurs_model->getAll($this->input->post('idkurs'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnama() {
		$hasil = $this->kurs_model->getAll("", "nama LIKE '%".$this->input->post('search')."%' ", 10);
		echo json_encode(array('data' => $hasil));
	}
}
