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
            <div class="stat-value">${{ $totalRevenue }}</div>
            <div class="stat-label">Total Revenue</div>
            <span class="stat-change {{ $revenueChange >= 0 ? 'positive' : 'negative' }}">
                <i class="bi bi-arrow-{{ $revenueChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($revenueChange) }}%
            </span>
        </div>

        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-cart-check"></i>
            </div>
            <div class="stat-value">{{ $ordersCount }}</div>
            <div class="stat-label">Total Orders</div>
            <span class="stat-change {{ $ordersChange >= 0 ? 'positive' : 'negative' }}">
                <i class="bi bi-arrow-{{ $ordersChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($ordersChange) }}%
            </span>
        </div>

        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-people"></i>
            </div>
            <div class="stat-value">{{ $usersCount }}</div>
            <div class="stat-label">Total Customers</div>
            <span class="stat-change {{ $usersChange >= 0 ? 'positive' : 'negative' }}">
                <i class="bi bi-arrow-{{ $usersChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($usersChange) }}%
            </span>
        </div>

        <div class="stat-card info">
            <div class="stat-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="stat-value">{{ $productsCount }}</div>
            <div class="stat-label">Total Products</div>
            <span class="stat-change {{ $productsChange >= 0 ? 'positive' : 'negative' }}">
                <i class="bi bi-arrow-{{ $productsChange >= 0 ? 'up' : 'down' }}"></i> {{ abs($productsChange) }}%
            </span>
        </div>
    </div>

    <!-- Revenue Breakdown -->
    <div class="stats-grid" style="margin-top: 2rem;">
        <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                <i class="bi bi-calendar-day"></i>
            </div>
            <div class="stat-value" style="color: white;">${{ number_format($revenueBreakdown['today'], 2) }}</div>
            <div class="stat-label" style="color: rgba(255, 255, 255, 0.9);">Today's Revenue</div>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                <i class="bi bi-calendar-week"></i>
            </div>
            <div class="stat-value" style="color: white;">${{ number_format($revenueBreakdown['week'], 2) }}</div>
            <div class="stat-label" style="color: rgba(255, 255, 255, 0.9);">This Week's Revenue</div>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
            <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                <i class="bi bi-calendar-month"></i>
            </div>
            <div class="stat-value" style="color: white;">${{ number_format($revenueBreakdown['month'], 2) }}</div>
            <div class="stat-label" style="color: rgba(255, 255, 255, 0.9);">This Month's Revenue</div>
        </div>

        <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
            <div class="stat-icon" style="background: rgba(255, 255, 255, 0.2);">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="stat-value" style="color: white;">${{ number_format($totalRevenue / max($ordersCount, 1), 2) }}
            </div>
            <div class="stat-label" style="color: rgba(255, 255, 255, 0.9);">Average Order Value</div>
        </div>
    </div>


        <!-- Low Stock Alert -->
        <div class="table-card" style="border-left: 4px solid #ef4444;">
            <h3><i class="bi bi-exclamation-triangle-fill" style="color: #ef4444; margin-right: 0.5rem;"></i>Low Stock Alert
            </h3>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lowStockProducts as $product)
                            <tr>
                                <td><strong>{{ $product->productName }}</strong></td>
                                <td><span
                                        class="badge-status {{ $product->quantity < 5 ? 'cancelled' : 'pending' }}">{{ $product->quantity }}
                                        left</span></td>
                                <td>
                                    @if ($product->quantity < 5)
                                        <span style="color: #ef4444; font-weight: 600;">Critical</span>
                                    @else
                                        <span style="color: #f59e0b; font-weight: 600;">Low</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="text-align: center; color: #10b981;">All products are well
                                    stocked! ✓</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                    @foreach ($orders as $order)
                        <tr>
                            <td>#ORD-{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->product->productName }}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>${{ $order->totalPrice }}</td>
                            <td><span
                                    class="badge-status {{ strtolower($order->orderStatus->orderStatus) }}">{{ $order->orderStatus->orderStatus }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




@endsection
