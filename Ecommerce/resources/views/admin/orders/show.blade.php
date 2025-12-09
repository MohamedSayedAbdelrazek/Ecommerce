@extends('admin.layouts.app')

@section('title', 'Order Details - E-commerce Backoffice')

@section('page-title', 'Order Details')

@section('page-description', "View order details.")

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Order #{{ $order->id }}</h5>
            <div>
                 <a href="{{route('orders.edit', $order->id)}}" class="btn btn-warning btn-sm">Edit</a>
                 <a href="{{route('orders.index')}}" class="btn btn-secondary btn-sm">Back to List</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Order Name:</div>
                <div class="col-md-8">{{ $order->orderName }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Order Date:</div>
                <div class="col-md-8">{{ $order->orderDate }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">User:</div>
                <div class="col-md-8">{{ $order->user->name ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Status:</div>
                <div class="col-md-8">{{ $order->orderStatus->orderStatus ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Product:</div>
                <div class="col-md-8">{{ $order->product->productName ?? 'N/A' }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Price:</div>
                <div class="col-md-8">{{ $order->price }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Quantity:</div>
                <div class="col-md-8">{{ $order->quantity }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Total Amount:</div>
                <div class="col-md-8">{{ $order->totalAmount }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 fw-bold">Total Price:</div>
                <div class="col-md-8">{{ $order->totalPrice }}</div>
            </div>
        </div>
    </div>

@endsection
