@extends('cvepdb.admin.layouts.default')

@section('content')

    {!! Form::open(['route' => 'admin.bankaccounts.store', 'role' => 'form']) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Compte bancaire
                    </div>
                </div>
                <div class="panel-body">
                    <h5>
                        Informations sur le compte
                    </h5>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group form-group-default required">
                                <label>Reference</label>
                                <input type="text" class="form-control" name="reference" required="required" value="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default form-group-default-select2 required">
                                <label class="">Status de l'entreprise</label>
                                <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="type">

                                    <option value="active">Active</option>
                                    <option value="disabled">Disabled</option>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group form-group-default required">
                                <label>IBAN</label>
                                <input type="text" class="form-control" name="iban" required="required" value="">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group form-group-default required">
                                <label>BIC</label>
                                <input type="text" class="form-control" name="bic" required="required" value="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                    <a href="{{ url('admin/bankaccounts') }}" class="btn" type="submit">Anuler</a>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('jsfooter')

    <script>

        $('#js-select-vendor').select2({
            ajax: {
                url: "{{ url('admin/entites/ajax/getvendors') }}",
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
                        + item.name
                        + '</b>&nbsp;&nbsp;<small>' + item.siret + '</small></div>'
                        + '</div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;'
                        + item.address
                        + '</div>'
                        + '</div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;' + item.zipcode + ' ' + item.city + ' ' + item.country + '</div>'
                        + '</div>';
            },
            formatSelection: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.name
                        + '</b>&nbsp;&nbsp;<small>' + item.siret + '</small></div></div>'
            }
        }).on("change", function (e) {
        });

        $('#js-select-client').select2({
            ajax: {
                url: "{{ url('admin/entites/ajax/getclients') }}",
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
                        + item.name
                        + '</b>&nbsp;&nbsp;<small>' + item.siret + '</small></div>'
                        + '</div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;'
                        + item.address
                        + '</div>'
                        + '</div><div class="row">'
                        + '<div class="col-sm-12">&nbsp;&nbsp;' + item.zipcode + ' ' + item.city + ' ' + item.country + '</div>'
                        + '</div>';
            },
            formatSelection: function (item) {
                return '<div class="row">'
                        + '<div class="col-sm-12"><b>'
                        + item.name
                        + '</b>&nbsp;&nbsp;<small>' + item.siret + '</small></div></div>'
            }
        }).on("change", function (e) {
        });

    </script>

@endsection