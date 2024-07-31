<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a class='logo logo-light' href='{{ route('admin.dashboard') }}'>
                    <span class="logo-sm">
                        <img src="/assets/admin/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/admin/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a class='logo logo-dark' href='{{ route('admin.dashboard') }}'>
                    <span class="logo-sm">
                        <img src="/assets/admin/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="/assets/admin/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href='{{ route('admin.dashboard') }}'>
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="menu-title">Bài viết</li>
                <li>
                    <a class='tp-link' href='{{ route('admin.categories.index') }}'>
                        <i data-feather="align-center"></i>
                        <span> Danh mục </span>
                    </a>
                    <a class='tp-link' href=''>
                        <i data-feather="book-open"></i>
                        <span> Bài viết </span>
                    </a>
                </li>
                <li class="menu-title mt-2">Tải khoản</li>
                <li>
                    <a class='tp-link' href=''>
                        <i data-feather="users"></i>
                        <span> Quản lý </span>
                    </a>
                    <a class='tp-link' href=''>
                        <i data-feather="user-plus"></i>
                        <span> Tạo tài khoản Admin </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
