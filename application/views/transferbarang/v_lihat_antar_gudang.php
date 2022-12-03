  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">LIHAT TRANSFER ANTAR GUDANG</h1>
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
            <form method="get" action="<?php echo base_url('transferbarang/lihat'); ?>" id="formlihatpenjualan">
              <div class="card">
                <div class="card-header" >
                  <div class='col-md-12 d-flex justify-content-between'>
                    <h3 class="card-title">DATA TRANSFER ANTAR GUDANG</h3> <a href="<?php echo base_url('transferbarang/tambahantargudang'); ?>" class="btn btn-primary btn-sm" id="btnadd" >TAMBAH TRANSFER ANTAR GUDANG</a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nomor_nota">CARI</label>
                        <input type="text" required name="nomor_nota" class="form-control" id="nomor_nota" placeholder="" <?php 
                        if($this->input->get('nomor_nota')) { echo 'value="'.$this->input->get('nomor_nota').'"'; } 
                      ?>>
                      <span class="help-block text-gray">( NOMOR NOTA / GUDANG / BARANG )</span>
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
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                  <table>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>NO. NOTA</th>
                          <th>TANGGAL</th>
                          <th>BARANG</th>
                          <th>JML. BESAR</th>
                          <th>JML. KECIL</th>
                          <th>GUDANG ASAL</th>
                          <th>GUDANG TUJUAN</th>
                          <th width="18%;">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php 
                          foreach($penjualan as $key => $b) { ?>
                          <tr>
                            <td>TR<?php echo strtoupper($b->nomor_nota); ?></td>
                            <td><?php echo strtoupper(strftime("%d %B %Y", strtotime($b->tanggal))); ?></td>
                            <td><?php echo strtoupper($b->kode).' ('.strtoupper($b->nama).')'; ?></td>
                            <td><?php
                            if($b->jumlah_besar !='') {
                               $h = strval($b->jumlah_besar);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }

                               echo ' '.strtoupper($b->satuan_besar);
                             } ?></td>
                             <td><?php
                            if($b->jumlah_kecil !='') {
                               $h = strval($b->jumlah_kecil);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }

                               echo ' '.strtoupper($b->satuan_kecil);
                             } ?></td>
                            <td><?php echo strtoupper($b->namagudangasal); ?></td>
                             <td><?php echo strtoupper($b->namagudangtujuan); ?></td>
                          <td>
                            
                            <a href="<?php echo base_url('transferbarang/tambahantargudang?id='.$b->nomor_nota); ?>" class="btn btn-info btn-sm btnedit"><i class="far fa-edit nav-icon"></i> EDIT</a>
                           

                          <a href="<?php echo base_url('transferbarang/del/'.$b->nomor_nota); ?>" class="btn btn-danger btn-sm btntrash" onclick="return confirm('YAKIN HAPUS?');"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
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