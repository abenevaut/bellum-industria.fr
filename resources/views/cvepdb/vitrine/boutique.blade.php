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

        <div id="myShop"><a href="//shop.spreadshirt.de/cvepdb">cvepdb</a></div>

        <script>
            var spread_shop_config = {
                shopName: 'cvepdb',
                locale: 'fr_FR',
                prefix: '//shop.spreadshirt.de',
                baseId: 'myShop'
            };
        </script>

        <script type="text/javascript" src="//shop.spreadshirt.de/shopfiles/shopclient/shopclient.nocache.js"></script>

        <div class="info-box">
            Les produits proposés dans notre boutique proviennent directement de <a href="http://cvepdb.spreadshirt.fr" target="_blank">Spreadshirt</a>.
        </div>

    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->
<!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">
        @include('cvepdb.vitrine.partials.longwave_share_inline')
        <div class="clear"></div>
    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->
@stop