@extends('layouts.front')

@section("title") Financial Report @endsection

@section('content')
<div class="inner_page_bnr">
    <div class="container">
        <h2>Financial Report</h2>
        <div class="breadcum_bg">
            <ol class="breadcrumb">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="financial-report">Financial Report</a></li>
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
                        <li><a class="service_nav_active" href="financial-report">Financial Report</a></li>
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
                        <h4 class="fnt28">Financial Report</h4>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Un-audited FS for the period ended 30 September 2021</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/Un-audited_FS_for_the_period_ended_30_September_2021.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Report 2021</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/Financial_Report 2021_211021_112545.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Un-audited FS for the period ended 31 March 2021</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/Un_audited_FS_for_the_period_ended_31_March_2021.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Report 2020</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/Financial_Statements_2020.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Report 2019</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/FS_ 2019 of IAIL.pdf">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Financial Report 2018</td>
                                <td class="text-center">
                                    <a
                                        href="files/financial_report/FS_ 2018 of IAIL.pdf">Download</a>
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