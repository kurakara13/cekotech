@extends('my-view')
{{-- @section('button-addition')
&nbsp;<a href="{{ route('impor-excel') }}" class="btn btn-success btn-flat pull-right"><i class="fa fa-file-excel-o"></i> Impor Excel</a>
@endsection --}}
@section('table')
<thead>
  <tr>
    <th>Username</th>
    <th>Avatar</th>
    <th width="100px">Aksi</th>
  </tr>
</thead>
<tfoot>
  <tr>
    <th>Username</th>
    <th>Avatar</th>
    <th>Aksi</th>
  </tr>
</tfoot>
<tbody>
  @foreach ($data as $d)
  <tr>
    <td>{{ $d->username }}</td>
    <td><img style="max-width: 100px;" src="{{ $d->avatar }}" alt="{{ $d->username }}"></td>
    <td>
      <div class="btn-group">
        <button type="button" class="btn btn-flat btn-primary">Aksi</button>
        <button type="button" class="btn btn-flat btn-primary dropdown-toggle" data-toggle="dropdown">
          <span class="caret"></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
          <li><a href="{{ route('akun.edit', [$d->id]) }}">Ubah</a></li>
          <li><a href="{{ route('akun.destroy', [$d->id]) }}">Hapus</a></li>
        </ul>
      </div>
    </td>
  </tr>
  @endforeach
</tbody>
@endsection