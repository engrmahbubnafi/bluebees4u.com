@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a
                    href="{{ Request::url() }}">Paid Subscribers</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Paid Subscribers</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table"
                        class="data-table table table-striped nowrap table-hover"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Customer ID</th>
                                <th class="no-sort text-center">Name, Phone, Email, Facebook</th>
                                <th class="no-sort text-center">Active Package</th>
                                <th class="text-center">Subscribing Date</th>
                                <th class="no-sort text-center">Product Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paidSubscribers as $paidSubscriber)
                            <tr>
                                <td class="text-center">{{ $paidSubscriber->customer_id }}</td>
                                <td class="text-center">
                                    {{ $paidSubscriber->first_name }} {{ $paidSubscriber->last_name }} <br>
                                    {{ $paidSubscriber->phone }} <br>
                                    {{ $paidSubscriber->email }} <br>
                                    {{ $paidSubscriber->facebook_link }}
                                </td>
                                <td class="text-center">{{ $paidSubscriber->package_name }}</td>
                                <td class="text-center">
                                    @php
                                    $dt = new DateTime($paidSubscriber->updated_at,
                                    new DateTimeZone('UTC'));
                                    $dt->setTimezone(new
                                    DateTimeZone('Asia/Dhaka'));
                                    echo $dt->format('Y-m-d h:i A');
                                    @endphp
                                </td>
                                <td class="text-center">{{ $paidSubscriber->product_category }}</td>
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
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.css" />
@endpush
@push('script')
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.js">
</script>
<script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush