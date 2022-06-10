@extends('layouts.admin')

@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-columns" aria-hidden="true"></i><a href="{{ Request::url() }}">New Addon</a></li>
        </ul>
    </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
    <h4 class="section-subtitle">Add New Addon</h4>
    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12">
                    {{ Form::model(request()->old(),array('route' => array('addons.store'),'class'=>'form-horizontal','novalidate'=>'novalidate')) }}

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label require">Addon Title</label>
                        <div class="col-lg-3">
                            {{Form::text('addon_title',null,array('class' => "form-control custome-select", 'required' =>'required'))}}
                            @error('addon_title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label require">Addon Price</label>
                        <div class="col-lg-3">
                            {{Form::text('addon_price',null,array('class' => "form-control custome-select", 'required' =>'required'))}}
                            @error('addon_price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label require">Status</label>
                        <div class="col-lg-3">
                            {{ Form::select('status',config('conf.status'),null,array('class' => 'form-control')) }}
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

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection