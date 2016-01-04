@extends('cvepdb.multigaming.layouts.default')

@section('content')
        <!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>{{ trans('cvepdb/multigaming/boutique.title') }}</p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->
<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        <iframe height="1500"
                width="100%"
                src="http://cvepdb.spreadshirt.fr/"
                name="Spreadshop"
                id="Spreadshop"
                frameborder="0"
                onload="window.scrollTo(0, 0);"></iframe>

        <div class="align-center">
            <a href="//www.spreadshirt.fr/garantie-spreadshirt-C4070" onclick="window.open(this.href,'','height=520,width=640,scrollbars=yes'); return false;">
                <img src="http://cache.spreadshirt.net/Public/Media/eu/yourspread/marketing/trustedspread/trust_icon_100_fr.png" alt="Garantie Spreadshirt" />
            </a>
        </div>

    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->
@stop