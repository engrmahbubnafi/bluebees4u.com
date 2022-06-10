@extends('layouts.admin')
@section('title', 'New Menu')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Menus</a></li>
                <li><a>Enter Menu details and submit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>New Menu</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('menu.index','<i class="fa fa-list"></i> Menus List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">

                <!--begin::Form-->
                {{ Form::model(request()->old(),array('route' => array('menu.store'),'class'=>'form-horizontal','novalidate'=>'novalidate','enctype'=>"multipart/form-data")) }}
                <div class="panel-content">
                    <div class="kt-section__body">
                        <h3 class="kt-section__title kt-section__title-lg">Menu Info:</h3>
                        <div class="kt-wizard-v4__form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Menu Name</label>
                                <div class="col-lg-3">
                                    {{Form::text('name',null,array('class' => (($errors->has("name")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','id'=>'name'))}}
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Slug</label>
                                <div class="col-lg-3">
                                    {{Form::text('slug',null,array('class' => (($errors->has("slug")) ? "form-control is-invalid" : "form-control"), 'required' =>'required', 'id' =>'slug'))}}
                                    @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Description</label>
                                <div class="col-lg-3">
                                    {{Form::textarea('description',null,array('class' => 'form-control', 'id'=>'description','rows'=>3))}}
                                    @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Type</label>
                                <div class="col-lg-3">
                                    {{Form::select('type',$menu_type,null,array('class' => 'form-control', 'required' =>'required','id'=>'menu_type')) }}
                                    @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row functional_type_display">
                                <label class="col-lg-2 col-form-label require">Api Link</label>
                                <div class="col-lg-3">
                                    {{--                                    {{Form::text('api_link',null,array('class' => (($errors->has("api_link")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}--}}
                                    {{Form::select('api_link[]',$document_type_api,null,array('class' => 'form-control', 'required' =>'required','multiple'=>true,'id'=>'api_link')) }}
                                    @error('api_link')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="web_type_display" style="display: none;">
                                    <label class="col-lg-2 col-form-label require">Web Content Name</label>
                                    <div class="col-lg-3">
                                        {{Form::select('web_content_id',$web_content_data,null,array('class' => 'form-control', 'required' =>'required')) }}
                                        @error('web_content_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
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
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Logo</label>
                                <div class="col-lg-3">
                                    {{Form::file('file',array('class' => (($errors->has("file")) ? "form-control is-invalid" : "form-control"), 'accept'=>"image/*",'id'=>'attach_file'))}}
                                    @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
                {{ Form::close() }}

            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet"/>
    <link href="{{ asset('vendor/select2/css/select2.css') }}" rel="stylesheet"/>
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
    <script src="{{ asset('vendor/select2/js/select2.js') }}"></script>
    <script>
        $(function () {
            $("#menu_type").change(function () {
                if (this.value == 'Web') {
                    $('.web_type_display').css('display', 'block');
                    $('.functional_type_display').css('display', 'none');
                } else if (this.value == 'Functional') {
                    $('.web_type_display').css('display', 'none');
                    // }
                    $('.functional_type_display').css('display', 'block');
                } else {
                    // if ($("#has_content").is(':checked')) {
                    $('.web_type_display').css('display', 'block');
                    // }
                    $('.functional_type_display').css('display', 'block');
                }
            });
            $("#api_link").select2({});
            $("#name").blur(function () {
                var textData=$("#name").val();
                var textArray=textData.split (/[.,\/ -]/);
                $("#slug").val(textArray.join("-").toLowerCase());

            });

        });

    </script>
@endpush



