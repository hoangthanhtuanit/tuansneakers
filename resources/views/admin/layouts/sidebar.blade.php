<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="admin_assets/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">TuanSneakers</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang tổng quan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/category/index') }}">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Quản lý danh mục</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/product/index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Quản lý sản phẩm</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/supplier/index') }}">
            <i class="fas fa-fw fa-palette"></i>
            <span>Quản lý nhà cung cấp</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/order/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý đơn hàng</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/user/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý tài khoản</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/banner/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý banner</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/blog/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Quản lý tin tức</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/contact/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Liên hệ</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/inventory/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Hàng tồn kho</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/revenue/index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Thống kê doanh thu</span>
        </a>
    </li>
</ul>
