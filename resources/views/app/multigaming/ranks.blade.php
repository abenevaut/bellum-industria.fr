@extends('longwave::layouts.default')

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
									CS:Go
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
										<th>Speudo</th>
										<th>Point(s)</th>
										<th>Level</th>
										<th>Dernière visite</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Speudo</th>
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
											<td>{{ $player->last_visit }}</td>
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
		<div class="layout__body-wrapper__content-wrapper__inner">


			<h2 class="colored">Servers</h2>


			<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
				<div class="grid">

					@foreach ($game_servers as $server)


						<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
							<div class="frame alignleft">
								<a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">
									<img src="/modules/steam/images/csgo/maps/{{ $server['info']['Map'] }}.jpg" alt="Ca va ENCORE parler de bits!"
										 width="142" height="100"/>

									<div></div>
								</a>
							</div>
							<div class="post-content">
								<h5>
									<a href="steam://connect/cvepdb.fr:{{$server['info']['GamePort']}}">cvepdb.fr:{{$server['info']['GamePort']}}</a>
								</h5>

								<div class="meta">
									<span class="date">{{$server['info']['ModDesc']}}</span>
								</div>
								<div>
									{{ $server['info']['HostName'] }}
								</div>
								<div>
									<strong>{{ $server['info']['Map'] }}</strong>
									({{ $server['info']['Players'] }}
									/{{ $server['info']['MaxPlayers'] }})
								</div>
							</div>
						</div>

					@endforeach

				</div>
			</div>
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
			@include('longwave::partials.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->
@endsection
