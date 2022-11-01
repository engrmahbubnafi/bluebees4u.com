@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a
                    href="{{ Request::url() }}">Expired Subscribers</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Expired Subscribers</b></h4>
        <div class="panel">
		
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table"
                        class="data-table table table-striped nowrap table-hover"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Customer ID</th>
                                <th class="no-sort text-center">Name, Phone, Email</th>
                                <th class="no-sort text-center">Facebook Link</th>
                                <th class="no-sort text-center">Current Package</th>
                                <th class="no-sort text-center">Product Category</th>
                                <th class="text-center">Subscribing Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expiredSubscribers as $expiredSubscriber)
                            <tr>
                                <td class="text-center">{{ $expiredSubscriber->customer_id }}</td>
                                <td class="text-center">{{ $expiredSubscriber->first_name }}
                                    {{ $expiredSubscriber->last_name }} <br>
                                    {{ $expiredSubscriber->phone }} <br>
                                    {{ $expiredSubscriber->email }}</td>
                                <td class="text-center">{{ $expiredSubscriber->facebook_link }}</td>
                                <td class="text-center">{{ $expiredSubscriber->package_name }}</td>
                                <td class="text-center">{{ $expiredSubscriber->product_category }}</td>
                                <td class="text-center">
                                    @php
                                    // create a $dt object with the UTC timezone
                                    $dt = new DateTime($expiredSubscriber->updated_at,
                                    new DateTimeZone('UTC'));

                                    // change the timezone of the object without changing its time
                                    $dt->setTimezone(new
                                    DateTimeZone('Asia/Dhaka'));

                                    // format the datetime
                                    echo $dt->format('Y-m-d h:i A');
                                    @endphp
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
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.css" />
@endpush
@push('script')
<script type="text/javascript"
    src="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.js">
</script>
<script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush