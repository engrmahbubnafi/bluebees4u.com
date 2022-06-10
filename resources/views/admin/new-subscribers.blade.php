@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a
                    href="{{ Request::url() }}">New Subscribers</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All New Subscribers</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table"
                        class="data-table table table-striped nowrap table-hover"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Customer ID</th>
                                <th class="no-sort">Name, Phone, Email</th>
                                <th class="no-sort">Facebook Link</th>
                                <th class="no-sort">Current Package</th>
                                <th class="no-sort">Product Category</th>
                                <th>Subscribing Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newSubscribers as $newSubscriber)
                            <tr>
                                <td>{{ $newSubscriber->customer_id }}</td>
                                <td>{{ $newSubscriber->first_name }}
                                    {{ $newSubscriber->last_name }} <br>
                                    {{ $newSubscriber->phone }} <br>
                                    {{ $newSubscriber->email }}</td>
                                <td>{{ $newSubscriber->facebook_link }}</td>
                                <td>{{ $newSubscriber->package_name }}</td>
                                <td>{{ $newSubscriber->product_category }}</td>
                                <td>
                                    @php
                                    // create a $dt object with the UTC timezone
                                    $dt = new DateTime($newSubscriber->updated_at,
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