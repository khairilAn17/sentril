
<script type="text/javascript" src="<?=base_url('assets/vendors/jquery-loading-overlay/src/loadingoverlay.min.js')?>"></script>

<script type="text/javascript">


	$('.cari').on('click',function(){
			var id = $('.id_kegiatan').val();
		$.ajax({
		   url: "<?=base_url('pengujian/superuser/home/proses_cari/')?>"+id,
		   data: {
		      format: 'json'
		   },
		   	beforeSend:function(){
		   		 $.LoadingOverlay("show");
       		},
		     error: function() {
		     	 $('#isi_ajax').empty();
		     	  $.LoadingOverlay("hide",true);
		      $('#isi_ajax').append('<p>An error has occurred</p>');
			   },
			   success: function(data) {
			      $('#isi_ajax').empty();
			      $.LoadingOverlay("hide",true);
			      if(data.error==1){
			      		 $('#isi_ajax').empty();
		      		$('#isi_ajax').append('<p>Kegiatan Tidak Ditemukan</p>');
			      }else{
			      	$('#isi_ajax').load("<?=base_url('pengujian/superuser/home/cari_kegiatan_ajax/')?>"+data.id);	
			      }
		       		
			   },
			   type: 'GET'
		});
	});




</script>