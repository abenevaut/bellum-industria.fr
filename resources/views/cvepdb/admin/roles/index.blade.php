@extends('cvepdb.admin.layouts.default')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">
                Roles
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-primary btn-cons" href="{{ url('admin/roles/create') }}">
                    <i class="fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                    <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                           role="grid">
                        <thead>
                        <tr role="row">
                            <th>Name</th>
                            <th>Display Name</th>
                            <th>Number of users assigned</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="font-montserrat all-caps fs-12 col-lg-2">
                                    {{ $role->name }}
                                </td>
                                <td class="font-montserrat all-caps fs-12 col-lg-2">
                                    {{ $role->display_name }}
                                </td>
                                <td class="font-montserrat all-caps fs-12 col-lg-1">
                                    {{ $role->users->count() }}
                                </td>
                                <td class="font-montserrat all-caps fs-12 col-lg-4">
                                    {{ $role->description }}
                                </td>
                                <td class="font-montserrat all-caps fs-12 col-lg-3">

                                    <a class="btn btn-info btn-cons m-b-10" href="{{ url('admin/roles/' . $role->id . '/edit') }}">
                                        <i class="fa fa-paste"></i> <span class="bold">Edit</span>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
