@extends('adminlte::layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('users::admin.index.title') }}</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ url('admin/users/create') }}" class="btn btn-box-tool">
                            <i class="fa fa-plus"></i> {{ trans('users::admin.index.btn.add_user') }}
                        </a>
                    </div>
                </div>
                @if ($users->count())
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>{{ trans('users::admin.index.tab.full_name') }}</th>
                                <th>{{ trans('global.email') }}</th>
                                <th class="hidden-xs" width="20%">{{ trans('global.actions') }}</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->full_name }}</td>
                                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                    <td class="hidden-xs">
                                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}"
                                           class="btn btn-warning btn-flat btn-mobile">
                                            <i class="fa fa-pencil"></i> {{ trans('global.edit') }}
                                        </a>
                                        <button type="button" class="btn btn-danger btn-flat btn-mobile" data-toggle="modal"
                                                data-target="#delete_user_{{ $user->id }}"><i class="fa fa-trash"></i>
                                            {{ trans('global.remove') }}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                        <div class="no-margin pull-right">
                            {!! $users->render() !!}
                        </div>
                    </div>
                @else
                    <div class="box-body">
                        <div class="callout callout-info" role="alert">
                            <h4><i class="icon fa fa-info"></i> {{ trans('users::admin.index.no_data.title') }}</h4>
                            <p>{{ trans('users::admin.index.no_data.description') }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @foreach ($users as $user)
        <div class="modal modal-danger" id="delete_user_{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title">{{ trans('global.attention') }}</h4>
                    </div>
                    <div class="modal-body">
                        <p>{{ trans('users::admin.index.delete.question') }} {{ $user->full_name }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                            {{ trans('users::admin.index.btn.cancel_delete') }}
                        </button>
                        {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@stop
