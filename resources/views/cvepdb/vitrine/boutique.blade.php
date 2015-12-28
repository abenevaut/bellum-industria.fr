@extends('cvepdb.vitrine.layouts.default')

@section('content')
        <!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>{{ trans('cvepdb/vitrine/boutique.title') }}</p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->
<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">

        <iframe height="1800"
                width="100%"
                src="http://cvepdb.spreadshirt.fr/"
                name="Spreadshop"
                id="Spreadshop"
                frameborder="0"
                onload="window.scrollTo(0, 0);"></iframe>

        Les produits proposés dans notre boutique proviennent directement de <a href="http://www.spreadshirt.fr">Spreadshirt</a>, la plateforme spécialisée dans la personnalisation de t-shirts et accessoires.

    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->
@stop