'use strict';
$(document).ready(function () {

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

    chartjs_one();

    chartjs_two();

    chartjs_three();

    chartjs_four();

    chartjs_five();

    chartjs_six();

    products_HHH();
    function products_HHH() {
        var element = document.getElementById("products_HHH");
        // element.height = 100;
        new Chart(element, {
            type: 'pie',
            data: {
                labels: ["    Apple iPhone XR 256GB red", " Samsung Galaxy A30 3/32GB blue ", "Apple iPhone XS 64GB gold", "Samsung Galaxy Note9 6/128GB", "Apple iPhone XR 256GB red"],
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
            },
            options: {
                title: {
                    display: true,
                    text: 'پیشبینی جمعیت انسانها بر اساس منطقه به میلیون'
                }
            }
        });
    }
    function chartjs_one() {
        var element = document.getElementById("chartjs_one");
        // element.height = 100;
        new Chart(element, {
            type: 'bar',
            data: {
                labels: ["آفریقا", "آسیا", "اروپا", "آمریکا جنوبی", "ایسلند"],
                datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: [
                            colors.primary,
                            colors.secondary,
                            colors.success,
                            colors.warning,
                            colors.info
                        ],
                        data: [2478,3267,1734,2084,3000]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'پیشبینی جمعیت انسانها در سال 2050 به میلیون'
                }
            }
        });
    }

    function chartjs_two() {
        var element = document.getElementById("chartjs_two");
        element.height = 100;
        new Chart(element, {
            type: 'line',
            data: {
                labels: ["مهر", "آبان", "آذر", "دی", "بهمن", "اسفند", "فروردین"],
                datasets: [{
                    data: [65, 0, 80, 81, 56, 85, 40],
                    label: "آفریقا",
                    borderColor: colors.primary,
                    backgroundColor: colors.primaryLight,
                }, {
                    data: [25, 55, 20, 31, 96, 35, 80],
                    label: "آسیا",
                    borderColor: colors.success,
                    backgroundColor: colors.successLight,
                }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'پیشبینی جمعیت انسانها بر اساس منطقه به میلیون'
                }
            }
        });
    }

    function chartjs_three() {
        var element = document.getElementById("chartjs_three");
        element.height = 100;
        new Chart(element, {
            type: 'pie',
            data: {
                labels: ["آفریقا", "آسیا", "اروپا", "آمریکا جنوبی", "ایسلند"],
                datasets: [{
                    label: "Population (millions)",
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
            },
            options: {
                title: {
                    display: true,
                    text: 'پیشبینی جمعیت انسانها بر اساس منطقه به میلیون'
                }
            }
        });
    }

    function chartjs_four() {
        var element = document.getElementById("chartjs_four");
        element.height = 100;
        new Chart(element, {
            type: 'radar',
            data: {
                labels: ["آفریقا", "آسیا", "اروپا", "آمریکا جنوبی", "ایسلند"],
                datasets: [
                    {
                        label: "1950",
                        fill: true,
                        backgroundColor: colors.primaryLight,
                        borderColor: colors.primary,
                        pointBorderColor: "#fff",
                        data: [8.77,55.61,21.69,6.62,6.82]
                    }, {
                        label: "2050",
                        fill: true,
                        backgroundColor: colors.successLight,
                        borderColor: colors.success,
                        pointBorderColor: "#fff",
                        data: [25.48,54.16,7.61,8.06,4.45]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'توزیع در درصد از جمعیت جهان'
                }
            }
        });
    }

    function chartjs_five() {
        var element = document.getElementById("chartjs_five");
        element.height = 100;
        new Chart(element, {
            type: 'horizontalBar',
            data: {
                labels: ["آفریقا", "آسیا", "اروپا", "آمریکا جنوبی", "ایسلند"],
                datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: [
                            colors.primary,
                            colors.secondary,
                            colors.success,
                            colors.warning,
                            colors.info
                        ],
                        data: [2478,5267,734,784,433]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'پیشبینی جمعیت انسانها بر اساس منطقه به میلیون'
                }
            }
        });
    }

    function chartjs_six() {
        var element = document.getElementById("chartjs_six");
        element.height = 100;
        new Chart(element, {
            type: 'bar',
            data: {
                labels: ["1900", "1950", "1999", "2050"],
                datasets: [{
                    label: "اروپا",
                    type: "line",
                    borderColor: colors.warning,
                    data: [408,547,675,734],
                    fill: false
                }, {
                    label: "آفریقا",
                    type: "line",
                    borderColor: colors.success,
                    data: [133,221,783,2478],
                    fill: false
                }, {
                    label: "اروپا",
                    type: "bar",
                    backgroundColor: colors.secondary,
                    data: [408,547,675,734],
                }, {
                    label: "آفریقا",
                    type: "bar",
                    backgroundColor: colors.primary,
                    backgroundColorHover: "#3e95cd",
                    data: [133,221,783,2478]
                }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'رشد جمعیت: اروپا & آفریقا'
                },
                legend: { display: false }
            }
        });
    }

});