@extends('adminlte::layouts.default')

@section('head')
    <link rel="stylesheet" href="{{ asset('themes/adminlte/bower/iCheck/skins/square/blue.css') }}">
@endsection

@section('js')
    <script src="{{ asset('themes/adminlte/bower/iCheck/icheck.min.js') }}"></script>
    <script>$(function(){$('input[type="checkbox"]').iCheck({checkboxClass:'icheckbox_square-blue',radioClass:'iradio_square-blue',increaseArea:'20%'});});</script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ URL::previous() }}" class="btn btn-default btn-flat btn-xs">
                        <i class="fa fa-caret-left"></i> {{ trans('global.back') }}
                    </a>
                    <h3 class="box-title">{{ trans('users::admin.edit.title') }}</h3>
                </div>
                {!! Form::open(array('route' => ['admin.users.update', $user->id], 'class' => 'forms', 'method' => 'PUT')) !!}
                <div class="box-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <p class="pull-left">
                                {{ count($errors) > 1 ? trans('global.errors') : trans('global.error') }}
                            </p>
                            <div class="clearfix"></div>
                            @foreach ($errors->all() as $error)
                                <br>
                                <p>{{ trans($error) }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group form-group-default required">
                        <label>{{ trans('global.last_name') }}</label>
                        <input type="text" class="form-control" name="last_name" required="required"
                               value="{{ old('last_name', $user->last_name) }}" placeholder="{{ trans('global.last_name') }}">
                    </div>
                    <div class="form-group form-group-default required">
                        <label>{{ trans('global.first_name') }}</label>
                        <input type="text" class="form-control" name="first_name" required="required"
                               value="{{ old('first_name', $user->first_name) }}" placeholder="{{ trans('global.first_name') }}">
                    </div>
                    <div class="form-group form-group-default required">
                        <label>{{ trans('global.email') }}</label>
                        <input type="email" class="form-control" name="email" required="required"
                               value="{{ old('email', $user->email) }}" placeholder="{{ trans('global.email') }}">
                    </div>
                    <div class="form-group form-group-default required">
                        <label>{{ trans('global.roles') }}</label>
                        <br>
                        @foreach ($roles as $role)
                            <div class="form-group form-group-default input-group">
                                <label>
                                    <input type="checkbox" name="user_role_id[]"
                                           data-init-plugin="switchery" value="{{ $role->id }}"
                                           @if ($user->roles->contains($role->id))
                                           checked="checked"
                                           @endif
                                            />
                                    {{ trans($role->display_name) }} :
                                    <small>{{ trans($role->description) }}</small>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <div class="pull-left">
                        <a href="{{ URL::previous() }}" class="btn btn-default btn-flat">
                            <i class="fa fa-caret-left"></i> {{ trans('global.back') }}
                        </a>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-flat" type="submit">
                            <i class="fa fa-pencil"></i> {{ trans('users::admin.edit.btn.edit_user') }}
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection