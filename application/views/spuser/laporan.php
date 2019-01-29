              <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Laporan</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    
              <div class="x_content">              
                  
                    <?php if(isset($file))foreach($file as $f){ 
                        $tanggal = $f['tanggal_input'];
                       $tgl = explode('-', $tanggal);
                      ?>
                      <div>
                          <a href="#" onclick="ke_file('<?=base_url('superuser/home/file_laporan/').$tanggal?>')"><?=$tgl[0].'-'.$tgl[1].'-'.$tgl[2]?></a>
                          <hr>
                      </div>
                    <?php }
                    else echo "data kosong"; ?>
                    
                    <?php if(isset($links)){ ?>
                      <div>
                        <?=$links?>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


