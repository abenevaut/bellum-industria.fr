@extends('cvepdb.admin.layouts.default-white')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Utilisateurs
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-info btn-cons" href="{{ url('admin/users/create') }}">
                    <i class="fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                    @if ($users->count())
                        <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                               role="grid">
                            <thead>
                            <tr role="row">
                                <th width="25%">Name</th>
                                <th width="50%">Email</th>
                                <th width="25%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a class="btnToggleSlideUpSize" data-modal_id="{{ $user->id }}" href="javascript:void(0);">
                                            <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                        </a>
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a href="mailto:{{ $user->email }}">
                                            <p>{{ $user->email }}</p>
                                        </a>
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a class="btn btn-info btn-cons" href="{{ url('admin/users/' . $user->id . '/edit') }}">
                                            <i class="fa fa-paste"></i> <span class="bold">Edit</span>
                                        </a>
                                        <button data-target="#modalSlideLeft" data-toggle="modal" type="submit"
                                                class="btn btn-danger btn-cons js-user_delete_btn"
                                                data-user_id="{{ $user->id }}"
                                                data-user_name="{{ $user->first_name }} {{ $user->last_name }}">
                                            <i class="pg-trash"></i> Supprimer
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->render() !!}
                    @else
                        <div class="alert alert-info" role="alert">
                            Il n'y a aucun utilisateur
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
                                        Vous êtes sûr de vouloir supprimer le dossier de <br>
                                        <span id="js-user_delete_name"></span> ?
                                    </span>
                                </h5>
                                <br>
                                <p>L'utilisateur n'aura plus acces a la plateforme</p>
                                <br>
                                {!! Form::open(['route' => ['admin.users.destroy', 0], 'method' => 'delete', 'id' => 'js-user_delete_form']) !!}
                                    <button type="submit" class="btn btn-danger btn-block">
                                        Supprimer
                                    </button>
                                {!! Form::close() !!}
                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($users as $user)
        <div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $user->id  }}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                        <div class="modal-header clearfix text-left">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                            <h5>{{ $user->first_name }} {{ $user->last_name }} <small>({{ $user->email }})</small></h5>
                            <div class="row">
                                <a class="btn btn-cons" href="mailto:{{ $user->email }}">
                                    <i class="pg-mail"></i> Mail
                                </a>
                            </div>
                        </div>
                        <div class="modal-body" style="padding-top:20px;">
                            <strong>Rôles :</strong>
                            @if ($user->roles->count())
                                <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                                       role="grid">
                                    <tbody>
                                    @foreach ($user->roles as $role)
                                        <tr>
                                            <td class="font-montserrat all-caps fs-12 col-lg-2" style="width:30%;">
                                                <i class="fa fa-check-square-o"></i>&nbsp;{{ $role->display_name }}
                                            </td>
                                            <td class="font-montserrat fs-12 col-lg-3" style="width:70%;">
                                                {{ $role->description }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info" role="alert">
                                    L'utilisateur n'appartient a aucun role sur la plateforme
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
    <script src="/assets/js/admin/users/index.js"></script>
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