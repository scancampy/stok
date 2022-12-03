
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('dashboard'); ?>" class="brand-link">
      <span class="brand-text font-weight-light">PT X</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['admin']->nama; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php if($this->uri->segment(1,0) == 'pelanggan' || $this->uri->segment(1,0) == 'barang' || $this->uri->segment(1,0) == 'kurs' || $this->uri->segment(1,0) == 'gudang' || $this->uri->segment(1,0) == 'kota' || $this->uri->segment(1,0) == 'rekening' || $this->uri->segment(1,0) == 'saham') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1,0) == 'pelanggan' || $this->uri->segment(1,0) == 'barang'  || $this->uri->segment(1,0) == 'kota' ||  $this->uri->segment(1,0) == 'kurs' || $this->uri->segment(1,0) == 'gudang' || $this->uri->segment(1,0) == 'rekening' || $this->uri->segment(1,0) == 'saham') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                MASTER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('pelanggan'); ?>" class="nav-link 
                  <?php if($this->uri->segment(1, 0) == 'pelanggan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PELANGGAN</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?php echo base_url('barang'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'barang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BARANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('kurs'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'kurs') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KURS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('kota'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'kota') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KOTA</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('gudang'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'gudang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>GUDANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('rekening'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'rekening') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>REKENING</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('saham'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'saham') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SAHAM</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'admin') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                USER
              </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1, 0) == 'penjualan') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1, 0) == 'penjualan') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-dolly-flatbed"></i>
              <p>
                PENJUALAN
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan/tambah'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambah' && $this->uri->segment(1, 0) == 'penjualan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TAMBAH PENJUALAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan/tambahretur'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahretur'  && $this->uri->segment(1, 0) == 'penjualan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TAMBAH RETUR PENJUALAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan/lihatpenjualan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatpenjualan'  && $this->uri->segment(1, 0) == 'penjualan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT PENJUALAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('penjualan/lihatreturpenjualan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatreturpenjualan'  && $this->uri->segment(1, 0) == 'penjualan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT RETUR PENJUALAN</p>
                </a>
              </li>              
            </ul>
          </li>
           <li class="nav-item <?php if($this->uri->segment(1, 0) == 'pembelian') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1, 0) == 'pembelian') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-truck-loading"></i>
              <p>
                PEMBELIAN
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('pembelian/tambah'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambah'  && $this->uri->segment(1, 0) == 'pembelian') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TAMBAH PEMBELIAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pembelian/tambahretur'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahretur'  && $this->uri->segment(1, 0) == 'pembelian') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TAMBAH RETUR PEMBELIAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pembelian/lihatpembelian'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatpembelian'  && $this->uri->segment(1, 0) == 'pembelian') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT PEMBELIAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('pembelian/lihatreturpembelian'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatreturpembelian'  && $this->uri->segment(1, 0) == 'pembelian') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT RETUR PEMBELIAN</p>
                </a>
              </li>              
            </ul>
          </li>
           <li class="nav-item <?php if($this->uri->segment(1, 0) == 'transaksisaham') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1, 0) == 'transaksisaham') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                SAHAM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('transaksisaham/jual'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'jual' && $this->uri->segment(1, 0) == 'transaksisaham') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>JUAL SAHAM</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('transaksisaham/beli'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'beli' && $this->uri->segment(1, 0) == 'transaksisaham') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BELI SAHAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transaksisaham/lihatjual'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatjual'  && $this->uri->segment(1, 0) == 'transaksisaham') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT JUAL SAHAM</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="<?php echo base_url('transaksisaham/lihatbeli'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatbeli'  && $this->uri->segment(1, 0) == 'transaksisaham') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT BELI SAHAM</p>
                </a>
              </li>             
            </ul>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1, 0) == 'hutangpiutang') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-book"></i>
              <p>
                HUTANG PIUTANG
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('hutangpiutang/tambahhutang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahhutang'  && $this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PEMBAYARAN HUTANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('hutangpiutang/tambahpiutang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahpiutang'  && $this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PEMBAYARAN PIUTANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('hutangpiutang/lihathutang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihathutang'  && $this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT HUTANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('hutangpiutang/lihatpiutang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatpiutang'  && $this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT PIUTANG</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo base_url('hutangpiutang/lihathutangpiutang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihathutangpiutang'  && $this->uri->segment(1, 0) == 'hutangpiutang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT HUTANG PIUTANG</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1, 0) == 'transaksibank') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link  <?php if($this->uri->segment(1, 0) == 'transaksibank') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                TRANSAKSI BANK
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('transaksibank/tambahmasuk'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahmasuk'  && $this->uri->segment(1, 0) == 'transaksibank') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TRANSAKSI MASUK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transaksibank/tambahkeluar'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahkeluar'  && $this->uri->segment(1, 0) == 'transaksibank') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TRANSAKSI KELUAR</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transaksibank/lihat'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihat'  && $this->uri->segment(1, 0) == 'transaksibank') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT TRANSAKSI</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item <?php if($this->uri->segment(1, 0) == 'transferbarang') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(1, 0) == 'transferbarang') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-people-carry"></i>
              <p>
                TRANSAKSI BARANG
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('transferbarang/tambahantargudang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahantargudang'  && $this->uri->segment(1, 0) == 'transferbarang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PINDAH GUDANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transferbarang/tambahbaranghilang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'tambahbaranghilang'  && $this->uri->segment(1, 0) == 'transferbarang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BARANG RUSAK/HILANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transferbarang/lihat'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihat'  && $this->uri->segment(1, 0) == 'transferbarang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT PINDAH GUDANG</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('transferbarang/lihatbaranghilang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'lihatbaranghilang'  && $this->uri->segment(1, 0) == 'transferbarang') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>LIHAT BARANG HILANG</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php if($this->uri->segment(1, 0) == 'laporan') { echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if( $this->uri->segment(1, 0) == 'laporan') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                LAPORAN
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url('laporan/bukupelanggan'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'bukupelanggan'  && $this->uri->segment(1, 0) == 'laporan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BUKU PELANGGAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('laporan/bukubank'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'bukubank'  && $this->uri->segment(1, 0) == 'laporan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BUKU BANK</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('laporan/saham'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'saham'  && $this->uri->segment(1, 0) == 'laporan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SAHAM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('laporan/stokbarang'); ?>" class="nav-link <?php if($this->uri->segment(2) == 'stokbarang'  && $this->uri->segment(1, 0) == 'laporan') { echo 'active'; } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>STOK BARANG</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('backuprestore'); ?>" class="nav-link <?php if($this->uri->segment(1, 0) == 'backuprestore') { echo 'active'; } ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                BACKUP &amp; RESTORE DB
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo base_url('dashboard/signout'); ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                LOGOUT
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>