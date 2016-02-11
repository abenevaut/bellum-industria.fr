@extends('cvepdb.admin.layouts.login')

@section('content')
    <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">


        <div class="" style="float:right;margin-top:30px;">
            <div id="language_switcher" class="dropdown">
                <script type="text/javascript">
                    function switchLanguage(sel) {
                        var url = sel[sel.selectedIndex].value;
                        window.location = "{{ Request::url() }}/?lang=" + url;
                    }
                </script>
                <img alt="{{ Session::get('lang') }}"
                     src="{{ asset('/assets/images/lang/png/'.Session::get('lang').'.png') }}">
                <select name="language_switcher" class="" onchange="switchLanguage(this);">
                    <option value="en"
                            @if ('en' === Session::get('lang'))selected="selected"@endif>{!! trans('cvepdb/global.lang_en') !!}</option>
                    <option value="fr"
                            @if ('fr' === Session::get('lang'))selected="selected"@endif>{!! trans('cvepdb/global.lang_fr') !!}</option>
                </select>
            </div>
            <div style="clear:both"></div>
        </div>
        <div class="clear"></div>


        <img src="/assets/images/cvepdb/logo.png" alt="logo" data-src="/assets/images/cvepdb/logo.png"
             data-src-retina="/assets/images/cvepdb/logo.png" width="200" height="80">

        <p class="p-t-35">{!! trans('cvepdb/auth/login.intro') !!}</p>

        @foreach($errors->all() as $error)
            <label id="password-error" class="error" for="password">{{ $error }}</label>
            @endforeach


        <form method="POST" action="/password/reset">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">


            <div class="form-group form-group-default">
                <label>{!! trans('cvepdb/global.email') !!}</label>

                <div class="controls">
                    <input type="text" name="email" value="{{ old('email') }}"
                           placeholder="{!! trans('cvepdb/global.email') !!}"
                           class="form-control" id="email" required>
                </div>
            </div>
            <div class="form-group form-group-default">
                <label>{!! trans('cvepdb/global.password') !!}</label>

                <div class="controls">
                    <input type="password" class="form-control" name="password"
                           placeholder="{!! trans('cvepdb/global.password') !!}" required>
                </div>
            </div>
            <div class="form-group form-group-default">
                <label>Confirm {!! trans('cvepdb/global.password') !!}</label>

                <div class="controls">
                    <input type="password" class="form-control" name="password_confirmation"
                           placeholder="{!! trans('cvepdb/global.password') !!}" required>
                </div>
            </div>

            <!-- END Form Control-->
            <button class="btn btn-primary btn-cons m-t-10"
                    type="submit">Reset Password</button>

            <a class="btn btn-secondary btn-cons m-t-10"
               href="{{ url() }}">{!! trans('cvepdb/global.back_home') !!}</a>

        </form>



            {{--<div class="pull-bottom sm-pull-bottom">--}}
            {{--<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">--}}
            {{--<div class="col-sm-4 col-md-3 no-padding">--}}
            {{--<img alt="" class="m-t-5"--}}
            {{--data-src="/dist/images/cvepdb/apple-touch-icon-114x114-precomposed.png"--}}
            {{--data-src-retina="/dist/images/cvepdb/apple-touch-icon-114x114-precomposed.png"--}}
            {{--height="60" src="/dist/images/cvepdb/apple-touch-icon-114x114-precomposed.png"--}}
            {{--width="60">--}}
            {{--</div>--}}
            {{--<div class="col-sm-8 no-padding m-t-10">--}}
            {{--<p>--}}
            {{--<small>--}}
            {{--Create a pages account. If you have a facebook account, log into it for this--}}
            {{--process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#"--}}
            {{--class="text-info">Google</a>--}}
            {{--</small>--}}
            {{--</p>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
    </div>
@endsection
