(function ($, W, D) {
    'use strict';

    Highcharts
        .chart('google-analytics-container', {
            credits: {
                enabled: false
            },
            chart: {
                type: 'line'
            },
            title: {
                text: 'Traffic analyses'
            },
            subtitle: {
                text: 'Source: Google Analytics'
            },
            xAxis: {
                categories: google_analytics_dates
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: 'Visitors',
                data: google_analytics_visitors
            },
                {
                    name: 'Page views',
                    data: google_analytics_pageViews
                }]
        });
})(window.jQuery, window, document);
