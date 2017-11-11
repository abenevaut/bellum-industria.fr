<!DOCTYPE html>
<html>
	<head>
		@include('frontend.partials.emails.metadatas')
	</head>
	<body>
		<table border="0" cellpadding="0" cellspacing="0" class="body">
			<tr>
				<td>&nbsp;</td>
				<td class="container">
					<div class="content">
						<span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
						<table class="main">
							<tr>
								<td class="wrapper">
									<table border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td>
												@yield('content')
												@include('frontend.partials.emails.signature')
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						@include('frontend.partials.emails.footer')
					</div>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</body>
</html>
