@extends('lumen::layouts.default')

@section('title')
    {{ $user->full_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">




                <div class="page-header" id="banner" style="min-height: 150px;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1>My profile</h1>
                            <p class="lead">
                                {{ $user->full_name }}

                                @if ($user->roles->count())
                                <small style="font-size:12px;;">
                                    (<b>Roles</b>
                                    @foreach ($user->roles as $role) &#8226; <a href="javascript:void(0);" title="{!! trans($role->description) !!}">
                                        {!! trans($role->display_name) !!}</a>@endforeach)
                                </small>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>


                <table class="table table-bordered">
                    <tbody>
                    <tr class="cell-center">
                        <th>
                            <b>Email</b>
                        </th>
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

                <div class="pull-right">
                    <a href="{{ url('users/edit-my-profile') }}" class="btn btn-info">Edit</a>
                </div>


            </div>
        </div>
    </div>
@endsection
