'use strict';
$(document).ready(function () {

    var data = [
            { y: '1390', a: 50, b: 90},
            { y: '1391', a: 65,  b: 75},
            { y: '1392', a: 50,  b: 50},
            { y: '1393', a: 75,  b: 60},
            { y: '1394', a: 80,  b: 65},
            { y: '1395', a: 90,  b: 70},
            { y: '1396', a: 100, b: 75},
            { y: '1397', a: 115, b: 75},
            { y: '1398', a: 120, b: 85},
            { y: '1399', a: 145, b: 85},
            { y: '1400', a: 160, b: 95}
        ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['earnings'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray']
        };
    config.element = 'line-chart';
    Morris.Line(config);
});