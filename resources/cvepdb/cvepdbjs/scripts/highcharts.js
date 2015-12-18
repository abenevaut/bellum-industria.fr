(function($,W,D){

	/*
	 * Valeur par defaut des configurations de highcharts
	 */
	var highcharts_default = {
		colors: ['#9B9B9B','#575757','#F37934', '#D8D8D8'], // rouge espace formateur #e96865
		series: [{
			turboThreshold: 0
		}],
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: 0,
			y: 0,
			backgroundColor: '#FFF',
			borderColor: '#FFF'
		},
		tooltip: {
			crosshairs: true,
			shared: true,
			backgroundColor: '#FFF',
			borderColor: '#FFF',
			borderRadius: 0,
			borderWidth: 0
		},
		plotOptions: {
			spline: {
				marker: {
					radius: 4,
					lineColor: '#666666',
					lineWidth: 1
				}
			}
		}
	};

	// Main object to manage graphics
	var _graph = {
		options: {
			// Graphique nuage de points lies
			'graph_spline': {
				colors: highcharts_default.colors,
				chart: {
					type: 'spline',
					marginRight: 0
				},
				credits: {
					enabled: false
				},
				series: highcharts_default.series,
				legend: highcharts_default.legend,
				tooltip: highcharts_default.tooltip,
				plotOptions: highcharts_default.plotOptions
			},
			// Graphique cammembert
			'graph_pie': {
				colors: highcharts_default.colors,
				chart: {
					type: 'pie',
					marginRight: 0,
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				credits: {
					enabled: false
				},
				series: highcharts_default.series,
				legend: highcharts_default.legend,
				tooltip: highcharts_default.tooltip,
				plotOptions: highcharts_default.plotOptions
			},
			// Graphique baton
			'graph_column': {
				colors: highcharts_default.colors,
				chart: {
					type: 'column',
					marginRight: 0
				},
				credits: {
					enabled: false
				},
				series: highcharts_default.series,
				legend: highcharts_default.legend,
				tooltip: highcharts_default.tooltip,
				plotOptions: highcharts_default.plotOptions
			}
		} // !options

	};

	/**
	 *
	 * @type {{initialize: initialize, generate_graph: generate_graph}}
	 */
	_graph.highcharts = {
		/*
		 * Initialize
		 *
		 * graph.highcharts.initialize();
		 *
		 * Fonction lance a la reception de l'evenement "fenetre en chargement". Cette fonction initialize les attributs de l'objet
		 * Highcharts qui permet la generation des graphiques.
		 */
		setup: function() {
			cvepdb.debug('highcharts.js > setup : success : Start');

			head.load({'CVEPDB_HIGHCHARTS_READY': cvepdb_config.URL_THEME + "/js/cvepdb/libs/highcharts/highcharts.js"}, function(){
				_pdlf.debug(
				  'highcharts.js > setup : success : Chargement du fichier highcharts.js grace a headJS'
				);
			});

			cvepdb.debug('highcharts.js > graph.highcharts.initialize : success : End');
		},
		/*
		 * Generate_graph
		 *
		 * graph.highcharts.generate_graph();
		 *
		 * Fonction qui permet la generation de graphique de type nuage de point (avec les points lies).
		 */
		generate_graph : function(data, options) {
			cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : Start');

			if (data.title == undefined || data.subtitle == undefined) {
				cvepdb.error(
				  'highcharts.js > graph.highcharts.generate_graph : error : Vous devez definir un titre a votre graphique.'
				);
				return (-1);
			}
			else {
				options.title = { text: data.title };
				options.subtitle = { text: data.subtitle };
			}

			// On specifie le container html du graph
			if (data.container == undefined) {
				cvepdb.error(
				  'highcharts.js > graph.highcharts.generate_graph : error : Vous devez definir un container a votre graphique.'
				);
				return (-1);
			}
			else {
				options.chart.renderTo = data.container;
			}

			// On specifie la marge a droite du graph
			if (data.marginRight != undefined) {
				options.chart.marginRight = data.marginRight;

				cvepdb.debug(
				  'highcharts.js > graph.highcharts.generate_graph : success : data.marginRight = specified');
			}

			if (data.series != undefined) {
				options.series = data.series;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.series = specified');
			}

			if (data.xAxis != undefined) {
				options.xAxis = data.xAxis;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.xAxis = specified');
			}

			if (data.yAxis != undefined) {
				options.yAxis = data.yAxis;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.yAxis = specified');
			}

			if (data.tooltip != undefined) {
				options.tooltip = data.tooltip;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.tooltip = specified');
			}

			if (data.plotOptions != undefined) {
				options.plotOptions = data.plotOptions;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.plotOptions = specified');
			}

			if (data.legend != undefined) {
				options.legend = data.legend;

				cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : data.legend = specified');
			}

			$.ajax({
				url: data.json_path,
				dataType: "json",
				type: "GET",
				success: function (json) {

					$.each(options.series, function(index, value) {

						value.data = json[index];

						cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : debug =' + value.data);
					});
					var chart = new Highcharts.Chart(options);
				},
				complete: function (jqXHR, textStatus) {
					cvepdb.debug('highcharts.js > graph.highcharts.generate_graph : success : ajax : complete');
				},
				error: function(jqXHR, textStatus, errorThrown) {
					if (jqXHR.status == 0) {
						cvepdb.error('highcharts.js > graph.highcharts.generate_graph : error : Ajax Check Your Network.');
					}
					else if (jqXHR.status == 404) {
						cvepdb.error(
						  'highcharts.js > graph.highcharts.generate_graph : error : Ajax Requested URL not found (404).'
						);
					}
					else if (jqXHR.status == 500) {
						cvepdb.error('highcharts.js > graph.highcharts.generate_graph : error : Ajax Internel Server Error (500).');
					}
					else {
						cvepdb.error(
						  'highcharts.js > graph.highcharts.generate_graph : error : Ajax Unknow Error :' + jqXHR.responseText
						);
					}
				}
			});
		},
		generate_column : function(value){
			_graph.highcharts.generate_graph(value, _graph.options.graph_column);
		},
		generate_spline : function(value){
			_graph.highcharts.generate_graph(value, _graph.options.graph_spline);
		},
		generate_pie : function(value){
			_graph.highcharts.generate_graph(value, _graph.options.graph_pie);
		}
	}

	/**
	 * Reception de l'evenement head.ready pour le group 'pdlf_highcharts', ce qui confirme que highchartsJS a bien ete charger
	 * par headJS.
	 */
	head.ready('CVEPDB_HIGHCHARTS_READY', function(){
		cvepdb.debug('highcharts.js > CVEPDB_HIGHCHARTS_READY : success : highcharts loaded');
		$(D).trigger('CVEPDB_HIGHCHARTS_LOADED');
	});

	// Integre notre class a jQuery
	$.extend({
		graph: _graph
	});

	// A la fin du chargement du DOM
	$(D).bind('PDLF_HIGHCHARTS_READY', function(){
		cvepdb.debug('highcharts.js > PDLF_HIGHCHARTS_READY : success : Start');
		_graph.setup();
		cvepdb.debug('highcharts.js > PDLF_HIGHCHARTS_READY : success : End');
	});

})(jQuery, window, document);

pdlf.graph = $.graph;