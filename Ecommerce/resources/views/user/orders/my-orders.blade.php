@extends('user.layouts.app')

@section('title', 'My Orders')

@section('extra-css')
<style>
    .orders-container {
        min-height: 70vh;
    }
    
    .page-header {
        background: linear-gradient(135deg, #0a1929 0%, #1a2942 50%, #2d3e5f 100%);
        padding: 3rem 0;
        margin-bottom: 2rem;
        border-radius: 0 0 20px 20px;
    }
    
    .page-header h1 {
        color: #fff;
        font-weight: 700;
        margin: 0;
    }
    
    .page-header p {
        color: rgba(255, 255, 255, 0.7);
        margin: 0.5rem 0 0;
    }
    
    .orders-table {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }
    
    .orders-table thead {
        background: linear-gradient(135deg, #0a1929 0%, #1a2942 100%);
        color: #fff;
    }
    
    .orders-table thead th {
        padding: 1rem;
        font-weight: 600;
        border: none;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    
    .orders-table tbody td {
        padding: 1rem;
        vertical-align: middle;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .orders-table tbody tr:hover {
        background: rgba(0, 71, 255, 0.03);
    }
    
    .status-badge {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: capitalize;
    }
    
    .status-pending {
        background: #fff3cd;
        color: #856404;
    }
    
    .status-processing {
        background: #cce5ff;
        color: #004085;
    }
    
    .status-shipped {
        background: #d4edda;
        color: #155724;
    }
    
    .status-delivered {
        background: #28a745;
        color: #fff;
    }
    
    .status-cancelled {
        background: #f8d7da;
        color: #721c24;
    }
    
    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .product-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .empty-orders {
        text-align: center;
        padding: 4rem 2rem;
    }
    
    .empty-orders i {
        font-size: 4rem;
        color: #dee2e6;
        margin-bottom: 1rem;
    }
    
    .empty-orders h4 {
        color: #6c757d;
    }
    
    .btn-shop-now {
        background: linear-gradient(135deg, #0047ff 0%, #4a1fdc 100%);
        color: #fff;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        text-decoration: none;
        display: inline-block;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .btn-shop-now:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 5px 20px rgba(0, 71, 255, 0.4);
    }
    
    .order-id {
        font-weight: 600;
        color: #0047ff;
    }
    
    .price-cell {
        font-weight: 600;
        color: #28a745;
    }
</style>
@endsection

@section('content')
<div class="orders-container">
    <div class="page-header text-center">
        <div class="container">
            <h1><i class="bi bi-bag-check me-2"></i>My Orders</h1>
            <p>Track and manage your orders</p>
        </div>
    </div>
    
    <div class="container">
        @if($orders->count() > 0)
            <div class="table-responsive orders-table">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="order-id">#{{ $order->id }}</td>
                            <td>
                                <div class="product-info">
                                    @if($order->product && $order->product->images->first())
                                        <img src="{{ asset('storage/' . $order->product->images->first()->imagePath) }}" 
                                             alt="{{ $order->product->productName }}" 
                                             class="product-image">
                                    @else
                                        <div class="product-image bg-secondary d-flex align-items-center justify-content-center">
                                            <i class="bi bi-image text-white"></i>
                                        </div>
                                    @endif
                                    <span>{{ $order->product->productName ?? 'Product Unavailable' }}</span>
                                </div>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order->orderDate)->format('M d, Y') }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td class="price-cell">${{ number_format($order->totalPrice, 2) }}</td>
                            <td>
                                @php
                                    $statusClass = 'status-pending';
                                    $statusName = $order->orderStatus->orderStatus ?? 'pending';
                                    
                                    if(strtolower($statusName) == 'processing') $statusClass = 'status-processing';
                                    elseif(strtolower($statusName) == 'shipped') $statusClass = 'status-shipped';
                                    elseif(strtolower($statusName) == 'delivered') $statusClass = 'status-delivered';
                                    elseif(strtolower($statusName) == 'cancelled') $statusClass = 'status-cancelled';
                                @endphp
                                <span class="status-badge {{ $statusClass }}">{{ $statusName }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
           <div class="d-flex justify-content-center mt-4">
    {{ $orders->links('pagination::bootstrap-5') }}
</div>
        @else
            <div class="orders-table">
                <div class="empty-orders">
                    <i class="bi bi-bag-x"></i>
                    <h4>No orders yet</h4>
                    <p class="text-muted mb-4">You haven't placed any orders. Start shopping now!</p>
                    <a href="{{ route('user.shop') }}" class="btn-shop-now">
                        <i class="bi bi-cart me-2"></i>Shop Now
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
