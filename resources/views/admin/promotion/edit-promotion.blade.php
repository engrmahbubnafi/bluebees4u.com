@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="{{ Request::url() }}">Edit Promotion</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
        <h4 class="section-subtitle">Edit Promotion Details</h4>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                        {{ Form::model($promotion_data,array('route' => array('promotion.update', $promotion_data->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Promotion Code</label>
                            <div class="col-lg-3">
                                {{Form::text('promotion_code',null,array('class' => (($errors->has("promotion_code")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                @error('promotion_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Is Percentage</label>
                            <div class="col-lg-3">
                                {{Form::checkbox('is_percentage',1,$promotion_data->is_percentage==1 ? true : false ,array('required' =>'required','id'=>'is_percentage')) }}
                                @error('is_percentage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div id="percentage_area">
                                <label class="col-lg-2 col-form-label require">Percentage</label>
                                <div class="col-lg-3">
                                    {{Form::text('percentage',null,array('class' => (($errors->has("percentage")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('percentage')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="fixed_amount_area" style="display: none;">
                                <label class="col-lg-2 col-form-label require">Fixed Amount</label>
                                <div class="col-lg-3">
                                    {{Form::text('fixed_amount',null,array('class' => (($errors->has("fixed_amount")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('fixed_amount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Maximum Amount</label>
                            <div class="col-lg-3">
                                {{Form::text('max_amount',null,array('class' => (($errors->has("max_amount")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                @error('max_amount')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Expiry Date:</label>
                            <div class="col-lg-3">
                                {{Form::date('end_date',null,array('class' => (($errors->has("end_date")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                @error('end_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label require">Minimum Purchase Amount</label>
                            <div class="col-lg-3">
                                {{Form::text('min_purchase',null,array('class' => (($errors->has("min_purchase")) ? "form-control is-invalid" : "form-control"),
                                 'placeholder'=>'Minimum Purchase Amount (optional)','required' =>'required'))}}
                                @error('min_purchase')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

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
@endsection
@push('script')
    <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#is_percentage").change(function () {
                isPercentageChecked();
            });
            isPercentageChecked();

            function isPercentageChecked() {
                if ($("#is_percentage").is(':checked')) {
                    $('#percentage_area').css('display', 'block');
                    $('#fixed_amount_area').css('display', 'none');
                } else {
                    $('#fixed_amount_area').css('display', 'block');
                    $('#percentage_area').css('display', 'none');
                }
            }
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
@endpush
