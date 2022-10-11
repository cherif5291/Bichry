@extends('layouts.admin.admin')

@section('styles')

@endsection

@section('content')
@section('content')
@if (Auth::user()->role == "entreprise" OR Auth::user()->role == "admin" OR Auth::user()->role == "cabinet")
@php
$PackageEntreprise = $Abonnement->where('entreprise_id', Auth::user()->entreprise_id)->first()->package_id;
// $PackageEntreprise = $Packages::where('package_id', $AbonnementEntreprise->package_id)->first();
$ModuleEntreprise = $ModulePack->where('package_id', $PackageEntreprise);
@endphp
@endif
@include('layouts.admin.required.includes.messages')



<div class="row g-3 mb-3">
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header bg-line-chart-gradient">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <strong class="mb-0 text-light" data-anchor="data-anchor" id="mixed-chart">{{__('messages.digram_of_evolution_of_my_incomes_this_last_years')}}</strong>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div id="InvoicesThisLastYear"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card h-100">
            <div class="card-header bg-line-chart-gradient">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <strong class="mb-0 text-light"> {{__('messages.digram_of_evolution_of_my_expenses_this_last_years')}}</strong>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light">
                <div id="ExpensesThisLastYear"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-line-chart-gradient">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <strong class="mb-0 text-light" > {{__('messages.digram_circular_of_incomes_and_expenses')}}</strong>
                    </div>

                </div>
            </div>
            <div class="card-body bg-light">

                <canvas class="max-w-100" id="chartPieMesFactures" width="350"></canvas>

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-line-chart-gradient">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <strong class="mb-0 text-light">
                           {{__('messages.who_owes_me_money')}}
                        </strong>
                    </div>

                </div>
            </div>
            <div class="card-body bg-light">

                {{-- <canvas class="max-w-100" id="chartPieMesDepenses" width="350"></canvas> --}}


            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header bg-line-chart-gradient">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <strong class="mb-0 text-light">
                           {{__('messages.who_do_i_owe_money_to')}}
                        </strong>
                    </div>

                </div>
            </div>
            <div class="card-body bg-light">

                {{-- <div class="echart-bar-line-chart-example" style="min-height: 350px;" data-echart-responsive="true"></div> --}}


            </div>
        </div>
    </div>




@endsection

@section('scripts')
<script>
    var chartPieMesFactures = function chartPie() {
  var pie = document.getElementById('chartPieMesFactures');
  const chartIncomesExpensesData = JSON.parse('{!! $chartIncomesExpensesData ?? "" !!}');
  const chartIncomesExpensesLabel = JSON.parse('{!! $chartIncomesExpensesLabel ?? "" !!}');

  var getOptions = function getOptions() {
    return {
      type: 'pie',
      data: {
        datasets: [{
          data:chartIncomesExpensesData,
          backgroundColor: [utils.rgbaColor(utils.getColor('facebook'), 0.75), utils.rgbaColor(utils.getColor('youtube'), 0.75)],
          borderWidth: 1,
          borderColor: utils.getGrays()['100']
        }],
        labels: chartIncomesExpensesLabel
      },
      options: {
        plugins: {
          tooltip: chartJsDefaultTooltip()
        },
        maintainAspectRatio: false
      }
    };
  };

  chartJsInit(pie, getOptions);
};
</script>

<script>
    var chartPieMesDepenses = function chartPie() {
  var pier = document.getElementById('chartPieMesDepenses');
  const chartPieMesDepensesData = JSON.parse('{!! $chartPieMesDepensesData ?? "" !!}');
  var getOptions = function getOptions() {
    return {
      type: 'pie',
      data: {
        datasets: [{
          data:chartPieMesDepensesData,
          backgroundColor: [utils.rgbaColor(utils.getColor('facebook'), 0.75), utils.rgbaColor(utils.getColor('youtube'), 0.75)],
          borderWidth: 1,
          borderColor: utils.getGrays()['100']
        }],
        labels: ['Facebook', 'Youtube']
      },
      options: {
        plugins: {
          tooltip: chartJsDefaultTooltip()
        },
        maintainAspectRatio: false
      }
    };
  };

  chartJsInit(pier, getOptions);
};
</script>
<script src="{{asset('assets/admin/vendors/chart/chart.min.js')}}"></script>
<script src="{{asset('assets/admin/js/theme.js')}}"></script>
<script src="{{asset('assets/admin/js/echarts-example.js')}}"></script>

<script>
const echartsBarLineChartInit = () => {
  const $barLineChartEl = document.querySelector('.echart-bar-line-chart-example');

  if ($barLineChartEl) {
    // Get options from data attribute
    const userOptions = utils.getData($barLineChartEl, 'options');
    const chart = window.echarts.init($barLineChartEl);

    const months = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'October',
      'November',
      'December'
    ];

    const getDefaultOptions = () => ({
      tooltip: {
        trigger: 'axis',
        axisPointer: {
          type: 'cross',
          crossStyle: {
            color: utils.getGrays()['500']
          },
          label: {
            show: true,
            backgroundColor: utils.getGrays()['600'],
            color: utils.getGrays()['100']
          }
        },
        padding: [7, 10],
        backgroundColor: utils.getGrays()['100'],
        borderColor: utils.getGrays()['300'],
        textStyle: { color: utils.getColors().dark },
        borderWidth: 1,
        transitionDuration: 0,
        formatter: tooltipFormatter
      },
      toolbox: {
        top: 0,
        feature: {
          dataView: { show: false },
          magicType: {
            show: true,
            type: ['line', 'bar']
          },
          restore: { show: true },
          saveAsImage: { show: true }
        },
        iconStyle: {
          borderColor: utils.getGrays()['700'],
          borderWidth: 1
        },

        emphasis: {
          iconStyle: {
            textFill: utils.getGrays()['600']
          }
        }
      },
      legend: {
        top: 40,
        data: ['Evaporation', 'Precipitation', 'Average temperature'],
        textStyle: {
          color: utils.getGrays()['600']
        }
      },
      xAxis: [
        {
          type: 'category',
          data: months,
          axisLabel: {
            color: utils.getGrays()['600'],
            formatter: value => value.slice(0, 3)
          },
          axisPointer: {
            type: 'shadow'
          },
          axisLine: {
            show: true,
            lineStyle: {
              color: utils.getGrays()['300']
            }
          }
        }
      ],
      yAxis: [
        {
          type: 'value',
          min: 0,
          max: 250,
          interval: 50,
          axisLabel: {
            color: utils.getGrays()['600'],
            formatter: '{value} ml'
          },
          splitLine: {
            show: true,
            lineStyle: {
              color: utils.getGrays()['200']
            }
          }
        },
        {
          type: 'value',
          min: 0,
          max: 25,
          interval: 5,
          axisLabel: {
            color: utils.getGrays()['600'],
            formatter: '{value} °C'
          },

          splitLine: {
            show: true,
            lineStyle: {
              color: utils.getGrays()['200']
            }
          }
        }
      ],
      series: [
        {
          name: 'Evaporation',
          type: 'bar',
          data: [2.0, 4.9, 7.0, 23.2, 25.6, 76.7, 135.6, 162.2, 32.6, 20.0, 6.4, 3.3],
          itemStyle: {
            color: utils.getColor('primary'),
            barBorderRadius: [3, 3, 0, 0]
          }
        },
        {
          name: 'Precipitation',
          type: 'bar',
          data: [2.6, 5.9, 9.0, 26.4, 28.7, 70.7, 175.6, 182.2, 48.7, 18.8, 6.0, 2.3],
          itemStyle: {
            color: utils.getColor('info'),
            barBorderRadius: [3, 3, 0, 0]
          }
        },
        {
          name: 'Average temperature',
          type: 'line',
          yAxisIndex: 1,
          data: [2.0, 2.2, 3.3, 4.5, 6.3, 10.2, 20.3, 23.4, 23.0, 16.5, 12.0, 6.2],
          lineStyle: {
            color: utils.getColor('warning')
          },
          itemStyle: {
            color: utils.getGrays().white,
            borderColor: utils.getColor('warning'),
            borderWidth: 2
          },
          symbol: 'circle',
          symbolSize: 10
        }
      ],
      grid: {
        right: 5,
        left: 5,
        bottom: 5,
        top: '23%',
        containLabel: true
      }
    });

    echartSetOption(chart, userOptions, getDefaultOptions);
  }
};

export default echartsBarLineChartInit;
</script>

<style>
    #InvoicesThisLastYear {
        width: 100%;
        height: 350px;
    }
    #ExpensesThisLastYear {
        width: 100%;
        height: 350px;
    }

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
{{-- <script>
    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(
            am5percent.PieChart.new(root, {
                endAngle: 270
            })
        );

        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(
            am5percent.PieSeries.new(root, {
                valueField: "value",
                categoryField: "category",
                endAngle: 270
            })
        );

        series.states.create("hidden", {
            endAngle: -90
        });

        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series.data.setAll([{
            category: "Lithuania",
            value: 501.9
        }, {
            category: "Czechia",
            value: 301.9
        }, {
            category: "Ireland",
            value: 201.1
        }, {
            category: "Germany",
            value: 165.8
        }, {
            category: "Australia",
            value: 139.9
        }, {
            category: "Austria",
            value: 128.3
        }, {
            category: "UK",
            value: 99
        }]);

        series.appear(1000, 100);

    }); // end am5.ready()

</script> --}}



{{-- chart bar 1 --}}

<style>


</style>
<!-- Chart code -->
{{-- <script>
    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("ExpensesThisLastYear");


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );

        var data = [{
            "year": "2021",
            "europe": 2.5,
            "namerica": 2.5,
            "asia": 2.1,
            "lamerica": 1,
            "meast": 0.8,
            "africa": 0.4
        }, {
            "year": "2022",
            "europe": 2.6,
            "namerica": 2.7,
            "asia": 2.2,
            "lamerica": 0.5,
            "meast": 0.4,
            "africa": 0.3
        }, {
            "year": "2023",
            "europe": 2.8,
            "namerica": 2.9,
            "asia": 2.4,
            "lamerica": 0.3,
            "meast": 0.9,
            "africa": 0.5
        }]


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "year",
            renderer: am5xy.AxisRendererX.new(root, {
                cellStartLocation: 0.1,
                cellEndLocation: 0.9
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: name,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: fieldName,
                categoryXField: "year"
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}:{valueY}",
                width: am5.percent(90),
                tooltipY: 0
            });

            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true
                    })
                });
            });

            legend.data.push(series);
        }

        makeSeries("Europe", "europe");
        makeSeries("North America", "namerica");
        makeSeries("Asia", "asia");
        makeSeries("Latin America", "lamerica");
        makeSeries("Middle East", "meast");
        makeSeries("Africa", "africa");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    }); // end am5.ready()

</script> --}}


{{--  --}}

<script>
    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("ExpensesThisLastYear");

        const thisYear = JSON.parse('{!! $DmA ?? 0 !!}');
        const lastYear = JSON.parse('{!! $ODmA ?? 0 !!}');



        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout

        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );

        var data = [{
            "mois": "Jan",
            "2021": lastYear[0],
            "2022": thisYear[0]
        }, {
            "mois": "Fev",
            "2021": lastYear[1],
            "2022": thisYear[1]
        }, {
            "mois": "Mars",
            "2021": lastYear[2],
            "2022": thisYear[2]
        }, {
            "mois": "Avr",
            "2021": lastYear[3],
            "2022": thisYear[3]
        }, {
            "mois": "Mai",
            "2021": lastYear[4],
            "2022": thisYear[4]
        }, {
            "mois": "Juin",
            "2021": lastYear[5],
            "2022": thisYear[5]
        }, {
            "mois": "Juil",
            "2021": lastYear[6],
            "2022": thisYear[6]
        }, {
            "mois": "Aou",
            "2021": lastYear[7],
            "2022": thisYear[7]
        }, {
            "mois": "Sept",
            "2021": lastYear[8],
            "2022": thisYear[8]
        }, {
            "mois": "Oct",
            "2021": lastYear[9],
            "2022": thisYear[9]
        }, {
            "mois": "Nov",
            "2021": lastYear[10],
            "2022": thisYear[10]
        }
        , {
            "mois": "Nov",
            "2021": lastYear[11],
            "2022": thisYear[11]
        }

        ]


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "mois",
            renderer: am5xy.AxisRendererX.new(root, {
                cellStartLocation: 0.1,
                cellEndLocation: 0.9
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: name,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: fieldName,
                categoryXField: "mois"
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}:{valueY}",
                width: am5.percent(90),
                tooltipY: 0
            });



            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true
                    })
                });
            });

            legend.data.push(series);
        }


        makeSeries("2021", "2021");
        makeSeries("2022", "2022");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    }); // end am5.ready()

</script>


<script>
    am5.ready(function () {


        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("InvoicesThisLastYear");
        const thisYear = JSON.parse('{!! $FmA ?? 0 !!}');
        const lastYear = JSON.parse('{!! $OFmA ?? 0 !!}');


        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);


        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            layout: root.verticalLayout

        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legend = chart.children.push(
            am5.Legend.new(root, {
                centerX: am5.p50,
                x: am5.p50
            })
        );

        var data = [{
            "mois": "Jan",
            "2021": lastYear[0],
            "2022": thisYear[0]
        }, {
            "mois": "Fev",
            "2021": lastYear[1],
            "2022": thisYear[1]
        }, {
            "mois": "Mars",
            "2021": lastYear[2],
            "2022": thisYear[2]
        }, {
            "mois": "Avr",
            "2021": lastYear[3],
            "2022": thisYear[3]
        }, {
            "mois": "Mai",
            "2021": lastYear[4],
            "2022": thisYear[4]
        }, {
            "mois": "Juin",
            "2021": lastYear[5],
            "2022": thisYear[5]
        }, {
            "mois": "Juil",
            "2021": lastYear[6],
            "2022": thisYear[6]
        }, {
            "mois": "Aou",
            "2021": lastYear[7],
            "2022": thisYear[7]
        }, {
            "mois": "Sept",
            "2021": lastYear[8],
            "2022": thisYear[8]
        }, {
            "mois": "Oct",
            "2021": lastYear[9],
            "2022": thisYear[9]
        }, {
            "mois": "Nov",
            "2021": lastYear[10],
            "2022": thisYear[10]
        }
        , {
            "mois": "Nov",
            "2021": lastYear[11],
            "2022": thisYear[11]
        }

        ]


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
            categoryField: "mois",
            renderer: am5xy.AxisRendererX.new(root, {
                cellStartLocation: 0.1,
                cellEndLocation: 0.9
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        xAxis.data.setAll(data);

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        function makeSeries(name, fieldName) {
            var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                name: name,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: fieldName,
                categoryXField: "mois"
            }));

            series.columns.template.setAll({
                tooltipText: "{name}, {categoryX}:{valueY}",
                width: am5.percent(90),
                tooltipY: 0
            });



            series.data.setAll(data);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            series.appear();

            series.bullets.push(function () {
                return am5.Bullet.new(root, {
                    locationY: 0,
                    sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true
                    })
                });
            });

            legend.data.push(series);
        }


        makeSeries("2021", "2021");
        makeSeries("2022", "2022");


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        chart.appear(1000, 100);

    }); // end am5.ready()

</script>
@endsection
