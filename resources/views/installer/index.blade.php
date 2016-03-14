@extends('installer.layouts.default')

@section('content')

    {!! Form::open(array('route' => 'installer.store', 'class' => 'forms')) !!}

    <div class="callout callout-info">
        <h4>Welcome in the installation process</h4>

        <p>By getting some info about your website and you web hosting, we will setup your website.</p>
    </div>

    @if (count($errors) > 0)
        <div class="callout callout-danger">
            <h4>Erreur<?php if (count($errors) > 1) { echo 's'; } ?></h4>

            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif




    <div class="box box-danger">

        <div class="box-header with-border">
            <h3 class="box-title">About your application</h3>
        </div>

        <div class="box-body">


            <div class="form-group form-group-lg p-b-60">

                <label for="app_url" class="col-sm-3 control-label">
                    Your website URL <span class="require">*</span><br/>
                    <span class="instruction">This is your web application link</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="app_url" placeholder="http://my-website.com"
                           name="APP_URL">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="first_name" class="col-sm-3 control-label">

                    Your first name <span class="require">*</span><br/>
                    <span class="instruction">The first name for the admin user account</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="first_name" placeholder="Doe"
                           name="first_name">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="last_name" class="col-sm-3 control-label">

                    Your last name <span class="require">*</span><br/>
                    <span class="instruction">The last name for the admin user account</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="last_name" placeholder="John" name="last_name">
                </div>


            </div>

            <div class="form-group form-group-lg p-b-60">

                <label for="email" class="col-sm-3 control-label">

                    Your email <span class="require">*</span><br/>
                    <span class="instruction">The email for the admin user account</span>
                </label>

                <div class="col-sm-9">
                    <input type="email" class="form-control input-lg" id="email" placeholder="john.doe@gmail.com"
                           name="email">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="password" class="col-sm-3 control-label">

                    Your password <span class="require">*</span><br/>
                    <span class="instruction">The password for the admin user account</span>
                </label>

                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="password" placeholder="password"
                           name="password">
                </div>


            </div>


        </div>

    </div>

    <div class="box box-danger">

        <div class="box-header with-border">
            <h3 class="box-title">Database information</h3>
        </div>

        <div class="box-body">


            <div class="form-group form-group-lg p-b-60">

                <label for="db_host" class="col-sm-3 control-label">

                    Your database hostname <span class="require">*</span><br/>
                    <span class="instruction">The database hostname</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_host" placeholder="localhost"
                           name="DB_HOST">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_database" class="col-sm-3 control-label">

                    Your database name <span class="require">*</span><br/>
                    <span class="instruction">The database name</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_database" placeholder="my_database"
                           name="DB_DATABASE">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_username" class="col-sm-3 control-label">

                    Your database username <span class="require">*</span><br/>
                    <span class="instruction">The database username</span>
                </label>

                <div class="col-sm-9">
                    <input type="text" class="form-control input-lg" id="db_username" placeholder="root"
                           name="DB_USERNAME">
                </div>


            </div>


            <div class="form-group form-group-lg p-b-60">

                <label for="db_password" class="col-sm-3 control-label">

                    Your database password <span class="require">*</span><br/>
                    <span class="instruction">The database password</span>
                </label>

                <div class="col-sm-9">
                    <input type="password" class="form-control input-lg" id="db_password" placeholder="password"
                           name="DB_PASSWORD">
                </div>


            </div>


        </div>

    </div>

    {{--<div class="box box-primary">--}}

        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Mails information--}}
                {{--<small>(optional)</small>--}}
            {{--</h3>--}}
        {{--</div>--}}

        {{--<div class="box-body">--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_from_email" class="col-sm-3 control-label">--}}

                    {{--Your contact email <span class="require">*</span><br/>--}}
                    {{--<span class="instruction">--}}
                        {{--The email used to send emails in your website--}}
                    {{--</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="email" class="form-control input-lg" id="mail_from_email"--}}
                           {{--placeholder="no-reply@gmail.com" name="MAIL_FROM_EMAIL">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_from_name" class="col-sm-3 control-label">--}}

                    {{--Your contact name <span class="require">*</span><br/>--}}
                    {{--<span class="instruction">The related contact name to the contact email</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="text" class="form-control input-lg" id="mail_from_name" placeholder="Company name"--}}
                           {{--name="MAIL_FROM_NAME">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_driver" class="col-sm-3 control-label">--}}

                    {{--Your mails service driver<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<select id="mail_driver" class="form-control input-lg" name="MAIL_DRIVER">--}}
                        {{--<option value="smtp" selected>SMTP</option>--}}
                    {{--</select>--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_host" class="col-sm-3 control-label">--}}

                    {{--Your mails service hostname<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="text" class="form-control input-lg" id="mail_host" placeholder="Company name"--}}
                           {{--name="MAIL_HOST">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_port" class="col-sm-3 control-label">--}}

                    {{--Your mails service port<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="text" class="form-control input-lg" id="mail_port" placeholder="25" name="MAIL_PORT">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_username" class="col-sm-3 control-label">--}}

                    {{--Your mails service username<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="text" class="form-control input-lg" id="mail_username" placeholder=""--}}
                           {{--name="MAIL_USERNAME">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_password" class="col-sm-3 control-label">--}}

                    {{--Your mails service password<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<input type="password" class="form-control input-lg" id="mail_password" placeholder="password"--}}
                           {{--name="MAIL_PASSWORD">--}}
                {{--</div>--}}


            {{--</div>--}}


            {{--<div class="form-group form-group-lg p-b-60">--}}

                {{--<label for="mail_encryption" class="col-sm-3 control-label">--}}

                    {{--Your mails service encryption method<br/>--}}
                    {{--<span class="instruction">Please refere to your provider</span>--}}
                {{--</label>--}}

                {{--<div class="col-sm-9">--}}
                    {{--<select id="mail_encryption" class="form-control input-lg" name="MAIL_ENCRYPTION">--}}
                        {{--<option value="tls">No encryption</option>--}}
                        {{--<option value="tls">TLS</option>--}}
                    {{--</select>--}}
                {{--</div>--}}


            {{--</div>--}}


        {{--</div>--}}

    {{--</div>--}}

    <div class="box box-primary">

        <div class="box-footer">
            <button type="button" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Install</button>
        </div>


    </div>

    {!! Form::close() !!}

@endsection