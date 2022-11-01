@extends('layouts.front')

@section("title") Index Agro Industries Limited @endsection

@section('content')
  <div class="inner_page_bnr">
      <div class="container">
        <h2>Index Agro Industries Limited</h2>
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="agro-industries">Index Agro Industries Limited.</a></li>
          </ol>
        </div>
      </div>
    </div>


    <div class="wdt_100 pad_100_50">
      <div class="container service_page">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 wdt_right">
            <div class="single-sidebar-widget">
              <ul class="service_nav">
                <li><a class="service_nav_active" href="agro-industries">Index Agro Industries Ltd.</a></li>
                <li><a href="poultry">Index Poultry (PVT.) Ltd.</a></li>
                <li><a href="fisheries">Index Fisheries Ltd.</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
            <x-download-prospectus></x-download-prospectus>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <ul class="law_service_img">
              <li class="first_img_wdt"><span class="image_hover"><img src="images/img/index-feed.jpg" alt="image" class="zoom_img_effect"></span></li>
            </ul>
            <h4 class="fnt28">About Index Agro Industries Ltd.</h4>
            <p>Index Agro Industries Limited (IAIL), a concern of Index Group of Companies, began operations in the year 2000. IAIL produces poultry feed, fish-feed, and Day-Old Chicks (broiler & layer). Most recently, IAIL has decided to move ahead with Initial Public Offerings.</p>
            <p>An automated manufacturing facility for poultry feed. Such integration provided a powerful thrust to the breeder and hatchery operations of IAIL by ensuring the availability of quality feed. The company markets and packages its feed products under the brand name X Feed and XGoldring.</p>

            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28 mar_btm">Why Index Agro Industries</h4>
                <ul class="key_benefit_list">

                  <li>We test our every single feed ingredients as well as our finished products through our most advanced raw material analysis machine called NIR.</li>
                  <li>Plant wise individual line/production QC (quality control).</li>
                  <li>We strictly follow WHO (world health organization) guideline.</li>
                  <li>We maintain highest level of Bio Security.</li>
                  <li>A joint venture company created in the year 2009 which had personal of ‘Gold Coin’ of Switzerland. Since then, a  global manufacturing is heavily maintained to produce every batch of feed.</li>
                  <li>We maintain the CGMP (current good manufacturing practice).</li>
                  <li>Dedicatedly work a QA Team at delivery point.</li>
                  <li>As a part of our customer service & Support, a group of world  renowned  nutritionists/ scientists are constantly giving invaluable advice and instruction to our team.</li>
                  <li>One of the largest feed mill in a single location of Bangladesh.</li>
                  <li>Over 75% RM come from abroad by our own supervision /LC.</li>

                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  @endsection
