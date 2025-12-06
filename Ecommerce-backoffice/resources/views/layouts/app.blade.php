<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'E-commerce Backoffice')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @yield('extra-css')
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3><i class="bi bi-shop"></i> E-Commerce</h3>
            </div>
            <nav class="sidebar-menu">
                <a href="{{ route('dashboard') }}"
                    class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Products</span>
                </a>

                <a href="#" class="menu-item">
                    <i class="bi bi-cart3"></i>
                    <span>Orders</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-people"></i>
                    <span>Customers</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-grid-3x3"></i>
                    <span>Categories</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-star"></i>
                    <span>Reviews</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-credit-card"></i>
                    <span>Payments</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-truck"></i>
                    <span>Shipping</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-bar-chart"></i>
                    <span>Analytics</span>
                </a>
                <a href="#" class="menu-item">
                    <i class="bi bi-gear"></i>
                    <span>Settings</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="menu-item"
                        style="width: 100%; text-align: left; background: none; border: none; cursor: pointer;">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Bar -->
            <div class="top-bar">
                <div>
                    <h1>@yield('page-title', 'Dashboard')</h1>
                    <p class="text-muted mb-0">@yield('page-description', 'Welcome back!')</p>
                </div>
                <div class="user-info">
                    <div>
                        <div class="fw-bold">Admin User</div>
                        <small class="text-muted">Administrator</small>
                    </div>
                    <div class="user-avatar">A</div>
                </div>
            </div>

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- Custom Dashboard JS -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @yield('extra-js')
</body>

</html>
