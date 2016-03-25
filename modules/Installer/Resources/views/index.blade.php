@extends('installer::layouts.default')

@section('js')
    <script src="{{ asset('modules/installer/js/form_validation.js') }}"></script>
@endsection

@section('content')
    {!! Form::open(array('route' => 'installer.store', 'class' => 'forms js-call-form_validation')) !!}
    <div class="callout callout-info">
        <h4>{{ Lang::get('installer::installer.intro_title') }}</h4>

        <p>{!! Lang::get('installer::installer.intro_descritpion') !!}</p>
    </div>
    <div class="callout callout-warning">
        <p>{!! Lang::get('installer::installer.intro_important_note') !!}</p>
    </div>

    @if (count($errors) > 0)
        <div class="callout callout-danger">
            <h4>{{ count($errors) > 1 ? Lang::get('global.errors') : Lang::get('global.error') }}</h4>
            @foreach ($errors->all() as $error)
                <p>{{ Lang::get($error) }}</p>
            @endforeach
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ Lang::get('installer::installer.field_section_information') }}</h3>
        </div>
        <div class="box-body">
            <div class="form-group form-group-lg p-b-60">
                <label for="app_url" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_app_site_name_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_app_site_name_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="app_site_name"
                           placeholder="{{ Lang::get('installer::installer.field_app_site_name_placeholder') }}"
                           name="APP_SITE_NAME" value="{{ old('APP_SITE_NAME') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="app_url" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_app_site_description_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_app_site_description_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="app_site_description"
                           placeholder="{{ Lang::get('installer::installer.field_app_site_description_placeholder') }}"
                           name="APP_SITE_DESCRIPTION" value="{{ old('APP_SITE_DESCRIPTION') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="app_url" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_app_url_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_app_url_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="app_url"
                           placeholder="{{ Lang::get('installer::installer.field_app_url_placeholder') }}"
                           name="APP_URL" value="{{ old('APP_URL') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="first_name" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_first_name_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_first_name_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="first_name"
                           placeholder="{{ Lang::get('installer::installer.field_first_name_placeholder') }}"
                           name="first_name" value="{{ old('first_name') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="last_name" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_last_name_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_last_name_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="last_name"
                           placeholder="{{ Lang::get('installer::installer.field_last_name_placeholder') }}" name="last_name"
                           value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="email" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_email_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_email_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="email" class="form-control input-lg" id="email" placeholder="{{ Lang::get('installer::installer.field_email_placeholder') }}"
                           name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="password" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_password_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_password_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="password" placeholder="{{ Lang::get('installer::installer.field_password_placeholder') }}"
                           name="password">
                </div>
            </div>
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ Lang::get('installer::installer.field_section_database') }}</h3>
        </div>
        <div class="box-body">
            <div class="form-group form-group-lg p-b-60">
                <label for="db_host" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_db_host_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_db_host_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_host" placeholder="{{ Lang::get('installer::installer.field_db_host_placeholder') }}"
                           name="DB_HOST" value="{{ old('DB_HOST') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="db_database" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_db_database_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_db_database_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_database" placeholder="{{ Lang::get('installer::installer.field_db_database_placeholder') }}"
                           name="DB_DATABASE" value="{{ old('DB_DATABASE') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="db_username" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_db_username_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_db_username_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_username" placeholder="{{ Lang::get('installer::installer.field_db_username_placeholder') }}"
                           name="DB_USERNAME" value="{{ old('DB_USERNAME') }}">
                </div>
            </div>
            <div class="form-group form-group-lg p-b-60">
                <label for="db_password" class="col-sm-3 control-label">
                    {{ Lang::get('installer::installer.field_db_password_title') }}<br/>
                    <span class="instruction">{{ Lang::get('installer::installer.field_db_password_instruction') }}</span>
                </label>
                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="db_password" placeholder="{{ Lang::get('installer::installer.field_db_password_placeholder') }}"
                           name="DB_PASSWORD">
                </div>
            </div>
        </div>

    </div>
    <div class="box box-primary">
        <div class="box-footer">
            <a href="{{ url('installer') }}" class="btn btn-default">{{ Lang::get('installer::installer.btn_cancel') }}</a>
            <button type="submit" class="btn btn-info pull-right">{{ Lang::get('installer::installer.btn_install') }}</button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection