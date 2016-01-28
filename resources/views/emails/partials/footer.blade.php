<!--footer-->
<table bgcolor="#cdcdc8" align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center">
            <table class="table600" width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
                            <tr>
                                <td height="25"></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table align="center" class="table-inner" width="520" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td align="center" style="line-height: 0px;">
                                                <img style="display:block; line-height:0px; font-size:0px; border:0px;" class="pattern" src="{{ asset('assets/images/pattern-line.png') }}" width="519" height="9" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="25"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td  align="center" style="line-height: 0px;">
                        <img style="display:block; line-height:0px; font-size:0px; border:0px;" class="img1" src="{{ asset('assets/images/footer-top.png') }}" width="600" height="81" />
                    </td>
                </tr>
                <tr>
                    <td align="center" bgcolor="#ffffff">
                        <table class="table-inner" width="520" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td valign="top">






                                    <!--Preference-->

                                    <table class="footer-column" align="left" width="112" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr valign="top">
                                            <td style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">Navigation</td>
                                        </tr>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr valign="top">
                                            <td class="textbutton" style="line-height:28px; font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#bdc3c7;">
                                                <a href="{{ url('/about') }}">{!! trans('cvepdb/vitrine/about.title') !!}</a><br />
                                                <a href="{{ url('/services') }}">{{ trans('cvepdb/vitrine/services.title') }}</a><br />
                                                <a href="{{ url('/boutique') }}">{{ trans('cvepdb/vitrine/boutique.title') }}</a><br />
                                                <a href="{{ url('/contact') }}">{!! trans('cvepdb/vitrine/contact.title') !!}</a><br />
                                            </td>
                                        </tr>
                                    </table>

                                    <!--End Preference-->






                                    <!--Space-->
                                    <table width="1" height="25" border="0" cellpadding="0" cellspacing="0" align="left">
                                        <tr>
                                            <td style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                <p style="padding-left: 24px;">&nbsp;</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--End Space-->





                                    <!--Link-->
                                    <table class="footer-column" align="left" width="112" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        {{--<tr valign="top">--}}
                                            {{--<td style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">Link</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td height="10"></td>--}}
                                        {{--</tr>--}}
                                        {{--<tr valign="top">--}}
                                            {{--<td class="textbutton" style="line-height:28px; font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999;">--}}
                                                {{--<a href="#">Products list</a>--}}
                                                {{--<br>--}}
                                                {{--<a href="#">Question</a>--}}
                                                {{--<br>--}}
                                                {{--<a href="#">Services</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    </table>

                                    <!--End Link-->






                                    <!--Space-->
                                    <table width="1" height="25" border="0" cellpadding="0" cellspacing="0" align="left">
                                        <tr>
                                            <td style="font-size: 0;line-height: 0;border-collapse: collapse;">
                                                <p style="padding-left: 23px;">&nbsp;</p>
                                            </td>
                                        </tr>
                                    </table>
                                    <!--End Space-->





                                    <!--Footer note-->

                                    <table bgcolor="#f8f8f8" class="table-full" width="247" border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>
                                                <table class="footer-note" width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td height="15"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-family: 'Open Sans', Arial, sans-serif; font-size:18px; color:#34495e; font-weight:bold;">{!! trans('cvepdb/vitrine/contact.address_title') !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td height="15"></td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                                            {!! trans('cvepdb/vitrine/contact.address_intro') !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                                            {!! trans('cvepdb/vitrine/contact.address_address') !!}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                                            <a href="tel:{!! str_replace([' ', '.'], ['', ''], trans('cvepdb/vitrine/contact.address_phone')) !!}">{!! trans('cvepdb/vitrine/contact.address_phone') !!}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#999999; line-height:28px;">
                                                            <a href="mailto:{!! trans('cvepdb/vitrine/contact.address_mail') !!}">{!! trans('cvepdb/vitrine/contact.address_mail') !!}</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td height="15"></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>

                                    <!--End Footer Note-->





                                </td>
                            </tr>
                            <tr>
                                <td height="30"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="line-height: 0px;">
                        <img style="display:block; line-height:0px; font-size:0px; border:0px;" class="img1" src="{{ asset('assets/images/footer-bottom.png') }}" width="600" height="41" />
                    </td>
                </tr>
                <tr>
                    <td height="30" align="center" valign="bottom" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d;">
                        © 2012-{{ date('Y') }} <a href="{{ url('/') }}">Ca va ENCORE parler de bits!</a> Tous droits réservés.
                    </td>
                </tr>
                <tr>
                    <td height="40"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--end footer-->