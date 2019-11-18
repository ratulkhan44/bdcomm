//title:Demo code for CRM Dashboard

$(function () {
    'use strict';
    var data = [
        {
            y: 'Monday',
            a: 5000,
            b: 4500
        },
        {
            y: 'Tuesday',
            a: 1000,
            b: 800
        },
        {
            y: 'Wednesday',
            a: 4000,
            b: 5000
        },
        {
            y: 'Thursday',
            a: 9000,
            b: 8000
        },
        {
            y: 'Friday',
            a: 12000,
            b: 8000
        },
        {
            y: 'Saturday',
            a: 5000,
            b: 3500
        },
        {
            y: 'Sunday',
            a: 13000,
            b: 1100
        }
    ];
    if ($('#morrisbarchart').length) {
        var config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Total Income', 'Total Outcome'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            barGap: 4,
            barSizeRatio: 0.44,
            resize: true,
            redraw: true,
            barColors: ['rgba(54, 162, 235, 0.43)',
        'rgb(233, 235, 238)'
        ],
        };
        config.element = 'morrisbarchart';
        Morris.Bar(config);
    }
    if ($('#morrisdonutchart').length) {
        Morris.Donut({
            element: 'morrisdonutchart',
            colors: ['rgba(54, 162, 235, 1)',
                    'rgb(236, 72, 99)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(75, 192, 192, 1)'],
            labelColor: 'rgba(54, 162, 235, 0.43)',
            data: [
                {
                    label: "New Started",
                    value: 20
                },
                {
                    label: "In Progress",
                    value: 45
                },
                {
                    label: "On Hold",
                    value: 10
                },
                {
                    label: "Finished",
                    value: 25
                }
                ],
            resize: true,
            redraw: true
        });
    }
});
