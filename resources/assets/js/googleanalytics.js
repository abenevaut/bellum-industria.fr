if ('production' === bellumindustria.environment)
{
	const dimensions = {
		TRACKING_VERSION: 'dimension1',
		CLIENT_ID: 'dimension2',
		WINDOW_ID: 'dimension3',
		HIT_ID: 'dimension4',
		HIT_TIME: 'dimension5',
		HIT_TYPE: 'dimension6',
		USER_ID: 'dimension7',
		ROLE_ID: 'dimension8'
	};

	function uuid(a) {
		return a
			? (a ^ Math.random() * 16 >> a / 4).toString(16)
			: ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, uuid);
	}

	(function (i, s, o, g, r, a, m) {
		i['GoogleAnalyticsObject'] = r;
		i[r] = i[r] || function () {
			(i[r].q = i[r].q || []).push(arguments)
		}, i[r].l = 1 * new Date();
		a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
		a.async = 1;
		a.src = g;
		m.parentNode.insertBefore(a, m)
	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

	ga('create', 'UA-91882126-1', 'auto', 'production');
	ga('create', 'UA-91882126-3', 'auto', 'test');

	ga('production.set', 'transport', 'beacon');
	ga('test.set', 'transport', 'beacon');

	ga('production.set', dimensions.TRACKING_VERSION, BELLUMINDUSTRIA_VERSION);
	ga('test.set', dimensions.TRACKING_VERSION, BELLUMINDUSTRIA_VERSION);

	ga(function() {
		ga.getByName('production').set(dimensions.CLIENT_ID, ga.getByName('production').get('clientId'));
		ga.getByName('test').set(dimensions.CLIENT_ID, ga.getByName('test').get('clientId'));
	});

	ga('production.set', dimensions.WINDOW_ID, uuid());
	ga('test.set', dimensions.WINDOW_ID, uuid());

	ga(function() {
		var originalBuildHitTask = ga.getByName('production').get('buildHitTask');
		ga.getByName('production').set('buildHitTask', function(model) {
			model.set(dimensions.HIT_ID, uuid(), true);
			model.set(dimensions.HIT_TIME, String(+new Date), true);
			model.set(dimensions.HIT_TYPE, model.get('hitType'), true);
			originalBuildHitTask(model);
		});
		originalBuildHitTask = ga.getByName('test').get('buildHitTask');
		ga.getByName('test').set('buildHitTask', function(model) {
			model.set(dimensions.HIT_ID, uuid(), true);
			model.set(dimensions.HIT_TIME, String(+new Date), true);
			model.set(dimensions.HIT_TYPE, model.get('hitType'), true);
			originalBuildHitTask(model);
		});
	});

	ga('production.set', dimensions.USER_ID, BELLUMINDUSTRIA_USER_ID);
	ga('test.set', dimensions.USER_ID, BELLUMINDUSTRIA_USER_ID);

	ga('production.set', dimensions.ROLE_ID, BELLUMINDUSTRIA_USER_ROLE);
	ga('test.set', dimensions.ROLE_ID, BELLUMINDUSTRIA_USER_ROLE);

	function trackError(error, fieldsObj) {
		if (typeof(fieldsObj) === 'undefined') {
			fieldsObj = {};
		}
		ga('production.send', 'event', Object.assign({
			eventCategory: 'Script',
			eventAction: 'error',
			eventLabel: (error && error.stack) || '(not set)',
			nonInteraction: true
		}, fieldsObj));
		ga('test.send', 'event', Object.assign({
			eventCategory: 'Script',
			eventAction: 'error',
			eventLabel: (error && error.stack) || '(not set)',
			nonInteraction: true
		}, fieldsObj));
	}
	function trackErrors() {
		const loadErrorEvents = window.__e && window.__e.q || [];
		const fieldsObj = {eventAction: 'uncaught error'};
		// Replay any stored load error events.
		for (i = 0; i < loadErrorEvents.length; i++) {
			trackError(loadErrorEvents[i].error, fieldsObj);
		}
		// Add a new listener to track event immediately.
		window.addEventListener('error', function(event) {
			trackError(event.error, fieldsObj);
		});
	}
	trackErrors();

	function sendNavigationTimingMetrics() {

		const metrics = {
			RESPONSE_END_TIME: 'metric1',
			DOM_LOAD_TIME: 'metric2',
			WINDOW_LOAD_TIME: 'metric3'
		};

		// Only track performance in supporting browsers.
		if (!(window.performance && window.performance.timing)) {
			return;
		}

		// If the window hasn't loaded, run this function after the `load` event.
		if (document.readyState !== 'complete') {
			window.addEventListener('load', sendNavigationTimingMetrics);
			return;
		}

		var nt = performance.timing;
		var navStart = nt.navigationStart;
		var responseEnd = Math.round(nt.responseEnd - navStart);
		var domLoaded = Math.round(nt.domContentLoadedEventStart - navStart);
		var windowLoaded = Math.round(nt.loadEventStart - navStart);

		// In some edge cases browsers return very obviously incorrect NT values,
		// e.g. 0, negative, or future times. This validates values before sending.
		function allValuesAreValid(values) {
			return values.every(function(value) {
				return value > 0 && value < 1e6;
			});
		}

		if (allValuesAreValid([responseEnd, domLoaded, windowLoaded])) {

			var data = {
				eventCategory: 'Navigation Timing',
				eventAction: 'track',
				nonInteraction: true
			};

			data[metrics.RESPONSE_END_TIME] = responseEnd;
			data[metrics.DOM_LOAD_TIME] = domLoaded;
			data[metrics.WINDOW_LOAD_TIME] = windowLoaded;

			ga('production.send', 'event', data);
			ga('test.send', 'event', data);
		}
	}
	sendNavigationTimingMetrics();

	ga('production.send', 'pageview');
	ga('test.send', 'pageview');
}
