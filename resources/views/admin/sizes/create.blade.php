@extends('admin.layouts.index')
@section('title', 'Thêm mới kích thước')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/size/index') }}">Kích thước sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Thêm mới kích thước sản phẩm</h6>
                        <a href="{{ url('admin/size/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/size/create') }}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kích thước</label>
                                <input type="text" class="form-control" name="size" placeholder="Nhập kích thước">
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" name="save" value="Thêm mới">
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
