@extends('layouts.admin')
@section('title', 'Edit Documents')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Documents</a></li>
                <li><a>Enter Documents details and submit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Edit Documents</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('documents.index','<i class="fa fa-list"></i> Documents List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($documents,array('route' => array('documents.update', $documents->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                    <div class="panel-content">
                        <div class="kt-section__body">
                            <h3 class="kt-section__title kt-section__title-lg">Documents Info:</h3>
                            <div class="kt-wizard-v4__form">
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Documents Name</label>
                                    <div class="col-lg-6">
                                        {{Form::text('name',null,array('class' => (($errors->has("name")) ? "form-control is-invalid" : "form-control"), 'required' =>'required'))}}
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Doc Type</label>
                                    <div class="col-lg-3">
                                        {{Form::select('type_id',$documents_type,null,array('class' => 'form-control', 'required' =>'required', 'id' =>'type_id')) }}
                                        @error('type_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <label class="col-lg-2 col-form-label require">Documents Name</label>
                                    <div class="col-lg-3">
                                        {{Form::file('file',array('class' => (($errors->has("file")) ? "form-control is-invalid" : "form-control"), 'required' =>'required','accept'=>"*",'id'=>'attach_file'))}}
                                        {{Form::text('file',null,array('class' => (($errors->has("name")) ? "form-control is-invalid" : "form-control"), 'required' =>'required', 'id' =>'file_text'))}}
                                        @error('file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-form-label require">Description</label>
                                    <div class="col-lg-5">
                                        {{Form::textarea('description',null,array('class' => 'form-control', 'id'=>'description'))}}
                                        @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-5">
                                        <object data="{{ asset("storage".$documents->file) }}" width="300"
                                                height="200"></object>
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
                                    <label class="col-lg-2 col-form-label require">Is Downloadable</label>
                                    <div class="col-lg-3">
                                        {{Form::checkbox('is_downloadable',1,$documents->is_downloadable==1 ? true : false ,array('required' =>'required','id'=>'is_downloadable')) }}
                                        @error('is_downloadable')
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
    <link href="{{ asset('/vendor/summernote/summernote.css') }}" rel="stylesheet"/>
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
                        $(that).summernote('insertImage', location.origin + '/' + url, '');
                    }
                });
            }
        });
    </script>
    <script>
        $(function () {
            $("#type_id").change(function () {
                if ($("#type_id").val()) {
                    getMessage($("#type_id").val());
                } else {
                    $('#attach_file').attr("accept", '*');
                }
            });
            getMessage($("#type_id").val())
        });

        function getMessage(type_id) {
            $.ajax({
                type: 'GET',
                url: '/get-document_mime/' + type_id,
                success: function (data) {
                    $('#attach_file').attr("accept", data);
                }
            });
        }

        $("#is_downloadable").change(function () {
            displayFileText(this.checked)
        });
        displayFileText('{{$documents->is_downloadable==1 ? true : false}}');

        function displayFileText(value) {
            if (value) {
                $('#attach_file').css('display', 'block');
                $('#file_text').css('display', 'none');
            } else {
                $('#file_text').css('display', 'block');
                $('#attach_file').css('display', 'none');
            }
        }
    </script>
@endpush
