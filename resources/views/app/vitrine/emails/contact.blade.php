@extends('cvepdb.emails.layouts.clip')

@section('content')
    <table bgcolor="#cdcdc8" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td align="center">
                <table class="table600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                       bgcolor="#ffffff">
                    <tbody>
                    <tr>
                        <td height="40"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table width="520" border="0" align="center" cellpadding="0" cellspacing="0"
                                   class="table-inner">
                                <tbody>
                                <tr>
                                    <!--Title-->
                                    <td align="left"
                                        style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">
                                        {{ $name }},
                                    </td>
                                    <!--End Title-->
                                </tr>
                                <tr>
                                    <td height="15" align="center" style="border-bottom:1px dotted #bdc3c7;"></td>
                                </tr>
                                <tr>
                                    <td height="30"></td>
                                </tr>
                                <!--content-->
                                <tr>
                                    <td align="left"
                                        style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                        {{ trans('cvepdb/vitrine/emails/emails.contact_form') }}
                                    </td>
                                </tr>
                                @include('cvepdb.emails.partials.clip_signature')
                                <!--end content-->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <table bgcolor="#cdcdc8" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td align="center">
                <table class="table600" width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                       bgcolor="#ffffff">
                    <tbody>
                    <tr>
                        <td height="35"></td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table class="table-inner" width="520" border="0" align="center" cellpadding="0"
                                   cellspacing="0">
                                <tbody>
                                <tr>
                                    <td align="center" style="line-height: 0px;">
                                        <img style="display:block; line-height:0px; font-size:0px; border:0px;"
                                             class="pattern" src="{{ asset('assets/images/pattern-line.png') }}"
                                              height="9">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" align="center"></td>
                                </tr>
                                <!--title-->
                                <tr>
                                    <td align="left"
                                        style="font-family: 'Open Sans', Arial, sans-serif; font-weight: bold; color:#3498db; font-size:24px;">
                                        {{ str_limit($user_subject, 40, '...') }}
                                    </td>
                                </tr>
                                <!--end title-->
                                <tr>
                                    <td height="30"></td>
                                </tr>
                                <!--content-->
                                <tr>
                                    <td align="left"
                                        style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                        <div style="white-space:normal;word-break:keep-all;word-wrap:break-word;max-width: 90%;">
                                            {!! $user_message !!}
                                        </div>
                                    </td>
                                </tr>
                                <!--end content-->
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
@stop