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
                        &nbsp;&nbsp;&nbsp;Editer une entreprise
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
                        {!! Form::open(array('route' => ['admin.entites.update', $entite->id], 'class' => 'forms', 'method' => 'put')) !!}


                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Type d'entreprise</label>
                            {!! Form::select(
                                'type',
                                array('cvepdb' => 'CVEPDB', 'client' => 'Client', 'comptable' => 'Comptable'),
                                old('name', $entite->type),
                                ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select Type"]
                            ) !!}
                        </div>

                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Status de l'entreprise</label>
                            {!! Form::select(
                                'status',
                                array('active' => 'Active', 'disabled' => 'Disabled'),
                                old('name', $entite->status),
                                ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select Status"]
                            ) !!}
                        </div>

                        <div class="form-group form-group-default form-group-default-select2 required">
                            <label class="">Users</label>
                            {!! Form::select(
                                'users[]',
                                $users->lists('full_name', 'id'),
                                old('users', $entite->users->lists('id', 'id')->toArray()),
                                ['data-init-plugin' => 'select2', 'class' => 'full-width', 'data-placeholder' => "Select Status", 'multiple' => 'multiple']
                            ) !!}
                        </div>

                        <div class="form-group form-group-default required">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required="required" value="{{ old('name', $entite->name) }}">
                        </div>

                        <div class="form-group form-group-default required">
                            <label>SIRET</label>
                            <input type="text" class="form-control" name="siret" required="required" value="{{ old('siret', $entite->siret) }}">
                        </div>

                        <div class="form-group form-group-default required">
                            <label>Adresse</label>
                            <input type="text" class="form-control" name="address" required="requires" value="{{ old('address', $entite->address) }}">
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Code postal</label>
                                    <input type="text" class="form-control" required="required" name="zipcode" value="{{ old('zipcode', $entite->zipcode) }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Ville</label>
                                    <input type="text" class="form-control" required="required" name="city" value="{{ old('city', $entite->city) }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group form-group-default required">
                                    <label>Pays</label>
                                    <input type="text" class="form-control" required="required" name="country" value="{{ old('country', $entite->country) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-group-default required">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required="required" name="email" value="{{ old('email', $entite->email) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-group-default">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $entite->phone) }}">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-complete" type="submit">Editer l'entité</button>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/users/validation.js"></script>
@endsection
