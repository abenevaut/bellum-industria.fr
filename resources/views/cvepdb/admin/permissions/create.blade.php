@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/permissions') }}">Retour</a>
                    </div>
                    <div class="panel-title panel-title-adjustement">
                        &nbsp;&nbsp;&nbsp;Ajouter une permission
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <p class="pull-left">Erreur<?php if (count($errors) > 1) { echo 's'; } ?></p>
                            {{--<button class="close" data-dismiss="alert"></button>--}}
                            <div class="clearfix"></div>
                            @foreach ($errors->all() as $error)
                                <br>
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'admin.permissions.store', 'class' => 'forms')) !!}
                        <div class="form-group form-group-default required">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required="required" value="{{ old('name') }}" placeholder="Reference name">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Display name</label>
                            <input type="text" class="form-control" name="display_name" required="required" value="{{ old('display_name') }}" placeholder="Display name">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Description</label>
                            <input type="text" class="form-control" name="description" required="required" value="{{ old('description') }}" placeholder="Permission description">
                        </div>
                        <button class="btn btn-success" type="submit">Ajouter la permission</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
