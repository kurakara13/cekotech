@extends('create-form')
@section('form')
@method('PUT')
@include('input',['value'=>$d->username,'id'=>'username','label'=>'Username'])
<input type="hidden" name="old_username" value="{{ $d->username }}">
@include('input_password',['id'=>'password','label'=>'Password','hint'=>'* Jika password dikosongi maka tidak akan diubah'])
@include('input_image',['id'=>'avatar','label'=>'Avatar','hint'=>'* Jika avatar dikosongi maka tidak akan diubah'])
@if($d->avatar)
<div class="col-md-2"></div>
<div class="col-md-9">
	<img class="img-thumbnail" style="max-width: 200px;" src="{{ $d->avatar }}" alt="{{ $d->username }}">
</div>
@endif
@endsection

@push('script')
<script>
	$(document).ready(function(){
		$('select#status').on('change', function(){
			var jenis = $(this).val();
			if(jenis){
				if(jenis == 'Bayar sebagian'){
					$('#total_bayar').attr('readonly', false).val({{ $d->total_bayar }});
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