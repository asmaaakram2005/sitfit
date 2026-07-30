<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Title Yield --}}
    <title>@yield('title', 'Admin Dashboard') - SitFit</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Global CSS Asset --}}
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">

    {{-- Page Specific CSS Yield --}}
    @yield('css')
</head>
<body>

    {{-- يمكنك وضع الـ Sidebar أو Navbar هنا مستقبلاً --}}

    <div class="admin-wrapper">

        <!-- Sidebar Overlay for Mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Sidebar Navigation -->
        <aside class="sidebar" id="sidebar">
           <div class="sidebar-logo">
    <img src="{{ asset('images/sitfit_logo_admin.png') }}" alt="SitFit Logo">
</div>

            <nav class="sidebar-nav">
                <a href="#" class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-pie"></i>
                    <span>Dashboard</span>
                </a>

                <a href="#" class="nav-item {{ request()->is('admin/products*') ? 'active' : '' }}">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Products</span>
                </a>

                <a href="#" class="nav-item {{ request()->is('admin/orders*') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Orders</span>
                </a>

                <a href="#" class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>

                <a href="#" class="nav-item {{ request()->is('admin/reviews*') ? 'active' : '' }}">
                    <i class="fa-solid fa-star"></i>
                    <span>Reviews</span>
                </a>

                <a href="#" class="nav-item {{ request()->is('admin/messages*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i>
                    <span>Contact Messages</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="#" class="nav-item logout-link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

    <main class="main-content">
        {{-- Main Content Yield --}}
       <!-- Sticky Topbar -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>

                    <h1 class="page-title">
                        @yield('title', 'Admin Dashboard')
                    </h1>
                </div>

                <div class="topbar-actions">
                    <!-- Notification Bell -->
                    <div class="notification-wrapper">
                        <button class="icon-btn" aria-label="Notifications">
                            <i class="fa-regular fa-bell"></i>
                            <span class="badge">3</span>
                        </button>
                    </div>

                    <!-- User Profile Card -->
                    <div class="admin-profile">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=9DC183&color=001F3F&bold=true" alt="Admin Profile" class="profile-img">
                        <div class="profile-info">
                            <span class="profile-name">Alex Morgan</span>
                            <span class="profile-role">Administrator</span>
                        </div>
                    </div>
                </div>
            </header>

          <section class="page-content">
                @yield('content')
            </section>

            </div>
       
    </main>

    {{-- يمكنك إضافة الـ JS Scripts هنا لو احتجت مستقبلاً --}}

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {

    if (window.innerWidth <= 992) {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    } else {
        sidebar.classList.toggle('collapsed');
    }
}

            if (menuToggle && sidebar && overlay) {
                menuToggle.addEventListener('click', toggleSidebar);
                overlay.addEventListener('click', toggleSidebar);
            }
        });
    </script>

    @yield('js')
</body>
</html>