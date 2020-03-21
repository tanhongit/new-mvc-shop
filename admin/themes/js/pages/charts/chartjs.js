$(function () {
    var fc = document.getElementById("filled_line_chart").getContext("2d");
    new Chart(fc, getChartJs(fc, 'filled_line'));

    var bc = document.getElementById("bar_chart").getContext("2d");
    new Chart(bc, getChartJs(bc, 'bar'));

    var ac = document.getElementById('gradient_area').getContext('2d');
    new Chart(ac, getChartJs(ac, 'area'));

    var rc = document.getElementById("radar_chart").getContext("2d");
    new Chart(rc, getChartJs(rc, 'radar'));

    var pc = document.getElementById("pie_chart").getContext("2d");
    new Chart(pc, getChartJs(pc, 'pie'));

    var lc = document.getElementById("line_chart").getContext("2d");
    new Chart(lc, getChartJs(lc, 'line'));
});

function getChartJs(obj, type) {
    var config = null;
    if (type === 'line') {
        
        var gradientData1 = obj.createLinearGradient(500, 0, 100, 0);

        gradientData1.addColorStop(0, "#80b6f4");
        gradientData1.addColorStop(0.2, "#94d973");
        gradientData1.addColorStop(0.5, "#fad874");
        gradientData1.addColorStop(1, "#f49080");

        config = {
            type: 'line',
            data: {
                labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL"],
                datasets: [{
                    label: "Data 1",
                    borderColor: gradientData1,
                    pointBorderColor: gradientData1,
                    pointBackgroundColor: gradientData1,
                    pointHoverBackgroundColor: gradientData1,
                    pointHoverBorderColor: gradientData1,
                    pointBorderWidth: 10,
                    pointHoverRadius: 10,
                    pointHoverBorderWidth: 1,
                    pointRadius: 3,
                    fill: false,
                    borderWidth: 4,
                    data: [100, 120, 150, 170, 180, 170, 160]
                }]
            },
            options: {          
                legend: {
                    position: "bottom"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold",
                            beginAtZero: true,
                            maxTicksLimit: 5,
                            padding: 20
                        },
                        gridLines: {
                            drawTicks: false,
                            display: false
                        }

                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "transparent"
                        },
                        ticks: {
                            padding: 20,
                            fontColor: "rgba(0,0,0,0.5)",
                            fontStyle: "bold"
                        }
                    }]
                }
            }
        }
    }
    else if (type === 'filled_line') {
        config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [28, 32, 39, 37, 42, 55, 50],
                    borderColor: '#5CC5CD',
                    backgroundColor: '#5dbecd',
                    pointBorderColor: '#128293',
                    pointBackgroundColor: '#FFFFFF',
                    pointBorderWidth: 1
                }, {
                    label: "My Second dataset",
                    data: [40, 48, 50, 48, 63, 62, 71],                    
                    borderColor: '#46b6fe',
                    backgroundColor: '#3866a6',
                    pointBorderColor: '#5ebcf9',
                    pointBackgroundColor: '#FFFFFF',
                    pointBorderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: false,
                
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [28, 48, 40, 19, 86, 27, 90],
                    backgroundColor: '#46b6fe',
                    strokeColor: "rgba(255,118,118,0.1)",
                }, {
                    label: "My Second dataset",
                    data: [10, 30, 80, 61, 26, 75, 40],
                    backgroundColor: '#5CC5CD',
                    strokeColor: "rgba(255,118,118,0.1)",
                }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'area') {
        //var obj    = document.getElementById('gradient_area').getContext('2d'),
        var gradient = obj.createLinearGradient(0, 0, 0, 450);

        gradient.addColorStop(0, '#5CC5CD');
        gradient.addColorStop(0.5, '#46b6fe');
        gradient.addColorStop(1, '#3866a6');

        config = {
            type: 'line',
            data: {
                labels: [ 'January', 'February', 'March', 'April', 'May', 'June' ],
                datasets: [{
                        label: 'Custom Label Name',
                        backgroundColor: gradient,
                        pointBackgroundColor: 'white',
                        borderWidth: 1,
                        borderColor: '#3866a6',
                        data: [50, 80, 58, 70, 54, 63]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                animation: {
                    easing: 'easeInOutQuad',
                    duration: 520
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.05)',
                            lineWidth: 1
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            color: 'rgba(200, 200, 200, 0.08)',
                            lineWidth: 1
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                legend: {
                    display: false
                },
                point: {
                    backgroundColor: 'white'
                },
                tooltips: {
                    titleFontFamily: 'Open Sans',
                    backgroundColor: '#5CC5CD',
                    titleFontColor: 'red',
                    caretSize: 5,
                    cornerRadius: 2,
                    xPadding: 10,
                    yPadding: 10
                }
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 25, 90, 81, 56, 55, 40],
                    borderColor: 'rgba(102,165,226, 0.8)',
                    backgroundColor: 'rgba(102,165,226, 0.5)',
                    pointBorderColor: 'rgba(102,165,226, 0)',
                    pointBackgroundColor: 'rgba(102,165,226, 0.8)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [72, 48, 40, 19, 96, 27, 100],
                        borderColor: 'rgba(140,147,154, 0.8)',
                        backgroundColor: 'rgba(140,147,154, 0.5)',
                        pointBorderColor: 'rgba(140,147,154, 0)',
                        pointBackgroundColor: 'rgba(140,147,154, 0.8)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [150, 53, 121, 87, 45],
                    backgroundColor: [
                        "#515da4",
                        "#9988ff",
                        "#939edc",
                        "#d1d5f0",
                        "#f0f1fa"
                    ],
                }],
                labels: [
                    "Pia A",
                    "Pia B",
                    "Pia C",
                    "Pia D",
                    "Pia E"
                ]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }   
    return config;
}