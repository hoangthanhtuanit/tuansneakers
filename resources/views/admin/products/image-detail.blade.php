@extends('admin.layouts.index')
@section('title', 'Danh sách ảnh sản phẩm')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/product/index') }}">Sản phẩm</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách ảnh sản phẩm</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách ảnh sản phẩm</h6>
                <a href="{{ url('admin/product/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($images as $image)
                        @foreach($image as $img)
                        <tr class="text-center">
                            <td>{{ $img->id }}</td>
                            <td>{{ $img->products->name }}</td>
                            <td>
                                <img src="{{ asset('/uploads/image-products/' . $img->image) }}" width="100" height="100" alt="">
                            </td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

