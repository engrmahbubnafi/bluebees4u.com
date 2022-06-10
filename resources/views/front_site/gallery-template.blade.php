@extends('layouts.master')
@section("title") {!! $menuObj->name !!} @endsection
@section('content')
    <title>BlueBees4U | {!! $menuObj->name !!} </title>
    <div class="page_banner">
        <div class="overl"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 pt-5">
                    <div class="section-heading">
                        <h1 class="display-4 text-white">{!! $menuObj->name !!}</h1>
                    </div>
                    <div class="section-inline">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="home text-white" href="{{ route('publicHome') }}">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="home text-white fa fa-angle-double-right"></i>
                            </li>
                            <li class="list-inline-item">
                                <p class="home text-white">{!! $menuObj->name !!}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($datas as $data)
        <div class="pad_84_70 wdt_100">
            <div class="container">
                <div class="row">
                    <div class="portfolio-section port-col">
                        <div class="isotopeContainer">
                            @if($data->document)
                                @foreach($data->document as $child)
                                    @if($child->is_downloadable)
                                        <div class="col-sm-3 isotopeSelector pond">
                                            <figure><img src="{{ asset("storage".$child->file) }}" alt="image">
                                                <div class="overlay-background">
                                                    <div class="inner-overlay">
                                                        <div class="inner-overlay-content with-icons"><a
                                                                data-title="Second Image"
                                                                href="{{ asset("storage".$child->file) }}"
                                                                class="lightbox lens_icon"><i class="fa fa-search"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    @else
                                        <div class="col-md-6 mb-30">
                                            <iframe width="560" height="315" src="{{$child->file}}"
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!-- /nimble-portfolio-->
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('css')

@endpush

@push('script')

@endpush
