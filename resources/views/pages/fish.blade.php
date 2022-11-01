@extends('layouts.front')

@section("title")  Fish Feed @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Fish Feed</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="fish">Fish Feed</a></li>
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
                <li><a class="service_nav_active" href="fish">Fish Feed</a></li>
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
                <h4 class="fnt28">Fish Feed</h4>
                <p>Manufactured feeds are an important part of modern commercial aquaculture, providing the balanced nutrition needed by farmed fish. The feeds, in the form of granules or pellets, provide the nutrition in a stable and concentrated form, enabling the fish to feed efficiently and grow to their full potential. The company produces the nutritious fish feed imparts good health, improves immunity and entails the best FCR. </p>
              </div>
            </div>


            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                 <div class="product-sep">
                  <h5>Fish feed</h5>
                  </div>


              <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/fish-Economy-705.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Economy Starter</h6>
                  <p class="product-sub-title">Non-Oil Coated</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/fish-Economy-805.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Economy Grower</h6>
                  <p class="product-sub-title">Non-Oil Coated</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/fish-Economy-905.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Economy Finisher</h6>
                  <p class="product-sub-title">Non-Oil Coated</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Platinum-2020.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Platinum Concentrated Pre-Starter</h6>
                  <p class="product-sub-title">Oil Coated</p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Platinum-2021.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Platinum Concentrated Nursery Feed</h6>
                  <p class="product-sub-title">Oil Coated</p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/Platinum-2022.jpg" alt="image" class="zoom_img_effect"></a></span>
                  <h6 class="product-title">Platinum Hatchery Powder Feed</h6>
                  <p class="product-sub-title">&nbsp;</p>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/carp-SG-601.jpg" alt="image" class="zoom_img_effect"></a></span>
                <h6 class="product-title">Carp Starter</h6>
                <p class="product-sub-title">&nbsp;</p>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/carp-SG-602.jpg" alt="image" class="zoom_img_effect"></a></span>
                <h6 class="product-title">Carp Grower</h6>
                <p class="product-sub-title">&nbsp;</p>
                </div>


                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 plist">
                <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/carp-inisher-SG-603.jpg" alt="image" class="zoom_img_effect"></a></span>
                <h6 class="product-title">Carp Finisher</h6>
                <p class="product-sub-title">&nbsp;</p>
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