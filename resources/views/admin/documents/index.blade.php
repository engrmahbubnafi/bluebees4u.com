@extends('layouts.admin')
@section('title', 'Documents List')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Documents</a></li>
                <li><a>Lists</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>Documents Lists</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('documents.create','<i class="fa fa-plus"></i> New Documents',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="no-sort">Documents Name</th>
                                <th class="center">Type Name</th>
                                <th class="center">Created</th>
                                <th>Updated</th>
                                <th>Status</th>
                                <th class="no-sort text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($documents as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->type_name}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->updated_at}}</td>
                                    <td>{{$data->status==1 ? 'Active': 'Inactive'}}</td>
                                    <td>
                                        {!!  Html::decode(link_to_route('documents.edit', '<span aria-hidden="true" class="fa fa-pencil" data-tooltip="Edit"></span>', array($data->id)))!!}
                                        &nbsp;
                                        {!!  Html::decode(link_to_route('getDocumentType', '<span aria-hidden="true" class="fa fa-history" data-tooltip="File Sort"></span>', array($data->type_id)))!!}
                                        &nbsp;
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
            <!-- /.modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        {{ Form::open(array('route' => array('documents.destroy', 'remove-id'),'method'=>'DELETE','id'=>'del-form')) }}
                        <div class="modal-body" id="myModalBody">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            {{ Form::submit('Confirm Delete',array('class'=>'btn btn-primary'))}}
                        </div>
                        {{ Form::close() }}
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

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
<script>
    function callModal(selector) {
        var fromAction = document.getElementById("del-form").action;
        fromAction = fromAction.slice(0, fromAction.lastIndexOf('/'));
        fromAction = fromAction + '/' + selector;

        document.getElementById("del-form").action = fromAction;
    }
</script>
@endpush


