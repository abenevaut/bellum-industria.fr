<!DOCTYPE html>
<html>
	<head>
		@include('backend.partials.dashboard.metadatas')
	</head>
	<body class="fixed-header dashboard">
		@include('backend.partials.dashboard.sidebar')
		<!-- START PAGE-CONTAINER -->
		<div class="page-container ">
			@include('backend.partials.dashboard.header')
			<!-- START PAGE CONTENT WRAPPER -->
			<div class="page-content-wrapper ">
				<!-- START PAGE CONTENT -->
				<div class="content sm-gutter">
					<!-- START CONTAINER FLUID -->
					<div class="container-fluid padding-25 sm-padding-10">
						@yield('content')
					</div>
					<!-- END CONTAINER FLUID -->
				</div>
				<!-- END PAGE CONTENT -->
				@include('backend.partials.dashboard.footer')
			</div>
			<!-- END PAGE CONTENT WRAPPER -->
		</div>
		<!-- END PAGE CONTAINER -->
		@include('backend.partials.dashboard.quickview')
		@include('backend.partials.dashboard.overlay')
		@include('backend.partials.dashboard.footerjs')
	</body>
</html>
