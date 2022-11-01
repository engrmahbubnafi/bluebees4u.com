@extends('layouts.front')

@section("title") Cattle Feed @endsection

@section('content')

<div class="inner_page_bnr">
      <div class="container">
        <h2>Cattle Feed</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="cattle">Cattle Feed</a></li>
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
                <li><a class="service_nav_active" href="cattle">Cattle Feed</a></li>
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
                <h4 class="fnt28">Cattle Feed</h4>
                <p>Cattle on feed are animals being fed a ration of grain, silage, hay and/or protein supplement for slaughter market that are expected to produce a carcass that will grade select or better. Our offering in the cattle feed category is manufactured using the latest technology. It is a high protein cattle feed that is ideal for feeding cattle comprising all types of cows. It should be used for feeding dairy cows for maximum milk production in all climatic conditions.</p>
              </div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="product-sep">
                    <h5>Cattle Feed</h5>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/cattle-feed-205p.jpg" alt="image" class="zoom_img_effect"></a></span>
                    <h6 class="product-title">Cattle Feed Dairy</h6>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 plist">
                  <span class="prd_img"><a href="javascript:void(0)" class="image_hover"><img src="images/img/products/cattle-feed-206p.jpg" alt="image" class="zoom_img_effect"></a></span>
                    <h6 class="product-title">Cattle Feed Fattening</h6>
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