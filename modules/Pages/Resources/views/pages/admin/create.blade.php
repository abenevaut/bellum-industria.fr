@extends('adminlte::layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <div class="box-header with-border">

                    <h3 class="box-title">Add new page</h3>

                </div>
                <!-- /.box-header -->

                {!! Form::open(array('route' => 'admin.pages.store', 'class' => 'forms')) !!}

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
                        <label>Page title</label>
                        <input type="text" class="form-control" name="title" required="required"
                               value="{{ old('title') }}" placeholder="Page title">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Is home ?</label>
                        <input type="text" class="form-control" name="is_home" required="required"
                               value="{{ old('is_home') }}" placeholder="is home">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Page content</label>

                        <textarea name="content" id="content" class="js-call-tinymce form-control" cols="30" rows="10" required="required">
                            {{ old('content') }}
                        </textarea>

                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">

                    <button class="btn btn-complete" type="submit">Ajouter la page</button>


                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>



@stop