@extends('cvepdb.client.layouts.tunnel')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Entites
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">




            <div id="rootwizard" class="m-t-50">


                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm">

                    <li class="@if (!$bool_demande) active @endif">
                        <a data-toggle="tab" href="#tab1"><i class="fa fa-truck tab-icon"></i> <span>Compte inactif</span></a>
                    </li>

                    @if ($bool_demande)
                    <li class="active">
                        <a data-toggle="tab" href="#tab2"><i class="fa fa-check tab-icon"></i> <span>Summary</span></a>
                    </li>
                    @endif

                </ul>


                <!-- Tab panes -->
                <div class="tab-content">


                    <div class="tab-pane slide-left padding-20 @if (!$bool_demande) active slide-left @endif" id="tab1">
                        <div class="row row-same-height">
                            <div class="col-md-5 b-r b-dashed b-grey ">
                                <div class="padding-30 m-t-20">
                                    <h2>Votre compte est inactif</h2>
                                    <p>Votre compte n'a pas encore été activé.</p>
                                    <p>Vous pouvez dés à présent demander son activation via le formulaire de droite.</p>
                                    <p class="small hint-text"><i class="fa fa-check-square-o"></i> Les comptes sont inactif durant la construction de votre dossier.</p>
                                    <p class="small hint-text"><i class="fa fa-check-square-o"></i> Après son activation, votre compte sera disponible de façon illimité après la fermeture du dernier projet.</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="padding-30">




                                    <form role="form" class="forms">
                                        <p>Responsable de la demande d'activation</p>
                                        <div class="form-group-attached">
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>First name</label>
                                                        <input type="text" class="form-control" value="{{ Auth::user()->first_name }}" readonly="readonly">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Last name</label>
                                                        <input type="text" class="form-control" value="{{ Auth::user()->last_name }}" readonly="readonly">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly="readonly">
                                            </div>
                                        </div>
                                        <br>
                                        <p>Veuillez précisé l'entreprise à laquelle vous souhaitez être rattacher</p>
                                        <div class="form-group-attached">
                                            <div class="form-group form-group-default required">
                                                <label>Nom de votre entreprise de rattachement</label>
                                                <input type="text" class="form-control" placeholder="Current address" required="required">
                                            </div>
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-complete btn-cons">Demander l'activation du compte</button>

                                    </form>






                                </div>
                            </div>
                        </div>
                    </div>


                    @if ($bool_demande)

                    <div class="tab-pane slide-left padding-20 active slide-left" id="tab2">
                        <div class="row row-same-height">
                            <div class="col-md-5 b-r b-dashed b-grey ">
                                <div class="padding-30 m-t-20">
                                    <h2>Votre compte est inactif</h2>
                                    <p>Votre compte n'a pas encore été activé.</p>
                                    <p>Vous pouvez dés à présent demander son activation via le formulaire de droite.</p>
                                    <p class="small hint-text"><i class="fa fa-check-square-o"></i> Les comptes sont inactif durant la construction de votre dossier.</p>
                                    <p class="small hint-text"><i class="fa fa-check-square-o"></i> Après son activation, votre compte sera disponible de façon illimité après la fermeture du dernier projet.</p>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="padding-30 m-t-90">
                                    <div class="alert alert-info" role="alert">
                                        <p>Votre demande d'activation est en attente de traitement.</p>
                                        <p>Vous receverez une notification par mail qui vous informera de la mise en service de votre compte.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif

                    <div class="wizard-footer padding-20 bg-master-light">
                        <p class="small hint-text pull-left no-margin">
                            Une seule demande d'activation est possible.<br/>
                            Toute demande sera traite dans les plus bref delais en fonction de l'avancement du dossier.
                        </p>
                        <div class="pull-right">
                            <img src="/assets/images/cvepdb/apple-touch-icon-precomposed.png" alt="logo" data-src="/assets/images/cvepdb/apple-touch-icon-precomposed.png"
                                 data-src-retina="/assets/images/cvepdb/apple-touch-icon-precomposed.png" width="40" height="40">
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>






        </div>
    </div>
@endsection

@section('jsfooter')
    <script>
        (function($, D) {
            'use strict';
            $(D).ready(function() {
                $('#rootwizard').bootstrapWizard({
                    onInit: function() {
                        $('#rootwizard ul').removeClass('nav-pills');
                    },
                    onTabClick: function(tab, navigation, index) {
                        return false;
                    }
                });
            });
        })(window.jQuery, document);
    </script>
@endsection