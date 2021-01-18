@extends('layouts.default')

@section('title')
    Dashboard
@endsection

@section('css')
<style>
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
	min-width: 50px;
}
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$total_persons}}</h2>
                            <p class="m-b-0 text-muted">Total Penduduk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$total_persons_permanent}}</h2>
                            <p class="m-b-0 text-muted">Penduduk Tetap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-gold">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$total_persons_temporary}}</h2>
                            <p class="m-b-0 text-muted">Penduduk Sementara</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chart-education"></div>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chart-rt"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chart-gender"></div>
                    </figure>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chart-job"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="chart-status"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    let chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(201, 203, 207)'
    };

    let randomScalingFactor = function() {
        return Math.round(Math.random() * 100);
    };
</script>
<script>
    Highcharts.chart('chart-rt', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Chart Penduduk Berdasarkan RT'
        },
        tooltip: {
            enabled: true,
            pointFormat: '{series.name}: <b>{point.y} Orang</b>',
        },
        accessibility: {
            point: {
                valueSuffix: 'Orang'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Orang'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                    name: "{{$chart_rt['rt1']['title']}}",
                    y: parseInt("{{$chart_rt['rt1']['data']}}"),
                    color: chartColors.red
                },{
                    name: "{{$chart_rt['rt2']['title']}}",
                    y: parseInt("{{$chart_rt['rt2']['data']}}"),
                    color: chartColors.blue
                },{
                    name: "{{$chart_rt['rt3']['title']}}",
                    y: parseInt("{{$chart_rt['rt3']['data']}}"),
                    color: chartColors.orange
                },{
                    name: "{{$chart_rt['rt4']['title']}}",
                    y: parseInt("{{$chart_rt['rt4']['data']}}"),
                    color: chartColors.yellow
                },{
                    name: "{{$chart_rt['rt5']['title']}}",
                    y: parseInt("{{$chart_rt['rt5']['data']}}"),
                    color: chartColors.purple
                }
            ]
        }]
    });
</script>
<script>
    Highcharts.chart('chart-gender', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Chart Penduduk Berdasarkan Jenis Kelamin'
        },
        tooltip: {
            enabled: true,
            pointFormat: '{series.name}: <b>{point.y} Orang</b>',
        },
        accessibility: {
            point: {
                valueSuffix: 'Orang'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Orang'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [{
                name: "{{$chart_gender['wanita']['title']}}",
                y: parseInt("{{$chart_gender['wanita']['data']}}"),
                sliced: false,
                selected: false,
                color: chartColors.red
            }, {
                name: "{{$chart_gender['pria']['title']}}",
                y: parseInt("{{$chart_gender['pria']['data']}}"),
                color: chartColors.blue
            }]
        }]
    });
</script>
<script>
    Highcharts.chart('chart-education', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Chart Penduduk Berdasarkan Pendidikan Terakhir'
        },
        tooltip: {
            enabled: true,
            pointFormat: '{series.name}: <b>{point.y} Orang</b>',
        },
        accessibility: {
            point: {
                valueSuffix: 'Orang'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Orang'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: {!! json_encode($data_chart_education) !!}
        }]
    });
</script>
<script>
    Highcharts.chart('chart-job', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Chart Penduduk Berdasarkan Pendidikan Terakhir'
        },
        tooltip: {
            enabled: true,
            pointFormat: '{series.name}: <b>{point.y} Orang</b>',
        },
        accessibility: {
            point: {
                valueSuffix: 'Orang'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Orang'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: {!! json_encode($data_chart_job) !!}
        }]
    });
</script>
<script>
    Highcharts.chart('chart-status', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Chart Penduduk Berdasarkan Pendidikan Terakhir'
        },
        tooltip: {
            enabled: true,
            pointFormat: '{series.name}: <b>{point.y} Orang</b>',
        },
        accessibility: {
            point: {
                valueSuffix: 'Orang'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Orang'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: {!! json_encode($data_chart_status) !!}
        }]
    });
</script>
@endsection
