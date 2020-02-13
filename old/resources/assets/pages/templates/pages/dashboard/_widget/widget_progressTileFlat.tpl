{% if not progressFlatTile_bg%}
{% set progressFlatTile_bg ='primary'%}
{% endif %}
	<div class="widget-9 card no-border bg-{# progressFlatTile_bg #} no-margin widget-loader-bar">
		<div class="full-height d-flex flex-column">
			<div class="card-header ">
				<div class="card-title text-black">
                        <span class="font-montserrat fs-11 all-caps">Weekly Sales <i
	                    class="fa fa-chevron-right"></i>
	                                </span>
				</div>
				<div class="card-controls">
					<ul>
						<li><a href="#" class="card-refresh text-black"
						       data-toggle="refresh"><i
								class="card-icon card-icon-refresh"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="p-l-20">
				<h3 class="no-margin p-b-5 text-white">$23,000</h3>
				<a href="#" class="btn-circle-arrow text-white"><i
						class="pg-arrow_minimize"></i>
				</a>
				<span class="small hint-text text-white">65% lower than last month</span>
			</div>
			<div class="mt-auto">
				<div class="progress progress-small m-b-20">
					<!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
					<div class="progress-bar progress-bar-white" style="width:45%"></div>
					<!-- END BOOTSTRAP PROGRESS -->
				</div>
			</div>
		</div>
	</div>