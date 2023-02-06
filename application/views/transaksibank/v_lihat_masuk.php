  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LIHAT TRANSAKSI MASUK</h1>
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
            <form method="get" action="<?php echo base_url('transaksibank/lihat'); ?>" id="formlihatpenjualan">
              <div class="card">
                <div class="card-header" >
                  <div class='col-md-12 d-flex justify-content-between'>
                    <h3 class="card-title">DATA TRANSAKSI MASUK</h3> <a href="<?php echo base_url('transaksibank/tambahmasuk'); ?>" class="btn btn-primary btn-sm" id="btnadd" >TAMBAH TRANSAKSI MASUK</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nomor_nota">CARI</label>
                        <input type="text" required name="nomor_nota" class="form-control" id="nomor_nota" placeholder="" <?php 
                        if($this->input->get('nomor_nota')) { echo 'value="'.$this->input->get('nomor_nota').'"'; } 
                      ?>>
                      <span class="help-block text-gray">( NOMOR NOTA / REK. ASAL / REK. TUJUAN )</span>
                        <input type="hidden" value="true" name="formsubmit"/>
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
                    <div class="col-md-2">
                      <div class="form-group">
                          <label for="untiltanggal">JENIS</label>
                          <select class="form-control" id="jenis_transaksi" name="jenis_transaksi">
                            <option value="semua" <?php if($this->input->get('jenis_transaksi') =='semua') { echo 'selected'; } ?>>SEMUA</option>
                            <option value="masuk" <?php if($this->input->get('jenis_transaksi') =='masuk') { echo 'selected'; } ?>>MASUK</option>
                            <option value="keluar" <?php if($this->input->get('jenis_transaksi') =='keluar') { echo 'selected'; } ?>>KELUAR</option>
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
                          <th>NO. NOTA</th>
                          <th>REKENING ASAL</th>
                          <th>REKENING TUJUAN</th>
                          <th>TANGGAL</th>
                          <th>NOMINAL</th>
                          <th>JENIS</th>
                          <th width="18%;">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach($penjualan as $key => $b) { ?>
                          <tr>
                            <td><?php if($b->jenis_transaksi == 'masuk' ) { echo 'KM';  } else { echo 'KK'; } ?><?php echo $b->idtransfer; ?></td>
                            <td><?php echo strtoupper($b->rekeningkode).' ('.strtoupper($b->rekeningbank).')'; ?></td>
                            <td><?php echo strtoupper($b->rekeningnomortujuan).' ('.strtoupper($b->rekeningbanktujuan).')'; ?></td>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php
                            if($b->nominal !='') {
                               $h = strval($b->nominal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.substr($arr[1],0,2);
                               }
                             } ?></td>
                            <td><?php echo strtoupper($b->jenis_transaksi); ?></td>
                          <td>
                            <?php if($b->jenis_transaksi == 'masuk') { ?>
                            <a href="<?php echo base_url('transaksibank/tambahmasuk?id='.$b->idtransfer); ?>" class="btn btn-info btn-sm btnedit"><i class="far fa-edit nav-icon"></i> EDIT</a>
                            <?php } else { ?>
                            <a href="<?php echo base_url('transaksibank/tambahkeluar?id='.$b->idtransfer); ?>" class="btn btn-info btn-sm btnedit"><i class="far fa-edit nav-icon"></i> EDIT</a>
                            <?php } ?>

                          <a href="<?php echo base_url('transaksibank/del/'.$b->idtransfer); ?>" class="btn btn-danger btn-sm btntrash" onclick="return confirm('YAKIN HAPUS?');"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
                          </td>
                        </tr>
                         <?php } 
                          ?>
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