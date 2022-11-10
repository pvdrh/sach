<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Bookcloud</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/storage{{ Illuminate\Support\Facades\Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.product.index') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p> Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.product.create') }}" class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Thêm mới sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.product.only-trashed') }}" class="nav-link">
                                <i class="far fa-trash-restore nav-icon"></i>
                                <p>Danh sách đã gỡ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.category.index') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p> Tất cả thể loại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.category.create') }}" class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p> Tạo thể loại mới</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí tác giả
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.authors.index') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p> Danh sách tác giả</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.authors.create') }}" class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Thêm mới tác giả</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí NXB
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.publishings.index') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p> Danh sách NXB</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.publishings.create') }}" class="nav-link">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Thêm mới NXB</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('order.index') }}" class="nav-link">
                                <i class="fa fa-check-circle-o nav-icon" aria-hidden="true"></i>
                                <p> Đơn đã xác nhận</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order.nonAccept') }}" class="nav-link">
                                <i class="fa fa-clock-o nav-icon" aria-hidden="true"></i>
                                <p>Đơn chờ phê duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order.successList') }}" class="nav-link">
                                <i class="fa fa-clock-o nav-icon" aria-hidden="true"></i>
                                <p>Đơn hàng đã giao</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lí thành viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('backend.user.index') }}" class="nav-link">
                                <i class="fa fa-user nav-icon" aria-hidden="true"></i>
                                <p> Tất cả thành viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
