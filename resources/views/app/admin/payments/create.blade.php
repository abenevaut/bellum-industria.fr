@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">


                <div class="panel-heading">

                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/payments') }}">Retour</a>
                    </div>

                    <div class="panel-title">
                        <br/>&nbsp;&nbsp;&nbsp;Ajouter un paiement
                    </div>

                    {{--<div class="btn-group pull-right m-b-10">--}}
                        {{--<a class="btn btn-default" href="{{ url('admin/entites') }}">Retour</a>--}}
                    {{--</div>--}}

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>


                <div class="panel-body">
                    <h5>
                        Nouveau paiement
                    </h5>
                    {!! Form::open(array('route' => 'admin.payments.store', 'class' => 'forms')) !!}

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-group-default input-group required">
                                    <label>Date</label>
                                    <input type="text" class="form-control" placeholder="Pick a date" id="datepicker-component2" required="required" name="date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default form-group-default-select2 required">
                                    <label class="">Facture</label>
                                    <input type="hidden" id="js-select-bill" class="full-width" data-placeholder="Select client"
                                           name="bill_id">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default form-group-default-select2 required">
                                    <label class="">Compte bancaire</label>
                                    <input type="hidden" id="js-select-bank_account" class="full-width" data-placeholder="Select client"
                                           name="bank_account_id">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Ajoute le paiement</button>

                    {!! Form::close() !!}
                </div>


            </div>

        </div>
    </div>


@endsection

@section('jsfooter')

    <script>

        $('#js-select-bill').select2({
            ajax: {
                url: "{{ url('admin/bills/ajax/getbills') }}",
                dataType: 'json',
                type: "GET",
                delay: 250,
                data: function (params) {
                    return {
                        token: '{{csrf_token()}}'
                    };
                },
                results: function (data) {
                    return data;
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            formatResult: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.reference
                        + '</b>&nbsp;&nbsp;<small>' + item.date_emission + '</small></div>'
                        + '</div>'
                        + '</div>';
            },
            formatSelection: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.reference
                        + '</b>&nbsp;&nbsp;<small>' + item.date_emission + '</small></div></div>'
            }
        }).on("change", function (e) {
        });

        $('#js-select-bank_account').select2({
            ajax: {
                url: "{{ url('admin/bankaccounts/ajax/getbankaccounts') }}",
                dataType: 'json',
                type: "GET",
                delay: 250,
                data: function (params) {
                    return {
                        token: '{{csrf_token()}}'
                    };
                },
                results: function (data) {
                    return data;
                },
                cache: true
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            formatResult: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.reference
                        + '</b></div></div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;IBAN : '
                        + item.iban
                        + '</div>'
                        + '</div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;BIC : ' + item.bic + '</div>'
                        + '</div>';
            },
            formatSelection: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.reference
                        + '</b></div></div>'
            }
        }).on("change", function (e) {
        });

    </script>

@endsection