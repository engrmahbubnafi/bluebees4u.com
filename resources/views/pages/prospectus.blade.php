@extends('layouts.front')

@section("title") Prospectus @endsection

@section('content')
<div class="inner_page_bnr">
    <div class="container">
        <h2>Prospectus</h2>
        <div class="breadcum_bg">
            <ol class="breadcrumb">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="financial-report">Prospectus</a></li>
            </ol>
        </div>
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
                        <li><a class="service_nav_active" href="prospectus">Prospectus</a></li>
                    </ul>
                </div>
                <div class="single-sidebar-widget">
                    <x-download-prospectus></x-download-prospectus>
                </div>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 wdt_left">
                <div class="key_benefit_col">
                    <div class="key_benefit_desc key_fl">
                        <h4 class="fnt28">Prospectus</h4>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Vetted Prospectus of IAIL 26-January-2021</td>
                                <td class="text-center">
                                    <a href="files/prospectus/Vetted_Prospectus_of_IAIL_26.01.2021.docx">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Draft Prospectus dated 08.12.2020</td>
                                <td class="text-center">
                                    <a href="files/prospectus/Draft_Prospectus_08-12-2020.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Draft Prospectus Submitted to BSEC</td>
                                <td class="text-center">
                                    <a href="files/prospectus/draft-prospectus-submitted-to-bsec.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Red-Herring Prospectus</td>
                                <td class="text-center">
                                    <a href="files/prospectus/red-herring-prospectus.pdf">Download</a>
                                </td>
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