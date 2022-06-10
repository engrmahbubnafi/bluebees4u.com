@extends('layouts.admin')
@section('title', 'User Lists')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">User</a></li>
                <li><a>Lists</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>User Lists</b></h4>
            <span class="pull-right">
            {!! Html::decode(link_to_route('register','<i class="fa fa-plus"></i>',[],array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SI NO.</th>
                                <th class="no-sort">Name</th>
                                <th class="no-sort">Email</th>
                                <th class="no-sort">Role</th>
                                {{--                            <th>Designation</th>--}}
                                <th class="no-sort">Status</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php ($i=1)
                            @foreach ($users as $data)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->role->name}}</td>
                                    {{--                            <td>{{$data->designation->title}}</td>--}}
                                    <td>{{$data->status}}</td>
                                    <td>
                                        {!!  HTML::decode(link_to_route('users.edit', '<span aria-hidden="true" class="fa fa-edit fa-x"></span>', array($data->id)))!!}
                                        @if (auth()->user()->isAdministrator())
                                            {!!  HTML::decode(link_to_route('PasswordReset', '<span class="fa-passwd-reset fa-stack"><i class="fa fa-undo fa-stack-2x"></i><i class="fa fa-lock fa-stack-1x"></i></span>', array($data->id)))!!}
                                        @endif
                                        {!! Form::delete(route('users.destroy',array($data->id))) !!}
                                    </td>
                                </tr>
                            @php ($i=$i+1)
                            @endforeach
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



