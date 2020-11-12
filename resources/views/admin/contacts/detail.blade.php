@extends('admin.layouts.index')
@section('title', 'Chi tiết liên hệ')

@section('content')


    <div class="d-sm-flex align-items-center justify-content-end mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin/contact/index') }}">Danh sách liên hệ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết liên hệ</li>
        </ol>
    </div>

    <!-- DataTable with Hover -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết liên hệ</h6>
                <a href="{{ url('admin/contact/index') }}" class="btn btn-primary"><h6 style="margin-bottom: 0px;"><i class="fas fa-chevron-circle-left fa-sm"></i> Quay lại</h6></a>
            </div>
            @include('admin.layouts.error')
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th width="30%">Nội dung</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->full_name }}</td>
                            <td>{{ $contact->phone_number }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->message }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection