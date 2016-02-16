@extends('cvepdb.admin.layouts.default-white')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Roles
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-info btn-cons" href="{{ url('admin/roles/create') }}">
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
                            <th width="80%">Name</th>
                            <th width="20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="font-montserrat all-caps fs-12 col-lg-2">
                                    <a class="btnToggleSlideUpSize" data-modal_id="{{ $role->id }}" href="javascript:void(0);">
                                        {{ $role->display_name }}
                                    </a>
                                </td>
                                <td class="font-montserrat all-caps fs-12 col-lg-3">
                                    <a class="btn btn-info btn-cons" href="{{ url('admin/roles/' . $role->id . '/edit') }}">
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

@section('modals')
    @foreach ($roles as $role)
        <div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $role->id  }}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                        <div class="modal-header clearfix text-left">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                            <h5>{{ $role->display_name }} <small>(reference : {{ $role->name }})</small></h5>
                            <p class="p-b-10">{{ $role->description }}</p>
                        </div>
                        <div class="modal-body">
                            <strong>Permissions :</strong>
                            @if ($role->permissions->count())
                            <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                                   role="grid">
                                <tbody>
                                @foreach ($role->permissions as $permission)
                                    <tr>
                                        <td class="font-montserrat all-caps fs-12 col-lg-2" style="width:20%;">
                                            <i class="fa-check-square-o"></i>&nbsp;{{ $permission->display_name }}
                                        </td>
                                        <td class="font-montserrat fs-12 col-lg-3" style="width:80%;">
                                            {{ $permission->description }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Il n'y a aucune permission
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('jsfooter')
    <script>
        $('.btnToggleSlideUpSize').click(function() {
            var id = $(this).attr('data-modal_id');
            var modalElem = $('#modalSlideUp-' + id);

            modalElem.modal('show')
                    .children('.modal-dialog')
                    .removeClass('modal-lg');
        });
    </script>
@endsection