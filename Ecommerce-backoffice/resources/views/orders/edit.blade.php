@extends('layouts.app')

@section('title', 'Edit Order - E-commerce Backoffice')

@section('page-title', 'Edit Order')

@section('page-description', "Edit order details.")

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="orderName" class="form-label">Order Name</label>
        <input type="text" name="orderName" id="orderName"
               class="form-control"
               value="{{ old('orderName', $order->orderName) }}">
    </div>

    <div class="mb-3">
        <label for="orderDate" class="form-label">Order Date</label>
        <input type="date" name="orderDate" id="orderDate"
               class="form-control"
               value="{{ old('orderDate', $order->orderDate) }}">
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-select">
                <option value="">Select a user</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id', $order->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label for="order_status_id" class="form-label">Status</label>
            <select name="order_status_id" id="order_status_id" class="form-select">
                <option value="">Select a status</option>
                @foreach ($orderStatuses as $status)
                    <option value="{{ $status->id }}" {{ old('order_status_id', $order->order_status_id) == $status->id ? 'selected' : '' }}>
                        {{ $status->orderStatus }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select name="product_id" id="product_id" class="form-select">
            <option value="">Select a product</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id', $order->product_id) == $product->id ? 'selected' : '' }}>
                    {{ $product->productName }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" name="price" id="price"
                   class="form-control"
                   value="{{ old('price', $order->price) }}">
        </div>
        <div class="col-md-3 mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity"
                   class="form-control"
                   value="{{ old('quantity', $order->quantity) }}">
        </div>
        <div class="col-md-3 mb-3">
            <label for="totalAmount" class="form-label">Total Amount</label>
            <input type="number" step="0.01" name="totalAmount" id="totalAmount"
                   class="form-control"
                   value="{{ old('totalAmount', $order->totalAmount) }}">
        </div>
        <div class="col-md-3 mb-3">
            <label for="totalPrice" class="form-label">Total Price</label>
            <input type="number" step="0.01" name="totalPrice" id="totalPrice"
                   class="form-control"
                   value="{{ old('totalPrice', $order->totalPrice) }}">
        </div>
    </div>

    <button type="submit" class="btn btn-warning mt-3">Update Order</button>
</form>

@endsection
