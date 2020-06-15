jQuery(document).ready(function() {
    // ECHARTS
    require.config({
        paths: {
            echarts: '../assets/global/plugins/echarts/'
        }
    });

    // DEMOS
    /*
    require(
        [
            'echarts',
            'echarts/chart/line',
        ],
        function(ec) {
            // --- LINE ---
            if( document.getElementById('echarts_line') ){
                var myChart2 = ec.init(document.getElementById('echarts_line'));
                myChart2.setOption({
                    title: {
                        text: 'Ipro Testing',
                        subtext: 'Lorem ipsum'
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['High', 'Low']
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            mark: {
                                show: true
                            },
                            dataView: {
                                show: true,
                                readOnly: false
                            },
                            magicType: {
                                show: true,
                                type: ['line', 'bar']
                            },
                            restore: {
                                show: true
                            },
                            saveAsImage: {
                                show: true
                            }
                        }
                    },
                    calculable: true,
                    xAxis: [{
                        type: 'category',
                        boundaryGap: false,
                        data: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13']
                    }],
                    yAxis: [{
                        type: 'value',
                        axisLabel: {
                            formatter: '{value}'
                        }
                    }],
                    series: [{
                        name: 'High',
                        type: 'line',
                        data: [11, 11, 15, 13, 12, 13, 10, 12, 3, 1, 20, 8, 11],
                        markPoint: {
                            data: [{
                                type: 'max',
                                name: 'Max'
                            }, {
                                type: 'min',
                                name: 'Min'
                            }]
                        },
                        markLine: {
                            data: [{
                                type: 'average',
                                name: 'Mean'
                            }]
                        }
                    }, {
                        name: 'Low',
                        type: 'line',
                        data: [1, -2, 2, 5, 3, 2, 0, 5, 1, 5, 7, 10, 2],
                        markPoint: {
                            data: [{
                                name: 'Lowest',
                                value: -2,
                                xAxis: 1,
                                yAxis: -1.5
                            }]
                        },
                        markLine: {
                            data: [{
                                type: 'average',
                                name: 'Mean'
                            }]
                        }
                    }]
                });
            }


        }
    );
    */
});
