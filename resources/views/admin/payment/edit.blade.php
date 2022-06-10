@extends('layouts.admin')
@section('content')
<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-columns" aria-hidden="true"></i><a
                    href="{{ Request::url() }}">Update Pending Payment</a>
            </li>
        </ul>
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
    <h4 class="section-subtitle">Update Pending Payment</h4>
    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                    {{ Form::open(array('method' => 'PUT', 'route' => array('payments.update', $payment->id))) }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label require">Account Number</label>
                        <div class="col-lg-7">
                            {{Form::text('accountNumber',null,array('class' => (($errors->has("accountNumber")) ? "form-control is-invalid" : "form-control"), 'required' =>'required', 'id' =>'accountNumber'))}}
                            @error('accountNumber')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Transaction ID</label>
                        <div class="col-lg-7">
                            {{Form::text('transactionId',null,array('class' => (($errors->has("transactionId")) ? "form-control is-invalid" : "form-control"), 'required' =>'required', 'id' =>'transactionId'))}}
                            @error('transactionId')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div id="feature_append" style="padding-bottom: 10px;">
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-2">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection