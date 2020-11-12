@extends('admin.layouts.index')
@section('title', 'Cập nhật nhà cung cấp')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/supplier/index') }}">Nhà cung cấp</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cập nhật nhà cung cấp</h6>
                        <a href="{{ url('admin/supplier/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/supplier/update', ['id' => $supplier->id]) }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nhà cung cấp</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $supplier->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Địa chỉ</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $supplier->address }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Số điện thoại</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : $supplier->phone_number }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thư điện tử</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $supplier->email }}">
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="save" value="Lưu">
                                <input type="reset" class="btn btn-warning" value="Nhập lại">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Row-->

    </div>
    <!---Container Fluid-->

@endsection
