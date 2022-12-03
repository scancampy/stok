w<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CETAK BUKU BANK - <?php echo strtoupper(date('d M Y')); ?></title>
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
				<h3>CETAK BUKU BANK - <?php echo strtoupper($rekening[0]->kode); ?></h3>
        <p>PERIODE:  <?php echo strtoupper($this->input->get('fromtanggal')); ?> - <?php echo strtoupper($this->input->get('untiltanggal')); ?><br/>TANGGAL CETAK: <?php echo strtoupper(date('d F Y')); ?></p>
			</div>

			<div class="col-md-12">
                  <table>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th width="15%">TGL. TRANS.</th>
                          <th>NO. TRANS.</th>
                          <th>JENIS TRANSAKSI</th>
                          <th>NAMA</th>
                          <th>KETERANGAN</th>
                          <th>DEBET</th>
                          <th>KREDIT</th>
                          <th >SALDO AKHIR</th>
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
                             <td><?php 
                            if(isset($saldoawal)) {
                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                          </tr>
                          <?php
                          } 

                          foreach($result as $key => $b) { ?>
                          <tr>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                            <td><?php echo strtoupper($b->keterangantrans.' '.$b->kode); ?></td>
                            <td><?php echo strtoupper($b->koderek); ?></td>
                            <td><?php echo strtoupper($b->keterangan); ?></td>
                            <td><?php if($b->debit != '') { 
                              $saldoawal += $b->debit;
                              $h = strval($b->debit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->kredit != '') {
                              $saldoawal -= $b->kredit; 
                                $h = strval($b->kredit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
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