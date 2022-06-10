@extends('layouts.admin')
@section('title', 'Menus List')
@section('content')
    <div class="content-header">
        <!-- PAGE TITLE -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Packages</a></li>
                <!-- <li><a>Data-table</a></li> -->
            </ul>
        </div>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Packages</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('package.create','<i class="fa fa-plus"></i> New',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="users_table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th class="no-sort">Package Name</th>
                                <th>Price</th>
                                <th class="no-sort">Package Features</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($packages as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->package_name }}</td>
                                    <td>{{ $package->price }}</td>
                                    <td>
                                        @if($package->packageFeature->count())
                                            @foreach($package->packageFeature as $packageFeature)
                                                {{ $packageFeature->feature_name }}
                                                @if(!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td><a href="{{route('package.edit',array($package->id))}}" class="btn">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.css"/>
@endpush
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.js"></script>
<script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush



