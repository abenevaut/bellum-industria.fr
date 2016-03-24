@extends('adminlte::layouts.modal')

@section('title')
    {{ $user->full_name }}
@endsection

@section('content')
    <div class="box-body no-padding">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>
                    <b>ID</b>
                </td>
                <td>
                    {{ $user->id }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Last name</b>
                </td>
                <td>
                    {{ $user->last_name }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>First name</b>
                </td>
                <td>
                    {{ $user->first_name }}
                </td>
            </tr>
            <tr>
                <td>
                    <b>Email</b>
                </td>
                <td>
                    {{ $user->email }}
                </td>
            </tr>
            {{--<tr>--}}
                {{--<td>--}}
                    {{--<b>API key</b>--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{{ !is_null($user->apikey) ? $user->apikey->key : trans('users::admin.show.message.no_apikey') }}--}}
                    {{--<div class="pull-right">--}}
                        {{--<button class="btn btn-flat btn-xs"><i class="fa fa-eye"></i> show</button>--}}
                        {{--<button class="btn btn-flat btn-xs"><i class="fa fa-refresh"></i> regenerate</button>--}}
                    {{--</div>--}}
                {{--</td>--}}
            {{--</tr>--}}
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
        {{ trans('global.close') }}
    </button>
@endsection
