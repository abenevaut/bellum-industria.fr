@extends('cvepdb.emails.layouts.clip')

@section('content')
<!--feature-content-->
<table bgcolor="#cdcdc8" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table class="table600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                    <td height="35"></td>
                </tr>
                <tr>
                    <td align="center">
                        <table class="table-inner" width="520" border="0" align="center" cellpadding="0" cellspacing="0">

                            <tr>
                                <td align="center">
                                    <table width="520" border="0" align="center" cellpadding="0" cellspacing="0"
                                           class="table-inner">
                                        <tbody>
                                        <tr>
                                            <!--Title-->
                                            <td align="left"
                                                style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">
                                                {{$user->last_name}} {{$user->first_name}},
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
                                                Click here to reset your password : <a href="{{ url('password/reset/'.$token) }}">Lien</a>
                                            </td>
                                        </tr>
                                        @include('cvepdb.emails.partials.clip_signature')
                                                <!--end content-->
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--end feature-content-->
@stop