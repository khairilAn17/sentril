<!DOCTYPE html>
<center><h2>Tabel Kegiatan</h2></center><br><br>
<table width="100%" border="1" cellspacing="-0.5" cellpadding="5" border="0">
        <tr>
          <th>No</th>
          <th>Kode</th>
          <th>NamaKegiatan</th>
          <th>Target</th>
          <th>Realisasi target</th>
          <th>Sisa Target</th>
          <th>Anggaran</th>
          <th>Realisasi Anggaran</th>
          <th>Sisa Anggaran</th>
          <th>TanggalMulai</th>
          <th>Lokasi</th>
          <th>PJ</th>
          <th>Keterangan</th>
        </tr>
        <!-- <input type="checkbox" id="check-all" class="flat"> -->
	   <?php 
           $no=1;
           foreach ($row as $rows) {?>
          <tr>
            <td><?php echo $no++;?></td>
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
      	<?php };?>
	</table>
  <br><br>
  <table>
                     
      <tr>
        <td>Total kegiatan</td>
        <td> : </td>
        <td> <?php echo $total['total_kegiatan'];?></td>
      </tr>
      <tr>
        <td>Total Anggaran</td>
        <td> : </td>
        <td><?php echo "Rp. ".number_format($total['total_anggaran'],0,'','.');?></td>
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