@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/contacts') }}">Retour</a>
                    </div>
                    <div class="panel-title panel-title-adjustement">
                        &nbsp;&nbsp;&nbsp;Ajouter un client
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
                    {!! Form::open(array('route' => 'admin.clients.store', 'class' => 'forms')) !!}
                        <div class="form-group form-group-default required">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="last_name" required="required" value="{{ $contact->last_name }}">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Prénom</label>
                            <input type="text" class="form-control" name="first_name" required="required" value="{{ $contact->first_name }}">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Courriel</label>
                            <input type="email" class="form-control" name="email" required="required" value="{{ $contact->email }}">
                        </div>
                        <button class="btn btn-complete" type="submit">Ajouter le client</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/contacts/create_user.js"></script>
@endsection
