@extends('app.form')
@section('content')
<div class="content-wrapper">
  @include('page_header2')
  <section class="content">
    <div class="row">
      @include('success_msg')
      <div class="col-md-12">
        @include('error_msg')
        @if(isset($without_primary))
        @else
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ $title }}</h3>
          </div>
          <form action="{{ $action }}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
              <div class="row">
                @yield('form')              
              </div>
            </div>
            <div class="box-footer">
              @include('batal_btn')
              @isset($saveBtn)
              @else
              @include('simpan_btn')
              @endisset
            </div>
          </form>
        </div>
        @endif
        @yield('other-box')
      </div>
    </div>
  </section>
</div>
@endsection