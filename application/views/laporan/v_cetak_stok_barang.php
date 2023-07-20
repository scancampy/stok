<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CETAK STOK BARANG - <?php strtoupper(date('d M Y')); ?></title>
  <link rel="stylesheet" href="<?php echo base_url('css/adminlte.min.css'); ?>">
  <style type="text/css">
  	@media print{ @page { size: A4 landscape;  } }

  	table { font-size: 8pt;   width:100% !important; border-collapse: collapse; }
    table, th, td {
  border: 1px solid;
}
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
      <table id="example2" class="">
                        <thead>
                        <tr>
                          <th width="5%" >TANGGAL</th>
                          <th width="5%">NOMOR NOTA</th>
                          <th width="5%">SUPPLIER / BUYER</th>
                          <th width="5%">GUDANG</th>
                          <th class="sum" width="5%">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> MASUK</th>
                          <th width="5%" class="sum">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> MASUK</th>
                          <th width="5%" class="sum">HARGA MASUK</th>
                          <th width="5%" class="sum">SUBTOTAL MASUK</th>
                          <th width="5%" class="sum">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> KELUAR</th>
                          <th width="5%" class="sum">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> KELUAR</th>                          
                          <th width="5%" class="sum">HARGA KELUAR</th>
                          <th width="5%" class="sum">SUBTOTAL KELUAR</th>
                          <th width="5%">SALDO <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?></th>
                          <th width="5%">SALDO <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?></th>
                          <th width="5%">SALDO AKHIR</th>  
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
                          //print_r($result);
                          foreach($result as $key => $b) { ?>
                            <?php 
                            //if($b->tipetrans=='TRANSKELUAR') {
                              //print_r($b);
                              //echo '<br/>';
                            //} ?>
                          <tr>
                            <td style=" white-space: nowrap;"><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                            <td><?php echo strtoupper($b->namapelanggan); ?></td>
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
                                $saldocolly -= $b->jmlsatuanbesarkeluar;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldocolly += $b->jmlsatuanbesarmasuk;
                               } else if($b->tipetrans == 'HILANG') {
                                $saldocolly -= $b->jmlsatuanbesarkeluar;
                               } else if($b->tipetrans=='TRANSKELUAR') {
                                $saldocolly -= $b->jmlsatuanbesarkeluar;                                
                               } else if($b->tipetrans=='TRANSMASUK') {
                                $saldocolly += $b->jmlsatuanbesarmasuk;                                
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
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldojumlah += $b->jmlsatuankecilmasuk;
                               }  else if($b->tipetrans == 'HILANG') {
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                               } else if($b->tipetrans=='TRANSKELUAR') {
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                              } else if($b->tipetrans=='TRANSMASUK') {
                                $saldojumlah += $b->jmlsatuankecilmasuk;                                
                               }

                               $h = strval($saldojumlah);

                                 $arr = explode(".", $h);
                              //  echo $h.'<br/>';
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
                        <tfoot>
                          <tr>
                          <th width="15%"></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="sum" style="padding-left: 5px;">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> MASUK</th>
                          <th class="sum" style="padding-left: 5px;">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> MASUK</th>
                          <th class="sum" style="padding-left: 5px;">HARGA MASUK</th>
                          <th class="sum" style="padding-left: 5px;">SUBTOTAL MASUK</th>
                          <th class="sum" style="padding-left: 5px;">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_besar);
                          } ?> KELUAR</th>
                          <th class="sum" style="padding-left: 5px;">JML. <?php 
                          if(isset($barang)) {
                            echo strtoupper($barang[0]->satuan_kecil);
                          } ?> KELUAR</th>                          
                          <th class="sum" style="padding-left: 5px;">HARGA KELUAR</th>
                          <th class="sum" style="padding-left: 5px;">SUBTOTAL KELUAR</th>
                          <th> </th>
                          <th></th>
                          <th></th>  
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                  
      </div>
		</div>
	</div>
	
</body>
<script type="text/javascript">
	window.print();
</script>
</html>