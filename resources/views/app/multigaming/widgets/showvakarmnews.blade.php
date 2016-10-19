<div class="layout__body-wrapper__content-wrapper__inner__widget-posts">
	<div class="grid">

		@foreach ($announcements as $item)

			<div class="layout__body-wrapper__content-wrapper__inner__widget-posts__post">
				<div class="frame alignleft">
					<a href="{!! $item->get_link() !!}" target="_blank">
						<img src="/themes/longwave/images/multigaming/logo.png" alt="{!! $item->get_title() !!}"
							 width="142" height="142"/>

						<div></div>
					</a>
				</div>
				<div class="post-content">
					<h5>
						<a href="{!! $item->get_link() !!}" target="_blank">{!! $item->get_title() !!}</a>
					</h5>

					<div class="meta">
						<span class="date">{!! $item->get_date() !!}</span>
					</div>
					{!! str_limit(strip_tags($item->get_description()), 120, ' ..') !!}
				</div>
			</div>

		@endforeach

	</div>
</div>