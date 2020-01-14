<div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel Kegiatan Tahun <?php echo $this->session->flashdata('tahun'); ?></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li> -->
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                      <li>
                          <a href="<?=base_url('superuser/home/add_kegiatan')?>">
                            <button class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                          </button>
                          </a>
                        </a>  
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                 <div class="container-fluid">
                    <div class="x_content">
                        <div class="dropdown">
                          <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown">Pilih Tahun Kegiatan
                            <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                  <li><a href="<?php echo base_url();?>superuser/home/kegiatan/2018">2018</a></li>
                                  <li><a href="<?php echo base_url();?>superuser/home/kegiatan/2019">2019</a></li>
                                </ul>
                          </div>
                      </div>
                </div>


              <div class="x_content">
              <?php if(isset($pesan)){
                          if($pesan==1){
                     ?>
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Kegiatan </strong> berhasil diubah
            </div>
                    <?php }else{ ?>
           <div class="alert alert-danger alert-dismissible fade in" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <strong>Kegiatan </strong> gagal Diubah
           </div>
                     <?php  }} ?>
                    <p class="text-muted font-13 m-b-30">
                      Data kegiatan
                    </p>
                    <form method="post"  action="<?=base_url('superuser/home/delete')?>">
                    <div class="table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive-cancel nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th><i class="fa fa-trash"></i></th>
                          <th>Aksi</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Target</th>
                          <th>Realisasi target</th>
                          <th>Sisa Target</th>
                          <th>Anggaran</th>
                          <th>Realisasi Anggaran</th>
                          <th>Sisa Anggaran</th>
                          <th>Tanggal mulai</th>
                          <th>Lokasi</th>
                          <th>Penanggungjawab</th>
                          <th>Keterangan</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <input type="checkbox" id="check-all" class="flat"> -->
                         <?php foreach ($data5 as $rows) {?>
                          <tr>
                            <td><input type="checkbox" name="checkbox[]" id="check-all" class="flat" value="<?php echo $rows['id_kegiatan'];?>"></td>
                            <td>
                                <button  type="button" class="btn btn-primary muncul-modal" onclick="edit_kegiatan('<?=$rows['id_kegiatan']?>')"><i class="fa fa-file-text"></i></button>
                                <button onclick="confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran']-$rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>
                       <?php foreach ($data1 as $rows) {?>
                          <tr>
                            <td><input type="checkbox" name="checkbox[]" id="check-all" class="flat" value="<?php echo $rows['id_kegiatan'];?>"></td>
                            <td>
                                <button  type="button" class="btn btn-primary muncul-modal" onclick="edit_kegiatan('<?=$rows['id_kegiatan']?>')"><i class="fa fa-file-text"></i></button>
                                <button onclick="confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran']-$rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>
                       <?php foreach ($data2 as $rows) {?>
                          <tr>
                            <td><input type="checkbox" name="checkbox[]" id="check-all" class="flat" value="<?php echo $rows['id_kegiatan'];?>"></td>
                            <td>
                                <button  type="button" class="btn btn-primary muncul-modal" onclick="edit_kegiatan('<?=$rows['id_kegiatan']?>')"><i class="fa fa-file-text"></i></button>
                                <button onclick="confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran']-$rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>
                       <?php foreach ($data3 as $rows) {?>
                          <tr>
                            <td><input type="checkbox" name="checkbox[]" id="check-all" class="flat" value="<?php echo $rows['id_kegiatan'];?>"></td>
                            <td>
                                <button  type="button" class="btn btn-primary muncul-modal" onclick="edit_kegiatan('<?=$rows['id_kegiatan']?>')"><i class="fa fa-file-text"></i></button>
                                <button onclick="confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran']-$rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>
                       <?php foreach ($data4 as $rows) {?>
                          <tr>
                            <td><input type="checkbox" name="checkbox[]" id="check-all" class="flat" value="<?php echo $rows['id_kegiatan'];?>"></td>
                            <td>
                                <button  type="button" class="btn btn-primary muncul-modal" onclick="edit_kegiatan('<?=$rows['id_kegiatan']?>')"><i class="fa fa-file-text"></i></button>
                                <button onclick="confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran']-$rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>

                      </tbody>
                    </table>
                    </div>
                    </form>
                    <table>
                     
                      <tr>
                        <td>Total kegiatan &nbsp</td>
                        <td> : </td>
                        <td>&nbsp <?php echo $total['total_kegiatan'];?></td>
                      </tr>
                      <tr>
                        <td>Total Anggaran &nbsp</td>
                        <td> : </td>
                        <td>&nbsp <?php echo "Rp. ".number_format($total['total_anggaran'],0,'','.');?></td>
                      </tr>
                      <tr>
                        <td>Total Realisasi Anggaran &nbsp</td>
                        <td> : </td>
                        <td>&nbsp <?php echo "Rp. ".number_format($subtotal['sisa_anggaran'],0,'','.');?></td>
                      </tr>
                      <tr>
                        <td>Total Sisa Anggaran &nbsp</td>
                        <td> : </td>
                        <td>&nbsp <?php echo "Rp. ".number_format($total['total_anggaran']-$subtotal['sisa_anggaran'],0,'','.');?></td>
                      </tr>
                     
                    </table>
                    <br>
                    <a href="<?=base_url('superuser/home/print_laporan');?>" class="btn btn-success"><i class="fa fa fa-file-excel-o"></i> Semua Export</a>
                   <!--  <?php foreach ($group as $key) { ?>
                     <a href="<?=base_url('superuser/home/print_laporan'.$this->session->flashdata("tahun").'/'.$key->nama_pj);?>" class="btn btn-success"><i class="fa fa fa-file-excel-o"></i> <?=$key->nama_pj ?> Export</a>
                    <?php } ?> -->
                    <a href="<?=base_url('superuser/home/cetak_pdf1')?>" target="blank" class="btn btn-danger"><i class="fa fa fa-file-pdf-o"></i> Semua Pdf</a>
                    <!-- <?php foreach ($group as $key) {
                      
                    ?>
                    <a href="<?php echo base_url();?>superuser/home/cetak_pdf<?=$this->session->flashdata("tahun")?>/<?=$key->nama_pj?>"  target="blank" class="btn btn-danger"><i class="fa fa fa-file-pdf-o"></i> <?=$key->nama_pj;?> Pdf</a>
                    <?php } ?> -->
                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


<div class="modal fade modal-1" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Kegiatan</h4>
                </div>
                <div class="modal-body modal-1-body">
                    
                     <form class="form-horizontal form-label-left" novalidate method="post" action="" id="aas">   
                     <input type="hidden" name="id" id='id-kegiatan' value=""></input>                  
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
                          <input type="text" id="target" name="target" class="form-control col-md-7 col-xs-12" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required="required" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="anggaran" >Anggaran <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="anggaran" name="anggaran" class="form-control col-md-7 col-xs-12" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" required="required" readonly>
                        </div>
                      </div>                     
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control has-feedback-left tanggal" id="dateaja" placeholder="First Name" name="tanggal" aria-describedby="inputSuccess2Status" required="required">
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
                </div>
                <div class="modal-footer">
                     <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
                </form>
            </div>
        </div>
    </div>