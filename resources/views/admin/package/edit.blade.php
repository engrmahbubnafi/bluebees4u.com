@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="{{ Request::url() }}">Update Package</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
        <h4 class="section-subtitle">Update Package</h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                        {{ Form::model($packageData,array('route' => array('package.update', $packageData->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Name</label>
                            <div class="col-lg-3">
                                {{Form::text('package_name',null,array('class' => (($errors->has("package_name")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','id'=>'package_name'))}}
                                @error('package_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Price</label>
                            <div class="col-lg-3">
                                {{Form::text('price',null,array('class' => (($errors->has("price")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','id'=>'price'))}}
                                @error('price')
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

                            <label class="col-lg-2 col-form-label require">Is Signup Able</label>
                            <div class="col-lg-3">
                                {{Form::checkbox('is_signup_able','1',$packageData->is_signup_able==1 ? true : false ,array('required' =>'required','id'=>'is_signup_able')) }}
                                @error('is_signup_able')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        @foreach($packageData->packageFeature as $key=>$data)
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">@if($key==0)Package Features  @endif</label>
                                <div class="col-lg-3">
                                    {{Form::hidden('feature_id[]',$data->id)}}
                                    {{Form::text('package_features[]',$data->feature_name,array('class' => (($errors->has("price")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','id'=>'package_features'))}}
                                    @error('package_features')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-7">
                                    <i class="fa @if($key==0) fa-plus-circle plus_icon_row_number @else fa-minus-circle minus_icon_row_number @endif"
                                       id="add_package_feature"
                                       style="font-size:26px;color:@if($key==0) green @else red @endif; cursor: pointer; float: left;"
                                       aria-hidden="true"></i>
                                </div>
                            </div>
                        @endforeach
                        <div id="feature_append" style="padding-bottom: 10px;"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).on('click', 'i.minus_icon_row_number', function () {
            $(this).parent().parent().remove();
        });
        $(document).ready(function () {
            $('#add_package_feature').click(function () {
                $("#feature_append").append('<div class="form-group row"><label class="col-lg-2 col-form-label require"></label><div class="col-lg-3">' +
                    '{{Form::text("package_features[]",null,array("class" => (($errors->has("price")) ? "form-control is-invalid" : "form-control"), "required" =>"required","id"=>"package_features"))}}' +
                    '@error("package_features")<div class="invalid-feedback">{{ $message }}</div>@enderror' +
                    '</div><div class="col-md-7"><i class="fa fa-minus-circle minus_icon_row_number" style="font-size:26px;color:red; cursor: pointer; float: left;" aria-hidden="true"></i></div></div>');
            });
        })
    </script>
@endpush
@push('css')
    <style>
        .plus_icon_row_number, minus_icon_row_number {
            cursor: pointer;
        }
    </style>
@endpush
