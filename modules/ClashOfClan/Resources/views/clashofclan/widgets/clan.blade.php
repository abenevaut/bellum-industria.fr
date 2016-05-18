<!-- Begin Evil Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--cocsushido">
	<!-- Begin Inner -->
	<div class="layout__body-wrapper__content-wrapper__inner">

		@if (!empty($coc_clan))


			<h2 class="colored">{{ $coc_clan->name() }}</h2>


			<p>
				Niveau : {{ $coc_clan->clanLevel() }} -
				Point{{ $coc_clan->clanPoints() > 1 ? 's' : '' }}
				: {{ $coc_clan->clanPoints() }} -
				Victoire{{ $coc_clan->warWins() > 1 ? 's' : '' }}
				: {{ $coc_clan->warWins() }}
			</p>


			<p>
				{{ $coc_clan->description() }}
			</p>



			<div class="grid-wrapper">
				<ul class="retina-icons">
					@foreach ($coc_clan->memberList()->all() as $member)

						<li style="margin-bottom: 15px;">
							<div class="alignleft">
								<img src="{{ $member->league()->icon()->small() }}" alt="rank">
							</div>
							<div class="alignleft" style="padding-left: 8px;">
								<strong>{{ $member->name() }}</strong>
								({{ $member->role() }})<br>
								Trophies : {{ $member->trophies() }}<br>
								Don : {{ $member->donations() }}
								/ {{ $member->donationsReceived() }}

							</div>

							<div class="clear"></div>
						</li>

					@endforeach

				</ul>
			</div>




		@else
			<div>
				Impossible de récuperer les informations depuis l'API Clash of clan.
			</div>
		@endif

	</div>
	<!-- Begin Inner -->
</div>
<!-- End Evil Wrapper -->
