@extends('layouts.admin')
@section('title', 'Menu Location')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
                <li><a>Add Menu Location</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>New Menu Location</b></h4>
            <div class="panel">
                {{ Form::model(request()->old(),array('route' => array('menu_map.store'),'class'=>'form-horizontal','novalidate'=>'novalidate')) }}
                <div class="panel-content">
                    <div class="kt-section__body">
                        <div class="kt-wizard-v4__form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Location Name</label>
                                <div class="col-lg-3">
                                    {{Form::text('name',null,array('class' => (($errors->has("name")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Status</label>
                                <div class="col-lg-3">
                                    {{Form::select('status',config('conf.status'),null,array('class' => 'form-control')) }}
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

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
