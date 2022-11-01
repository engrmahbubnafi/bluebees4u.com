@extends('layouts.front')

@section("title") Error @endsection

@section('content')

<div class="inner_page_bnr">
    <div class="container">
      <h2>Page not found</h2>
      <div class="breadcum_bg">
        <ol class="breadcrumb">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="/">Page not found</a></li>
        </ol>
      </div>
    </div>
  </div>

<div class="wdt_100" style="margin-top: 100px;">
  <div class="container service_page">
    <div class="row">
        <p class="text-center" style="margin-bottom: 100px;color:red;">404 - Page not found</p>
    </div>
  </div>
</div>
@endsection
