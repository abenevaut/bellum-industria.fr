@extends('longwave::layouts.boutique')

@section('content')
	<div id="myShop" style="background-color:white;"><a href="//shop.spreadshirt.de/cvepdb">cvepdb</a></div>
	<script>
		var spread_shop_config = {
			shopName: 'cvepdb',
			locale: 'fr_FR',
			prefix: '//shop.spreadshirt.de',
			baseId: 'myShop'
		};
	</script>
	<script type="text/javascript" src="//shop.spreadshirt.de/shopfiles/shopclient/shopclient.nocache.js"></script>
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			@include('longwave::partials.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
@stop