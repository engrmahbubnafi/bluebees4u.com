<footer>
    <section class="clearfix footer-wrapper">
        <div class="container">
            <div class="widget get-in-touch col-md-4 col-sm-6">
                <h4 class="widget_title">Contact Information </h4>
                <div class="widget-contact-list">
                    <ul>
                        <li><i class="fa fa-phone"></i>
                            <div class="fleft contact_no">
                                <a href="tel:{{$site_settings->phone}}">{{$site_settings->phone}}</a>,
                                <a href="tel:{{$site_settings->phone2}}">{{$site_settings->phone2}}</a>
                            </div>
                        </li>
                        <li><i class="fa fa-fax"></i>
                            <div class="fleft contact_no">
                                <a href="tel:+88028829759">+88-02-8829759</a><br>
                            </div>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <div class="fleft contact_mail"><a style="text-transform: none;"
                                                               href="mailto:{{$site_settings->author_email}}">{{$site_settings->author_email}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="widget get-in-touch col-md-3 col-sm-6">
                <h4 class="widget_title">Head Office</h4>
                <div class="widget-contact-list">
                    <ul>
                        <li><i class="fa fa-map-marker"></i>
                            <div class="fleft location_address">{{$site_settings->address}}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="widget widget-links col-md-5 col-sm-6">
                <h4 class="widget_title">Usefull Links</h4>
                <div class="widget-contact-list">
                    <ul>
                        @foreach($menu_settings as $data)
                            @if($data->location_id !=2)
                                @continue
                            @endif
                            @php
                                if($data->slug=='/'){
                                    $url=route('publicHome');
                                    $menu_name=$data->name;
                                }else{
                                    $url=route('contentGateway',$data->slug);
                                    $menu_name=strtoupper(str_replace("-"," ",$data->slug));
                                }
                            @endphp
                            <li><a href="{{$url}}">{{$menu_name}}</a></li>
                        @endforeach
                        <li><a href="{{route('contactUs')}}">Contact</a></li>
                    </ul>
                </div>
                <div class="widget about-us-widget">
                    <ul class="nav footer-social">
                        <li><a href="https://www.facebook.com/Index-Agro-696331154077555" target="_blank"><i
                                    class="fa fa-facebook"></i></a></li>
                        <!-- <li><a href=""><i class="fa fa-linkedin">  </i></a></li> -->
                        <li><a href="https://www.youtube.com/channel/UCPK5tAJPnLxbUUmuaBaM5IA" target="_blank"><i
                                    class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <div class="container">
        <div class="footer-copy">
            <div class="pull-left fo-txt">
                <p>©Index Agro Group {{ now('Y') }}. All rights reserved.</p>
            </div>
            <div class="pull-right fo-txt">
            </div>
        </div>
    </div>
</footer>
