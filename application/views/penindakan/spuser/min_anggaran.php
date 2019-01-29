                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?=base_url('penindakan/superuser/home/kurangi_anggaran_proccess')?>" id="aas">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="target">Target <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="target" name="target" class="form-control col-md-7 col-xs-12"  required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anggaran" >Anggaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="anggaran" name="anggaran" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button type="submit" class="btn btn-success">Kurangi Anggaran</button>
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
