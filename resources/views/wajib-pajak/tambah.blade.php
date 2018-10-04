@extends('form-vertikal.create-form')
@section('form')
<div class="col-md-12">
	<h3>Identitas Umum</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="npwp">NPWP</label>
				<input max="999999999999999" min="0" name="npwp" type="number" class="form-control" id="npwp" placeholder="max 9 digit NPWP" value="{{ old('npwp') }}">
			</div>
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_wajib_pajak','label'=>'Nama Wajib Pajak'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_daftar','label'=>'Tanggal Daftar'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'klu','label'=>'KLU'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'jenis_wp','label'=>'Jenis WP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no_id_ktp','label'=>'No ID KTP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_lahir','label'=>'Tanggal Lahir'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_pindah','label'=>'Tanggal Pindah'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.select',['id'=>'status','label'=>'Status Pembayaran','selectData'=>$listStatus])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no_skt','label'=>'No SKT'])
		</div>
	</div>
	<h3>Alamat Wajib Pajak</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'provinsi','label'=>'Propinsi'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kota','label'=>'Kota / Kabupaten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kecamatan','label'=>'Kecamatan'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kelurahan','label'=>'Kelurahan / Desa'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'kode_pos','label'=>'Kode Pos'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_telepon','label'=>'Nomor Telepon / HP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_fax','label'=>'Nomor Faximile'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'email','label'=>'Email'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'rt','label'=>'RT'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'rw','label'=>'RW'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'no','label'=>'No'])
		</div>
		{{-- <div class="col-md-4">
			@include('form-vertikal.input_number',['id'=>'total_bayar','label'=>'Total Bayar','readonly'=>true])
		</div> --}}
		<div class="col-md-12">
			@include('form-vertikal.textarea',['id'=>'alamat','label'=>'Alamat WP'])
		</div>
	</div>
	<h3>Identitas PKP</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_pkp','label'=>'No PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tanggal_pkp','label'=>'Tanggal PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'no_pkp_cabut','label'=>'No Pencabutan PKP'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.datepicker',['id'=>'tgl_pkp_cabut','label'=>'Tgl Pencabutan PKP'])
		</div>
		
	</div>
	<h3>Identitas AR (Account Representative)</h3>
	<hr>
	<div class="row">
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_ar','label'=>'NIP AR'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_ar','label'=>'Nama AR'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_eks','label'=>'NIP AR Eksten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_eks','label'=>'Nama AR Eksten'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nip_js','label'=>'NIP Juru Sita'])
		</div>
		<div class="col-md-4">
			@include('form-vertikal.input',['id'=>'nama_js','label'=>'Nama Juru Sita'])
		</div>
	</div>
</div>
@endsection

@include('wajib-pajak.script')
@include('import-datepicker')