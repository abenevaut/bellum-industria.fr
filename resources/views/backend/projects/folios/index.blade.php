@extends('backend.layouts.secondary')

@section('breadcrumbs')
    @include('backend.partials.default.breadcrumbs', ['breadcrumbs' => [
        route('backend.folios.index') => trans('folios.title'),
    ]])
@endsection

@section('sidebar')
    <a href="{{ route('backend.folios.create') }}" class="btn btn-primary btn-block m-b-30">
        <i class="fa fa-plus"></i> {{ trans('global.add') }}
    </a>
    <p class="menu-title all-caps">{{ trans('folios.index_sidebard.submenu_title') }}</p>
    <ul class="main-menu">
        {{--<li class="">--}}
            {{--<a href="{{ route('backend.folios.export') }}">--}}
                {{--<span class="title"><i class="fa fa-file-excel-o"></i> {{ trans('global.export') }}</span>--}}
            {{--</a>--}}
        {{--</li>--}}
    </ul>
@endsection

@section('content')
    <div class="panel panel-transparent">
        <div class="panel-heading ">
            <div class="panel-title"><i class="fa fa-file-code-o"></i> {!! trans('folios.title') !!}</div>
        </div>
        <div class="panel-body">
            @if ($folios['meta']['pagination']['total'])
                <div class="table-responsive">
                    <table class="table table-hover table-condensed" id="condensedTable">
                        <thead>
                        <tr>
                            <th style="width:15%" class="text-center">{!! trans('global.id') !!}</th>
                            <th style="width:5%" class="text-center">
                                <i class="fa fa-user-circle-o" title="{{ trans('leads.transformed_user') }}"></i>
                            </th>
                            <th style="width:25%" class="text-center">{!! trans('global.civility_name') !!}</th>
                            <th style="width:25%" class="text-center">{!! trans('global.email') !!}</th>
                            <th style="width:30%" class="text-center">{!! trans('global.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach ($folios['data'] as $project)--}}
                            {{--<tr>--}}
                                {{--<td class="v-align-middle semi-bold text-center">{{ $project['identifier'] }}</td>--}}
                                {{--<td class="v-align-middle semi-bold text-center">--}}
                                    {{--@if ($project['lead']['is_lead'])--}}
                                        {{--<i class="fa fa-user-circle-o"--}}
                                           {{--title="{{ trans('leads.transformed_user') }}"></i>--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                                {{--<td class="v-align-middle semi-bold text-center">--}}
                                    {{--<a href="{{ route('backend.folios.show', ['id' => $project['id']]) }}">{{ $project['civility_name'] }}</a>--}}
                                {{--</td>--}}
                                {{--<td class="v-align-middle semi-bold text-center">{{ $project['email'] }}</td>--}}
                                {{--<td class="v-align-middle text-center">--}}
                                    {{--<a href="{{ route('backend.folios.edit', ['id' => $project['id']]) }}"--}}
                                       {{--class="btn btn-primary">--}}
                                        {{--{!! trans('global.edit') !!}--}}
                                    {{--</a>--}}
                                    {{--<button data-target="#confirm_user_deletion_{{ $project['id'] }}"--}}
                                            {{--data-toggle="modal" class="btn btn-danger">--}}
                                        {{--{!! trans('global.delete') !!}--}}
                                    {{--</button>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                </div>
                <div>
                    {!! trans('folios.index_total_folios', ['total_user' => $folios['meta']['pagination']['total']]) !!}
                    {!! pages_pagination(
                        $folios['meta']['pagination']['count'],
                        $folios['meta']['pagination']['total'],
                        $folios['meta']['pagination']['current_page'],
                        $folios['meta']['pagination']['per_page']
                    ) !!}
                </div>
            @else
                <div class="box-body">
                    <div class="alert alert-info alert-dismissible alert-module">
                        <h4><i class="icon fa fa-info-circle"></i> {!! trans('folios.index_no_data_title') !!}</h4>
                        {!! trans('folios.index_no_data_description') !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{--@foreach ($folios['data'] as $project)--}}
        {{--<div class="modal fade slide-right" id="confirm_user_deletion_{{ $project['id'] }}" tabindex="-1" role="dialog"--}}
             {{--aria-hidden="true">--}}
            {{--<div class="modal-dialog modal-sm">--}}
                {{--<div class="modal-content-wrapper">--}}
                    {{--<div class="modal-content">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">--}}
                            {{--<i class="pg-close fs-14"></i>--}}
                        {{--</button>--}}
                        {{--<div class="container-xs-height full-height">--}}
                            {{--<div class="row-xs-height">--}}
                                {{--<div class="modal-body col-xs-height col-middle text-center   ">--}}
                                    {{--<h5 class="text-primary ">{{ trans('global.deletion') }}</h5>--}}
                                    {{--<p>{{ trans('folios.delete_message', ['username' => $project['civility_name']]) }}</p>--}}
                                    {{--<br>--}}
                                    {{--{!! Form::open(['route' => ['backend.folios.destroy', $project['id']], 'method' => 'DELETE']) !!}--}}
                                    {{--<button type="submit" class="btn btn-danger btn-block">--}}
                                        {{--<i class="fa fa-trash-o"></i> {!! trans('global.delete') !!}--}}
                                    {{--</button>--}}
                                    {{--{!! Form::close() !!}--}}
                                    {{--<button type="button" class="btn btn-default btn-block m-t-10" data-dismiss="modal">--}}
                                        {{--{{ trans('global.cancel') }}--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
@endsection
