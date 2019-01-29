              <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tabel<small>Subkegiatan</small></h2>
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
                          <a href="<?=base_url('superuser/home/add_user')?>">
                            <button class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                          </button>
                          </a>
                        </a>  
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    
              <div class="x_content">
               <?php if(isset($pesan)){
                          if($pesan==1){
                     ?>
                      <p style="color:green">User Berhasil Diubah</p>
                    <?php }else{ ?>
                      <p style="color:red">User Gagal Diubah</p>
                     <?php  }} ?>
                    <p class="text-muted font-13 m-b-30">
                      Data kegiatan
                    </p>
                    <form method="post" action="<?=base_url('superuser/home/delete_user')?>">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th><i class="fa fa-trash"></i></th>
                          <th>id</th>
                          <th>Username</th>                         
                          <th>Level</th>
                          <th>Unit</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- <input type="checkbox" id="check-all" class="flat"> -->
                       <?php 
                       $no=1;
                       foreach ($row as $rows) {?>
                          <tr>
                            <td><input type="checkbox"  name="checkbox[]" attr.id="check-all" class="flat" value="<?php echo $rows['id_user'];?>"></td>
                            <td><?php echo $no++?></td>
                            <td><?php echo $rows['username'];?></td>                           
                            <td><?php echo $rows['level'];?></td>
                            <td><?php echo $rows['unit'];?></td>
                            <td>
                                <button onclick="edit_user('<?=$rows['username']?>')" type="button" class="btn btn-primary edit-user"><i class="fa fa-file-text"></i></button>
                                <button onclick="return confirm('yakin ingin menghpus?')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </td>
                          </tr>
                       <?php }?>
                      </tbody>
                    </table>
                    </form>
          
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
                    <h4 class="modal-title">Kelengkapan Berkas</h4>
                </div>
                <div class="modal-body modal-1-body">
                    
                   <form class="form-horizontal form-label-left" novalidate method="post" action="" id="aas">
                    <input type="hidden" name="id" value="" id="id-user">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" name="username" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="target">New Password
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keterangan">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="level" id="level" class="form-control col-md-7 col-xs-12" >
                              <option value="superuser">superuser</option>
                              <option value="admin">admin</option>
                              <option value="petugas">petugas</option>
                          </select>
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