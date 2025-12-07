@extends('layouts.app')

@section('title', 'Show User - E-commerce Backoffice')

@section('page-title', 'User Details')

@section('page-description', 'View complete details for this User.')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0 text-primary">{{ $user->name }}</h4>
            <div>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit User
                </a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm ms-2">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- User Information Column -->
                <div class="col-md-8">
                    <h5 class="card-title mb-4">Information</h5>
                       
                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Name</label>
                        <div class="col-sm-9">
                            {{ $user->name }}
                        </div>
                    </div>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Email</label>
                        <div class="col-sm-9">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Role</label>
                        <div class="col-sm-9">
                            {{ $user->role }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 fw-bold text-muted">Created At</label>
                        <div class="col-sm-9 text-muted">
                            {{ $user->created_at->format('F d, Y h:i A') }}
                        </div>
                    </div>
                </div>


                    <!-- User Orders Column -->
                    <div class="col-md-4 border-start">
                        <h5 class="card-title mb-4">User Orders</h5>

                        @if ($user->orders->count() > 0)
                            <div class="row g-2">
                                @foreach ($user->orders as $order)
                                    <div class="col-6">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h6 class="card-title">Order #{{ $order->id }}</h6>
                                                <p class="card-text mb-1"><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                                                <p class="card-text"><strong>Total:</strong> ${{ number_format($order->totalAmount, 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-light text-center border">
                                <span class="text-muted">No Orders available</span>
                            </div>
                        @endif
                    </div> 
            </div>
        </div>
    </div>

@endsection
