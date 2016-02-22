@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/projects') }}">Retour</a>
                    </div>
                    <div class="panel-title panel-title-adjustement">
                        &nbsp;&nbsp;&nbsp;Ajouter un projet
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <p class="pull-left">Erreur<?php if (count($errors) > 1) {
                                    echo 's';
                                } ?></p>

                            <div class="clearfix"></div>
                            @foreach ($errors->all() as $error)
                                <br>
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'admin.projects.store', 'class' => 'forms')) !!}


                    <div class="form-group form-group-default required">
                        <label>Client</label>
                        <input type="hidden" id="js-select-client" class="form-control" name="entite_id"
                               required="required" value="{{ old('entite_id') }}" placeholder="Entreprise cliente">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Status</label>
                        {!! Form::select(
                            'status',
                            $projects_status,
                            old('status'),
                            ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select status"]
                        ) !!}
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="name" required="required"
                               value="{{ old('name') }}" placeholder="Nom du projet">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required="required"
                               value="{{ old('description') }}" placeholder="Description du projet">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Milestones dates</label>


                        <div class="row">

                            <div class="col-sm-6">
                                <div id="datepicker-embeded"></div>
                            </div>
                            <div class="col-sm-6">

                                <div id="selected_due_dates"></div>

                            </div>

                        </div>


                    </div>


                    <button class="btn btn-complete" type="submit">Ajouter le projet</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/projects/validation.js"></script>
    <script>
        (function ($, D) {

            $(D).bind('CVEPDB_READY', function () {

                var container_due_dates = $('#selected_due_dates');

                $('#datepicker-embeded').datepicker({
                    daysOfWeekDisabled: "0,1",
                    multidate: true,
                    language: cvepdb_config.LANG
                }).on('changeDate', function (e) {

                    container_due_dates.html('');

                    $.each(e.dates, function (i, date) {


                        container_due_dates.append(cvepdb.date.(new Date()) + '<br/>');


                    });


                });






                $('#js-select-client').select2({
                    ajax: {
                        url: "{{ url('admin/entites/ajax/getclients') }}",
                        dataType: 'json',
                        type: "POST",
                        delay: 250,
                        data: function (params) {
                            return {
                                _token: '{{ csrf_token() }}'
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


            });

        }(window.jQuery, document));
    </script>
@endsection
