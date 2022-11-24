<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
        <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Bookcloud</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{--            <div class="image">--}}
            {{--                <img src="/storage{{ Illuminate\Support\Facades\Auth::user()->avatar }}" class="img-circle elevation-2" alt="User Image">--}}
            {{--            </div>--}}
            <div style="text-align: center; width: 100%" class="info">
                <a href="#" class="d-block">Xin chào {{ Illuminate\Support\Facades\Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{ request()->is('admin/products') || request()->is('admin/products/only-trashed') ? 'menu-open' : '' }}">
{{--                <li class="nav-item has-treeview menu-open">--}}
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('backend.product.index') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p> Danh sách sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('backend.product.only-trashed') }}" class="nav-link">
                                <i class="far fa-list-alt nav-icon"></i>
                                <p>Danh sách đã gỡ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('orders') || request()->is('orders/non-accept') || request()->is('orders/success') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý đơn hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{ route('order.nonAccept') }}" class="nav-link">
                                <i class="fa fa-clock-o nav-icon" aria-hidden="true"></i>
                                <p>Đơn chờ phê duyệt</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order.index') }}" class="nav-link">
                                <i class="fa fa-check-circle-o nav-icon" aria-hidden="true"></i>
                                <p> Đơn đã xác nhận</p>
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
                <li class="nav-item has-treeview {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'menu-open' : '' }}">
                    <a href="{{ route('backend.category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý danh mục
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/authors') || request()->is('admin/authors/*') ? 'menu-open' : '' }}">
                    <a href="{{ route('backend.authors.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý tác giả
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/publishings') || request()->is('admin/publishings/*') ? 'menu-open' : '' }}">
                    <a href="{{ route('backend.publishings.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Quản lý NXB
                        </p>
                    </a>
                </li>
                @if(\Illuminate\Support\Facades\Auth::user()->role == 0)
                    <li class="nav-item has-treeview @if(request()->is('admin/users/*') || request()->is('admin/users')) menu-open @endif">
                        <a href="{{ route('backend.user.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Quản lý nhân viên
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
