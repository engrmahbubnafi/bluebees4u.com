@extends('layouts.admin')
@section('title', 'Menu Location')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
                <li><a>Set Menu Mapping</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Menu Map</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('locationMap','<i class="fa fa-table"></i> Location Map List',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                {{ Form::model(request()->old(),array('class'=>'form-horizontal','novalidate'=>'novalidate')) }}
                <div class="panel-content">
                    <div class="kt-section__body">
                        <div class="kt-wizard-v4__form">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <h3 class="col-12 col-form-label require">Menu List</h3>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="basic-table"
                                                   class="data-table table table-striped nowrap table-hover"
                                                   cellspacing="0"
                                                   width="100%">
                                                <thead>
                                                <tr>
                                                    <th width="15%" class="no-sort no-search">
                                                        <label for="all">
                                                            <input type="checkbox" id="all"> All
                                                        </label>
                                                    </th>
                                                    <th class="no-sort">Menu</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($menuList as $key=>$val)
                                                    @if(isset($menuLocationMapArray[$key]))
                                                        @continue
                                                    @endif
                                                    <tr>
                                                        <td><input type="checkbox" class="menu_ids" name="menu_ids[]"
                                                                   value="{{$key}}">
                                                        </td>
                                                        <td>{{$val}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="button" id="assign_button" class="btn btn-primary pull-right">
                                        Assign
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <h3 class="col-12 col-form-label require">Menu Mapping</h3>
                                    </div>
                                    <div id="tree_id" class="tree-demo jstree jstree-5 jstree-default">
                                        <ul id="tree1">
                                            @foreach($menuLocationMap as $menuMap)
                                                <li id="{{ $menuMap->id }}">
                                                    {{ $menuMap->name }}
                                                    @if($menuMap->children->count())
                                                        <ul>
                                                            @foreach($menuMap->children as $child1)
                                                                <li id="{{ $child1->id }}">
                                                                    {{ $child1->name }}
                                                                    @if($child1->children->count())
                                                                        <ul>
                                                                            @foreach($child1->children as $child2)
                                                                                <li id="{{ $child2->id }}">
                                                                                    {{ $child2->name }}
                                                                                    &nbsp;&nbsp;&nbsp;<span
                                                                                        onClick="removeAssaignData('{{$child2->id}}_{{$location_id}}')"
                                                                                        data-value="{{$child2->id}}_{{$location_id}}"
                                                                                        class="fa fa-close"
                                                                                        style="font-size:20px;color:red"></span>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @else
                                                                        &nbsp;&nbsp;&nbsp;<span
                                                                            onClick="removeAssaignData('{{$child1->id}}_{{$location_id}}')"
                                                                            data-value="{{$child1->id}}_{{$location_id}}"
                                                                            class="fa fa-close"
                                                                            style="font-size:20px;color:red"></span>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        &nbsp;&nbsp;&nbsp;<span
                                                            onClick="removeAssaignData('{{$menuMap->menu_id}}_{{$location_id}}')"
                                                            data-value="{{$menuMap->menu_id}}_{{$location_id}}"
                                                            class="fa fa-close" style="font-size:20px;color:red"></span>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group row">
                                        <label class="col-lg-5 col-form-label require">Location Name</label>
                                        <div class="col-lg-7">
                                            {{Form::select('menu_location',$menuLocations,$location_id,array('class' => 'form-control','id' => 'menu_location')) }}
                                            @error('menu_location')
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
                {{ Form::close() }}
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
    <!--dataTable-->
    <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('vendor/jstree/jstree.bundle.js') }}"></script>
    <script>
        $(document).on('init.dt', function (e, settings) {
            // var api = new $.fn.dataTable.Api( settings );
            $(".dataTables_length").parent().remove();
        });
        $("#all").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
        $("#menu_location").change(function () {
            window.location.href = '/menu_mapping/' + this.value;
        });
        $("#assign_button").click(function () {
            var menu_ids = countMenuIds();

            if (menu_ids.length != 0 && $("#menu_location").val()) {
                window.location.href = '/add_menu_map/' + $("#menu_location").val() + '/' + menu_ids;
            }
        });
        $(document).ready(function () {
            // if (countMenuIds().length == 0) {
            //     $("#basic-table").hide()
            // }
        })

        function countMenuIds() {
            var menu_ids = [];
            $('.menu_ids:checked').each(function () {
                menu_ids.push(this.value)
            });
            return menu_ids;
        }
    </script>

    <script>
        "use strict";
        var xhr = new XHR("{{ route('ajax.column_value.sorting') }}");
        var KTTreeview = function () {

            var tree = function () {
                $('#tree_id').jstree({
                    "core": {
                        "themes": {
                            "responsive": true
                        },
                        "check_callback": true
                    },
                    "types": {
                        "default": {
                            "icon": "fa fa-folder kt-font-success"
                        },
                        "file": {
                            "icon": "fa fa-file  kt-font-success"
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
                        model: 'MenuLocationMapping',
                        obj: data.new_instance.get_json(),
                        has_child: true,
                        cacheFile: ['menus_location_map_for_pluck_cache', 'menus_location_map_for_select2_cache', 'targeted_group_menus_location_map_cache']
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

        function removeAssaignData(id) {
            if(confirm("Are you sure !")){
                if (id) {
                    window.location.href = '/remove_assign_data/' + id;
                }
            }
        }
    </script>

@endpush
