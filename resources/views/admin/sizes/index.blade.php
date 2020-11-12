@extends('admin.layouts.index')
@section('title', 'Danh sách kích thước')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Trang tổng quan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách kích thước</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <h6 class="m-0 font-weight-bold text-primary" style="padding-right: 750px;">Danh sách kích thước sản phẩm</h6>
                <a href="{{ url('admin/size/create') }}" class="btn btn-primary" style="margin-right: 30px;"><h6 style="margin-bottom: 0px;"><i class="fas fa-plus fa-sm"></i> Thêm mới</h6></a>
                <a href="{{ url('admin/product/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Kích thước</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sizes as $size)
                        <tr>
                            <td class="text-center">{{ $size->id }}</td>
                            <td>{{ $size->size }}</td>
                            <td>
                                @php
                                    $link_delete = 'admin/size/delete/' . $size->id;
                                @endphp
                                <div class="table-data-feature text-center">
                                    <a onclick="return confirm('Bạn có muốn tiếp tục xóa không?')" class="item"
                                       href="{{ url($link_delete) }}" title="Xóa">
                                        <i class="fas fa-trash"></i>
                                    </a>
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
