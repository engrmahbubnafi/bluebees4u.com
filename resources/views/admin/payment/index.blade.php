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
                        <table id="users_table" class="data-table table table-striped nowrap table-hover" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Account Number</th>
                                    <th class="text-center">Amount</th>
                                    <th class="no-sort text-center">Customer</th>
                                    <th class="text-center">Transaction ID</th>
                                    <th class="no-sort text-center">Package</th>
                                    <th class="no-sort text-center">Add On - Quantity</th>
                                    <th class="no-sort text-center">Additional Amount</th>
                                    <th class="no-sort text-center">3rd Party - Amount</th>
                                    <th class="no-sort text-center">Promotion Code</th>
                                    <th class="no-sort text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    {{-- Table --}}
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
                                            @if ($payment->addons)
                                                {!! $payment->addons !!}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($payment->additional_amount_note && $payment->additional_amount)
                                                {{ $payment->additional_amount_note }} - {{ $payment->additional_amount }}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($payment->thirdparties)
                                                {!! $payment->thirdparties !!}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($payment->promotion_code)
                                                {{ $payment->promotion_code }}
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            @if ($isAdministrator)
                                                <a href="{{ route('payments.system_admin_edit', [$payment->id]) }}"
                                                    class="btn">SA Edit</a>

                                                <a href="javascript:void(0)" data-toggle="modal" data-target="#deleteModal"
                                                    onClick="callModal({{ $payment->id }})" class='btn'>
                                                    SA Delete
                                                </a>
                                            @endif

                                            @if ($payment->status == 'pending')
                                                <a href="{{ route('payments.edit', [$payment->id]) }}"
                                                    class="btn">Edit</a>
                                            @endif
                                        </td>
                                    </tr> {{-- Table --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    {{ Form::open([
                        'route' => ['payments.system_admin_delete', $payment->id],
                        'method' => 'DELETE',
                        'id' => 'del-form',
                    ]) }}

                    <div class="modal-body" id="deleteModalBody">
                        This record will be deleted! Are you sure?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{ Form::submit('Confirm Delete', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div> {{-- Delete Modal --}}
    </div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.css" />
@endpush
@push('script')
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/r-2.2.9/sp-2.0.0/datatables.min.js">
    </script>
    <script src="{{ asset('js/examples/tables/data-tables.js') }}"></script>
    <script>
        function callModal(selector) {
            let formAction = document.getElementById("del-form").action;

            formAction = formAction.slice(0, formAction.lastIndexOf('/'));
            formAction = formAction + '/' + selector;

            document.getElementById("del-form").action = formAction;
        }
    </script>
@endpush
