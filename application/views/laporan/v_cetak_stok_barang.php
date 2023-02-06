<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CETAK STOK BARANG - <?php strtoupper(echo date('d M Y')); ?></title>
  <link rel="stylesheet" href="<?php echo base_url('css/adminlte.min.css'); ?>">
  <style type="text/css">
  	@media print{ @page { size: landscape;  } }

  	table { font-size: 9pt; }
  </style>
</head>
<body>
	<div class="container" style="margin:10pt;">
		<div class="row">
			<div class="col-md-12">
				<h3>CETAK STOK BARANG - <?php echo strtoupper($barang[0]->kode); 
            if($this->input->get('gudang') != '') {
               echo ' - '.strtoupper($gudang[0]->nama);
            } else {
               echo ' - SEMUA GUDANG'; 
            }
             ?></h3>
            <p>PERIODE:  <?php echo strtoupper($this->input->get('fromtanggal')); ?> - <?php echo strtoupper($this->input->get('untiltanggal')); ?><br/>TANGGAL CETAK: <?php echo strtoupper(date('d F Y')); ?></p>
			</div>

			<div class="col-md-12">
         <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th width="15%">TANGGAL</th>
                          <th>NOMOR NOTA</th>
                          <th>SUPPLIER / BUYER</th>
                          <th>GUDANG</th>
                          <th>JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> MASUK</th>
                          <th>JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> MASUK</th>
                          <th >HARGA MASUK</th>
                          <th >SUBTOTAL MASUK</th>
                          <th>JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> KELUAR</th>
                          <th>JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> KELUAR</th>                          
                          <th >HARGA KELUAR</th>
                          <th >SUBTOTAL KELUAR</th>
                          <th>SALDO <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?></th>
                          <th>SALDO <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?></th>
                          <th>SALDO AKHIR</th>  
                        </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($result))  { 
                          if($this->input->get('tampil_saldo_awal') == 'ya') {  
                            ?>
                          <tr>
                            <td></td>
                            <td>NILAI AWAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td></td>
                               <td><?php 
                            if(isset($saldocolly)) {
                            $h = strval($saldocolly);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                               <td><?php 
                            if(isset($saldojumlah)) {
                            $h = strval($saldojumlah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                               <td><?php 
                            if(isset($saldoawal)) {
                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>

                          </tr>
                          <?php
                          } 

                          foreach($result as $key => $b) { ?>
                          <tr>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                            <td><?php echo strtoupper($b->kode); ?></td>
                            <td><?php echo strtoupper($b->nama); ?></td>
                            <td><?php if($b->jmlsatuanbesarmasuk != '') { 
                              $h = strval($b->jmlsatuanbesarmasuk);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                            <td><?php if($b->jmlsatuankecilmasuk != '') {
                                $h = strval($b->jmlsatuankecilmasuk);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }
                             } ?></td>
                          <td>
                            <?php 
                            if($b->hargamasuk != '') {
                              $h = strval($b->hargamasuk);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                             }
                            ?>
                          </td>
                          <td>
                            <?php 
                            if($b->subtotalmasuk != '') {
                              //echo $saldoawal;
                              $saldoawal -= $b->subtotalmasuk;
                              //echo ' '.$saldoawal;
                              $h = strval($b->subtotalmasuk);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                             }
                            ?>
                          </td>
                          <td><?php if($b->jmlsatuanbesarkeluar != '') { 
                              $h = strval($b->jmlsatuanbesarkeluar);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                            <td><?php if($b->jmlsatuankecilkeluar != '') {
                                $h = strval($b->jmlsatuankecilkeluar);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }
                             } ?></td>
                          <td>
                            <?php 
                            if($b->hargakeluar != '') {
                              $h = strval($b->hargakeluar);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                             }
                            ?>
                          </td>
                          <td>
                            <?php 
                            if($b->subtotalkeluar != '') {
                              $saldoawal += $b->subtotalkeluar;
                              $h = strval($b->subtotalkeluar);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                             }
                            ?>
                          </td>
                          <td>
                               <?php 
                               if($b->tipetrans == 'JUAL') { 
                                $saldocolly -= $b->jmlsatuanbesarkeluar;
                               } else if($b->tipetrans == 'BELI') {
                                $saldocolly += $b->jmlsatuanbesarmasuk;
                               } else if( $b->tipetrans == 'RETURBELI') {                           
                                $saldocolly += $b->jmlsatuanbesarmasuk;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldocolly -= $b->jmlsatuanbesarkeluar;
                               }

                               $h = strval($saldocolly);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                               ?>
                             </td>
                             <td>
                               <?php 
                               if($b->tipetrans == 'JUAL') { 
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                               } else if($b->tipetrans == 'BELI') {
                                $saldojumlah += $b->jmlsatuankecilmasuk;
                               } else if( $b->tipetrans == 'RETURBELI') {                           
                                $saldojumlah += $b->jmlsatuankecilmasuk;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                               }

                               $h = strval($saldojumlah);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                               ?>
                             </td>
                             <td>
                              <?php
                              $h = strval($saldoawal);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.substr($arr[1],0,2);
                                 };
                              ?>
                             </td>
                            
                        </tr>
                         <?php } 
                          ?>
                        <?php } ?>
                        </tbody>
                      </table>   
         </div>
		</div>
	</div>
	
</body>
<script type="text/javascript">
	window.print();
</script>
</html>