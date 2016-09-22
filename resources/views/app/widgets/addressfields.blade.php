@push('widget-scripts')
<script>
	(function ($, W, D) {
		$(D).bind('CVEPDB_SELECT2_READY', function () {

			input_substates = $('select[name="{{ $prefix }}_address_substate_id"]');

			if (input_substates.length) {

				var substates_zip = null;

				input_substates.select2({
					theme: "bootstrap",
					width: '100%',
					placeholder: "",
					minimumInputLength: 0,
					minimumResultsForSearch: 1,
					ajax: {
						url: '/ajax/addresses/substates',
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								search_term: params.term,
								page: params.page,
								country_id: input_substates.attr('data-country_id')
							};
						},
						processResults: function (data, params) {
							params.page = params.page || 1;
							return {
								results: data
							};
						},
						cache: true
					},
					escapeMarkup: function (markup) {
						return markup;
					},
					templateSelection: function (repo) {
						substates_old_zip = substates_zip;
						substates_zip = repo.iso_3166_alpha_2;
						return repo.name || repo.text;
					},
					templateResult: function (repo) {
						return repo.name;
					}
				})
						.on("change", function (e) {

							var zipcode = $('input[name="{{ $prefix }}_address_zip"]');

							if (!zipcode.val().length || zipcode.val().length == 2) {
								zipcode.val(substates_zip);
							}
						});
			}

			input_states = $('select[name="{{ $prefix }}_address_state_id"]');

			if (input_states.length) {

				input_states.select2({
					theme: "bootstrap",
					width: '100%',
					placeholder: "",
					minimumInputLength: 0,
					minimumResultsForSearch: Infinity,
					ajax: {
						url: '/ajax/addresses/states',
						dataType: 'json',
						delay: 250,
						data: function (params) {
							return {
								search_term: params.term,
								page: params.page,
								country_id: input_states.attr('data-country_id')
							};
						},
						processResults: function (data, params) {
							params.page = params.page || 1;
							return {
								results: data
							};
						},
						cache: true
					},
					escapeMarkup: function (markup) {
						return markup;
					},
					templateSelection: function (repo) {
						return repo.name || repo.text;
					},
					templateResult: function (repo) {
						return repo.name;
					}
				});
			}


			input_countries = $('select[name="{{ $prefix }}_address_country"]');

			if (input_countries.length) {

				input_countries.select2({
					theme: "bootstrap",
					width: '100%',
					placeholder: "",
					minimumInputLength: 0,
					minimumResultsForSearch: 1
				})
						.on("change", function (e) {
							input_states.attr('data-country_id', this.value);
							input_states.empty();
							input_states.trigger('change.select2');
						});
			}


			var selected_id = input_substates.attr('data-value');

			if ("" != selected_id) {
				$.ajax({
					url: '/ajax/addresses/substates',
					data: {
						substate_id: selected_id,
						country_id: input_substates.attr('data-country_id')
					},
					dataType: "json"
				})
						.then(function (json) {
							var item = json[0];
							// Create the DOM option that is pre-selected by default
							var option = new Option(item.name, item.id, true, true);
							// Append it to the select
							input_substates.append(option);
							input_substates.trigger('change.select2');
						});
			}


			selected_id = input_states.attr('data-value');

			if ("" != selected_id) {
				$.ajax({
					url: '/ajax/addresses/states',
					data: {
						state_id: selected_id
					},
					dataType: "json"
				})
						.then(function (json) {
							var item = json[0];
							// Create the DOM option that is pre-selected by default
							var option = new Option(item.name, item.id, true, true);
							// Append it to the select
							input_states.append(option);
							input_states.trigger('change.select2');
						});


			}
		});
	})(jQuery, window, document);
</script>
@endpush

@if (config('addresses.show_country') && $show_country)
	<div class="form-group">
		{!! Form::label($prefix . '_address_country', trans('widgets/addressfields.country_address'), ['class'=>'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			{!! Addresses::selectCountry(
				$prefix . '_address_country',
				old($prefix . '_address_country', $address['country_id']),
				[
					'class' => 'form-control',
					'data-state_id' => $address['state_id']
				]
			) !!}
		</div>
	</div>
@endif

@if (config('addresses.show_state') && $show_state)
	<div class="form-group">
		{!! Form::label($prefix . '_address_state_id', trans('widgets/addressfields.state_or_province_address'), ['class'=>'col-sm-3 control-label']) !!}
		<div class="col-sm-9">
			<select id="{{ $prefix }}_address_state_id" class="form-control" name="{{ $prefix }}_address_state_id"
					data-value="{{ old($prefix . '_address_state_id', $address['state_id']) }}"
					data-country_id="{{ old($prefix . '_address_country', $address['country_id']) }}"
			></select>
		</div>
	</div>
@endif

<div class="form-group">
	{!! Form::label($prefix . '_address_substate_id', trans('widgets/addressfields.substate_address'), ['class'=>'col-sm-3 control-label']) !!}
	<div class="col-sm-9">
		<select id="{{ $prefix }}_address_substate_id" class="form-control" name="{{ $prefix }}_address_substate_id"
				data-value="{{ old($prefix . '_address_substate_id', $address['substate_id']) }}"
				data-country_id="{{ old($prefix . '_address_country', $address['country_id']) }}"
		></select>
	</div>
</div>

<div class="form-group">
	{!! Form::label($prefix . '_address_street', trans('widgets/addressfields.street_address'), ['class'=>'col-sm-3 control-label']) !!}
	<div class="col-sm-9">
		{!! Form::text($prefix . '_address_street', old($prefix . '_address_street', $address['street']), ['class'=>'form-control']) !!}
		{!! Form::text($prefix . '_address_street_extra', old($prefix . '_address_street_extra', $address['street_extra']), ['class'=>'form-control', 'style'=>'margin-top:6px;']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label($prefix . '_address_city', trans('widgets/addressfields.city_or_town_address'), ['class'=>'col-sm-3 control-label']) !!}
	<div class="col-sm-4">
		{!! Form::text($prefix . '_address_city', old($prefix . '_address_city', $address['city']), ['class'=>'form-control']) !!}
	</div>
	{!! Form::label($prefix . '_address_zip', trans('widgets/addressfields.zipcode_or_postal_code_address'), ['class'=>'col-sm-2 control-label']) !!}
	<div class="col-sm-3">
		{!! Form::text($prefix . '_address_zip', old($prefix . '_address_zip', $address['zip']), ['class'=>'form-control']) !!}
	</div>
</div>
