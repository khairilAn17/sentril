                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?=base_url('infokom/superuser/home/insert_proccess')?>" id="aas">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID Kegiatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="inputN" class="form-control col-md-7 col-xs-12" name="id" placeholder="id kegiatan" type="text" required="required">
                        </div>

                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Kegiatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name="nama" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="target">Target <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="target" name="target" class="form-control col-md-7 col-xs-12" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anggaran" >Anggaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="anggaran" name="anggaran" class="form-control col-md-7 col-xs-12" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required="required">
                        </div>
                      </div>
                      <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="realisasi">Realisasi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="realisasi" name="realisasi" required="required" placeholder="e.g: 6" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="dateaja" name="tanggal" aria-describedby="inputSuccess2Status" required="required">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="lokasi" class="control-label col-md-3">Lokasi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lokasi" type="text" name="lokasi" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="pj" class="control-label col-md-3 col-sm-3 col-xs-12">Nama PJ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="pj" type="text" name="pj" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="keterangan"  name="keterangan" class="form-control col-md-7 col-xs-12" required="required"></textarea >
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
