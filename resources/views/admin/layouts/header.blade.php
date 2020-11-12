<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" id="alertsDropdown" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter">{{ count($orderN) }}</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Thông báo
                </h6>
                @foreach($orderN as $order)
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/order/index') }}">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="admin_assets/img/man.png" style="max-width: 60px" alt="">
                    </div>
                    <div>
                        <div class="small text-gray-500">{{ $order->date_order }}</div>
                        <span class="font-weight-bold">{{ $order->full_name }} đã mua hàng.</span>
                    </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{ url('admin/order/index') }}">Xem thêm</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-warning badge-counter">{{ count($messages) }}</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Tin nhắn
                </h6>
                @foreach($messages as $message)
                    <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/contact/index') }}">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="admin_assets/img/man.png" style="max-width: 60px" alt="">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">{{ $message->message }}</div>
                        <div class="small text-gray-500">{{ $message->full_name }} · {{ date('H:i:s d/m/Y', strtotime($message->created_at)) }}</div>
                    </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{ url('admin/contact/index') }}">Xem thêm</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" id="messagesDropdown" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-tasks fa-fw"></i>
                <span class="badge badge-success badge-counter">3</span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Nhiệm vụ
                </h6>
                <a class="dropdown-item align-items-center">
                    <div class="mb-3">
                        <div class="small text-gray-500">Design Button
                            <div class="small float-right"><b>50%</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                 aria-valuenow="50"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item align-items-center">
                    <div class="mb-3">
                        <div class="small text-gray-500">Make Beautiful Transitions
                            <div class="small float-right"><b>30%</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%"
                                 aria-valuenow="30"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item align-items-center">
                    <div class="mb-3">
                        <div class="small text-gray-500">Create Pie Chart
                            <div class="small float-right"><b>75%</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                 aria-valuenow="75"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500">Xem thêm</a>
            </div>
        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('/uploads/users/' . Auth::user()->avatar) }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::user()->full_name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                 aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Thông tin tài khoản
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cài đặt
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Bản ghi hoạt động
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('admin/logout') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Đăng xuất
                </a>
            </div>
        </li>
    </ul>
</nav>