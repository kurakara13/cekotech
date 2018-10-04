@extends('form-vertikal.create-form')
@section('form')
@method('PUT')
<div class="col-md-12">
	<h3>Identitas Umum</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="npwp">NPWP</label>
				<input max="999999999999999" min="0" name="npwp" type="number" class="form-control" id="npwp" placeholder="max 9 digit NPWP" value="{{ old('npwp') ? old('npwp') : str_replace('-', '', str_replace('.', '', $d->npwp)) }}">
			</div>
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_wajib_pajak','value'=>$d->nama_wajib_pajak,'label'=>'Nama Wajib Pajak'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_daftar','value'=>$d->tanggal_daftar,'label'=>'Tanggal Daftar'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'klu','value'=>$d->klu,'label'=>'KLU'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'jenis_wp','value'=>$d->jenis_wp,'label'=>'Jenis WP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no_id_ktp','value'=>$d->no_id_ktp,'label'=>'No ID KTP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_lahir','value'=>$d->tanggal_lahir,'label'=>'Tanggal Lahir'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_pindah','value'=>$d->tanggal_pindah,'label'=>'Tanggal Pindah'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.select',['id'=>'status','selected'=>$d->status,'label'=>'Status Pembayaran','selectData'=>$listStatus])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no_skt','value'=>$d->no_skt,'label'=>'No SKT'])
		</div>
	</div>
	<h3>Alamat Wajib Pajak</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'provinsi','value'=>$d->provinsi,'label'=>'Propinsi'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kota','value'=>$d->kota,'label'=>'Kota / Kabupaten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kecamatan','value'=>$d->kecamatan,'label'=>'Kecamatan'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kelurahan','value'=>$d->kelurahan,'label'=>'Kelurahan / Desa'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kode_pos','value'=>$d->kode_pos,'label'=>'Kode Pos'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_telepon','value'=>$d->no_telepon,'label'=>'Nomor Telepon / HP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_fax','value'=>$d->no_fax,'label'=>'Nomor Faximile'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'email','value'=>$d->email,'label'=>'Email'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'rt','value'=>$d->rt,'label'=>'RT'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'rw','value'=>$d->rw,'label'=>'RW'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no','value'=>$d->no,'label'=>'No'])
		</div>
		{{-- <div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'total_bayar','value'=>$d->total_bayar,'label'=>'Total Bayar','readonly'=>true])
		</div> --}}
		<div class="col-md-12">
			@include('form-vertikal.textarea',['id'=>'alamat','value'=>$d->alamat,'label'=>'Alamat WP'])
		</div>
	</div>
	<h3>Identitas PKP</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_pkp','value'=>$d->no_pkp,'label'=>'No PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_pkp','value'=>$d->tanggal_pkp,'label'=>'Tanggal PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_pkp_cabut','value'=>$d->no_pkp_cabut,'label'=>'No Pencabutan PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tgl_pkp_cabut','value'=>$d->tgl_pkp_cabut,'label'=>'Tgl Pencabutan PKP'])
		</div>
		
	</div>
	<h3>Identitas AR (Account Representative)</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_ar','value'=>$d->nip_ar,'label'=>'NIP AR'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_ar','value'=>$d->nama_ar,'label'=>'Nama AR'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_eks','value'=>$d->nip_eks,'label'=>'NIP AR Eksten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_eks','value'=>$d->nama_eks,'label'=>'Nama AR Eksten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_js','value'=>$d->nip_js,'label'=>'NIP Juru Sita'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_js','value'=>$d->nama_js,'label'=>'Nama Juru Sita'])
		</div>
	</div>
</div>
@endsection
@include('import-datepicker')
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