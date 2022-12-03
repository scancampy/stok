  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">BACKUP &amp; RESTORE</h1>
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
    <form method="post" action="<?php echo base_url('backuprestore'); ?>" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          
            <div class="col-md-6">
              <div class="card">
                <div class="card-header" >
                  <div class='col-md-12 d-flex justify-content-between'>
                    <h3 class="card-title">BACKUP DB</h3>
                  </div>
                </div>
                <div class="card-body">
                  <p>TEKAN TOMBOL UNTUK MULAI MELAKUKAN BACKUP DATABASE</p>
                  <button value="submit" name="btnbackup" class="btn btn-primary">BACKUP DATABASE</button>
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header" >
                  <div class='col-md-12 d-flex justify-content-between'>
                    <h3 class="card-title">RESTORE DB</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="filerestore">UPLOAD FILE BACKUP</label>
                    <input type="file"  name="filerestore"  class="form-control" id="filerestore" />
                  </div>
                  <button value="submit" name="btnrestore" class="btn btn-primary">RESTORE DATABASE</button>
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

          </form>
  </div>
  <!-- /.content-wrapper -->

