@extends('user.layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4 text-center text-primary">Welcome to E-Shop!</h1>

        {{-- NEW: Place Order Button Section (remains the main call-to-action) --}}
        <div class="text-center mb-5">
            {{-- Assuming the checkout route is defined, otherwise change '#' to your route --}}
            <a href="{{ route('user.my-orders') }}" class="btn btn-lg btn-success shadow-lg">
                <i class="bi bi-bag-check-fill me-2"></i> View My Orders
            </a>
            <p class="mt-2 text-muted">Review items in your cart and finalize your purchase.</p>
        </div>
        
        <hr class="mb-5">

        {{-- 
        |----------------------------------------------------------
        | CATEGORY NAVIGATION BAR (Pills)
        |----------------------------------------------------------
        --}}
        <div class="category-nav-row bg-light p-3 mb-5 shadow-sm rounded">
            <h5 class="mb-2 text-center text-muted">Browse Categories:</h5>
            <div class="d-flex justify-content-center flex-wrap">
                <ul class="nav nav-pills">
                    @foreach ($categories as $category)
                        @php
                            $categorySlug = Str::slug($category->categoryName);
                        @endphp
                        <li class="nav-item m-1">
                            <a class="nav-link btn btn-sm btn-outline-secondary" href="#category-{{ $categorySlug }}">
                                {{ $category->categoryName }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <hr class="mb-5">
        
        {{-- UPDATED: Product Sections --}}
        @foreach ($categories as $category)
            @php
                $categorySlug = Str::slug($category->categoryName);
            @endphp
            
            <section class="mb-5" id="category-{{ $categorySlug }}"> 
                <h2 class="border-bottom pb-2 mb-3 text-secondary">{{$category->categoryName}}</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    
                    @forelse ($category->products as $product)
                        <div class="col">
                            <div class="card h-100 shadow-sm product-card">
                                
                                @php
                                    $firstImage = $product->images->first();
                                    $stock = $product->quantity ?? 0;
                                @endphp

                                @if ($firstImage)
                                    <img src="{{ asset('storage/' . $firstImage->imagePath) }}" 
                                         class="card-img-top product-img"
                                         alt="{{ $product->productName }}"
                                    >
                                @else
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center product-img-placeholder">
                                        <i class="bi bi-box-seam" style="font-size: 3rem; color: #ced4da;"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title mb-1">{{$product->productName}}</h5>
                                    
                                    {{-- FULL description is observable --}}
                                    <p class="card-text text-muted mb-2 product-description flex-grow-1">
                                        {{ $product->description ?? 'Description unavailable.' }}
                                    </p>
                                    
                                    <p class="text-danger fw-bold mb-3">
                                        @if (isset($product->price))
                                            ${{ number_format($product->price, 2) }}
                                        @else
                                            N/A
                                        @endif
                                    </p>

                                    {{-- Stock Indicator using actual quantity --}}
                                    <div class="stock-indicator mb-3 text-end @if ($stock < 5 && $stock > 0) text-warning fw-bold @elseif ($stock === 0) text-danger fw-bold @else text-success @endif">
                                        @if ($stock > 0)
                                            <i class="bi bi-check-circle-fill"></i> In Stock ({{ $stock }} left)
                                        @else
                                            <i class="bi bi-x-circle-fill"></i> Out of Stock
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="card-footer bg-white border-0 pt-0 pb-3">
    
    @if ($stock > 0)
        
        {{-- 🚨 ACTION: Wrap the input group in a form for submission --}}
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            
            {{-- Hidden fields to send with the form --}}
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" class="quantity-form-input" value="1">
            
            <div class="input-group input-group-sm quantity-control" data-product-id="{{ $product->id }}">
                <button class="btn btn-outline-secondary btn-minus" type="button" disabled>-</button>
                
                {{-- NOTE: This input is for VISUAL/JS control --}}
                <input type="number" 
                       class="form-control text-center quantity-input" 
                       value="1" 
                       min="1" 
                       max="{{ $stock }}" 
                       style="max-width: 50px;" 
                       aria-label="Quantity"
                >
                
                <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                
                {{-- 🚨 ACTION: Change 'type="button"' to 'type="submit"' to send the form --}}
                <button class="btn btn-success add-to-cart-btn ms-2" type="submit">
                    <i class="bi bi-cart-plus"></i> Add
                </button>
            </div>
        </form>
    @else
        {{-- Out of Stock Button --}}
        <button class="btn btn-danger btn-lg w-100" type="button" disabled>
            Out of Stock
        </button>
    @endif

</div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="alert alert-info">No products found in this category.</p>
                        </div>
                    @endforelse
                </div>
            </section>
        @endforeach
    </div>
@endsection

{{-- Optional sections --}}
@section('cart-count', '3')
@section('wishlist-count', '5')
@section('show-categories', true)

@section('extra-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Card Hover Effect */
        .product-card {
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .product-img, .product-img-placeholder {
            height: 200px; 
            object-fit: cover; 
            width: 100%;
            border-bottom: 1px solid #eee;
        }
        
        .card-body {
            flex-grow: 1;
        }
        /* Keep input field narrow */
        .quantity-control input.quantity-input {
            width: 50px !important;
            min-width: 50px;
            max-width: 50px;
        }

        /* Stock indicator coloring */
        .text-danger.fw-bold {
            color: #dc3545 !important; /* Out of Stock */
        }
        .text-warning.fw-bold {
            color: #ffc107 !important; /* Low Stock */
        }
    </style>
@endsection

@section('extra-js')
    <script>
        // Existing Smooth Scrolling Logic
        document.querySelectorAll('.category-nav-row a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scroll({
                        top: targetElement.offsetTop - 70, 
                        behavior: 'smooth'
                    });
                }
            });
        });

        // NEW: Quantity Control Logic
        // NEW: Quantity Control Logic
document.querySelectorAll('.quantity-control').forEach(control => {
    const minusBtn = control.querySelector('.btn-minus');
    const plusBtn = control.querySelector('.btn-plus');
    const input = control.querySelector('.quantity-input');
    const maxQuantity = parseInt(input.getAttribute('max'));
    
    // 🚨 CRITICAL: Find the hidden input associated with this control group
    // Assuming the hidden input is right before the control div in the form
    const form = control.closest('form');
    const hiddenInput = form.querySelector('.quantity-form-input');


    function updateHiddenInput(newVal) {
        if (hiddenInput) {
            hiddenInput.value = newVal;
        }
    }

    function checkButtons() {
        const currentVal = parseInt(input.value);
        minusBtn.disabled = currentVal <= 1;
        plusBtn.disabled = currentVal >= maxQuantity;
        
        // 🚨 IMPORTANT: Update the hidden field when the visual input changes
        updateHiddenInput(currentVal); 
    }

    // Initial check
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

    // Prevent manual input exceeding limits
    input.addEventListener('input', function() {
        let currentVal = parseInt(input.value);
        if (isNaN(currentVal) || currentVal < 1) {
            input.value = 1;
        } else if (currentVal > maxQuantity) {
            input.value = maxQuantity;
        }
        checkButtons();
    });
    
    // NOTE: I commented out your original Add to Cart button logic 
    // because you are using a form submit (type="submit"), not an AJAX call.
    /*
    control.querySelector('.add-to-cart-btn').addEventListener('click', function() {
        const productId = control.getAttribute('data-product-id');
        const quantity = input.value;
        
        // Since you are using a form submission, the browser handles the POST request
        // when the user clicks the submit button. You don't need this block 
        // unless you switch to an AJAX submission.
        
        alert(`Added ${quantity} of product #${productId} to orders!`);
    });
    */
});

console.log("Home page loaded.");
    </script>
@endsection