<!-- Left Sidebar Start -->
<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='{{ url('/') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='{{ url('/') }}'>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Quản Trị</li>
                <li>
                    <a class='tp-link' href='{{ url('/') }}'>
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ route('tai_khoan.index') }}'>
                        <i data-feather="users"></i>
                        <span> Quản trị tài khoảnn </span>
                    </a>
                </li>
                <li class="menu-title">Kinh doanh</li>
                <li>
                    <a class='tp-link' href='{{ route('danh_muc.index') }}'>
                        <i data-feather="align-center"></i>
                        <span> Danh mục sản phẩm </span>
                    </a>
                </li>
                <li>
                    <a class='tp-link' href='{{ route('san_pham.index') }}'>
                        <i data-feather="package"></i>
                        <span> Sản phẩm </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
<!-- Left Sidebar End -->
