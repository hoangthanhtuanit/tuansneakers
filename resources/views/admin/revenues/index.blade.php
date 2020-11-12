@extends('admin.layouts.index')
@section('title', 'Thông kê doanh thu')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thống kê doanh thu</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu</h6>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <!-- Area Chart -->
                        <div class="col-md-6 col-lg-12">
                            <figure class="highcharts-figure">
                                <div id="container3" data-list-month="{{ $listMonthJson }}" data-xmoney="{{ $arrRevenueInMonthJson }}"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
    <!---Container Fluid-->

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript">
        let dataMonth = $("#container3").attr('data-list-month');
        dataMonth = JSON.parse(dataMonth);
        let dataMoneyMonth = $("#container3").attr('data-xmoney');
        dataMoneyMonth = JSON.parse(dataMoneyMonth);
        Highcharts.chart('container3', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Thống kê doanh thu tháng'
            },
            xAxis: {
                categories: dataMonth
            },
            yAxis: {
                title: {
                    text: 'Doanh thu(đơn vị USD)'
                },
                labels: {
                    formatter: function () {
                        return '$' + this.value;
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Tổng tiền',
                marker: {
                    symbol: 'square'
                },
                data: dataMoneyMonth

            }]
        });
    </script>

@endsection
