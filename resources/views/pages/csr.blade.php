@extends('layouts.front')

@section("title") CSR @endsection

@section('content')  
<!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Corporate Social Responsibility</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="csr">CSR</a></li>
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
                <li><a href="usp">Unique Selling Point (USP)</a></li>
                <li><a href="bod">Board of Directors (BOD)</a></li>
                <li><a class="service_nav_active" href="csr">Corporate Social Responsibility (CSR)</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="law_service_img">
              <div class="first_img_wdt"><span class="image_hover"><img src="images/img/csr-banner.jpg" alt="image" class="zoom_img_effect"></span></div>
            </div>
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28 csr-title-space">Khamarir Hashi</h4>
                <p>This program is extremely supportive towards the cause of making farmers self-dependent. The company is selling the farmers DOC and providing them with feed on credit. In time, the company is buying back the DOC’s from the same farmers. By providing such logistical and financial support, the company is creating entrepreneurs. </p>

                <h4 class="fnt28 csr-title-space">Contribution in KKF Foundation</h4>
                <p>The Kamrunnesa Khatun Foundation (KKF) is an independent nonprofit charity, committed to bringing about better lives for the disadvantaged people in Bangladesh. KKF works to improve the lives of the underprivileged and disadvantaged groups of people in society by providing them with the opportunity to live full and independent lives. KKF works with a vision for change- a vision to bring qualitative changes in the lives of the underprivileged, especially through supporting the access to quality education, nutritious food, safe water, shelter and sanitation for the underprivileged children all over Bangladesh. IAIL is one of the biggest contributors in various projects of KKF Foundation. </p>

                <h4 class="fnt28 csr-title-space">Contribution in various types of charity organizations</h4>
                <p>IAIL also donates in various other charity organizations such as different orphanages and madrasas. </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
    @endsection