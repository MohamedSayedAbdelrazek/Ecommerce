@extends('admin.layouts.app')

@section('title', 'Show product - E-commerce Backoffice')

@section('page-title', 'Product Details')

@section('page-description', 'View complete details for this product.')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0 text-primary">{{ $product->productName }}</h4>
            <div>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i> Edit Product
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm ms-2">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Product Information Column -->
                <div class="col-md-8">
                    <h5 class="card-title mb-4">Information</h5>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Description</label>
                        <div class="col-sm-9">
                            {{ $product->description }}
                        </div>
                    </div>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Price</label>
                        <div class="col-sm-9">
                            <span class="badge bg-success fs-6">${{ number_format($product->price, 2) }}</span>
                        </div>
                    </div>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Quantity</label>
                        <div class="col-sm-9">
                            {{ $product->quantity }} units
                        </div>
                    </div>

                    <div class="mb-3 row border-bottom pb-2">
                        <label class="col-sm-3 fw-bold text-muted">Category</label>
                        <div class="col-sm-9">
                            <span
                                class="badge bg-info text-dark">{{ $product->category->categoryName ?? 'Uncategorized' }}</span>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 fw-bold text-muted">Created At</label>
                        <div class="col-sm-9 text-muted">
                            {{ $product->created_at->format('F d, Y h:i A') }}
                        </div>
                    </div>
                </div>

                <!-- Product Images Column -->
                <div class="col-md-4 border-start">
                    <h5 class="card-title mb-4">Product Images</h5>

                    @if ($product->images->count() > 0)
                        <!-- Simple Bootstrap Carousel -->
                        <div id="productImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                            <!-- Carousel Items -->
                            <div class="carousel-inner">
                                @foreach ($product->images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <a href="{{ asset('storage/' . $image->imagePath) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $image->imagePath) }}" class="d-block w-100"
                                                style="height: 400px; object-fit: contain; background: #fff;"
                                                alt="Product Image">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Carousel Controls -->
                            @if ($product->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#productImagesCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon bg-secondary rounded-circle p-2"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#productImagesCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon bg-secondary rounded-circle p-2"
                                        aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-light text-center border">
                            <span class="text-muted">No images available</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
