<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksisaham extends CI_Controller {

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

  public function lihatjual() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
	
		$data['penjualan'] = $this->transaksi_saham_model->getAll('', '(penjualan_saham.nomor_nota LIKE "%'.$this->input->get('nomor_nota').'%") AND (penjualan_saham.tanggal >= "'.$dtanggal.'" AND penjualan_saham.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->transaksi_saham_model->getAll('', 'penjualan_saham.tanggal >= "'.date('Y-m-01').'" AND penjualan_saham.tanggal <= "'.date('Y-m-d').'" ');
  	}

  	$data['totalharga'] =  array();
		  	foreach($data['penjualan'] as $value) {
		  		$data['totalharga'][] = $this->transaksi_saham_model->getTotalHarga($value->nomor_nota);
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
    title: 'Nota penjualan saham berhasil dihapus.'
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
		$this->load->view('transaksisaham/v_lihat_jual', $data);
		$this->load->view('v_footer', $data);
  }

  public function lihatbeli() {
  	$data = array();

  	// TODO HANDLE SUBMISSIon
  	if($this->input->get('formsubmit')) {
  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

	    $datejual = explode(" ", $this->input->get('fromtanggal'));
	    $dtanggal = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
  		   	
		$datetempo = explode(" ", $this->input->get('untiltanggal'));
		$duntil = $datetempo[2].'-'.$months[$datetempo[1]].'-'.$datetempo[0];
	
		$data['penjualan'] = $this->transaksi_saham_model->getAllBeli('', '(pembelian_saham.nomor_nota LIKE "%'.$this->input->get('nomor_nota').'%") AND (pembelian_saham.tanggal >= "'.$dtanggal.'" AND pembelian_saham.tanggal <= "'.$duntil.'" )');		  	
  	} else {
  		$data['penjualan'] = $this->transaksi_saham_model->getAllBeli('', 'pembelian_saham.tanggal >= "'.date('Y-m-01').'" AND pembelian_saham.tanggal <= "'.date('Y-m-d').'" ');
  	}

  	$data['totalharga'] =  array();
		  	foreach($data['penjualan'] as $value) {
		  		$data['totalharga'][] = $this->transaksi_saham_model->getTotalHargaBeli($value->nomor_nota);
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
    title: 'Nota pembelian saham berhasil dihapus.'
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
		$this->load->view('transaksisaham/v_lihat_beli', $data);
		$this->load->view('v_footer', $data);
  }

  public function jual() {
  	$data = array();

  		if($this->input->post('nomor_nota')) {
	  		$datejual = $this->input->post('tanggaljual');
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggaljual'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
	  		   
  				
			if($this->input->post('editmode')) {
				//$nilai_rupiah = $this->kurs_model->getAll($this->input->post('idkurs'));
				$dataupdate = array(
					'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,	  			
	  			'keterangan' => $this->input->post('keterangan'),
	  			'nomor_faktur' => $this->input->post('nomor_faktur'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'idgudang' => $this->input->post('idgudang')
	  		);

	  		$databarang = array();
	  		$barang = $this->input->post('idbarangarray');
	  		$jmlsatuanbesar = $this->input->post('jmlsatuanbesararray');
	  		$jmlsatuankecil = $this->input->post('jmlsatuankecilarray');
	  		$harga = $this->input->post('hargaarray');
	  		$kurs = $this->kurs_model->getAll($this->input->post('idkurs'));

	  		for($i = 0; $i < count($barang); $i++) {
	  			$databarang[] = array(
	  				'nomor_nota' => $this->input->post('nomor_nota'),
	  				'idsaham' => $barang[$i],
	  				'jumlah_kecil' => $jmlsatuankecil[$i],
	  				'jumlah_besar' => $jmlsatuanbesar[$i],
	  				'harga' => $harga[$i],
	  				'lambang_kurs' => $kurs[0]->lambang,
	  				'konversi_rupiah' => $kurs[0]->nilai_rupiah,
	  			  'urutan' => ($i+1));
	  		}

	  		$this->transaksi_saham_model->doUpdate($this->input->post('nomor_nota'), $dataupdate, $databarang);
	  		$this->session->set_flashdata('update_msg', true);
	  		redirect('transaksisaham/jual?id='.$this->input->post('nomor_nota'));

			} else {
				$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,	  			
	  			'keterangan' => $this->input->post('keterangan'),
	  			'nomor_faktur' => $this->input->post('nomor_faktur'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'idgudang' => $this->input->post('idgudang'),
	  			'status' => 'active'
	  		);

	  		$databarang = array();
	  		$barang = $this->input->post('idbarangarray');
	  		$jmlsatuanbesar = $this->input->post('jmlsatuanbesararray');
	  		$jmlsatuankecil = $this->input->post('jmlsatuankecilarray');
	  		$harga = $this->input->post('hargaarray');
	  		$kurs = $this->kurs_model->getAll($this->input->post('idkurs'));

	  		for($i = 0; $i < count($barang); $i++) {
	  			$databarang[] = array(
	  				'nomor_nota' => $this->input->post('nomor_nota'),
	  				'idsaham' => $barang[$i],
	  				'jumlah_kecil' => $jmlsatuankecil[$i],
	  				'jumlah_besar' => $jmlsatuanbesar[$i],
	  				'harga' => $harga[$i],
	  				'lambang_kurs' => $kurs[0]->lambang,
	  				'konversi_rupiah' => $kurs[0]->nilai_rupiah,
	  			  'urutan' => ($i+1));
	  		}

	  	

	  		$this->transaksi_saham_model->doInsert($datainsert, $databarang);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transaksisaham/jual');
			}		  		
  		
  	}

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transaksi_saham_model->getAll($this->input->get('id'));
  		$data['editpelanggan'] = $this->pelanggan_model->getAll($data['editnota'][0]->idpelanggan);
  		if(count($data['editnota']) == 0) { redirect('transaksisaham/jual'); }
  		$data['notabarang'] = $this->transaksi_saham_model->getAllBarang($this->input->get('id'));

  		foreach($data['notabarang'] as $key => $value) {
  			$data['js'] .= "
					barangs.push({
	    			'idsaham' : ".$value->idsaham.",
	    			'namabarang' : '".$value->nama."',
	    			'kodebarang' : '".$value->kode."',
	    			'jmlsatuanbesar' : ".$value->jumlah_besar.",
	    			'jmlsatuankecil' : ".$value->jumlah_kecil.",
	    			'harga' : ".$value->harga."
	    			});
  			";
  		}

  		$data['js'] .= "
  			render_tabel_barang();
  		";
  	}


  	
  	$data['gudang'] = $this->gudang_model->getAll();
  	$data['kurs'] = $this->kurs_model->getAll();
  	$data['barang'] = $this->saham_model->getAll();


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

  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahpenjualan').valid()) {
	  		if(barangs.length == 0) {
	  			e.preventDefault();
	  			Toast.fire({
				    icon: 'error',
				    title: 'Saham belum ditambahkan'
				  });

				  $('#btnadd').css('border', '2px solid red');
	  		} else {	  			
	  			e.preventDefault();
	  			// CEK KODE PELANGGAN
				$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
					var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#formtmabahpenjualan').submit();
						} else {
							Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena kode pelanggan tidak ditemukan'
						  });
						}
					});
	  		}
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('transaksisaham/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('transaksisaham/jual?id=')."' + $('#nomor_nota').val());
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
			  		$.post('".base_url('transaksisaham/searchnota')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transaksisaham/jual?id=')."' + $('#nomor_nota').val());
						} else { alert('Nomor nota tidak ditemukan'); }
			  		});
			  	} else { alert('Nomor nota harus diisi'); }
			}
		});";

	
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahpenjualan').valid()) {
	  		if(barangs.length == 0) {
	  			e.preventDefault();
	  			Toast.fire({
				    icon: 'error',
				    title: 'Saham belum ditambahkan'
				  });

				  $('#btnadd').css('border', '2px solid red');
	  		} else {
	  			e.preventDefault();
	  			$.post('".base_url('transaksisaham/searchnota')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {
	  					// CEK KODE PELANGGAN
	  					$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
	  						var json = JSON.parse(data);
		  						if(json['data'].length > 0) {
		  							$('#formtmabahpenjualan').submit();
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
	  		$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
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
	  		$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
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
  	$('#formtmabahpenjualan').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      namapelanggan: {
		        required: true
		      },
		      tanggaljual: {
		        required: true
		      },
		      jatuhtempo: {
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
		      tanggaljual: {
		        required: 'Harus diisi'
		      },
		      jatuhtempo: {
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
	  		$.post('".base_url('transaksisaham/searchpelanggan')."', { cari:term }, function(data) {
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
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].idpelanggan + '\' pilihkode=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
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
  	});";
  	

  	// ADD BARANG 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	console.log('dd');
	$('#hididbarang').val('');
	$('#jumlah_besar').val('');
	$('#jumlah_kecil').val('');
	$('#harga').val('');
	$('#selectbarang').val('-');
	$('#selectbarang').trigger('change');
	$('#btntambahbarang').html('Tambah Barang');
});
		";

		// EDIT BARANG
		$data['js'] .= "
		$(document).on('click', '.btn-edit-barang', function() {
			var barangidx = $(this).attr('barangidx');
			$('#hididbarang').val(barangidx);
			$('#jumlah_besar').val(barangs[barangidx].jmlsatuanbesar);
			$('#jumlah_kecil').val(barangs[barangidx].jmlsatuankecil);
			$('#harga').val(barangs[barangidx].harga);
			$('#selectbarang').val(barangs[barangidx].idsaham);
			$('#selectbarang').trigger('change');

			$('#btntambahbarang').html('Simpan Barang');
		});

		$('#harga, #jumlah_besar, #jumlah_kecil').on('keypress', function(e) {
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
		";



		// HAPUS BARANG
		$data['js'] .= "		
		$(document).on('click', '.btn-hapus-barang', function() {
			if(confirm('Yakin hapus?')) {
				var barangidx = $(this).attr('barangidx');
				barangs.splice(barangidx, 1);
				render_tabel_barang();
			}
		});
		";

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

    $('#selectbarang').on('change', function() {    	
    	var sb = $('option:selected', this).attr('satuanbesar');
    	var sk = $('option:selected', this).attr('satuankecil');
    	$('#satuanbesar').html(sb.toUpperCase());
    	$('#satuankecil').html(sk.toUpperCase());
    });

    $('#btntambahbarang').on('click', function(e) {
    	if($('#formtambahbarang').valid()) {
    		var idsaham = $('#selectbarang').val();
    		var namabarang = $('option:selected', $('#selectbarang')).attr('namabarang');
    		var kodebarang = $('option:selected', $('#selectbarang')).attr('kodebarang');
    		var jmlsatuanbesar = $('#jumlah_besar').val();
    		var jmlsatuankecil = $('#jumlah_kecil').val();
    		//var harga = $('#harga').val().replace(/\./g,''); 
    		var harga = $('#harga').val();

    		
    		if($('#hididbarang').val() == '') {
	    		barangs.push({
	    			'idsaham' : idsaham,
	    			'namabarang' : namabarang,
	    			'kodebarang' : kodebarang,
	    			'jmlsatuanbesar' : jmlsatuanbesar,
	    			'jmlsatuankecil' : jmlsatuankecil,
	    			'harga' : harga
	    			});
	    	} else {
	    		var x = $('#hididbarang').val();
	    		barangs[x].idsaham  = idsaham;
	    		barangs[x].namabarang  = namabarang;
	    		barangs[x].kodebarang  = kodebarang;
	    		barangs[x].jmlsatuanbesar  = jmlsatuanbesar;
	    		barangs[x].jmlsatuankecil  = jmlsatuankecil;
	    		barangs[x].harga  = harga;
	    	}

    		render_tabel_barang();
  			$('#modal-tambah-produk-lg').modal('hide');
    	}
    });

    function render_tabel_barang() {
    	$('#tablebarang').html('');
    	if(barangs.length == 0) {
    		$('#tablebarang').html('<tr><td colspan=\"7\" class=\"text-center\">BELUM ADA DATA BARANG</td></tr>');
    	}
    	for(var i = 0; i < barangs.length; i++) {
    		$('#tablebarang').append('<tr>');
    		$('#tablebarang').append('<td>' + (i+1) + '</td>');
				$('#tablebarang').append('<td>' + barangs[i].kodebarang.toUpperCase()  + '<input type=\'hidden\' name=\'idbarangarray[]\' value=\'' + barangs[i].idsaham + '\'/></td>');
				$('#tablebarang').append('<td>' + barangs[i].namabarang.toUpperCase()  + '</td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].jmlsatuanbesar)  + '<input type=\'hidden\' name=\'jmlsatuanbesararray[]\' value=\'' + barangs[i].jmlsatuanbesar + '\'/></td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].jmlsatuankecil)  + '<input type=\'hidden\' name=\'jmlsatuankecilarray[]\' value=\'' + barangs[i].jmlsatuankecil + '\'/></td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].harga)  + '<input type=\'hidden\' name=\'hargaarray[]\' value=\'' + barangs[i].harga + '\'/></td>');

				$('#tablebarang').append('<td><a href=\'#\'  data-toggle=\'modal\' data-target=\'#modal-tambah-produk-lg\' barangidx=\'' + i + '\' class=\'btn btn-info btn-edit-barang btn-sm\'><i class=\'fas fa-edit\'></i> EDIT</a> <button type=\'button\' class=\'btn btn-danger btn-sm btn-hapus-barang\' barangidx=\'' + i + '\' ><i class=\'fas fa-trash\'></i> HAPUS</button></td>');
    		$('#tablebarang').append('</tr>');
    	}
    }

     $('#formtambahbarang').validate({
		    rules: {
		      jumlah_besar: {
		        required: true,
		        number : true
		      },
		      jumlah_kecil: {
		        required: true,
		        number : true
		      },
		      selectbarang: {
		        required: true,
		        number: true
		      },
		      harga : {
		      	required: true,
		      }
		    },
		    messages: {
		      jumlah_besar: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      jumlah_kecil: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      selectbarang: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      harga : {
		      	required: 'Harus diisi',
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

  	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data penjualan saham berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data penjualan saham berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data penjualan saham berhasil dihapus.'
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
	  		$.post('".base_url('transaksisaham/searchnotafree')."', { cari:term }, function(data) {
	  			console.log(data);
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
							tableserupa += '<td>JSH' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].lambang.toUpperCase() + '</td>';
							tableserupa += '<td><a href=\'".base_url('transaksisaham/jual?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarinota').html(tableserupa); }
						else { $('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
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
	  		$.post('".base_url('transaksisaham/searchpelanggan')."', { cari:term }, function(data) {
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
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].idpelanggan + '\' pilihkode=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
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
		$this->load->view('transaksisaham/v_jual', $data);
		$this->load->view('v_footer', $data);
  }


  public function beli() {
  	$data = array();

  		if($this->input->post('nomor_nota')) {
	  		$datejual = $this->input->post('tanggaljual');
	  		$months = array("January" => "01", "February" => "02", "March" => "03", "April" => "04", "May" => "05", "June" => "06", "July" => "07", "August" => "08", "September" => "09",  "October" => "10",  "November" => "11",  "December" => "12");

		    $datejual = explode(" ", $this->input->post('tanggaljual'));
		    $djual = $datejual[2].'-'.$months[$datejual[1]].'-'.$datejual[0];
	  		   
  				
			if($this->input->post('editmode')) {
				//$nilai_rupiah = $this->kurs_model->getAll($this->input->post('idkurs'));
				$dataupdate = array(
					'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,	  			
	  			'keterangan' => $this->input->post('keterangan'),
	  			'nomor_faktur' => $this->input->post('nomor_faktur'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'idgudang' => $this->input->post('idgudang')
	  		);

	  		$databarang = array();
	  		$barang = $this->input->post('idbarangarray');
	  		$jmlsatuanbesar = $this->input->post('jmlsatuanbesararray');
	  		$jmlsatuankecil = $this->input->post('jmlsatuankecilarray');
	  		$harga = $this->input->post('hargaarray');
	  		$kurs = $this->kurs_model->getAll($this->input->post('idkurs'));

	  		for($i = 0; $i < count($barang); $i++) {
	  			$databarang[] = array(
	  				'nomor_nota' => $this->input->post('nomor_nota'),
	  				'idsaham' => $barang[$i],
	  				'jumlah_kecil' => $jmlsatuankecil[$i],
	  				'jumlah_besar' => $jmlsatuanbesar[$i],
	  				'harga' => $harga[$i],
	  				'lambang_kurs' => $kurs[0]->lambang,
	  				'konversi_rupiah' => $kurs[0]->nilai_rupiah,
	  			  'urutan' => ($i+1));
	  		}

	  		$this->transaksi_saham_model->doUpdateBeli($this->input->post('nomor_nota'), $dataupdate, $databarang);
	  		$this->session->set_flashdata('update_msg', true);
	  		redirect('transaksisaham/beli?id='.$this->input->post('nomor_nota'));

			} else {
				$datainsert = array(
	  			'nomor_nota' => $this->input->post('nomor_nota'),
	  			'idpelanggan' => $this->input->post('hididpelanggan'),
	  			'tanggal' => $djual,	  			
	  			'keterangan' => $this->input->post('keterangan'),
	  			'nomor_faktur' => $this->input->post('nomor_faktur'),
	  			'idkurs' => $this->input->post('idkurs'),
	  			'idgudang' => $this->input->post('idgudang'),
	  			'status' => 'active'
	  		);

	  		$databarang = array();
	  		$barang = $this->input->post('idbarangarray');
	  		$jmlsatuanbesar = $this->input->post('jmlsatuanbesararray');
	  		$jmlsatuankecil = $this->input->post('jmlsatuankecilarray');
	  		$harga = $this->input->post('hargaarray');
	  		$kurs = $this->kurs_model->getAll($this->input->post('idkurs'));

	  		for($i = 0; $i < count($barang); $i++) {
	  			$databarang[] = array(
	  				'nomor_nota' => $this->input->post('nomor_nota'),
	  				'idsaham' => $barang[$i],
	  				'jumlah_kecil' => $jmlsatuankecil[$i],
	  				'jumlah_besar' => $jmlsatuanbesar[$i],
	  				'harga' => $harga[$i],
	  				'lambang_kurs' => $kurs[0]->lambang,
	  				'konversi_rupiah' => $kurs[0]->nilai_rupiah,
	  			  'urutan' => ($i+1));
	  		}

	  	

	  		$this->transaksi_saham_model->doInsertBeli($datainsert, $databarang);
	  		$this->session->set_flashdata('insert_msg', true);
	  		redirect('transaksisaham/beli');
			}		  		
  		
  	}

  	// SETUP JS BARANG
  	$data['js'] = "
		var barangs = [];
  	";

  	if($this->input->get('id')) {
  		$data['editnota'] = $this->transaksi_saham_model->getAllBeli($this->input->get('id'));
  		$data['editpelanggan'] = $this->pelanggan_model->getAll($data['editnota'][0]->idpelanggan);
  		if(count($data['editnota']) == 0) { redirect('transaksisaham/beli'); }
  		$data['notabarang'] = $this->transaksi_saham_model->getAllBarangBeli($this->input->get('id'));

  		foreach($data['notabarang'] as $key => $value) {
  			$data['js'] .= "
					barangs.push({
	    			'idsaham' : ".$value->idsaham.",
	    			'namabarang' : '".$value->nama."',
	    			'kodebarang' : '".$value->kode."',
	    			'jmlsatuanbesar' : ".$value->jumlah_besar.",
	    			'jmlsatuankecil' : ".$value->jumlah_kecil.",
	    			'harga' : ".$value->harga."
	    			});
  			";
  		}

  		$data['js'] .= "
  			render_tabel_barang();
  		";
  	}


  	
  	$data['gudang'] = $this->gudang_model->getAll();
  	$data['kurs'] = $this->kurs_model->getAll();
  	$data['barang'] = $this->saham_model->getAll();


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

  	if($this->input->get('id')) {
  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahpenjualan').valid()) {
	  		if(barangs.length == 0) {
	  			e.preventDefault();
	  			Toast.fire({
				    icon: 'error',
				    title: 'Saham belum ditambahkan'
				  });

				  $('#btnadd').css('border', '2px solid red');
	  		} else {	  			
	  			e.preventDefault();
	  			// CEK KODE PELANGGAN
				$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
					var json = JSON.parse(data);
						if(json['data'].length > 0) {
							$('#formtmabahpenjualan').submit();
						} else {
							Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena kode pelanggan tidak ditemukan'
						  });
						}
					});
	  		}
	  	}
  	});
  	";

  	} else {
  		// CEK NOTA 
  	$data['js'] .= "
  	$('#loadlink').on('click', function(e) {
  		e.preventDefault();
  		if($('#nomor_nota').val().trim() != '') {
	  		$.post('".base_url('transaksisaham/searchnotabeli')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
	  			var json = JSON.parse(data);
				if(json['data'].length > 0) {
					window.location.replace('".base_url('transaksisaham/beli?id=')."' + $('#nomor_nota').val());				
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
			  		$.post('".base_url('transaksisaham/searchnotabeli')."', { nomor_nota: $('#nomor_nota').val() }, function(data) {
			  			var json = JSON.parse(data);
						if(json['data'].length > 0) {
							window.location.replace('".base_url('transaksisaham/beli?id=')."' + $('#nomor_nota').val());				
						} else { alert('Nomor nota tidak ditemukan'); }
			  		});
			  	} else { alert('Nomor nota harus diisi'); }
			}
		});";

	

  		$data['js'] .= "

  	$('#btnsubmit').on('click', function(e) {
  		if($('#formtmabahpenjualan').valid()) {
	  		if(barangs.length == 0) {
	  			e.preventDefault();
	  			Toast.fire({
				    icon: 'error',
				    title: 'Saham belum ditambahkan'
				  });

				  $('#btnadd').css('border', '2px solid red');
	  		} else {
	  			e.preventDefault();
	  			$.post('".base_url('transaksisaham/searchnotabeli')."', {nomor_nota:$('#nomor_nota').val() }, function(data) {
	  				var json = JSON.parse(data);
	  				if(json['data'].length > 0) {
	  					Toast.fire({
						    icon: 'error',
						    title: 'Gagal simpan karena nomor nota sudah terpakai'
						  });
	  				} else {
	  					// CEK KODE PELANGGAN
	  					$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota : $('#namapelanggan').val() },function(data) {
	  						var json = JSON.parse(data);
		  						if(json['data'].length > 0) {
		  							$('#formtmabahpenjualan').submit();
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
	  		$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
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
	  		$.post('".base_url('transaksisaham/searchpelanggankode')."', { nomor_nota: $('#namapelanggan').val() }, function(data) {
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
  	$('#formtmabahpenjualan').validate({
		    rules: {
		      nomor_nota: {
		        required: true
		      },
		      namapelanggan: {
		        required: true
		      },
		      nomor_faktur: {
		        required: true
		      },
		      tanggaljual: {
		        required: true
		      },
		      jatuhtempo: {
		        required: true
		      },
		      idgudang: {
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
		      nomor_faktur: {
		        required: 'Harus diisi'
		      },
		      tanggaljual: {
		        required: 'Harus diisi'
		      },
		      jatuhtempo: {
		        required: 'Harus diisi'
		      },
		      idgudang: {
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

  	

  	// ADD BARANG 
		$data['js'] .= "
$('#btnadd').on('click', function() {
	console.log('dd');
	$('#hididbarang').val('');
	$('#jumlah_besar').val('');
	$('#jumlah_kecil').val('');
	$('#harga').val('');
	$('#selectbarang').val('-');
	$('#selectbarang').trigger('change');
	$('#btntambahbarang').html('Tambah Barang');
});
		";

		// EDIT BARANG
		$data['js'] .= "
		$(document).on('click', '.btn-edit-barang', function() {
			var barangidx = $(this).attr('barangidx');
			$('#hididbarang').val(barangidx);
			$('#jumlah_besar').val(barangs[barangidx].jmlsatuanbesar);
			$('#jumlah_kecil').val(barangs[barangidx].jmlsatuankecil);
			$('#harga').val(barangs[barangidx].harga);
			$('#selectbarang').val(barangs[barangidx].idsaham);
			$('#selectbarang').trigger('change');

			$('#btntambahbarang').html('Simpan Barang');
		});

		$('#harga, #jumlah_besar, #jumlah_kecil').on('keypress', function(e) {
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
		";

		// HAPUS BARANG
		$data['js'] .= "		
		$(document).on('click', '.btn-hapus-barang', function() {
			if(confirm('Yakin hapus?')) {
				var barangidx = $(this).attr('barangidx');
				barangs.splice(barangidx, 1);
				render_tabel_barang();
			}
		});
		";

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

    $('#selectbarang').on('change', function() {    	
    	var sb = $('option:selected', this).attr('satuanbesar');
    	var sk = $('option:selected', this).attr('satuankecil');
    	$('#satuanbesar').html(sb.toUpperCase());
    	$('#satuankecil').html(sk.toUpperCase());
    });

    $('#btntambahbarang').on('click', function(e) {
    	if($('#formtambahbarang').valid()) {
    		var idsaham = $('#selectbarang').val();
    		var namabarang = $('option:selected', $('#selectbarang')).attr('namabarang');
    		var kodebarang = $('option:selected', $('#selectbarang')).attr('kodebarang');
    		var jmlsatuanbesar = $('#jumlah_besar').val();
    		var jmlsatuankecil = $('#jumlah_kecil').val();
    		//var harga = $('#harga').val().replace(/\./g,''); 
    		var harga = $('#harga').val();

    		
    		if($('#hididbarang').val() == '') {
	    		barangs.push({
	    			'idsaham' : idsaham,
	    			'namabarang' : namabarang,
	    			'kodebarang' : kodebarang,
	    			'jmlsatuanbesar' : jmlsatuanbesar,
	    			'jmlsatuankecil' : jmlsatuankecil,
	    			'harga' : harga
	    			});
	    	} else {
	    		var x = $('#hididbarang').val();
	    		barangs[x].idsaham  = idsaham;
	    		barangs[x].namabarang  = namabarang;
	    		barangs[x].kodebarang  = kodebarang;
	    		barangs[x].jmlsatuanbesar  = jmlsatuanbesar;
	    		barangs[x].jmlsatuankecil  = jmlsatuankecil;
	    		barangs[x].harga  = harga;
	    	}

    		render_tabel_barang();
  			$('#modal-tambah-produk-lg').modal('hide');
    	}
    });

    function render_tabel_barang() {
    	$('#tablebarang').html('');
    	if(barangs.length == 0) {
    		$('#tablebarang').html('<tr><td colspan=\"7\" class=\"text-center\">BELUM ADA DATA BARANG</td></tr>');
    	}
    	for(var i = 0; i < barangs.length; i++) {
    		$('#tablebarang').append('<tr>');
    		$('#tablebarang').append('<td>' + (i+1) + '</td>');
				$('#tablebarang').append('<td>' + barangs[i].kodebarang.toUpperCase()  + '<input type=\'hidden\' name=\'idbarangarray[]\' value=\'' + barangs[i].idsaham + '\'/></td>');
				$('#tablebarang').append('<td>' + barangs[i].namabarang.toUpperCase()  + '</td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].jmlsatuanbesar)  + '<input type=\'hidden\' name=\'jmlsatuanbesararray[]\' value=\'' + barangs[i].jmlsatuanbesar + '\'/></td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].jmlsatuankecil)  + '<input type=\'hidden\' name=\'jmlsatuankecilarray[]\' value=\'' + barangs[i].jmlsatuankecil + '\'/></td>');
				$('#tablebarang').append('<td>' + numberWithCommas(barangs[i].harga)  + '<input type=\'hidden\' name=\'hargaarray[]\' value=\'' + barangs[i].harga + '\'/></td>');

				$('#tablebarang').append('<td><a href=\'#\'  data-toggle=\'modal\' data-target=\'#modal-tambah-produk-lg\' barangidx=\'' + i + '\' class=\'btn btn-info btn-edit-barang btn-sm\'><i class=\'fas fa-edit\'></i> EDIT</a> <button type=\'button\' class=\'btn btn-danger btn-sm btn-hapus-barang\' barangidx=\'' + i + '\' ><i class=\'fas fa-trash\'></i> HAPUS</button></td>');
    		$('#tablebarang').append('</tr>');
    	}
    }

     $('#formtambahbarang').validate({
		    rules: {
		      jumlah_besar: {
		        required: true,
		        number : true
		      },
		      jumlah_kecil: {
		        required: true,
		        number : true
		      },
		      selectbarang: {
		        required: true,
		        number: true
		      },
		      harga : {
		      	required: true,
		      }
		    },
		    messages: {
		      jumlah_besar: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      jumlah_kecil: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      selectbarang: {
		        required: 'Harus diisi',
		        number: 'Harus diisi angka'
		      },
		      harga : {
		      	required: 'Harus diisi',
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

  	// SWEET ALERT
    	if($this->session->flashdata('insert_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembelian saham berhasil ditambahkan.'
  });
    	";
    	}

    	if($this->session->flashdata('update_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembelian saham berhasil diperbaharui.'
  });
    	";
    	}

    	if($this->session->flashdata('del_msg')) { 
    	$data['js'] .= "
  Toast.fire({
    icon: 'success',
    title: 'Data pembelian saham berhasil dihapus.'
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
	  		$.post('".base_url('transaksisaham/searchnotafreebeli')."', { cari:term }, function(data) {
	  			console.log(data);
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
							tableserupa += '<td>BSH' + json['data'][i].nomor_nota.toUpperCase() + '</td>';
							tableserupa += '<td>' + d+' '+months[m-1]+' '+y+ '</td>';
							tableserupa += '<td>' + json['data'][i].keterangan.toUpperCase() + '</td>';
							tableserupa += '<td>' + json['data'][i].lambang.toUpperCase() + '</td>';
							tableserupa += '<td><a href=\'".base_url('transaksisaham/beli?id=')."' + json['data'][i].nomor_nota + '\'   class=\'btn btnpilih btn-primary btn-sm\'>PILIH</a></td>';
							tableserupa += '</tr>';
							serupa++;
						}

						if(serupa > 0) { $('#tabelhasilcarinota').html(tableserupa); }
						else { $('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>'); }				
					} else {
						$('#tabelhasilcarinota').html('<tr><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>');
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
	  		$.post('".base_url('transaksisaham/searchpelanggan')."', { cari:term }, function(data) {
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
							tableserupa += '<td><button type=\'button\' pilihnama=\'' + json['data'][i].nama + '\' pilihcontact=\'' + json['data'][i].contact_person + '\' pilihtelepon=\'' + json['data'][i].telepon + '\' pilihid=\'' + json['data'][i].idpelanggan + '\' pilihkode=\'' + json['data'][i].kode + '\' class=\'btn btnpilih btn-primary btn-sm\'>PILIH</button></td>';
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
		$this->load->view('transaksisaham/v_beli', $data);
		$this->load->view('v_footer', $data);
  }

  
	
	//AJAX CALL
	public function searchpelanggan() {
		$where = ' (pelanggan.nama LIKE "%'.$this->input->post('cari').'%" OR ';
		$where .= 'pelanggan.kode LIKE "%'.$this->input->post('cari').'%" OR ';
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
		$hasil = $this->transaksi_saham_model->getAll($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotabeli() {
		$hasil = $this->transaksi_saham_model->getAllBeli($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchreturnota() {
		$hasil = $this->penjualan_model->getAllRetur($this->input->post('nomor_nota'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafree() {
		$hasil = $this->transaksi_saham_model->getAllFree( $this->input->post('cari'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotafreebeli() {
		$hasil = $this->transaksi_saham_model->getAllFreeBeli( $this->input->post('cari'));
		echo json_encode(array('data' => $hasil));
	}

	public function searchnotareturfree() {
		$hasil = $this->penjualan_model->getAllReturFree( $this->input->post('cari'));
		echo json_encode(array('data' => $hasil));
	}	

	public function del($nomor_nota) {
		$this->transaksi_saham_model->doDel($nomor_nota);
		$this->session->set_flashdata('del_msg', true);

		redirect('transaksisaham/lihatjual');
	}

	public function delbeli($nomor_nota) {
		$this->transaksi_saham_model->doDelBeli($nomor_nota);
		$this->session->set_flashdata('del_msg', true);

		redirect('transaksisaham/lihatbeli');
	}
}
