@push('script')
<script>
	$(document).ready(function(){
		$('select#status').on('change', function(){
			var jenis = $(this).val();
			if(jenis){
				if(jenis == 'Bayar sebagian'){
					$('#total_bayar').attr('readonly', false);
				}else{
					$('#total_bayar').attr('readonly', true).val(0);
				}
			}else{
				alert('Pilih salah satu status terlebih dahulu!!!');
			}
		});
	});
</script>
@endpush