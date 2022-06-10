@extends('layouts.admin')
@section('title', 'New Documents Type')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Documents Type</a></li>
                <li><a>Enter Documents Type details and submit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>New Documents Type</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('document_type.index','<i class="fa fa-list"></i> Documents Type List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">

                <!--begin::Form-->
                {{ Form::model(request()->old(),array('route' => array('document_type.store'),'class'=>'form-horizontal','novalidate'=>'novalidate')) }}
                <div class="panel-content">
                    <div class="kt-section__body">
                        <h3 class="kt-section__title kt-section__title-lg">Documents Type Info:</h3>
                        <div class="kt-wizard-v4__form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Type Name</label>
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
                                <label class="col-lg-2 col-form-label require">Mime Type</label>
                                <div class="col-lg-3">
                                    {{Form::text('mime_type','application/pdf',array('class' => (($errors->has("mime_type")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('mime_type')
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
    $(function() {
        $("#menu_type").change(function () {
            if(this.value=='Web'){
                $('.web_type_display').css('display','block');
            }else{
                $('.web_type_display').css('display','none');
            }
        });
    });
</script>
@endpush
