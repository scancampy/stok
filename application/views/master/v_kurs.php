  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MASTER KURS</h1>
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
                  <h3 class="card-title">DATA MASTER KURS</h3> <a href="#" class="btn btn-primary btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-lg">TAMBAH KURS</a>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>NAMA KURS</th>
                        <th>LAMBANG</th>
                        <th>NILAI RUPIAH</th>
                        <th width="15%;">AKSI</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($kurs as $b) { ?>
                        <tr>
                        <td><?php echo strtoupper($b->nama); ?></td>                        
                        <td><?php echo strtoupper($b->lambang); ?></td>
                        <td><?php
                            if($b->nilai_rupiah !='') {
                               $h = strval($b->nilai_rupiah);
                               $arr = explode(".", $h);
                             
                               echo number_format($arr[0],2,",",".");
                               if(count($arr) > 1) {
                                echo ','.$arr[1];
                               }
                             } ?></td>
                        <?php /*<td>
                        <?php if($b->urutan > 1) { ?>
                          <a href="<?php echo base_url('kurs/changeurutan/'.$b->idkurs.'/up'); ?>"><i class="far fa-arrow-alt-circle-up nav-icon"></i></a>
                        <?php } ?>
                        <?php if($b->urutan < count($kurs)) { ?>
                          <a href="<?php echo base_url('kurs/changeurutan/'.$b->idkurs.'/down'); ?>"><i class="far fa-arrow-alt-circle-down nav-icon"></i></a>
                        <?php } ?>
                        </td> */ ?>
                        <td class="text-center"><a href="#" kursid="<?php echo $b->idkurs; ?>" data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-sm btnedit" style="padding: 0 5px;"><i class="far fa-edit nav-icon"></i> EDIT</a>

                        <a href="<?php echo base_url('kurs/del/'.$b->idkurs); ?>" class="btn btn-danger btn-sm btntrash" onclick="return confirm('YAKIN HAPUS?');" style="padding: 0 5px;"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
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
    <form action="<?php echo base_url('kurs'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>TAMBAH KURS</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
               <input type="hidden" name="hididkurs" id="hididkurs" />
             
              <div class="form-group">
                <label for="nama">NAMA KURS</label>
                <input type="text" required name="nama" class="form-control" id="nama" placeholder="">
              </div>

              <div class="form-group">
                <label for="lambang">LAMBANG</label>
                <input type="text" required name="lambang" class="form-control" id="lambang" placeholder="">
              </div>

              <div class="form-group">
                <label for="nilai_rupiah">NILAI RUPIAH</label>
                <input type="text" required name="nilai_rupiah" class="form-control" id="nilai_rupiah" placeholder="">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="satuan_kecil">KURS SERUPA</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>NAMA KURS</th>
                    <th>LAMBANG</th>
                    <th>NILAI RUPIAH</th>
                    </tr>
                  </thead>
                  <tbody id="tablekursserupa">
                    <tr>
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
          <button type="submit" class="btn btn-primary" name="btnsubmit" value="submit">SAVE CHANGES</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>