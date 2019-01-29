
 <script src="<?=base_url('assets/vendors/moment/min/moment.min.js')?>"></script>
    <script src="<?=base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')?>"></script>

<script type="text/javascript">
$(document).ready(function() {
        $("#dateaja").daterangepicker({
          singleDatePicker: true,
          locale: {
                format: 'DD-MMMM-YYYY'
          }
        });
      });

	function edit_kegiatan(id){	
		$.post("<?=base_url('superuser/home/kegiatan_ajax/')?>"+id,function(data){
			$('#id-kegiatan').prop('value',data.id_kegiatan);
			$('#nama').prop('value', data.nama_kegiatan);
			$('#target').prop('value',data.target);
			$('#anggaran').prop('value',data.anggaran);
			$('.tanggal').prop('value',data.tanggal);
			$('#lokasi').prop('value',data.lokasi);
			$('#pj').prop('value',data.nama_pj);
			$('#keterangan').prop('value',data.keterangan);
			$('#myModal').modal('show');	
		});
		
	}
</script>