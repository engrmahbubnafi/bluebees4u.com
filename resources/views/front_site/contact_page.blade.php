@extends('layouts.master')
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
    <!-- Contact Form -->
    <section id="contact-1" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h1>Get In Touch</h1>
                        <p class="">Let's Talk About Your Business</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm12">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(session('flash_' . $msg))
                            <div class="alert alert-{{ $msg }}" role="alert">
                                <div class="alert-text">{{ session('flash_' . $msg) }}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    {{ Form::model(request()->old(),array('route' => array('contactStore'),'novalidate'=>'novalidate','enctype'=>"multipart/form-data")) }}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{Form::text('name',null,array('class' => (($errors->has("name")) ? "form-control is-invalid" : "form-control"),
                        'required' =>'required','placeholder' =>'Name'))}}
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::text('email',null,array('class' => (($errors->has("email")) ? "form-control is-invalid" : "form-control"),
                        'required' =>'required','placeholder' =>'Email'))}}
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::text('subject',null,array('class' => (($errors->has("subject")) ? "form-control is-invalid" : "form-control"),
                       'required' =>'required','placeholder' =>'Subject'))}}
                        @if ($errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{Form::textarea('message',null,array('class' => 'form-control', 'id'=>'message','placeholder' =>'Message'))}}
                        @if ($errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                        @endif
                    </div>
                    <div class="payment-button">
                        <button type="submit" class="pay-now-btn">Contact</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

    <!-- All Contact Informations -->
    <section id="contact-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-box">
                        <div class="section-icon">
                            <i class="fa fa-phone-square"></i>
                        </div>
                        <h4 class="font-weight-bold">Call Us</h4>
                        <div class="section-content">
                            <p>{{$site_settings->phone}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-box">
                        <div class="section-icon">
                            <i class="fa fa-map"></i>
                        </div>
                        <h4 class="font-weight-bold">Visit Us</h4>
                        <div class="section-content">
                            <p>{!! $site_settings->address !!}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-box">
                        <div class="section-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <h4 class="font-weight-bold">Mail Us</h4>
                        <div class="section-content">
                            <p>{{$site_settings->author_email}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="contact-box">
                        <div class="section-icon">
                            <i class="fa fa-comments"></i>
                        </div>
                        <div>
                            <h4 class="font-weight-bold">Live Chat</h4>
                        </div>
                        <div class="section-content">
                            <p><a href="https://www.messenger.com/bluebees4u/">Chat with Us 24/7</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')

@endpush

@push('scripts')
    {{--    <script async defer src="https://maps.googleapis.com/maps/api/js?key='AIzaSyAOWBR72E4km18LqqNPprorGXMCQYWEcZU'"></script>--}}
@endpush
