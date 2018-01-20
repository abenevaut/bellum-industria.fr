@extends('emails.layouts.emails')

@section('title', trans('mails.password_reset_title'))

@section('content')
    <p>{{ trans('mails.password_reset_title') }}</p>
    <p>{!! trans('mails.password_reset_text') !!}</p>
    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
        <tbody>
        <tr>
            <td align="left">
                <table border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td>
                            <a href="{{ route('password.reset', ['token' => $token]) }}">{{ trans('mails.password_reset_title') }}</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <hr>
    <p>{!! trans('mails.password_reset_footer_link') !!}</p>
    <p><span style="font-size: 10px;">{{ route('password.reset', ['token' => $token]) }}</span></p>
    <hr>
@endsection
