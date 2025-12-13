@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    
    {{-- 
    |----------------------------------------------------------
    | 1. HERO SECTION
    |----------------------------------------------------------
    --}}
    <section class="hero-section text-white py-5 mb-5" 
        style="background: linear-gradient(135deg, #0a1929 0%, #2d3e5f 100%); min-height: 400px; display: flex; align-items: center;">
        
        <div class="container text-center">
            <h1 class="display-3 fw-bold mb-3" style="color: #ff9900;">
                The Future of Shopping is Here
            </h1>
            <p class="lead mb-4">
                Discover our hand-picked selection of new arrivals and bestsellers.
            </p>
            
            {{-- Main Shop Now Button --}}
            <a href="{{ route('user.shop') }}" class="btn btn-lg btn-warning shadow-lg text-dark">
                <i class="bi bi-tags-fill me-2"></i> Shop All Products Now
            </a>
        </div>
    </section>

    {{-- 
    |----------------------------------------------------------
    | 2. MAIN CALL-TO-ACTION (Orders)
    |----------------------------------------------------------
    --}}
    <div class="container">
        <div class="text-center mb-5">
            {{-- Assuming the checkout route is defined, change '#' to your actual route --}}
            <a href="#" class="btn btn-lg btn-success shadow-lg">
                <i class="bi bi-bag-check-fill me-2"></i> View My Orders
            </a>
            <p class="mt-2 text-muted">Review items in your cart and finalize your purchase.</p>
        </div>
        
        <hr class="mb-5">

        {{-- 
        |----------------------------------------------------------
        | 3. FEATURED PRODUCTS SHOWCASE (Exactly 2 Products)
        |----------------------------------------------------------
        | This section expects a collection called $featuredProducts
        | to be passed from the controller, containing at least 2 products.
        | We use the detailed card structure provided in your original request.
        |----------------------------------------------------------
        --}}
        <h2 class="text-center mb-4 text-dark">🔥 Must-Have Products This Week</h2>

        <div class="row justify-content-center g-4">
            
            {{-- Loop through the first two featured products only --}}
            @forelse ($featuredProducts as $product)
                @php
                    $stock = $product->quantity ?? 0;
                    $firstImage = $product->images->first();
                @endphp
                
                <div class="col-12 col-md-6"> {{-- Use half width for 2 columns on medium screens and up --}}
                    <div class="card h-100 shadow-lg product-card">
                        
                        <div class="row g-0">
                            {{-- Product Image Column (Left) --}}
                            <div class="col-md-4 d-flex align-items-center justify-content-center">
                                @if ($firstImage)
                                    <img src="{{ asset('storage/' . $firstImage->imagePath) }}" 
                                            class="img-fluid rounded-start featured-product-img"
                                            alt="{{ $product->productName }}"
                                    >
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center" 
                                        style="width: 100%; height: 100%; min-height: 250px;">
                                        <i class="bi bi-box-seam" style="font-size: 4rem; color: #ced4da;"></i>
                                    </div>
                                @endif
                            </div>
                            
                            {{-- Product Details Column (Right) --}}
                            <div class="col-md-8 d-flex flex-column">
                                <div class="card-body d-flex flex-column h-100">
                                    <h4 class="card-title mb-1">{{$product->productName}}</h4>
                                    
                                    {{-- Full Description --}}
                                    <p class="card-text text-muted mb-2 product-description flex-grow-1">
                                        {{ $product->description ?? 'Description unavailable.' }}
                                    </p>
                                    
                                    <p class="text-danger display-6 fw-bold mb-3">
                                        @if (isset($product->price))
                                            ${{ number_format($product->price, 2) }}
                                        @else
                                            N/A
                                        @endif
                                    </p>

                                    {{-- Stock Indicator --}}
                                    <div class="stock-indicator mb-3 text-end 
                                        @if ($stock < 5 && $stock > 0) text-warning fw-bold 
                                        @elseif ($stock === 0) text-danger fw-bold 
                                        @else text-success @endif">
                                        
                                        @if ($stock > 0)
                                            <i class="bi bi-check-circle-fill"></i> In Stock ({{ $stock }} left)
                                        @else
                                            <i class="bi bi-x-circle-fill"></i> Out of Stock
                                        @endif
                                    </div>

                                    {{-- Quantity Selector and Add to Cart --}}
                                    <div class="card-footer bg-white border-0 pt-0 pb-0 mt-auto">
                                        @if ($stock > 0)
                                            <div class="input-group input-group-sm quantity-control" data-product-id="{{ $product->id }}">
                                                <button class="btn btn-outline-secondary btn-minus" type="button" disabled>-</button>
                                                <input type="number" 
                                                        class="form-control text-center quantity-input" 
                                                        value="1" 
                                                        min="1" 
                                                        max="{{ $stock }}" 
                                                        style="max-width: 50px;" 
                                                        aria-label="Quantity"
                                                >
                                                <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                                
                                                <button class="btn btn-success add-to-cart-btn ms-2 w-50" type="button">
                                                    <i class="bi bi-cart-plus"></i> Add to Cart
                                                </button>
                                            </div>
                                        @else
                                            <button class="btn btn-danger btn-lg w-100" type="button" disabled>
                                                Out of Stock
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="alert alert-info text-center">No featured products have been assigned for the home page yet.</p>
                </div>
            @endforelse
        </div>
    </div>
    
@endsection


@section('extra-css')
    @parent
    <style>
        /* Hero Section Styling */
        .hero-section {
            background-size: cover;
            background-position: center;
        }

        /* Customize Featured Product Card (using a horizontal layout) */
        .product-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.18) !important;
        }

        /* Image sizing for the horizontal card */
        .featured-product-img {
            max-height: 280px; /* Limit height */
            object-fit: contain; /* Ensure image fits without cropping */
            padding: 15px;
        }

        /* Ensure card body expands */
        .card-body {
            flex-grow: 1;
        }

        /* Quantity Control Styling (from your original request) */
        .quantity-control input.quantity-input {
            width: 50px !important;
            min-width: 50px;
            max-width: 50px;
        }

        /* Stock indicator coloring (from your original request) */
        .text-danger.fw-bold {
            color: #dc3545 !important; /* Out of Stock */
        }
        .text-warning.fw-bold {
            color: #ffc107 !important; /* Low Stock */
        }
    </style>
@endsection

@section('extra-js')
    @parent
    <script>
        // Quantity Control Logic (Copied from your original request, but adapted for the new HTML structure)
        document.querySelectorAll('.quantity-control').forEach(control => {
            const minusBtn = control.querySelector('.btn-minus');
            const plusBtn = control.querySelector('.btn-plus');
            const input = control.querySelector('.quantity-input');
            const maxQuantity = parseInt(input.getAttribute('max')) || 999; 

            function checkButtons() {
                const currentVal = parseInt(input.value);
                minusBtn.disabled = currentVal <= 1;
                plusBtn.disabled = currentVal >= maxQuantity;
            }

            checkButtons(); 

            minusBtn.addEventListener('click', function() {
                let currentVal = parseInt(input.value);
                if (currentVal > 1) {
                    input.value = currentVal - 1;
                }
                checkButtons();
            });

            plusBtn.addEventListener('click', function() {
                let currentVal = parseInt(input.value);
                if (currentVal < maxQuantity) {
                    input.value = currentVal + 1;
                }
                checkButtons();
            });

            input.addEventListener('input', function() {
                let currentVal = parseInt(input.value);
                
                input.value = Math.max(1, Math.min(maxQuantity, currentVal || 1));

                checkButtons();
            });
            
            // Add to Cart functionality (simulated)
            control.querySelector('.add-to-cart-btn').addEventListener('click', function() {
                const productId = control.getAttribute('data-product-id');
                const quantity = input.value;
                
                // In a real application, replace this alert with your AJAX call
                alert(`Simulated: Added ${quantity} of product #${productId} to cart!`);
            });
        });
        
        console.log("Home page loaded with featured product showcase.");
    </script>
@endsection