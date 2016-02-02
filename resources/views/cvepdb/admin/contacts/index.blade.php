@extends('cvepdb.admin.layouts.default')

@section('content')

    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title">
                Prises de contacts
            </div>
            <div class="tools">
                <a class="collapse" href="javascript:;"></a>
                <a class="config" data-toggle="modal" href="#grid-config"></a>
                <a class="reload" href="javascript:;"></a>
                <a class="remove" href="javascript:;"></a>
            </div>
        </div>
        <div class="panel-body">

            @if ($contacts->total())

                <div class="table-responsive">
                    <div id="stripedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                        <table class="table table-striped dataTable no-footer" id="stripedTable" role="grid">
                            <thead>
                            <tr role="row">
                                <th style="width:30%" class="sorting" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending">
                                    NOM ET PRENOM
                                </th>
                                <th style="width: 35%;" class="sorting" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Places: activate to sort column ascending">
                                    COURRIEL
                                </th>
                                <th style="width: 25%;" class="sorting_desc" tabindex="0" aria-controls="stripedTable"
                                    rowspan="1" colspan="1" aria-label="Activities: activate to sort column ascending"
                                    aria-sort="descending">
                                    SUJET
                                </th>
                                <th style="width: 15%;" rowspan="1" colspan="1">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="font-montserrat all-caps fs-12 col-lg-2">
                                        {{ $contact->first_name }} {{ $contact->last_name }}
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        {{ $contact->subject }}
                                    </td>
                                    <td class="col-lg-4">
                                        <a class="btn btn-complete btn-cons" href="{{ url('admin/contacts/createclient') }}/{{ $contact->id }}">Créer le client</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $contacts->render() !!}
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