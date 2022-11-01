@extends('layouts.master')
@section('content')
    <title>{!! $menuObj->name !!} | BlueBees4U</title>
    <div class="page_banner">
        <div class="overl"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-12 pt-5">
                    <div class="section-heading">
                        <h1 class="display-4 text-white">{!! $menuObj->name !!}</h1>
                    </div>
                    <div class="section-inline">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="home text-white" href="{{ route('publicHome') }}">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <i class="home text-white fa fa-angle-double-right"></i>
                            </li>
                            <li class="list-inline-item">
                                <p class="home text-white">{!! $menuObj->name !!}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="contact-1" class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h1>{!! $menuObj->name !!}</h1>
                        <p class="">Let us Help with Your Business</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm12">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(session('flash_' . $msg))
                            <div class="alert alert-{{ $msg }}" role="alert">
                                <div class="alert-text">{{ session('flash_' . $msg) }}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{ Form::model(
                        request()->old(),
                        array(
                            'route' => array(
                                'storeSignup'
                                ),
                            'novalidate'    =>  'novalidate',
                            'enctype'       =>  "multipart/form-data"
                        )
                    ) }}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'first_name',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("first_name")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  'First Name'
                                )
                            ) }}
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'last_name',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("last_name")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  'Last Name'
                                )
                            ) }}
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'email',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("email")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  'Email'
                                )
                            ) }}
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'phone',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("phone")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  'Phone Number'
                                )
                            ) }}
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{Form::url(
                                'facebook_link',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("facebook_link")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  'Facebook Link'
                                )
                            ) }}
                            @if ($errors->has('facebook_link'))
                                <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'product_category',
                                null,
                                array(
                                    'class'     =>  (
                                        ($errors->has("product_category")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                'required'      =>  'required',
                                'placeholder'   =>  "Product Category (write down your product's category)"
                                )
                            ) }}
                            @if ($errors->has('product_category'))
                                <span class="text-danger">{{ $errors->first('product_category') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{Form::select(
                                'signupuser_package',
                                $packageArr,
                                request()->signupuser_package,
                                array(
                                    'class'     =>  "custom-select",
                                    'required'  =>  'required',
                                    'multiple'  =>  false,
                                    'id'        =>  'signupuser_package'
                                )
                            ) }}
                            @if ($errors->has('signupuser_package'))
                                <span class="text-danger">{{ $errors->first('signupuser_package') }}</span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            {{ Form::text(
                                'referral_id',
                                null,
                                array(
                                    'class'         =>  (
                                        ($errors->has("referral_id")) ? "form-control is-invalid" : "form-control custom-select"
                                    ),
                                    'required'      =>  'required',
                                    'placeholder'   =>  "Referral ID"
                                )
                            ) }}
                            @if ($errors->has('referral_id'))
                                <span class="text-danger">{{ $errors->first('referral_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div id="addon_details_div" class="addon-details-div">
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                <p class="addon-title">
                                    <b>Add On</b>
                                </p>
                            </div>

                            <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                <p class="addon-price">
                                    <b>Price</b>
                                </p>
                            </div>

                            <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                <p class="addon-price">
                                    <b>Quantity</b>
                                </p>
                            </div>

                            <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                <p class="addon-price">
                                    <b>Total Price</b>
                                </p>
                            </div>

                            @foreach($addons as $addon)
                                <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                    <p class="addon-title">{{ $addon->addon_title }}</p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                    <p class="addon-price">৳<span id="addon_price_{{ $addon->id }}">{{ $addon->addon_price }}</span></p>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xl-3 text-center quantity-selection js-increment-box">
                                    <button type="button" class="js-minus button hollow circle" data-id="{{ $addon->id }}">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input class="input-group-field js-input" type="number" name="addon_quantity[{{ $addon->id }}]" value="0" id="addon_quantity_{{ $addon->id }}" readonly>
                                    <button type="button" class="js-plus button hollow circle" data-id="{{ $addon->id }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-sm-3 col-md-3 col-xl-3 text-center">
                                    <p class="addon-price">৳<span id="addon_total_price_{{ $addon->id }}"></span></p>
                                </div>
                            @endforeach
                        </div>

                        <div class="addon-payable-amount">
                            <p>Total Price for Addons: ৳<span id="addon_total"></span></p>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="payment-amount-div">
                            <p class="payment-amount">Package price: ৳<span id="package_price"></span></p>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <div class="payment-amount-div">
                            <p class="payment-amount">Your payable amount: ৳<span id="payable_amount"></span></p>
                        </div>
                    </div>

                    <div class="payment-button">
                        <button type="submit" class="pay-now-btn">Sign Up</button>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
@endpush

@push('scripts')
    <script>
        // Show the payable amount.
        $(document).ready(function() {
            const priceArray = JSON.parse(('{{($packagePriceArr)}}').replaceAll("&quot;", '"'));
            let addonGrandPrice = 0;

            $("#signupuser_package").change(function() {
                setPayAmount($(this));
            });

            $("#signupuser_package").change(function() {
                setPackagePrice($(this));
            });

            setPayAmount($("#signupuser_package"));
            setPackagePrice($("#signupuser_package"));

            // setPayAmount() function will set total payable amount in the form.
            function setPayAmount(obj) {
                let payableAmount = '';
                if (typeof priceArray[obj.val()] != 'undefined') {
                    payableAmount = Number(priceArray[obj.val()]) + Number(addonGrandPrice);
                }                
                $("#payable_amount").text(payableAmount);
            }

            // setPackagePrice() function will set selected package price in the form.
            function setPackagePrice(obj) {
                let packagePrice = '';
                if (typeof priceArray[obj.val()] != 'undefined') {
                    packagePrice = Number(priceArray[obj.val()]);
                }                
                $("#package_price").text(packagePrice);
            }

            // Addons' quantity buttons and calculations.
            // For plus button.
            $(document).on('click', '.js-plus', function() {
                let parents, inputObject, inputValue, outputValue, addonPrice, addonTotalPrice;

                parents = $(this).parents('.js-increment-box');
                inputObject = parents.find('.js-input');
                inputValue = inputObject.val();
                outputValue = parseInt(inputValue) + 1; 
                addonPrice = Number($('#addon_price_' + $(this).data('id')).html());
                inputObject.val(outputValue).change();   

                addonTotalPrice = addonPrice * outputValue;                
                addonGrandPrice = addonGrandPrice + addonPrice;

                $('#addon_total_price_' + $(this).data('id')).text(addonTotalPrice);
                $('#addon_total').text(addonGrandPrice);
                setPayAmount($("#signupuser_package"));
            })
            // For minus button.
            $(document).on('click', '.js-minus', function() {
                let parents, inputObject, inputValue, outputValue, addonPrice, addonTotalPrice;

                parents = $(this).parents('.js-increment-box');
                inputObject = parents.find('.js-input');
                inputValue = inputObject.val();
                outputValue = parseInt(inputValue) - 1;
                addonPrice = Number($('#addon_price_' + $(this).data('id')).html());

                if (outputValue <= -1) {
                    addonTotalPrice = addonPrice * outputValue + addonPrice;
                }
                else if (outputValue == 0) {
                    addonGrandPrice = addonGrandPrice - addonPrice;
                }
                else {
                    addonTotalPrice = addonPrice * outputValue;
                    addonGrandPrice = addonGrandPrice - addonPrice;
                }

                if (outputValue < 0) {
                    outputValue = 0;
                }

                addonTotalPrice = addonPrice * outputValue;

                if (addonGrandPrice >= 0) {
                    setPayAmount($('#signupuser_package'));
                }
                else {
                    addonGrandPrice = 0;
                }

                inputObject.val(outputValue).change();

                $('#addon_quantity_' + $(this).data('id')).text(outputValue);
                $('#addon_total_price_' + $(this).data('id')).text(addonTotalPrice);
                $('#addon_total').text(addonGrandPrice);                
            })
        });
    </script>
@endpush