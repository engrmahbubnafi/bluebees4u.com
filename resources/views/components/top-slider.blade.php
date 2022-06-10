<div class="top_slider">
    <!-- Navbar Start-->
    <nav id="main-navigation-wrapper" class="navbar navbar-default finance-navbar">
    </nav>
    <!-- Navbar End-->
    <!-- BannerCol Start-->
    <div id="minimal-bootstrap-carousel" data-ride="carousel" class="carousel slide carousel-fade shop-slider slider6">
        <!-- Wrapper for slides-->
        <div role="listbox" class="carousel-inner">
            @foreach($sliderData as $items)
                @if(isset($items['document']))
                    @foreach($items['document'] as $key=>$data)
                        <div style="background-image: url({{ asset("storage".$data['file']) }});"
                             class="item @if($key==0)active @endif slide-{{$key+1}}">
                            <div class="carousel-caption">
                                <div class="thm-container">
                                    <div class="box valign-top @if($key==0)home1_slide1 @endif">
                                        <div class="content text-left wdt55 @if($key==0) cnt_fr @else cnt_fl @endif">
                                            <h2 data-animation="animated fadeInUp"
                                                class="slider-text-title">{{$data['name']}}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
        <!-- Controls-->
        <a href="#minimal-bootstrap-carousel" role="button" data-slide="prev" class="left carousel-control">
            <i class="fa fa-angle-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#minimal-bootstrap-carousel" role="button" data-slide="next" class="right carousel-control">
            <i class="fa fa-angle-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- BannerCol End-->
</div>
