$(function () {

	cvepdb.filter = {
		$content    : $('#filter-stage'),
		// filter form object
		$filter_form: $('#filters form'),

		//lets get the current module,  we will need to know where to post the search criteria
		f_module    : $('input[name="f_module"]').val(),

		// display GET information if browser allow it
		display_get_filters : true,

		// Allow to load filters immediatly after page load
		startup_load_filters : true,

		/**
		 * Constructor
		 */
		init     : function () {
			cvepdb.debug('cvepdb_filters.js > init : success : Start');

			$('a.cancel').button();

			//listener for select elements
			$('select', cvepdb.filter.$filter_form).on('change', function () {

				//build the form data
				form_data = cvepdb.filter.$filter_form.serialize();

				//fire the query
				cvepdb.filter.do_filter(cvepdb.filter.f_module, form_data);
			});

			//listener for select elements
			$('input[type="checkbox"]', cvepdb.filter.$filter_form).on('change', function () {

				//build the form data
				form_data = cvepdb.filter.$filter_form.serialize();

				//fire the query
				cvepdb.filter.do_filter(cvepdb.filter.f_module, form_data);
			});

			//listener for keywords
			$('input[type="text"]', cvepdb.filter.$filter_form).on('keyup', $.debounce(500, function () {

				//build the form data
				form_data = cvepdb.filter.$filter_form.serialize();

				cvepdb.filter.do_filter(cvepdb.filter.f_module, form_data);

			}));

			//listener for pagination
			$('body').on('click', '.pagination a', function (e) {
				e.preventDefault();
				url = $(this).attr('href');
				form_data = cvepdb.filter.$filter_form.serialize();
				cvepdb.filter.do_filter(cvepdb.filter.f_module, form_data, url);
			});

			//clear filters
			$('a.cancel', cvepdb.filter.$filter_form).click(function () {

				//reset the defaults
				//$('select', filter_form).children('option:first').addAttribute('selected', 'selected');
				$('select', cvepdb.filter.$filter_form).val('0');

				//clear text inputs
				$('input[type="text"]').val('');

				//build the form data
				form_data = cvepdb.filter.$filter_form.serialize();

				cvepdb.filter.do_filter(cvepdb.filter.f_module, form_data);
			});

			//prevent default form submission
			cvepdb.filter.$filter_form.submit(function (e) {
				e.preventDefault();
			});

			if (cvepdb.filter.startup_load_filters) {
				// trigger an event to submit immediately after page load
				cvepdb.filter.$filter_form.find('select').first().trigger('change');
			}

			cvepdb.debug('cvepdb_filters.js > init : success : End');
		},

		//launch the query based on module
		do_filter: function (module, form_data, url) {
			form_action = cvepdb.filter.$filter_form.attr('action');
			post_url = form_action ? form_action : cvepdb_config.URL_SITE + module;

			if (typeof url !== 'undefined') {
				post_url = url;
			}

			cvepdb.filter.$content.fadeOut('fast', function () {

				cvepdb.debug(post_url);
				cvepdb.debug(form_data);

				if (window.history.length && cvepdb.filter.display_get_filters) {
					window.history.pushState(form_data, "filters", post_url + '?' + form_data);
				}

				//send the request to the server
				$.get(post_url, form_data, function (data, response, xhr) {

					cvepdb.debug(data);
					cvepdb.debug(response);
					cvepdb.debug(xhr);

					var ct = xhr.getResponseHeader('content-type') || '', html = '';

					if (ct.indexOf('application/json') > -1 && typeof data == 'object') {
						html = 'html' in data ? data.html : '';

						cvepdb.filter.handler_response_json(data);
					} else {
						html = data;
					}

					//success stuff here
					// cvepdb.chosen();
					cvepdb.filter.$content.html(html).fadeIn('fast');
				});
			});
		},

		handler_response_json: function (json) {
			if ('update_filter_field' in json && typeof json.update_filter_field == 'object') {
				$.each(json.update_filter_field, cvepdb.filter.update_filter_field);
			}
		},

		update_filter_field: function (field, data) {
			var $field = cvepdb.filter.$filter_form.find('[name=' + field + ']');

			if ($field.is('select')) {
				if (typeof data == 'object') {
					if ('options' in data) {
						var selected, value;

						selected = $field.val();
						$field.children('option').remove();

						for (value in data.options) {
							$field.append('<option value="' + value + '"' + (value == selected ? ' selected="selected"' : '') + '>' + data.options[value] + '</option>');
						}
					}
				}
			}
		}
	};
});