@extends('layouts.admin')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-columns" aria-hidden="true"></i><a href="{{ Request::url() }}">New Payment</a></li>
        </ul>
    </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
    <h4 class="section-subtitle">Add New Payment</h4>
    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                    <!--begin::Form-->
                    {{ Form::model(request()->old(),array('route' => array('payments.store'),'class'=>'form-horizontal','novalidate'=>'novalidate','enctype'=>"multipart/form-data")) }}
                    <div class="panel-content">
                        <div class="kt-section__body">
                            <h3 class="kt-section__title kt-section__title-lg">Payment Info:</h3>
                            <div class="kt-wizard-v4__form">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Customer ID</label>
                                    <div class="col-lg-7">
                                        {{Form::select('customer_id',$customer,null,array('class' => 'form-control', 'required' =>'required','multiple'=>false,'id'=>'customer_id')) }}
                                        @error('customer_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Account Number</label>
                                    <div class="col-lg-7">
                                        {{Form::text('account_number',null,array('class' => (($errors->has("account_number")) ? "form-control is-invalid" : "form-control"), 'id' =>'account_number'))}}
                                        @error('account_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label">Transaction ID</label>
                                    <div class="col-lg-7">
                                        {{Form::text('transaction_id',null,array('class' => (($errors->has("transaction_id")) ? "form-control is-invalid" : "form-control"), 'id' =>'transaction_id'))}}
                                        @error('transaction_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Package</label>
                                    <div class="col-lg-7">
                                        {{Form::select('payment_package',$package,null,array('class' => 'form-control', 'required' =>'required','multiple'=>false,'id'=>'payment_package')) }}
                                        @error('payment_package')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div id="addon_details_div" class="form-group addon-details-div">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-xl-6 text-center">
                                            <p>
                                                <b>Addon Title</b>
                                            </p>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-xl-6 text-center">
                                            <p>
                                                <b>Addon Quantity</b>
                                            </p>
                                        </div>

                                        @foreach($addons as $addon)
                                            <div class="col-sm-6 col-md-6 col-xl-6 text-center">
                                                <p>{{ $addon->addon_title }}</p>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-6 col-xl-6 text-center js-increment-box">
                                                <button type="button" class="js-minus button hollow circle" data-id="{{ $addon->id }}">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                
                                                <input class="input-group-field js-input" type="number" name="quantity[{{ $addon->id }}]" value="0" id="addon_quantity_{{ $addon->id }}">

                                                <button type="button" class="js-plus button hollow circle" data-id="{{ $addon->id }}">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Promotion Code (if applicable)</label>
                                    <div class="col-lg-7">
                                        {{Form::select('promotion_code',$promotion,null,array('class' => 'form-control', 'required' =>'required','multiple'=>false,'id'=>'promotion_code')) }}
                                        @error('promotion_code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Payment Status</label>
                                    <div class="col-lg-3">
                                        {{Form::select('status',config('conf.payment_status'),null,array('class' => 'form-control', 'required' =>'required','multiple'=> false, 'id'=>'status')) }}
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-2">
                                        <button id="saveButton" type="submit" class="btn btn-primary">
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
</div>
</div>
@endsection
@push('script')
<script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.js') }}"></script>
<script>
    $("#customer_id").select2({});
</script>
<script>
    // This will alert the user for confirmation when the user will try to change the Payment Status dropdown option to Pending from Received.
    $('#status').change(function(){
        if($(this).children('option:selected').val() == 'pending'){
            if(!confirm("Are you sure the payment is pending?")){
                $('#status').prop('selectedIndex',0);
            }
        }
    });
</script>

<script>
    // Addons' quantity buttons and calculations.
    // For plus button.
    $(document).on('click', '.js-plus', function() {
        let parents, inputObject, inputValue, outputValue;

        parents = $(this).parents('.js-increment-box');
        inputObject = parents.find('.js-input');
        inputValue = inputObject.val();
        outputValue = parseInt(inputValue) + 1;
        inputObject.val(outputValue).change();
    })

    // For minus button.
    $(document).on('click', '.js-minus', function() {
        let parents, inputObject, inputValue, outputValue;

        parents = $(this).parents('.js-increment-box');
        inputObject = parents.find('.js-input');
        inputValue = inputObject.val();
        outputValue = parseInt(inputValue) - 1;

        if (outputValue < 0) {
            outputValue = 0;
        }

        inputObject.val(outputValue).change();               
    })
</script>
{{-- <script>
    function addPaymentSubmit(){
        // Take confirmation from the user for form submission if Payment Status is 'pending'. 
        if($('#status').children('option:selected').val() == 'pending'){
            if(!confirm("Do you really want to save the payment with pending status?")){
                event.preventDefault();
                window.history.back();
            };
        }
    }
</script> --}}
@endpush
@push('css')
<link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
<link href="{{ asset('vendor/select2/css/select2.css') }}" rel="stylesheet"/>
@endpush