<script type="text/javascript">
	function edit_user(id){
		$.post("<?=base_url('pengujian/superuser/home/user_ajax/')?>"+id, function(data){
			$('#nama').prop('value', data.username);			
			$('#level').prop('value', data.level);
			$('#id-user').prop('value',data.id_user);
			$('.modal-1').modal('show');
		});
		
	}
</script>