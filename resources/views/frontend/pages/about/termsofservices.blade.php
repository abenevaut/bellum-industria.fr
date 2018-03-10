@extends('frontend.layouts.default')

@section('content')
    <section class="padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="post post-single">
                        <div class="post-header post-author">
                            <div class="post-title">
                                <h2>Mentions légales</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="colored">Bellum Industria</h2>
                                <ul>
                                    <li>Dénomination Sociale : Antoine Benevaut</li>
                                    <li>Raison Sociale : Profession libérale (close en date du 31/12/2017)</li>
                                    <li>Identification SIRET : 80352602900019</li>
                                    <li>Identification TVA : FR59803526029</li>
                                    <li><i class="icon-location contact"></i> 1 rue de Malabry 92350 Le Plessis
                                        Robinson France
                                    </li>
                                    <li><i class="icon-mail contact"></i> contact@bellum-industria.fr</li>
                                    <li><i class="icon-mail contact"></i> <a
                                                href="{{ route('frontend.contact.index') }}">Formulaire de
                                            contact</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h3 class="colored">Le site</h3>
                                <h4>www.bellum-industria.fr</h4>
                                <p>
                                    est une platerforme d'information sur des sujets liés au jeux vidéos et
                                    également une plateforme de gestion de tournois pour le jeux "Counter-Strike:
                                    Global Offensive" (jeux +16 ans).
                                </p>
                                <h3 class="colored">Hébergement</h3>
                                <h4>Fortrabbit.com</h4>
                                <p>
                                    https://www.fortrabbit.com<br>
                                    Adresse : Görlitzer Str. 52 10997 Berlin<br>
                                    Téléphone : +49 30 609 80 784 0
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
