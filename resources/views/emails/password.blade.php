@extends('emails.layouts.default')

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

                            <!--title-->
                            <tr>
                                <td align="center" style="font-family: 'Open Sans', Arial, sans-serif; font-weight: bold; color:#3498db; font-size:24px;">
                                    Click here to reset your password: {{ url('password/reset/'.$token) }}
                                </td>
                            </tr>
                            <!--end title-->

                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--end feature-content-->
@stop