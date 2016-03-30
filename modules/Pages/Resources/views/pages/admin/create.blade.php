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
                        <label>Page name</label>
                        <input type="text" class="form-control" name="last_name" required="required"
                               value="{{ old('last_name') }}" placeholder="Nom de l'utilisateur">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Content</label>

                        <textarea name="page_content" id="page_content" class="js-call-tinymce form-control" cols="30" rows="10" required="required">
                            {{ old('page_content') }}
                        </textarea>

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