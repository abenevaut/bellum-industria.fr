	{% if breadcrumb == 'breadcrumb-alt' %}
<div class="bg-white">
  <div class="container">
    <ol class="breadcrumb breadcrumb-alt">
			<li>
				<p>Home</p>
			</li>
			<li><a href="#" class="active">Default Layout</a>
			</li>
    </ol>
  </div>
</div>
{% endif %} <!-- START JUMBOTRON -->
	<div class="jumbotron" {% if mode != 'horizontal_menu' %} data-pages="parallax" {% endif %}>
		<div class="{% if mode =='horizontal_menu' %} container p-l-0 p-r-0 {% else %} container-fluid {% endif %}  container-fixed-lg sm-p-l-0 sm-p-r-0">
			<div class="inner">
				<!-- START BREADCRUMB -->
				{% if breadcrumb != 'breadcrumb-alt' %} <ul class="breadcrumb">
					<li>
						<p>Home</p>
					</li>
					<li><a href="#" class="active">Default Layout</a>
					</li>
				</ul>
				<!-- END BREADCRUMB --> {% endif %}
			</div>
		</div>
	</div>
	<!-- END JUMBOTRON -->
	<!-- START CONTAINER FLUID -->
	<div class="{% if mode =='horizontal_menu' %} container  {% else %} container-fluid {% endif %}  container-fixed-lg">
		<!-- BEGIN PlACE PAGE CONTENT HERE -->
		<!-- END PLACE PAGE CONTENT HERE -->
	</div>
	<!-- END CONTAINER FLUID -->
