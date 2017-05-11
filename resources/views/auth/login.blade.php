@extends('frontend.layouts.default')

@section('css')
    <style>
        .btn-steam {
            color: #fff;
            background-color: #666666;
            border-color: rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection

@section('content')


    <section class="hero hero-panel" style="background-image: url(/img/cover/cover-login.jpg);">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-sign-in"></i> Espace de connexion</h3>
                        </div>
                        <div class="panel-body">

                            <a class="btn btn-block btn-social btn-steam"><i class="fa fa-steam"></i> Se connecter avec Steam</a>
                            <a class="btn btn-block btn-social btn-facebook"><i class="fa fa-facebook"></i> Se connecter avec Facebook</a>
                            <a class="btn btn-block btn-social btn-twitter"><i class="fa fa-twitter"></i> Se connecter avec Twitter</a>
                            <a class="btn btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Se connecter avec Google</a>

                            <div class="separator"><span>ou</span></div>

                            <form role="form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group input-icon-left {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <i class="fa fa-envelope"></i>

                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group input-icon-left {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <i class="fa fa-lock"></i>

                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group" style="padding-bottom: 30px">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="checkbox">Remember me</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>

                            </form>
                        </div>
                        <div class="panel-footer">
                            Pas encore de compte ? <a href="{{ route('register') }}">Créer un compte</a>
                            <br>
                            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
