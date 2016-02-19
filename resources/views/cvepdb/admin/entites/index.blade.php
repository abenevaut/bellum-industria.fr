@extends('cvepdb.admin.layouts.default-white')

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Entreprises
            </div>
            <div class="btn-group pull-right m-b-10">
                <a class="btn btn-info btn-cons" href="{{ url('admin/entites/create') }}">
                    <i class="fa fa-plus"></i> Add new
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                    @if ($entites->count())
                        <table class="table table-hover table-condensed dataTable no-footer" id="condensedTable"
                               role="grid">
                            <thead>
                            <tr role="row">
                                <th width="25%">Name</th>
                                <th width="50%">SIRET</th>
                                <th width="25%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($entites as $entite)

                                <tr role="row" class="odd">
                                    <td class="v-align-middle font-montserrat all-caps fs-12 ">
                                        <p><a href="{{ url('admin/entites/' . $entite->id) }}">{{ $entite->name }}</a></p>
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 v-align-middle">
                                        {{ $entite->siret }}
                                    </td>
                                    <td class="v-align-middle">
                                        <a class="btn btn-info btn-cons" href="{{ url('admin/entites/' . $entite->id . '/edit') }}">
                                            <i class="fa fa-paste"></i> <span class="bold">Edit</span>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
{{--                        {!! $users->render() !!}--}}
                    @else
                        <div class="alert alert-info" role="alert">
                            Il n'y a aucun entreprise
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
