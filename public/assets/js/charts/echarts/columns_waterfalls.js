/* ------------------------------------------------------------------------------
 *
 *  # Echarts - columns and waterfalls
 *
 *  Columns and waterfalls chart configurations
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {
    axios.get("/testdata").then(data => {
        var departments = data.data.departments
        var value = data.data.data // tach thoi gian
        var legend = departments.map(function (value) {
            return value.department_name
        })
        var t = {
                name: 'Email',
                type: 'bar',
                stack: 'Advertising',
                data: [120, 132, 101, 134, 90, 230, 210]
            }
        var emit = []
        for (var i = 0 ; i< legend.length ;i++)
        {
            emit.push({
                name: legend[i],
                type: 'bar',
                stack: 'Advertising',
                data: []
            })
        }
        var time = [] // thoi gian

        for(var i = 0;i<value.length;i++)
        {
            time.push(value[i].time_start.replace(/-/g,"/") + " - " +value[i].time_end.replace(/-/g,"/"))
            for(var j = 0;j< emit.length ; j++)
            {
                for (var z = 0 ; z< value[i].value.length ;z++)
                {


                    if(value[i].value[z].department_name == emit[j].name)
                    {

                        emit[j].data.push(value[i].value[z].sum)
                    }
                }
            }
        }

        // Set paths
        // ------------------------------

        require.config({
            paths: {
                echarts: 'assets/js/plugins/visualization/echarts'
            }
        });


        // Configuration
        // ------------------------------

        require(
            [
                'echarts',
                'echarts/theme/limitless',
                'echarts/chart/bar',
            ],


            // Charts setup
            function (ec, limitless) {


                // Initialize charts
                // ------------------------------


                var stacked_columns = ec.init(document.getElementById('stacked_columns'), limitless);







                //
                // Stacked columns options
                //

                stacked_columns_options = {

                    // Setup grid
                    grid: {
                        x: 40,
                        x2: 47,
                        y: 35,
                        y2: 25
                    },

                    // Add tooltip
                    tooltip: {
                        trigger: 'axis',
                        axisPointer: {
                            type: 'shadow' // 'line' | 'shadow'
                        }
                    },

                    // Add legend
                    legend: {
                        data: legend // danh sách chuyên ngành
                    },

                    // Add toolbox
                    toolbox: {
                        show: true,
                        orient: 'vertical',
                        x: 'right',
                        y: 'center',
                        itemGap: 15,
                        showTitle: false,
                        feature: {
                            mark: {
                                show: true,
                                title: {
                                    mark: 'Markline switch',
                                    markUndo: 'Undo markline',
                                    markClear: 'Clear markline'
                                }
                            },
                            dataZoom: {
                                show: true,
                                title: {
                                    dataZoom: 'Data zoom',
                                    dataZoomReset: 'Reset zoom'
                                }
                            },
                            dataView: {
                                show: true,
                                readOnly: false,
                                title: 'View data',
                                lang: ['View chart data', 'Close', 'Update']
                            },
                            magicType: {
                                show: true,
                                title: {
                                    line: 'Switch to line chart',
                                    bar: 'Switch to bar chart',
                                },
                                type: ['line', 'bar']
                            },
                            restore: {
                                show: true,
                                title: 'Restore'
                            },
                            saveAsImage: {
                                show: true,
                                title: 'Same as image',
                                lang: ['Save']
                            }
                        }
                    },

                    // Enable drag recalculate
                    calculable: true,

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        data: time // danh sách đợt
                    }],

                    // Vertical axis
                    yAxis: [{
                        type: 'value'
                    }],

                    // Add series
                    // danh sách dữ liệu
                    // Tên
                    // Data
                    series: emit
                };





                stacked_columns.setOption(stacked_columns_options);




                // Resize charts
                // ------------------------------

                window.onresize = function () {
                    setTimeout(function () {
                        stacked_columns.resize();
                    }, 200);
                }
            }
        );
    }).catch(err => {
        console.log(err)
    })
});
