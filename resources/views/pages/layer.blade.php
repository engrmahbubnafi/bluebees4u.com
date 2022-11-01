@extends('layouts.front')

@section("title") Layer Feed @endsection

@section('content')
 <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Layer Feed</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="layer">Layer Feed</a></li>
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
                <li><a class="service_nav_active" href="layer">Layer Feed</a></li>
                <li><a href="fish">Fish Feed</a></li>
                <li><a href="cattle">Cattle Feed</a></li>
                <li><a href="doc">Doc (Day Old Chicks)</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28">Layer Feed</h4>
                <p>Our layer feeds are formulated to meet your unique requirements for breed type, performance goals, and health management. New feeding programs, technology, and management techniques make our feed superior in terms of quality.</p>
              </div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <!-- <h4 class="fnt28">Broiler Feed</h4> -->
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="product-sep">
                        <h5>Poultry Feed Layer</h5>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Layer-1-10.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Layer Starter 102 C</h6>
                                    <p class="product-sub-title">1 - 10  Week</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Layer-11-18.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Layer Grower 103 C</h6>
                                    <p class="product-sub-title">11 - 18  Week</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Layer-11-18-1.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Layer Grower 103 M</h6>
                                    <p class="product-sub-title">11 - 18  Week</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Layer-19-42.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Layer Layer-1 105 M</h6>
                                    <p class="product-sub-title">19 - 42  Week</p>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    @endsection