@extends('app.form')
@section('content')
<div class="content-wrapper">
  @include('page_header2')
  <section class="content">
    <div class="row">
      @include('success_msg')
      <div class="col-md-12">
        @include('error_msg')
        @yield('box')
      </div>
    </div>
  </section>
</div>
@endsection