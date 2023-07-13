<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

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

  public function cetakbukubank() {
  	$data = array();
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			$data['rekening'] = $this->rekening_model->getKodeAll($this->input->get('idrekening'));  		
  		$data['result'] = $this->laporan_model->getBukuBank($data['rekening'][0]->idrekening, $dtanggal, $duntil);

  			$data['saldoawal'] = $this->laporan_model->getSaldoAwal($data['rekening'][0]->idrekening, $dtanggal);	
  		
  	} else {
  		redirect('laporan/bukubank');
  	}

  	$this->load->view('laporan/v_cetak_buku_bank', $data);
  }

  public function bukubank() {
  	$data = array();

  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			$data['rekening'] = $this->rekening_model->getKodeAll($this->input->get('idrekening'));  	
			if(count($data['rekening']) ==0) {
				$this->session->set_flashdata('msg', true);
				redirect('laporan/bukubank');
			}

  		$data['result'] = $this->laporan_model->getBukuBank($data['rekening'][0]->idrekening, $dtanggal, $duntil);
  			$data['saldoawal'] = $this->laporan_model->getSaldoAwal($data['rekening'][0]->idrekening, $dtanggal);	
  		
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

		 var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  	// BTN QUICK SUBMIT
  	$data['js'] .= "
  	$('#btnquicksubmit').on('click', function(e){
  		if($('#idrekening').val() == '') {
  			e.preventDefault();
  		}
  	});
  	";


  	// SWEET ALERT
    	if($this->session->flashdata('msg')) { 
    	$data['js'] .= "
  Toast.fire({
						    icon: 'error',
						    title: 'Kode rekening tidak ditemukan'
						  });
    	";
    	}

  	// DATA TABLE
		$data['js'] .= "
		function toFixed(value, precision) {
		    var precision = precision || 0,
		        power = Math.pow(10, precision),
		        absValue = Math.abs(Math.round(value * power)),
		        result = (value < 0 ? '-' : '') + String(Math.floor(absValue / power));

		    if (precision > 0) {
		        var fraction = String(absValue % power),
		            padding = new Array(Math.max(precision - fraction.length, 0) + 1).join('0');
		        result += '.' + padding + fraction;
		    }
		    return result;
		}

			function numberWithCommas(x) {
			    x = x.toString();
			    var pattern = /(-?\d+)(\d{3})/;
			    while (pattern.test(x))
			        x = x.replace(pattern, \"$1.$2\");
			    return x;
			}

			$('#example2').DataTable({
			  'paging': true,
			  'lengthChange': true,
			  'searching': true,
			  'pageLength': 25,
			  lengthMenu: [
	            [10, 25, 50, 100,-1],
	            [10, 25, 50, 100,'All'],
	        ],
			  'ordering': false,
			  'info': true,
			  'autoWidth': false,
			  'responsive': false, 
			  'footerCallback': function(row, data, start, end, display) {
		    	  var api = this.api();
				 
				  api.columns('.sum', {
				    page: 'current'
				  }).every(function() {
				    var sum = this
				      .data()
				      .reduce(function(a, b) {
				        var x = parseFloat(a) || 0;
				        var y = parseFloat(b.toString().replace(new RegExp(\"[.]\",\"g\"), '').replace(',','.')) || 0;
				        console.log(x + '+' + y + '=' + (x+y));
				        return x + y;
				      }, 0);
				      var hasil = toFixed(sum,2).toString().replace('.',',');

				    $(this.footer()).html(numberWithCommas(hasil));
				  });
				}
			});";

			// FORM SUBMISSION
		$data['js'] .= "
		$('#idrekening').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formsubmit').submit(); }
			});

		$('#tampil_saldo_awal').on('change', function() {
			$('#formsubmit').submit();
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

				$('#formsubmit').submit();
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

				$('#formsubmit').submit();
			}
		});

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
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
	  		$('#idrekening').val(kode);
	  		$('#inforekening').html('ACC. NO ' + nomor + ' (' + bank + ')');
	  		$('#inforekening').show();
	  		$('#modal-lg-rekening').modal('hide');
	  		 $('#formsubmit').submit();
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('laporan/searchrekeningfree')."', { cari:term }, function(data) {
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



  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('laporan/v_buku_bank', $data);
		$this->load->view('v_footer', $data);
  }

  public function cetakstokbarang() {
  	$data = array();
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			$data['barang'] = $this->barang_model->getKodeAll($this->input->get('idbarang'));  		
  			$data['result'] = $this->laporan_model->getStokBarang($data['barang'][0]->idbarang, $dtanggal, $duntil, $this->input->get('gudang'));
  			$data['result_awal'] = $this->laporan_model->getStokBarangSaldoAwal($data['barang'][0]->idbarang, $dtanggal, $this->input->get('gudang'));
  			if($this->input->get('gudang') != '') {
  				$data['gudang'] = $this->gudang_model->getAll($this->input->get('gudang'));
  			}	

  			$data['saldoawal'] = 0;
  			$data['saldocolly'] = 0;
  			$data['saldojumlah'] = $data['barang'][0]->min_stok;

  			foreach($data['result_awal'] as $key) {
  				if($key->tipetrans == 'JUAL') {
  					if(!empty($key->subtotalkeluar)) {
	  					$data['saldoawal'] += $key->subtotalkeluar;
	  				}
	  				if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'BELI') {
  					if(!empty($key->subtotalmasuk)) {
	  					$data['saldoawal'] -= $key->subtotalmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarmasuk;
	  				}
	  				if(!empty($key->jmlsatuankecilmasuk)) {
	  					$data['saldojumlah'] += $key->jmlsatuankecilmasuk;
	  				}
  				} else if($key->tipetrans == 'RETURBELI') {
  					if(!empty($key->subtotalkeluar)) {
	  					$data['saldoawal'] += $key->subtotalkeluar;
	  				}
	  				if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'RETURJUAL') {
  					if(!empty($key->subtotalmasuk)) {
	  					$data['saldoawal'] -= $key->subtotalmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {	  				
	  					$data['saldojumlah'] += $key->jmlsatuankecilmasuk;
	  				}
  				} else if($key->tipetrans == 'HILANG') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'TRANSKELUAR') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'TRANSMASUK') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] += $key->jmlsatuankecilkeluar;
	  				}
  				} 
  			}		
  		
  	} else {
  		redirect('laporan/stokbarang');
  	}

  	$this->load->view('laporan/v_cetak_stok_barang', $data);
  }

  public function stokbarang() {
  	$data = array();

  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
  		   	//echo $dtanggal; 

			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			//echo '<br/>';
			//echo $duntil;
			//die();
			$data['barang'] = $this->barang_model->getKodeAll($this->input->get('idbarang'));  
			if(count($data['barang']) ==0) {
				$this->session->set_flashdata('msg', true);
				redirect('laporan/stokbarang');
			}		
			
  			$data['result'] = $this->laporan_model->getStokBarang($data['barang'][0]->idbarang, $dtanggal, $duntil, $this->input->get('gudang'));
  			$data['result_awal'] = $this->laporan_model->getStokBarangSaldoAwal($data['barang'][0]->idbarang, $dtanggal, $this->input->get('gudang'));	

  			$data['saldoawal'] = 0;
  			$data['saldocolly'] = 0;
  			$data['saldojumlah'] = $data['barang'][0]->min_stok;

  			foreach($data['result_awal'] as $key) {
  				if($key->tipetrans == 'JUAL') {
  					if(!empty($key->subtotalkeluar)) {
	  					$data['saldoawal'] += $key->subtotalkeluar;
	  				}
	  				if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'BELI') {
  					if(!empty($key->subtotalmasuk)) {
	  					$data['saldoawal'] -= $key->subtotalmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarmasuk;
	  				}
	  				if(!empty($key->jmlsatuankecilmasuk)) {
	  					$data['saldojumlah'] += $key->jmlsatuankecilmasuk;
	  				}
  				} else if($key->tipetrans == 'RETURBELI') {
  					if(!empty($key->subtotalkeluar)) {
	  					$data['saldoawal'] += $key->subtotalkeluar;
	  				}
	  				if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'RETURJUAL') {
  					if(!empty($key->subtotalmasuk)) {
	  					$data['saldoawal'] -= $key->subtotalmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarmasuk;
	  				}
	  				if(!empty($key->jmlsatuanbesarmasuk)) {	  				
	  					$data['saldojumlah'] += $key->jmlsatuankecilmasuk;
	  				}
  				} else if($key->tipetrans == 'HILANG') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'TRANSKELUAR') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankecilkeluar;
	  				}
  				} else if($key->tipetrans == 'TRANSMASUK') {
  					if(!empty($key->jmlsatuanbesarkeluar)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarkeluar;
	  				}
	  				if(!empty($key->jmlsatuankecilkeluar)) {
	  					$data['saldojumlah'] += $key->jmlsatuankecilkeluar;
	  				}
  				} 
  			}	
  		
  	}

  	$data['gudang'] = $this->gudang_model->getAll();

  	

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

		$('.gudang').on('change', function() {
			 $('#formsubmit').submit();
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
		var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  		// BTN QUICK SUBMIT
  	$data['js'] .= "
  	$('#btnquicksubmit').on('click', function(e){
  		if($('#idbarang').val() == '') {
  			e.preventDefault();
  		}
  	});
  	";

  	// SWEET ALERT
    	if($this->session->flashdata('msg')) { 
    	$data['js'] .= "
  Toast.fire({
						    icon: 'error',
						    title: 'Kode barang tidak ditemukan'
						  });
    	";
    	}

  	// DATA TABLE
		$data['js'] .= "
		function toFixed(value, precision) {
		    var precision = precision || 0,
		        power = Math.pow(10, precision),
		        absValue = Math.abs(Math.round(value * power)),
		        result = (value < 0 ? '-' : '') + String(Math.floor(absValue / power));

		    if (precision > 0) {
		        var fraction = String(absValue % power),
		            padding = new Array(Math.max(precision - fraction.length, 0) + 1).join('0');
		        result += '.' + padding + fraction;
		    }
		    return result;
		}

			function numberWithCommas(x) {
			    x = x.toString();
			    var pattern = /(-?\d+)(\d{3})/;
			    while (pattern.test(x))
			        x = x.replace(pattern, \"$1.$2\");
			    return x;
			}

			$('#example2').DataTable({
			  'paging': true,
			  'lengthChange': true,
			  'searching': true,
			  'pageLength': 25,
			  lengthMenu: [
	            [10, 25, 50, 100,-1],
	            [10, 25, 50, 100,'All'],
	        ],
			  'ordering': false,
			  'info': true,
			  'autoWidth': false,
			  'responsive': false,
			  columnDefs: [
		        { responsivePriority: 1, targets: 0 },
		        { responsivePriority: 2, targets: 12 },
		        { responsivePriority: 3, targets: 14 },
		        { responsivePriority: 4, targets: 7 },
		        { responsivePriority: 5, targets: 11 },
		        { responsivePriority: 6, targets: 4 },
		        { responsivePriority: 7, targets: 5 },
		        { responsivePriority: 8, targets: 8 },
		        { responsivePriority: 9, targets: 9 },
		        { responsivePriority: 10, targets: 13 }
		    ],
		    'footerCallback': function(row, data, start, end, display) {
		    	  var api = this.api();
				 
				  api.columns('.sum', {
				    page: 'current'
				  }).every(function() {
				    var sum = this
				      .data()
				      .reduce(function(a, b) {
				        var x = parseFloat(a) || 0;
				        var y = parseFloat(b.toString().replace(new RegExp(\"[.]\",\"g\"), '').replace(',','.')) || 0;
				        console.log(x + '+' + y + '=' + (x+y));
				        return x + y;
				      }, 0);
				      var hasil = toFixed(sum,2).toString().replace('.',',');

				    $(this.footer()).html(numberWithCommas(hasil));
				  });
				}
			});";

			// FORM SUBMISSION
		$data['js'] .= "
		$('#idbarang').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formsubmit').submit(); }
			});

		$('#tampil_saldo_awal').on('change', function() {
			$('#formsubmit').submit();
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

				$('#formsubmit').submit();
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

				$('#formsubmit').submit();
			}
		});

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });
		";

		//  CARI REKENING ASAL
    $data['js'] .= "
		$('#modal-lg-rekening').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var kode = $(this).attr('pilihkode');
	  		var nama = $(this).attr('pilihnama');
	  		$('#idbarang').val(kode);
	  		$('#inforekening').html(nama);
	  		$('#inforekening').show();
	  		$('#modal-lg-rekening').modal('hide');
	  		 $('#formsubmit').submit();
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('laporan/searchbarang')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnama=\'' + json['data'][i].nama + '\'  pilihid=\'' + json['data'][i].idbarang + '\' class=\'btn btnpilihrekening btn-primary btn-sm\'>PILIH</button></td>';
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
		$this->load->view('laporan/v_stok_barang', $data);
		$this->load->view('v_footer', $data);
  }

  public function cetakbukupelanggan() {
  	$data = array();
  		if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
		$data['pelanggan'] = $this->pelanggan_model->getKodeAll($this->input->get('idpelanggan'));  		
  		$data['result'] = $this->laporan_model->getBukuPelanggan($data['pelanggan'][0]->idpelanggan, $dtanggal, $duntil);

  			$data['result_awal'] = $this->laporan_model->getBukuPelangganSaldoAwal($data['pelanggan'][0]->idpelanggan,$dtanggal);
  			$data['saldoawal'] = $data['pelanggan'][0]->saldo_awal;
  			$data['saldocolly'] = 0;
  			$data['saldojumlah'] =0;

  			foreach($data['result_awal'] as $key) {
  				if($key->jenistrans == 'JUAL') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
	  				if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'BELI') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
  					if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				} else if($key->jenistrans == 'RETURJUAL') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
	  				if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				} else if($key->jenistrans == 'RETURBELI') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
	  				if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'TERIMA PIUTANG') {
  					if(!empty($key->jmljual)) {
	  					$data['saldoawal'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'BAYAR HUTANG') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
  				} else if($key->jenistrans == 'JUAL SAHAM') {
  					if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
  				} else if($key->jenistrans == 'BELI SAHAM') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
	  				if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				}
  			}	
  		
  	} else {
  		redirect('laporan/bukupelanggan');
  	}

  	$this->load->view('laporan/v_cetak_buku_pelanggan', $data);
  }

  public function bukupelanggan() {
  	$data = array();

  	if($this->input->get('formsubmit')) {

  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
		$data['pelanggan'] = $this->pelanggan_model->getKodeAll($this->input->get('idpelanggan'));  		
		if(count($data['pelanggan']) ==0) {
			$this->session->set_flashdata('msg', true);
			redirect('laporan/bukupelanggan');
		}

  		$data['result'] = $this->laporan_model->getBukuPelanggan($data['pelanggan'][0]->idpelanggan, $dtanggal, $duntil);

  			$data['result_awal'] = $this->laporan_model->getBukuPelangganSaldoAwal($data['pelanggan'][0]->idpelanggan,$dtanggal);
  			$data['saldoawal'] = $data['pelanggan'][0]->saldo_awal;
  			$data['saldocolly'] = 0;
  			$data['saldojumlah'] =0;

  			foreach($data['result_awal'] as $key) {
  				if($key->jenistrans == 'JUAL') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
	  				if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'BELI') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
  					if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				} else if($key->jenistrans == 'RETURJUAL') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
	  				if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				} else if($key->jenistrans == 'RETURBELI') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
	  				if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'TERIMA PIUTANG') {
  					if(!empty($key->jmljual)) {
	  					$data['saldoawal'] -= $key->jmljual;
	  				}
  				} else if($key->jenistrans == 'BAYAR HUTANG') {
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
  				} else if($key->jenistrans == 'JUAL SAHAM') {
  					if(!empty($key->collyjual)) {
	  					$data['saldocolly'] -= $key->collyjual;
	  				}
	  				if(!empty($key->jmljual)) {
	  					$data['saldojumlah'] -= $key->jmljual;
	  				}
  					if(!empty($key->debit)) {
	  					$data['saldoawal'] += $key->debit;
	  				}
  				} else if($key->jenistrans == 'BELI SAHAM') {
  					if(!empty($key->kredit)) {
	  					$data['saldoawal'] -= $key->kredit;
	  				}
	  				if(!empty($key->collybeli)) {
	  					$data['saldocolly'] += $key->collybeli;
	  				}
	  				if(!empty($key->jmlbeli)) {
	  					$data['saldojumlah'] += $key->jmlbeli;
	  				}
  				}
  			}	
  		
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
			console.log(keyCode);
			if (keyCode >= 47 && keyCode <= 57 )  {
		    	if($(this).val().length ==10) {
		    		e.preventDefault();
		    	}		    	
		    } else {
		    	e.preventDefault();
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

		 var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  		// BTN QUICK SUBMIT
  	$data['js'] .= "
  	$('#btnquicksubmit').on('click', function(e){
  		if($('#idpelanggan').val() == '') {
  			e.preventDefault();
  		}
  	});
  	";

  	// SWEET ALERT
    	if($this->session->flashdata('msg')) { 
    	$data['js'] .= "
  Toast.fire({
						    icon: 'error',
						    title: 'Kode Pelanggan tidak ditemukan'
						  });
    	";
    	}

  	

  	// DATA TABLE
		$data['js'] .= "
			function toFixed(value, precision) {
		    var precision = precision || 0,
		        power = Math.pow(10, precision),
		        absValue = Math.abs(Math.round(value * power)),
		        result = (value < 0 ? '-' : '') + String(Math.floor(absValue / power));

		    if (precision > 0) {
		        var fraction = String(absValue % power),
		            padding = new Array(Math.max(precision - fraction.length, 0) + 1).join('0');
		        result += '.' + padding + fraction;
		    }
		    return result;
		}

			function numberWithCommas(x) {
			    x = x.toString();
			    var pattern = /(-?\d+)(\d{3})/;
			    while (pattern.test(x))
			        x = x.replace(pattern, \"$1.$2\");
			    return x;
			}


			$('#example2').DataTable({
			 'paging': true,
			  'lengthChange': true,
			  'searching': true,
			  'pageLength': 25,
			  lengthMenu: [
	            [10, 25, 50, 100,-1],
	            [10, 25, 50, 100,'All'],
	        ],
			  'ordering': false,
			  'info': true,
			  'autoWidth': false,
			  'responsive': false, 
			  columnDefs: [
		        { responsivePriority: 1, targets: 0 },
		        { responsivePriority: 2, targets: 13 },
		        { responsivePriority: 3, targets: 14 },
		        { responsivePriority: 4, targets: 15 },
		        { responsivePriority: 5, targets: 8 },
		        { responsivePriority: 6, targets: 12 },
		        { responsivePriority: 7, targets: 5 },
		        { responsivePriority: 8, targets: 9 },
		        { responsivePriority: 9, targets: 6 },
		        { responsivePriority: 10, targets: 10 }
		    ],'footerCallback': function(row, data, start, end, display) {
		    	  var api = this.api();
				 
				  api.columns('.sum', {
				    page: 'current'
				  }).every(function() {
				    var sum = this
				      .data()
				      .reduce(function(a, b) {
				        var x = parseFloat(a) || 0;
				        var y = parseFloat(b.toString().replace(new RegExp(\"[.]\",\"g\"), '').replace(',','.')) || 0;
				        console.log(x + '+' + y + '=' + (x+y));
				        return x + y;
				      }, 0);
				      var hasil = toFixed(sum,2).toString().replace('.',',');

				    $(this.footer()).html(numberWithCommas(hasil));
				  });
				}
			});";

			// FORM SUBMISSION
		$data['js'] .= "
		$('#idpelanggan').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formsubmit').submit(); }
			});

		$('#tampil_saldo_awal').on('change', function() {
			$('#formsubmit').submit();
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

				$('#formsubmit').submit();
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

				$('#formsubmit').submit();
			}
		});

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });
		";

	// CARI PELANGGAN
  	$data['js'] .= "
  	$('#modal-lg').on('shown.bs.modal', function () {
		    $('#cari').focus();
		});

  	$(document).on('click', '.btnpilih', function() {
  		var kode = $(this).attr('pilihid');
  		var name = $(this).attr('pilihnama');
  		var contact_personn = $(this).attr('pilihcontact');
  		var telepon = $(this).attr('pilihtelepon');

  		$('#idpelanggan').val(kode);
  		$('#namapelanggan').val(name.toUpperCase());
  		$('#inforekening').html('CONTACT PERSON :' + contact_personn.toUpperCase());  		
  		$('#inforekening').append('<br/>TELEPON       :' + telepon);
  		$('#inforekening').show();
  		$('#modal-lg').modal('hide');
  		$('#formsubmit').submit();

  	});

  	$('#cari').on('keyup change keydown focus', function() {
  		var term = $(this).val();

  		if(term.trim() != '') {
	  		$.post('".base_url('laporan/searchpelanggan')."', { cari:term }, function(data) {
	  			var json = JSON.parse(data);
	  			if(json['data'].length > 0) {
						var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].contact_person.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].telepon.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilpelanggan').html(tableserupa); }
						else { $('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilpelanggan').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
					}
	  		});
	  	}
  	});
  	";



  	$this->load->view('v_header', $data);
		$this->load->view('v_menu', $data);
		$this->load->view('laporan/v_buku_pelanggan', $data);
		$this->load->view('v_footer', $data);
  }

  public function cetaksaham() {
  	$data = array();
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			$data['saham'] = $this->saham_model->getKodeAll($this->input->get('idsaham'));  		
  		$data['result'] = $this->laporan_model->getSaham($data['saham'][0]->idsaham, $dtanggal, $duntil);

		$data['resultawal'] = $this->laporan_model->getSahamSaldoAwal($data['saham'][0]->idsaham, $dtanggal);
		$data['saldoawal'] = 0;
		$data['saldocolly'] = 0;
		$data['saldojumlah'] =0;

		foreach($data['resultawal'] as $key) {
			if($key->jenistrans =='JUAL') {
				if(!empty($key->subtotaljual)) {
					$data['saldoawal'] += $key->subtotaljual;
				}
				if(!empty($key->jmlsatuanbesarjual)) {
					$data['saldocolly'] -= $key->jmlsatuanbesarjual;
				}
				if(!empty($key->jmlsatuankeciljual)) {
					$data['saldojumlah'] -= $key->jmlsatuankeciljual;
				}
			} else if($key->jenistrans == 'BELI') {
				if(!empty($key->subtotalbeli)) {
					$data['saldoawal'] -= $key->subtotalbeli;
				}
				if(!empty($key->jmlsatuanbesarbeli)) {
					$data['saldocolly'] += $key->jmlsatuanbesarbeli;
				}
				if(!empty($key->jmlsatuankecilbeli)) {
					$data['saldojumlah'] += $key->jmlsatuankecilbeli;
				}
			}
		}
  	} else {
  		redirect('laporan/saham');
  	}

  	$this->load->view('laporan/v_cetak_saham', $data);
  }
  
  public function saham() {
  	$data = array();

  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
			$datetempo = explode(" ", $this->input->get('untiltanggal'));
			$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
			$data['saham'] = $this->saham_model->getKodeAll($this->input->get('idsaham'));  	
			if(count($data['saham']) ==0) {
				$this->session->set_flashdata('msg', true);
				redirect('laporan/saham');
			}	
  		$data['result'] = $this->laporan_model->getSaham($data['saham'][0]->idsaham, $dtanggal, $duntil);

  			$data['resultawal'] = $this->laporan_model->getSahamSaldoAwal($data['saham'][0]->idsaham, $dtanggal);
  			$data['saldoawal'] = 0;
  			$data['saldocolly'] = 0;
  			$data['saldojumlah'] =0;

  			foreach($data['resultawal'] as $key) {
  				if($key->jenistrans =='JUAL') {
  					if(!empty($key->subtotaljual)) {
	  					$data['saldoawal'] += $key->subtotaljual;
	  				}
	  				if(!empty($key->jmlsatuanbesarjual)) {
	  					$data['saldocolly'] -= $key->jmlsatuanbesarjual;
	  				}
	  				if(!empty($key->jmlsatuankeciljual)) {
	  					$data['saldojumlah'] -= $key->jmlsatuankeciljual;
	  				}
  				} else if($key->jenistrans == 'BELI') {
  					if(!empty($key->subtotalbeli)) {
	  					$data['saldoawal'] -= $key->subtotalbeli;
	  				}
	  				if(!empty($key->jmlsatuanbesarbeli)) {
	  					$data['saldocolly'] += $key->jmlsatuanbesarbeli;
	  				}
	  				if(!empty($key->jmlsatuankecilbeli)) {
	  					$data['saldojumlah'] += $key->jmlsatuankecilbeli;
	  				}
  				}
  			}
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

		var Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });
  	";

  		// BTN QUICK SUBMIT
  	$data['js'] .= "
  	$('#btnquicksubmit').on('click', function(e){
  		if($('#idsaham').val() == '') {
  			e.preventDefault();
  		}
  	});
  	";

  	// SWEET ALERT
    	if($this->session->flashdata('msg')) { 
    	$data['js'] .= "
  Toast.fire({
						    icon: 'error',
						    title: 'Kode saham tidak ditemukan'
						  });
    	";
    	}

  	// DATA TABLE
		$data['js'] .= "
		function toFixed(value, precision) {
		    var precision = precision || 0,
		        power = Math.pow(10, precision),
		        absValue = Math.abs(Math.round(value * power)),
		        result = (value < 0 ? '-' : '') + String(Math.floor(absValue / power));

		    if (precision > 0) {
		        var fraction = String(absValue % power),
		            padding = new Array(Math.max(precision - fraction.length, 0) + 1).join('0');
		        result += '.' + padding + fraction;
		    }
		    return result;
		}

			function numberWithCommas(x) {
			    x = x.toString();
			    var pattern = /(-?\d+)(\d{3})/;
			    while (pattern.test(x))
			        x = x.replace(pattern, \"$1.$2\");
			    return x;
			}

			$('#example2').DataTable({
			 'paging': true,
			  'lengthChange': true,
			  'searching': true,
			  'pageLength': 25,
			  lengthMenu: [
	            [10, 25, 50, 100,-1],
	            [10, 25, 50, 100,'All'],
	        ],
			  'ordering': false,
			  'info': true,
			  'autoWidth': false,
			  'responsive': false, 
			  'footerCallback': function(row, data, start, end, display) {
		    	  var api = this.api();
				 
				  api.columns('.sum', {
				    page: 'current'
				  }).every(function() {
				    var sum = this
				      .data()
				      .reduce(function(a, b) {
				        var x = parseFloat(a) || 0;
				        var y = parseFloat(b.toString().replace(new RegExp(\"[.]\",\"g\"), '').replace(',','.')) || 0;
				        console.log(x + '+' + y + '=' + (x+y));
				        return x + y;
				      }, 0);
				      var hasil = toFixed(sum,2).toString().replace('.',',');

				    $(this.footer()).html(numberWithCommas(hasil));
				  });
				}
			});";

			// FORM SUBMISSION
		$data['js'] .= "
		$('#idsaham').on('change keyup', function(e) {
			if(e.keyCode == 13) { $('#formsubmit').submit(); }
			});

		$('#tampil_saldo_awal').on('change', function() {
			$('#formsubmit').submit();
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

				$('#formsubmit').submit();
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

				$('#formsubmit').submit();
			}
		});

		$('#fromtanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });

    $('#untiltanggal').on('change.datetimepicker', ({date, oldDate}) => {              
       $('#formsubmit').submit();
    });
		";

		//  CARI SAHAM
    $data['js'] .= "
		$('#modal-lg-saham').on('shown.bs.modal', function () {
		    $('#carirekening').focus();
		});

		$(document).on('click', '.btnpilihrekening', function() {
	  		var id = $(this).attr('pilihid');
	  		var kode = $(this).attr('pilihkode');
	  		var nama = $(this).attr('pilihnama');
	  		$('#idsaham').val(kode.toUpperCase());
	  		$('#inforekening').html(nama.toUpperCase());
	  		$('#inforekening').show();
	  		$('#modal-lg-saham').modal('hide');
	  		 $('#formsubmit').submit();
	  	});

		$('#carirekening').on('keyup change keydown focus', function() {
  		var term = $(this).val();
  		if(term.trim() != '') {
	  		$.post('".base_url('laporan/searchsahamfree')."', { cari:term }, function(data) {
	  				var json = JSON.parse(data);
		  			if(json['data'].length > 0) {
		  				var tableserupa = '';
						var serupa=0;
						for(var i =0; i < json['data'].length; i++) {
							tableserupa += '<tr>';
							tableserupa += '<td>' + json['data'][i].kode.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].nama.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td><button type=\'button\' pilihkode=\'' + json['data'][i].kode + '\' pilihnama=\'' + json['data'][i].nama + '\'  pilihid=\'' + json['data'][i].idsaham + '\' class=\'btn btnpilihrekening btn-primary btn-sm\'>PILIH</button></td>';
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
		$this->load->view('laporan/v_saham', $data);
		$this->load->view('v_footer', $data);
  }

	//AJAX CALL
	public function searchbarang() {
		$hasil = $this->barang_model->getAll('', " (nama LIKE '%".$this->input->post('cari')."%' OR kode LIKE '%".$this->input->post('cari')."%' OR keterangan LIKE '%".$this->input->post('cari')."%') " );
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

	public function searchsahamfree() {
		$hasil = $this->saham_model->getAll(''," (nama LIKE '%".$this->input->post('cari')."%' OR  kode LIKE '%".$this->input->post('cari')."%') ");
		echo json_encode(array('data' => $hasil));
	}	

	public function searchpelanggan() {
		$where = ' (pelanggan.nama LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.kode LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.contact_person LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.alamat LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.telepon LIKE "%'.$this->input->post('cari').'%") ';

		$hasil = $this->pelanggan_model->getAll('', $where,10);
		echo json_encode(array('data' => $hasil));
	}

}
