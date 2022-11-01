@extends('layouts.front')

@section("title") Corporate Brief @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Corporate Brief</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="corporate-brief">Corporate Brief</a></li>
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
                <li><a class="service_nav_active" href="corporate-brief">Corporate Brief</a></li>
                <li><a href="financial-report">Financial Report</a></li>
                <li><a href="prospectus">Prospectus</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>
          <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
            <div class="key_benefit_col">
              <div class="key_benefit_desc key_fl">
                <h4 class="fnt28">Corporate Brief</h4>
                <p>IAIL is a symbol of trust and transparency and excellence. Since its inception in 2000, IAIL has grown into one of the largest agro companies in the country.</p>
              </div>
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Year of Establishment</td>
                    <td>2000</td>
                  </tr>
                  <tr>
                    <td>Country of Incorporation</td>
                    <td>Bangladesh</td>
                  </tr>
                  <tr>
                    <td>Country of Operation</td>
                    <td>Bangladesh</td>
                  </tr>
                  <tr>
                    <td>Converted into Public Limited Company</td>
                    <td>2015</td>
                  </tr>
                  <tr>
                    <td>Number of Employees</td>
                    <td>865</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
@endsection