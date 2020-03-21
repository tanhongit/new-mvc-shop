$(function () {
    "use strict";  
    initSparkline();
    initWordMap();
});

function initSparkline() {
    setTimeout(function(){
        $(".sparkline").each(function () {
            var $this = $(this);
            $this.sparkline('html', $this.data());
        });
    }, 300);
}
function initWordMap() {
    setTimeout(function(){
        $('#world-map-markers').vectorMap({
            map: 'world_mill_en',
            normalizeFunction: 'polynomial',
            hoverOpacity: 0.7,
            hoverColor: false,
            backgroundColor: 'transparent',
            showTooltip: true,        

            regionStyle: {
                initial: {
                    fill: 'rgba(210, 214, 222, 1)',
                    "fill-opacity": 1,
                    stroke: 'none',
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    fill: 'rgba(255, 193, 7, 2)',
                    cursor: 'pointer'
                },
                selected: {
                    fill: 'yellow'
                },
                selectedHover: {}
            },
            markerStyle: {
                initial: {
                    fill: '#fff',
                    stroke: '#FFC107 '
                }
            },
            markers: [
                { latLng: [37.09,-95.71], name: 'America' },
                { latLng: [51.16,10.45], name: 'Germany' },
                { latLng: [-25.27, 133.77], name: 'Australia' },
                { latLng: [56.13,-106.34], name: 'Canada' },
                { latLng: [20.59,78.96], name: 'India' },
                { latLng: [55.37,-3.43], name: 'United Kingdom' },
            ]
        });
        $('#usa').vectorMap({
            map : 'us_aea_en',
            backgroundColor : 'transparent',
            regionStyle : {
                initial : {
                    fill : '#72c2ff'
                }
            }
        }); 
    }, 500);
}

$(function() {
    "use strict";
    setTimeout(function(){
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-bar', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 11, 8, 15, 18, 19, 17],
                        ['data2', 7, 7, 5, 7, 9, 12],
                        ['data3', 11, 6, 10, 17, 13, 21],
                        ['data4', 3, 12, 13, 14, 9, 18],
                    ],
                    type: 'bar', // default type of chart
                    colors: {
                        'data1': Aero.colors["blue"],
                        'data2': Aero.colors["pink"],
                        'data3': Aero.colors["cyan"],
                        'data4': Aero.colors["indigo"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Web',
                        'data2': 'Sports',
                        'data3': 'Lifestyle',
                        'data4': 'Technology',
                    }
                },
                axis: {
                    x: {
                        type: 'category',
                        // name of each category
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
                    },
                },
                bar: {
                    width: 16
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
        $(document).ready(function(){
            var chart = c3.generate({
                bindto: '#chart-donut', // id of chart wrapper
                data: {
                    columns: [
                        // each columns data
                        ['data1', 40],
                        ['data2', 30],
                        ['data3', 15],
                        ['data4', 10],
                        ['data5', 5]
                    ],
                    type: 'donut', // default type of chart
                    colors: {
                        'data1': Aero.colors["blue-dark"],
                        'data2': Aero.colors["blue-darker"],
                        'data3': Aero.colors["blue"],
                        'data4': Aero.colors["blue-light"],
                        'data5': Aero.colors["blue-lighter"],
                    },
                    names: {
                        // name of each serie
                        'data1': 'Chrome',
                        'data2': 'Firefox',
                        'data3': 'Safari',
                        'data4': 'IE',
                        'data5': 'Other',
                    }
                },
                axis: {
                },
                legend: {
                    show: true, //hide legend
                },
                padding: {
                    bottom: 0,
                    top: 0
                },
            });
        });
    }, 500);
});