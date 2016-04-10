@extends('adminlte::layouts.default')

@section('content')

    <div class="row">

        <div class="col-lg-3">

            <div class="box box-solid">

                <div class="overlay hidden">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

                <div class="box-header with-border">
                    <h4 class="box-title">Directories</h4>
                </div>
                <div class="box-body">


                </div>
                <div class="box-footer with-border">

                    root / Dir

                </div>
            </div>

        </div>
        <div class="col-lg-9">
            <div class="box box-default">

                <div class="overlay hidden">
                    <i class="fa fa-refresh fa-spin"></i>
                </div>

                <div class="box-header with-border">

                    <div class="js-action-default">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> New folder
                        </button>
                    </div>

                    <div class="js-action-folder hidden">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-folder-open"></i> Open
                            folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i>
                            Rename folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-info"></i> Folder details
                        </button>
                    </div>

                    <div class="js-action-file hidden">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i>
                            Rename file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Download
                            file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-history"></i> Replace file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-info"></i> File details
                        </button>
                    </div>

                </div>
                <div class="box-body">
                    The great content goes here
                </div>
                <!-- /.box-body -->
                <div class="box-footer with-border">

                    <div class="js-action-default">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> New folder
                        </button>
                    </div>

                    <div class="js-action-folder hidden">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-folder-open"></i> Open
                            folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i>
                            Rename folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete folder
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-info"></i> Folder details
                        </button>
                    </div>

                    <div class="js-action-file hidden">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i>
                            Rename file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Download
                            file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-history"></i> Replace file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash"></i> Delete file
                        </button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-info"></i> File details
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop