@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">
                Permissions
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-primary btn-cons" href="{{ url('admin/permissions/create') }}">
                    <i class="fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">

                    @if ($permissions->count())

                        <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                               role="grid">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc">Name</th>
                                <th class="sorting_asc">Display Name</th>
                                <th>Number of roles use it</th>
                                <th>Description</th>
                                <th>Permissions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        {{ $permission->name }}
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        {{ $permission->display_name }}
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        {{ $permission->roles->count() }}
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        {{ $permission->description }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $permissions->render() !!}

                    @else

                        <div class="alert alert-info" role="alert">
                            {{--<button class="close" data-dismiss="alert"></button>--}}
                            Il n'y a aucune donnée
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
