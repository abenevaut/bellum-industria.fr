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
    <script src="{{ mix('js/auth/reset/reset_password.js') }}" type="text/javascript"></script>
@endsection

@section('content')
    <section class="hero hero-panel" style="background-image: url(/img/cover/cover-login.jpg);">
        <div class="hero-bg"></div>
        <div class="container relative">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 pull-none margin-auto">
                    <div class="panel panel-default panel-login">
                        <div class="panel-heading">
                            <h1 class="panel-title">Mettre à jour votre mot de passe</h1>
                        </div>
                        <div class="panel-body">

                            <div class="alert alert-info alert-module" role="alert">
                                <p class="pull-left"><b>Changer votre mot de passe</b></p>
                                <div class="clearfix"></div>
                                <p><small>Remplissez ce formulaire pour mettre à jour votre mot de passe.</small></p>
                            </div>

                            <form id="form-register" role="form" action="{{ route('password.email') }}" method="POST">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default {{ $errors->has('email') ? 'has-error' : '' }} required">
                                            <label>Courriel</label>
                                            <input type="text" name="email" placeholder="confirmer votre courriel" class="form-control" required>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
											{{ $errors->first('email') }}
										</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default {{ $errors->has('password') ? 'has-error' : '' }} required">
                                            <label>Mot de passe</label>
                                            <input type="password" id="password" class="form-control" placeholder="nouveau mot de passe" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
											{{ $errors->first('password') }}
										</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default {{ $errors->has('password_confirmation') ? 'has-error' : '' }} required">
                                            <label>Confirmer le mot de passe</label>
                                            <input type="password" class="form-control" placeholder="confirmer le nouveau mot de passe" name="password_confirmation" required>
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
											{{ $errors->first('password_confirmation') }}
										</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Envoyer le lien par courriel</button>
                            </form>

                        </div>
                        <div class="panel-footer">
                            Un problème avec vote compte ? <a href="{{ route('frontend.contact.index') }}">Contactez-nous</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
