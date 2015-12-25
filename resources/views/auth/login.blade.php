@extends('cvepdb.vitrine.layouts.default')

@section('content')


    <!-- Begin Gray Wrapper -->
    <div class="dark-wrapper page-title">
        <!-- Begin Inner -->
        <div class="inner">
            <h1 class="title alignleft">Login</h1>

            <div class="navigation alignright">
                <a href="/" id="gwi-home" title="Back Home"><i class="icon-home"></i></a>
            </div>
            <div class="clear"></div>
        </div>
        <!-- End Inner -->
    </div>
    <!-- End Gray Wrapper -->



    <!-- Begin White Wrapper -->
    <div class="light-wrapper">
        <!-- Begin Inner -->
        <div class="inner">



            <div class="warning-box">
                Error box
            </div>



            <div class="one-fourth center">
                <i class="icon-login special green"></i>
                <h5>Login</h5>
                <p>
                    FlashMessage
                </p>
            </div>

            <div class="three-fourth last">

                <div class="one-half">

                    <!-- Begin Form -->
                    <div class="form-container">

                        <div class="response"></div>


                        <form method="POST" action="/auth/login" id="login" class="js-call-form_validation forms">
                            {!! csrf_field() !!}

                        <ul>

                            <li class="form-row text-input-row email-field">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="text-input defaultText required email" id="email" style="width:100%">
                            </li>


                            <li class="form-row text-input-row name-field">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="text-input defaultText required password" maxlength="20" style="width:100%">
                            </li>

                            <li class="form-row text-input-row name-field">
                                <label>Remember Me</label>
                                <input type="checkbox" name="remember">
                            </li>

                            <li class="form-row text-input-row name-field">
                                <input type="submit" value="Login" name="btnLogin" />
                            </li>
                        </ul>
                        </form>

                    </div>
                    <!-- End Form -->
                </div>

                <div class="one-half last vertical-line">

                    <h4 class="aligncenter">

                        You can also connect with :


                        Connectez-vous aussi avec :

                    </h4>
                    <br />
                    <div class="share aligncenter">

                        <div>
                            {{--<a href="/social/session/facebook" class="button facebook" style="width: 160px;">--}}
                                {{--<i class="icon-s-facebook alignleft"></i>&nbsp;facebook--}}
                            {{--</a>--}}
                        </div>


                    </div>
                    <p>&nbsp;</p>
                    <div class="center">
                        <i class="icon-key special change_password"></i>
                        <p>
                            Lien vers reset
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>

        </div>
        <!-- Begin Inner -->
    </div>
    <!-- End White Wrapper -->






    <script>
        (function($, W, D){
            $(D).bind('CVEPDB_FORM_VALIDATION_JQREADY', function(){
                cvepdb.debug('register > ON => CVEPDB_FORM_VALIDATION_JQREADY : success : Start');
                cvepdb.fv.on_submit(function(){ return true; });
                cvepdb.fv.set_rules('#login', {
                    errorPlacement: function(error, element){
                        // Append error within linked label
                        $(element).closest("form")
                                .find("label[for='"+element.attr( "id" )+"']")
                                .append(error);
                    },
                    errorElement: "span",
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        email: {
                            required: cvepdb.globalize.translate('FIELD_REQUIRED'),
                            email: cvepdb.globalize.translate('FIELD_VALID_EMAIL')
                        },
                        password: {
                            required: cvepdb.globalize.translate('FIELD_REQUIRED')
                        }
                    }
                });
                cvepdb.debug('register > ON => CVEPDB_FORM_VALIDATION_JQREADY : success : End');
            });
        })(jQuery, window, document);
    </script>


@endsection