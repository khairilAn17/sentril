              <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Sub<small>Kegiatan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     <!--  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                      <li><a href="<?=base_url('pengujian/admin/home/kegiatan')?>"><button class="btn btn-primary"><i class="fa fa-chevron-left"></i> Kembali</button></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?=base_url('pengujian/admin/home/insert_proccess')?>" id="aas" enctype="multipart/form-data">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id">ID Kegiatan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="inputN" class="form-control col-md-7 col-xs-12" name="id" placeholder="id kegiatan" type="text" required="required">
                            <?php foreach($row as $rows){?>
                              <option><?php echo $rows['id_kegiatan'];?></option>
                            <?php }?>
                          </select>
                        </div>

                      </div>
                      <div class="item form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left" id="dateaja" placeholder="First Name" name="tanggal" aria-describedby="inputSuccess2Status" required="required">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status" class="sr-only">(success)</span>
                        </div> -->
                        <label for="lokasi" class="control-label col-md-3">Tanggal Kegiatan
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lokasi" type="text" name="tanggal" placeholder="contoh : 1 januari 2019"  class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anggaran" >Anggaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="anggaran" name="anggaran" class="form-control col-md-7 col-xs-12" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required="required">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label for="lokasi" class="control-label col-md-3">Lokasi
                          <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="lokasi" type="text" name="lokasi" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="pj" class="control-label col-md-3 col-sm-3 col-xs-12">Nama PJ
                        <span class="required">*</span>
                        </label>
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
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">File</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="keterangan" type="file" name="fupload" class="form-control col-md-7 col-xs-12" >
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
