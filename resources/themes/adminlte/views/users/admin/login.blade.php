@extends('adminlte::.layouts.auth')

@section('content')

    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ url('admin/login') }}" method="post">
        {!! csrf_field() !!}

        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif
        </div>

        <div class="row">

            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>

        </div>
    </form>
@endsection

{{--@section('social')--}}
{{--<div class="social-auth-links text-center">--}}
    {{--<p>- OR -</p>--}}
    {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using--}}
        {{--Facebook</a>--}}
    {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using--}}
        {{--Google+</a>--}}
{{--</div>--}}
{{--<!-- /.social-auth-links -->--}}
{{--@endsection--}}

{{--@section('help')--}}
    {{--<a href="#">I forgot my password</a><br>--}}
    {{--<a href="register.html" class="text-center">Register a new membership</a>--}}
{{--@endsection--}}
