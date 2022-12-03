  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?php if($this->input->get('id')) { echo 'EDIT PEMBAYARAN PIUTANG'; } else { echo 'TAMBAH PEMBAYARAN PIUTANG'; } ?></h1>
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
                  <?php if($this->input->get('id')) { echo 'EDIT PEMBAYARAN PIUTANG'; } else { echo 'TAMBAH PEMBAYARAN PIUTANG'; } ?></h3>
              </div>
              <form method="post" action="<?php echo base_url('hutangpiutang/tambahpiutang'); ?>" id="formtmabahhutang" name="formtmabahhutang">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="nomor_nota">KODE</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text">P</span>
                          </div>
                          <input type="text" <?php if($this->input->get('id')) { 
                            echo 'readonly value="'.$editnota[0]->nomor_nota.'"'; } else { echo ' value="'.$lastid.'" '; }  ?> class="form-control" autofocus id="nomor_nota" name="nomor_nota" >
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
                    <label for="tanggaljual">TANGGAL</label>
                     <div class="input-group date" id="tanggaljual" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input tanggaljual"  id="tanggaljual" name="tanggaljual" data-target="#tanggaljual" <?php if($this->input->get('id')) { echo ' value="'.date("d F Y", strtotime($editnota[0]->tanggal)).'"'; }  else { echo ' value="'.date("d F Y").'"'; }  ?>/>
                        <div class="input-group-append" data-target="#tanggaljual" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="form-group">
                        <label for="namapelanggan">PELANGGAN</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="namapelanggan" id="namapelanggan" required  <?php if($this->input->get('id') && count($editpelanggan) >0) { echo ' value="'.$editpelanggan[0]->kode.'"'; }  ?>>                      
                        </div>

                        <span class="help-block" id='helppelanggan' <?php if(!$this->input->get('id')) { echo 'style="display:none;"'; } ?>>
                          <?php if($this->input->get('id')  && count($editpelanggan) > 0) { ?>
                            CONTACT PERSON : <?php echo $editpelanggan[0]->contact_person; ?>
                            <br/>TELEPON   : <?php echo $editpelanggan[0]->telepon; ?>
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
                 

                  <div class="form-group">
                    <label for="idkurs">MATA UANG</label>
                    <select class="custom-select rounded-0" id="idkurs" name="idkurs">
                      <?php foreach($kurs as $k) { ?>
                      <option value="<?php echo $k->idkurs; ?>" <?php if($this->input->get('id')) { if($k->idkurs == $editnota[0]->idkurs) { echo 'selected="selected" '; } }  ?> ><?php echo strtoupper($k->nama); ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="nominal">NOMINAL</label>
                    <input type="text"  name="nominal" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->nominal.'"'; }  ?>  class="form-control" id="nominal" >
                  </div>


                   <div class="row">
                    <div class="col-sm-8">
                       <div class="form-group">
                        <label for="koderekening">NOMOR REKENING</label>
                        <div class="input-group">
                          <input type="text" class="form-control"  name="koderekening" id="koderekening" required  <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->kode.'"'; }  ?>>
                                               
                        </div>

                        <span class="help-block" id='helprekening' <?php if(!$this->input->get('id')) { echo 'style="display:none;"'; } ?>>
                          <?php if($this->input->get('id') && count($editrekening) >0) { ?>
                            NO. REKENING : <?php echo $editrekening[0]->nomor; ?>
                            <br/>BANK   : <?php echo strtoupper($editrekening[0]->bank); ?>
                          <?php } ?>
                        </span>
                        
                        <input type="hidden" name="hididrekening" id="hididrekening" <?php if($this->input->get('id')) { echo ' value="'.$editnota[0]->idrekening.'"'; }  ?>>
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
                    <textarea class="form-control" rows="3" id="keterangan" name="keterangan" placeholder=""><?php if($this->input->get('id')) { echo $editnota[0]->keterangan; }  ?></textarea>
                  </div>
                  
            

                </div>
                <!-- /.card-body -->

                <div class="card-footer" >
                  <div class="d-flex justify-content-end">
                    <button type="submit" name="btnsubmit" id="btnsubmit" value="submit" class="btn btn-primary">SIMPAN PEMBAYARAN PIUTANG</button>
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
                <span class="help-block text-gray">CARI NAMA / CONTACT PERSON / ALAMAT / TELEPON PELANGGAN</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
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
                <span class="help-block text-gray">CARI NOMOR NOTA / NAMA PELANGGAN</span>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="satuan_kecil">HASIL PENCARIAN</label>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                    <th>NO. NOTA</th>
                    <th>PELANGGAN</th>
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
          <h4 class="modal-title" id='title_modal'>CARI REKENING</h4>
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

