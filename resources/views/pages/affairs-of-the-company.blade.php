@extends('layouts.front')

@section("title") Affairs of the Company @endsection

@section('content')
  <!-- Inner_Heading Start-->
    <div class="inner_page_bnr">
      <div class="container">
        <h2>Affairs of the Company</h2>
        <!-- BreadCrumb Start-->
        <div class="breadcum_bg">
          <ol class="breadcrumb">
            <li class="active"><a href="/">Home</a></li>
            <li><a href="affairs-of-the-company">Affairs of the Company</a></li>
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
                <li><a href="investors-contact">Investors Contact</a></li>
                <li><a href="code-of-conduct">Code of Conduct</a></li>
                <li><a href="affairs-of-the-company" class="service_nav_active">Affairs of the Company</a></li>
              </ul>
            </div>
            <div class="single-sidebar-widget">
              <x-download-prospectus></x-download-prospectus>
            </div>
          </div>

          <div class="col-lg-8 col-md-8 col-sm-8">


            <div class="">
              <div class="">
                <h4 class="fnt28 csr-title-space">Affairs of the Company</h4>
                <p>
                Index Agro Industries Limited (IAIL) was incorporated in Bangladesh on September 13, 2000 as a private limited company by shares under the Companies Act, 1994 having the registration no. C-41289(648)/2000. The Company started its commercial operation on July 01, 2004. Subsequently IAIL was converted as a public limited company by shares under the companies Act, 1994 on March 31, 2015.
                </p>

                <p>
                The principal activities of the Company are manufacturing and marketing of poultry feed, fish feed and producing Day Old Chicks (DOC).
                </p>

                <p>
                IAIL’s business environment is conducive to the business as it has good supply of raw materials. IAIL has skilled labors as well. The wage of labor is reasonable also. Government policy is favorable to the sector. Overall, it is a business-friendly situation.
                </p>

                <p>
                Index Agro Industries Limited has no subsidiary company but it has an associate company named X-Ceramics Ltd. where the issuer holds 24.39% shares. X-Ceramics Ltd. is engaged in manufacturing ceramic tiles in Bangladesh.
                </p>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Content_Section End-->
@endsection