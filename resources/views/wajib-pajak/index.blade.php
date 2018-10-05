@extends('my-view')
@section('other-box')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Kotak Pencarian</h3>
  </div>
  <div class="box-body">
    <form action="">
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="npwp">NPWP</label>
            <input max="999999999999999" min="0" name="npwp" type="text" class="form-control" id="npwp" placeholder="max 9 digit NPWP" value="{{ request()->query('npwp') }}">
          </div>
        </div>
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'nama_wajib_pajak','label'=>'Nama Wajib Pajak','value'=>request()->query('nama_wajib_pajak')])
        </div>
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'klu','label'=>'KLU','value'=>request()->query('klu')])
        </div>
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'no_telepon','label'=>'No Telepon','value'=>request()->query('no_telepon')])
        </div>
        {{-- <div class="col-sm-4">
          @include('form-vertikal.select',['id'=>'status','label'=>'Status Pembayaran','selectData'=>$listStatus,'selected'=>request()->query('status')])
        </div> --}}
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'alamat','label'=>'Alamat','value'=>request()->query('alamat')])
        </div>
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'kelurahan','label'=>'Kelurahan','value'=>request()->query('kelurahan')])
        </div>
        <div class="col-sm-4">
          @include('form-vertikal.input',['id'=>'no_id_ktp','label'=>'No ID / KTP','value'=>request()->query('no_id_ktp')])
        </div>
        <div class="col-md-12">
          <button id="cahyo" class="btn btn-flat btn-primary">Cari</button>
        </div>
      </div>
    </form>
  </div>
</div>
{!! $data->appends(['search_keyword'=>request()->query('search_keyword')])->links() !!}
@if(count($data) <= 0)
<div class="alert alert-danger">
  Tidak ada data tersedia
</div>
@elseif(!request()->query('search_keyword'))
<div class="alert alert-info">
  Menampilkan data {{ count($data) }} baris terbaru {{ $data->count() > 1 ? 'halaman '.$data->currentPage() : '' }}
</div>
@else
<div class="alert alert-info">
  Menampilkan data berdasarkan kata pencarian <strong>{{ request()->query('search_keyword')  }} </strong> {{ $data->count() > 1 ? 'halaman '.$data->currentPage() : '' }}
</div>
@endif
@endsection
@section('button-addition')
@if(Auth::user()->role != 'admin')
&nbsp;<a href="{{ route('wp.impor-excel') }}" class="btn btn-success btn-flat pull-right"><i class="fa fa-file-excel-o"></i> Impor Excel</a>
@endif
@endsection
@section('table')
<thead>
  <tr>
    <th>No</th>
    <th>NPWP</th>
    <th>Nama WP</th>
    <th>Alamat WP</th>
    <th>Kelurahan</th>
    <th>KLU</th>
    <th>Tanggal Daftar</th>
    <th>Status WP</th>
    <th>No HP</th>
    <th>AR</th>
    {{-- <th>Status</th> --}}
    <th>Detail</th>
    {{-- @if($role == Auth::user()->role) --}}
    {{-- <th width="100px">Aksi</th> --}}
    {{-- @endif --}}
  </tr>
</thead>
<tfoot>
  <tr>
    <th>No</th>
    <th>NPWP</th>
    <th>Nama WP</th>
    <th>Alamat WP</th>
    <th>Kelurahan</th>
    <th>KLU</th>
    <th>Tanggal Daftar</th>
    <th>Status WP</th>
    <th>No HP</th>
    <th>AR</th>
    {{-- <th>Status</th> --}}
    <th>Detail</th>
    {{-- @if($role == Auth::user()->role) --}}
    {{-- <th>Aksi</th> --}}
    {{-- @endif --}}
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{ $d->npwp }}</td>
    <td>{{ $d->nama_wajib_pajak }}</td>
    <td>{{ $d->alamat }}</td>
    <td>{{ $d->kelurahan }}</td>
    <td>{{ substr($d->klu,0,5) }}</td>
    <td>{{ substr($d->tanggal_daftar, 0, 4).'-'.substr($d->tanggal_daftar, 8, 2).'-'.substr($d->tanggal_daftar, 5, 2) }}</td>
    {{-- <td>{{$d->tanggal_daftar}}</td> --}}
    <td>{{ $d->status }}</td>
    <td>{{ $d->no_hp }}</td>
    <td>{{ $d->nip_ar }}</td>

{{--     <td>
      @if($role == Auth::user()->role)
      <div class="btn-group">
        <button type="button" class="btn btn-flat {{ $d->status == 'Normal' ? 'btn-primary' : 'btn-danger' }}">{{ $d->status }}</button>
        <button type="button" class="btn btn-flat {{ $d->status == 'Normal' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ route('wajib-pajak.normal', [$d->id]) }}">Normal</a></li>
          <li><a href="{{ route('wajib-pajak.non-efektif', [$d->id]) }}">Non Efektif</a></li>
        </ul>
      </div>
      @else
      {{ $d->status }}
      @endif
    </td> --}}
    <td>
      <a href="{{ route('wajib-pajak.show', [$d->id]) }}" class="btn btn-flat btn-success">
        <i class="fa fa-eye"></i>
      </a>
    </td>
    {{-- <td> --}}
    {{-- @if($role == Auth::user()->role)
      @include('edit_button', ['link' => route('wajib-pajak.edit', [$d->id])])
      @include('delete_button', ['link' => route('wajib-pajak.destroy', [$d->id])])
    @endif
    @include('detail_button', ['link' => route('wajib-pajak.show', [$d->id])]) --}}
    {{-- <div class="btn-group">
      <button type="button" class="btn btn-flat btn-primary">Aksi</button>
      <button type="button" class="btn btn-flat btn-primary dropdown-toggle" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
        @if($role == Auth::user()->role)
        <li><a href="{{ route('wajib-pajak.edit', [$d->id]) }}">Ubah</a></li>
        <li><a onclick="hapus('{{ route('wajib-pajak.destroy', [$d->id]) }}', event)" href="#">Hapus</a></li>
        @endif
        <li><a href="{{ route('wajib-pajak.show', [$d->id]) }}">Rincian</a></li>
      </ul>
    </div> --}}
  {{-- </td> --}}
</tr>
@endforeach
</tbody>
@endsection
@section('bottom-box')
{!! $data->appends(['search_keyword'=>request()->query('search_keyword')])->links() !!}
@endsection
