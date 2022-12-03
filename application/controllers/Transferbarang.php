<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transferbarang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('admin')) {
        	redirect('');
        }
    }

  public function index() {
  	redirect('dashboard');
  }

  public function lihat() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];

		$cari = $this->input->get('nomor_nota');
		if(strtoupper(substr($cari,0,2)) == 'TR') {
			$cari = substr($cari, 2, strlen($cari)-2);
		}
	
		$data['penjualan'] = $this->transfer_barang_model->getAll('', '(transfer_barang.nomor_nota LIKE "%'.$cari.'%" OR r1.nama LIKE "%'.$cari.'%" OR r2.nama LIKE "%'.$cari.'%" OR barang.kode LIKE "%'.$cari.'%" OR barang.nama LIKE "%'.$cari.'%" )  AND (transfer_barang.tanggal >= "'.$dtanggal.'" AND transfer_barang.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->transfer_barang_model->getAll('', 'transfer_barang.tanggal >= "'.date('Y-m-01').'" AND transfer_barang.tanggal <= "'.date('Y-m-d').'" ');
  	}

  	// DATE PICKER & SETUP TOAST
  	$data['js'] = "
			//Date range picker
			$('#fromtanggal').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	    $('#untiltanggal').datetimepicker({
	        format: 'DD MMMM YYYY',  ignoreReadonly: true
	    });

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.fromtanggal, .untiltanggal').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('#fromtanggal').on('keyup', function(e) {
			if(e.keyCode == 13) { 
				console.log('check');
				var tgljual = $('.fromtanggal').val();
				console.log(tgljual);
				if(tgljual.split('/').length > 1) {
					var y = tgljual.substr(6,10);
					var m = parseInt(tgljual.substr(3,5));
					var d = tgljual.substr(0,2);
					$('.fromtanggal').val(d + ' ' + months[m-1] + ' ' + y);
					console.log($('.fromtanggal').val());
				}

				$('#formlihatpenjualan').submit();
			}
		});

		$('#untiltanggal').on('keyup', function(e) {
			if(e.keyCode == 13) { 
				console.log('check');
				var tgljual = $('.untiltanggal').val();
				console.log(tgljual);
				if(tgljual.split('/').length > 1) {
					var y = tgljual.substr(6,10);
					var m = parseInt(tgljual.substr(3,5));
					var d = tgljual.substr(0,2);
					$('.untiltanggal').val(d + ' ' + months[m-1] + ' ' + y);
					console.log($('.untiltanggal').val());
				}

				$('#formlihatpenjualan').submit();
			}
		});

		$('.fromtanggal, .untiltanggal').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.fromtanggal, .untiltanggal').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.fromtanggal, .untiltanggal').on('blur', function() {
			var tgljual = $(this).val();
			if($(this).val().split('/').length > 1) {
				var y = tgljual.substr(6,10);
				var m = parseInt(tgljual.substr(3,5));
				var d = tgljual.substr(0,2);
				$(this).val(d + ' ' + months[m-1] + ' ' + y);
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
			if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
    	var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil dihapus.'
  });
    	";
    	}

		// FORM SUBMISSION
		$data['js'] .= "
		$('#nomor_nota').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formlihatpenjualan').submit(); }
			});

		$('#jenis_transaksi').on('change', function() {
			$('#formlihatpenjualan').submit();
		});	

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formlihatpenjualan').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formlihatpenjualan').submit();
    });
		";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transferbarang/v_lihat_antar_gudang', $data);
		$this->load->view('v_footer', $data);
  }

  public function lihatbaranghilang() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];

		$cari = $this->input->get('nomor_nota');
		if(strtoupper(substr($cari,0,2)) == 'TH') {
			$cari = substr($cari, 2, strlen($cari)-2);
		}
	
		$data['penjualan'] = $this->transfer_barang_model->getAllBarangHilang('', '(barang_hilang.nomor_nota LIKE "%'.$cari.'%" OR r1.nama LIKE "%'.$cari.'%"  OR barang.kode LIKE "%'.$cari.'%" OR barang.nama LIKE "%'.$cari.'%" )  AND (barang_hilang.tanggal >= "'.$dtanggal.'" AND barang_hilang.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->transfer_barang_model->getAllBarangHilang('', 'barang_hilang.tanggal >= "'.date('Y-m-01').'" AND barang_hilang.tanggal <= "'.date('Y-m-d').'" ');
  	}

  	// DATE PICKER & SETUP TOAST
  	$data['js'] = "
			//Date range picker
			$('#fromtanggal').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	    $('#untiltanggal').datetimepicker({
	        format: 'DD MMMM YYYY',  ignoreReadonly: true
	    });

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.fromtanggal, .untiltanggal').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('#fromtanggal').on('keyup', function(e) {
			if(e.keyCode == 13) { 
				console.log('check');
				var tgljual = $('.fromtanggal').val();
				console.log(tgljual);
				if(tgljual.split('/').length > 1) {
					var y = tgljual.substr(6,10);
					var m = parseInt(tgljual.substr(3,5));
					var d = tgljual.substr(0,2);
					$('.fromtanggal').val(d + ' ' + months[m-1] + ' ' + y);
					console.log($('.fromtanggal').val());
				}

				$('#formlihatpenjualan').submit();
			}
		});

		$('#untiltanggal').on('keyup', function(e) {
			if(e.keyCode == 13) { 
				console.log('check');
				var tgljual = $('.untiltanggal').val();
				console.log(tgljual);
				if(tgljual.split('/').length > 1) {
					var y = tgljual.substr(6,10);
					var m = parseInt(tgljual.substr(3,5));
					var d = tgljual.substr(0,2);
					$('.untiltanggal').val(d + ' ' + months[m-1] + ' ' + y);
					console.log($('.untiltanggal').val());
				}

				$('#formlihatpenjualan').submit();
			}
		});

		$('.fromtanggal, .untiltanggal').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.fromtanggal, .untiltanggal').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.fromtanggal, .untiltanggal').on('blur', function() {
			var tgljual = $(this).val();
			if($(this).val().split('/').length > 1) {
				var y = tgljual.substr(6,10);
				var m = parseInt(tgljual.substr(3,5));
				var d = tgljual.substr(0,2);
				$(this).val(d + ' ' + months[m-1] + ' ' + y);
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
			if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
    	var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil dihapus.'
  });
    	";
    	}

		// FORM SUBMISSION
		$data['js'] .= "
		$('#nomor_nota').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formlihatpenjualan').submit(); }
			});

		$('#jenis_transaksi').on('change', function() {
			$('#formlihatpenjualan').submit();
		});	

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formlihatpenjualan').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formlihatpenjualan').submit();
    });
		";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transferbarang/v_lihat_barang_hilang', $data);
		$this->load->view('v_footer', $data);
  }


  public function tambahantargudang() {
  	$data = array();

  	if($this->input->post('nomor_nota')) {
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggal'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {

				$dataupdate = array(
	  			'idgudang_asal' => $this->input->post('idgudang_asal'),
	  			'idgudang_tujuan' => $this->input->post('idgudang_tujuan'),
	  			'tanggal' => $djual,
	  			'idbarang' => $this->input->post('idbarang'),
	  			'keterangan' => $this->input->post('keterangan'),
	  			'jumlah_besar' => $this->input->post('jumlah_besar'),
	  			'jumlah_kecil' => $this->input->post('jumlah_kecil')
		  		);
	  			
	  			$this->transfer_barang_model->doUpdate($this->input->post('nomor_nota'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('transferbarang/tambahantargudang?id='.$this->input->post('nomor_nota'));

			} else {
				 
			$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idgudang_asal' => $this->input->post('idgudang_asal'),
	  			'idgudang_tujuan' => $this->input->post('idgudang_tujuan'),
	  			'tanggal' => $djual,
	  			'idbarang' => $this->input->post('idbarang'),
	  			'keterangan' => $this->input->post('keterangan'),
	  			'jumlah_besar' => $this->input->post('jumlah_besar'),
	  			'jumlah_kecil' => $this->input->post('jumlah_kecil'),
	  			'status' => 'active'
	  		);


	  		$this->transfer_barang_model->doInsert($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transferbarang/tambahantargudang');
		}		  		
  		
  	}


  	$data['gudang'] = $this->gudang_model->getAll();
  	$data['lastid'] = $this->transfer_barang_model->getCountAll();

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transfer_barang_model->getAll($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('transferbarang/tambahantargudang'); }
  	}

  

  	// DATE PICKER & SETUP TOAST
  	$data['js'] .= "
			//Date range picker
			$('#tanggal').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.tanggal').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('.tanggal').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.tanggal').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.tanggal').on('blur', function() {
			var tgljual = $(this).val();
			if($(this).val().split('/').length > 1) {
				var y = tgljual.substr(6,10);
				var m = parseInt(tgljual.substr(3,5));
				var d = tgljual.substr(0,2);
				$(this).val(d + ' ' + months[m-1] + ' ' + y);
			}
		});

	    var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  	// FORM VALIDASI

  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		e.preventDefault();
  		if($('#formtmabahhutang').valid()) {
	  		$('#formtmabahhutang').submit();
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('transferbarang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('transferbarang/tambahantargudang?id=')."' + $('#nomor_nota').val());
				} else { alert('Nomor nota tidak ditemukan'); }
	  		});
	  	} else { alert('Nomor nota harus diisi'); }
  	});
  	";

  	// TEKAN ENTER DI NOMOR NOTA
	$data['js'] .= "
		$('#nomor_nota').on('keydown', function(e) {
			if(e.keyCode == 13) { 
				e.preventDefault();
				if($('#nomor_nota').val().trim() != '') {
			  		$.post('".base_url('transferbarang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transferbarang/tambahantargudang?id=')."' + $('#nomor_nota').val());					
						} else {
							alert('Nomor nota tidak ditemukan');
						}
			  		});
			  	} else {
			  		alert('Nomor nota harus diisi');
			  	}
			}
		});";

  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahhutang').valid()) {
	  			e.preventDefault();
	  			$.post('".base_url('transferbarang/searchnota')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {

	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {

	  					if($('#idgudang_asal').val() == $('#idgudang_tujuan').val()) {
	  						Toast.fire({
							    icon: 'error',
							    title: 'Gagal simpan karena gudang asal dan tujuan sama'
							  });
							  } else {
			  					$('#formtmabahhutang').submit();
			  				}
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}

  	// TEKAN ENTER DI BARANG
	$data['js'] .= "
		$('#kodebarang').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#kodebarang').val().trim() != '') {
			  		$.post('".base_url('transferbarang/searchbarangkode')."', { kodebarang: $('#kodebarang').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helpbarang').html(json['data'][0].nama.toUpperCase());
							$('#idbarang').val(json['data'][0].idbarang);
							$('#helpbarang').show();
							
						} else {
							alert('Kode barang tidak ditemukan');
							$('#helpbarang').hide();
						}
			  		});
			  	} else { alert('Kode barang harus diisi'); $('#helpbarang').hide(); }
			}
		});";

	// LOAD BARANG 
  	$data['js'] .= "
  	$('#loadlinkbarang').on('click', function(e) {
  		e.preventDefault();
  		if($('#kodebarang').val().trim() != '') {
	  		$.post('".base_url('transferbarang/searchbarangkode')."', { kodebarang: $('#kodebarang').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helpbarang').html(json['data'][0].nama.toUpperCase());
					$('#idbarang').val(json['data'][0].idbarang);
					$('#helpbarang').show();					
				} else {
					alert('Kode barang tidak ditemukan');
					$('#helpbarang').hide();
				}
	  		});
	  	} else { alert('Kode barang harus diisi'); $('#helpbarang').hide(); }
  	});
  	";

  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      idgudang_asal: {
		        required: true
		      },
		      idgudang_tujuan: {
		        required: true
		      },
		      jumlah_besar: {
		        required: true
		      },
		      jumlah_kecil: {
		        required: true
		      },
		      tanggal: {
		        required: true
		      }
		    },
		    messages: {
		      nomor_nota: {
		        required: 'Harus diisi'
		      },
		      idgudang_asal: {
		        required: 'Harus diisi'
		      },
		      idgudang_tujuan: {
		        required: 'Harus diisi'
		      },
		      jumlah_besar: {
		        required: 'Harus diisi'
		      },
		      jumlah_kecil: {
		        required: 'Harus diisi'
		      },
		      tanggal: {
		        required: 'Harus diisi'
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


  	//NOMINAL
  	$data['js'] .= "$('#jumlah_besar, #jumlah_kecil').on('keypress', function(e) {
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
		});";

  	// CARI BARANG
  	$data['js'] .= "

    function numberWithCommas(x) {
     	if(String(x).indexOf('.') != -1) {
	    	var y = String(x).substr(0, String(x).indexOf('.'));
	    	var firstpart =  y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	    	firstpart += ',' + String(x).substr(String(x).indexOf('.')+1, String(x).length);
	    } else {
	    	var firstpart =  String(x).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	    }
	    return firstpart;
	}
  	";

  	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil dihapus.'
  });
    	";
    	}

    // GUDANG ASAL
    $data['js'] .= "
    $('#idgudang_asal').on('change', function() {
    	if($(this).val() != '') {
    		$('#helpgudangasal').html($('option:selected', this).attr('alamat'));
    		$('#helpgudangasal').show();
    	} else {
    		$('#helpgudangasal').hide();
    	}
    });

    $('#idgudang_tujuan').on('change', function() {
    	if($(this).val() != '') {
    		$('#helpgudangtujuan').html($('option:selected', this).attr('alamat'));
    		$('#helpgudangtujuan').show();
    	} else {
    		$('#helpgudangtujuan').hide();
    	}
    });
    ";

    //  CARI NOTA
    $data['js'] .= "
		$('#modal-lg-nota').on('shown.bs.modal', function () {
		    $('#carinota').focus();
		});

		$('#carinota').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transferbarang/searchnotafree')."', { cari:term }, function(data) {
	  			
		  			var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							var tgljual = json['data'][i].tanggal;
							var y = tgljual.substr(0,4);
							var m = parseInt(tgljual.substr(5,2));
							var d = tgljual.substr(8,2);

							var months = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];


							tableserupa += '<tr>';
							tableserupa += '<td>TR' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].namagudangasal.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].namagudangtujuan.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].kodebarang.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td><a href=\'".base_url('transferbarang/tambahantargudang?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarinota').html(tableserupa); }
						else { $('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

    //  CARI BARANG
    $data['js'] .= "
		$('#modal-lg-barang').on('shown.bs.modal', function () {
		    $('#caribarang').focus();
		});

		$(document).on('click', '.btnpilihbarang', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var nama = $(this).attr('pilihnama');
	  		var merk = $(this).attr('pilihmerk');
	  		$('#kodebarang').val(kode);
	  		$('#idbarang').val(id);
	  		$('#modal-lg-barang').modal('hide');
	  		$('#helpbarang').html(nama.toUpperCase());
	  		$('#helpbarang').show();
	  	});

		$('#caribarang').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transferbarang/searchbarang')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].merk.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnama=\'' + json['data'][i].nama + '\' pilihmerk=\'' + json['data'][i].merk + '\' pilihid=\'' + json['data'][i].idbarang + '\' class=\'btn btnpilihbarang btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarirekening').html(tableserupa); }
						else { $('#tabelhasilcarirekening').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarirekening').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

    

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transferbarang/v_tambah_antar_gudang', $data);
		$this->load->view('v_footer', $data);
  }

  public function tambahbaranghilang() {
  	$data = array();

  	if($this->input->post('nomor_nota')) {

	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggal'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {

				$dataupdate = array(
	  			'idgudang_asal' => $this->input->post('idgudang_asal'),
	  			'tanggal' => $djual,
	  			'idbarang' => $this->input->post('idbarang'),
	  			'keterangan' => $this->input->post('keterangan'),
	  			'jumlah_besar' => $this->input->post('jumlah_besar'),
	  			'jumlah_kecil' => $this->input->post('jumlah_kecil')
		  		);
	  			
	  			$this->transfer_barang_model->doUpdateBarangHilang($this->input->post('nomor_nota'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('transferbarang/tambahbaranghilang?id='.$this->input->post('nomor_nota'));

			} else {
				 
			$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idgudang_asal' => $this->input->post('idgudang_asal'),
	  			'tanggal' => $djual,
	  			'idbarang' => $this->input->post('idbarang'),
	  			'keterangan' => $this->input->post('keterangan'),
	  			'jumlah_besar' => $this->input->post('jumlah_besar'),
	  			'jumlah_kecil' => $this->input->post('jumlah_kecil'),
	  			'status' => 'active'
	  		);


	  		$this->transfer_barang_model->doInsertBarangHilang($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transferbarang/tambahbaranghilang');
		}		  		
  		
  	}

  	$data['lastid'] = $this->transfer_barang_model->getCountAllBarangHilang();
  	$data['gudang'] = $this->gudang_model->getAll();

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transfer_barang_model->getAllBarangHilang($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('transferbarang/tambahbaranghilang'); }
  	}

  

  	// DATE PICKER & SETUP TOAST
  	$data['js'] .= "
			//Date range picker
			$('#tanggal').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	   var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.tanggal').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('.tanggal').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.tanggal').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.tanggal').on('blur', function() {
			var tgljual = $(this).val();
			if($(this).val().split('/').length > 1) {
				var y = tgljual.substr(6,10);
				var m = parseInt(tgljual.substr(3,5));
				var d = tgljual.substr(0,2);
				$(this).val(d + ' ' + months[m-1] + ' ' + y);
			}
		});


	    var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  	// FORM VALIDASI

  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		e.preventDefault();
  		if($('#formtmabahhutang').valid()) {
	  		$('#formtmabahhutang').submit();
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('transferbarang/searchnotabaranghilang')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('transferbarang/tambahbaranghilang?id=')."' + $('#nomor_nota').val());
				} else { alert('Nomor nota tidak ditemukan'); }
	  		});
	  	} else { alert('Nomor nota harus diisi'); }
  	});
  	";

  	// TEKAN ENTER DI NOMOR NOTA
	$data['js'] .= "
		$('#nomor_nota').on('keydown', function(e) {
			if(e.keyCode == 13) { 
				e.preventDefault();
				if($('#nomor_nota').val().trim() != '') {
			  		$.post('".base_url('transferbarang/searchnotabaranghilang')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transferbarang/tambahbaranghilang?id=')."' + $('#nomor_nota').val());					
						} else {
							alert('Nomor nota tidak ditemukan');
						}
			  		});
			  	} else {
			  		alert('Nomor nota harus diisi');
			  	}
			}
		});";

  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahhutang').valid()) {
	  			e.preventDefault();

	  			$.post('".base_url('transferbarang/searchnotabaranghilang')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {
	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {

	  					if($('#idgudang_asal').val() == $('#idgudang_tujuan').val()) {
	  						Toast.fire({
							    icon: 'error',
							    title: 'Gagal simpan karena gudang asal dan tujuan sama'
							  });
							  } else {
			  					$('#formtmabahhutang').submit();
			  				}
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}

  	// TEKAN ENTER DI BARANG
	$data['js'] .= "
		$('#kodebarang').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#kodebarang').val().trim() != '') {
			  		$.post('".base_url('transferbarang/searchbarangkode')."', { kodebarang: $('#kodebarang').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helpbarang').html(json['data'][0].nama.toUpperCase());
							$('#idbarang').val(json['data'][0].idbarang);
							$('#helpbarang').show();
							
						} else {
							alert('Kode barang tidak ditemukan');
							$('#helpbarang').hide();
						}
			  		});
			  	} else { alert('Kode barang harus diisi'); $('#helpbarang').hide(); }
			}
		});";

	// LOAD BARANG 
  	$data['js'] .= "
  	$('#loadlinkbarang').on('click', function(e) {
  		e.preventDefault();
  		if($('#kodebarang').val().trim() != '') {
	  		$.post('".base_url('transferbarang/searchbarangkode')."', { kodebarang: $('#kodebarang').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helpbarang').html(json['data'][0].nama.toUpperCase());
					$('#idbarang').val(json['data'][0].idbarang);
					$('#helpbarang').show();					
				} else {
					alert('Kode barang tidak ditemukan');
					$('#helpbarang').hide();
				}
	  		});
	  	} else { alert('Kode barang harus diisi'); $('#helpbarang').hide(); }
  	});
  	";

  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      idgudang_asal: {
		        required: true
		      },
		      idgudang_tujuan: {
		        required: true
		      },
		      jumlah_besar: {
		        required: true
		      },
		      jumlah_kecil: {
		        required: true
		      },
		      tanggal: {
		        required: true
		      }
		    },
		    messages: {
		      nomor_nota: {
		        required: 'Harus diisi'
		      },
		      idgudang_asal: {
		        required: 'Harus diisi'
		      },
		      idgudang_tujuan: {
		        required: 'Harus diisi'
		      },
		      jumlah_besar: {
		        required: 'Harus diisi'
		      },
		      jumlah_kecil: {
		        required: 'Harus diisi'
		      },
		      tanggal: {
		        required: 'Harus diisi'
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


  	//NOMINAL
  	$data['js'] .= "$('#jumlah_besar, #jumlah_kecil').on('keypress', function(e) {
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
		});";

  	// CARI BARANG
  	$data['js'] .= "

    function numberWithCommas(x) {
     	if(String(x).indexOf('.') != -1) {
	    	var y = String(x).substr(0, String(x).indexOf('.'));
	    	var firstpart =  y.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	    	firstpart += ',' + String(x).substr(String(x).indexOf('.')+1, String(x).length);
	    } else {
	    	var firstpart =  String(x).toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
	    }
	    return firstpart;
	}
  	";

  	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transfer antar gudang berhasil dihapus.'
  });
    	";
    	}

    // GUDANG ASAL
    $data['js'] .= "
    $('#idgudang_asal').on('change', function() {
    	if($(this).val() != '') {
    		$('#helpgudangasal').html($('option:selected', this).attr('alamat'));
    		$('#helpgudangasal').show();
    	} else {
    		$('#helpgudangasal').hide();
    	}
    });

    $('#idgudang_tujuan').on('change', function() {
    	if($(this).val() != '') {
    		$('#helpgudangtujuan').html($('option:selected', this).attr('alamat'));
    		$('#helpgudangtujuan').show();
    	} else {
    		$('#helpgudangtujuan').hide();
    	}
    });
    ";

    //  CARI NOTA
    $data['js'] .= "
		$('#modal-lg-nota').on('shown.bs.modal', function () {
		    $('#carinota').focus();
		});

		$('#carinota').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transferbarang/searchnotafreebaranghilang')."', { cari:term }, function(data) {
	  			
		  			var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							var tgljual = json['data'][i].tanggal;
							var y = tgljual.substr(0,4);
							var m = parseInt(tgljual.substr(5,2));
							var d = tgljual.substr(8,2);

							var months = ['JANUARY', 'FEBRUARY', 'MARCH', 'APRIL', 'MAY', 'JUNE', 'JULY', 'AUGUST', 'SEPTEMBER', 'OCTOBER', 'NOVEMBER', 'DECEMBER'];


							tableserupa += '<tr>';
							tableserupa += '<td>BH' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].namagudangasal.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].kodebarang.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td><a href=\'".base_url('transferbarang/tambahbaranghilang?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarinota').html(tableserupa); }
						else { $('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

    //  CARI BARANG
    $data['js'] .= "
		$('#modal-lg-barang').on('shown.bs.modal', function () {
		    $('#caribarang').focus();
		});

		$(document).on('click', '.btnpilihbarang', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var nama = $(this).attr('pilihnama');
	  		var merk = $(this).attr('pilihmerk');
	  		$('#kodebarang').val(kode);
	  		$('#idbarang').val(id);
	  		$('#modal-lg-barang').modal('hide');
	  		$('#helpbarang').html(nama.toUpperCase());
	  		$('#helpbarang').show();
	  	});

		$('#caribarang').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transferbarang/searchbarang')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].merk.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnama=\'' + json['data'][i].nama + '\' pilihmerk=\'' + json['data'][i].merk + '\' pilihid=\'' + json['data'][i].idbarang + '\' class=\'btn btnpilihbarang btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarirekening').html(tableserupa); }
						else { $('#tabelhasilcarirekening').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarirekening').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

    

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transferbarang/v_tambah_barang_hilang', $data);
		$this->load->view('v_footer', $data);
  }

  

	//AJAX CALL
  	public function searchbarangkode() {
		$hasil = $this->barang_model->getKodeAll($this->input->post('kodebarang'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchbarang() {
		$hasil = $this->barang_model->getAll('', " (nama LIKE '%".$this->input->post('cari')."%' OR merk LIKE '%".$this->input->post('cari')."%' OR kode LIKE '%".$this->input->post('cari')."%') ",10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchnota() {
		$hasil = $this->transfer_barang_model->getAll($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotabaranghilang() {
		$hasil = $this->transfer_barang_model->getAllBarangHilang($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafree() {
		$hasil = $this->transfer_barang_model->getAllFree( $this->input->post('cari'));
			
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafreebaranghilang() {
		$hasil = $this->transfer_barang_model->getAllFreeBarangHilang( $this->input->post('cari'));
			
		echo json_encode(array('data' => $hasil));
	}

	public function searchrekeningfree() {
		$hasil = $this->rekening_model->getAll(''," (nomor LIKE '%".$this->input->post('cari')."%' OR bank LIKE '%".$this->input->post('cari')."%' OR kode LIKE '%".$this->input->post('cari')."%') ");
		echo json_encode(array('data' => $hasil));
	}	

	public function del($nomor_nota) {
		$this->transfer_barang_model->doDel($nomor_nota);
		$this->session->set_flashdata('del_msg', true);
		redirect('transferbarang/lihat');
		
	}

	public function delbaranghilang($nomor_nota) {
		$this->transfer_barang_model->doDelBarangHilang($nomor_nota);
		$this->session->set_flashdata('del_msg', true);
		redirect('transferbarang/lihatbaranghilang');
		
	}

}
