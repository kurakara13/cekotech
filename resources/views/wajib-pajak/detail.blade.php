@extends('normal-layout')
@section('box')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Identitas Umum</h3>
			</div>
			<form class="form-horizontal" action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						@include('input_readonly_2',['id'=>'npwp','value'=>$d->npwp,'label'=>'NPWP'])
						@include('input_readonly_2',['id'=>'nama_wajib_pajak','value'=>$d->nama_wajib_pajak,'label'=>'Nama Wajib Pajak'])
						@include('input_readonly_2',['id'=>'tanggal_daftar','value'=>$d->tanggal_daftar,'label'=>'Tanggal Terdaftar'])
						@include('input_readonly_2',['id'=>'klu','value'=>$d->klu,'label'=>'KLU'])
						@include('input_readonly_2',['id'=>'jenis_wp','value'=>$d->jenis_wp,'label'=>'Jenis Wajib Pajak'])
						@include('input_readonly_2',['id'=>'no_id_ktp','value'=>$d->no_id_ktp,'label'=>'No ID / KTP'])
						@include('input_readonly_2',['id'=>'tanggal_lahir','value'=>$d->tanggal_lahir,'label'=>'Tanggal Lahir'])
						@include('input_readonly_2',['id'=>'tanggal_pindah','value'=>$d->tanggal_pindah,'label'=>'Tanggal Pindah'])
						@include('input_readonly_2',['id'=>'status','value'=>$d->status,'label'=>'Status WP'])
						@include('input_readonly_2',['id'=>'status','value'=>$d->no_skt,'label'=>'No SKT'])
					</div>
				</div>
			</form>
		</div>
	</div>
	{{-- dsdsds --}}
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Alamat Wajib Pajak</h3>
			</div>
			<form class="form-horizontal" action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						@include('input_readonly_2',['id'=>'provinsi','value'=>$d->provinsi,'label'=>'Propinsi'])
						@include('input_readonly_2',['id'=>'kota','value'=>$d->kota,'label'=>'Kota / Kabupaten'])
						@include('input_readonly_2',['id'=>'kecamatan','value'=>$d->kecamatan,'label'=>'Kecamatan'])
						@include('input_readonly_2',['id'=>'kelurahan','value'=>$d->kelurahan,'label'=>'Kelurahan / Desa'])
						@include('input_readonly_2',['id'=>'alamat','value'=>$d->alamat,'label'=>'Alamat WP'])
						@include('input_readonly_2',['id'=>'kode_pos','value'=>$d->tanggal_lahir,'label'=>'Kode Pos'])
						@include('input_readonly_2',['id'=>'no_telepon','value'=>$d->no_telepon,'label'=>'Nomor Telepon / HP'])
						@include('input_readonly_2',['id'=>'no_fax','value'=>$d->no_fax,'label'=>'Nomor Faximile'])
						@include('input_readonly_2',['id'=>'email','value'=>$d->email,'label'=>'Email'])
						{{-- @include('input_readonly_2',['id'=>'rt','value'=>$d->rt,'label'=>'RT'])
						@include('input_readonly_2',['id'=>'rw','value'=>$d->rw,'label'=>'RW'])
						@include('input_readonly_2',['id'=>'alamat','value'=>$d->alamat,'label'=>'Alamat'])
						@include('input_readonly_2',['id'=>'klu','value'=>$d->klu,'label'=>'KLU'])
						@include('input_readonly_2',['id'=>'no','value'=>$d->no,'label'=>'No'])
						@include('input_readonly_2',['id'=>'total_bayar','value'=>number_format($d->total_bayar, 0, ',', '.'),'label'=>'Total Bayar','readonly'=>$d->status == 'Bayar sebagian' ? false : true]) --}}
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Identitas PKP</h3>
			</div>
			<form class="form-horizontal" action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						@include('input_readonly_2',['id'=>'no_pkp','value'=>$d->no_pkp,'label'=>'Nomor PKP'])
						@include('input_readonly_2',['id'=>'tanggal_pkp','value'=>$d->tanggal_pkp,'label'=>'Tanggal PKP'])
						@include('input_readonly_2',['id'=>'no_pkp_cabut','value'=>$d->no_pkp_cabut,'label'=>'No Pencabutan PKP'])
						@include('input_readonly_2',['id'=>'tgl_pkp_cabut','value'=>$d->tgl_pkp_cabut,'label'=>'Tgl Pencabutan PKP'])
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Identitas AR (Account Representative)</h3>
			</div>
			<form class="form-horizontal" action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
				<div class="box-body">
					<div class="row">
						@include('input_readonly_2',['id'=>'nip_ar','value'=>$d->nip_ar.' / '.$d->nama_ar,'label'=>'NIP / Nama AR'])
						@include('input_readonly_2',['id'=>'nip_eks','value'=>$d->nip_eks.' / '.$d->nama_eks,'label'=>'NIP / Nama AR Eksten'])
						@include('input_readonly_2',['id'=>'nip_js','value'=>$d->nip_js.' / '.$d->nama_js,'label'=>'NIP / Juru Sita'])
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
