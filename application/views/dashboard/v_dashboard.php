  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SELAMAT DATANG</h1>
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
            
<div class="col-md-12">
            <!-- Application buttons -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">AKSES CEPAT</h3>
              </div>
              <div class="card-body">
                
                <a class="btn btn-app" href="<?php echo base_url('penjualan/tambah'); ?>">
                  <i class=" fas fa-dolly-flatbed"></i> TAMBAH PENJUALAN
                </a>
                <a class="btn btn-app" href="<?php echo base_url('penjualan/tambahretur'); ?>">
                  <i class=" fas fa-dolly-flatbed"></i> RETUR PENJUALAN
                </a>
                 <a class="btn btn-app" href="<?php echo base_url('pembelian/tambah'); ?>">
                  <i class=" fas fa-truck-loading"></i> TAMBAH PEMBELIAN
                </a>
                 <a class="btn btn-app" href="<?php echo base_url('pembelian/tambahretur'); ?>">
                  <i class=" fas fa-truck-loading"></i> RETUR PEMBELIAN
                </a>
                <a class="btn btn-app" href="<?php echo base_url('hutangpiutang/tambahhutang'); ?>">
                  <i class=" fas fa-book" ></i> PEMBAYARAN HUTANG
                </a>
                <a class="btn btn-app" href="<?php echo base_url('hutangpiutang/tambahpiutang'); ?>">
                  <i class=" fas fa-book"></i> PEMBAYARAN PIUTANG
                </a>
                <a class="btn btn-app" href="<?php echo base_url('transaksibank/tambahmasuk'); ?>">
                  <i class="  fas fa-chart-pie"></i> TRANSAKSI MASUK
                </a>
                <a class="btn btn-app" href="<?php echo base_url('transaksibank/tambahkeluar'); ?>">
                  <i class="  fas fa-chart-pie"></i> TRANSAKSI KELUAR
                </a>
                <a class="btn btn-app" href="<?php echo base_url('transferbarang/tambahantargudang'); ?>">
                  <i class="  fas fa-people-carry"></i> PINDAH GUDANG
                </a>
                <a class="btn btn-app" href="<?php echo base_url('transferbarang/tambahbaranghilang'); ?>">
                  <i class="  fas fa-people-carry"></i> BARANG RUSAK
                </a>
                

                <p>LAPORAN</p>
                <a class="btn btn-app bg-primary" href="<?php echo base_url('laporan/bukupelanggan'); ?>">
                  <i class="fas fa-users"></i> BUKU PELANGGAN
                </a>
                <a class="btn btn-app bg-success" href="<?php echo base_url('laporan/bukubank'); ?>">
                  <i class=" fas fa-chart-pie"></i> BUKU BANK
                </a>

                <a class="btn btn-app bg-info" href="<?php echo base_url('laporan/saham'); ?>">
                  <i class=" fas fa-newspaper"></i> SAHAM
                </a>
                <a class="btn btn-app bg-warning" href="<?php echo base_url('laporan/stokbarang'); ?>">
                  <i class="fas fa-boxes"></i> STOK BARANG
                </a>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

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
