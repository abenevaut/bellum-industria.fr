@extends('adminlte::layouts.default')

@section('head')
    <link rel="stylesheet" href="{{ asset('themes/adminlte/bower/dropzone/dist/min/dropzone.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('themes/adminlte/bower/dropzone/dist/min/dropzone.min.js') }}"></script>
    <!-- 1. Load libraries -->
    <!-- IE required polyfills (from CDN), in this exact order -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.0/es6-shim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/systemjs/0.19.16/system-polyfills.js"></script>
    <script src="https://npmcdn.com/angular2/es6/dev/src/testing/shims_for_IE.js"></script>
    <script src="https://code.angularjs.org/tools/system.js"></script>
    <script src="https://code.angularjs.org/tools/typescript.js"></script>
    <script src="https://code.angularjs.org/2.0.0-beta.11/angular2-polyfills.js"></script>
    <script src="https://code.angularjs.org/2.0.0-beta.11/Rx.js"></script>
    <script src="https://code.angularjs.org/2.0.0-beta.11/angular2.dev.js"></script>
    <!-- 2. Configure SystemJS -->
    <script>
        System.config({
            transpiler: 'typescript',
            typescriptOptions: { emitDecoratorMetadata: true },
            packages: {'/themes/adminlte/js/files': {defaultExtension: 'ts'}}
        });
        System.import('/themes/adminlte/js/files/main')
                .then(null, console.error.bind(console));
    </script>
@endsection

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
                <div class="box-body" style="overflow: hidden; overflow-x: scroll;">


                    <ul>
                        @foreach ($folders as $folder)

                            <li>
                                <a href="javascript:void(0);" class="js-" data-folder_id="{{ $folder->id }}">{{ $folder->name }}</a>
                            </li>

                        @endforeach
                    </ul>



                </div>
                <div class="box-footer with-border">

                    <span class="js-files-current_path">/</span>

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








                    <hello-world>Loading...</hello-world>












                    <form action="file-upload"
                          class="dropzone"
                          id="my-awesome-dropzone"></form>




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