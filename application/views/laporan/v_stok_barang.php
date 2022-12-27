  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LAPORAN STOK BARANG</h1>
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
            <form method="get" action="<?php echo base_url('laporan/stokbarang'); ?>" id="formsubmit" value="tes">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="idbarang">KODE BARANG</label>
                        <div class="input-group">
                          <input type="text" class="form-control" autofocus id="idbarang" name="idbarang" value="<?php echo $this->input->get('idbarang'); ?>" />
                          <div class="input-group-append" >
                            <button type="button"  data-toggle="modal" data-target="#modal-lg-rekening" class="btn btn-info btn-flat"><i class="fas fa-search"></i> CARI BARANG</button>
                          </div>

                        </div>
                        <?php if(isset($barang)) { ?>
                        <span class="help-block text-gray" id="inforekening"><?php echo strtoupper($barang[0]->nama); ?></span>
                      <?php } else { ?> 
                        <span class="help-block text-gray" id="inforekening" style="display:none;">INFO REKENING</span>                      
                        <?php } ?>
                      <input type="hidden" value="true" name="formsubmit"/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="idrekening">GUDANG</label>
                        <div class="input-group">
                        <select class="form-control gudang" name="gudang">
                          <option value="">SEMUA GUDANG</option>
                          <?php foreach($gudang as $key) { ?>
                          <option value="<?php echo $key->idgudang; ?>" <?php if($this->input->get('gudang') == $key->idgudang) { echo 'selected'; }  ?>><?php echo strtoupper($key->nama); ?></option>                          
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <label for="idrekening">&nbsp;</label>
                        <div class="input-group">

                           <button type="submit" name="btnquicksubmit" id="btnquicksubmit" value="submit" id="loadlink" class="btn mr-1 btn-flat btn-primary"><i class="fas fa-external-link-alt"></i> </button>
                          
                        <a target="_blank" href="<?php echo base_url('laporan/cetakstokbarang?'.$_SERVER['QUERY_STRING']); ?>" class="btn btn-flat btn-primary"><i class="fas fa-print"></i> </a>
                      </div>
                    </div>
                    
                    <div class="col-md-3">
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
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="untiltanggal">DGN. SALDO AWAL</label>
                          <select class="form-control" id="tampil_saldo_awal" name="tampil_saldo_awal">
                            <option value="ya" <?php if($this->input->get('tampil_saldo_awal') =='ya') { echo 'selected'; } ?>>YA</option>
                            <option value="tidak" <?php if($this->input->get('tampil_saldo_awal') =='tidak') { echo 'selected'; } ?>>TIDAK</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                          <label for="untiltanggal">DGN. HARGA</label>
                          <select class="form-control" id="tampil_harga" name="tampil_harga">
                            <option value="ya" <?php if($this->input->get('tampil_harga') =='ya') { echo 'selected'; } ?>>YA</option>
                            <option value="tidak" <?php if($this->input->get('tampil_harga') =='tidak') { echo 'selected'; } ?>>TIDAK</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12" style="overflow: auto;">
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
                                echo ','.$arr[1];
                               }; } ?></td>
                               <td><?php 
                            if(isset($saldojumlah)) {
                            $h = strval($saldojumlah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }; } ?></td>
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
                          //print_r($result);
                          foreach($result as $key => $b) { ?>
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
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jmlsatuankecilmasuk != '') {
                                $h = strval($b->jmlsatuankecilmasuk);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
                          <td>
                            <?php 
                            if($b->hargamasuk != '') {
                              $h = strval($b->hargamasuk);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.$arr[1];
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
                                echo ','.$arr[1];
                               }; } ?></td>
                            <td><?php if($b->jmlsatuankecilkeluar != '') {
                                $h = strval($b->jmlsatuankecilkeluar);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
                          <td>
                            <?php 
                            if($b->hargakeluar != '') {
                              $h = strval($b->hargakeluar);
                                 $arr = explode(".", $h);
                               
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.$arr[1];
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
                                $saldocolly += $b->jmlsatuanbesarkeluar;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldocolly -= $b->jmlsatuanbesarmasuk;
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
                                  echo ','.$arr[1];
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
                                $saldojumlah += $b->jmlsatuankecilkeluar;
                               } else if($b->tipetrans == 'RETURJUAL') {
                                $saldojumlah -= $b->jmlsatuankecilmasuk;
                               }  else if($b->tipetrans == 'HILANG') {
                                $saldojumlah -= $b->jmlsatuankecilkeluar;
                               } else if($b->tipetrans=='TRANSKELUAR') {
                                $saldocolly -= $b->jmlsatuankecilkeluar;                                
                               } else if($b->tipetrans=='TRANSMASUK') {
                                $saldocolly += $b->jmlsatuankecilmasuk;                                
                               }

                               $h = strval($saldojumlah);

                                 $arr = explode(".", $h);
                              //  echo $h.'<br/>';
                                 echo number_format($arr[0],0,",",".");
                                 if(count($arr) > 1) {
                                  echo ','.$arr[1];
                                 };
                               ?>
                             </td>
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
          <h4 class="modal-title" id='title_modal'>CARI BARANG</h4>
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
                <span class="help-block text-gray">CARI KODE / NAMA</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NAMA BARANG</th>
                    <th>KETERANGAN</th>
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