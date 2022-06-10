@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">User</a></li>
                <li><a>Edit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>User</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('users.index','<i class="fa fa-list"></i> List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($users,array('route' => array('saveResetPassword', $users->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'POST','enctype'=>"multipart/form-data")) }}
                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">User Info:</h3>
                                <div class="kt-wizard-v4__form">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-2 control-label">Name</label>
                                                <div class="col-md-8">
                                                    {{Form::text('name',null,array('class' => 'form-control', 'required' =>'required'))}}
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-2 control-label">Password</label>
                                                <div class="col-md-8">
                                                    {{Form::text('password','',array('class' => 'form-control', 'required' =>'required'))}}
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-2 control-label">Confirm
                                                    Password</label>
                                                <div class="col-md-8">
                                                    {{Form::text('password_confirmation',null,array('class' => 'form-control', 'required' =>'required'))}}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <button type="submit" class="btn btn-primary">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
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
