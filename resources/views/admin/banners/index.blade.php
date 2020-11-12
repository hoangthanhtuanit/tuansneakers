@extends('admin.layouts.index')
@section('title', 'Danh sách banner')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách banner</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách banner</h6>
                <a href="{{ url('admin/banner/create') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-plus fa-sm"></i> Thêm mới</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td class="text-center">{{ $banner->id }}</td>
                            <td class="text-center">
                                <img src="{{ asset('/uploads/banners/' . $banner->image) }}" width="400" height="200" alt="">
                            </td>
                            <td class="text-center">
                                @php
                                    $status_a = '';
                                    $status_d = '';
                                    switch ($banner->status) {
                                    case 0:
                                        $status_d = 'Disable';
                                        break;
                                    case 1:
                                        $status_a = 'Active';
                                        break;
                                    }
                                @endphp
                                <span class="badge badge-success">{{ $status_a }}</span>
                                <span class="badge badge-secondary">{{ $status_d }}</span>
                            </td>
                            <td>
                                <div class="table-data-feature text-center">
                                    <div class="btn-group mb-1">
                                        <button type="button" class="btn btn-primary">Xử lý</button>
                                        <button type="button"
                                                class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Xử lý</span>
                                        </button>
                                        <div class="dropdown-menu" x-placement="bottom-start"
                                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(81px, 38px, 0px);">
                                            @if($banner->status == 0)
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/banner/active', ['active', $banner->id]) }}">Kích
                                                    hoạt</a>
                                            @else
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/banner/active', ['disable', $banner->id]) }}">Vô hiệu
                                                    hóa</a>
                                            @endif
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item"
                                               href="{{ url('admin/banner/update', $banner->id) }}">Cập nhật</a>
                                            <a class="dropdown-item"
                                               onclick="return confirm('Bạn có muốn tiếp tục xóa không?')"
                                               href="{{ url('admin/banner/delete', $banner->id) }}">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
