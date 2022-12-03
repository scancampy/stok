  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php if($this->input->get('id')) { echo 'EDIT BARANG HILANG'; } else { echo 'TAMBAH BARANG HILANG'; } ?></h1>
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
                  <?php if($this->input->get('id')) { echo 'EDIT BARANG HILANG'; } else { echo 'TAMBAH BARANG HILANG'; } ?></h3>
              </div>
              <form method="post" action="<?php echo base_url('transferbarang/tambahbaranghilang'); ?>" id="formtmabahhutang" name="formtmabahhutang">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="nomor_nota">NO. TRANSFER</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">BH</span>
                          </div>
                          <input type="text" <?php if($this->input->get('id')) { echo 'readonly value="'.$editnota[0]->nomor_nota.'"'; } else { echo ' value="'.$lastid.'" '; }   ?>  class="form-control" autofocus id="nomor_nota" name="nomor_nota" >
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
                        <label for="kodebarang">KODE BARANG</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="kodebarang" id="kodebarang" required <?php if($this->input->get('id') && count($editnota) >0) { echo ' value="'.strtoupper($editnota[0]->kode).'"'; }  ?>>
                        </div>

                        <span class="help-block" id='helpbarang' <?php if(!$this->input->get('id')) { echo 'style="display:none;"'; } ?>>
                          <?php if($this->input->get('id') && count($editnota) > 0) { ?><?php echo strtoupper($editnota[0]->nama); ?>
                          <?php } ?>
                        </span>
                        
                        <input type="hidden" name="idbarang" id="idbarang" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->idbarang.'"'; }  ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="">&nbsp;</label>
                      <div class="input-group">
                        <button id="loadlinkbarang" class="btn btn-info " type="button" style="margin-right: 10px;"><i class="fas fa-external-link-alt"></i></button>
                        <button type="button" data-toggle="modal" data-target="#modal-lg-barang" class="btn btn-info "><i class="fas fa-search"></i> CARI BARANG</button>
                      </div>
                    </div>
                  </div>

            
                  <div class="form-group">
                    <label for="idgudang_asal">GUDANG ASAL</label>
                    <select class="custom-select rounded-0" id="idgudang_asal" name="idgudang_asal">
                      <option value="">[PILIH GUDANG]</option>
                      <?php foreach($gudang as $k) { ?>
                      <option value="<?php echo $k->idgudang; ?>" alamat="<?php echo $k->alamat; ?>" <?php if($this->input->get('id')) { if($k->idgudang == $editnota[0]->idgudang_asal) { echo 'selected="selected" '; } } ?>><?php echo strtoupper($k->nama); ?></option>
                      <?php } ?>
                    </select>

                    <span class="help-block" id='helpgudangasal' style="display: none;" >
                      TES
                    </span>
                  </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jumlah_besar">JML. SATUAN BESAR</label>
                    <input type="text"  name="jumlah_besar" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->jumlah_besar.'"'; }  ?>  class="form-control" id="jumlah_besar" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="jumlah_kecil">JML. SATUAN KECIL</label>
                    <input type="text"  name="jumlah_kecil" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->jumlah_kecil.'"'; }  ?>  class="form-control" id="jumlah_kecil" >
                  </div>
                </div>
              </div>
                  
                  <div class="form-group">
                    <label>KETERANGAN</label>
                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder=""><?php if($this->input->get('id')) { echo $editnota[0]->keterangan; }  ?></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer" >
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="btnsubmit" id="btnsubmit" value="submit" class="btn btn-primary">SIMPAN BARANG HILANG</button>
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
                <span class="help-block text-gray">CARI NOMOR NOTA / GUDANG / BARANG</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>NO. NOTA</th>
                    <th>GUDANG ASAL</th>
                    <th>BARANG</th>
                    <th>TANGGAL</th>
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

<div class="modal fade" id="modal-lg-barang">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI BARANG</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="caribarang">CARI</label>
                <input type="text" class="form-control" id="caribarang" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI KODE BARANG / NAMA / MERK</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NAMA BARANG</th>
                    <th>MERK</th>
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