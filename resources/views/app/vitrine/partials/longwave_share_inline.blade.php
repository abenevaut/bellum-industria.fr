<div>
    <h4 class="alignleft">{{ trans('cvepdb/vitrine/partials/share.title') }}</h4>

    <ul class="layout__body-wrapper__content-wrapper__inner__widget-share js-layout__body-wrapper__content-wrapper__inner__widget-share alignright">

        <li>
            <a href="https://www.facebook.com/sharer.php?u={{ URL::current() }}" target="_blank" class="like" style="opacity: 1;">
                <i class="icon-s-facebook"></i>&nbsp;Like
            </a>
        </li>
        <li>
            <a href="https://twitter.com/share?url={{ URL::current() }}" target="_blank" class="tweet" style="opacity: 1;">
                <i class="icon-s-twitter"></i>&nbsp;Tweet
            </a>
        </li>
        <li>
            <a href="https://plus.google.com/share?url={{ URL::current() }}" target="_blank" class="google" style="opacity: 1;">
                <i class="icon-gplus"></i>&nbsp;+1
            </a>
        </li>
        <li>
            <a style="opacity: 1;" href="mailto:?subject={{ trans('cvepdb/global.share_mail_title') }}&body={{ trans('cvepdb/global.share_mail_body') }}{{ URL::current() }}" class="pinterest">
                <i class="icon-mail-1"></i>&nbsp;Mail
            </a>
        </li>
        {{--<li>--}}
            {{--<a href="http://pinterest.com/pin/create/link/?url={{  url('/') }}" target="_blank" class="pinterest" style="opacity: 1;">--}}
                {{--<i class="icon-s-pinterest"></i>&nbsp;Pin It--}}
            {{--</a>--}}
        {{--</li>--}}

    </ul>
    <div class="clear"></div>
</div>

