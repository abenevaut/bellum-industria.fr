@extends('frontend.layouts.default')

@section('css')
    <style>
        section.hero p {
            color: #5086a0;
        }
        .has-error .help-block {
            color: #e74c3c;
        }
    </style>
@endsection

@section('js')
    <script src="{{ mix('js/auth/reset/send_email.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <section class="hero hero-panel" style="background-image: url(/img/cover/cover-login.jpg);">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h1 class="panel-title">Mot de passe oublié</h1>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('status'))

                                <div class="alert alert-success alert-module" role="alert" style="margin-bottom:0px;">
                                    <p class="pull-left"><b>{{ trans('passwords.reset_password_success_title') }}</b></p>
                                    <div class="clearfix"></div>
                                    <p><small>{!! trans(Session::get('status')) !!}</small></p>
                                </div>

                                <a href="{{ route('login') }}" class="btn btn-primary btn-cons m-t-10">{{ trans('global.back_home') }}</a>

                            @else

                                <div class="alert alert-info alert-module" role="alert">
                                    <p class="pull-left"><b>Vous avez oublié votre mot de passe ?</b></p>
                                    <div class="clearfix"></div>
                                    <p>Cela arrive parfois. Renseignez votre courriel, <b>nous vous enverrons par message éléctronique un lien pour mettre à jour votre mot de passe</b> pour pouvoir accèder de nouveau à votre compte utilisateur</p>
                                </div>

                                <form id="form-register" role="form" action="{{ route('password.email') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="form-group input-icon-left {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <i class="fa fa-envelope"></i>
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span id="email-error" class="help-block">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Envoyer le lien par courriel</button>
                                </form>
                            @endif
                        </div>
                        <div class="panel-footer">
                            Vous avez déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
