  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LAPORAN BUKU BANK</h1>
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
            <form method="get" action="<?php echo base_url('laporan/bukubank'); ?>" id="formsubmit" value="tes">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label for="idrekening">KODE REKENING</label>
                        <div class="input-group">
                          <input type="text" class="form-control" autofocus id="idrekening" name="idrekening" value="<?php echo $this->input->get('idrekening'); ?>" />
                          <div class="input-group-append" >
                            <button type="button"  data-toggle="modal" data-target="#modal-lg-rekening" class="btn btn-info btn-flat"><i class="fas fa-search"></i> CARI REKENING</button>
                          </div>

                        </div>
                        <?php if(isset($rekening)) { ?>
                        <span class="help-block text-gray" id="inforekening">ACC NO. <?php echo strtoupper($rekening[0]->nomor).' ('.strtoupper($rekening[0]->bank).')'; ?></span>
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
                          
                        <a target="_blank" href="<?php echo base_url('laporan/cetakbukubank?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> </a>

                        
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
                          <th class="sum">DEBET</th>
                          <th class="sum">KREDIT</th>
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
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                          </tr>
                          <?php
                          } 

                          foreach($result as $key => $b) { ?>
                          <tr>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->inisialkode.$b->nomor_nota); ?></td>
                            <td><?php echo strtoupper($b->keterangantrans); ?></td>
                            <td><?php echo strtoupper($b->kode); ?></td>
                            <td><?php echo strtoupper($b->keterangan); ?></td>
                            <td><?php if($b->debit != '') { 
                              $saldoawal += $b->debit;
                              $h = strval($b->debit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,".",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }; } ?></td>
                            <td><?php if($b->kredit != '') {
                              $saldoawal -= $b->kredit; 
                                $h = strval($b->kredit);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,".",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }
                             } ?></td>
                          <td>
                            <?php 
                            $h = strval($saldoawal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,".",".");
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
                          <th></th>
                          <th></th>
                          <th></th>
                          <th ></th>
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


<div class="modal fade" id="modal-lg-rekening">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI REKENING</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="carirekening">CARI</label>
                <input type="text" class="form-control" id="carirekening" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI NOMOR REKENING / BANK / KODE</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NO. REKENING</th>
                    <th>BANK</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilcarirekening">
                    <tr>
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