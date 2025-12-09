@extends('admin.layouts.app')

@section('title', 'Orders - E-commerce Backoffice')

@section('page-title', 'Orders Overview')

@section('page-description', "Manage your orders.")

@section('content')

    <div class="mb-3">
    <a href="{{route('orders.create')}}" class="btn btn-secondary">
            <i class="bi bi-plus-circle"></i> Create Order
        </a>
    </div>

    <div class="table-card">
    @if(session('success'))
            <div class="alert alert-success">
            {{session('success')}}
            </div>
        @endif
        <h3>All Orders</h3>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Order Name</th>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                    <td>{{$order->orderName}}</td>
                    <td>{{$order->orderDate}}</td>
                    <td>{{$order->totalPrice}}</td>
                    <td>{{$order->user->name ?? 'N/A'}}</td>
                    <td>{{$order->orderStatus->orderStatus ?? 'N/A'}}</td>
                            <td class="d-flex gap-2">
                        <a href="{{route('orders.show', $order->id)}}"
                             class="btn btn-primary btn-sm">Show</a>

                        <a href="{{route('orders.edit', $order->id)}}" 
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('orders.destroy', $order->id)}}"
                             method="POST" 
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm d-inline">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No orders found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
