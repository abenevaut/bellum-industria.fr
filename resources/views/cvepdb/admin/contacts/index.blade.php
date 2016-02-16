@extends('cvepdb.admin.layouts.default-white')

@section('content')

    <div class="panel panel-transparent">
        <div class="panel-heading">
            <div class="panel-title panel-title-adjustement">
                Prises de contacts
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <div id="condensedTable_wrapper" class="dataTables_wrapper form-inline no-footer">
                    @if ($contacts->count())
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
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="font-montserrat all-caps fs-12 col-lg-2">
                                        <a class="btnToggleSlideUpSize" data-modal_id="{{ $contact->id }}" href="javascript:void(0);">
                                            {{ $contact->first_name }} {{ $contact->last_name }}
                                        </a>
                                    </td>
                                    <td class="font-montserrat all-caps fs-12 col-lg-3">
                                        <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                    </td>
                                    <td class="col-lg-4">
                                        <a class="btn btn-info btn-cons" href="{{ url('admin/contacts/createclient') }}/{{ $contact->id }}">
                                            <i class="fa fa-plus"></i> Créer le client
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info" role="alert">
                            Il n'y a aucune prise de contact
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modals')
    @foreach ($contacts as $contact)
        <div class="modal fade slide-up disable-scroll" id="modalSlideUp-{{ $contact->id  }}" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content-wrapper">
                    <div class="modal-content">
                        <div class="modal-header clearfix text-left">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                            <h5>{{ $contact->first_name }} {{ $contact->last_name }} <small>({{ $contact->created_at }})</small></h5>
                            <p class="p-b-10">{{ $contact->subject }}</p>
                        </div>
                        <div class="modal-body">
                            <p class="p-b-10">{{ $contact->message }}</p>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="p-t-20 clearfix p-l-10 p-r-10">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="col-sm-4 m-t-10 sm-m-t-10">
                                    <a class="btn btn-primary btn-block m-t-5" href="mailto:{{ $contact->email }}">Repondre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('jsfooter')
    <script src="/assets/js/admin/contacts/index.js"></script>

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