  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MASTER BARANG</h1>
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
            <div class="card">
              <div class="card-header" >
                <div class='col-md-12 d-flex justify-content-between'>
                  <h3 class="card-title">DATA MASTER BARANG</h3> <a href="#" class="btn btn-primary btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-lg">TAMBAH BARANG</a>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>KODE BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>MIN. STOK</th>
                        <th>SATUAN BESAR</th>
                        <th>SATUAN KECIL</th>
                        <th  style="width:15%">AKSI</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($barang as $b) { ?>
                        <tr>
                        <td><?php echo strtoupper($b->kode); ?></td>
                        <td><?php echo strtoupper($b->nama); ?></td>
                        <td><?php
                            if($b->min_stok !='') {
                               $h = strval($b->min_stok);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
                        <td><?php echo strtoupper($b->satuan_besar); ?></td>
                        <td><?php echo strtoupper($b->satuan_kecil); ?></td>
                        <td class="text-center"><a href="#" barangid="<?php echo $b->idbarang; ?>" data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-sm btnedit" style="padding: 0 5px;"><i class="far fa-edit nav-icon"></i> EDIT</a>

                        <a href="<?php echo base_url('barang/del/'.$b->idbarang); ?>" class="btn btn-danger btn-sm btntrash" onclick="return confirm('Yakin hapus?');" style="padding: 0 5px;"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
                        </td>
                      </tr>
                       <?php } 
                        ?>
                      </tbody>
                    </table>
                </table>
              </div>
            </div>

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

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <form action="<?php echo base_url('barang'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>TAMBAH BARANG</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
               <input type="hidden" name="hididbarang" id="hididbarang" />
              <div class="form-group">
                <label for="kode">KODE BARANG</label>
                <input type="text" required  name="kode" class="form-control" id="kode" placeholder="">
              </div>

              <div class="form-group">
                <label for="nama">NAMA BARANG</label>
                <input type="text" required name="nama" class="form-control" id="nama" placeholder="">
              </div>

              <div class="form-group">
                <label>KETERANGAN</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
              </div>

              <div class="form-group">
                <label for="min_stok">MINIMUM STOK</label>
                <input type="text" required name="min_stok" step="1" min="1" class="form-control" id="min_stok" placeholder="" value="1">
              </div>

              <div class="form-group">
                <label for="satuan_besar">SATUAN BESAR</label>
                <input type="text" required name="satuan_besar" class="form-control" id="satuan_besar" placeholder="">
              </div>

              <div class="form-group">
                <label for="satuan_kecil">SATUAN TERKECIL</label>
                <input type="text" required name="satuan_kecil" class="form-control" id="satuan_kecil" placeholder="">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="satuan_kecil">BARANG SERUPA</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE BARANG</th>
                    <th>NAMA BARANG</th>
                    </tr>
                  </thead>
                  <tbody id="tableserupa">
                    <tr>
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
          <button type="submit" class="btn btn-primary" name="btnsubmit" value="submit">SAVE CHANGES</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>