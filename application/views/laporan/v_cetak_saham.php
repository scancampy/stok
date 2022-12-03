<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CETAK SAHAM - <?php echo strtoupper(date('d M Y')); ?></title>
  <link rel="stylesheet" href="<?php echo base_url('css/adminlte.min.css'); ?>">
  <style type="text/css">
  	@media print{ @page { size: landscape;  } }

  	table { font-size: 9pt; }
  </style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>CETAK SAHAM - <?php echo strtoupper($saham[0]->kode); ?></h3>
        <p>PERIODE:  <?php echo strtoupper($this->input->get('fromtanggal')); ?> - <?php echo strtoupper($this->input->get('untiltanggal')); ?><br/>TANGGAL CETAK: <?php echo strtoupper(date('d F Y')); ?></p>
			</div>

			<div class="col-md-12">
                  <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th width="15%">TANGGAL</th>
                          <th>NOMOR NOTA</th>
                          <th>JML. <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_besar);
                          } ?> BELI</th>
                          <th>JML. <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_kecil);
                          } ?> BELI</th>
                          <th >HARGA BELI</th>
                          <th >SUBTOTAL BELI</th>
                          <th>JML. <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_besar);
                          } ?> JUAL</th>
                          <th>JML. <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_kecil);
                          } ?> JUAL</th>                          
                          <th >HARGA JUAL</th>
                          <th >SUBTOTAL JUAL</th>
                          <th>SALDO <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_besar);
                          } ?></th>
                          <th>SALDO <?php 
                          if(isset($saham)) {
                            echo strtoupper($saham[0]->satuan_kecil);
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
                            <td></td>
                            <td>NILAI AWAL</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                               <td></td>
                               <td></td>
                               <td><?php 

                            $h = strval($saldocolly);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; ?></td>
                               <td><?php 

                            $h = strval($saldojumlah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; ?></td>
                               <td><?php 

                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; ?></td>
                          </tr>
                          <?php
                          } 

                          foreach($result as $key => $b) { ?>
                          <tr>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                             <td><?php if($b->jenistrans == 'BELI') { 
                              
                              $h = strval($b->jmlsatuanbesarbeli);
                               $arr = explode(".", $h);
                               $saldocolly -= $b->jmlsatuanbesarbeli;
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jenistrans == 'BELI') { 
                              
                              $h = strval($b->jmlsatuankecilbeli);
                              $saldojumlah -= $b->jmlsatuankecilbeli;
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jenistrans == 'BELI') { 
                              
                              $h = strval($b->hargabeli);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                             <td><?php if($b->jenistrans == 'BELI') { 
                              $saldoawal -= $b->subtotalbeli;
                              $h = strval($b->subtotalbeli);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                               <td><?php if($b->jenistrans == 'JUAL') { 
                              
                              $h = strval($b->jmlsatuanbesarjual);
                               $arr = explode(".", $h);
                               $saldocolly += $b->jmlsatuanbesarjual;
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jenistrans == 'JUAL') { 
                              
                              $h = strval($b->jmlsatuankeciljual);

                              $saldojumlah += $b->jmlsatuankeciljual;
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jenistrans == 'JUAL') { 
                              
                              $h = strval($b->hargajual);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                             <td><?php if($b->jenistrans == 'JUAL') { 
                              $saldoawal += $b->subtotaljual;
                              $h = strval($b->subtotaljual);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php
                                $h = strval($saldocolly);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                              ?></td>
                              <td><?php
                                $h = strval($saldojumlah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                              ?></td>
                             
                          <td>
                            <?php 
                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
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
	</div>
	
</body>
<script type="text/javascript">
	window.print();
</script>
</html>