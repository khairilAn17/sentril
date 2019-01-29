              <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      Data kegiatan
                    </p>
                    <!-- <form method="post" action="<?=base_url('petugas/home/delete')?>"> -->
                    <div class="table-responsive">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive-cancel nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
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
                       <?php foreach ($row as $rows) {?>
                          <tr>
                            <td><?php echo $rows['id_kegiatan'];?></td>
                            <td><?php echo $rows['nama_kegiatan'];?></td>
                            <td><?php echo $rows['target'];?></td>
                            <td><?php echo $rows['realisasi'];?></td>
                            <td><?php echo ($rows['target']-$rows['realisasi']);?></td>
                            <td><?php echo "Rp.".number_format($rows['anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['realisasi_anggaran'],0,'','.');?></td>
                            <td><?php echo "Rp.".number_format($rows['sisa_anggaran'],0,'','.');?></td>
                            <td><?php echo $rows['tanggal'];?></td>
                            <td><?php echo $rows['lokasi'];?></td>
                            <td><?php echo $rows['nama_pj'];?></td>
                            <td><?php echo $rows['keterangan'];?></td>
                          </tr>
                       <?php }?>
                      </tbody>
                    </table>
                    </div>
            <!--         </form> -->
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
                   <a href="<?=base_url('petugas/home/print_laporan'.$this->session->flashdata("tahun"))?>" class="btn btn-success"><i class="fa fa fa-file-excel-o"></i> Semua Export</a>
                    <?php foreach ($group as $key) { ?>
                     <a href="<?=base_url('petugas/home/print_laporan'.$this->session->flashdata("tahun").'/'.$key->nama_pj);?>" class="btn btn-success"><i class="fa fa fa-file-excel-o"></i> <?=$key->nama_pj ?> Export</a>
                    <?php } ?>
                    <a href="<?=base_url('petugas/home/cetak_pdf'.$this->session->flashdata("tahun"));?>" target="blank" class="btn btn-danger"><i class="fa fa fa-file-pdf-o"></i> Semua Pdf</a>
                    <?php foreach ($group as $key) {
                      
                    ?>
                    <a href="<?php echo base_url();?>petugas/home/cetak_pdf<?=$this->session->flashdata("tahun")?>/<?=$key->nama_pj?>"  target="blank" class="btn btn-danger"><i class="fa fa fa-file-pdf-o"></i> <?=$key->nama_pj;?> Pdf</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
