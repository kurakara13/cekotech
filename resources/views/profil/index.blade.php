@extends('create-form')
@section('form')
@method('put')
@if(Auth::user()->role == 'superadmin')
@include('input',['value'=>Auth::user()->username,'id'=>'username','label'=>'Username'])
<input type="hidden" name="old_username" value="{{ Auth::user()->username }}">
@endif
@include('input_password',['id'=>'password','label'=>'Password','hint'=>'* Jika password dikosongi maka tidak akan diubah'])
@include('input_image',['id'=>'avatar','label'=>'Avatar','hint'=>'* Jika avatar dikosongi maka tidak akan diubah'])
@if(Auth::user()->avatar)
<div class="col-md-2"></div>
<div class="col-md-9">
	<img class="img-thumbnail" style="max-width: 200px;" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->username }}">
</div>
@endif
@endsection