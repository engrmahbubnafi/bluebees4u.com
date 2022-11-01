@extends('layouts.front')

@section("title") Breeder Farms @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Breeder Farms</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="breeder-farms">Breeder Farms</a></li>
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
                <li><a href="feed-mill">Feed Mill</a></li>
                <li><a class="service_nav_active" href="breeder-farms">Breeder Farms</a></li>
                <li><a href="hatcheries">Hatcheries</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="law_service_img">
              <div class="first_img_wdt"><span class="image_hover"><img src="images/img/breeder-farm.jpg" alt="image" class="zoom_img_effect"></span></div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28 csr-title-space">Breeder Farms (Rajendrapur & Bogra) </h4>
                <p>To meet and extended demand of chicken, IAIL (Index Agro Industries Ltd.) has established 2 breeder farms, one is located in Rajendrapur and another in Bogra.  The farm is Rajendrapur started its operation back in 2004 and currently has an annual capacity of 11.5 million DOC. Their activities are to produce and sell day Old chicks (DOC) from the hatchery unit and hatching eggs from the breeder production unit. An experienced and well-organized team of local poultry experts engaged full time for the smooth operation of the company. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
@endsection
