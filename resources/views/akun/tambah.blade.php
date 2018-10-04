@extends('create-form')
@section('form')
@include('input',['id'=>'username','label'=>'Username'])
@include('input_image',['id'=>'avatar','label'=>'Avatar'])
@include('input_password',['id'=>'password','label'=>'Password'])
@endsection