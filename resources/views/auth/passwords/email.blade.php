@extends('layouts.default',['className' => 'fixed accounts forgot-password'])
@section('content')
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="{{ asset("storage/site_settings/".$site_settings->logo_inner) }}" />
        </div>
        <div class="box">
            <!--FORGOT PASSWPRD FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                         {{ csrf_field() }}
                        <h4>Forgot your password?</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi distinctio ducimus ipsam reprehenderit vel?
                        <div class="form-group mt-md{{ $errors->has('email') ? ' has-error' : '' }}">
                                <span class="input-with-icon">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required>
                                    <i class="fa fa-envelope"></i>
                                </span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block "> Send Password Reset Link</button>
                        </div>
                        @if (Route::has('login'))
                            <div class="form-group text-center">
                                You remembered?, <a href="{{ url('/login') }}">Sign in!</a>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
@endsection
