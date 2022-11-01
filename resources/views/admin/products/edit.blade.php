@extends('layouts.admin')
@section('title', 'Edit Products')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Products</a></li>
                <li><a>Enter Products details</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Update Products</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('products.index','<i class="fa fa-list"></i> Products List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($products_data,array('route' => array('products.update', $products_data->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT')) }}
                    <div class="panel-content">
                        <div class="kt-section__body">
                            <h3 class="kt-section__title kt-section__title-lg">Products Info:</h3>
                            <div class="kt-wizard-v4__form">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Products Name</label>
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
                                    <label class="col-lg-2 col-form-label require">Product Category</label>
                                    <div class="col-lg-3">
                                        {{Form::select('category_id',$product_categories,null,array('class' => 'form-control', 'required' =>'required','id'=>'category_id')) }}
                                        @error('category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Product Sub Category</label>
                                    <div class="col-lg-3">
                                        {{Form::select('category_sub_id',[],null,array('class' => 'form-control', 'required' =>'required','id'=>'category_sub_id')) }}
                                        @error('category_sub_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Menu</label>
                                    <div class="col-lg-3">
                                        {{Form::select('menu_id',$menus,null,array('class' => 'form-control', 'required' =>'required','id'=>'menu_id')) }}
                                        @error('menu_id')
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
    <script>
        $(function () {
            $("#category_id").change(function () {
                getData();
            });
        });
        getData();

        function getData() {
            $.ajax({
                type: 'GET',
                url: '/get_sub_categories/' + $("#category_id").val(),
                success: function (data) {
                    var htmlData = '<option value="">Select One</option>';
                    var existData = '{{$products_data->category_sub_id}}';
                    for (let i = 0; i < data.length; i++) {
                        htmlData += '<option value="' + data[i].id + '"' + (existData == data[i].id ? "selected" : "") + '>' + data[i].name + '</option>';
                    }
                    $("#category_sub_id").html(htmlData);
                }
            });
        }
    </script>
@endpush
