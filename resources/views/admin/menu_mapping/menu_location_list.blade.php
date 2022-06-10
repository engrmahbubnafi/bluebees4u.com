@extends('layouts.admin')
@section('title', 'Menu Location List')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
            <li><a>Menu Location</a></li>
            <li><a>Lists</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<!--SEARCHING, ORDENING & PAGING-->
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Menu Location Lists</b></h4>
        <span class="pull-right">
                {!! Html::decode(link_to_route('menu_map.index','<i class="fa fa-plus"></i> Add New Location',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
                {!! Html::decode(link_to_route('menuMapping','<i class="fa fa-eye"></i> Menu Mapping',null,array('class'=>'btn btn-info','style'=>'margin-bottom:10px'))) !!}
        </span>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="no-sort">Location Name</th>
                            <th class="no-sort text-center">Menus</th>
                            <th class="no-sort text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($menuLocationMapArray as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->Total}}</td>
                            <td class="text-center">
                                {!!  Html::decode(link_to_route('menuMapping', '<span aria-hidden="true" class="fa fa-pencil" data-tooltip="Edit"></span>', array($data->id)))!!}

                                <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal"
                                   onClick="callModal('{{$data->id}}')" class='delete-button'>
                                                <span aria-hidden="true" class="fa fa-trash fa-fg text-danger"
                                                      data-tooltip="Delete"></span>
                                </a>
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



