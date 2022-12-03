<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksibank extends CI_Controller {

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
		if(strtoupper(substr($cari,0,2)) == 'KM') {
			$cari = substr($cari, 2, strlen($cari)-2);
		} else if(strtoupper(substr($cari,0,2)) == 'KK') {
			$cari = substr($cari, 2, strlen($cari)-2);
		} 

		$wherejenis ='';
		if($this->input->get('jenis_transaksi') != 'semua') {
			$wherejenis = ' AND transaksi_bank.jenis_transaksi ="'.$this->input->get('jenis_transaksi').'" ';
		}
	
		$data['penjualan'] = $this->transaksi_bank_model->getAll('', '(transaksi_bank.idtransfer LIKE "%'.$cari.'%" OR r1.nomor LIKE "%'.$cari.'%" OR r1.bank LIKE "%'.$cari.'%" OR r1.kode LIKE "%'.$cari.'%" OR r2.nomor LIKE "%'.$cari.'%" OR r2.bank LIKE "%'.$cari.'%" OR r2.kode LIKE "%'.$cari.'%" ) '.$wherejenis.' AND (transaksi_bank.tanggal >= "'.$dtanggal.'" AND transaksi_bank.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->transaksi_bank_model->getAll('', 'transaksi_bank.tanggal >= "'.date('Y-m-01').'" AND transaksi_bank.jenis_transaksi="masuk" AND transaksi_bank.tanggal <= "'.date('Y-m-d').'" ');
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
    title: 'Data transaksi berhasil dihapus.'
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
		$this->load->view('transaksibank/v_lihat_masuk', $data);
		$this->load->view('v_footer', $data);
  }

  public function tambahmasuk() {
  	$data = array();

  	if($this->input->post('idtransfer')) {
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggal'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {

				$dataupdate = array(
		  		'idrekening_asal' => $this->input->post('idrekening_asal'),
	  			'idrekening_tujuan' => $this->input->post('idrekening_tujuan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'keterangan_asal' => $this->input->post('keterangan_asal'),
	  			'keterangan_tujuan' => $this->input->post('keterangan_tujuan'),
		  		);
	  			
	  			$this->transaksi_bank_model->doUpdate($this->input->post('idtransfer'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('transaksibank/tambahmasuk?id='.$this->input->post('idtransfer'));

			} else {
				 
			$datainsert = array(
	  			'idtransfer' => $this->input->post('idtransfer'),
	  			'idrekening_asal' => $this->input->post('idrekening_asal'),
	  			'idrekening_tujuan' => $this->input->post('idrekening_tujuan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'keterangan_asal' => $this->input->post('keterangan_asal'),
	  			'keterangan_tujuan' => $this->input->post('keterangan_tujuan'),
	  			'jenis_transaksi' => 'masuk',
	  			'status' => 'active'
	  		);


	  		$this->transaksi_bank_model->doInsert($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transaksibank/tambahmasuk');
		}		  		
  		
  	}


  	$data['lastid'] = $this->transaksi_bank_model->getCountAll();

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transaksi_bank_model->getAll($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('transaksibank/tambahmasuk'); }
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
  			// cek rekening asal dan tujuan

	  		$('#formtmabahhutang').submit();
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#idtransfer').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchnota')."', { idtransfer: $('#idtransfer').val() }, function(data) {
	  			var json = JSON.parse(data);
					if(json['data'].length > 0) {
						window.location.replace('".base_url('transaksibank/tambahmasuk?id=')."' + $('#idtransfer').val());
					} else { alert('Nomor nota tidak ditemukan'); }
	  		});
	  	} else { alert('Nomor nota harus diisi'); }
  	});
  	";

  	// TEKAN ENTER DI NOMOR NOTA
	$data['js'] .= "
		$('#idtransfer').on('keydown', function(e) {
			if(e.keyCode == 13) { 
				e.preventDefault();
				if($('#idtransfer').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchnota')."', { idtransfer: $('#idtransfer').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transaksibank/tambahmasuk?id=')."' + $('#idtransfer').val());					
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
	  			$.post('".base_url('transaksibank/searchnota')."', {idtransfer:$('#idtransfer').val() }, function(data) {

	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {
	  					// cek rekening asal dan tujuan
	  					$.post('".base_url('transaksibank/searchrekening')."', {cari: $('#koderekening_asal').val() }, function(data) {
	  						var json = JSON.parse(data);
	  							if(json['result'] == 'valid') {
	  								var idrekening = json['data'][0].idrekening;
	  								$('#idrekening_asal').val(idrekening);
	  								$.post('".base_url('transaksibank/searchrekening')."', {cari: $('#koderekening_tujuan').val() }, function(data) {
				  						var json = JSON.parse(data);
				  							if(json['result'] == 'valid') {
				  								var idrekening = json['data'][0].idrekening;
	  											$('#idrekening_tujuan').val(idrekening);
				  								$('#formtmabahhutang').submit();
				  							} else {
				  								alert('Kode rekening tujuan tidak valid');
				  							}
				  					});
	  							} else {
	  								alert('Kode rekening asal tidak valid');
	  							}
	  					});
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}

  	// LOAD REKENING 
  	$data['js'] .= "
  	$('#loadlinkrekening').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening_asal').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_asal').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
					$('#idrekening_asal').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	// TEKAN ENTER DI REKENING
	$data['js'] .= "
		$('#koderekening_asal').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening_asal').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_asal').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
							$('#idrekening_asal').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";

		// LOAD REKENING TUJUAN
  	$data['js'] .= "
  	$('#loadlinkrekeningtujuan').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening_tujuan').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_tujuan').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
					$('#idrekening_tujuan').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	// TEKAN ENTER DI REKENING TUJUAN
	$data['js'] .= "
		$('#koderekening_tujuan').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening_tujuan').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_tujuan').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
							$('#idrekening_tujuan').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";

  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      idtransaksi: {
		        required: true
		      },
		      tanggal: {
		        required: true
		      },
		      koderekening_asal: {
		        required: true
		      },		      
		      koderekening_tujuan: {
		        required: true
		      },
		      nominal: {
		        required: true
		      }
		    },
		    messages: {
		      idtransaksi: {
		        required: 'Harus diisi'
		      },
		      tanggal: {
		        required: 'Harus diisi'
		      },
		      koderekening_asal: {
		        required: 'Harus diisi'
		      },		      
		      koderekening_tujuan: {
		        required: 'Harus diisi'
		      },
		      nominal: {
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
    title: 'Data transaksi masuk berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transaksi masuk berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transaksi masuk berhasil dihapus.'
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
	  		$.post('".base_url('transaksibank/searchnotafree')."', { cari:term, jenis:'masuk' }, function(data) {
	  			
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
							tableserupa += '<td>KM' + json['data'][i].idtransfer.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].rekeningkode.toUpperCase() + '(' + json['data'][i].rekeningbank.toUpperCase() + ')' + '</td>';
							tableserupa += '<td>' + json['data'][i].rekeningkodetujuan.toUpperCase() + '(' + json['data'][i].rekeningbanktujuan.toUpperCase() + ')' + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + numberWithCommas(json['data'][i].nominal) + '</td>';
							tableserupa += '<td><a href=\'".base_url('transaksibank/tambahmasuk?id=')."' + json['data'][i].idtransfer + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
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

    //  CARI REKENING ASAL
    $data['js'] .= "
		$('#modal-lg-rekening').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening_asal').val(kode);
	  		$('#idrekening_asal').val(id);
	  		$('#modal-lg-rekening').modal('hide');
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningfree')."', { cari:term }, function(data) {
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

    //  CARI REKENING TUJUAN
    $data['js'] .= "
		$('#modal-lg-rekening-tujuan').on('shown.bs.modal', function () {
		    $('#carirekeningtujuan').focus();
		});

		$(document).on('click', '.btnpilihrekeningtujuan', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening_tujuan').val(kode);
	  		$('#idrekening_tujuan').val(id);
	  		$('#modal-lg-rekening-tujuan').modal('hide');
	  	});

		$('#carirekeningtujuan').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningfree')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnomor=\'' + json['data'][i].nomor + '\' pilihbank=\'' + json['data'][i].bank + '\' pilihid=\'' + json['data'][i].idrekening + '\' class=\'btn btnpilihrekeningtujuan btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarirekeningtujuan').html(tableserupa); }
						else { $('#tabelhasilcarirekeningtujuan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarirekeningtujuan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transaksibank/v_tambah_masuk', $data);
		$this->load->view('v_footer', $data);
  }

  public function tambahkeluar() {
  	$data = array();

  	if($this->input->post('idtransfer')) {
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggal'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
			
			if($this->input->post('editmode')) {

				$dataupdate = array(
		  		'idrekening_asal' => $this->input->post('idrekening_asal'),
	  			'idrekening_tujuan' => $this->input->post('idrekening_tujuan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'keterangan_asal' => $this->input->post('keterangan_asal'),
	  			'keterangan_tujuan' => $this->input->post('keterangan_tujuan'),
		  		);
	  			
	  			$this->transaksi_bank_model->doUpdate($this->input->post('idtransfer'), $dataupdate);
	  			$this->session->set_flashdata('update_msg', true);
	  			redirect('transaksibank/tambahkeluar?id='.$this->input->post('idtransfer'));

			} else {
				 
			$datainsert = array(
	  			'idtransfer' => $this->input->post('idtransfer'),
	  			'idrekening_asal' => $this->input->post('idrekening_asal'),
	  			'idrekening_tujuan' => $this->input->post('idrekening_tujuan'),
	  			'tanggal' => $djual,
	  			'nominal' => $this->input->post('nominal'),
	  			'keterangan_asal' => $this->input->post('keterangan_asal'),
	  			'keterangan_tujuan' => $this->input->post('keterangan_tujuan'),
	  			'jenis_transaksi' => 'keluar',
	  			'status' => 'active'
	  		);


	  		$this->transaksi_bank_model->doInsert($datainsert);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transaksibank/tambahkeluar');
		}		  		
  		
  	}

  	$data['lastid'] = $this->transaksi_bank_model->getCountAll();

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transaksi_bank_model->getAll($this->input->get('id'));
  		if(count($data['editnota']) == 0) { redirect('transaksibank/tambahkeluar'); }
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
  		if($('#idtransfer').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchnota')."', { idtransfer: $('#idtransfer').val() }, function(data) {
	  			var json = JSON.parse(data);
					if(json['data'].length > 0) {
						window.location.replace('".base_url('transaksibank/tambahkeluar?id=')."' + $('#idtransfer').val());
					} else { alert('Nomor nota tidak ditemukan'); }
	  		});
	  	} else { alert('Nomor nota harus diisi'); }
  	}); 
  	";

  	// TEKAN ENTER DI NOMOR NOTA
	$data['js'] .= "
		$('#idtransfer').on('keydown', function(e) {
			if(e.keyCode == 13) { 
				e.preventDefault();
				if($('#idtransfer').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchnota')."', { idtransfer: $('#idtransfer').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transaksibank/tambahkeluar?id=')."' + $('#idtransfer').val());					
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
	  			$.post('".base_url('transaksibank/searchnota')."', {idtransfer:$('#idtransfer').val() }, function(data) {

	  				console.log(data);
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {
	  					// cek rekening asal dan tujuan
	  					$.post('".base_url('transaksibank/searchrekening')."', {cari: $('#koderekening_asal').val() }, function(data) {
	  						var json = JSON.parse(data);
	  							if(json['result'] == 'valid') {
	  								var idrekening = json['data'][0].idrekening;
	  								$('#idrekening_asal').val(idrekening);
	  								$.post('".base_url('transaksibank/searchrekening')."', {cari: $('#koderekening_tujuan').val() }, function(data) {
				  						var json = JSON.parse(data);
				  							if(json['result'] == 'valid') {
				  								var idrekening = json['data'][0].idrekening;
	  											$('#idrekening_tujuan').val(idrekening);
				  								$('#formtmabahhutang').submit();
				  							} else {
				  								alert('Kode rekening tujuan tidak valid');
				  							}
				  					});
	  							} else {
	  								alert('Kode rekening asal tidak valid');
	  							}
	  					});
	  				}
	  			});
	  	}
	  	
  	});
  	";

  	}


  		// LOAD REKENING 
  	$data['js'] .= "
  	$('#loadlinkrekening').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening_asal').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_asal').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
					$('#idrekening_asal').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	// TEKAN ENTER DI REKENING
	$data['js'] .= "
		$('#koderekening_asal').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening_asal').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_asal').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
							$('#idrekening_asal').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";

		// LOAD REKENING TUJUAN
  	$data['js'] .= "
  	$('#loadlinkrekeningtujuan').on('click', function(e) {
  		e.preventDefault();
  		if($('#koderekening_tujuan').val().trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_tujuan').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
					$('#idrekening_tujuan').val(json['data'][0].idrekening);
					$('#helprekening').show();
					
				} else {
					alert('Kode rekening tidak ditemukan');
					$('#helprekening').hide();
				}
	  		});
	  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
  	});
  	";

  	// TEKAN ENTER DI REKENING TUJUAN
	$data['js'] .= "
		$('#koderekening_tujuan').on('keydown change', function(e) {
			if(e.keyCode == 13 || e.type == 'change') { 
				e.preventDefault();
				if($('#koderekening_tujuan').val().trim() != '') {
			  		$.post('".base_url('transaksibank/searchrekeningkode')."', { nomor_nota: $('#koderekening_tujuan').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#helprekening').html('NO. REKENING : ' + json['data'][0].nomor + '<br/>BANK : ' + json['data'][0].bank );
							$('#idrekening_tujuan').val(json['data'][0].idrekening);
							$('#helprekening').show();
							
						} else {
							alert('Kode rekening tidak ditemukan');
							$('#helprekening').hide();
						}
			  		});
			  	} else { alert('Kode rekening harus diisi'); $('#helprekening').hide(); }
			}
		});";
  	
  	$data['js'] .= "
  	$('#formtmabahhutang').validate({
		    rules: {
		      idtransaksi: {
		        required: true
		      },
		      tanggal: {
		        required: true
		      },
		      koderekening_asal: {
		        required: true
		      },
		      koderekening_tujuan: {
		        required: true
		      },
		      nominal: {
		        required: true
		      }
		    },
		    messages: {
		      idtransaksi: {
		        required: 'Harus diisi'
		      },
		      tanggal: {
		        required: 'Harus diisi'
		      },
		      koderekening_asal: {
		        required: 'Harus diisi'
		      },
		      koderekening_tujuan: {
		        required: 'Harus diisi'
		      },
		      nominal: {
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
    title: 'Data transaksi keluar berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transaksi keluar berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data transaksi keluar berhasil dihapus.'
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
	  		$.post('".base_url('transaksibank/searchnotafree')."', { cari:term, jenis:'keluar' }, function(data) {
	  			
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
							tableserupa += '<td>KK' + json['data'][i].idtransfer.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].rekeningkode.toUpperCase() + '(' + json['data'][i].rekeningbank.toUpperCase() + ')' + '</td>';
							tableserupa += '<td>' + json['data'][i].rekeningkodetujuan.toUpperCase() + '(' + json['data'][i].rekeningbanktujuan.toUpperCase() + ')' + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + numberWithCommas(json['data'][i].nominal) + '</td>';
							tableserupa += '<td><a href=\'".base_url('transaksibank/tambahkeluar?id=')."' + json['data'][i].idtransfer + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
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

    //  CARI REKENING ASAL
    $data['js'] .= "
		$('#modal-lg-rekening').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening_asal').val(kode);
	  		$('#idrekening_asal').val(id);
	  		$('#modal-lg-rekening').modal('hide');
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningfree')."', { cari:term }, function(data) {
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

    //  CARI REKENING TUJUAN
    $data['js'] .= "
		$('#modal-lg-rekening-tujuan').on('shown.bs.modal', function () {
		    $('#carirekeningtujuan').focus();
		});

		$(document).on('click', '.btnpilihrekeningtujuan', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var bank = $(this).attr('pilihbank');
	  		var nomor = $(this).attr('pilihnomor');
	  		$('#koderekening_tujuan').val(kode);
	  		$('#idrekening_tujuan').val(id);
	  		$('#modal-lg-rekening-tujuan').modal('hide');
	  	});

		$('#carirekeningtujuan').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('transaksibank/searchrekeningfree')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nomor.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].bank.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnomor=\'' + json['data'][i].nomor + '\' pilihbank=\'' + json['data'][i].bank + '\' pilihid=\'' + json['data'][i].idrekening + '\' class=\'btn btnpilihrekeningtujuan btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarirekeningtujuan').html(tableserupa); }
						else { $('#tabelhasilcarirekeningtujuan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarirekeningtujuan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
		  			}
	  			});
	  		}
  		});
    ";

  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('transaksibank/v_tambah_keluar', $data);
		$this->load->view('v_footer', $data);
  }

	//AJAX CALL
	public function searchnota() {
		$hasil = $this->transaksi_bank_model->getAll($this->input->post('idtransfer'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafree() {
		$hasil = $this->transaksi_bank_model->getAllFree( $this->input->post('cari'), ' transaksi_bank.jenis_transaksi = "'.$this->input->post('jenis').'" ');
			
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

	public function searchrekening() {
		$hasil = $this->rekening_model->getKodeAll($this->input->post('cari'));
		if(count($hasil) >0) {
			echo json_encode(array('result' => 'valid', 'data' => $hasil));
		} else {
			echo json_encode(array('result' => 'invalid'));
		}
	}

	public function del($nomor_nota) {
		$this->transaksi_bank_model->doDel($nomor_nota);
		$this->session->set_flashdata('del_msg', true);
		redirect('transaksibank/lihat');
		
	}

}
