@extends('layouts.admin')
@section('title', 'Menus List')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
                <li><a>Menus</a></li>
                <li><a>Lists</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Menus Lists</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('menu.create','<i class="fa fa-plus"></i> New Menu',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="no-sort">Menu Name</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="no-sort">Status</th>
                                <th class="no-sort text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($menus as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->updated_at}}</td>
                                    <td>{{$data->status==1 ? 'Active': 'Inactive'}}</td>
                                    <td class="text-center">
                                        {!!  Html::decode(link_to_route('menu.edit', '<span aria-hidden="true" class="fa fa-pencil" data-tooltip="Edit"></span>', array($data->id)))!!}

{{--                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"--}}
{{--                                           onClick="confirmDelete('{{$data->id}}')" class='delete-button'>--}}
{{--                                                <span aria-hidden="true" class="fa fa-trash fa-fg text-danger"--}}
{{--                                                      data-tooltip="Delete"></span>--}}
{{--                                        </a>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.css"/>
@endpush
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.js"></script>
<script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush



