@extends('layouts.admin')
@section('title', 'Edit Menu')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Menu</a></li>
                <li><a>Enter Menu details</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Update Menu</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('menu.index','<i class="fa fa-list"></i> Menu List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($menu,array('route' => array('menu.update', $menu->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                    <div class="panel-content">
                        <div class="kt-section__body">
                            <h3 class="kt-section__title kt-section__title-lg">Menu Info:</h3>
                            <div class="kt-wizard-v4__form">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Menu Name</label>
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
                                    <label class="col-lg-2 col-form-label require">Slug</label>
                                    <div class="col-lg-3">
                                        {{Form::text('slug',null,array('class' => (($errors->has("slug")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
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
                                <div class="form-group row functional_type_display" style="display: none;">
                                    <label class="col-lg-2 col-form-label require">Api Link</label>
                                    <div class="col-lg-3">
                                        {{--                                        {{Form::text('api_link',null,array('class' => (($errors->has("api_link")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}--}}
                                        {{Form::select('api_link[]',$document_type_api,$api_links,array('class' => 'form-control', 'required' =>'required','multiple'=>true,'id'=>'api_link')) }}
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
                                    <div class="col-6">
                                        <object data="{{ asset("storage".$menu->file) }}" width="300"
                                                height="200"></object>
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
                getMessage(this.value);
            });
        });
        $(document).ready(function () {
            getMessage($("#menu_type").val());
            $("#api_link").select2({});

        });

        // $("#has_content").change(function () {
        //     if (this.checked) {
        //         $('.web_type_display').css('display', 'block');
        //     } else {
        //         $('.web_type_display').css('display', 'none');
        //     }
        // });
        function getMessage(data) {
            if (data == 'Web') {
                $('.web_type_display').css('display', 'block');
                $('.functional_type_display').css('display', 'none');
            } else if (data == 'Functional') {
                // if ($("#has_content").is(':checked')) {
                //     $('.web_type_display').css('display', 'block');
                // }else{
                $('.web_type_display').css('display', 'none');
                // }
                $('.functional_type_display').css('display', 'block');
            } else {
                $('.functional_type_display').css('display', 'block');
                $('.web_type_display').css('display', 'block');
            }
        }
    </script>
@endpush
