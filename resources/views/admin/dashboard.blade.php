@extends('admin.layouts.index')
@section('title', 'Trang tổng quan')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Trang tổng quan</h1>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng doanh thu
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    ${{ number_format($sumRevenue, 0, ',', ',') }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Tổng số đơn hàng</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countOrder }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Thành viên</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $countUser }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Đánh giá</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sumFeedback }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <figure class="highcharts-figure">
                    <div id="container2" data-list-day="{{ $listDayJson }}" data-money="{{ $arrRevenueInMonthJson }}"></div>
                </figure>
            </div>
            <!-- Pie Chart -->
            <div class="col-lg-4">
                <figure class="highcharts-figure">
                    <div id="container" data-json="{{ $statusOrderJson }}"></div>
                </figure>
            </div>
            <!-- Invoice Example -->
            <div class="col-xl-8 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng mới</h6>
                        <a class="m-0 float-right btn btn-danger btn-sm" href="{{ url('admin/order/index') }}">Xem thêm
                            <i
                                    class="fas fa-chevron-right"></i></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th>Mã ĐH</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td><a>{{ $order->postal_id }}</a></td>
                                    <td>
                                        <ul style="list-style: none;">
                                            <li>Tên: {{ $order->full_name }}</li>
                                            <li>SĐT: {{ $order->phone_number }}</li>
                                            @if($order->customer_id)
                                                <li><span class="badge badge-success">Thành viên</span></li>
                                            @else
                                                <li><span class="badge badge-secondary">Khách</span></li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>${{ number_format($order->total_price, 0, '.', ',') }}</td>
                                    @php
                                        $status_text = '';
                                        $style_text = '';
                                        switch ($order->status){
                                            case 0:
                                                $status_text = 'Chờ xử lý';
                                                $style_text = 'warning';
                                                break;
                                            case 1:
                                                $status_text = 'Đang chuyển hàng';
                                                $style_text = 'info';
                                                break;
                                            case 2:
                                                $status_text = 'Đã nhận hàng';
                                                $style_text = 'success';
                                                break;
                                            case 3:
                                                $status_text = 'Đã hủy';
                                                $style_text = 'danger';
                                                break;
                                        }
                                    @endphp
                                    <td><span class="badge badge-{{ $style_text }}">{{ $status_text }}</span></td>
                                    <td>{{ date('d/m/Y', strtotime($order->date_order)) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <!-- Message From Customer-->
            <div class="col-xl-4 col-lg-5 ">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm bán chạy</h6>
                    </div>
                    <div class="card-body">
                        @foreach($hot_solds as $hot_sold)
                            <div class="mb-3">
                                <div class="small text-gray-500">{{ $hot_sold->name }}
                                    <div class="small float-right"><b>đã bán {{ $hot_sold->quantity_sold }}
                                            / {{ $hot_sold->quantity_sold + $hot_sold->quantity_in_stock }} sản
                                            phẩm</b></div>
                                </div>
                                <div class="progress" style="height: 12px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                         style="width: {{ $hot_sold->quantity_sold / ($hot_sold->quantity_sold + $hot_sold->quantity_in_stock)*100 }}%"
                                         aria-valuenow="{{ $hot_sold->quantity_sold / ($hot_sold->quantity_sold + $hot_sold->quantity_in_stock)*100 }}"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card">
                    <div class="card-header py-4 bg-primary d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-light">Liên hệ</h6>
                    </div>
                    <div>
                        @foreach($contacts as $contact)
                            <div class="customer-message align-items-center">
                            <a class="font-weight-bold" href="{{ url('admin/contact/detail', $contact
                            ['id']) }}">
                                <div class="text-truncate message-title">{{ $contact['message'] }}
                                </div>
                                <div class="small text-gray-500 message-time font-weight-bold">{{ $contact['full_name'] }}   ·
                                    {{ date('H:i:s d/m/Y', strtotime($contact['created_at'])) }}
                                </div>
                            </a>
                        </div>
                        @endforeach
                        <div class="card-footer text-center">
                            <a class="m-0 small text-primary card-link" href="{{ url('admin/contact/index') }}">Xem thêm <i
                                        class="fas fa-chevron-right"></i></a>
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
        let dataStatusOrder = $("#container").attr('data-json');
        dataStatusOrder = JSON.parse(dataStatusOrder);
        let dataListDay = $("#container2").attr('data-list-day');
        dataListDay = JSON.parse(dataListDay);
        let dataMoneyMonth = $("#container2").attr('data-money');
        dataMoneyMonth = JSON.parse(dataMoneyMonth);
        Highcharts.chart('container', {
            chart: {
                styleMode: true
            },
            title: {
                text: 'Thống kê tình trạng đơn hàng'
            },
            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataStatusOrder,
                showInLegend: true
            }]
        });
        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Thống kê doanh thu các ngày trong tháng'
            },
            xAxis: {
                categories: dataListDay
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
