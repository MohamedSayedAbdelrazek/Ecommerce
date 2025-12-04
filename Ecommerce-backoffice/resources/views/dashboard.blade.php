<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - E-commerce Backoffice</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h3><i class="bi bi-shop"></i> E-Commerce</h3>
            </div>
            <nav class="sidebar-menu">
                <a href="#" class="menu-item active">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>

                <a href="" class="menu-item">
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
                    <h1>Dashboard Overview</h1>
                    <p class="text-muted mb-0">Welcome back! Here's what's happening today.</p>
                </div>
                <div class="user-info">
                    <div>
                        <div class="fw-bold">Admin User</div>
                        <small class="text-muted">Administrator</small>
                    </div>
                    <div class="user-avatar">A</div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card primary">
                    <div class="stat-icon">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="stat-value">$45,231</div>
                    <div class="stat-label">Total Revenue</div>
                    <span class="stat-change positive">
                        <i class="bi bi-arrow-up"></i> 12.5%
                    </span>
                </div>

                <div class="stat-card success">
                    <div class="stat-icon">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="stat-value">1,284</div>
                    <div class="stat-label">Total Orders</div>
                    <span class="stat-change positive">
                        <i class="bi bi-arrow-up"></i> 8.2%
                    </span>
                </div>

                <div class="stat-card warning">
                    <div class="stat-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stat-value">3,842</div>
                    <div class="stat-label">Total Customers</div>
                    <span class="stat-change positive">
                        <i class="bi bi-arrow-up"></i> 5.7%
                    </span>
                </div>

                <div class="stat-card info">
                    <div class="stat-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="stat-value">567</div>
                    <div class="stat-label">Total Products</div>
                    <span class="stat-change negative">
                        <i class="bi bi-arrow-down"></i> 2.1%
                    </span>
                </div>
            </div>

            <!-- Charts -->
            <div class="chart-grid">
                <div class="chart-card">
                    <h3>Sales Overview</h3>
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="chart-card">
                    <h3>Revenue by Category</h3>
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="table-card">
                <h3>Recent Orders</h3>
                <div class="table-responsive">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#ORD-001</td>
                                <td>John Doe</td>
                                <td>Wireless Headphones</td>
                                <td>2025-12-04</td>
                                <td>$299.00</td>
                                <td><span class="badge-status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-002</td>
                                <td>Jane Smith</td>
                                <td>Smart Watch</td>
                                <td>2025-12-04</td>
                                <td>$449.00</td>
                                <td><span class="badge-status processing">Processing</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-003</td>
                                <td>Mike Johnson</td>
                                <td>Laptop Stand</td>
                                <td>2025-12-03</td>
                                <td>$89.00</td>
                                <td><span class="badge-status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-004</td>
                                <td>Sarah Williams</td>
                                <td>Mechanical Keyboard</td>
                                <td>2025-12-03</td>
                                <td>$159.00</td>
                                <td><span class="badge-status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>#ORD-005</td>
                                <td>David Brown</td>
                                <td>USB-C Hub</td>
                                <td>2025-12-02</td>
                                <td>$79.00</td>
                                <td><span class="badge-status processing">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <!-- Custom Dashboard JS -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
