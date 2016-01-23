@extends('cvepdb.admin.layouts.default')

@section('content')


    <div class="container-fluid container-fixed-lg bg-white">
        <!-- START PANEL -->
        <div class="panel panel-transparent">
            <div class="panel-heading">
                <div class="panel-title">
                    Bills
                </div>
                <div class="btn-group pull-right m-b-10">
                    <a class="btn btn-default" href="{{ url('admin/bankaccounts/create') }}">Add new</a>
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings</a>
                        </li>
                        <li><a href="#">Help</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div id="basicTable_wrapper" class="dataTables_wrapper form-inline no-footer">

                        <table class="table table-hover dataTable no-footer" id="basicTable" role="grid">
                            <thead>
                            <tr role="row">

                                <th style="width:1%" class="sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                    <button class="btn"><i class="pg-trash"></i></button>
                                </th>

                                <th style="width: 20%;" class="sorting_asc" tabindex="0" aria-controls="basicTable"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Name: activate to sort column ascending">Reference
                                </th>

                                <th style="width: 20%;" class="sorting" tabindex="0" aria-controls="basicTable"
                                    rowspan="1" colspan="1" aria-label="Places: activate to sort column ascending">IBAN
                                </th>

                                <th style="width: 20%;" class="sorting" tabindex="0" aria-controls="basicTable"
                                    rowspan="1" colspan="1" aria-label="Activities: activate to sort column ascending">
                                    BIC
                                </th>

                                <th style="width: 24%;" rowspan="1" colspan="1">Actions</th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach ($bankaccounts as $bankaccount)

                                <tr role="row" class="odd">
                                    <td class="v-align-middle">
                                        <div class="checkbox ">
                                            <input type="checkbox" value="{{ $bankaccount->id }}"
                                                   id="checkbox{{ $bankaccount->id }}">
                                            <label for="checkbox{{ $bankaccount->id }}"></label>
                                        </div>
                                    </td>
                                    <td class="v-align-middle sorting_1">
                                        <p>{{ $bankaccount->reference }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $bankaccount->iban }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <p>{{ $bankaccount->bic }}</p>
                                    </td>
                                    <td class="v-align-middle">
                                        <button class="btn btn-complete btn-cons">Edit</button>
                                        <button class="btn btn-complete btn-cons">Delete</button>
                                    </td>
                                </tr>

                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PANEL -->
    </div>
    {{--{!! $entites->render() !!}--}}


@endsection
