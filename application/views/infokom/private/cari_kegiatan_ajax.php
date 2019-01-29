 <div class="x_content">
     <table>
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
       
      </table><br>
      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
           <th>No</th>
            <th>Tanggal Kegiatan</th>
            <th>Tanggal Input</th>
            <th>anggaran</th>
            <th>Lokasi</th>
            <th>PJ Kegiatan</th>
            <th>Keterangan</th>
            <th>File</th>
          </tr>
        </thead>
        <tbody>
          <!-- <input type="checkbox" id="check-all" class="flat"> -->
         <?php $i=1; foreach ($row as $rows) {?>
            <tr>
              <td><?=$i++;?></td>
              <td><?=$rows['tanggal_kegiatan']?></td>
              <td><?=$rows['tanggal_input']?></td>
              <td><?="Rp.".number_format($rows['anggaran'],0,'','.')?></td>
              <td><?php echo $rows['lokasi'];?></td>
              <td><?php echo $rows['pj_kegiatan'];?></td>
              <td><?php echo $rows['keterangan'];?></td>
              <?php if($rows['file'] != ''){ ?>
               <td><a href="<?=base_url('assets/file/').$rows['file'];?>">download</a></td>
              <?php }else{ ?>
              <td>Tidak ada file</td>
              <?php } ?>
            </tr>
         <?php }?>
        </tbody>
      </table>
<!--         </form> -->
<a href="<?=base_url('infokom/admin/home/print_laporan_sub?id=')?><?php echo $rows['id_kegiatan'];?>" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</a>
     <a href="<?=base_url('infokom/admin/home/cetak_pdf_sub?id=')?><?php echo $rows['id_kegiatan'];?>" target="blank" class="btn btn-danger"><i class="fa fa fa-file-pdf-o"></i> Pdf</a>
    </div>