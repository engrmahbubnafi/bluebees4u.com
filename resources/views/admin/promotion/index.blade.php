@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="{{ Request::url() }}">Promotion Codes</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Promotion Codes</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('promotion.create','<i class="fa fa-plus"></i> New',null,array('class'=>'btn btn-success','style'=>'margin-bottom:10px'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                               cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Promotion Code</th>
                                <th>Percentage</th>
                                <th>Fixed Amount</th>
                                <th>Maximum <br> Applicable Amount</th>
                                <th>Expiry Date</th>
                                <th>Minimum <br> Purchase Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($allPromotions as $allPromotion)
                                <tr>
                                    <td>{{ $allPromotion->promotion_code }}</td>
                                    <td>{{ $allPromotion->percentage }}</td>
                                    <td>{{ $allPromotion->fixed_amount }}</td>
                                    <td>{{ $allPromotion->max_amount }}</td>
                                    <td>{{ $allPromotion->end_date }}</td>
                                    <td>{{ $allPromotion->min_purchase }}</td>
                                    <td>
                                        @php
                                            if($allPromotion->status == 1){
                                            echo 'Active';
                                            }
                                            elseif ($allPromotion->status == 0){
                                            echo 'Inactive';
                                            }
                                        @endphp
                                    </td>
                                    <td><a href="{{route('promotion.edit',array($allPromotion->id))}}" class="btn">Edit</a>
                                        {{--                                    <form id="inactiveButton" method="POST" action="{{ route('promotion.update', $allPromotion->promotion_code) }}">--}}
                                        {{--                                        @csrf--}}
                                        {{--                                        @method('PATCH')--}}
                                        {{--                                        <button type="submit" class="btn">Inactive</button>--}}
                                        {{--                                    </form>--}}
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
