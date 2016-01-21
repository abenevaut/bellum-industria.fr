@extends('cvepdb.vitrine.layouts.default')

@section('content')
<!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>{{ trans('cvepdb/vitrine/services.title') }}</p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->
<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">
        <h4 class="aligncenter">{{ trans('cvepdb/vitrine/services.intro') }}</h4>
        <hr/>
        <div class="idea">
            <div class="one-third center">
                <i class="icon-lamp special blue"></i>
                <h5>{{ trans('cvepdb/vitrine/services.idea_title') }}</h5>
                <p class="center social">
                </p>
            </div>
            <div class="two-third last">
                {!! trans('cvepdb/vitrine/services.idea_intro') !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <hr/>
        <div class="talk-define">
            <div class="one-third center">
                <i class="icon-chat-1 special red"></i>
                <h5>{{ trans('cvepdb/vitrine/services.talk_define_title') }}</h5>
                <p class="center social">
                </p>
            </div>
            <div class="two-third last">
                {!! trans('cvepdb/vitrine/services.talk_define_intro') !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <hr/>
        <div class="work-together">
            <div class="one-third center">
                <i class="icon-wrench special orange"></i>
                <h5>{{ trans('cvepdb/vitrine/services.work_together_title') }}</h5>
                <p class="center social">
                </p>
            </div>
            <div class="two-third last">
                {!! trans('cvepdb/vitrine/services.work_together_intro') !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <hr/>
        <div class="gain-control">
            <div class="one-third center">
                <i class="icon-key special purple"></i>
                <h5>{{ trans('cvepdb/vitrine/services.gain_control_title') }}</h5>
                <p class="center social"></p>
            </div>
            <div class="two-third last">
                {!! trans('cvepdb/vitrine/services.gain_control_intro') !!}
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <hr/>
        @include('cvepdb.vitrine.partials.longwave_share_inline')
        <div class="clear"></div>
    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->
@stop