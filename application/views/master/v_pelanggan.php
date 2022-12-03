  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MASTER PELANGGAN</h1>
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
                  <h3 class="card-title">DATA MASTER PELANGGAN</h3> <a href="#" class="btn btn-primary btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-lg">TAMBAH PELANGGAN</a>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>KODE PELANGGAN</th>
                        <th>NAMA</th>
                        <th>KOTA</th>
                        <th>KETERANGAN</th>
                        <th style="width:15%">AKSI</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($pelanggan as $b) { ?>
                        <tr>
                        <td><?php echo strtoupper($b->kode); ?></td>
                        <td><?php echo strtoupper($b->nama); ?></td>
                        <td><?php echo strtoupper($b->namakota); ?></td>
                        <td><?php echo strtoupper($b->keterangan); ?></td>
                        <td class="text-center"><a href="#" pelangganid="<?php echo $b->idpelanggan; ?>" data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-sm btnedit" style="padding: 0 5px;"><i class="far fa-edit nav-icon"></i> EDIT</a>

                        <a href="<?php echo base_url('pelanggan/del/'.$b->idpelanggan); ?>" style="padding: 0 5px;" class="btn btn-danger btn-sm btntrash" onclick="return confirm('YAKIN HAPUS?');"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
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
    <form action="<?php echo base_url('pelanggan'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>TAMBAH PELANGGAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
               <input type="hidden" name="hididpelanggan" id="hididpelanggan" />
              <div class="form-group">
                <label for="kode">KODE PELANGGAN</label>
                <input type="text" style="text-transform: uppercase;" required name="kode" class="form-control" id="kode" placeholder="">
              </div>

              <div class="form-group">
                <label for="nama">NAMA PELANGGAN</label>
                <input type="text" required style="text-transform: uppercase;" name="nama" class="form-control" id="nama" placeholder="">
              </div>

              <div class="form-group">
                <label for="contact_person">CONTACT PERSON</label>
                <input type="text" required style="text-transform: uppercase;" name="contact_person" class="form-control" id="contact_person" placeholder="">
              </div>

              <div class="form-group">
                <label for="idkota">KOTA</label>
                <select class="custom-select rounded-0" id="idkota" name="idkota">
                  <?php foreach($kota as $k) { ?>
                  <option value="<?php echo $k->idkota; ?>"><?php echo strtoupper($k->nama); ?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>ALAMAT</label>
                <textarea class="form-control" style="text-transform: uppercase;" name="alamat" id="alamat" rows="3" placeholder=""></textarea>
              </div>

              <div class="form-group">
                <label>KETERANGAN</label>
                <textarea class="form-control" style="text-transform: uppercase;" name="keterangan" id="keterangan" rows="3" placeholder=""></textarea>
              </div>

              <div class="form-group">
                <label for="telepon">TELEPON</label>
                <input type="text" name="telepon" style="text-transform: uppercase;" class="form-control" id="telepon" placeholder="">
              </div>

              <div class="form-group">
                <label for="saldo_awal">SALDO AWAL</label>
                <input type="text" min="0" name="saldo_awal" class="form-control" id="saldo_awal" placeholder="">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="satuan_kecil">PELANGGAN SERUPA</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE PELANGGAN</th>
                    <th>NAMA PELANGGAN</th>
                    </tr>
                  </thead>
                  <tbody id="tablepelangganserupa">
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