@extends('admin.layouts.index')
@section('title', 'Cập nhật tin tức')

@section('content')

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-end mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/blog/index') }}">Danh sách tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
            </ol>
        </div>

        <div class="row">
            <!-- Form Basic -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cập nhật tin tức</h6>
                        <a href="{{ url('admin/blog/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
                    </div>
                    @include('admin.layouts.error')
                    <div class="card-body">
                        <form method="post" action="{{ url('admin/blog/update', $blog->id) }}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh tiêu đề</label>
                                <input type="file" class="form-control" name="image">
                                <p><img width="400" height="150" src="{{ asset('/uploads/blogs/' . $blog->image) }}" alt=""></p>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề tin</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $blog->title }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung tin</label>
                                <textarea name="summary" id="text-content" cols="30" rows="10" class="form-control">{{ old('summary') ? old('summary') : $blog->summary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trạng thái</label>
                                @php
                                    $selected_dis = '';
                                    $selected_act = '';
                                    switch ($blog->status) {
                                        case 0: $selected_dis = 'selected'; break;
                                        case 1: $selected_act = 'selected'; break;
                                    }
                                @endphp
                                <select name="status" id="select" class="form-control">
                                    <option value="0" {{ $selected_dis }}>Disable</option>
                                    <option value="1" {{ $selected_act }}>Active</option>
                                </select>
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