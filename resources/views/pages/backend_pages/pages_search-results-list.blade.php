@extends('layouts.admin')
@section('content')
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-copy" aria-hidden="true"></i><a href="#">Pages</a></li>
            <li><a>Search results</a></li>
            <li><a>List Style</a></li>
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

                    <div class="search-results-list">
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Debitis  aspernatur <span class="highlight">Admin</span> dignissimos <span class="highlight">Template</span> dolorem excepturi</h5></a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam, cum dicta dignissimos distinctio dolorem eligendi fugit illum impedit ipsam iusto magni molestias mollitia pariatur quaerat repellendus rerum saepe sapiente soluta totam veniam voluptas voluptate!</p>
                                <p><b>Page section: Tables</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Admin</a><a href="#" class="badge x-lighter-1 b-rounded">Template</a>
                            </div>
                        </div>
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Ipsum  <span class="highlight">Dashboard</span> debitis dolor sit amet dolorem excepturi</h5></a>
                                <p>Porro repellendus repudiandae sed sequi similique voluptatem. Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi!</p>
                                <p><b>Page section: Pages</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                            </div>
                        </div>
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Lorem ipsum dolor sit amet <span class="highlight">Admin</span> debitis dolorem excepturi</h5></a>
                                <p>Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                <p><b>Page section: UI Elements</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Admin</a>
                            </div>
                        </div>
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Sit amet <span class="highlight">Admin Dashboard</span> debitis dolorem excepturi</h5></a>
                                <p>Eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo inventore maxime nostrum placeat possimus ratione! consectetur adipisicing elit. Nam, quas.</p>
                                <p><b>Page section: Charts</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Admin</a><a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                            </div>
                        </div>
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Dolor sit amet <span class="highlight">Dashboard</span> debitis dolorem excepturi</h5></a>
                                <p>Accusantium aspernatur dignissimos dolorem eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                <p><b>Page section: Widgets</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Dashboard</a>
                            </div>
                        </div>
                        <div class="row search-item">
                            <div class="col-md-10">
                                <a href="#" class="search-title"><h5>Amet <span class="highlight">Template</span> excepturi nemo quasi qui </h5></a>
                                <p>Eius excepturi nemo quasi qui quis quisquam quod. Ad, quasi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam, quas.</p>
                                <p><b>Page section: Forms</b></p>
                            </div>
                            <div class="col-md-2">
                                <a href="#" class="badge x-lighter-1 b-rounded">Template</a>
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
