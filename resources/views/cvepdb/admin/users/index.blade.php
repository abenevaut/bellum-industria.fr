@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">
                Utilisateurs


            </div>
            <div class="clearfix"></div>
            <div class="btn-group pull-right m-b-10">

                <a class="btn btn-primary btn-cons" href="{{ url('admin/users/create') }}"><i class="fa fa-plus"></i>
                    Add new</a>
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
                                    <button class="btn .js-table_unlock"><i class="fa fa-lock"></i></button>
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
                                        {{--                                        {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}--}}

                                        <div class="btn-group dropdown-default"><a class="btn dropdown-toggle"
                                                                                   data-toggle="dropdown" href="#"
                                                                                   style="width: 141px;"
                                                                                   aria-expanded="false"> Default <span
                                                        class="caret"></span> </a>
                                            <ul class="dropdown-menu " style="width: 141px;">
                                                <li>
                                                    <a href="#">Reset Password</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('admin/users/'.$user->id.'/edit') }}">Edit</a>
                                                </li>
                                            </ul>
                                        </div>


                                        {{--<button class="btn btn-warning btn-cons">Edit</button>--}}
                                        <button class="btn btn-green btn-lg pull-right" data-toggle="modal">Generate
                                        </button>

                                        <button data-target="#modalSlideLeft" type="submit"
                                                class="btn btn-danger btn-cons">Delete
                                        </button>


                                        {{--                                        {!! Form::close() !!}--}}
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
            <!-- MODAL STICK UP SMALL ALERT -->
    <div class="modal fade slide-right" id="modalSlideLeft" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="pg-close fs-14"></i>
                    </button>
                    <div class="container-xs-height full-height">
                        <div class="row-xs-height">
                            <div class="modal-body col-xs-height col-middle text-center   ">
                                <h5 class="text-primary ">Before you <span class="semi-bold">proceed</span>, you have to
                                    login to make the necessary changes</h5>
                                <br>
                                <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Continue
                                </button>
                                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- END MODAL STICK UP SMALL ALERT -->
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/users/index.js"></script>
@endsection