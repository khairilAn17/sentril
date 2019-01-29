                 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cari Kegiatan<small>berdasarkan kode kegiatan</small></h2>
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
                      <li><a href="<?=base_url('tu/petugas/home/kegiatan')?>"><button class="btn btn-primary"><i class="fa fa-chevron-left"></i> Kembali</button></a> </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="form-horizontal form-label-left" id="form_ini" novalidate method="post" action="<?=base_url('tu/petugas/home/proses_cari')?>">
                      <div class="item form-group">
                        <label for="pj" class="control-label col-md-3 col-sm-3 col-xs-12">Masukkan id</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="inputN" class="form-control col-md-7 col-xs-12 id_kegiatan" name="id" placeholder="id kegiatan" type="text" required="required">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success cari">Cari</button>
                        </div>
                      </div>
                    </div>
                    <div class="ln_solid"></div><br>
                    <div id="isi_ajax">
                    
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
