<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('adminlte/dist/img/home.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">G1</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Trần Ngọc Huy</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->




                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm

                        </p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{route('product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sản phẩm

                        </p>
                    </a>
                </li>  <li class="nav-item">
                    <a href="{{route('slider.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                            Slider
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                            Settings
                        </p>
                    </a>
                </li><li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Danh sách nhân viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('orders.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                           Quản lý đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('roles.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                           Danh sách vai tro
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('flashsales.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                           Flash Sale
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('warehouse.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Quản lý dữ liệu kho
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('inventory.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           Quản lý dữ tồn kho
                        </p>
                    </a>
                </li>
                
                {{-- <li class="nav-item" hidden>
                    <a href="{{route('permissions.create')}}" class="nav-link">
                        <p>
                           Tao du lieu bang Permissions
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('statistic.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                           Thống kê
                        </p>
                    </a>
                </li>
               
            </ul>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <div class="flex-grow-1 w-100">


    <p class="nav-item text-white float-right align-bottom justify-content-end ">
        <button ><a href="{{route('logout')}}">Log out</a></button>
    </p>
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    function endSS() {
        window.close();
    }
</script>
