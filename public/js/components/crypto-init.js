//title:Demo code for cryptocurrency

$(function () {
    /* ChartJS
     * -------
     * Data and config for chartjs
     */
    'use strict';
    var multiLineData = {
        labels: ["2012", "2013", "2014", "2015", "2016", "2017", "2018"],
        datasets: [{
                label: 'Bitcoin',
                data: [400, 600, 500, 600, 700, 600, 800],
                borderColor: [
                'rgba(255, 206, 86, 0.5)'
                ],
                borderWidth: 2,
                fill: false
            },
            {
                label: 'NEO',
                data: [200, 500, 400, 500, 600, 500, 600],
                borderColor: [
                'rgba(75, 192, 192, 0.5)'
                ],
                borderWidth: 2,
                fill: false
                },
            {
                label: 'DASH',
                data: [300, 600, 500, 300, 600, 300, 400],
                borderColor: [
                'rgba(54, 162, 235, 0.5)'
                ],
                borderWidth: 2,
                fill: false
                }
                ]
    };
    var options = {
        scales: {
            xAxes: [{
                gridLines: {
                    color: '#f5f6f7'
                }
            }],
            yAxes: [{
                gridLines: {
                    color: '#f5f6f7'
                }
            }]
        },
        legend: {
            display: false,
            labels: {
                fontColor: "#8f8f8f",
                fontSize: 12
            }
        },
        elements: {
            point: {
                radius: 2
            }
        }

    };
    // Get context with jQuery - using jQuery's .get() method.
    if ($("#linechart-multi").length) {
        var multiLineCanvas = $("#linechart-multi").get(0).getContext("2d");
        var lineChart = new Chart(multiLineCanvas, {
            type: 'line',
            data: multiLineData,
            options: options
        });
    }

});
