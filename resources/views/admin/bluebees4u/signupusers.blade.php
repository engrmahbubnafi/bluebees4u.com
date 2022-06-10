@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- PAGE TITLE -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Signed Up Users</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Signed up Users</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Customer ID</th>
                                {{-- 
                                <th class="text-center">Trial Subscriber</th>
                                <th class="text-center">Paid Subscriber</th> 
                                --}}
                                <th class="no-sort text-center">Name, Phone, Email, Facebook</th>
                                <th class="text-center">Signup Date</th>
                                <th class="no-sort text-center">Active Package</th>
                                <th class="no-sort text-center">Signup Package</th>
                                <th class="no-sort text-center">Product Catergory</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($signupusers as $signupuser)
                            <tr>
                                <td class="text-center">{{ $signupuser->customer_id }}</td>
                                {{-- Trial Subscriber column. --}}
                                {{-- @if (($signupuser->starting_date <= now()->format('Y-m-d')) &&
                                    ($signupuser->expiry_date >= now()->format('Y-m-d')))
                                    @if (($signupuser->trial_start_at <= now()->format('Y-m-d')) &&
                                        ($signupuser->trial_expire_at >= now()->format('Y-m-d')))
                                        <td class="text-center">
                                            <input type="checkbox" checked />
                                        </td>
                                    @else 
                                        <td class="text-center">
                                            <input type="checkbox" />
                                        </td>
                                    @endif
                                @else 
                                    <td class="text-center">
                                        <input type="checkbox" />
                                    </td>
                                @endif --}}
                                {{-- Paid Subscriber column. --}}
                                {{-- @if (($signupuser->starting_date <= now()->format('Y-m-d')) &&
                                    ($signupuser->expiry_date >= now()->format('Y-m-d')))
                                    @if (($signupuser->trial_start_at <= now()->format('Y-m-d')) &&
                                        ($signupuser->trial_expire_at >= now()->format('Y-m-d')))
                                        <td class="text-center">
                                            <input type="checkbox" />
                                        </td>
                                    @else 
                                        <td class="text-center">
                                            <input type="checkbox" checked />
                                        </td>
                                    @endif
                                @else 
                                    <td class="text-center">
                                        <input type="checkbox" />
                                    </td>
                                @endif --}}
                                <td class="text-center">
                                    {{ $signupuser->first_name }} {{ $signupuser->last_name }} <br> 
                                    {{ $signupuser->phone }} <br> 
                                    {{ $signupuser->email }} <br>
                                    {{ $signupuser->facebook_link }}
                                </td>
                                <td class="text-center">
                                    @php
                                        $dt = new DateTime($signupuser->created_at,
                                        new DateTimeZone('UTC'));
                                        $dt->setTimezone(new
                                        DateTimeZone('Asia/Dhaka'));
                                        echo $dt->format('Y-m-d h:i A');
                                    @endphp
                                </td>
                                <td class="text-center">
                                    {{ $signupuser->payment_package }}
                                </td>
                                <td class="text-center">{{ $signupuser->signupuser_package }}</td>
                                <td class="text-center">{{ $signupuser->product_category }}</td>
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

