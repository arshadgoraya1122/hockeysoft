$(document).ready(function () {
    "use strict"; // Start of use strict

    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //Performance Chart
    //var chart_labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    //var temp_dataset = [25, 30, 20, 30, 20, 20, 15, 25, 20, 30, 25, 30];
    //var rain_dataset = [25, 20, 30, 22, 17, 20, 18, 26, 28, 26, 20, 32];
    var ctx = document.getElementById("forecast").getContext('2d');
    var config = {
        type: 'bar',
        data: {
            labels: chart_labels,
            datasets: [{
                type: 'line',
                label: "Salles",
                borderColor: "rgb(55, 160, 0)",
                fill: false,
                data: temp_dataset
            }, {
                type: 'bar',
                label: "Views",
                backgroundColor: "rgba(55, 160, 0, .1)",
                borderColor: "rgba(55, 160, 0, .4)",
                data: rain_dataset
            }]
        },
        options: {
            legend: false,
            scales: {
                yAxes: [{
                    gridLines: {
                        color: "#e6e6e6",
                        zeroLineColor: "#e6e6e6",
                        borderDash: [2],
                        borderDashOffset: [2],
                        drawBorder: false,
                        drawTicks: false
                    },
                    ticks: {
                        padding: 20
                    }
                }],

                xAxes: [{
                    maxBarThickness: 50,
                    gridLines: {
                        lineWidth: [0]
                    },
                    ticks: {
                        padding: 20,
                        fontSize: 14,
                        fontFamily: "'Nunito Sans', sans-serif"
                    }
                }]
            }
        }
    };
    var forecast_chart = new Chart(ctx, config);
    $("#0").on("click", function () {
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    $("#1").on("click", function () {
        var chart_labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var temp_dataset = [0, 15, 5, 30, 10, 20, 10, 15, 10, 30, 25, 10];
        var rain_dataset = [20, 25, 30, 35, 27, 23, 18, 26, 28, 26, 20, 32];
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
    $("#2").on("click", function () {
        var chart_labels = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var temp_dataset = [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, 40];
        var rain_dataset = [25, 20, 30, 22, 17, 10, 18, 26, 28, 26, 20, 32];
        var data = forecast_chart.config.data;
        data.datasets[0].data = temp_dataset;
        data.datasets[1].data = rain_dataset;
        data.labels = chart_labels;
        forecast_chart.update();
    });
});
