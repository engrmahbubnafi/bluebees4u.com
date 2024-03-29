@extends('layouts.admin')
@section('content')
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-copy" aria-hidden="true"></i><a href="#">Pages</a></li>
            <li><a>Search results</a></li>
            <li><a>Grid style</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="animated fadeInUp">
    <!--SEARCH-->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form class="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                    <span class="input-with-icon">
                                <input type="text" class="form-control" id="lefticon" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--RESULTS-->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <h4>Results for <span class="highlight">"Dashboard Admin Template"</span> </h4>
                    <h6>Total search results <b>147</b></h6>
                    <div class="search-results-grid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Debitis  aspernatur <span class="highlight">Admin</span> dignissimos <span class="highlight">Template</span> dolorem excepturi</a>
                                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam, cum dicta dignissimos distinctio dolorem eligendi fugit illum impedit ipsam iusto magni molestias mollitia pariatur quaerat repellendus rerum saepe sapiente soluta totam veniam voluptas voluptate!</p>
                                    <p><b>Page section: Tables</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Admin</a><a href="#" class="badge x-lighter-1 b-rounded">Template</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Ipsum  <span class="highlight">Dashboard</span> debitis dolor sit amet dolorem excepturi</a>
                                    <p class="text">Porro repellendus repudiandae sed sequi similique voluptatem. Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi!</p>
                                    <p><b>Page section: Pages</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Lorem ipsum dolor sit amet <span class="highlight">Admin</span> debitis dolorem excepturi</a>
                                    <p class="text">Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: UI Elements</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Admin</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Sit amet <span class="highlight">Admin Dashboard</span> debitis dolorem excepturi</a>
                                    <p class="text">Eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo inventore maxime nostrum placeat possimus ratione! consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: Charts</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Admin</a><a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Dolor sit amet <span class="highlight">Dashboard</span> debitis dolorem excepturi</a>
                                    <p class="text">Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: Widgets</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Amet <span class="highlight">Template</span> excepturi nemo quasi qui </a>
                                    <p class="text">Eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: Forms</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Template</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Aquert emet <span class="highlight">Dashboard</span>  nemo quasi qui </a>
                                    <p class="text">Euisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: Charts</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <a href="#"><img alt="photo" src="{{ asset('images/helsinki.jpg') }}" class="img-responsive"></a>
                                <div class="search-item-content">
                                    <a href="#" class="search-title">Remet nemo quasi qui <span class="highlight">Template</span>  nemo quasi <span class="highlight">Admin</span>   qui exceptui </a>
                                    <p class="text">Er sit amet, consectetur adipisicing elit. Modi! excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                    <p><b>Page section: Pages</b></p>
                                    <a href="#" class="badge x-lighter-1 b-rounded">Template</a><a href="#" class="badge x-lighter-1 b-rounded">Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <i class="fa fa-caret-left"></i>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <i class="fa fa-caret-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
@endsection