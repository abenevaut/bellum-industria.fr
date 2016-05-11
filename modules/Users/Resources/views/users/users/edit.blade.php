@extends('lumen::layouts.default')

@section('head')
    <style>

        .select2-container--bootstrap .select2-selection {
            display: block !important;
            width: 100% !important;
            height: 38px !important;
            padding: 7px 12px !important;
            font-size: 14px !important;
            line-height: 1.42857143 !important;
            color: #555555 !important;
            background-color: #ffffff !important;
            background-image: none !important;
            border: 1px solid #e7e7e7 !important;
            border-radius: 4px !important;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075) !important;
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075) !important;
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s !important;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s !important;
        }

    </style>
@endsection

@section('js')
    <script>
        (function ($, W, D) {
            $(D).bind('ready', function() {

                $('select[name^="address["][name$="][country]"]').select2({
                    theme: "bootstrap",
                    width: '100%'
                });

                $('select[name^="address["][name$="][state]"]').select2({
                    theme: "bootstrap",
                    width: '100%'
                });

            });
        })(jQuery, window, document);
    </script>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <div class="page-header" id="banner" style="min-height: 150px;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h1 class="box-title">{{ trans('users::admin.edit.title') }}</h1>
                            <p class="lead">{{ $user->full_name }}

                                @if ($user->roles->count())
                                    <small style="font-size:12px;;">
                                        (<b>Roles</b>
                                        @foreach ($user->roles as $role) &#8226; <a href="javascript:void(0);" title="{!! trans($role->description) !!}">
                                            {!! trans($role->display_name) !!}</a>@endforeach)
                                    </small>
                                @endif</p>
                        </div>
                    </div>
                </div>

                {!! Form::open(array('route' => ['users.update-my-profile'], 'class' => 'forms js-call-form_validation', 'method' => 'PUT')) !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <p class="pull-left">
                            {{ count($errors) > 1 ? trans('global.errors') : trans('global.error') }}
                        </p>

                        <div class="clearfix"></div>
                        @foreach ($errors->all() as $error)
                            <br>
                            <p>{{ trans($error) }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="form-group form-group-default">
                    <label>{{ trans('global.last_name') }}</label>
                    <input type="text" class="form-control" name="last_name" required="required"
                           value="{{ old('last_name', $user->last_name) }}"
                           placeholder="{{ trans('global.last_name') }}">
                </div>
                <div class="form-group form-group-default">
                    <label>{{ trans('global.first_name') }}</label>
                    <input type="text" class="form-control" name="first_name" required="required"
                           value="{{ old('first_name', $user->first_name) }}"
                           placeholder="{{ trans('global.first_name') }}">
                </div>
                <div class="form-group form-group-default">
                    <label>{{ trans('global.email') }}</label>
                    <input type="text" class="form-control" name="email" required="required"
                           value="{{ old('email', $user->email) }}"
                           placeholder="{{ trans('global.email') }}">
                </div>

                <hr>


                <div>
                    <ul class="nav nav-tabs">
                        @foreach (\CVEPDB\Settings\Facades\Settings::get('addresses.flags') as $type)
                            @if ($type == 'primary')
                                <li class="active"><a href="#primary" data-toggle="tab" aria-expanded="true">Primary address</a></li>
                            @elseif ($type == 'billing')
                                <li class=""><a href="#billing" data-toggle="tab" aria-expanded="false">Billing address</a></li>
                            @elseif ($type == 'shipping')
                                <li class=""><a href="#shipping" data-toggle="tab" aria-expanded="false">Shipping address</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        @foreach (\CVEPDB\Settings\Facades\Settings::get('addresses.flags') as $type)

                            {{-- xABE Todo : Change this --}}
                            <?php $current_address = null; ?>
                            @foreach ($user->addresses as $address)
                                @if ($type == 'primary' && $address->is_primary)
                                    <?php $current_address = $address; ?>
                                @elseif ($type == 'billing' && $address->is_billing)
                                    <?php $current_address = $address; ?>
                                @elseif ($type == 'shipping' && $address->is_shipping)
                                    <?php $current_address = $address; ?>
                                @endif
                            @endforeach
                            {{-- !xABE Todo : Change this --}}

                            <div class="tab-pane fade
                                @if ($type == 'primary')
                                    active in
                                @endif
                                " id="{{ $type }}">

                                @include('users::users.admin.users.chunks.form_addresses_fields', ['type' => $type, 'address' => $current_address])

                            </div>
                        @endforeach
                    </div>
                    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
                </div>

                <hr>

                <div class="clearfix">
                    <div class="pull-left">
                        <a href="{{ URL::previous() }}" class="btn btn-default">
                            <i class="fa fa-caret-left"></i> {{ trans('global.back') }}
                        </a>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-info" type="submit">
                            <i class="fa fa-pencil"></i> {{ trans('users::admin.edit.btn.edit_user') }}
                        </button>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection