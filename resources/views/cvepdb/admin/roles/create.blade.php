@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">

                <div class="panel-heading">

                    <div class="btn-group pull-left m-b-10">
                        <a class="btn btn-default" href="{{ url('admin/roles') }}">Retour</a>
                    </div>

                    <div class="panel-title">
                        <br/>&nbsp;&nbsp;&nbsp;Ajouter un role
                    </div>

                    {{--<div class="btn-group pull-right m-b-10">--}}
                    {{--<a class="btn btn-default" href="{{ url('admin/entites') }}">Retour</a>--}}
                    {{--</div>--}}

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>

                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <p class="pull-left">Erreur<?php if (count($errors) > 1) {
                                    echo 's';
                                } ?></p>
                            {{--<button class="close" data-dismiss="alert"></button>--}}
                            <div class="clearfix"></div>
                            @foreach ($errors->all() as $error)
                                <br>
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    <h5>
                        Nouveau rôle
                    </h5>
                    {!! Form::open(array('route' => 'admin.roles.store', 'class' => 'forms')) !!}

                    <div class="form-group form-group-default required">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required="required"
                               value="{{ old('name') }}">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Display name</label>
                        <input type="text" class="form-control" name="display_name" required="required"
                               value="{{ old('display_name') }}">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" required="required"
                               value="{{ old('description') }}">
                    </div>

                    <div class="form-group form-group-default required">
                        <label>Permissions</label>
                        <br>
                        {{--<input type="hidden" id="js-select-permission" class="full-width"--}}
                        {{--data-placeholder="Select permissions"--}}
                        {{--name="role_permission_id[]">--}}

                        {{--{!! Form::select(--}}
                        {{--'role_permission_id[]',--}}
                        {{--$permissions,--}}
                        {{--'',--}}
                        {{--array(--}}
                        {{--'id' => "js-select-permission",--}}
                        {{--'class' => 'full-width',--}}
                        {{--'data-placeholder' => "Select permissions",--}}
                        {{--'multiple' => 'multiple'--}}
                        {{--)--}}
                        {{--) !!}--}}




                        @foreach ($permissions as $permission)
                            <div class="form-group form-group-default input-group">
                                <label>{{ $permission->display_name }}</label>
                                <label class="help">{{ $permission->description }}</label>
                        <span class="input-group-addon bg-transparent">
                        <input type="checkbox" name="role_permission_id[]" data-init-plugin="switchery"
                               value="{{ $permission->id }}"/>
                        </span>
                            </div>
                        @endforeach


                    </div>


                    <button class="btn btn-primary" type="submit">Ajouter le rôle</button>

                    {!! Form::close() !!}
                </div>


            </div>

        </div>
    </div>
@endsection

{{--@section('jsfooter')--}}

{{--<script>--}}

{{--$('#js-select-permission').select2(--}}
{{--{--}}
{{--multiple: true,--}}
{{--ajax: {--}}
{{--url: "{{ url('admin/permissions/ajax/getpermissions') }}",--}}
{{--dataType: 'json',--}}
{{--type: "GET",--}}
{{--delay: 250,--}}
{{--data: function (params) {--}}
{{--return {--}}
{{--token: '{{csrf_token()}}'--}}
{{--};--}}
{{--},--}}
{{--results: function (data) {--}}
{{--return data;--}}
{{--},--}}
{{--cache: true--}}
{{--},--}}
{{--escapeMarkup: function (markup) {--}}
{{--return markup;--}}
{{--},--}}
{{--formatResult: function (item) {--}}
{{--return '<div class="row"><div class="col-sm-12"><b>' + item.name + '</b></div></div>';--}}
{{--},--}}
{{--formatSelection: function (item) {--}}
{{--return '<div class="row"><div class="col-sm-12"><b>' + item.name + '</b></div></div>'--}}
{{--}--}}
{{--}--}}
{{--).on("change", function (e) {--}}
{{--});--}}

{{--</script>--}}

{{--@endsection--}}
