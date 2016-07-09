@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/entites') }}">Retour</a>
                    </div>
                    <div class="panel-title panel-title-adjustement">
                        &nbsp;&nbsp;&nbsp;Ajouter une entreprise
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <p class="pull-left">Erreur<?php if (count($errors) > 1) { echo 's'; } ?></p>
                            <div class="clearfix"></div>
                            @foreach ($errors->all() as $error)
                                <br>
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                        {!! Form::open(array('route' => 'admin.entites.store', 'class' => 'forms')) !!}


                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Type d'entreprise</label>
                            <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="type">

                                <option value="cvepdb">CVEPDB</option>
                                <option value="client">Client</option>
                                <option value="comptable">Comptable</option>

                            </select>
                        </div>

                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Status de l'entreprise</label>
                            <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="status">

                                <option value="active">Active</option>
                                <option value="disabled">Disabled</option>

                            </select>
                        </div>

                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Users</label>
                            {!! Form::select(
                                'users[]',
                                $users->lists('full_name', 'id'),
                                old('users'),
                                ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select Status", 'multiple' => 'multiple']
                            ) !!}
                        </div>

                        <div class="form-group form-group-default required">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required="">
                        </div>

                        <div class="form-group form-group-default required">
                            <label>SIRET</label>
                            <input type="text" class="form-control" name="siret" required="">
                        </div>

                        <div class="form-group form-group-default required">
                            <label>Adresse</label>
                            <input type="text" class="form-control" name="address" required="requires">
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Code postal</label>
                                    <input type="text" class="form-control" required="required" name="zipcode">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" required="required" name="city">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Pays</label>
                                    <input type="text" class="form-control" required="required" name="country">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required="required" name="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-complete" type="submit">Ajouter l'entité</button>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/users/validation.js"></script>
@endsection
