<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
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

<body id="page-top">
<div id="wrapper">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
            @include('admin.layouts.header')
            <!-- Topbar -->

            <!-- Container Fluid-->
            @yield('content')
            <!---Container Fluid-->
        </div>
        <!-- Footer -->
        @include('admin.layouts.footer')
        <!-- Footer -->
    </div>
</div>

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
<script src="admin_assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="admin_assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="admin_assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTableHover').DataTable();
    } );
</script>
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
