@extends('layouts.front')

@section("title") Investors Contact @endsection

@section('content')
<!-- Inner_Heading Start-->
  <div class="inner_page_bnr">
    <div class="container">
      <h2>Investors Contact</h2>
      <!-- BreadCrumb Start-->
      <div class="breadcum_bg">
        <ol class="breadcrumb">
          <li class="active"><a href="/">Home</a></li>
          <li><a href="investors-contact">Investors Contact</a></li>
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
              <li><a href="corporate-brief">Corporate Brief</a></li>
              <li><a href="financial-report">Financial Report</a></li>
              <li><a href="prospectus">Prospectus</a></li>
              <li><a href="notice">Notice</a></li>
              <li><a href="investors-contact" class="service_nav_active">Investors Contact</a></li>
              <li><a href="code-of-conduct">Code of Conduct</a></li>

            </ul>
          </div>
          <div class="single-sidebar-widget">
            <x-download-prospectus></x-download-prospectus>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
          <div class="key_benefit_col">
            <div class="key_benefit_desc key_fl">
              <h4 class="fnt28">Investors Contact</h4>
              <p class="fnt16" style="color:black;">
                MF Tower (4th Floor) <br>
                Gh-95/C, Middle Badda,<br>
                Pragati Saroni, Dhaka-1212, Bangladesh
              </p>

              <p class="fnt16">
                <span style="color:black;font-weight:bold">
                Phone:
                </span><br>
                <span>
                  <a href="tel:+880258817175">+88-02-58817175</a>
                </span><br>
                <span>
                  <a href="tel:+8802222296442">+88-02-222296442</a> (Ext. 196)
                </span>
              </p>

              <p class="fnt16">
             
              <span style="color:black;font-weight:bold">
              Cell: 
                </span><br>
                <span>
                  <a href="tel:01844004118">A.B.M. Mahbubur Rahman: 01844004118</a> 
                </span> <br>

                <span>
                  <a href="tel: 01811447144">Md. Shohel Rana: 01811447144</a>
                </span>
                
               
              </p>

              <span style="color:black;font-weight:bold">
              E-mail:
                </span><br>
                <span>
                  <a href="mailto:info@index-agro.com">share@index-agro.com</a> 
                </span> <br>

                <span>
                  <a href="mailto:shohel@index-companies.com">shohel@index-companies.com</a>
                </span>
                
               
              </p>

              <span style="color:black;font-weight:bold">
              Fax:
                </span><br>
                <span>
                <a href="tel:880258814759">+88-02-58814759</a> 
                </span> <br>
              </p>

            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
