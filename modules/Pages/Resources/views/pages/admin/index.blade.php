@extends('adminlte::layouts.default')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Pages list</h3>
                    <div class="box-tools pull-right">
                        <a href="{{ url('admin/pages/create') }}" class="btn btn-box-tool btn-box-tool-primary">
                            <i class="fa fa-plus"></i> Add page
                        </a>
                    </div>
                </div>
                @if ($pages->count())
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>

                            <tr>
                                <th>Title</th>
                                <th width="20%">Actions</th>
                            </tr>

                            @foreach ($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>

                                        <a href="{{ url('admin/pages/' . $page->id . '/edit') }}"
                                           class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i> Edit</a>
                                        {{--<button type="button" class="btn btn-danger btn-flat" data-toggle="modal"--}}
                                                {{--data-target="#delete_user_{{ $page->id }}"><i class="fa fa-trash"></i>--}}
                                            {{--Remove--}}
                                        {{--</button>--}}

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">

                        <div class="no-margin pull-right">
{{--                            {!! $pages->render() !!}--}}
                        </div>

                    </div>
                @else
                    <div class="box-body">
                        <div class="callout callout-info" role="alert">
                            <h4><i class="icon fa fa-info"></i> There is no page</h4>
                            <p>Currently no page was register in website</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop