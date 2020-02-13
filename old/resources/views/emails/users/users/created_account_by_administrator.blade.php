@extends('emails.layouts.emails')

@section('title', trans('mails.created_account_by_administrator_subject'))

@section('content')
    <p>{{ $civility_name }}</p>
    <p>{!! trans('mails.created_account_by_administrator_text_reset_password') !!}</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="left">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><a href="{{ route('password.request') }}">{{ trans('mails.password_reset_title') }}</a></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <p>{!! trans('mails.created_account_by_administrator_text_login') !!}</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="left">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td><a href="{{ route('login') }}">{{ trans('global.connect') }}</a></td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
@endsection
