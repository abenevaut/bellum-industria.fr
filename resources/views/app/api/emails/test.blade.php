@extends('emails.layouts.default')

@section('content')
<!--title-bar-->
<table bgcolor="#cdcdc8" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table class="table600" width="600" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                <tr>
                    <td height="40"></td>
                </tr>
                <tr>
                    <td align="center">
                        <table width="520" border="0" align="center" cellpadding="0" cellspacing="0" class="table-inner">
                            <tr>
                                <!--Title-->

                                <td align="left" style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">Super Test</td>

                                <!--End Title-->
                            </tr>
                            <tr>
                                <td height="15" align="center" style="border-bottom:1px dotted #bdc3c7;"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--end title-bar-->
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
                                    Click here to reset your password: test
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