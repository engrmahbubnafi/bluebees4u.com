@if($datas)
    <section id="AllPackages">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h1>Our Packages</h1>
                        <p>We have multiple packages out of which you will feel right for you.</p>
                    </div>
                </div>
            </div>
            @php
                $anchorArray=[];
            @endphp
            @foreach($menu_settings as $data)
                @if($menuData && $data->children->count() && count($data->children->Where('slug', $menuData->slug)))
                    @foreach($data->children as $child1)
                        @php
                            $anchorArray[$child1->name]=$child1->slug;
                        @endphp
                    @endforeach
                @endif
            @endforeach
            <div class="row">
                @foreach($datas->document as $key=>$productDatas)
{{--                    @if(isset($anchorArray[$productDatas->name]))--}}
{{--                        <a href="{{route('contentGateway',$anchorArray[$productDatas->name])}}">--}}
{{--                            @endif--}}
                            <div class="col-sm-6 col-md-4 float-shadow" id="HoneyBeePackage">
                                <div
                                    class="price_table_container @if($menuData && $menuData->name==$productDatas->name) active-package @endif">
                                    <div class="price_table_heading">{!! $productDatas->name !!}</div>
                                    <div class="price_table_body">
                                        {!! $productDatas->description !!}
                                    </div>
                                </div>
                            </div>
{{--                            @if(isset($anchorArray[$productDatas->name]))--}}
{{--                        </a>--}}
{{--                    @endif--}}
                @endforeach
            </div>
        </div>
    </section>
@endif
