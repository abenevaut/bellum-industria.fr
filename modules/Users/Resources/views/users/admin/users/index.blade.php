@extends('adminlte::layouts.default')

@section('head')
    <script>
        cvepdb_config.libraries.push(
                {
                    script: {
                        CVEPDB_FILTERS_LOADED: (cvepdb_config.url_theme + cvepdb_config.script_path + 'scripts/filters.js')
                    },
                    trigger: '.js-call-filters',
                    mobile: true,
                    browser: true
                }
        );
    </script>
@endsection

@section('js')
    <script src="{{ asset('modules/users/js/admin.index.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('users::admin.index.title') }}</h3>

                    <div class="box-tools hidden-xs pull-right">
                        <a href="{{ url('admin/users/create') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-user-plus"></i> {{ trans('users::admin.index.btn.add_user') }}
                        </a>
                        <a href="{{ url('admin/roles') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-user-md"></i> {{ trans('users::admin.index.btn.roles') }}
                        </a>
                        <a href="{{ url('admin/users/export') }}" class="btn btn-box-tool">
                            <i class="fa fa-file-excel-o"></i> {{ trans('users::admin.index.btn.export') }}
                        </a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    @include('users::users.admin.users.chunks.index_filters', ['filters' => $filters])
                </div>
                <div class="js-call-filters">
                    <div id="filter-stage" style="display: block;">
                        @include('users::users.admin.users.chunks.index_tables', ['users' => $users])
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-danger" id="delete_multiple_user">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">{{ trans('global.attention') }}</h4>
                </div>
                <div class="modal-body">
                    <p>{{ trans('users::admin.index.delete_multiple.question') }} ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                        {{ trans('users::admin.index.btn.cancel_delete') }}
                    </button>
                    {!! Form::open(['route' => ['admin.users.destroy_multiple'], 'method' => 'delete', "class" => "js-users_multi_delete-container"]) !!}
                    <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i> {{ trans('users::admin.index.btn.valid_delete') }}
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
