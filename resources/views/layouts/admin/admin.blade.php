<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    @include('layouts.admin.required.meta')
    @include('layouts.admin.required.styles')
    @livewireStyles
    @yield('styles')
    <style>

        @import '~flag-icon-css/sass/flag-icon';
    </style>

    {{-- <style>
        .spinner-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #232e3c;
            z-index: 999999;
        }

        .sk-chase {
            width: 40px;
            height: 40px;
            position: relative;
            animation: sk-chase 2.5s infinite linear both;
        }

        .sk-chase-dot {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            animation: sk-chase-dot 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:before {
            content: '';
            display: block;
            width: 25%;
            height: 25%;
            background-color: #fff;
            border-radius: 100%;
            animation: sk-chase-dot-before 2.0s infinite ease-in-out both;
        }

        .sk-chase-dot:nth-child(1) {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2) {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3) {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4) {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5) {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6) {
            animation-delay: -0.6s;
        }

        .sk-chase-dot:nth-child(1):before {
            animation-delay: -1.1s;
        }

        .sk-chase-dot:nth-child(2):before {
            animation-delay: -1.0s;
        }

        .sk-chase-dot:nth-child(3):before {
            animation-delay: -0.9s;
        }

        .sk-chase-dot:nth-child(4):before {
            animation-delay: -0.8s;
        }

        .sk-chase-dot:nth-child(5):before {
            animation-delay: -0.7s;
        }

        .sk-chase-dot:nth-child(6):before {
            animation-delay: -0.6s;
        }

        @keyframes sk-chase {
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot {

            80%,
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sk-chase-dot-before {
            50% {
                transform: scale(0.4);
            }

            100%,
            0% {
                transform: scale(1.0);
            }
        }
    </style> --}}
</head>

<body>
    {{-- <div class="spinner-wrapper">
        <div class="spinner"></div>
    </div> --}}
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
            </script>
            @if (Auth::user()->role == "admin")
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-card">

                @elseif(Auth::user()->role == "entreprise" OR (Auth::user()->role == "cabinet" && $Session == 1))
                <nav class="navbar navbar-light navbar-vertical navbar-expand-xl  navbar-vibrant">

                    @elseif(Auth::user()->role == "cabinet")
                    <nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-inverted">

                        @endif
                        {{-- <nav class="navbar navbar-light navbar-vertical navbar-expand-xl"> --}}
                            @if (Auth::user()->role == "admin")
                            @include('layouts.admin.required.includes.menu.admin')

                            @elseif(Auth::user()->role == "entreprise" OR Auth::user()->role == "cabinet")
                            @include('layouts.admin.required.includes.menu.entreprise')

                            @endif
                        </nav>
                        <div class="content">
                            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
                                @include('layouts.admin.required.includes.topbar')
                            </nav>


                            @yield('content')
                            {{-- @include('layouts.admin.required.includes.footer') --}}
                        </div>

        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->



    {{-- @include('layouts.admin.required.includes.customisation') --}}

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    @include('layouts.admin.required.scripts')
    @livewireScripts
    @yield('scripts')
    {{-- <script>
        $(document).ready(function() {
    //Preloader
    preloaderFadeOutTime = 500;
    function hidePreloader() {
    var preloader = $('.spinner-wrapper');
    preloader.fadeOut(preloaderFadeOutTime);
    }
    hidePreloader();
    });
    </script> --}}

    <script>
        var totalSalesEcommerce = function totalSalesEcommerce() {
      var ECHART_LINE_TOTAL_SALES_ECOMM = '.echart-line-total-sales-ecommerce';
      var $echartsLineTotalSalesEcomm = document.querySelector(ECHART_LINE_TOTAL_SALES_ECOMM);
      var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

      function getFormatter(params) {
        return params.map(function (_ref16, index) {
          var value = _ref16.value,
              borderColor = _ref16.borderColor;
          return "<span class= \"fas fa-circle\" style=\"color: ".concat(borderColor, "\"></span>\n    <span class='text-600'>").concat(index === 0 ? 'Last Month' : 'Previous Year', ": ").concat(value, "</span>");
        }).join('<br/>');
      }

      if ($echartsLineTotalSalesEcomm) {
        // Get options from data attribute
        var userOptions = utils.getData($echartsLineTotalSalesEcomm, 'options');
        var TOTAL_SALES_LAST_MONTH = "#".concat(userOptions.optionOne);
        var TOTAL_SALES_PREVIOUS_YEAR = "#".concat(userOptions.optionTwo);
        var totalSalesLastMonth = document.querySelector(TOTAL_SALES_LAST_MONTH);
        var totalSalesPreviousYear = document.querySelector(TOTAL_SALES_PREVIOUS_YEAR);
        var chart = window.echarts.init($echartsLineTotalSalesEcomm);

        var getDefaultOptions = function getDefaultOptions() {
          return {
            color: utils.getGrays()['100'],
            tooltip: {
              trigger: 'axis',
              padding: [7, 10],
              backgroundColor: utils.getGrays()['100'],
              borderColor: utils.getGrays()['300'],
              textStyle: {
                color: utils.getColors().dark
              },
              borderWidth: 1,
              formatter: function formatter(params) {
                return getFormatter(params);
              },
              transitionDuration: 0,
              position: function position(pos, params, dom, rect, size) {
                return getPosition(pos, params, dom, rect, size);
              }
            },
            legend: {
              data: ['lastMonth', 'previousYear'],
              show: false
            },
            xAxis: {
              type: 'category',
              data: ['2019-01-05', '2019-01-06', '2019-01-07', '2019-01-08', '2019-01-09', '2019-01-10', '2019-01-11', '2019-01-12', '2019-01-13', '2019-01-14', '2019-01-15', '2019-01-16'],
              boundaryGap: false,
              axisPointer: {
                lineStyle: {
                  color: utils.getColor('300'),
                  type: 'dashed'
                }
              },
              splitLine: {
                show: false
              },
              axisLine: {
                lineStyle: {
                  // color: utils.getGrays()['300'],
                  color: utils.rgbaColor('#000', 0.01),
                  type: 'dashed'
                }
              },
              axisTick: {
                show: false
              },
              axisLabel: {
                color: utils.getColor('400'),
                formatter: function formatter(value) {
                  var date = new Date(value);
                  return "".concat(months[date.getMonth()], " ").concat(date.getDate());
                },
                margin: 15 // showMaxLabel: false

              }
            },
            yAxis: {
              type: 'value',
              axisPointer: {
                show: false
              },
              splitLine: {
                lineStyle: {
                  color: utils.getColor('300'),
                  type: 'dashed'
                }
              },
              boundaryGap: false,
              axisLabel: {
                show: true,
                color: utils.getColor('400'),
                margin: 15
              },
              axisTick: {
                show: false
              },
              axisLine: {
                show: false
              }
            },
            series: [{
              name: 'lastMonth',
              type: 'line',
              data: [50, 80, 60, 80, 65, 90, 130, 90, 30, 40, 30, 70],
              lineStyle: {
                color: utils.getColor('primary')
              },
              itemStyle: {
                borderColor: utils.getColor('primary'),
                borderWidth: 2
              },
              symbol: 'circle',
              symbolSize: 10,
              hoverAnimation: true,
              areaStyle: {
                color: {
                  type: 'linear',
                  x: 0,
                  y: 0,
                  x2: 0,
                  y2: 1,
                  colorStops: [{
                    offset: 0,
                    color: utils.rgbaColor(utils.getColor('primary'), 0.2)
                  }, {
                    offset: 1,
                    color: utils.rgbaColor(utils.getColor('primary'), 0)
                  }]
                }
              }
            }, {
              name: 'previousYear',
              type: 'line',
              data: [110, 30, 40, 50, 80, 70, 50, 40, 110, 90, 60, 60],
              lineStyle: {
                color: utils.rgbaColor(utils.getColor('warning'), 0.3)
              },
              itemStyle: {
                borderColor: utils.rgbaColor(utils.getColor('warning'), 0.6),
                borderWidth: 2
              },
              symbol: 'circle',
              symbolSize: 10,
              hoverAnimation: true
            }],
            grid: {
              right: '18px',
              left: '40px',
              bottom: '15%',
              top: '5%'
            }
          };
        };

        echartSetOption(chart, userOptions, getDefaultOptions);
        totalSalesLastMonth.addEventListener('click', function () {
          chart.dispatchAction({
            type: 'legendToggleSelect',
            name: 'lastMonth'
          });
        });
        totalSalesPreviousYear.addEventListener('click', function () {
          chart.dispatchAction({
            type: 'legendToggleSelect',
            name: 'previousYear'
          });
        });
      }
    };
    </script>

</body>

</html>
