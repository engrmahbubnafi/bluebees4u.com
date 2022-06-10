@extends('layouts.admin')
@section('title', 'New Web Content')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Web Content</a></li>
                <li><a>Enter Web Content details</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>New Web Content</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('web_content.index','<i class="fa fa-list"></i> Web Content List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">

                <!--begin::Form-->
                {{ Form::model($web_content_data,array('route' => array('web_content.update', $web_content_data->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT')) }}
                <div class="panel-content">
                    <div class="kt-section__body">
                        <h3 class="kt-section__title kt-section__title-lg">Web Content Info:</h3>
                        <div class="kt-wizard-v4__form">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Web Content Title</label>
                                <div class="col-lg-3">
                                    {{Form::text('title',null,array('class' => (($errors->has("title")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <label class="col-lg-2 col-form-label require">Meta Key</label>
                                <div class="col-lg-3">
                                    {{Form::text('meta_key',null,array('class' => (($errors->has("meta_key")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                    @error('meta_key')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label require">Web Description</label>
                                <div class="col-lg-8">
                                    {{Form::textarea('description',null,array('class' => 'form-control', 'id'=>'description'))}}
                                    @error('description')
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
    <link href="{{ asset('/vendor/summernote/summernote.css') }}" rel="stylesheet"/>
    <style>
        .checkbox label {
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('/vendor/summernote/summernote.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                tabsize: 3,
                height: 200,
                callbacks: {
                    onImageUpload: function (files) {
                        var that = $(this);
                        sendFile(files[0], that);
                    },
                    async onImageLinkInsert(ImageUrl) {
                        var that = $(this);
                        fetch(ImageUrl)
                            .then(responsea => responsea.blob())
                            .then(blob => {
                                var reader = new FileReader()
                                reader.readAsBinaryString(blob);
                                reader.onload = () => {
                                    sendFile(blob, that, 'base64', blob.type);
                                }
                                reader.onerror = function (error) {
                                    console.log('Error: ', error);
                                }
                            });
                    }
                }
            });

            function sendFile(file, that, fileType = 'blob', fileMimeType = false) {
                data = new FormData();
                data.append("file", file);
                data.append("fileType", fileType);
                if (fileMimeType) {
                    data.append("fileMimeType", fileMimeType);
                }
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    type: "POST",
                    url: "{{route('contentFileAttach')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (url) {
                        $(that).summernote('insertImage', '/' + url, '');
                    }
                });
            }
        });
    </script>
@endpush

