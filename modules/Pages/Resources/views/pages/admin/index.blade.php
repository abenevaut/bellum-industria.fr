@extends('adminlte::layouts.default')

@section('js')
    {{--<script src="{{ asset('themes/adminlte/js/jquery.mjs.nestedSortable.js') }}"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}

            {{--$('.ui-sortable').nestedSortable({--}}
                {{--handle: 'div',--}}
                {{--items: 'li',--}}
                {{--toleranceElement: '> div',--}}
                {{--listType: 'ul'--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box box-primary">
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


                        <ul class="todo-list ui-sortable">

                            @foreach ($pages as $page)

                                <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                                    <span class="text"><a href="{{ url($page->uri) }}" target="_blank">
                                            {{ $page->title }}
                                        </a></span>
                                    {{--<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>--}}
                                    <div class="tools">


                                        <a href="{{ url('admin/pages/' . $page->id . '/edit') }}"
                                           class=""><i class="fa fa-edit"></i></a>
                                        <button type="button" class="" data-toggle="modal"
                                                data-target="#delete_user_{{ $page->id }}">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </li>


                            @endforeach

                        </ul>
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