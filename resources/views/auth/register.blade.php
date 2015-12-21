@extends('cvepdb.vitrine.layouts.default')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <form method="POST" action="/auth/register">
                                {!! csrf_field() !!}

                                <div>
                                    First name
                                    <input type="text" name="first_name" value="{{ old('first_name') }}">
                                </div>

                                <div>
                                    Last name
                                    <input type="text" name="last_name" value="{{ old('last_name') }}">
                                </div>

                                <div>
                                    Email
                                    <input type="email" name="email" value="{{ old('email') }}">
                                </div>

                                <div>
                                    Password
                                    <input type="password" name="password">
                                </div>

                                <div>
                                    Confirm Password
                                    <input type="password" name="password_confirmation">
                                </div>

                                <div>
                                    <button type="submit">Register</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection