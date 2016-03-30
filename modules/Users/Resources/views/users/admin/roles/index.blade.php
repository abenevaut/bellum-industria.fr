@extends('adminlte::layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('users::roles.index.title') }}</h3>

                    <div class="box-tools hidden-xs pull-right">
                        <a href="{{ url('admin/roles/create') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-user-plus"></i> {{ trans('users::roles.index.btn.add_role') }}
                        </a>
                    </div>
                </div>
                @if ($roles->count())
                    <div class="box-body no-padding">

                        <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th class="cell-center">{!! trans('users::roles.index.tab.name') !!}</th>
                                <th class="cell-center">{!! trans('users::roles.index.tab.description') !!}</th>
                                <th class="hidden-xs cell-center" width="20%">{{ trans('global.actions') }}</th>
                            </tr>
                            @foreach ($roles as $role)
                                <tr>
                                    <td class="cell-center">
                                        {!! trans($role->display_name) !!}
                                    </td>
                                    <td class="cell-center">
                                        {!! trans($role->description) !!}
                                    </td>
                                    <td class="hidden-xs cell-center">

                                        @if ($role->unchangeable)
                                            No action
                                        @else
                                            <a href="{{ url('admin/roles/' . $role->id . '/edit') }}"
                                               class="btn btn-warning btn-flat btn-mobile">
                                                <i class="fa fa-pencil"></i> {{ trans('global.edit') }}
                                            </a>
                                            <button type="button" class="btn btn-danger btn-flat btn-mobile"
                                                    data-toggle="modal"
                                                    data-target="#delete_user_{{ $role->id }}"><i
                                                        class="fa fa-trash"></i>
                                                {{ trans('global.remove') }}
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            <a href="{{ URL::previous() }}" class="btn btn-default btn-flat">
                                <i class="fa fa-caret-left"></i> {{ trans('users::roles.index.btn.back_user_panel') }}
                            </a>
                        </div>
                        {!! with(new \Modules\Users\Resources\IndexAdminPagination($roles))->render() !!}
                    </div>
                @else
                    <div class="box-body">

                        <div class="overlay hidden">
                            <i class="fa fa-refresh fa-spin"></i>
                        </div>

                        <div class="callout callout-info" role="alert">
                            <h4><i class="icon fa fa-info"></i> {{ trans('users::roles.index.no_data.title') }}
                            </h4>

                            <p>{{ trans('users::roles.index.no_data.description') }}</p>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="pull-left">
                            <a href="{{ URL::previous() }}" class="btn btn-default btn-flat">
                                <i class="fa fa-caret-left"></i> {{ trans('global.back') }}
                            </a>
                        </div>
                    </div>
                @endif
                @foreach ($roles as $role)
                    <div class="modal modal-danger" id="delete_user_{{ $role->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title">{{ trans('global.attention') }}</h4>
                                </div>
                                <div class="modal-body">
                                    <p>{{ trans('users::roles.index.delete.question') }} {{ $role->name }} ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                                        {{ trans('users::roles.index.btn.cancel_delete') }}
                                    </button>
                                    {!! Form::open(['route' => ['admin.roles.destroy', $role->id], 'method' => 'delete']) !!}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> {{ trans('users::roles.index.btn.valid_delete') }}
                                    </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
