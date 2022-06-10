@extends('layouts.admin')
@section('content')
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Payments</a></li>
            <!-- <li><a>Data-table</a></li> -->
        </ul>
    </div>
</div>
<div class="row animated fadeInRight">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Payments</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="users_table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">Account Number</th>
                                <th class="text-center">Amount</th>
                                <th class="no-sort text-center">Customer</th>
                                <th class="text-center">Transaction ID</th>
                                <th class="no-sort text-center">Package</th>
                                <th class="no-sort text-center">Addons</th>
                                <th class="no-sort text-center">Promotion Code</th>
                                <th class="no-sort text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td class="text-center">{{ $payment->account_number }}</td>
                                    <td class="text-center">{{ $payment->amount }}</td>
                                    <td class="text-center">
                                        {{ $payment->first_name }} {{ $payment->last_name }}<br>
                                        {{ $payment->customer_id }}
                                    </td>
                                    <td class="text-center">{{ $payment->transaction_id }}</td>
                                    <td class="text-center">{{ $payment->package_name }}</td>
                                    <td class="text-center">
                                        @forelse ($payment->subscriberAddons as $addon)
                                            {{ $addon->addon_title . " - " . $addon->quantity }}<br> 
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td class="text-center">{{ $payment->promotion_code }}</td>
                                    <td class="text-center">
                                        @if($payment->status == 'pending')
                                            <a href="{{ route('payments.edit', array($payment->id)) }}" class="btn">Edit</a>
                                        @endif 
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
