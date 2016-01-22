@extends('emails.layouts.default')

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
                                        votre message de prise de contact a bien été pris en compte. Nous y répondrons dans les meilleurs délais.
                                    </td>
                                </tr>

                                @include('emails.partials.signature')

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
                                             class="pattern" src="{{ asset('dist/images/pattern-line.png') }}"
                                             width="519" height="9">
                                    </td>
                                </tr>
                                <tr>
                                    <td height="30" align="center"></td>
                                </tr>

                                <!--title-->
                                <tr>
                                    <td align="left"
                                        style="font-family: 'Open Sans', Arial, sans-serif; font-weight: bold; color:#3498db; font-size:24px;">
                                        {{ $user_subject }}
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
                                        {{ $user_message }}
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