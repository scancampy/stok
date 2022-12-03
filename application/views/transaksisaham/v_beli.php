  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php if($this->input->get('id')) { echo 'EDIT BELI SAHAM'; } else { echo 'BELI SAHAM'; } ?></h1>
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
                  <?php if($this->input->get('id')) { echo 'EDIT BELI SAHAM'; } else { echo 'BELI SAHAM'; } ?></h3>
              </div>
              <form method="post" action="<?php echo base_url('transaksisaham/beli'); ?>" id="formtmabahpenjualan" name="formtmabahpenjualan">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="nomor_nota">NOMOR NOTA BELI SAHAM</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">BSH</span>
                          </div>
                          <input type="text" <?php if($this->input->get('id')) { echo 'readonly value="'.$editnota[0]->nomor_nota.'"'; }  ?> class="form-control" autofocus id="nomor_nota" name="nomor_nota" >
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
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="namapelanggan">PELANGGAN</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="namapelanggan" id="namapelanggan" required  <?php if($this->input->get('id') && count($editpelanggan) >0) { echo ' value="'.strtoupper($editpelanggan[0]->kode).'"'; }  ?>>
                        </div>

                        <span class="help-block" id='helppelanggan' <?php if(!$this->input->get('id')) { echo 'style="display:none;"'; } ?>>
                          <?php if($this->input->get('id') && count($editpelanggan) > 0) { ?>
                            CONTACT PERSON : <?php echo strtoupper($editpelanggan[0]->contact_person); ?>
                            <br/>TELEPON   : <?php echo strtoupper($editpelanggan[0]->telepon); ?>
                          <?php } ?>
                        </span>
                        
                        <input type="hidden" name="hididpelanggan" id="hididpelanggan" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->idpelanggan.'"'; }  ?>>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <label for="">&nbsp;</label>
                      <div class="input-group">
                        <button id="loadlinkpelanggan" class="btn btn-info " type="button" style="margin-right: 10px;"><i class="fas fa-external-link-alt"></i></button>
                        <button type="button"  data-toggle="modal" data-target="#modal-lg" class="btn btn-info "><i class="fas fa-search"></i> CARI PELANGGAN</button>
                      </div>
                    </div>
                  </div>

<div class="form-group" style="display: none;">
                    <label for="nomor_faktur">NOMOR FAKTUR</label>
                    <input type="text"  name="nomor_faktur" value="-"  class="form-control" id="nomor_faktur" >
                  </div>
                  
                  
                  <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="tanggaljual">TANGGAL PEMBELIAN</label>
                 <div class="input-group date" id="tanggaljual" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input tanggaljual"  id="tanggaljual" name="tanggaljual" data-target="#tanggaljual" <?php if($this->input->get('id')) { echo ' value="'.date("d F Y", strtotime($editnota[0]->tanggal)).'"'; } else { echo ' value="'.date("d F Y").'"'; }    ?>/>
                    <div class="input-group-append" data-target="#tanggaljual" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                    <label for="idkurs">KURS</label>
                    <select class="custom-select rounded-0" id="idkurs" name="idkurs">
                      <?php foreach($kurs as $k) { ?>
                      <option value="<?php echo $k->idkurs; ?>" <?php if($this->input->get('id')) { if($k->idkurs == $editnota[0]->idkurs) { echo 'selected="selected" '; } }  ?> ><?php echo strtoupper($k->nama); ?></option>
                      <?php } ?>
                    </select>
                  </div>
            </div>
          </div>

          <div class="form-group" style="display: none;">
                    <label for="idgudang">GUDANG</label>
                    <select class="custom-select rounded-0" id="idgudang" name="idgudang">
                      <?php foreach($gudang as $k) { ?>
                      <option value="<?php echo $k->idgudang; ?>" <?php if($this->input->get('id')) { if($k->idgudang == $editnota[0]->idgudang) { echo 'selected="selected" '; } } ?>><?php echo strtoupper($k->nama); ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  
                  <div class="form-group">
                    <label>KETERANGAN</label>
                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder=""><?php if($this->input->get('id')) { echo $editnota[0]->keterangan; }  ?></textarea>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card card-light">
                        <div class="card-header" >
                          <div class='col-md-12 d-flex justify-content-between'>
                            <h3 class="card-title">
                              DETAIL SAHAM
                            </h3><button class="btn btn-info btn-sm" id="btnadd" data-toggle="modal" data-target="#modal-tambah-produk-lg" type="button">TAMBAH SAHAM</button>
                          </div>
                        </div>
                        <div class="card-body">
                          <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>NO</th>
                        <th>KODE SAHAM</th>
                        <th>NAMA SAHAM</th>
                        <th>JML. SAT. BESAR</th>
                        <th>JML. SAT. KECIL</th>
                        <th>HARGA/UNIT</th>
                        <th style="width:21%">AKSI</th>
                      </tr>
                      </thead>
                      <tbody id='tablebarang'>
                        <tr>
                          <td colspan="7" class="text-center">BELUM ADA DATA SAHAM</td>
                        </tr>
                      </tbody>
                    </table>
               
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer" >
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="btnsubmit" id="btnsubmit" value="submit" class="btn btn-primary">SIMPAN PEMBELIAN SAHAM</button>
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
          <h4 class="modal-title" id='title_modal'>CARI PELANGGAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
               <input type="hidden" name="hididbarang" id="hididbarang" />
              <div class="form-group">
                <label for="cari">CARI</label>
                <input type="text" class="form-control" id="cari" placeholder="" autocomplete="off" >
                <span class="help-block text-gray">CARI KODE / NAMA / CONTACT PERSON / ALAMAT / TELEPON PELANGGAN</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>KODE</th>
                    <th>NAMA PELANGGAN</th>
                    <th>CONTACT PERSON</th>
                    <th>TELEPON</th>
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
          <h4 class="modal-title" id='title_modal'>CARI NOTA SAHAM</h4>
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
                    <th>TANGGAL</th>
                    <th>KETERANGAN</th>
                    <th>KURS</th>
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


<div class="modal fade" id="modal-tambah-produk-lg">
  <div class="modal-dialog modal-lg">
    <form id="formtambahbarang">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='title_modal'>CARI SAHAM</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="hididbarang" id="hididbarang" />
              <div class="form-group">
                <label>KODE/NAMA SAHAM</label>
                <select class="form-control select2bs4" name="selectbarang" id="selectbarang" style="width: 100%;">
                  <option value="-" selected="selected"></option>
                  <?php foreach($barang as $b) { ?>
                  <option satuanbesar='<?php echo $b->satuan_besar; ?>' satuankecil='<?php echo $b->satuan_kecil; ?>' namabarang='<?php echo $b->nama; ?>' kodebarang='<?php echo $b->kode; ?>' value="<?php echo $b->idsaham; ?>"><?php echo strtoupper($b->nama).' ('.strtoupper($b->kode).')'; ?></option>
                  <?php  } ?>
                </select>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jumlah_besar">JUMLAH SATUAN BESAR</label>
                    <div class="input-group">
                      <input type="text"  class="form-control" name="jumlah_besar" id="jumlah_besar" >
                      <div class="input-group-append">
                          <div class="input-group-text" id="satuanbesar">SATUAN</div>
                      </div>                      
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="jumlah_kecil">JUMLAH SATUAN KECIL</label>
                    <div class="input-group">
                      <input type="text"  class="form-control" id="jumlah_kecil" name="jumlah_kecil" >
                      <div class="input-group-append">
                          <div class="input-group-text" id="satuankecil">SATUAN</div>
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="nomor_faktur">HARGA</label>
                <input type="text"   name="harga" class="form-control" id="harga" >
                <input type="hidden" id='hargahidden' />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>          
          <button type="button" class="btn btn-primary" id="btntambahbarang">TAMBAH SAHAM</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>