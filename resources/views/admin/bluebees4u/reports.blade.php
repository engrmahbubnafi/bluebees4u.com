@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- PAGE TITLE -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Users</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>


<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Users</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Customer ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Facebook Link</th>
                                <th>Product Category</th>
                                <th>Package</th>
                                <th>Referral ID</th>
                                <th>Transaction ID</th>
                                <th>Created Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($signUpUsers as $signUpUser)
                            <tr>
                                <td>{{ $signUpUser->id }}</td>
                                <td>{{ $signUpUser->customer_id }}</td>
                                <td>{{ $signUpUser->first_name }}</td>
                                <td>{{ $signUpUser->last_name }}</td>
                                <td>{{ $signUpUser->email }}</td>
                                <td>{{ $signUpUser->phone }}</td>
                                <td>{{ $signUpUser->facebook_link }}</td>
                                <td>{{ $signUpUser->product_category }}</td>
                                <td>{{ $signUpUser->package }}</td>
                                <td>{{ $signUpUser->referral_id }}</td>
                                <td>{{ $signUpUser->transaction_id }}</td>
                                <td>
                                    @php
                                        // create a $dt object with the UTC timezone
                                        $dt = new DateTime($signUpUser->created_at, new DateTimeZone('UTC'));

                                        // change the timezone of the object without changing its time
                                        $dt->setTimezone(new DateTimeZone('Asia/Dhaka'));

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
@push('script')
    <script src="{{ asset('vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
@endpush
