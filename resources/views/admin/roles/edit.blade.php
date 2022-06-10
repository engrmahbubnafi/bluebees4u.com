@extends('layouts.admin')
@section('title', 'Edit Role')
@section('content')
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Roles</a></li>
                <li><a>Enter role details, set permission and submit</a></li>
            </ul>
        </div>
    </div>
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>New Role</b></h4>
            <span class="pull-right">
                {!! Html::decode(link_to_route('roles.index','<i class="fa fa-list"></i> Roles List',null,array('class'=>'btn btn-brand
        btn-elevate btn-icon-sm'))) !!}
        </span>
            <div class="panel">
                <div class="panel-content">
                    {{ Form::model($roles,array('route' => array('roles.update', $roles->id),'class'=>'kt-form','novalidate'=>'novalidate','method' => 'PUT')) }}
                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">

                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Role Info:</h3>
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label class="col-xl-2 col-lg-2 col-form-label require">Role Name</label>
                                        <div class="col-lg-6 col-xl-6">
                                            {{Form::text('name',null,array('class' => 'form-control', 'required' =>'required'))}}
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row{{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label class="col-xl-2 col-lg-2 col-form-label require">Role Description</label>
                                        <div class="col-lg-6 col-xl-6">
                                            {{Form::textarea('description',null,array('class' => 'form-control', 'rows'=>'3'))}}
                                            <small>(maximum length should be 100)</small>
                                            @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @if($roles->is_deletable == '1')
                                        <div class="form-group row">
                                            <label class="col-xl-2 col-lg-2 col-form-label require">Status</label>
                                            <div class="col-lg-6 col-xl-6">
                                                {{Form::select('status',config('conf.status'),null,array('class' => 'form-control')) }}
                                                @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    @else
                                        {{Form::hidden('status','active')}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                        <div class="kt-section">
                            <div class="kt-section__body">
                                <h3 class="kt-section__title kt-section__title-lg">Permission Setting:</h3>

                                <label class="check-all">
                                    <input id="checkoruncheck" type="checkbox" checked="checked">
                                    <strong>Check/Uncheck All</strong>
                                </label>
                                @php
                                    $controllersArray = array_chunk($permissions, 4, true);
                                @endphp
                                @foreach ($controllersArray as $elements)
                                    <div class="row">
                                        @foreach ($elements as $parent)
                                            <div class="col-md-3">
                                                <div class="checkbox controller">
                                                    <label>
                                                        <input name="permissions[]" class="parent_{{ $parent['name'] }}"
                                                               type="checkbox"
                                                               <?php echo in_array($parent['id'], $checkPermissions) ? "checked='true'" : ""; ?>
                                                               value="{{ $parent['id']}}"
                                                               onChange="permission_select_deselect_child(this)">
                                                        <strong>{{ Str::camelToSpace($parent['name']) }}</strong>
                                                    </label>
                                                </div>
                                                <div class="action-wraper">
                                                    @foreach ($parent['children'] as $child)
                                                        <div class="checkbox actions" style="margin-left:20px;">
                                                            <label><input name="permissions[]"
                                                                          class="{{ $parent['name'] }}"
                                                                          type="checkbox"
                                                                          <?php echo in_array($child['id'], $checkPermissions) ? "checked='true'" : ""; ?>
                                                                          value="{{ $child['id'] }}"
                                                                          onChange="permission_select_parent('{{ $parent['name'] }}')">
                                                                {{ Str::mystudyCase(Str::snake($child['name'])) }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="kt-section">
                            <div class="kt-section__body">
                                <div class="kt-wizard-v4__form">
                                    <div class="form-group row">
                                        <div class="col-md-6 col-md-offset-2">
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link href="{{ asset('assets/css/pages/wizard/wizard-4.css') }}" rel="stylesheet"/>
    <style>
        .kt-form {
            width: 100% !important;
            padding-top: 0 !important;
        }

        .check-all {
            border: 1px solid #ddd;
            padding: 5px;
            background-color: #efefef;
            cursor: pointer;
        }

        .checkbox label {
            cursor: pointer;
        }
    </style>
@endpush

@push('script')
    <script>
        $(document).ready(function (e) {
            $("#checkoruncheck").change(function () {
                $("input:checkbox").not('#checkboxCustom3').prop('checked', $(this).prop("checked"));
            });
        });

        /* -- start User role permission check box true false control -- */
        function permission_select_deselect_child(selector) {
            var check;
            if ($(selector).is(':checked') === false) {
                check = false;
            } else {
                check = true;
            }
            if ($(selector).parent().parent().hasClass('controller') === true) {
                var action_ul = $(selector).parent().parent().next('div.action-wraper');
                $.each(action_ul.children('.actions'), function (ind, val) {
                    var cur_check_box = $(val).children().children('input');
                    $(cur_check_box).prop('checked', check);
                });
            }
        }

        function permission_select_parent(selector) {
            var check = $('.' + selector).is(':checked');
            $('.parent_' + selector).prop('checked', check);
        }

        /* -- End User role permission check box true false control -- */
    </script>
@endpush
