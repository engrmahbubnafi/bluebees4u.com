@extends('layouts.front')

@section("title") Feed Mill @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Feed Mill</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="usp">Feed Mill</a></li>
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
                <li><a class="service_nav_active" href="feed-mill">Feed Mill</a></li>
                <li><a href="breeder-farms">Breeder Farms</a></li>
                <li><a href="hatcheries">Hatcheries</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="law_service_img">
              <div class="first_img_wdt"><span class="image_hover"><img src="images/img/feed-banner.jpg" alt="image" class="zoom_img_effect"></span></div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28 csr-title-space">Feed Mill (Valuka- Mymensingh)</h4>
                <p>The project has been designed for successfully producing and marketing of Fish & Poultry feeds. An experienced and well-organized team of local poultry experts engaged full time for the smooth operation of the company. Commencing operation back in 2009, the company has held its reputation as a quality provider of feed in the market. Started off with a 5ton (per hour) capacity plant. Now the capacity has reached 8ton (per hour) with a manpower capacity of 365. Actual production capacity of feed mill is 96,000 MT Feed. Recently, the company has added ‘cattle feed’ in its product line. There is also a fish feed plant. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    @endsection