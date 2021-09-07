'use strict';
$(document).ready(function () {
    // Apex.chart = {
    //     fontFamily: 'inherit',
    //     locales: [{
    //         "name": "fa",
    //         "options": {
    //             "months": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
    //             "shortMonths": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
    //             "days": ["یکشنبه", "دوشنبه", "سه‌شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
    //             "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
    //             "toolbar": {
    //                 "exportToSVG": "دریافت SVG",
    //                 "exportToPNG": "دریافت PNG",
    //                 "menu": "فهرست",
    //                 "selection": "انتخاب",
    //                 "selectionZoom": "بزرگنمایی قسمت انتخاب شده",
    //                 "zoomIn": "بزرگ نمایی",
    //                 "zoomOut": "کوچک نمایی",
    //                 "pan": "جا به جایی",
    //                 "reset": "بازنشانی بزرگ نمایی"
    //             }
    //         }
    //     }],
    //     defaultLocale: "fa"
    // }
    var colors = {
        primary: $('.colors .bg-primary').css('background-color'),
        primaryLight: $('.colors .bg-primary-bright').css('background-color'),
        secondary: $('.colors .bg-secondary').css('background-color'),
        secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
        info: $('.colors .bg-info').css('background-color'),
        infoLight: $('.colors .bg-info-bright').css('background-color'),
        success: $('.colors .bg-success').css('background-color'),
        successLight: $('.colors .bg-success-bright').css('background-color'),
        danger: $('.colors .bg-danger').css('background-color'),
        dangerLight: $('.colors .bg-danger-bright').css('background-color'),
        warning: $('.colors .bg-warning').css('background-color'),
        warningLight: $('.colors .bg-warning-bright').css('background-color'),
    };

    /**
     *  Slick slide example
     **/

    if ($('.slick-single-item').length) {
        $('.slick-single-item').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            prevArrow: '.slick-single-arrows a:eq(0)',
            nextArrow: '.slick-single-arrows a:eq(1)',
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 540,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    if ($('.reportrange').length > 0) {


        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            
            var start = moment(start); // pass your date obj here.
            console.log(start.format('jYYYY/jM/jD'));

            var end = moment(end); // pass your date obj here.
            console.log(end.format('jYYYY/jM/jD'));


            $('.reportrange .text').html(start.format('jYYYY/jM/jD') + ' - ' + end.format('jYYYY/jM/jD'));
        }

        $('.reportrange').daterangepicker({
           
             months: ['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند'],
            
            startDate: start,
            endDate: end,
            ranges: {
                'امروز': [moment(), moment()],
                'دیروز': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'هفته گذشته': [moment().subtract(6, 'days'), moment()],
                'ماه گذشته': [moment().subtract(29, 'days'), moment()],
                'این ماه': [moment().startOf('month'), moment().endOf('month')],
                'آخرین ماه': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "locale": {
				"format": "jYYYY/jM/jD",
				"separator": " - ",
				"applyLabel": "اعمال",
				"cancelLabel": "انصراف",
				"fromLabel": "از",
				"toLabel": "تا",
				"customRangeLabel": "سفارشی",
				"weekLabel": "هف",
				"daysOfWeek": [
					"ی",
					"د",
					"س",
					"چ",
					"پ",
					"ج",
					"ش"
				],
				"monthNames": [
					"ژانویه",
					"فوریه",
					"مارس",
					"آوریل",
					"می",
					"ژوئن",
					"جولای",
					"آگوست",
					"سپتامبر",
					"اکتبر",
					"نوامبر",
					"دسامبر"
				],
				"firstDay": 6
            }     
            
        }, cb);

        cb(start, end);

        
        // console.log("start.format('jYYYY/jM/jD')",start.format('jYYYY/jM/jD') );
        // console.log("end.format('jYYYY/jM/jD')",end.format('jYYYY/jM/jD') );
        //console.log("cb.format('jYYYY/jM/jD')",cb.format('jYYYY/jM/jD') );
    }

    var chartColors = {
        primary: {
            base: '#3f51b5',
            light: '#c0c5e4'
        },
        danger: {
            base: '#f2125e',
            light: '#fcd0df'
        },
        success: {
            base: '#0acf97',
            light: '#cef5ea'
        },
        warning: {
            base: '#ff8300',
            light: '#ffe6cc'
        },
        info: {
            base: '#00bcd4',
            light: '#e1efff'
        },
        dark: '#37474f',
        facebook: '#3b5998',
        twitter: '#55acee',
        linkedin: '#0077b5',
        instagram: '#517fa4',
        whatsapp: '#25D366',
        dribbble: '#ea4c89',
        google: '#DB4437',
        borderColor: '#e8e8e8',
        fontColor: '#999'
    };

    if ($('body').hasClass('dark')) {
        chartColors.borderColor = 'rgba(255, 255, 255, .1)';
        chartColors.fontColor = 'rgba(255, 255, 255, .4)';
    }

    /// Chartssssss

    chart_demo_1();

    chart_demo_2();

    chart_demo_3();

    chart_demo_4();

    chart_demo_5();

    chart_demo_6();

    chart_demo_7();

    chart_demo_8();

    chart_demo_9();

    chart_demo_10();

    function chart_demo_1() {
        if ($('#chart_demo_1').length) {
            var element = document.getElementById("chart_demo_1");
            element.height = 146;
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["1390", "1391", "1392", "1393", "1394", "1395", "1396", "1397"],
                    datasets: [
                        {
                            label: "Total Sales",
                            backgroundColor: colors.primary,
                            data: [133, 221, 783, 978, 214, 421, 211, 577]
                        }, {
                            label: "Average",
                            backgroundColor: colors.info,
                            data: [408, 947, 675, 734, 325, 672, 632, 213]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontSize: 11,
                                fontColor: chartColors.fontColor
                            },
                            gridLines: {
                                color: chartColors.borderColor
                            }
                        }],
                    }
                }
            })
        }
    }

    function chart_demo_2() {
        if ($('#chart_demo_2').length) {
            var ctx = document.getElementById('chart_demo_2').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["مهر 1398", "آبان 1398", "دی 1398", "بهمن 1398", "اسفند 1398", "فروردین 1398", "اردیبعشت 1398", "اردیبعشت 1399", "اسفند 1399", "بهمن 1399", "دی 1399", "آذر 1399"],
                    datasets: [{
                        label: "Rainfall",
                        backgroundColor: chartColors.primary.light,
                        borderColor: chartColors.primary.base,
                        data: [26.4, 39.8, 66.8, 66.4, 40.6, 55.2, 77.4, 69.8, 57.8, 76, 110.8, 142.6],
                    }]
                },
                options: {
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'پیشبینی در توکیو',
                        fontColor: chartColors.fontColor,
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'پیشبینی در ..',
                                fontColor: chartColors.fontColor,
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_3() {
        if ($('#chart_demo_3').length) {
            var element = document.getElementById("chart_demo_3"),
                ctx = element.getContext("2d");


            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                    datasets: [{
                        label: 'موفقیت',
                        borderColor: colors.success,
                        data: [-10, 30, -20, 0, 25, 44, 30, 15, 20, 10, 5, -5],
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        borderDash: [2, 2],
                        fill: false
                    }, {
                        label: 'برگشتی',
                        fill: false,
                        borderDash: [2, 2],
                        borderColor: colors.danger,
                        data: [20, 0, 22, 39, -10, 19, -7, 0, 15, 0, -10, 5],
                        pointRadius: 5,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    title: {
                        display: false,
                        fontColor: chartColors.fontColor
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: -50,
                                max: 50
                            }
                        }],
                    }
                }
            });

        }
    }

    function chart_demo_4() {
        if ($('#chart_demo_4').length) {
            var ctx = document.getElementById("chart_demo_4").getContext("2d");
            var densityData = {
                backgroundColor: chartColors.primary.light,
                data: [10, 20, 40, 60, 80, 40, 60, 80, 40, 80, 20, 59]
            };
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                    datasets: [densityData]
                },
                options: {
                    scaleFontColor: "#FFFFFF",
                    legend: {
                        display: false,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: 0,
                                max: 100,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_5() {
        if ($('#chart_demo_5').length) {
            var ctx = document.getElementById('chart_demo_5').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['مهر', 'آبان', 'آذر', 'دی', 'بهمن'],
                    datasets: [
                        {
                            label: 'Dataset 1',
                            backgroundColor: [
                                chartColors.info.base,
                                chartColors.success.base,
                                chartColors.danger.base,
                                chartColors.dark,
                                chartColors.warning.base,
                            ],
                            yAxisID: 'y-axis-1',
                            data: [33, 56, -40, 25, 45]
                        },
                        {
                            label: 'Dataset 2',
                            backgroundColor: chartColors.info.base,
                            yAxisID: 'y-axis-2',
                            data: [23, 86, -40, 5, 45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Chart.js Bar Chart - Multi Axis',
                        fontColor: chartColors.fontColor
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [
                            {
                                type: 'linear',
                                display: true,
                                position: 'left',
                                id: 'y-axis-1',
                            },
                            {
                                gridLines: {
                                    color: chartColors.borderColor
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            },
                            {
                                type: 'linear',
                                display: true,
                                position: 'right',
                                id: 'y-axis-2',
                                gridLines: {
                                    drawOnChartArea: false
                                },
                                ticks: {
                                    fontColor: chartColors.fontColor
                                }
                            }
                        ],
                    }
                }
            });
        }
    }

    function chart_demo_6() {
        if ($('#chart_demo_6').length) {
            var ctx = document.getElementById("chart_demo_6").getContext("2d");
            var speedData = {
                labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
                datasets: [{
                    label: "Car Speed (mph)",
                    borderColor: chartColors.primary.base,
                    backgroundColor: 'rgba(0, 0, 0, 0',
                    data: [0, 59, 75, 20, 20, 55, 40]
                }]
            };
            var chartOptions = {
                legend: {
                    scaleFontColor: "#FFFFFF",
                    position: 'top',
                    labels: {
                        fontColor: chartColors.fontColor
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: chartColors.borderColor
                        },
                        ticks: {
                            fontColor: chartColors.fontColor
                        }
                    }]
                }
            };
            new Chart(ctx, {
                type: 'line',
                data: speedData,
                options: chartOptions
            });
        }
    }

    function chart_demo_7() {
        if ($('#chart_demo_7').length) {
            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        borderWidth: 3,
                        borderColor: $('body').hasClass('dark') ? "#313852" : "rgba(255, 255, 255, 1)",
                        data: [
                            1242,
                            742,
                            442,
                            1742
                        ],
                        backgroundColor: [
                            colors.danger,
                            colors.info,
                            colors.warning,
                            colors.success
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'Organic Search',
                        'Email',
                        'Refferal',
                        'Social Media',
                    ]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: false
                    }
                }
            };

            var ctx = document.getElementById('chart_demo_7').getContext('2d');
            new Chart(ctx, config);
        }
    }

    function chart_demo_8() {
        if ($('#chart_demo_8').length) {
            new Chart(document.getElementById("chart_demo_8"), {
                type: 'radar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                            label: "1950",
                            fill: true,
                            backgroundColor: "rgba(179,181,198,0.2)",
                            borderColor: "rgba(179,181,198,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(179,181,198,1)",
                            data: [-8.77, -55.61, 21.69, 6.62, 6.82]
                        }, {
                            label: "2050",
                            fill: true,
                            backgroundColor: "rgba(255,99,132,0.2)",
                            borderColor: "rgba(255,99,132,1)",
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(255,99,132,1)",
                            data: [-25.48, 54.16, 7.61, 8.06, 4.45]
                        }
                    ]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scale: {
                        gridLines: {
                            color: chartColors.borderColor
                        }
                    },
                    title: {
                        display: true,
                        text: 'Distribution in % of world population',
                        fontColor: chartColors.fontColor
                    }
                }
            });
        }
    }

    function chart_demo_9() {
        if ($('#chart_demo_9').length) {
            new Chart(document.getElementById("chart_demo_9"), {
                type: 'horizontalBar',
                data: {
                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                    datasets: [
                        {
                            label: "Population (millions)",
                            backgroundColor: colors.primary,
                            data: [2478, 2267, 734, 1284, 1933]
                        }
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor,
                                display: false
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            },
                            barPercentage: 0.5
                        }]
                    }
                }
            });
        }
    }

    function chart_demo_10() {
        if ($('#chart_demo_10').length) {
            var element = document.getElementById("chart_demo_10");
            new Chart(element, {
                type: 'bar',
                data: {
                    labels: ["1900", "1950", "1999", "2050"],
                    datasets: [
                        {
                            label: "Europe",
                            type: "line",
                            borderColor: "#8e5ea2",
                            data: [408, 547, 675, 734],
                            fill: false
                        },
                        {
                            label: "Africa",
                            type: "line",
                            borderColor: "#3e95cd",
                            data: [133, 221, 783, 2478],
                            fill: false
                        },
                        {
                            label: "Europe",
                            type: "bar",
                            backgroundColor: chartColors.primary.base,
                            data: [408, 547, 675, 734],
                        },
                        {
                            label: "Africa",
                            type: "bar",
                            backgroundColor: chartColors.primary.light,
                            data: [133, 221, 783, 2478]
                        }
                    ]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Population growth (millions): Europe & Africa',
                        fontColor: chartColors.fontColor
                    },
                    legend: {
                        display: true,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }]
                    }
                }
            });
        }
    }

    if ($('#circle-1').length) {
        $('#circle-1').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 90,
            thickness: 10,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#sales-circle-graphic').length) {
        $('#sales-circle-graphic').circleProgress({
            startAngle: 1.55,
            value: 0.65,
            size: 180,
            thickness: 30,
            fill: {
                color: colors.primary
            }
        });
    }

    if ($('#circle-2').length) {
        $('#circle-2').circleProgress({
            startAngle: 1.55,
            value: 0.35,
            size: 90,
            thickness: 10,
            fill: {
                color: colors.warning
            }
        });
    }

    ////////////////////////////////////////////

    if ($(".dashboard-pie-1").length) {
        $(".dashboard-pie-1").peity("pie", {
            fill: [colors.primaryLight, colors.primary],
            radius: 30
        });
    }

    if ($(".dashboard-pie-2").length) {
        $(".dashboard-pie-2").peity("pie", {
            fill: [colors.successLight, colors.success],
            radius: 30
        });
    }

    if ($(".dashboard-pie-3").length) {
        $(".dashboard-pie-3").peity("pie", {
            fill: [colors.warningLight, colors.warning],
            radius: 30
        });
    }

    if ($(".dashboard-pie-4").length) {
        $(".dashboard-pie-4").peity("pie", {
            fill: [colors.infoLight, colors.info],
            radius: 30
        });
    }

    ////////////////////////////////////////////

    function bar_chart() {
        if ($('#chart-ticket-status').length > 0) {
            var dataSource = [
                {country: "USA", hydro: 59.8, oil: 937.6, gas: 582, coal: 564.3, nuclear: 187.9},
                {country: "China", hydro: 74.2, oil: 308.6, gas: 35.1, coal: 956.9, nuclear: 11.3},
                {country: "Russia", hydro: 40, oil: 128.5, gas: 361.8, coal: 105, nuclear: 32.4},
                {country: "Japan", hydro: 22.6, oil: 241.5, gas: 64.9, coal: 120.8, nuclear: 64.8},
                {country: "India", hydro: 19, oil: 119.3, gas: 28.9, coal: 204.8, nuclear: 3.8},
                {country: "Germany", hydro: 6.1, oil: 123.6, gas: 77.3, coal: 85.7, nuclear: 37.8}
            ];

            // Return with commas in between
            var numberWithCommas = function (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            };

            var dataPack1 = [40, 47, 44, 38, 27, 40, 47, 44, 38, 27, 40, 27];
            var dataPack2 = [10, 12, 7, 5, 4, 10, 12, 7, 5, 4, 10, 12];
            var dataPack3 = [17, 11, 22, 18, 12, 17, 11, 22, 18, 12, 17, 11];
            var dates = ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"];

            var bar_ctx = document.getElementById('chart-ticket-status');

            bar_ctx.height = 115;

            new Chart(bar_ctx, {
                    type: 'bar',
                    data: {
                        labels: dates,
                        datasets: [
                            {
                                label: 'New Tickets',
                                data: dataPack1,
                                backgroundColor: colors.primary,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Solved Tickets',
                                data: dataPack2,
                                backgroundColor: colors.success,
                                hoverBorderWidth: 0
                            },
                            {
                                label: 'Pending Tickets',
                                data: dataPack3,
                                backgroundColor: colors.info,
                                hoverBorderWidth: 0
                            },
                        ]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        animation: {
                            duration: 10,
                        },
                        tooltips: {
                            mode: 'label',
                            callbacks: {
                                label: function (tooltipItem, data) {
                                    return data.datasets[tooltipItem.datasetIndex].label + ": " + numberWithCommas(tooltipItem.yLabel);
                                }
                            }
                        },
                        scales: {
                            xAxes: [{
                                stacked: true,
                                gridLines: {display: false},
                                ticks: {
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                }
                            }],
                            yAxes: [{
                                stacked: true,
                                ticks: {
                                    callback: function (value) {
                                        return numberWithCommas(value);
                                    },
                                    fontSize: 11,
                                    fontColor: chartColors.fontColor
                                },
                            }],
                        }
                    },
                    plugins: [{
                        beforeInit: function (chart) {
                            chart.data.labels.forEach(function (value, index, array) {
                                var a = [];
                                a.push(value.slice(0, 5));
                                var i = 1;
                                while (value.length > (i * 5)) {
                                    a.push(value.slice(i * 5, (i + 1) * 5));
                                    i++;
                                }
                                array[index] = a;
                            })
                        }
                    }]
                }
            );
        }
    }

    bar_chart();

    function users_chart() {
            Apex.chart = {
        fontFamily: 'inherit',
        locales: [{
            "name": "fa",
            "options": {
                "months": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                "shortMonths": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                "days": ["یکشنبه", "دوشنبه", "سه‌شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
                "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                "toolbar": {
                    "exportToSVG": "دریافت SVG",
                    "exportToPNG": "دریافت PNG",
                    "menu": "فهرست",
                    "selection": "انتخاب",
                    "selectionZoom": "بزرگنمایی قسمت انتخاب شده",
                    "zoomIn": "بزرگ نمایی",
                    "zoomOut": "کوچک نمایی",
                    "pan": "جا به جایی",
                    "reset": "بازنشانی بزرگ نمایی"
                }
            }
        }],
        defaultLocale: "fa"
    }
        if ($('#users-chart').length > 0) {
            var lastDate = 0;
            var data = []
            var TICKINTERVAL = 86400000
            let XAXISRANGE = 777600000

            function getDayWiseTimeSeries(baseval, count, yrange) {
                var i = 0;
                while (i < count) {
                    var x = baseval;
                    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                    data.push({
                        x, y
                    });
                    lastDate = baseval
                    baseval += TICKINTERVAL;
                    i++;
                }
            }

            getDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 10, {
                min: 10,
                max: 90
            });

            function getNewSeries(baseval, yrange) {
                var newDate = baseval + TICKINTERVAL;
                lastDate = newDate;

                for (var i = 0; i < data.length - 10; i++) {
                    // IMPORTANT
                    // we reset the x and y of the data which is out of drawing area
                    // to prevent memory leaks
                    data[i].x = newDate - XAXISRANGE - TICKINTERVAL
                    data[i].y = 0
                }

                data.push({
                    x: newDate,
                    y: Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min
                })

            }

            function resetData() {
                // Alternatively, you can also reset the data at certain intervals to prevent creating a huge series
                data = data.slice(data.length - 10, data.length);
            }

            var options = {
                chart: {
                    height: 270,
                    type: 'line',
                    animations: {
                        enabled: true,
                        easing: 'linear',
                        dynamicAnimation: {
                            speed: 1000
                        }
                    },
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                series: [{
                    data: data
                }],
                markers: {
                    size: 0
                },
                xaxis: {
                    type: 'datetime',
                    range: XAXISRANGE,
                },
                yaxis: {
                    max: 100
                },
                legend: {
                    show: false
                },
            }

            var chart = new ApexCharts(
                document.querySelector("#users-chart"),
                options
            );

            chart.render();

            window.setInterval(function () {
                getNewSeries(lastDate, {
                    min: 10,
                    max: 90
                })
                chart.updateSeries([{
                    data: data
                }])
            }, 1000)
        }
    }

    users_chart();

    function device_session_chart() {
            Apex.chart = {
        fontFamily: 'inherit',
        locales: [{
            "name": "fa",
            "options": {
                "months": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                "shortMonths": ["فروردین", "اردیبهشت", "خرداد", "تیر", "مرداد", "شهرویور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
                "days": ["یکشنبه", "دوشنبه", "سه‌شنبه", "چهارشنبه", "پنجشنبه", "جمعه", "شنبه"],
                "shortDays": ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                "toolbar": {
                    "exportToSVG": "دریافت SVG",
                    "exportToPNG": "دریافت PNG",
                    "menu": "فهرست",
                    "selection": "انتخاب",
                    "selectionZoom": "بزرگنمایی قسمت انتخاب شده",
                    "zoomIn": "بزرگ نمایی",
                    "zoomOut": "کوچک نمایی",
                    "pan": "جا به جایی",
                    "reset": "بازنشانی بزرگ نمایی"
                }
            }
        }],
        defaultLocale: "fa"
    }
        if ($('#device_session_chart').length) {
            var options = {
                chart: {
                    type: 'area',
                    stacked: true,
                    events: {
                        selection: function (chart, e) {
                            // console.log(new Date(e.xaxis.min))
                        }
                    },
                    toolbar: {
                        show: false,
                    }

                },
                colors: ['#008FFB', '#00E396', '#CED4DC'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 1
                },
                series: [{
                    name: 'شرق',
                    data: generateDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 20, {
                        min: 10,
                        max: 60
                    })
                },
                    {
                        name: 'شمال',
                        data: generateDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 20
                        })
                    },

                    {
                        name: 'جنوب',
                        data: generateDayWiseTimeSeries(new Date('11 Feb 2017 GMT').getTime(), 20, {
                            min: 10,
                            max: 15
                        })
                    }
                ],
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.6,
                        opacityTo: 0,
                    }
                },
                legend: {
                    show: false,
                    position: 'top',
                    horizontalAlign: 'left'
                },
                xaxis: {
                    type: 'datetime'
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#device_session_chart"),
                options
            );

            chart.render();

            /*
              // this function will generate output in this format
              // data = [
                  [timestamp, 23],
                  [timestamp, 33],
                  [timestamp, 12]
                  ...
              ]
              */
            function generateDayWiseTimeSeries(baseval, count, yrange) {
                var i = 0;
                var series = [];
                while (i < count) {
                    var x = baseval;
                    var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

                    series.push([x, y]);
                    baseval += 86400000;
                    i++;
                }
                return series;
            }
        }
    }

    device_session_chart();

    function chart1() {
        if ($('#chart1').length) {
            var options = {
                chart: {
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        backgroundBarColors: ['red']
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['transparent']
                },
                colors: [colors.secondary, colors.info, colors.warning],
                series: [{
                    name: 'بدون سود',
                    data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                }, {
                    name: 'درآمد',
                    data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
                }, {
                    name: 'مالیات',
                    data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
                }],
                xaxis: {
                    categories: ['مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند', 'فروردین', 'اردیبهشت', 'خرداد'],
                },
                legend: {
                    position: 'bottom',
                    offsetY: -10
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return "$ " + val + " thousands"
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#chart1"),
                options
            );

            chart.render();
        }
    }

    chart1();

    function widget_chart1() {
        if ($('#widget-chart1').length) {
            var ctx = document.getElementById("widget-chart1");
            ctx.height = 50;
            new Chart(ctx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sst", "Sun"],
                    datasets: [{
                        label: 'data-2',
                        data: [5, 15, 5, 20, 5, 15, 5],
                        backgroundColor: "rgba(0,0,255,0)",
                        borderWidth: 1,
                        borderColor: colors.success,
                        pointBorder: false,
                    }]
                },
                options: {
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: false,
                        }],
                        xAxes: [{
                            display: false
                        }]
                    },
                }
            });
        }
    }

    widget_chart1();

    function widget_chart2() {
        if ($('#widget-chart2').length) {
            var ctx = document.getElementById("widget-chart2");
            ctx.height = 50;
            var barChart = new Chart(ctx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sst", "Sun"],
                    datasets: [{
                        label: 'data-2',
                        data: [5, 10, 10, 10, 5, 15, 10],
                        backgroundColor: "rgba(0,0,255,0)",
                        borderColor: colors.warning,
                        borderWidth: 1,
                        pointBorder: false,
                    }]
                },
                options: {
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: false
                        }],
                        xAxes: [{
                            display: false
                        }]
                    },
                }
            });
        }
    }

    widget_chart2();

    function widget_chart3() {
        if ($('#widget-chart3').length) {
            var ctx = document.getElementById("widget-chart3");
            ctx.height = 50;
            var barChart = new Chart(ctx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ["شنبه", "یکشنبه", "دوشنبه", "سه شنبه", "چهارشنبه", "پنجشنبه", "جمعه"],
                    datasets: [{
                        label: 'data-2',
                        data: [10, 5, 15, 5, 15, 5, 15],
                        backgroundColor: "rgba(0,0,255,0)",
                        borderColor: colors.danger,
                        borderWidth: 1,
                        pointBorder: false,
                    }]
                },
                options: {
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    tooltips: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            display: false
                        }],
                        xAxes: [{
                            display: false
                        }]
                    },
                }
            });
        }
    }

    widget_chart3();

    function contactsStatuses() {
        if ($('#contacts-statuses').length) {
            var chart = new ApexCharts(
                document.querySelector("#contacts-statuses"), {
                    chart: {
                        width: "100%",
                        type: 'donut',
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 3,
                        colors: $('body').hasClass('dark') ? "#313852" : "rgba(255, 255, 255, 1)",
                    },
                    series: [44, 55, 13, 33],
                    labels: ['کاربر جدید', 'مورد 1', 'مورد 2', 'مورد 3'],
                    colors: [colors.warning, colors.info, colors.success, colors.danger],
                    legend: {
                        position: 'bottom',
                    }
                }
            );

            chart.render();
        }
    }

    contactsStatuses();

    function numberOfOrders() {
        if ($('#number-of-orders').length) {
            var ts2 = 1484418600000;
            var dates = [];
            for (var i = 0; i < 120; i++) {
                ts2 = ts2 + 86400000;
                var innerArr = [ts2, dataSeries[1][i].value];
                dates.push(innerArr)
            }

            var options = {
                chart: {
                    type: 'area',
                    stacked: false,
                    height: 350,
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: 'تعداد سفارشات',
                    data: dates
                }],
                stroke: {
                    colors: [colors.primary],
                    width: 1
                },
                markers: {
                    size: 0,
                    strokeColors: 'white',
                    colors: colors.primary
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        opacityFrom: 0.6,
                        opacityTo: 0,
                    }
                },
                yaxis: {
                    labels: {
                        formatter: function (val) {
                            return (val / 1000000).toFixed(0);
                        },
                    },
                    title: {
                        text: 'قیمت'
                    },
                },
                xaxis: {
                    type: 'datetime',
                },

                tooltip: {
                    shared: false,
                    y: {
                        formatter: function (val) {
                            return (val / 1000000).toFixed(0)
                        }
                    }
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#number-of-orders"),
                options
            );

            chart.render();
        }
    }

    numberOfOrders();
   
    function hotProducts() {
        if ($('#hot-products').length) {
            var randomScalingFactor = function () {
                return Math.round(Math.random() * 100);
            };

            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                            randomScalingFactor(),
                        ],
                        backgroundColor: [
                            colors.primary,
                            colors.success,
                            colors.info,
                            colors.secondary,
                            colors.warning,
                        ],
                        borderColor: $('body').hasClass('dark') ? chartColors.dark : 'white',
                        label: 'Dataset 1'
                    }],
                    labels: [
                        'اپل آیفون ایکس آر 256 GB قرمز',
                        'سامسونگ گلکسی آ 30 3/32 GB آبی',
                        'Apple iPhone XS 64GB gold',
                        'سامسونگ گلکسی نوت 9 9 6/128GB',
                        'اپل آیفون ایکس آر 256 GB قرمز'
                    ]
                },
                options: {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    legendCallback: function (chart) {
                        var text = [];
                        text.push('<ul class="' + chart.id + '-legend">');
                        for (var i = 0; i < chart.legend.legendItems.length; i++) {
                            text.push('<li><div class="legendValue"><span style="background-color:' + chart.legend.legendItems[i].fillStyle + '">&nbsp;&nbsp;&nbsp;&nbsp;</span>');

                            if (chart.legend.legendItems[i].text) {
                                text.push('<span class="label ml-2">' + chart.legend.legendItems[i].text + '</span>');
                            }

                            text.push('</div></li><div class="clear"></div>');
                        }

                        text.push('</ul>');

                        return text.join('');
                    },
                },
            };


            window.onload = function () {
                var ctx = document.getElementById('hot-products').getContext('2d');

                var chart = new Chart(ctx, config);

                document.getElementById('hot-products-legends').innerHTML = chart.generateLegend();
            };
        }
    }

    hotProducts();

    function revenue() {
        if ($('#revenue').length) {
            var options = {
                chart: {
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                series: [{
                    name: "دسکتاپ",
                    data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                }],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'straight',
                    colors: [colors.primary]
                },
                markers: {
                    strokeColors: 'white',
                    colors: colors.primary
                },
                xaxis: {
                    categories: ['مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند', 'فروردین', 'ادریبهشت', 'خرداد'],
                }
            };

            var chart = new ApexCharts(
                document.querySelector("#revenue"),
                options
            );

            chart.render();
        }
    }

    revenue();

    function projectTasks() {
        if ($('#project-tasks').length) {
            var options = {
                colors: [colors.primary, colors.success, colors.info, colors.warning],
                chart: {
                    height: 362,
                    type: 'bar',
                    stacked: true,
                    toolbar: {
                        show: false
                    },
                    zoom: {
                        enabled: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                    },
                },
                series: [{
                    name: 'پروژه آ',
                    data: [44, 55, 41, 67, 22, 43]
                }, {
                    name: 'پروژه ب',
                    data: [13, 23, 20, 8, 13, 27]
                }, {
                    name: 'پروژه س',
                    data: [11, 17, 15, 15, 21, 14]
                }, {
                    name: 'پروژه د',
                    data: [21, 7, 25, 13, 22, 8]
                }],
                xaxis: {
                    type: 'datetime',
                    categories: ['01/01/2011 GMT', '01/02/2011 GMT', '01/03/2011 GMT', '01/04/2011 GMT', '01/05/2011 GMT', '01/06/2011 GMT'],
                },
                legend: {
                    position: 'bottom',
                    offsetY: -10
                },
                fill: {
                    opacity: 1
                },
            };

            var chart = new ApexCharts(
                document.querySelector("#project-tasks"),
                options
            );

            chart.render();
        }
    }

    projectTasks();


// ==================

var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

var myChart = new Chart(ctx, {
   type: 'pie',
 
   options: {
    responsive: true,
    legend: {
        position: 'bottom',
    },
   },
   data: {
    labels: ["سامسونگ گلکسی نوت 9 9 6/128GB", " سامسونگ گلکسی آ 30 3/32 GB آبی", "ایسوس راگ 8/128GB آبی", "اپل آیفون ایکس آر 256 GB قرمز", "اپل آیفون ایکس آر 24 GB قرمز"],
   
    datasets: [{
        label: "",
        borderWidth: 5,
        backgroundColor: [
            colors.primary,
            colors.secondary,
            colors.success,
            colors.warning,
            colors.info
        ],
        data: [2478,3267,734,1784,933]
    }]
   }
});


});

