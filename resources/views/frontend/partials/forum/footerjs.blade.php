<script src="{{ mix('js/frontend/layouts/core.js') }}"></script>
<script>
	var toggle = $('input[type=checkbox][data-toggle-all]');
	var checkboxes = $('table tbody input[type=checkbox]');
	var actions = $('[data-actions]');
	var forms = $('[data-actions-form]');
	var confirmString = "{{ trans('forum::general.generic_confirm') }}";

	function setToggleStates() {
		checkboxes.prop('checked', toggle.is(':checked')).change();
	}

	function setSelectionStates() {
		checkboxes.each(function() {
			var tr = $(this).parents('tr');

			$(this).is(':checked') ? tr.addClass('active') : tr.removeClass('active');

			checkboxes.filter(':checked').length ? $('[data-bulk-actions]').removeClass('hidden') : $('[data-bulk-actions]').addClass('hidden');
		});
	}

	function setActionStates() {
		forms.each(function() {
			var form = $(this);
			var method = form.find('input[name=_method]');
			var selected = form.find('select[name=action] option:selected');
			var depends = form.find('[data-depends]');

			selected.each(function() {
				if ($(this).attr('data-method')) {
					method.val($(this).data('method'));
				} else {
					method.val('patch');
				}
			});

			depends.each(function() {
				(selected.val() == $(this).data('depends')) ? $(this).removeClass('hidden') : $(this).addClass('hidden');
			});
		});
	}

	setToggleStates();
	setSelectionStates();
	setActionStates();

	toggle.click(setToggleStates);
	checkboxes.change(setSelectionStates);
	actions.change(setActionStates);

	forms.submit(function() {
		var action = $(this).find('[data-actions]').find(':selected');

		if (action.is('[data-confirm]')) {
			return confirm(confirmString);
		}

		return true;
	});

	$('form[data-confirm]').submit(function() {
		return confirm(confirmString);
	});
</script>
<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '{{ env('FACEBOOK_CONSUMER_KEY') }}',
			xfbml      : true,
			version    : 'v2.9'
		});
		FB.AppEvents.logPageView();
	};
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
@yield('js')
