@extends('layouts.front')

@section("title") USP @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Unique Selling Point</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="usp">USP</a></li>
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
                <li><a class="service_nav_active" href="usp">Unique Selling Point (USP)</a></li>
                <li><a href="bod">Board of Directors (BOD)</a></li>
                <li><a href="csr">Corporate Social Responsibility (CSR)</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="law_service_img">
              <div class="first_img_wdt"><span class="image_hover"><img src="images/img/usp-banner.jpg" alt="image" class="zoom_img_effect"></span></div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28 csr-title-space">Unique Selling Point</h4>
                <ul class="key_benefit_list">
                  <li>We test our every single feed ingredient as well as our finished products through our most advanced raw material analysis machine called NIR.</li>
                  <li>Plant wise individual line/production QC (quality control). </li>
                  <li>We strictly follow WHO (world health organization) guideline.</li>
                  <li>We maintain highest level of BIO security.</li>
                  <li>A joint venture company created in the year 2009 which had personal of ‘Gold Coin’ of Switzerland. Since then, a global manufacturing is heavily maintained to produce every batch of feed.</li>
                  <li>We maintain the CGMP (current good manufacturing practice).</li>
                  <li>World class QA team at delivery point. As part of our customer service & support, a group of world-renowned nutritionists/scientists are constantly giving invaluable advice and instruction to our team.</li>
                  <li>One of the largest feed-mill in a single location in Bangladesh. </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
  @endsection