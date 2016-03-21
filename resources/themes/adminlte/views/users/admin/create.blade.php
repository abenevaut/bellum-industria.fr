@extends('adminlte::layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-header with-border">

                    <h3 class="box-title">Edit user</h3>

                </div>
                <!-- /.box-header -->

                {!! Form::open(array('route' => 'admin.users.store', 'class' => 'forms')) !!}

                <div class="box-body">

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


                    <div class="form-group form-group-default required">
                        <label>Nom</label>
                        <input type="text" class="form-control" name="last_name" required="required"
                               value="{{ old('last_name') }}" placeholder="Nom de l'utilisateur">
                    </div>
                    <div class="form-group form-group-default required">
                        <label>Prénom</label>
                        <input type="text" class="form-control" name="first_name" required="required"
                               value="{{ old('first_name') }}" placeholder="Prénom de l'utilisateur">
                    </div>
                    <div class="form-group form-group-default required">
                        <label>Courriel</label>
                        <input type="email" class="form-control" name="email" required="required"
                               value="{{ old('email') }}" placeholder="Courriel de l'utilisateur">
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
                                               data-init-plugin="switchery" value="{{ $role->id }}"/>
                                        </span>
                            </div>
                        @endforeach
                    </div>


                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">

                    <button class="btn btn-complete" type="submit">Ajouter l'utilisateur</button>


                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>



@stop