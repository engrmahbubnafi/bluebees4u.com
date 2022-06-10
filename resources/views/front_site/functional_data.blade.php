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
    @foreach ($datas as $key=>$data)
        <x-products :datas="$data" :data-num="$loop->iteration" :menu-data="$menuObj"></x-products>
    @endforeach
@endsection

@push('css')

@endpush

@push('script')

@endpush
