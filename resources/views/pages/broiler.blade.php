@extends('layouts.front')

@section("title") Broiler Feed @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Broiler Feed</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="broiler">Broiler Feed</a></li>
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
                <li><a class="service_nav_active" href="broiler">Broiler Feed</a></li>
                <li><a href="layer">Layer Feed</a></li>
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
                <h4 class="fnt28">Broiler Feed</h4>
                <p>This broiler feed is processed under the utmost hygienic conditions using premium grade ingredients and latest machineries. The offered broiler feed is used in the poultry farms for increasing the nutritive value of broiler chickens and to improve their health. This Broiler Feed is available in hygiene packaging material of different sizes at budget friendly costs. Our FCR (feed conversion ratio) is quite high. The raw materials are procured from best sources thus making our feed highly effective, enhanced shelf life with no side effects.</p>
              </div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                  <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="product-sep">
                        <h5>Poultry Feed Broiler</h5>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/broiler-1-10.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Broiler Starter 301C</h6>
                            <p class="product-sub-title">EnPro Boster (Gold)</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/broiler-11-21.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Broiler Grower 302P</h6>
                            <p class="product-sub-title">EnPro Boster (Gold)</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/broiler-11-21-1.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Broiler Grower 302c</h6>
                            <p class="product-sub-title">EnPro Boster (Gold)</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                      <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/broiler-22.jpg" alt="image" class="zoom_img_effect"></a></span>
                      <h6 class="product-title">Broiler Finisher 303 P</h6>
                            <p class="product-sub-title">EnPro Boster (Gold)</p>
                    </div>
                  </div>


                  <div class="row" style="margin-top:40px;">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="product-sep">
                      <h5>Poultry Feed Bonoraja</h5>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                    <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/bonoraja-1-3.jpg" alt="image" class="zoom_img_effect"></a></span>
                    <h6 class="product-title">Bonoraja Starter</h6>
                            <p class="product-sub-title">1 - 3 Week</p>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                    <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/bonoraja-4-6.jpg" alt="image" class="zoom_img_effect"></a></span>
                    <h6 class="product-title">Bonoraja Developer</h6>
                            <p class="product-sub-title">4 - 6 Week</p>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 plist">
                    <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/bonoraja-7.jpg" alt="image" class="zoom_img_effect"></a></span>
                    <h6 class="product-title">Bonoraja harvester</h6>
                            <p class="product-sub-title">6+ Week</p>
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