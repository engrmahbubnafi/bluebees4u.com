@extends('layouts.front')

@section("title") Index Fisheries Limited @endsection

@section('content')
  <div class="inner_page_bnr">
      <div class="container">
        <h2>Index Fisheries Limited</h2>
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="fisheries">Index Fisheries Limited.</a></li>
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
                <li><a href="agro-industries">Index Agro Industries Ltd.</a></li>
                <li><a href="poultry">Index Poultry (PVT.) Ltd.</a></li>
                <li><a class="service_nav_active" href="fisheries">Index Fisheries Ltd.</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <ul class="law_service_img">
              <li class="first_img_wdt"><span class="image_hover"><img src="images/img/fisheries-banner.jpg" alt="image" class="zoom_img_effect"></span></li>
            </ul>
            <h4 class="fnt28">About Index Fisheries</h4>
            <p>Index Fisheries Ltd. is working with Aquaculture & Fisheries business. The company has been incorporated in 2004 and now producing good quality seeds (Fish Fry & Fingerlings) from our own Hatchery/Aqua Breeder Farm. Its aquaculture, quality seed are two most important factors. There are three major issues for being a profitable fish farm</p>
            <p>
                <strong>

                    1. Inbreeding free quality seed (Fish Fry & Fingerlings)<br>
                    2. Balance feed<br>
                    3. Quality management.

                </strong>
            </p>

                <p>So, for the betterment of Aquaculture in Bangladesh, the management of Index Companies has decided to produce inbreeding free fast growing & healthy fish fry & fingerlings.
                    Now we have a join collaboration & RND farm together with Rural Development Academy (RDA), Bogura, under the ministry of LGRD. We are always committed to the profitability
                    of the farmers. We are also aware of the pollution of soil & water as well as the environment. We always follow the GAP (Good Aquaculture Practice) rules in our farms.
                </p>

                <div class="key_benefit_col">
                <div class="key_benefit_desc key_fl">
                    <h4 class="fnt28 mar_btm">Why Index Fisheries</h4>

                    <ul class="key_benefit_list">
                    <li>We are the only company in Bangladesh n//to are producing their Fish Fry by the technical support of scientists of RDA. (RDA is a unit of LGRD).</li>
                    <li>We have our own R & D farm for the development of Brood stock & Tilapia fry.</li>
                    <li>We have trial farms / demonstration farms in different location of Bangladesh that help to improve the formulation of fish feed.</li>
                    <li>We are producing high protein feed for fish that helps to increase the body growth & survival rate of cultured fish.</li>
                    <li>We arrange training program for fish farmers regularly. Joined collaboration with RDA & KK foundation.</li>
                    </ul>
                </div>
                </div>
          </div>


        </div>
      </div>
    </div>
    @endsection