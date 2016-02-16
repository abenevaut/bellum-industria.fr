@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/users') }}">Retour</a>
                    </div>
                    <div class="panel-title panel-title-adjustement">
                        &nbsp;&nbsp;&nbsp;Editer un utilisateur
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
                    {!! Form::open(array('route' => ['admin.users.update', $user->id], 'class' => 'forms', 'method' => 'PUT')) !!}
                        <div class="form-group form-group-default required">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="last_name" required="required" value="{{ old('last_name', $user->last_name) }}" placeholder="Nom de l'utilisateur">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Prénom</label>
                            <input type="text" class="form-control" name="first_name" required="required" value="{{ old('first_name', $user->first_name) }}" placeholder="Prénom de l'utilisateur">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Courriel</label>
                            <input type="email" class="form-control" name="email" required="required" value="{{ old('email', $user->email) }}" placeholder="Courriel de l'utilisateur">
                        </div>
                        <div class="form-group form-group-default required">
                            <label>Roles</label>
                            <br>
                            @foreach ($roles as $role)
                                <div class="form-group form-group-default input-group">
                                    <label>{{ $role->display_name }}</label>
                                    <label class="help">{{ $role->description }}</label>
                                    <span class="input-group-addon bg-transparent">
                                    <input type="checkbox" name="user_role_id[]"

                                           @if ($user->roles->contains($role->id))
                                           checked="checked"
                                           @endif

                                           data-init-plugin="switchery" value="{{ $role->id }}"/>
                                    </span>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-complete" type="submit">Editer l'utilisateur</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/users/validation.js"></script>
@endsection
