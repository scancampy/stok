<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hutangpiutang extends CI_Controller {

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

   public function lihathutangpiutang() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
	
		$data['penjualan'] = $this->hutang_piutang_model->getAll('', '(hutangpiutang.nomor_nota LIKE "%'.$this->input->get('nomor_nota').'%" OR pelanggan.kode LIKE "%'.$this->input->get('nomor_nota').'%" OR pelanggan.nama LIKE "%'.$this->input->get('nomor_nota').'%") AND (hutangpiutang.tanggal >= "'.$dtanggal.'" AND hutangpiutang.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->hutang_piutang_model->getAll('', 'hutangpiutang.tanggal >= "'.date('Y-m-01').'"  AND hutangpiutang.tanggal <= "'.date('Y-m-d').'" ');
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
    title: 'Data pembayaran hutang piutang berhasil dihapus.'
  });
    	";
    	}

		// FORM SUBMISSION
		$data['js'] .= "
		$('#nomor_nota').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formlihatpenjualan').submit(); }
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
		$this->load->view('hutangpiutang/v_lihat_hutang_piutang', $data);
		$this->load->view('v_footer', $data);
  }

  public function lihathutang() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
	
		$data['penjualan'] = $this->hutang_piutang_model->getAll('', '(hutangpiutang.nomor_nota LIKE "%'.$this->input->get('nomor_nota').'%" OR pelanggan.kode LIKE "%'.$this->input->get('nomor_nota').'%"	 OR pelanggan.nama LIKE "%'.$this->input->get('nomor_nota').'%") AND hutangpiutang.jenis="hutang" AND (hutangpiutang.tanggal >= "'.$dtanggal.'" AND hutangpiutang.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->hutang_piutang_model->getAll('', 'hutangpiutang.tanggal >= "'.date('Y-m-01').'" AND hutangpiutang.jenis="hutang" AND hutangpiutang.tanggal <= "'.date('Y-m-d').'" ');
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
    title: 'Data pembayaran hutang berhasil dihapus.'
  });
    	";
    	}

		// FORM SUBMISSION
		$data['js'] .= "
		$('#nomor_nota').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formlihatpenjualan').submit(); }
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
		$this->load->view('hutangpiutang/v_lihat_hutang', $data);
		$this->load->view('v_footer', $data);
  }

  public function lihatpiutang() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
	
		$data['penjualan'] = $this->hutang_piutang_model->getAll('', '(hutangpiutang.nomor_nota LIKE "%'.$this->input->get('nomor_nota').'%" OR pelanggan.kode LIKE "%'.$this->input->get('nomor_nota').'%" OR pelanggan.nama LIKE "%'.$this->input->get('nomor_nota').'%") AND hutangpiutang.jenis="piutang" AND (hutangpiutang.tanggal >= "'.$dtanggal.'" AND hutangpiutang.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->hutang_piutang_model->getAll('', 'hutangpiutang.tanggal >= "'.date('Y-m-01').'" AND hutangpiutang.jenis="piutang" AND hutangpiutang.tanggal <= "'.date('Y-m-d').'" ');
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
    title: 'Data pembayaran piutang berhasil dihapus.'
  });
    	";
    	}

		// FORM SUBMISSION
		$data['js'] .= "
		$('#nomor_nota').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formlihatpenjualan').submit(); }
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
		$this->load->view('hutangpiutang/v_lihat_piutang', $data);
		$this->load->view('v_footer', $data);
  }

  public function tambahhutang() {
  	$data = array();

  	if($this->input->post('nomor_nota')) {
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggaljual'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {
				$dataupdate = array(
		  			'idpelanggan' => $this->input->post('hididpelanggan'),
		  			'tanggal' => $djual,
	  				'nominal' => $this->input->post('nominal'),
		  			'idrekening' => $this->input->post('hididrekening'),
		  			'idkurs' => $this->input->post('idkurs'),
		  			'keterangan' => $this->input->post('keterangan')
		  		);
	  			
	  			$this->hutang_piutang_model->doUpdate($this->input->post('nomor_nota'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('hutangpiutang/tambahhutang?id='.$this->input->post('nomor_nota'));

			} else {
				 
			$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'idrekening' => $this->input->post('hididrekening'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'jenis' => 'hutang',
	  			'keterangan' => $this->input->post('keterangan'),
	  			'status' => 'active'
	  		);


	  		$this->hutang_piutang_model->doInsert($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('hutangpiutang/tambahhutang');
		}		  		
  		
  	}

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->hutang_piutang_model->getAll($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('hutangpiutang/tambahhutang'); }
  		$data['editpelanggan'] = $this->pelanggan_model->getAll($data['editnota'][0]->idpelanggan);
  		$data['editrekening'] = $this->rekening_model->getAll($data['editnota'][0]->idrekening);
  	}

  	$data['kurs'] = $this->kurs_model->getAll();
  	$data['lastid'] = $this->hutang_piutang_model->getCountAll();


  	// DATE PICKER & SETUP TOAST
  	$data['js'] .= "
			//Date range picker
			$('#tanggaljual').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.tanggaljual').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('.tanggaljual').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.tanggaljual').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.tanggaljual').on('blur', function() {
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

  	// TEKAN ENTER DI REKENING
	$data['js'] .= "
		$('#koderekening').on('keydown change blur', function(e) {
			console.log(e.keyCode);
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening').val().trim() != '') {
			  		$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota: $('#koderekening').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank.toUpperCase() );
							$('#hididrekening').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";


  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		e.preventDefault();
  		if($('#formtmabahhutang').valid()) {
  			// CEK KODE PELANGGAN
			$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
				var json = JSON.parse(data);
					if(json['data'].length > 0) {
						// CEK KODE REKENING
						$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota : $('#koderekening').val() },function(data) {
							var json = JSON.parse(data);
								if(json['data'].length > 0) {
									$('#formtmabahhutang').submit();
								} else {
									Toast.fire({
								    icon: 'error',
								    title: 'Gagal simpan karena kode rekening tidak ditemukan'
								  });
								}
							});
					} else {
						Toast.fire({
					    icon: 'error',
					    title: 'Gagal simpan karena kode supplier tidak ditemukan'
					  });
					}
				});
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('hutangpiutang/tambahhutang?id=')."' + $('#nomor_nota').val());
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
			  		$.post('".base_url('hutangpiutang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('hutangpiutang/tambahhutang?id=')."' + $('#nomor_nota').val());
						} else { alert('Nomor nota tidak ditemukan'); }
			  		});
			  	} else { alert('Nomor nota harus diisi'); }
			}
		});";

	

  	// LOAD REKENING 
  	$data['js'] .= "
  	$('#loadlinkrekening').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota: $('#koderekening').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank.toUpperCase() );
					$('#hididrekening').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahhutang').valid()) {
	  			e.preventDefault();
	  			$.post('".base_url('hutangpiutang/searchnota')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {

	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {

	  					// CEK KODE PELANGGAN
	  					$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
	  						var json = JSON.parse(data);
		  						if(json['data'].length > 0) {
		  							// CEK KODE REKENING
									$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota : $('#koderekening').val() },function(data) {
										var json = JSON.parse(data);
											if(json['data'].length > 0) {
												$('#formtmabahhutang').submit();
											} else {
												Toast.fire({
											    icon: 'error',
											    title: 'Gagal simpan karena kode rekening tidak ditemukan'
											  });
											}
										});
	  							} else {
	  								Toast.fire({
									    icon: 'error',
									    title: 'Gagal simpan karena kode supplier tidak ditemukan'
									  });
	  							}
	  						});
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}
  	

  	// TEKAN ENTER DI PELANGGAN
	$data['js'] .= "
		$('#namapelanggan').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#namapelanggan').val().trim() != '') {
			  		$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helppelanggan').html('CONTACT PERSON : ' + json['data'][0].contact_person.toUpperCase() + '<br/>TELEPON : ' + json['data'][0].telepon );
							$('#hididpelanggan').val(json['data'][0].idpelanggan);
							$('#helppelanggan').show();
							
						} else {
							alert('Kode pelanggan tidak ditemukan');
							$('#helppelanggan').hide();
						}
			  		});
			  	} else { alert('Kode pelanggan harus diisi'); $('#helppelanggan').hide(); }
			}
		});";

	// LOAD PELANGGAN 
  	$data['js'] .= "
  	$('#loadlinkpelanggan').on('click', function(e) {
  		e.preventDefault();
  		if($('#namapelanggan').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helppelanggan').html('CONTACT PERSON : ' + json['data'][0].contact_person.toUpperCase() + '<br/>TELEPON : ' + json['data'][0].telepon );
					$('#hididpelanggan').val(json['data'][0].idpelanggan);
					$('#helppelanggan').show();
					
				} else {
					alert('Kode pelanggan tidak ditemukan');
					$('#helppelanggan').hide();
				}
	  		});
	  	} else { alert('Kode pelanggan harus diisi'); $('#helppelanggan').hide(); }
  	});
  	";


  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      namapelanggan: {
		        required: true
		      },
		      nominal: {
		        required: true
		      },
		      tanggaljual: {
		        required: true
		      },
		      koderekening: {
		        required: true
		      }
		    },
		    messages: {
		      nomor_nota: {
		        required: 'Harus diisi'
		      },
		      namapelanggan: {
		        required: 'Harus diisi'
		      },
		      nominal: {
		        required: 'Harus diisi'
		      },
		      tanggaljual: {
		        required: 'Harus diisi'
		      },
		      koderekening: {
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
  	$data['js'] .= "$('#nominal').on('keypress', function(e) {
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
  	 $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

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
    title: 'Data pembayaran hutang berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembayaran hutang berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembayaran hutang berhasil dihapus.'
  });
    	";
    	}

    //  CARI NOTA
    $data['js'] .= "
		$('#modal-lg-nota').on('shown.bs.modal', function () {
		    $('#carinota').focus();
		});

		$('#carinota').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchnotafree')."', { cari:term }, function(data) {
	  			
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
							tableserupa += '<td>H' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].pelanggannama.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + numberWithCommas(json['data'][i].nominal) + '</td>';
							tableserupa += '<td><a href=\'".base_url('hutangpiutang/tambahhutang?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
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

    //  CARI REKENING
    $data['js'] .= "
		$('#modal-lg-rekening').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening').val(kode);
	  		$('#hididrekening').val(id);
	  		$('#helprekening').html('NO. REKENING :' + nomor);  		
	  		$('#helprekening').append('<br/>BANK       :' + bank.toUpperCase());
	  		$('#helprekening').show();
	  		$('#modal-lg-rekening').modal('hide');
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchrekeningfree')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnomor=\'' + json['data'][i].nomor + '\' pilihbank=\'' + json['data'][i].bank + '\' pilihid=\'' + json['data'][i].idrekening + '\' class=\'btn btnpilihrekening btn-primary btn-sm\'>PILIH</button></td>';
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

  	// CARI PELANGGAN
  	$data['js'] .= "
  	$('#modal-lg').on('shown.bs.modal', function () {
		    $('#cari').focus();
		});

  	$(document).on('click', '.btnpilih', function() {
  		var id = $(this).attr('pilihid');
  		var kode = $(this).attr('pilihkode');
  		var contact_personn = $(this).attr('pilihcontact');
  		var telepon = $(this).attr('pilihtelepon');
  		$('#namapelanggan').val(kode.toUpperCase());
  		$('#hididpelanggan').val(id);
  		$('#helppelanggan').html('CONTACT PERSON :' + contact_personn.toUpperCase());  		
  		$('#helppelanggan').append('<br/>TELEPON       :' + telepon);
  		$('#helppelanggan').show();
  		$('#modal-lg').modal('hide');

  	});

  	$('#cari').on('keyup change keydown focus', function() {
  		var term = $(this).val();

  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchpelanggan')."', { cari:term }, function(data) {
	  			var json = JSON.parse(data);
	  			if(json['data'].length > 0) {
						var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].contact_person.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].telepon.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].idpelanggan + '\' pilihkode=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilpelanggan').html(tableserupa); }
						else { $('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
					}
	  		});
	  	}
  	});
  	";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('hutangpiutang/v_tambah_hutang', $data);
		$this->load->view('v_footer', $data);
  }

  public function tambahpiutang() {
  	$data = array();

  	if($this->input->post('nomor_nota')) {
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggaljual'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {
				$dataupdate = array(
		  			'idpelanggan' => $this->input->post('hididpelanggan'),
		  			'tanggal' => $djual,
	  				'nominal' => $this->input->post('nominal'),
		  			'idrekening' => $this->input->post('hididrekening'),
		  			'idkurs' => $this->input->post('idkurs'),
		  			'keterangan' => $this->input->post('keterangan')
		  		);
	  			
	  			$this->hutang_piutang_model->doUpdate($this->input->post('nomor_nota'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('hutangpiutang/tambahpiutang?id='.$this->input->post('nomor_nota'));

			} else {
				 
			$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'idrekening' => $this->input->post('hididrekening'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'jenis' => 'piutang',
	  			'keterangan' => $this->input->post('keterangan'),
	  			'status' => 'active'
	  		);


	  		$this->hutang_piutang_model->doInsert($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('hutangpiutang/tambahpiutang');
		}		  		
  		
  	}

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->hutang_piutang_model->getAll($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('hutangpiutang/tambahpiutang'); }
  		$data['editpelanggan'] = $this->pelanggan_model->getAll($data['editnota'][0]->idpelanggan);
  		$data['editrekening'] = $this->rekening_model->getAll($data['editnota'][0]->idrekening);
  	}

  	$data['kurs'] = $this->kurs_model->getAll();
  	$data['lastid'] = $this->hutang_piutang_model->getCountAll();


  	// DATE PICKER & SETUP TOAST
  	$data['js'] .= "
			//Date range picker
			$('#tanggaljual').datetimepicker({
	        format: 'DD MMMM YYYY', ignoreReadonly: true
	    });

	    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

	    $('.tanggaljual').on('keypress', function(e) {
			var keyCode = (e.keyCode ? e.keyCode : e.which);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
		    }		    
		});

		$('.tanggaljual').on('focus', function() {
			var a = $(this).val().split(' ');
			var b = months.indexOf(a[1]) + 1;
			if(b < 10) {
				$(this).val(a[0] + '/0' + b + '/' + a[2]);	
			} else {				
				$(this).val(a[0] + '/' +  b + '/' + a[2]);
			}		
		});

		$('.tanggaljual').on('change', function() {
			var tgljual = $(this).val();
			var y = tgljual.substr(6,10);
			var m = parseInt(tgljual.substr(3,5));
			var d = tgljual.substr(0,2);
			$(this).val(d + ' ' + months[m-1] + ' ' + y);
		});

		$('.tanggaljual').on('blur', function() {
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
  	// TEKAN ENTER DI REKENING
	$data['js'] .= "
		$('#koderekening').on('keydown change blur', function(e) {

			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening').val().trim() != '') {
			  		$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota: $('#koderekening').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
							$('#hididrekening').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";

  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		e.preventDefault();
  		if($('#formtmabahhutang').valid()) {
	  		// CEK KODE PELANGGAN
			$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
				var json = JSON.parse(data);
					if(json['data'].length > 0) {
						// CEK KODE REKENING
						$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota : $('#koderekening').val() },function(data) {
							var json = JSON.parse(data);
								if(json['data'].length > 0) {
									$('#formtmabahhutang').submit();
								} else {
									Toast.fire({
								    icon: 'error',
								    title: 'Gagal simpan karena kode rekening tidak ditemukan'
								  });
								}
							});
					} else {
						Toast.fire({
					    icon: 'error',
					    title: 'Gagal simpan karena kode pelanggan tidak ditemukan'
					  });
					}
				});
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('hutangpiutang/tambahpiutang?id=')."' + $('#nomor_nota').val());
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
			  		$.post('".base_url('hutangpiutang/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('hutangpiutang/tambahpiutang?id=')."' + $('#nomor_nota').val());
						} else { alert('Nomor nota tidak ditemukan'); }
			  		});
			  	} else { alert('Nomor nota harus diisi'); }
			}
		});";

	
  	// LOAD REKENING 
  	$data['js'] .= "
  	$('#loadlinkrekening').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota: $('#koderekening').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
					$('#hididrekening').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	

  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahhutang').valid()) {
	  			e.preventDefault();
	  			$.post('".base_url('hutangpiutang/searchnota')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {

	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {
	  					// CEK KODE PELANGGAN
						$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
							var json = JSON.parse(data);
								if(json['data'].length > 0) {
									
									// CEK KODE REKENING
									$.post('".base_url('hutangpiutang/searchrekeningkode')."', { nomor_nota : $('#koderekening').val() },function(data) {
										var json = JSON.parse(data);
											if(json['data'].length > 0) {
												$('#formtmabahhutang').submit();
											} else {
												Toast.fire({
											    icon: 'error',
											    title: 'Gagal simpan karena kode rekening tidak ditemukan'
											  });
											}
										});
								} else {
									Toast.fire({
								    icon: 'error',
								    title: 'Gagal simpan karena kode pelanggan tidak ditemukan'
								  });
								}
							});
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}

  	// TEKAN ENTER DI PELANGGAN
	$data['js'] .= "
		$('#namapelanggan').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#namapelanggan').val().trim() != '') {
			  		$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helppelanggan').html('CONTACT PERSON : ' + json['data'][0].contact_person.toUpperCase() + '<br/>TELEPON : ' + json['data'][0].telepon );
							$('#hididpelanggan').val(json['data'][0].idpelanggan);
							$('#helppelanggan').show();
							
						} else {
							alert('Kode pelanggan tidak ditemukan');
							$('#helppelanggan').hide();
						}
			  		});
			  	} else { alert('Kode pelanggan harus diisi'); $('#helppelanggan').hide(); }
			}
		});";

	// LOAD PELANGGAN 
  	$data['js'] .= "
  	$('#loadlinkpelanggan').on('click', function(e) {
  		e.preventDefault();
  		if($('#namapelanggan').val().trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helppelanggan').html('CONTACT PERSON : ' + json['data'][0].contact_person.toUpperCase() + '<br/>TELEPON : ' + json['data'][0].telepon );
					$('#hididpelanggan').val(json['data'][0].idpelanggan);
					$('#helppelanggan').show();
					
				} else {
					alert('Kode pelanggan tidak ditemukan');
					$('#helppelanggan').hide();
				}
	  		});
	  	} else { alert('Kode pelanggan harus diisi'); $('#helppelanggan').hide(); }
  	});
  	";


  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      namapelanggan: {
		        required: true
		      },
		      nominal: {
		        required: true
		      },
		      tanggaljual: {
		        required: true
		      },
		      koderekening: {
		        required: true
		      }
		    },
		    messages: {
		      nomor_nota: {
		        required: 'Harus diisi'
		      },
		      namapelanggan: {
		        required: 'Harus diisi'
		      },
		      nominal: {
		        required: 'Harus diisi'
		      },
		      tanggaljual: {
		        required: 'Harus diisi'
		      },
		      koderekening: {
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
  	$data['js'] .= "$('#nominal').on('keypress', function(e) {
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
  	 $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

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
    title: 'Data pembayaran piutang berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembayaran piutang berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembayaran piutang berhasil dihapus.'
  });
    	";
    	}

    //  CARI NOTA
    $data['js'] .= "
		$('#modal-lg-nota').on('shown.bs.modal', function () {
		    $('#carinota').focus();
		});

		$('#carinota').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchnotafree')."', { cari:term, jenis:'piutang' }, function(data) {
	  			
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
							tableserupa += '<td>P' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].pelanggannama.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + numberWithCommas(json['data'][i].nominal) + '</td>';
							tableserupa += '<td><a href=\'".base_url('hutangpiutang/tambahpiutang?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
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

    //  CARI REKENING
    $data['js'] .= "
		$('#modal-lg-rekening').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening').val(kode);
	  		$('#hididrekening').val(id);
	  		$('#helprekening').html('NO. REKENING :' + nomor);  		
	  		$('#helprekening').append('<br/>BANK       :' + bank.toUpperCase());
	  		$('#helprekening').show();
	  		$('#modal-lg-rekening').modal('hide');
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchrekeningfree')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnomor=\'' + json['data'][i].nomor + '\' pilihbank=\'' + json['data'][i].bank + '\' pilihid=\'' + json['data'][i].idrekening + '\' class=\'btn btnpilihrekening btn-primary btn-sm\'>PILIH</button></td>';
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

  	// CARI PELANGGAN
  	$data['js'] .= "
  	$('#modal-lg').on('shown.bs.modal', function () {
		    $('#cari').focus();
		});

  	$(document).on('click', '.btnpilih', function() {
  		var id = $(this).attr('pilihid');
  		var kode = $(this).attr('pilihkode');
  		var contact_personn = $(this).attr('pilihcontact');
  		var telepon = $(this).attr('pilihtelepon');
  		$('#namapelanggan').val(kode.toUpperCase());
  		$('#hididpelanggan').val(id);
  		$('#helppelanggan').html('CONTACT PERSON :' + contact_personn.toUpperCase());  		
  		$('#helppelanggan').append('<br/>TELEPON       :' + telepon);
  		$('#helppelanggan').show();
  		$('#modal-lg').modal('hide');

  	});

  	$('#cari').on('keyup change keydown focus', function() {
  		var term = $(this).val();

  		if(term.trim() != '') {
	  		$.post('".base_url('hutangpiutang/searchpelanggan')."', { cari:term }, function(data) {
	  			var json = JSON.parse(data);
	  			if(json['data'].length > 0) {
						var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].contact_person.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].telepon.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].idpelanggan + '\' pilihkode=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilpelanggan').html(tableserupa); }
						else { $('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
					}
	  		});
	  	}
  	});
  	";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('hutangpiutang/v_tambah_piutang', $data);
		$this->load->view('v_footer', $data);
  }
	
	//AJAX CALL
	public function searchpelanggan() {
		$where = ' (pelanggan.nama LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.contact_person LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.alamat LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.telepon LIKE "%'.$this->input->post('cari').'%") ';

		$hasil = $this->pelanggan_model->getAll('', $where,10);
		echo json_encode(array('data' => $hasil));
	}

	public function searchpelanggankode() {
		$hasil = $this->pelanggan_model->getKodeAll($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}


	public function searchnota() {
		$hasil = $this->hutang_piutang_model->getAll($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafree() {
		if($this->input->post('jenis') !== null) {
			$hasil = $this->hutang_piutang_model->getAllFree( $this->input->post('cari'), ' hutangpiutang.jenis = "piutang" ');
		} else {
			$hasil = $this->hutang_piutang_model->getAllFree( $this->input->post('cari'));
		}
		
		echo json_encode(array('data' => $hasil));
	}

	public function searchrekeningfree() {
		$hasil = $this->rekening_model->getAll(''," (nomor LIKE '%".$this->input->post('cari')."%' OR bank LIKE '%".$this->input->post('cari')."%' OR kode LIKE '%".$this->input->post('cari')."%') ");
		echo json_encode(array('data' => $hasil));
	}	

	public function searchrekeningkode() {
		$hasil = $this->rekening_model->getKodeAll($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function del($nomor_nota, $jenis) {
		$this->hutang_piutang_model->doDel($nomor_nota);
		$this->session->set_flashdata('del_msg', true);
		if($jenis == 'hutang') {
			redirect('hutangpiutang/lihathutang');
		} else {
			redirect('hutangpiutang/lihatpiutang');
		}
	}

}
