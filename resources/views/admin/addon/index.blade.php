@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Addons</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Addons</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="no-sort text-center">Addon Title</th>
                                <th class="text-center">Addon Price</th>
                                <th class="text-center">Status</th>
                                <th class="no-sort text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addons as $addon)
                                <tr>
                                    <td class="text-center">{{ $addon->addon_title }}</td>
                                    <td class="text-center">{{ $addon->addon_price }}</td>
                                    <td class="text-center">
                                        @if ($addon->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif    
                                    </td>
                                    <td>
                                        <a href="{{route('addons.edit',array($addon->id))}}" class="btn">Edit</a>
                                    </td>
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
