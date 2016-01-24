@extends('cvepdb.admin.pdf.layouts.default')

@section('content')

    <table width="100%" class="">
        <tr>
            <td width="60%">
                <h5 class="semi-bold m-t-0">{{ $bill->vendor->name }}</h5>
                <address>
                    SIRET : <strong>{{ $bill->vendor->siret }}</strong><br>
                    {{ $bill->vendor->address }}<br>
                    {{ $bill->vendor->zipcode }} {{ $bill->vendor->city }} {{ $bill->vendor->country }}
                </address>
            </td>
            <td width="40%" style="text-align: center">
                <div>
                    <div class="font-montserrat bold all-caps">
                        Facture en {{ $bill->currency }}<br/>
                        Référence : {{ $bill->reference }}
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div>
                    <div class="">Date d'émission : <span
                                class="font-montserrat bold all-caps">{{ $bill->date_emission }}</span></div>
                    <div class="clearfix"></div>
                </div>
            </td>
        </tr>
    </table>

    <table width="100%" class="m-t-30">
        <tr>
            <td width="60%">
                &nbsp;
            </td>
            <td width="40%">
                <p class="small no-margin">Facture à l'ordre de</p>
                <h5 class="semi-bold m-t-0">{{ $bill->client->name }}</h5>
                <address>
                    SIRET : <strong>{{ $bill->client->siret }}</strong><br>
                    {{ $bill->client->address }}<br>
                    {{ $bill->client->zipcode }} {{ $bill->client->city }} {{ $bill->client->country }}<br>
                    {{ $bill->client->email }}
                </address>
            </td>
        </tr>
    </table>


    <table class="table m-t-80" width="100%">
        <thead>
        <tr>
            <th width="0%"></th>
            <th width="50%">Désignation</th>
            <th width="16.6%" class="">Quantité</th>
            <th width="16.6%" class="">Prix de l'heure</th>
            <th width="16.6%" class="">Total</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <td width="50%">
                {{--<p class="text-black">Character Illustration</p>--}}

                <p class="" style="font-size:12px;">
                    Character Design projects from the latest top online portfolios on
                    Behance.
                </p>
            </td>
            <td width="16.6%" class="text-center">5.5 Heures</td>
            <td width="16.6%" class="text-center">56,50 &euro;</td>
            <td width="16.6%" class="text-right">Prix &euro;</td>
        </tr>
        </tbody>

    </table>

    <br>
    <br>
    <br>

    <div class="container-sm-height">
        <div class="row row-sm-height b-a b-grey">
            <div class="col-sm-5 text-right bg-menu col-sm-height padding-15">
                <h5 class="font-montserrat all-caps small no-margin hint-text text-white bold">Total</h5>

                <h1 class="no-margin text-white">Prix &euro;</h1>
            </div>
        </div>
    </div>

    <hr>

    <p>
        <span class="small hint-text" style="font-size:11px;">IBAN : FR48 3000 2005 9100 0043 1005 L38 - Code B.I.C. : CRLYFRPP</span><br/>
        <span class="small hint-text" style="font-size:10px;">Numéro intracommunautaire : FR 59 803 526 029</span><br/>
        <span class="small hint-text" style="font-size:10px;">La présente facture est payable à réception, tout retard entraînera automatiquement, sans qu'un rappel soit
    nécessaire, des intérêts de retard calculés sur la base de 3 fois le taux d'intérêt légal.</span><br/>
        <span class="small hint-text" style="font-size:10px;">Il sera appliquée une indemnité forfaitaire de 40 euros pour frais de recouvrement.</span><br/>
        <span class="small hint-text" style="font-size:10px;">Il ne sera pas appliqué d'escompte en cas de paiement anticipé.</span><br/>
        <span class="small hint-text" style="font-size:10px;">Membre d'une association agréée par l'administration fiscale acceptant à ce titre le paiement des honoraires par
    chèque.</span>
    </p>

    <hr>

    <div>
        <span class="m-l-70 text-black sm-pull-right">Page <span class="pagenum"></span></span>

        {{--<img width="235" height="47" alt="" class="invoice-logo"--}}
        {{--src="{{ url('/dist/images/pdf/logo.png') }}">--}}
        <span class="m-l-70 text-black sm-pull-right">{{ $bill->vendor->phone }}</span>
        <span class="m-l-70 text-black sm-pull-right">{{ $bill->vendor->email }}</span>
    </div>
@stop
