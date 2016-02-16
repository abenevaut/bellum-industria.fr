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
                                <th>Actions</th>
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
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">

                                        <a class="btn btn-info btn-cons m-b-10" href="{{ url('admin/permissions/' . $permission->id . '/edit') }}">
                                            <i class="fa fa-paste"></i> <span class="bold">Edit</span>
                                        </a>

                                        <button data-target="#modalSlideLeft" data-toggle="modal" type="submit"
                                                class="btn btn-danger btn-cons js-permission_delete_btn"
                                                data-permission_id="{{ $permission->id }}"
                                                data-permission_name="{{ $permission->display_name }}">
                                            Supprimer
                                        </button>

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


@section('modals')
    <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true"
         style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i>
                    </button>
                    <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                            <div class="modal-body col-xs-height col-middle text-center">
                                <h5 class="text-primary ">
                                    <span class="semi-bold">
                                        Vous êtes sûr de vouloir supprimer la permission : <br>
                                        <span id="js-permission_delete_name"></span> ?
                                    </span>
                                </h5>
                                <br>

                                <p>Cette permission ne sera plus disponible sur la plateforme</p>
                                <br>
                                {!! Form::open(['route' => ['admin.permissions.destroy', 0], 'method' => 'delete', 'id' => 'js-permission_delete_form']) !!}
                                <button type="submit" class="btn btn-danger btn-block">
                                    Supprimer
                                </button>
                                {!! Form::close() !!}

                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/permissions/index.js"></script>
@endsection
