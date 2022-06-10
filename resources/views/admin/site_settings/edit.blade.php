@extends('layouts.admin')
@section('title', 'Edit Site Settings')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Edit Site Settings</a></li>
                <li><a>Edit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Site Settings</b></h4>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($siteSettings,array('route' => array('site_settings.update', $siteSettings->id),'class'=>'kt-form form-horizontal',
'novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group{{ $errors->has('site_title') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-2 control-label">Site Title</label>
                                        <div class="col-md-6">
                                            {{Form::text('site_title',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('site_title'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('site_title') }}</strong>
                                    </span>`
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('site_author') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Site Author</label>

                                        <div class="col-md-6">
                                            {{Form::text('site_author',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('site_author'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('site_author') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('author_email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Author E-mail</label>
                                        <div class="col-md-6">
                                            {{Form::text('author_email',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('author_email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('author_email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Address</label>
                                        <div class="col-md-6">
                                            {{Form::textarea('address',null,array('class' => 'form-control', 'required' =>'required', 'rows' =>'2'))}}
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Phone</label>
                                        <div class="col-md-6">
                                            {{Form::text('phone',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone2') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Phone 2</label>
                                        <div class="col-md-6">
                                            {{Form::text('phone2',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('phone2'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('phone2') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Fax</label>
                                        <div class="col-md-6">
                                            {{Form::text('fax',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('fax'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('web') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Web</label>
                                        <div class="col-md-6">
                                            {{Form::text('web',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('web'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('web') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('social') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Social</label>
                                        <div class="col-md-6">
                                            {{Form::text('social',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @if ($errors->has('social'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('social') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Logo</label>

                                        <div class="col-md-6">
                                            <object data="{{ asset("storage/site_settings/".$siteSettings->logo) }}"
                                                    width="300"
                                                    height="200"></object>

                                            {{Form::hidden('old_image',$siteSettings->logo)}}
                                            {{Form::file('logo',array('class' => (($errors->has("logo")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','accept'=>'image/*'))}}
                                            @if ($errors->has('logo'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('logo') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('logo_inner') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-2 control-label">Inner Logo</label>

                                        <div class="col-md-6">
                                            <object
                                                data="{{ asset("storage/site_settings/".$siteSettings->logo_inner) }}"
                                                width="300"
                                                height="200"></object>

                                            {{Form::hidden('old_inner_image',$siteSettings->logo_inner)}}
                                            {{Form::file('logo_inner',array('class' => (($errors->has("logo_inner")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','accept'=>'image/*'))}}
                                            @if ($errors->has('logo_inner'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('logo_inner') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet"/>
    <style>
        .kt-form {
            width: 100% !important;
            padding-top: 0 !important;
        }

        .check-all {
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #efefef;
            cursor: pointer;
        }

        .checkbox label {
            cursor: pointer;
        }
    </style>
@endpush

@push('script')

@endpush
