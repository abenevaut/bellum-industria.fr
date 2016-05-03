@extends('adminlte::layouts.auth')

@section('head')
    <style>
        .btn-social {
            position: relative;
            padding-left: 44px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn-social > :first-child {
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 32px;
            line-height: 34px;
            font-size: 1.6em;
            text-align: center;
            border-right: 1px solid rgba(0,0,0,0.2);
        }
        .btn-facebook {
            color: #fff;
            background-color: #3b5998;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-facebook:hover {
            color: #fff;
            background-color: #2d4373;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-google {
            color: #fff;
            background-color: #dd4b39;
            border-color: rgba(0,0,0,0.2);
        }
        .btn-google:hover {
            color: #fff;
            background-color: #c23321;
            border-color: rgba(0,0,0,0.2);
        }
    </style>
@endsection

@section('content')
    <p class="login-box-msg">{{ trans('adminlte::adminlte.auth_introduction') }}</p>
    <form action="{{ url('admin/login') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                   placeholder="{{ trans('adminlte::adminlte.auth_placeholder_email') }}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password"
                   placeholder="{{ trans('adminlte::adminlte.auth_placeholder_password') }}">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <input type="checkbox" name="remember"> {{ trans('adminlte::adminlte.auth_label_rememberme') }}
                    </label>
                </div>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ trans('adminlte::adminlte.auth_btn_login') }}
                </button>
            </div>
        </div>
    </form>
@endsection

@section('social')
    <div class="social-auth-links text-center">
        <p>- OR -</p>


        <a href="{{ url('login/facebook') }}" class="btn btn-block btn-social btn-facebook btn-flat">
            <i class="fa fa-facebook"></i> Sign in using Facebook
        </a>


        <a href="{{ url('login/google') }}" class="btn btn-block btn-social btn-google btn-flat">
            <i class="fa fa-google-plus"></i> Sign in using Google+
        </a>


    </div>
@endsection

@section('help')
    <a href="{{ url('password/reset') }}">I forgot my password</a><br>
    <a href="{{ url('register') }}" class="text-center">Register a new membership</a>
@endsection
