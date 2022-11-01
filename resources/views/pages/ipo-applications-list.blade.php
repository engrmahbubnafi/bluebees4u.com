@extends('layouts.front')

@section("title") IPO Application List @endsection

@section('content')
<div class="inner_page_bnr">
    <div class="container">
        <h2>Index Agro IPO Application List</h2>
        <div class="breadcum_bg">
            <ol class="breadcrumb">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="ipo-applications-list">Index Agro IPO Application List</a></li>
            </ol>
        </div>
    </div>
</div>
<!-- Inner_Heading End-->
<!-- Content_Section Start-->
<div class="wdt_100 pad_100_50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="key_benefit_col">
                    <div class="">
                        <h4 class="fnt28">Index Agro IPO Application List</h4>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>1. IPO Application List DSE</td>
                                <td class="text-center">
                                    <a href="files/ipo_application_list/1_IPO_Application_List_DSE.txt">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2. IPO Application List CSE</td>
                                <td class="text-center">
                                    <a href="files/ipo_application_list/2_IPO_Application_List_CSE.txt">Download</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3. IPO Application List MB</td>
                                <td class="text-center">
                                    <a href="files/ipo_application_list/3_IPO_Application_List_MB.txt">Download</a>
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