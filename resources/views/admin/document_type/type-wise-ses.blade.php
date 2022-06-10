@extends('layouts.admin')
@section('title', 'Documents Sorting')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
                <li><a>Documents Sorting</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Documents Sorting</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('documents.index','<i class="fa fa-list"></i> Documents List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <h3 class="col-12 col-form-label require">Documents Sorting</h3>
                                </div>
                                <div id="tree_id" class="tree-demo jstree jstree-5 jstree-default">
                                    <ul id="tree1">
                                        @foreach($documents as $document)
                                            <li id="{{ $document->id }}">
                                                {{ $document->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-lg-5 col-form-label require">Documents Type</label>
                                    <div class="col-lg-7">
                                        {{Form::select('document_type',$documents_type,$id,array('class' => 'form-control','id' => 'document_type')) }}
                                        @error('document_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jstree/jstree.bundle.css') }}"/>
    <style>
        .checkbox label {
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('vendor/jstree/jstree.bundle.js') }}"></script>
    <script>
        $("#document_type").change(function () {
            window.location.href = '/document_type_sort/' + this.value;
        });
    </script>

    <script>
        "use strict";
        var xhr = new XHR("{{ route('ajax.column_value.sorting') }}");
        var KTTreeview = function () {

            var tree = function () {
                $('#tree_id').jstree({
                    "core": {
                        "themes": {
                            "responsive": false
                        },
                        "check_callback": true
                    },
                    "types": {
                        "default": {
                            "icon": "la la-folder kt-font-success"
                        },
                        "file": {
                            "icon": "la la-file  kt-font-success"
                        }
                    },
                    "state": {"key": "demo2"},
                    "plugins": ["dnd", "state", "types"]
                }).bind("move_node.jstree", function (e, data) {
                    if (data.node.parents.length > 3) {
                        xhr.reload()
                        toastr.warning('not allowed');
                        return false;
                    }
                    var obj = {
                        model: 'Document',
                        obj: data.new_instance.get_json(),
                        cacheFile: []
                    };
                    xhr.sortFn(obj);
                });
            }

            return {
                //main function to initiate the module
                init: function () {
                    tree();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTTreeview.init();
        });
    </script>

@endpush
