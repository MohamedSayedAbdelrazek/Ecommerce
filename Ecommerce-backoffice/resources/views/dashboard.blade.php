@extends('layouts.app')

@section('title', 'Dashboard - E-commerce Backoffice')

@section('page-title', 'Dashboard Overview')

@section('page-description', "Welcome back! Here's what's happening today.")

@section('content')
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
    
@endsection
