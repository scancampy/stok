  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LAPORAN BUKU PELANGGAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">HOME</a></li>
              <li class="breadcrumb-item active">DASHBOARD</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <form method="get" action="<?php echo base_url('laporan/bukupelanggan'); ?>" id="formsubmit" value="tes">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label for="idpelanggan">KODE PELANGGAN</label>
                        <div class="input-group">
                          <input type="text" class="form-control" autofocus id="idpelanggan" name="idpelanggan" value="<?php echo $this->input->get('idpelanggan'); ?>" />
                          <div class="input-group-append" >
                            <button type="button"  data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-flat"><i class="fas fa-search"></i> CARI PELANGGAN</button>
                          </div>

                        </div>
                        <?php if(isset($pelanggan)) { ?>
                        <span class="help-block text-gray" id="inforekening">
                           CONTACT PERSON : <?php echo strtoupper($pelanggan[0]->contact_person); ?>
                        <br/>TELEPON   : <?php echo strtoupper($pelanggan[0]->telepon); ?>

                        </span>
                      <?php } else { ?> 
                        <span class="help-block text-gray" id="inforekening" style="display:none;">INFO REKENING</span>                      
                        <?php } ?>
                      <input type="hidden" value="true" name="formsubmit"/>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <label for="idrekening">&nbsp;</label>
                        <div class="input-group">

                          <button type="submit" name="btnquicksubmit" id="btnquicksubmit" value="submit" id="loadlink" class="btn mr-1 btn-flat btn-primary"><i class="fas fa-external-link-alt"></i> </button>
                          
                        <a target="_blank" href="<?php echo base_url('laporan/cetakbukupelanggan?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> </a>
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="fromtanggal">DARI TANGGAL</label>
                         <div class="input-group date" id="fromtanggal" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input fromtanggal"  id="fromtanggal" name="fromtanggal" data-target="#fromtanggal" value="<?php 
                            if($this->input->get('fromtanggal')) { 
                              echo $this->input->get('fromtanggal');
                            } else {
                              echo date('01 F Y'); 
                            } ?>" />
                            <div class="input-group-append" data-target="#fromtanggal" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="untiltanggal">SAMPAI TANGGAL</label>
                         <div class="input-group date" id="untiltanggal" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input untiltanggal"  id="untiltanggal" name="untiltanggal" data-target="#untiltanggal" value="<?php 
                            if($this->input->get('untiltanggal')) { 
                              echo $this->input->get('untiltanggal');
                            } else {
                              echo date('d F Y'); 
                            } ?>"/>
                            <div class="input-group-append" data-target="#untiltanggal" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="untiltanggal">TAMPILKAN SALDO AWAL</label>
                          <select class="form-control" id="tampil_saldo_awal" name="tampil_saldo_awal">
                            <option value="ya" <?php if($this->input->get('tampil_saldo_awal') =='ya') { echo 'selected'; } ?>>YA</option>
                            <option value="tidak" <?php if($this->input->get('tampil_saldo_awal') =='tidak') { echo 'selected'; } ?>>TIDAK</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="overflow: auto;">
                   
                    <table id="example2"  class="table table-bordered table-hover" >
                        <thead>
                        <tr>
                          <th style="" >TGL. TRF.</th>
                          <th style="width: 10%">NO. TRANS.</th>
                          <th >KET.</th>
                          <th >GUDANG</th>
                          <th>VALUTA</th>
                          <th class="sum">COLLY BELI</th>
                          <th class="sum">JML BELI</th>
                          <th class="sum">HARGA BELI</th>
                          <th class="sum">JML KREDIT</th>
                          <th class="sum">COLLY JUAL</th>
                          <th class="sum">JML JUAL</th>
                          <th class="sum">HARGA JUAL</th>
                          <th class="sum">JML DEBIT</th>
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
                        <tfoot>
                        <tr>
                          <th style="" ></th>
                          <th style="width: 10%"></th>
                          <th ></th>
                          <th ></th>
                          <th></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th class="sum"></th>
                          <th ></th>
                          <th ></th>
                          <th style="width: 12%"></th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                </div>
              </div>
          </form>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI PELANGGAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
               <input type="hidden" name="hididbarang" id="hididbarang" />
              <div class="form-group">
                <label for="cari">CARI</label>
                <input type="text" class="form-control" id="cari" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI KODE / NAMA / CONTACT PERSON / ALAMAT / TELEPON PELANGGAN</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>KODE</th>
                    <th>NAMA PELANGGAN</th>
                    <th>CONTACT PERSON</th>
                    <th>TELEPON</th>
                    <th>KETERANGAN</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilpelanggan">
                    <tr>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                      <td>-</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
        </div>
      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<style type="text/css">
  table td { padding: 0px; }

  


</style>