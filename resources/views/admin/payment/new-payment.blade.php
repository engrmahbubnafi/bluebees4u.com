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
                        {{ Form::model(request()->old(), ['route' => ['payments.store'], 'class' => 'form-horizontal', 'novalidate' => 'novalidate', 'enctype' => 'multipart/form-data']) }}

                        <div class="panel-content">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Payment Info:</h3>
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label require">Customer ID</label>
                                        <div class="col-lg-7">
                                            {{ Form::select('customer_id', $customer, null, ['class' => 'form-control', 'required' => 'required', 'multiple' => false, 'id' => 'customer_id']) }}
                                            @error('customer_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Account Number</label>
                                        <div class="col-lg-7">
                                            {{ Form::text('account_number', null, ['class' => $errors->has('account_number') ? 'form-control is-invalid' : 'form-control', 'id' => 'account_number']) }}
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
                                            {{ Form::text('transaction_id', null, ['class' => $errors->has('transaction_id') ? 'form-control is-invalid' : 'form-control', 'id' => 'transaction_id']) }}
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
                                            {{ Form::select('payment_package', $package, null, ['class' => 'form-control', 'required' => 'required', 'multiple' => false, 'id' => 'payment_package']) }}
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
                                                <b>Add On</b>
                                            </div>

                                            <div class="col-sm-6 col-md-6 col-xl-6 text-center">
                                                <b>Quantity</b>
                                            </div>

                                            @foreach ($addons as $addon)
                                                <div class="col-sm-6 col-md-6 col-xl-6 text-center">
                                                    <p>{{ $addon->addon_title }}</p>
                                                </div>

                                                <div class="col-sm-6 col-md-6 col-xl-6 text-center js-increment-box">
                                                    <button type="button" class="js-minus button hollow circle"
                                                        data-id="{{ $addon->id }}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button>

                                                    <input class="input-group-field js-input" type="number"
                                                        name="quantity[{{ $addon->id }}]" value="0"
                                                        id="addon_quantity_{{ $addon->id }}" readonly>

                                                    <button type="button" class="js-plus button hollow circle"
                                                        data-id="{{ $addon->id }}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row mb-5">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-4 text-center col-form-label">
                                                <b>Additional Amount</b>
                                            </div>
                                            <div class="col-sm-4 text-center col-form-label">
                                                <b>Additional Amount Note</b>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-bottom: 5px">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-4">
                                                {{ Form::text('additional_amount', null, ['class' => 'form-control', 'id' => 'additional_amount']) }}
                                                @error('additional_amount')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-sm-4">
                                                {{ Form::text('additional_amount_note', null, ['class' => 'form-control', 'id' => 'additional_amount_note']) }}
                                                @error('additional_amount_note')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2"></div>
                                        </div>
                                    </div>

                                    <div class="form-group repeater">
                                        <div class="row mb-5">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-4 text-center col-form-label">
                                                <b>3rd Party</b>
                                            </div>
                                            <div class="col-sm-4 text-center col-form-label">
                                                <b>Amount</b>
                                            </div>
                                        </div>

                                        <div data-repeater-list="third_party">
                                            @if (old('third_party') && count(old('third_party')))
                                                @foreach (old('third_party') as $key => $item)
                                                    <div class="row" style="padding-bottom: 5px" data-repeater-item>
                                                        <div class="col-sm-2"></div>
                                                        <div class="col-sm-4">
                                                            {{ Form::text('name', $item['name'], ['class' => $errors->has('third_party.' . $key . '.name') ? 'form-control is-invalid' : 'form-control']) }}
                                                            @error('third_party.' . $key . '.name')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="col-sm-4">
                                                            {{ Form::number('amount', $item['amount'], ['class' => $errors->has('third_party.' . $key . '.amount') ? 'form-control is-invalid' : 'form-control']) }}
                                                            @error('third_party.' . $key . '.amount')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <i class="fa fa-minus-circle minus_icon_row_number"
                                                                style="font-size:26px;color:red; cursor: pointer; float: left;"
                                                                aria-hidden="true" data-repeater-delete></i>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="row" style="padding-bottom: 5px" data-repeater-item>
                                                    <div class="col-sm-2"></div>
                                                    <div class="col-sm-4">
                                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                                    </div>

                                                    <div class="col-sm-4">
                                                        {{ Form::number('amount', null, ['class' => 'form-control']) }}
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <i class="fa fa-minus-circle minus_icon_row_number"
                                                            style="font-size:26px;color:red; cursor: pointer; float: left;"
                                                            aria-hidden="true" data-repeater-delete></i>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6"></div>
                                            <div class="col-md-4 text-right">
                                                <i class="fa fa-plus-circle"
                                                    style="font-size:26px;color:green; cursor: pointer;" aria-hidden="true"
                                                    data-repeater-create>
                                                </i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label require">Promotion Code (if
                                            applicable)</label>
                                        <div class="col-lg-7">
                                            {{ Form::select('promotion_code', $promotion, null, ['class' => 'form-control', 'required' => 'required', 'multiple' => false, 'id' => 'promotion_code']) }}
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
                                            {{ Form::select('status', config('conf.payment_status'), null, ['class' => 'form-control', 'required' => 'required', 'multiple' => false, 'id' => 'status']) }}
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
        // Enable select2 for $customer_id
        $("#customer_id").select2({});

        // This will alert the user for confirmation when the user will try to change the Payment Status dropdown option to Pending from Received.
        $('#status').change(function() {
            if ($(this).children('option:selected').val() == 'pending') {
                if (!confirm("Are you sure the payment is pending?")) {
                    $('#status').prop('selectedIndex', 0);
                }
            }
        });

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

        // 3rd Party Repeater
        $(function() {
            $('.repeater').repeater({
                isFirstItemUndeletable: true
            })
        })
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
    <link href="{{ asset('vendor/select2/css/select2.css') }}" rel="stylesheet" />
@endpush
