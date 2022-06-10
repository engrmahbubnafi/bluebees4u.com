@extends('layouts.default',['className' => 'fixed accounts sign-in'])
@section('content')
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <img alt="logo" src="{{ asset("storage/site_settings/".$site_settings->logo_inner) }}" />
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('login') }}">
                         {{ csrf_field() }}
                        <div class="form-group mt-md{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-with-icon">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                <i class="fa fa-envelope"></i>
                            </span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-with-icon">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <i class="fa fa-key"></i>
                            </span>
                             @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="check" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                   Sign in
                            </button>
                        </div>
                        <div class="form-group text-center">
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                            {{-- <hr/>
                             <span>Don't have an account?</span>
                            <a href="pages_register" class="btn btn-block mt-sm">Register</a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
@endsection
