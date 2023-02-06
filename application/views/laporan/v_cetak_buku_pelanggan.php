<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CETAK BUKU PELANGGAN - <?php echo strtoupper(date('d M Y')); ?></title>
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
				<h3>CETAK BUKU PELANGGAN - <?php echo strtoupper($pelanggan[0]->kode); ?></h3>
            <p>PERIODE:  <?php echo strtoupper($this->input->get('fromtanggal')); ?> - <?php echo strtoupper($this->input->get('untiltanggal')); ?><br/>TANGGAL CETAK: <?php echo strtoupper(date('d F Y')); ?></p>
			</div>

			<div class="col-md-12">
                  
                    <table id="example2"  class="table table-bordered table-hover" >
                        <thead>
                        <tr>
                          <th style="" >TGL. TRF.</th>
                          <th style="width: 10%">NO. TRANS.</th>
                          <th >KET.</th>
                          <th >GUDANG</th>
                          <th>VALUTA</th>
                          <th>COLLY BELI</th>
                          <th>JML BELI</th>
                          <th>HARGA BELI</th>
                          <th>JML KREDIT</th>
                          <th>COLLY JUAL</th>
                          <th>JML JUAL</th>
                          <th>HARGA JUAL</th>
                          <th>JML DEBIT</th>
                          <th >SALDO COLLY</th>
                          <th >SALDO KG</th>
                          <th style="width: 12%">SALDO AKHIR</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($result))  { 
                          if($this->input->get('tampil_saldo_awal') == 'ya') {  
                            ?>
                          <tr>
                            <td ></td>
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
                               }; 
                               } ?></td>
                               <td><?php 
                               if(isset($saldojumlah)) {
                            $h = strval($saldojumlah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; 
                               } ?></td>
                               <td><?php 
                               if(isset($saldoawal)) {
                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; }  ?></td>
                          </tr>
                          <?php
                          } 

                          foreach($result as $key => $b) { ?>
                          <tr>
                            <td style=" white-space: nowrap;
    
" ><?php echo strtoupper(strftime("%d %b %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                            <td><?php echo strtoupper($b->tipetrans); ?></td>
                            <td><?php echo strtoupper($b->gudang); ?></td>
                            <td><?php echo strtoupper($b->valuta); ?></td>
                            <td><?php 
                            if($b->collybeli != '') {
                               $h = strval($b->collybeli);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->jmlbeli != '') {
                               $h = strval($b->jmlbeli);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->hargabeli != '') {
                               $h = strval($b->hargabeli);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->kredit != '') {
                               $h = strval($b->kredit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->collyjual != '') {
                               $h = strval($b->collyjual);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->jmljual != '') {
                               $h = strval($b->jmljual);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->hargajual != '') {
                               $h = strval($b->hargajual);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td><?php 
                            if($b->debit != '') {
                               $h = strval($b->debit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               };  
                             } ?></td>
                             <td>
                               <?php 
                               if($b->jenistrans == 'JUAL') { 
                                $saldocolly -= $b->collyjual;
                               } else if($b->jenistrans == 'JUAL SAHAM') { 
                                $saldocolly -= $b->collyjual;
                               } else if($b->jenistrans == 'BELI') {
                                $saldocolly += $b->collybeli;
                               } else if($b->jenistrans == 'BELI SAHAM') {
                                $saldocolly += $b->collybeli;
                               } else if( $b->jenistrans == 'RETURBELI') {
                                $saldocolly -= $b->collyjual;
                               } else if($b->jenistrans == 'RETURJUAL') {
                                $saldocolly += $b->collybeli;
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
                               if($b->jenistrans == 'JUAL') { 
                                $saldojumlah -= $b->jmljual;
                               } else if($b->jenistrans == 'JUAL SAHAM') { 
                                $saldojumlah -= $b->jmljual;
                               } else if($b->jenistrans == 'BELI') {
                                $saldojumlah += $b->jmlbeli;
                               } else if($b->jenistrans == 'BELI SAHAM') {
                                $saldojumlah += $b->jmlbeli;
                               } else if( $b->jenistrans == 'RETURBELI') {
                                $saldojumlah -= $b->jmljual;
                               } else if($b->jenistrans == 'RETURJUAL') {
                                $saldojumlah += $b->jmlbeli;
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
                              <?php if($b->debit !='') { 
                                $saldoawal += $b->debit;
                              } else if($b->kredit != '') {
                                $saldoawal -= $b->kredit;
                              } 

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