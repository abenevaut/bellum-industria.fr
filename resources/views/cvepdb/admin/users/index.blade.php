@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">
                Utilisateurs
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-primary" href="{{ url('admin/users/create') }}">Add new</a>
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

        </div>
        <div class="panel-body">

            @if ($users->total())

                <div class="table-responsive">
                    <div id="stripedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <table class="table table-striped dataTable no-footer" id="stripedTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th style="width:40%" class="sorting" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">
                                    NOM ET PRENOM
                                </th>
                                <th style="width: 40%;" class="sorting" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Places: activate to sort column ascending">
                                    COURRIEL
                                </th>
                                <th style="width: 10%;" class="sorting" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Places: activate to sort column ascending">
                                    ROLE(S)
                                </th>
                                <th style="width: 10%;" rowspan="1" colspan="1">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="font-montserrat all-caps fs-12 col-lg-2">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </td>

                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>

                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <?php $index = 0; ?>
                                        @foreach ($user->roles as $role)

                                            <?php echo $index > 0 ? ', ' : ''; ?>{{ $role->name }}

                                            <?php $index++; ?>
                                        @endforeach
                                    </td>

                                    <td class="col-lg-4">

                                        <div class="btn-group dropdown-default"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#" style="width: 141px;" aria-expanded="false"> Default <span class="caret"></span> </a>
                                            <ul class="dropdown-menu " style="width: 141px;">
                                                <li>
                                                    <a href="#">Reset Password</a>
                                                </li>
                                                <li>
                                                    <a href="#">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="#">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
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

@section('jsfooter')
    <script src="/assets/js/admin/contacts/index.js"></script>
@endsection