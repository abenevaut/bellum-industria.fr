@extends('anonymous.default')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ trans('users.leads.contacts') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('anonymous.dashboard') }}">
                            {{ trans('global.home') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        {{ trans('users.leads.contacts') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card">
                    {!! Form::open(['route' => ['anonymous.contact.store'], 'method' => 'POST', 'data-user_identifier' => (Auth::check() ? Auth::user()->uniqid : 0)]) !!}
                    @honeypot
                    <div class="card-body">
                        <div><p>{{ trans('users.leads.baseline') }}</p></div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="civility">{{ trans('users.civility') }}</label>
                                    <select name="civility" id="civility" class="form-control">
                                        @foreach ($civilities as $key => $trans)
                                        <option
                                                value="{{ $key }}"
                                                @if (Auth::check() && $key === Auth::user()->civility) selected="selected" @endif
                                        >
                                            {{ $trans }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name">{{ trans('users.first_name') }}</label>
                                    <input
                                            type="text"
                                            name="first_name"
                                            class="form-control @if ($errors && $errors->has('first_name')) is-invalid @endif"
                                            placeholder="{{ trans('users.first_name') }}"
                                            value="{{ old('first_name', Auth::check() ? Auth::user()->first_name : '') }}"
                                    />
                                    @if ($errors && $errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name">{{ trans('users.last_name') }}</label>
                                    <input
                                            type="text"
                                            name="last_name"
                                            class="form-control @if ($errors && $errors->has('last_name')) is-invalid @endif"
                                            placeholder="{{ trans('users.last_name') }}"
                                            value="{{ old('last_name', Auth::check() ? Auth::user()->last_name : '') }}"
                                    />
                                    @if ($errors && $errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('users.email') }}</label>
                            <input
                                    type="text"
                                    name="email"
                                    class="form-control @if ($errors && $errors->has('email')) is-invalid @endif"
                                    placeholder="{{ trans('users.email') }}"
                                    value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}"
                            />
                            @if ($errors && $errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="subject">{{ trans('users.leads.subject') }}</label>
                            <input
                                    type="text"
                                    name="subject"
                                    class="form-control @if ($errors && $errors->has('message')) is-invalid @endif"
                                    placeholder="{{ trans('users.leads.subject') }}"
                                    value="{{ old('subject') }}"
                            />
                            @if ($errors && $errors->has('subject'))
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="message">{{ trans('users.leads.message') }}</label>
                            <textarea
                                    name="message"
                                    class="form-control @if ($errors && $errors->has('message')) is-invalid @endif"
                                    style="min-height:100px;"
                                    placeholder="{{ trans('users.leads.message') }}"
                            >
                                {{ old('message', '') }}
                            </textarea>
                            @if ($errors && $errors->has('message'))
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <div>
                            <google-recaptcha-component></google-recaptcha-component>
                            @if ($errors && $errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-9">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="certify" name="certify" {{ old('certify') ? 'checked' : '' }}/>
                                    <label for="certify">
                                        <span class="@if ($errors && $errors->has('certify')) text-danger @endif">{{ trans('users.leads.certify') }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary float-right">{{ trans('users.leads.send') }}</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
