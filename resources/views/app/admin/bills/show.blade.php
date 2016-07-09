@extends('cvepdb.admin.layouts.default')

@section('content')



    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Facture
                    </div>
                </div>
                <div class="panel-body">
                    <h5>
                        Informations sur la facture
                    </h5>





                    {{ $bill->reference }}


                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        Envoyer votre facture sous forme de document
                    </div>
                    <div class="tools">
                        <a class="collapse" href="javascript:;"></a>
                        <a class="config" data-toggle="modal" href="#grid-config"></a>
                        <a class="reload" href="javascript:;"></a>
                        <a class="remove" href="javascript:;"></a>
                    </div>
                </div>
                <div class="panel-body no-scroll no-padding">
                    {!! Form::open(['route' => ['admin.documents.ajaxbill', $bill->id], 'role' => 'form', 'files' => true, 'class' => 'dropzone no-margin dz-clickable']) !!}

                        <div class="dz-default dz-message">
                            <span>Drop files here to upload</span>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
