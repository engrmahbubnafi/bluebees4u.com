@extends('layouts.admin')
@section('content')
 <!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-copy" aria-hidden="true"></i><a href="#">User profile</a></li>
{{--            <li><a>User profile</a></li>--}}
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <div class="row animated fadeInRight">
     <div class="col-sm-12">
         <div class="panel">
             <div class="panel-content">
                 {{ Form::model($users,array('route' => array('users.update', $users->id),'class'=>'kt-form form-horizontal','novalidate'=>'novalidate','method' => 'PUT','enctype'=>"multipart/form-data")) }}
                 <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                     <div class="kt-section kt-section--first">
                         <div class="kt-section__body">
                             <div class="kt-wizard-v4__form">
                                 <div class="row">
                                     <div class="col-md-8">
                                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                             <label for="name" class="col-md-2 control-label">Name</label>
                                             <div class="col-md-8">
                                                 {{Form::text('name',null,array('class' => 'form-control', 'required' =>'required'))}}
                                                 @if ($errors->has('name'))
                                                     <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                                             <label for="role_id" class="col-md-2 control-label">Role</label>
                                             <div class="col-md-8">
                                                 {{Form::select('role_id',$roles,null,array('class' => 'form-control'))}}
                                             </div>
                                             @if ($errors->has('role_id'))
                                                 <span class="help-block">
                                                        <strong>{{ $errors->first('role_id') }}</strong>
                                                    </span>
                                             @endif
                                         </div>
                                         <div style="display: none"
                                             class="form-group{{ $errors->has('designation_id') ? ' has-error' : '' }}">
                                             <label for="designation_id"
                                                    class="col-md-2 control-label">Designation</label>
                                             <div class="col-md-8">
                                                 {{Form::select('designation_id',$designations,null,array('class' => 'form-control'))}}
                                             </div>
                                             @if ($errors->has('designation_id'))
                                                 <span class="help-block">
                                                        <strong>{{ $errors->first('designation_id') }}</strong>
                                                    </span>
                                             @endif
                                         </div>

                                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                             <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                                             <div class="col-md-8">
                                                 {{Form::text('email',null,array('class' => 'form-control', 'required' =>'required'))}}
                                                 @if ($errors->has('email'))
                                                     <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                 @endif
                                             </div>
                                         </div>

                                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                             <label for="password" class="col-md-2 control-label">Password</label>

                                             <div class="col-md-8">
                                                 {{Form::text('password','',array('class' => 'form-control', 'required' =>'required'))}}
                                                 @if ($errors->has('password'))
                                                     <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                 @endif
                                             </div>
                                         </div>

                                         <div class="form-group">
                                             <label for="password-confirm" class="col-md-2 control-label">Confirm
                                                 Password</label>
                                             <div class="col-md-8">
                                                 {{Form::text('password_confirmation',null,array('class' => 'form-control', 'required' =>'required'))}}
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <label for="email" class="col-md-2 control-label">Status</label>
                                             <div class="col-md-8">
                                                 {{Form::select('status',config('myconfig.status'),null,array('class' => 'form-control'))}}
                                             </div>
                                         </div>
                                         <div class="form-group">
                                             <div class="col-md-8 col-md-offset-2">
                                                 <input type="hidden" name="redirect_page" value="1">
                                                 <button type="submit" class="btn btn-primary">
                                                     Update Profile
                                                 </button>
                                             </div>
                                         </div>

                                     </div>
                                     <div class="col-md-4">
                                         <img alt="Photo" src="{{ asset("storage".$users->photo) }}" height="200px" width="200px"/>
                                         <br>
                                         {{Form::file('photo',null,array('class' => (($errors->has("photo")) ? "form-control is-invalid" : "form-control")))}}
                                         @error('photo')
                                         <div class="invalid-feedback">
                                             {{ $message }}
                                         </div>
                                         @enderror
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
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
@endsection
@section('script')
<script>
    //MAGNIFIC POPUP GALLERY
    $(function() {
        $('.gallery-wrap').magnificPopup({
            delegate: 'a',
            type: 'image',
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            },
            tLoading: 'Loading image #%curr%...',
            mainClass: 'mfp-no-margins mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });
</script>
@stop
