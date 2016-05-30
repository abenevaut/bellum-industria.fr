<div>
    <h4 class="aligncenter">{{ trans('cvepdb/vitrine/partials/share.title') }}</h4>
    <br>
    <ul class="layout__body-wrapper__content-wrapper__inner__widget-share layout__body-wrapper__content-wrapper__inner__widget-share--2line js-layout__body-wrapper__content-wrapper__inner__widget-share aligncenter">

        <li>
            <a style="opacity: 1;" href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank" class="like">
                <i class="icon-s-facebook"></i>&nbsp;Like
            </a>
        </li>
        <li>
            <a style="opacity: 1;" href="https://twitter.com/share?url={{ URL::current() }}" target="_blank" class="tweet">
                <i class="icon-s-twitter"></i>&nbsp;Tweet
            </a>
        </li>
        <li>
            <a style="opacity: 1;" href="https://plus.google.com/share?url={{ URL::current() }}" target="_blank" class="google">
                <i class="icon-gplus"></i>&nbsp;+1
            </a>
        </li>
        {{--<li>--}}
            {{--<a style="opacity: 1;" href="http://pinterest.com/pin/create/link/?url={{  url('/') }}" target="_blank" class="pinterest">--}}
                {{--<i class="icon-s-pinterest"></i>&nbsp;Pin It--}}
            {{--</a>--}}
        {{--</li>--}}
        <li>
            <a style="opacity: 1;" href="mailto:?subject={{ trans('cvepdb/global.share_mail_title') }}&body={{ trans('cvepdb/global.share_mail_body') }}{{ URL::current() }}" class="pinterest">
                <i class="icon-mail-1"></i>&nbsp;Mail
            </a>
        </li>
    </ul>
    <div class="clear"></div>
</div>