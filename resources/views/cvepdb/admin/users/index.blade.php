@extends('cvepdb.admin.layouts.default-white')

@section('content')

    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Utilisateurs
            </div>
            <div class="clearfix"></div>
            <div class="btn-group pull-right m-b-10">

                <a class="btn btn-primary btn-cons" href="{{ url('admin/users/create') }}">
                    <i class="fa fa-plus"></i> Add new
                </a>
                {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">--}}
                {{--<span class="caret"></span>--}}
                {{--</button>--}}
                {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="#">Settings</a>--}}
                {{--</li>--}}
                {{--<li><a href="#">Help</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            </div>
            <div class="clearfix"></div>

            <div class="pull-right">
                <div class="col-xs-12">
                    <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                </div>
            </div>


            <div class="export-options-container pull-right"></div>
            <div class="clearfix"></div>

        </div>
        <div class="panel-body">

            @if ($users->total())

                <div class="table-responsive">
                    <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">

                        <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                            <thead>
                            <tr role="row">

                                <th style="width:1%">

                                    <button class="btn .js-table_unlock" data-toggle="tooltip" type="button" data-original-title="Je ne fais rien!">
                                        <i class="fa fa-lock"></i>
                                    </button>
                                </th>

                                <th style="width: 24%;">
                                    Nom et Prénom
                                </th>

                                <th style="width: 20%;">
                                    Courriel
                                </th>

                                <th style="width: 20%;">
                                    Rôles
                                </th>


                                <th style="width: 35%;">Actions</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($users as $user)

                                <tr role="row" class="odd">
                                    <td class="v-align-middle">
                                        <div class="checkbox ">
                                            <input type="checkbox" value="{{ $user->id }}" id="checkbox{{ $user->id }}">
                                            <label for="checkbox{{ $user->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="v-align-middle sorting_1">
                                        <p>{{ $user->first_name }} {{ $user->last_name }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p><?php $index = 0; ?>
                                            @foreach ($user->roles as $role)

                                                <?php echo $index > 0 ? ', ' : ''; ?>{{ $role->name }}

                                                <?php $index++; ?>
                                            @endforeach</p>
                                    </td>
                                    <td class="v-align-middle">


                                        <div class="btn-group dropdown-default">
                                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"
                                               style="width: 141px;" aria-expanded="false">
                                                <i class="fa fa-plus"></i> d'actions
                                                <span class="caret"></span> </a>
                                            <ul class="dropdown-menu " style="width: 141px;">
                                                <li>
                                                    <a href="#">Reset Password</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}">Editer</a>
                                                </li>
                                            </ul>
                                        </div>


                                        {{--<button class="btn btn-warning btn-cons">Edit</button>--}}

                                        <button data-target="#modalSlideLeft" data-toggle="modal" type="submit"
                                                class="btn btn-danger btn-cons js-user_delete_btn"
                                                data-user_id="{{ $user->id }}"
                                                data-user_name="{{ $user->first_name }} {{ $user->last_name }}">
                                            Supprimer
                                        </button>


                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                {!! $users->render() !!}
            @else
                <div class="alert alert-info" role="alert">
                    {{--<button class="close" data-dismiss="alert"></button>--}}
                    Il n'y a aucune donnée
                </div>
            @endif


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
    <script src="/assets/js/admin/users/index.js"></script>
@endsection