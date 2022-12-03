  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">MASTER USER</h1>
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
                  <h3 class="card-title">DATA MASTER USER</h3> <a href="#" class="btn btn-primary btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-lg">TAMBAH USER</a>
                </div>
              </div>
              <div class="card-body">
                <table>
                  <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>USERNAME</th>
                        <th>NAMA</th>
                        <th>LAST LOGIN</th>
                        <th>AKSI</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php 
                        foreach($admin as $b) { ?>
                        <tr>
                        <td><?php echo strtoupper($b->username); ?></td>
                        <td><?php echo strtoupper($b->nama); ?></td>
                        <td><?php 
                        if($b->last_login != NULL) { 
                          echo strtoupper(strftime("%d %B %Y %T", strtotime($b->last_login)));
                        } else { echo  '-'; } ?></td>
                        <td><a href="#" username="<?php echo $b->username; ?>" data-toggle="modal" data-target="#modal-lg" class="btn btn-info btn-sm btnedit"><i class="far fa-edit nav-icon"></i> EDIT</a>

                        <a href="<?php echo base_url('admin/del/'.$b->username); ?>" class="btn btn-danger btn-sm btntrash" onclick="return confirm('Yakin hapus?');"><i class="far fa-trash-alt nav-icon"></i> HAPUS</a>
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
    <form action="<?php echo base_url('admin'); ?>" method="post" id="formtambahuser">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>TAMBAH USER</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
               <input type="hidden" name="hidusername" id="hidusername" />
              <div class="form-group">
                <label for="username">USERNAME</label>
                <input type="text"  name="username" class="form-control" id="username" placeholder="">
              </div>

              <div class="form-group">
                <label for="nama">NAMA USER</label>
                <input type="text"  name="nama" class="form-control" id="nama" placeholder="">
              </div>

              <div class="form-group" id="passwordiv">
                <label for="password">PASSWORD</label>
                <input type="password"  name="password" class="form-control" id="password" placeholder="">
              </div>
              <div class="form-group" id="repasswordiv">
                <label for="repass">ULANGI PASSWORD</label>
                <input type="password"  name="repass" class="form-control" id="repass" placeholder="">
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for="satuan_kecil">USER SERUPA</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>USERNAME</th>
                    <th>NAMA USER</th>
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