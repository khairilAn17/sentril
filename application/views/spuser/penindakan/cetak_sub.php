<!DOCTYPE html>
<table>
    <tr>
      <td><b>Nama Kegiatan</b></td>
      <td> : </td>
      <td><b><?php echo $nama['nama_kegiatan'];?></b></td>
    </tr>          
    <tr>
      <td>Total Anggaran </td>
      <td> : </td>
      <td> <?php echo "Rp. ".number_format($total['total_anggaran'],0,'','.');?></td>
    </tr>
     <tr>
      <td>Total Realisasi Anggaran</td>
      <td> : </td>
      <td><?php echo "Rp. ".number_format($subtotal['sisa_anggaran'],0,'','.');?></td>
    </tr>
    <tr>
      <td>Total Sisa Anggaran</td>
      <td> : </td>
      <td><?php echo "Rp. ".number_format($total['total_anggaran']-$subtotal['sisa_anggaran'],0,'','.');?></td>
    </tr>
   
  </table>
  <br><br>
  <table cellspacing="-1" width="100%" border="1" cellpadding="5">
    <thead>
      <tr>
       <th>No</th>
        <th>Tanggal Kegiatan</th>
        <th>Tanggal Input</th>
        <th>Waktu</th>
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
          <td><?=$rows['jam']?></td>
          <td><?="Rp.".number_format($rows['anggaran'],0,'','.')?></td>
          <td><?php echo $rows['lokasi'];?></td>
          <td><?php echo $rows['pj_kegiatan'];?></td>
          <td><?php echo $rows['keterangan'];?></td>
          <?php if($rows['file'] !=''){ ?>
           <td><?php echo $rows['file']?></td>
          <?php }else{ ?>
          <td>Tidak ada file</td>
          <?php } ?>
        </tr>
     <?php }?>
    </tbody>
  </table>