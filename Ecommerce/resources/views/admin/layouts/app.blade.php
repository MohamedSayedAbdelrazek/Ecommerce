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

                <a href="{{ route('products.index') }}" class="menu-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Products</span>
                </a>

                <a href="{{ route('orders.index') }}"
                    class="menu-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <i class="bi bi-cart3"></i>
                    <span>Orders</span>
                </a>
                <a href="{{ route('users.index') }}"
                    class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
                <a href="{{ route('categories.index') }}"
                    class="menu-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <i class="bi bi-grid-3x3"></i>
                    <span>Categories</span>
                </a>
                <!-- <a href="{{route('messages.index')}}" class="menu-item {{ request()->routeIs('messages.*') ? 'active' : '' }}">
                    <i class="bi bi-star"></i>
                    <span>Messages</span>
                </a> -->
              
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
                        <div class="fw-bold">{{ auth()->user()->name }}</div>
                        <small class="text-muted">{{ strtoupper(auth()->user()->role) }}</small>
                    </div>
                    <div class="user-dropdown">
                        <div class="user-avatar" id="userMenuButton">
                            {{ strtoupper(auth()->user()->name[0]) }}
                        </div>
                        <div class="dropdown-menu" id="userDropdownMenu">
                            <div class="dropdown-header">
                                <div class="dropdown-user-name">{{ auth()->user()->name }}</div>
                                <div class="dropdown-user-email">{{ auth()->user()->email }}</div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('user.index') }}" class="dropdown-item">
                                <i class="bi bi-shop"></i>
                                <span>View Store</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="bi bi-person"></i>
                                <span>Profile Settings</span>
                            </a>
                            <a href="{{ route('user-password.edit') }}" class="dropdown-item">
                                <i class="bi bi-key"></i>
                                <span>Change Password</span>
                            </a>
                            <a href="{{ route('two-factor.show') }}" class="dropdown-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Two-Factor Authentication</span>
                            </a>
                            <a href="{{ route('appearance.edit') }}" class="dropdown-item">
                                <i class="bi bi-palette"></i>
                                <span>Appearance</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form id="dropdown-logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item logout-item">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Dashboard JS -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

    @yield('extra-js')
</body>

</html>
