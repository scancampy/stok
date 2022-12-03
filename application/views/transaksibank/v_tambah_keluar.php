  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php if($this->input->get('id')) { echo 'EDIT TRANSAKSI KELUAR'; } else { echo 'TAMBAH TRANSAKSI KELUAR'; } ?></h1>
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
                <h3 class="card-title">
                  <?php if($this->input->get('id')) { echo 'EDIT TRANSAKSI KELUAR'; } else { echo 'TAMBAH TRANSAKSI KELUAR'; } ?></h3>
              </div>
              <form method="post" action="<?php echo base_url('transaksibank/tambahkeluar'); ?>" id="formtmabahhutang" name="formtmabahhutang">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="idtransfer">NO. TRANSAKSI</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">KK</span>
                          </div>
                          <input type="text" 
    <?php if($this->input->get('id')) { echo 'readonly value="'.$editnota[0]->idtransfer.'"'; } else { echo ' value="'.$lastid.'" '; }   ?> class="form-control" autofocus id="idtransfer" name="idtransfer" >
                          <?php if($this->input->get('id')) { echo '<input type="hidden" name="editmode" value="true" />'; }  ?>
                        </div>
                      </div>
                    </div>                    
                    <div class="col-sm-4">
                      <label for="">&nbsp;</label>
                      <div class="input-group">
                        <button id="loadlink" class="btn btn-info " type="button" style="margin-right: 10px;"><i class="fas fa-external-link-alt"></i></button>
                        <button type="button"  data-toggle="modal" data-target="#modal-lg-nota" class="btn btn-info "><i class="fas fa-search"></i> CARI NOTA</button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal">TANGGAL</label>
                     <div class="input-group date" id="tanggal" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input tanggal"  id="tanggal" name="tanggal" data-target="#tanggal" <?php if($this->input->get('id')) { echo ' value="'.date("d F Y", strtotime($editnota[0]->tanggal)).'"'; } else { echo ' value="'.date("d F Y").'"'; }  ?>/>
                        <div class="input-group-append" data-target="#tanggal" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="koderekening_asal">REKENING ASAL</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="koderekening_asal" id="koderekening_asal" required  <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->rekeningkode.'"'; }  ?>>                    
                        </div>
                        
                        <input type="hidden" name="idrekening_asal" id="idrekening_asal" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->idrekening_asal.'"'; }  ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="">&nbsp;</label>
                      <div class="input-group">
                        <button id="loadlinkrekening" class="btn btn-info " type="button" style="margin-right: 10px;"><i class="fas fa-external-link-alt"></i></button>
                        <button type="button"  data-toggle="modal" data-target="#modal-lg-rekening" class="btn btn-info "><i class="fas fa-search"></i> CARI REKENING</button>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>KETERANGAN</label>
                    <textarea class="form-control" rows="3" id="keterangan_asal" name="keterangan_asal" placeholder=""><?php if($this->input->get('id')) { echo $editnota[0]->keterangan_asal; }  ?></textarea>
                  </div>

                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="koderekening_tujuan">REKENING TUJUAN</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="koderekening_tujuan" id="koderekening_tujuan" required  <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->rekeningkodetujuan.'"'; }  ?>>
                                              
                        </div>
                        
                        <input type="hidden" name="idrekening_tujuan" id="idrekening_tujuan" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->idrekening_tujuan.'"'; }  ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="">&nbsp;</label>
                      <div class="input-group">
                        <button id="loadlinkrekeningtujuan" class="btn btn-info " type="button" style="margin-right: 10px;"><i class="fas fa-external-link-alt"></i></button>
                        <button type="button"  data-toggle="modal" data-target="#modal-lg-rekening-tujuan" class="btn btn-info "><i class="fas fa-search"></i> CARI REKENING</button>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label>KETERANGAN</label>
                    <textarea class="form-control" rows="3" id="keterangan_tujuan" name="keterangan_tujuan" placeholder=""><?php if($this->input->get('id')) { echo $editnota[0]->keterangan_tujuan; }  ?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="nominal">NOMINAL</label>
                    <input type="text"  name="nominal" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->nominal.'"'; }  ?>  class="form-control" id="nominal" >
                  </div>          

                </div>
                <!-- /.card-body -->

                <div class="card-footer" >
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="btnsubmit" id="btnsubmit" value="submit" class="btn btn-primary">SIMPAN TRANSAKSI KELUAR</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI REKENING ASAL</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
               <input type="hidden" name="hididrekening_asal" id="hididrekening_asal" />
              <div class="form-group">
                <label for="cari">Cari</label>
                <input type="text" class="form-control" id="cari" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI NOMOR / BANK / KODE</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE REKENING</th>
                    <th>NOMOR REKENING</th>
                    <th>BANK</th>
                    <th>KETERANGAN</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilpelanggan">
                    <tr>
                      <td>-</td>
                      <td>-</td>
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
        </div>
      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-lg-nota">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI NOTA</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="carinota">CARI</label>
                <input type="text" class="form-control" id="carinota" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI NOMOR NOTA</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>NO. NOTA</th>
                    <th>REKENING ASAL</th>
                    <th>REKENING TUJUAN</th>
                    <th>TANGGAL</th>
                    <th>NOMINAL</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilcarinota">
                    <tr>
                      <td>-</td>
                      <td>-</td>
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
        </div>
      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-lg-rekening">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI REKENING ASAL</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="carirekening">CARI</label>
                <input type="text" class="form-control" id="carirekening" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI NOMOR REKENING / BANK / KODE</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NO. REKENING</th>
                    <th>BANK</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilcarirekening">
                    <tr>
                      <td>-</td>
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
        </div>
      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-lg-rekening-tujuan">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI REKENING TUJUAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="carirekeningtujuan">CARI</label>
                <input type="text" class="form-control" id="carirekeningtujuan" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI NOMOR REKENING / BANK / KODE</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NO. REKENING</th>
                    <th>BANK</th>
                    <th>PILIH</th>
                    </tr>
                  </thead>
                  <tbody id="tabelhasilcarirekeningtujuan">
                    <tr>
                      <td>-</td>
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
        </div>
      </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

