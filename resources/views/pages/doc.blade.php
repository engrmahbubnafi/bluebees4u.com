@extends('layouts.front')

@section("title") Doc (Day Old Chicks) @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Doc (Day Old Chicks)</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="doc">Doc</a></li>
          </ol>
        </div>
        <!-- BreadCrumb End-->
      </div>
    </div>
    <!-- Inner_Heading End-->
    <!-- Content_Section Start-->
    <div class="wdt_100 pad_100_50">
      <div class="container service_page">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 wdt_right">
            <div class="single-sidebar-widget">
              <ul class="service_nav">
                <li><a href="broiler">Broiler Feed</a></li>
                <li><a href="layer">Layer Feed</a></li>
                <li><a href="fish">Fish Feed</a></li>
                <li><a href="cattle">Cattle Feed</a></li>
                <li><a class="service_nav_active" href="doc">Doc (Day Old Chicks)</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28">Doc (Day Old Chicks)</h4>
                <p>Our Company distributes 1-day old chicks (DOC) that are produced from the company’s international standardized breeding farms and hatchery plants. The company always follows the best management practices with highly standard biosecurity and always maintain maternal anti-body status to produce vertically transmitted disease-free DOC.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    @endsection