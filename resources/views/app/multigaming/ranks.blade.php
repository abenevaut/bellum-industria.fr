@extends('longwave::layouts.' . Environments::current())

@section('head')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script>
		(function ($, W, D) {
			// A la fin du chargement de la library
			$(D).bind('CVEPDB_READY', function () {
				@foreach ($ranks as $server_key => $server)
					$('#table-{{ slugify($server_key) }}').DataTable({
						"order": [[ 1, "desc" ]]
					});
				@endforeach
			});
		})(jQuery, window, document);
	</script>
@endsection

@section('content')
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
			<p>Ranks</p>
		</div>
		<!-- End Inner -->
	</div>
	<!-- End Gray Wrapper -->
	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">

			<div id="rankstabs" class="tabs tab-container js-call-easytabs">
				<ul class="etabs">
					@foreach ($ranks as $server_key => $server)
						<li class="tab
						@if ('sm_multigaming_csgo_1' == $server_key)
								active
						@endif">
							<a href="#tab-{{ slugify($server_key) }}" >
								@if ('sm_multigaming_csgo_1' == $server_key)
									CS:Go : retakes scene
								@elseif ('sm_multigaming_csgo_3' == $server_key)
									CS:Go : funny scene
								@elseif ('sm_multigaming_css_1' == $server_key)
									CS:Source
								@endif
							</a>
						</li>
					@endforeach
				</ul>
				<div class="panel-container">
					@foreach ($ranks as $server_key => $server)
						<div id="tab-{{ slugify($server_key) }}">
							<table id="table-{{ slugify($server_key) }}">
								<thead>
									<tr>
										<th>Pseudo</th>
										<th>Point(s)</th>
										<th>Level</th>
										<th>Dernière visite</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Pseudo</th>
										<th>Point(s)</th>
										<th>Level</th>
										<th>Dernière visite</th>
									</tr>
								</tfoot>
								<tbody>
									@foreach ($server as $player)
										<tr>
											<td>{{ $player->name }}</td>
											<td>{{ $player->points }}</td>
											<td>{{ $player->level }}</td>
											<td>{{ \Carbon\Carbon::createFromTimestamp($player->last_visit)->format('d F Y, g:i a') }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					@endforeach
				</div>
			</div>

			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->
	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner js-call-hoverdir">


			<h2 class="colored">Servers</h2>
			{!! Widget::steam_game_servers() !!}
			<div class="clear"></div>

			<hr>

			<div>
				<h4 class="alignleft">Défiez notre communautée :</h4>

				<ul class="layout__body-wrapper__content-wrapper__inner__widget-challenge alignright">

					<li>
						<a href="{{  url('challenge') }}"  style="width: auto;" class="button green">
							challenges
						</a>
					</li>

				</ul>
				<div class="clear"></div>
			</div>

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->
	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			@include('longwave::partials.multigaming.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->
@endsection
