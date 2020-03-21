$(function() {
    "use strict";    
    MorrisArea();
    initDonutChart();
    initBarChart();
    MorrisLineChart();
});

// Dashboard 1 Morris-chart
function MorrisArea() {
    Morris.Area({
        element: 'm_area_chart',
        data: [{
                period: '2011',
                iphone: 45,
                ipad: 75,
                itouch: 18
            }, {
                period: '2012',
                iphone: 130,
                ipad: 110,
                itouch: 82
            }, {
                period: '2013',
                iphone: 80,
                ipad: 60,
                itouch: 85
            }, {
                period: '2014',
                iphone: 78,
                ipad: 205,
                itouch: 135
            }, {
                period: '2015',
                iphone: 180,
                ipad: 124,
                itouch: 140
            }, {
                period: '2016',
                iphone: 105,
                ipad: 100,
                itouch: 85
            },
            {
                period: '2019',
                iphone: 210,
                ipad: 180,
                itouch: 120
            }
        ],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['iPhone', 'iPad', 'iPod Touch'],
        pointStrokeColors: ['#0c7ce6', '#72c2ff', '#1cbfd0'],
        lineColors: ['#0c7ce6', '#72c2ff', '#1cbfd0'],
        behaveLikeLine: true,
        gridLineColor: 'transparent',
        pointSize: 4,
        fillOpacity: 0,
        lineWidth: 2,
        hideHover: 'auto',
        resize: true,

    });
    Morris.Area({
        element: 'm_area_chart2',
        data: [{
            period: '2012',
            SiteA: 10,
            SiteB: 0,

            }, {
                period: '2013',
                SiteA: 105,
                SiteB: 110,

            }, {
                period: '2014',
                SiteA: 78,
                SiteB: 92,

            }, {
                period: '2015',
                SiteA: 89,
                SiteB: 185,

            }, {
                period: '2016',
                SiteA: 175,
                SiteB: 149,

            }, {
                period: '2019',
                SiteA: 126,
                SiteB: 98,

                }
        ],
        xkey: 'period',
        ykeys: ['SiteA', 'SiteB'],
        labels: ['Site A', 'Site B'],
        pointStrokeColors: ['#0c7ce6', '#1cbfd0'],
        lineColors: ['#0c7ce6', '#1cbfd0'],
        behaveLikeLine: true,
        gridLineColor: 'transparent',
        pointSize: 0,
        fillOpacity: 0.4,
        lineWidth: 0,
        smooth: false,
        hideHover: 'auto',
        resize: true,
    });
    // Extra chart
    Morris.Area({
        element: 'e_area_chart',
        data: [{
                period: '2011',
                iphone: 10,
                ipad: 0,
                itouch: 0
            }, {
                period: '2012',
                iphone: 50,
                ipad: 15,
                itouch: 5
            }, {
                period: '2013',
                iphone: 20,
                ipad: 50,
                itouch: 65
            }, {
                period: '2014',
                iphone: 45,
                ipad: 12,
                itouch: 7
            }, {
                period: '2015',
                iphone: 30,
                ipad: 32,
                itouch: 120
            }, {
                period: '2016',
                iphone: 25,
                ipad: 80,
                itouch: 40
            }, {
                period: '2019',
                iphone: 40,
                ipad: 10,
                itouch: 26
            }
        ],
        lineColors: ['#0c7ce6', '#1cbfd0', '#b588ff'],
        xkey: 'period',
        ykeys: ['iphone', 'ipad', 'itouch'],
        labels: ['Site A', 'Site B', 'Site C'],
        pointSize: 0,
        lineWidth: 0,
        resize: true,
        fillOpacity: 0.8,
        behaveLikeLine: true,
        gridLineColor: 'transparent',
        hideHover: 'auto',
    });
}
// LINE CHART
function MorrisLineChart(){
    var line = new Morris.Line({
        element: 'm_line_chart',
        resize: true,
        data: [{
                y: '2014 Q1',
                item1: 2356
            },
            {
                y: '2015 Q2',
                item1: 2586
            },
            {
                y: '2015 Q3',
                item1: 4512
            },
            {
                y: '2015 Q4',
                item1: 3265
            },
            {
                y: '2016 Q1',
                item1: 6258
            },
            {
                y: '2016 Q2',
                item1: 5234
            },
            {
                y: '2016 Q3',
                item1: 4725
            },
            {
                y: '2016 Q4',
                item1: 7526
            },
            {
                y: '2019 Q1',
                item1: 8452
            },
            {
                y: '2019 Q2',
                item1: 8931
            }
        ],
        xkey: 'y',
        ykeys: ['item1'],
        labels: ['Item 1'],
        gridLineColor: 'transparent',
        lineColors: ['#0c7ce6'],
        lineWidth: 1,
        hideHover: 'auto',
    });
}
// Morris donut chart
function initDonutChart() {
    Morris.Donut({
        element: 'm_donut_chart',
        data: [{
            label: "Online Sales",
            value: 45,
        }, {
            label: "Store Sales",
            value: 35
        }, {
            label: "Email Sales",
            value: 8
        }, {
            label: "Agent Sales",
            value: 12
        }],

        resize: true,
        colors: ['#b588ff', '#46b6fe', '#5CC5CD', '#a1abb8']
    });
}
// Morris bar chart
function initBarChart() {
    Morris.Bar({
        element: 'm_bar_chart',
        data: [{
            y: '2011',
            a: 80,
            b: 56,
            c: 89
        }, {
            y: '2012',
            a: 75,
            b: 65,
            c: 38
        }, {
            y: '2013',
            a: 59,
            b: 30,
            c: 37
        }, {
            y: '2014',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2015',
            a: 55,
            b: 40,
            c: 45
        }, {
            y: '2016',
            a: 75,
            b: 65,
            c: 40
        }, {
            y: '2019',
            a: 87,
            b: 88,
            c: 36
        }],
        xkey: 'y',
        ykeys: ['a', 'b', 'c'],
        labels: ['A', 'B', 'C'],
        barColors: ['#72c2ff', '#46b6fe', '#5CC5CD'],
        hideHover: 'auto',
        gridLineColor: 'transparent',
        resize: true,
    });
}