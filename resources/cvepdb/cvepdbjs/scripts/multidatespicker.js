(function($, W, D){

	// Main object to manage MultiDatesPicker
	var _multidatespicker = {};


	_multidatespicker = {
		minDate             : '',
		maxDate             : '',
		minDateSelectable   : '',
		maxDateSelectable   : '',
		classJSMDP          : 'js-mdp',
		classJSMDPList      : 'js-mdp-list__dates',
		classJSMDPListItem  : 'js-mdp-list__dates__item',
		count_years_holidays_generated : 0,
		count_years_holidays_to_generate : 0,
		holidays : [],

		/**
		 * Ajoute une date et selectionne cette date dans le calendrier
		 *
		 * @param date La date a ajoute
		 */
		add_date: function(date){
			$('.' + _multidatespicker.classJSMDP).multiDatesPicker('addDates', date);
		},

		/**
		 * Supprime une date et deselectionne cette date dans le calendrier
		 *
		 * @param date La date a supprime
		 */
		remove_date: function(date){
			$('.' + _multidatespicker.classJSMDP).multiDatesPicker('removeDates', date);
		},

		/**
		 * Reinitialise le calendrier en deselectionnant toutes les dates du calendrier.
		 */
		reset: function(){
			$('.' + _multidatespicker.classJSMDP).multiDatesPicker('resetDates', 'picked');
		},

		/**
		 * Méthode appelée au clic sur une date dans le calendrier
		 * Va afficher ou cacher une date dans la liste de dates
		 * Et si nécessaire créer des éléments du DOM dans la liste de dates
		 * @param date
		 */
		onSelect : function(date){
			cvepdb.debug(
			  'cvepdb_multidatespicker.js > _multidatespicker.onSelect : success : Start'
			);
			var newStatus = $('.' + _multidatespicker.classJSMDP)
			  .multiDatesPicker('gotDate', date) !== false; // true si active, false si desactive

			if (true == newStatus) {
				cvepdb.debug(
				  'cvepdb_multidatespicker.js > onSelect : success : CVEPDB_MULTIDATESPICKER_DATE_SELECTED'
				);
				$(D).trigger('CVEPDB_MULTIDATESPICKER_DATE_SELECTED', [date, 'false']);
			} else {
				cvepdb.debug(
				  'cvepdb_multidatespicker.js > onSelect : success : CVEPDB_MULTIDATESPICKER_DATE_UNSELECTED'
				);
				$(D).trigger('CVEPDB_MULTIDATESPICKER_DATE_UNSELECTED', [date]);
			}
			cvepdb.debug('cvepdb_multidatespicker.js > onSelect : success : End');
		},
		/**
		 *
		 * @param currentYears array d'années sur lesquelles on veut les jours fériés
		 * @param minDate
		 * @param maxDate
		 */
		setup : function(currentYears, minDate, maxDate){
			cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.setup : success : Start');

			$.each(currentYears, function(key, value){
				_multidatespicker.getHolidays(value);
			});
			_multidatespicker.count_years_holidays_to_generate = currentYears.length;

			if (typeof(minDate) === 'undefined') {
				minDate = null;
			}
			_multidatespicker.minDateSelectable = minDate;

			if (typeof(maxDate) === 'undefined') {
				maxDate = null;
			}

			if (1 == _multidatespicker.moyen) {
				_multidatespicker.maxDateSelectable = "+12M";
			} else if (2 == _multidatespicker.moyen) {
				_multidatespicker.maxDateSelectable = "+3M";
			} else if (maxDate != null) {
				_multidatespicker.maxDateSelectable = maxDate;
			} else {
				_multidatespicker.maxDateSelectable = null;
			}

			cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.setup : success : minDate = ' + minDate);

			$('.' + _multidatespicker.classJSMDP).multiDatesPicker({
				dateFormat: "yy-mm-dd",
				firstDay: 1,
				minDate: _multidatespicker.minDateSelectable,
				maxDate: _multidatespicker.maxDateSelectable,
				onSelect: function(date){
					cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.setup : success : onSelect -> date = ' + date);
					_multidatespicker.onSelect(date);
				}
			});

			cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.setup : success : End');
		},
		/**
		 * Methode pour ajouter les jours de vacances/feries au calendrier
		 */
		onHolidaysLoaded: function(holidays){
			$('.' + _multidatespicker.classJSMDP).multiDatesPicker({
				dateFormat: "yy-mm-dd",
				firstDay: 1,
				minDate: _multidatespicker.minDateSelectable,
				maxDate: _multidatespicker.maxDateSelectable,
				onSelect: function(date){
					cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.setup : success : onSelect -> date = ' + date);
					_multidatespicker.onSelect(date);
				},
				addDisabledDates: holidays
			});
		},
		/**
		 *
		 * @param year
		 */
		getHolidays : function(year){
			cvepdb.debug('cvepdb_multidatespicker.js > getHolidays : success : Start');
			//			var holidays = new Array();

			$.get(
			  pdlf.BASEURL + 'formateur/ajax/getholidays', {
				  year: year
			  },
			  function(json){
				  $.each(json, function(key, value){
					  _multidatespicker.holidays.push(value);
				  });
				  cvepdb.debug(
				    'cvepdb_multidatespicker.js > getHolidays : success : holidays = '
				      + _multidatespicker.holidays
				  );
				  _multidatespicker.count_years_holidays_generated++;

				  if (_multidatespicker.count_years_holidays_to_generate == _multidatespicker.count_years_holidays_generated) {
					  $(D).trigger(
					    'cvepdb_multidatespicker_HOLIDAYS_LOADED',
					    [_multidatespicker.holidays]
					  );
				  }
			  })
			  .success(function(){})
			  .error(function(jqXHR){
				  if (jqXHR.status == 0) {
					  cvepdb.error('cvepdb_multidatespicker.js > _multidatespicker.getHolidays : error : Ajax Check Your Network.');
				  }
				  else if (jqXHR.status == 404) {
					  cvepdb.error('cvepdb_multidatespicker.js > _multidatespicker.getHolidays : error : Ajax Requested URL not found (404).');
				  }
				  else if (jqXHR.status == 500) {
					  cvepdb.error('cvepdb_multidatespicker.js > _multidatespicker.getHolidays : error : Ajax Internel Server Error (500).');
				  }
				  else {
					  cvepdb.error('cvepdb_multidatespicker.js > _multidatespicker.getHolidays : error : Ajax Unknow Error :' + jqXHR.responseText);
				  }
			  })
			  .complete(function(){});

			cvepdb.debug('cvepdb_multidatespicker.js > _multidatespicker.getHolidays : success : End');
		}
	};

	$.extend({
		multidatespicker: _multidatespicker
	});

	$(D).bind('CVEPDB_MULTIDATESPICKER_READY', function(){
		cvepdb.debug('cvepdb_multidatespicker.js > ready : success : Start');
		cvepdb.debug('cvepdb_multidatespicker.js > ready : success : End');
	});

	$(D).bind('CVEPDB_GLOBALIZE_READY', function(){
		_pdlf.debug('cvepdb_multidatespicker.js > CVEPDB_GLOBALIZE_READY : success : Start');

		_pdlf.debug('cvepdb_multidatespicker.js > CVEPDB_GLOBALIZE_READY : success : End');
	});

	$(D).bind('cvepdb_multidatespicker_HOLIDAYS_LOADED', function(event, holidays){
		cvepdb.debug(
		  'cvepdb_multidatespicker.js > cvepdb_multidatespicker_HOLIDAYS_LOADED : success : Start'
		);
		_multidatespicker.onHolidaysLoaded(holidays);
		cvepdb.debug(
		  'cvepdb_multidatespicker.js > cvepdb_multidatespicker_HOLIDAYS_LOADED : success : End'
		);
	});

})(jQuery, window, document);

pdlf.multidatespicker = $.multidatespicker;/**
