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
                        &nbsp;&nbsp;&nbsp;Editer un projet
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
                    {!! Form::open(array('route' => ['admin.projects.update', $project->id], 'class' => 'forms', 'methode' => 'put')) !!}


                    <div class="form-group form-group-default required">
                        <label>Client</label>
                        <input type="hidden" id="js-select-client" class="form-control" name="entite_id"
                               required="required" value="{{ old('entite_id', $project->entite_id) }}"
                               placeholder="Entreprise cliente">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Status</label>
                        {!! Form::select(
                            'status',
                            $projects_status,
                            old('status', $project->status),
                            ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select status"]
                        ) !!}
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="name" required="required"
                               value="{{ old('name', $project->name) }}" placeholder="Nom du projet">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required="required"
                               value="{{ old('description', $project->description) }}"
                               placeholder="Description du projet">
                    </div>

                    <div class="form-my_group">
                        <label>Tâches</label>
                        <br>


                        <div id="tasks_container">


                            <div class="alert alert-info" role="alert">
                                Il n'y a aucune tache
                            </div>

                            <div class="form-my_group">

                                <label>Ma super tache</label>
                                <p>
                                    Ma super description de ma tache
                                </p>
                                <br>
                                <button type="button" id="tasks_btn_trash_task" class="btn btn-danger btn-cons pull-right" href="javascript:void(0);">
                                    <i class="pg-trash"></i> Supprimer
                                </button>
                                <button type="button" id="tasks_btn_edit_task" class="btn btn-warning btn-cons pull-right" href="javascript:void(0);">
                                    <i class="pg-trash"></i> Editer
                                </button>
                            </div>


                        </div>


                        <div class="form-my_group">
                            <label>Nouvelle tâche</label>
                            <br>

                            <div class="tasks_task_form" style="display:none;">

                                <div class="form-group form-group-default required">
                                    <label>Nom</label>
                                    <input type="text" class="form-control" name="name" required="required"
                                           value="{{ old('name', $project->name) }}" placeholder="Nom du projet">
                                </div>

                                <div class="form-group form-group-default required">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" required="required"
                                           value="{{ old('description', $project->description) }}"
                                           placeholder="Description du projet">
                                </div>

                                <button type="button" id="tasks_btn_add_task" class="btn btn-info btn-cons" href="javascript:void(0);">
                                    <i class="fa fa-plus"></i> Ajouter la tache
                                </button>

                                <button type="button" id="tasks_btn_cancel_task" class="btn btn-cons" href="javascript:void(0);">
                                    <i class="fa fa-plus"></i> Annuler la tache

                                </button>

                            </div>



                            <button type="button" id="tasks_btn_show_task_form" class="btn btn-info btn-cons" href="javascript:void(0);">
                                <i class="fa fa-plus"></i> Nouvelle tache
                            </button>

                        </div>


                    </div>


                    <button class="btn btn-complete" type="submit">Editer le projet</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/projects/validation.js"></script>
    <script>
        (function ($) {

            _projects = {};

            _projects.tasks = {


                tasks_task_form: $('.tasks_task_form'),
                tasks_btn_show_task_form: $('#tasks_btn_show_task_form'),
                tasks_btn_add_task: $('#tasks_btn_add_task'),
                tasks_btn_cancel_task: $('#tasks_btn_cancel_task'),


                display_form: function() {
                    _projects.tasks.tasks_btn_show_task_form.click(function(){
                        _projects.tasks.show_form();
                    });
                },

                cancel_form: function() {
                    _projects.tasks.tasks_btn_cancel_task.click(function(){
                        _projects.tasks.hide_form();
                    });
                },

                show_form: function () {
                    _projects.tasks.tasks_task_form.show('slow');
                    _projects.tasks.tasks_btn_show_task_form.hide();
                },
                hide_form: function() {
                    _projects.tasks.tasks_task_form.hide('slow');
                    _projects.tasks.tasks_btn_show_task_form.show();
                }


            };


            _projects.tasks.display_form();
            _projects.tasks.cancel_form();





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
                initSelection: function (element, callback) {
                    $.post(
                            "{{ url('admin/entites/ajax/getclientbyid') }}",
                            {id: "{{ old('entite_id', $project->entite_id) }}", _token: '{{ csrf_token() }}'}
                    ).done(function (data) {
                                callback(data.results[0]);
                            });
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
        }(jQuery))
    </script>
@endsection
