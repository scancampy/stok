  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MASTER REKENING</h1>
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
                  <h3 class="card-title">DATA MASTER REKENING</h3> <a href="#" class="btn btn-primary btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-lg">TAMBAH REKENING</a>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>KODE REKENING</th>
                        <th>NO. REKENING</th>
                        <th>BANK</th>
                        <th>KETERANGAN</th>
                        <th>SALDO AWAL</th>
                        <th width="15%">AKSI</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($rekening as $b) { ?>
                        <tr>
                        <td><?php echo strtoupper($b->kode); ?></td>
                        <td><?php echo strtoupper($b->nomor); ?></td>
                        <td><?php echo strtoupper($b->bank); ?></td>
                        <td><?php echo strtoupper($b->keterangan); ?></td>
                        <td><?php
                            if($b->saldo_awal !='') {
                               $h = strval($b->saldo_awal);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],0,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
                        <td class="text-center"><a href="#" rekeningid="<?php echo $b->idrekening; ?>" data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-sm btnedit" style="padding: 0 5px;"><i class="far fa-edit nav-icon"></i> EDIT</a>

                        <a href="<?php echo base_url('rekening/del/'.$b->idrekening); ?>" style="padding: 0 5px;" class="btn btn-danger btn-sm btntrash" onclick="return confirm('Yakin hapus?');"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
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
    <form action="<?php echo base_url('rekening'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>TAMBAH REKENING</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
               <input type="hidden" name="hididrekening" id="hididrekening" />
              <div class="form-group">
                <label for="kode">KODE REKENING</label>
                <input type="text" name="kode" required class="form-control" id="kode" placeholder="">
              </div>

              <div class="form-group">
                <label for="nomor">NOMOR REKENING</label>
                <input type="text" name="nomor" required class="form-control" id="nomor" placeholder="">
              </div>

              <div class="form-group">
                <label for="bank">BANK</label>
                <input type="text" name="bank" required class="form-control" id="bank" placeholder="">
              </div>

              <div class="form-group">
                <label for="saldo_awal">SALDO AWAL</label>
                <input type="text" name="saldo_awal" class="form-control" id="saldo_awal" placeholder="">
              </div>

              <div class="form-group">
                <label>KETERANGAN</label>
                <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="satuan_kecil">REKENING SERUPA</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE REKENING</th>
                    <th>NOMOR</th>
                    <th>BANK</th>
                    </tr>
                  </thead>
                  <tbody id="tablerekeningserupa">
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