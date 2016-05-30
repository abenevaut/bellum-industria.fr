<!-- Begin Footer Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--footer">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">



        <div class="one-third layout__body-wrapper__content-wrapper__inner__widget-footer">
            <h3 class="colored">{!! trans('cvepdb/vitrine/contact.address_title') !!}</h3>

            <p>{!! trans('cvepdb/vitrine/contact.address_intro') !!}</p>
            <i class="icon-location layout__body-wrapper__content-wrapper__inner__widget-footer__contact"></i> {!! trans('cvepdb/vitrine/contact.address_address') !!}<br />
            <i class="icon-phone layout__body-wrapper__content-wrapper__inner__widget-footer__contact"></i> <a href="tel:{!! str_replace([' ', '.'], ['', ''], trans('cvepdb/vitrine/contact.address_phone')) !!}">{!! trans('cvepdb/vitrine/contact.address_phone') !!}</a><br />
            <i class="icon-mail layout__body-wrapper__content-wrapper__inner__widget-footer__contact"></i> <a href="mailto:{!! trans('cvepdb/vitrine/contact.address_mail') !!}">{!! trans('cvepdb/vitrine/contact.address_mail') !!}</a>
        </div>




        <div class="one-third layout__body-wrapper__content-wrapper__inner__widget-footer">

            &nbsp;

            {{--<h3 class="colored">Tags</h3>--}}

            {{--<div class="layout__body-wrapper__content-wrapper__inner__widget-footer__tagcloud">--}}
                {{--<a href="#" style="font-size: 9pt;">blogroll</a>--}}
                {{--<a href="#" style="font-size: 19pt;">daily</a> <a href="#" style="font-size: 9pt;">dialog</a>--}}
                {{--<a href="#" style="font-size: 9pt;">gallery</a> <a href="#" style="font-size: 10pt;">journal</a>--}}
                {{--<a href="#" style="font-size: 9pt;">link</a> <a href="#" style="font-size: 12pt;">motion</a>--}}
                {{--<a href="#" style="font-size: 9pt;">music</a> <a href="#" style="font-size: 20pt;">photo</a>--}}
                {{--<a href="#" style="font-size: 13pt;">professional</a> <a href="#" style="font-size: 16pt;">quotation</a>--}}
                {{--<a href="#" style="font-size: 9pt;">show</a> <a href="#" style="font-size: 15pt;">sound</a>--}}
                {{--<a href="#" style="font-size: 9pt;">tv</a> <a href="#" style="font-size: 9pt;">video</a>--}}
                {{--<a href="#" style="font-size: 9pt;">gift</a> <a href="#" style="font-size: 19pt;">label</a>--}}
                {{--<a href="#" style="font-size: 9pt;">christmas</a> <a href="#" style="font-size: 9pt;">holiday</a>--}}
                {{--<a href="#" style="font-size: 10pt;">fun</a> <a href="#" style="font-size: 9pt;">recipes</a>--}}
                {{--<a href="#" style="font-size: 12pt;">concert</a> <a href="#" style="font-size: 9pt;">drinks</a>--}}
                {{--<a href="#" style="font-size: 20pt;">apps</a> <a href="#" style="font-size: 13pt;">iphone</a>--}}
                {{--<a href="#" style="font-size: 16pt;">ipad</a> <a href="#" style="font-size: 9pt;">develop</a>--}}
                {{--<a href="#" style="font-size: 15pt;">marketing</a> <a href="#" style="font-size: 9pt;">strategy</a>--}}
                {{--<a href="#" style="font-size: 13pt;">food</a> <a href="#" style="font-size: 12pt;">typography</a>--}}
                {{--<a href="#" style="font-size: 9pt;">mobile</a> <a href="#" style="font-size: 15pt;">envato</a>--}}
                {{--<a href="#" style="font-size: 9pt;">icon</a> <a href="#" style="font-size: 9pt;">coda</a>--}}
                {{--<a href="#" style="font-size: 20pt;">jquery</a> <a href="#" style="font-size: 9pt;">cms</a>--}}
            {{--</div>--}}

        </div>

        <div class="one-third last layout__body-wrapper__content-wrapper__inner__widget-footer">
            <h3 class="colored">Navigation</h3>

            <a href="{{ url('/about') }}">{!! trans('cvepdb/vitrine/about.title') !!}</a><br />
            <a href="{{ url('/services') }}">{{ trans('cvepdb/vitrine/services.title') }}</a><br />
            <a href="{{ url('/boutique') }}">{{ trans('cvepdb/vitrine/boutique.title') }}</a><br />
            <a href="{{ url('/contact') }}">{!! trans('cvepdb/vitrine/contact.title') !!}</a><br />

        </div>

        <div class="clear"></div>








    </div>
    <!-- Begin Inner -->
</div>
<!-- End Footer Wrapper -->