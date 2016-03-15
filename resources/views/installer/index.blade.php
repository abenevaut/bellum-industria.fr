@extends('installer.layouts.default')

@section('content')
    {!! Form::open(array('route' => 'installer.store', 'class' => 'forms')) !!}
    <div class="callout callout-info">
        <h4>{{ trans('installer.intro_title') }}</h4>

        <p>{!! trans('installer.intro_descritpion') !!}</p>
    </div>
    <div class="callout callout-warning">
        <p>{!! trans('installer.intro_important_note') !!}</p>
    </div>



    @if (count($errors) > 0)
        <div class="callout callout-danger">
            <h4>Erreur{{ count($errors) > 1 ? 's' : '' }}</h4>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif




    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('installer.field_section_information') }}</h3>
        </div>
        <div class="box-body">
            <div class="form-group form-group-lg p-b-60">
                <label for="app_url" class="col-sm-3 control-label">
                    {{ trans('installer.field_app_url_title') }}<br/>
                    <span class="instruction">{{ trans('installer.field_app_url_instruction') }}</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="app_url"
                           placeholder="{{ trans('installer.field_app_url_placeholder') }}"
                           name="APP_URL" value="{{ old('APP_URL') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="first_name" class="col-sm-3 control-label">
                    {{ trans('installer.field_first_name_title') }}<br/>
                    <span class="instruction">{{ trans('installer.field_first_name_instruction') }}</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="first_name"
                           placeholder="{{ trans('installer.field_first_name_placeholder') }}"
                           name="first_name" value="{{ old('first_name') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">

                <label for="last_name" class="col-sm-3 control-label">

                    {{ trans('installer.field_last_name_title') }}<br/>
                    <span class="instruction">{{ trans('installer.field_last_name_instruction') }}</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="last_name"
                           placeholder="{{ trans('installer.field_last_name_placeholder') }}" name="last_name"
                           value="{{ old('last_name') }}">
                </div>
            </div>

            <div class="form-group form-group-lg p-b-60">

                <label for="email" class="col-sm-3 control-label">

                    {{ trans('installer.field_email_title') }}<br/>
                    <span class="instruction">{{ trans('installer.field_email_instruction') }}</span>
                </label>

                <div class="col-sm-9">
                    <input type="email" class="form-control input-lg" id="email" placeholder="{{ trans('installer.field_email_placeholder') }}"
                           name="email" value="{{ old('email') }}">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="password" class="col-sm-3 control-label">

                    {{ trans('installer.field_password_title') }}<br/>
                    <span class="instruction">{{ trans('installer.field_password_instruction') }}</span>
                </label>

                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="password" placeholder="{{ trans('installer.field_password_placeholder') }}"
                           name="password">
                </div>


            </div>


        </div>

    </div>

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('installer.field_section_database') }}</h3>
        </div>

        <div class="box-body">


            <div class="form-group form-group-lg p-b-60">

                <label for="db_host" class="col-sm-3 control-label">

                    Your database hostname<br/>
                    <span class="instruction">The database hostname</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_host" placeholder="localhost"
                           name="DB_HOST" value="{{ old('DB_HOST') }}">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_database" class="col-sm-3 control-label">

                    Your database name<br/>
                    <span class="instruction">The database name</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_database" placeholder="my_database"
                           name="DB_DATABASE" value="{{ old('DB_DATABASE') }}">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_username" class="col-sm-3 control-label">

                    Your database username<br/>
                    <span class="instruction">The database username</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_username" placeholder="root"
                           name="DB_USERNAME" value="{{ old('DB_USERNAME') }}">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_password" class="col-sm-3 control-label">

                    Your database password<br/>
                    <span class="instruction">The database password</span>
                </label>

                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="db_password" placeholder="password"
                           name="DB_PASSWORD">
                </div>


            </div>


        </div>

    </div>
    <div class="box box-primary">
        <div class="box-footer">
            <a href="{{ url('installer') }}" class="btn btn-default">{{ trans('installer.btn_cancel') }}</a>
            <button type="submit" class="btn btn-info pull-right">{{ trans('installer.btn_install') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection