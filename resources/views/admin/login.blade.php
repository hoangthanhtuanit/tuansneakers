<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Đăng nhập quản trị viên</title>
    <base href="{{ asset('') }}">
    <link href="admin_assets/img/logo/logo.png" rel="icon">
    <link href="admin_assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="admin_assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="admin_assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/toastr.css" rel="stylesheet"/>
    <link href="admin_assets/css/ruang-admin.min.css" rel="stylesheet">
    @if(Session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{ session('toastr.type') }}";
            var MESSAGE = "{{ session('toastr.message') }}";
        </script>
    @endif
</head>

<body id="page-top" class="bg-gradient-login">

    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Đăng nhập</h1>
                                    </div>
                                    <form action="{{ url('admin/login') }}" method="post" class="user">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                                   aria-describedby="emailHelp"
                                                   placeholder="Nhập email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword"
                                                   placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
<script src="http:////cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin_assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="admin_assets/js/ruang-admin.min.js"></script>
<script src="js/toastr.min.js"></script>
<script src="js/vendor/jquery-1.12.0.min.js"></script>

@yield('script')
<script type="text/javascript">
    if (typeof TYPE_MESSAGE != "undefined") {
        switch (TYPE_MESSAGE) {
            case 'success':
                toastr.success(MESSAGE);
                break;
            case 'error':
                toastr.error(MESSAGE);
                break;
        }
    }
    CKEDITOR.replace('text-content');
</script>
</body>
</html>

