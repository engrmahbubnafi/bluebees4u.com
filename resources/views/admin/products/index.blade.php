@extends('layouts.admin')
@section('title', 'Products List')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">FrontPage Management</a></li>
                <li><a>Products</a></li>
                <li><a>Lists</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Products Lists</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('products.create','<i class="fa fa-plus"></i> New Products',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="no-sort">Products Name</th>
                                <th class="center">Category</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th class="no-sort text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->category_name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->updated_at}}</td>
                                    <td>{{$data->status==1 ? 'Active': 'Inactive'}}</td>
                                    <td class="text-center">
                                        {!!  Html::decode(link_to_route('products.edit', '<span aria-hidden="true" class="fa fa-pencil" data-tooltip="Edit"></span>', array($data->id)))!!}

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
@push('script')
    <!--dataTable-->
    <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
@endpush




