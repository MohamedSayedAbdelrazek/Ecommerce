@extends('user.layouts.app')

@section('title', 'About Us - E-Shop')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="fw-bold mb-3">About E-Shop</h1>
                <p class="lead">Discover our passion for excellence and commitment to customer satisfaction</p>
            </div>
            <div class="col-lg-6">
                <img src="{{ asset('images/hero.webp') }}" alt="Straw Hat Crew" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Why Choose Us</h2>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6">
                <div class="value-card text-center p-4">
                    <i class="bi bi-leaf fs-1 d-block mb-3"></i>
                    <h5 class="fw-bold">Adventure Spirit</h5>
                    <p>Like our crew exploring the Grand Line, we quest for the finest products for you! 🗺️</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="value-card text-center p-4">
                    <i class="bi bi-lightning-charge fs-1 d-block mb-3"></i>
                    <h5 class="fw-bold">Swift Delivery</h5>
                    <p>Fast as Luffy's Gear 2 punch - your orders arrive in a flash! ⚡</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="value-card text-center p-4">
                    <i class="bi bi-star fs-1 d-block mb-3"></i>
                    <h5 class="fw-bold">Premium Quality</h5>
                    <p>Every item tested with Zoro's precision - no fakes on this ship! ⭐</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="value-card text-center p-4">
                    <i class="bi bi-headset fs-1 d-block mb-3"></i>
                    <h5 class="fw-bold">True Nakama Support</h5>
                    <p>Usopp's tall tales got nothing on our customer care dedication! 💬</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-2">Meet Our (Crew)</h2>
        <p class="text-center text-muted mb-5">Three incredible talents sailing together to bring you the best experience!</p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4 text-center">
                <img src="{{ asset('images/liffy1.jpg') }}" alt="Luffy" class="team-member-image rounded-circle mb-3">
                <h5 class="fw-bold">Monkey D. Luffy 🔴</h5>
                <p class="text-primary fw-bold">Captain & Founder</p>
                <p class="text-muted small">Dreams big, laughs hard, leads with heart. Determined to be the King of E-commerce! 👑</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <img src="{{ asset('images/zoro.jpg') }}" alt="Zoro" class="team-member-image rounded-circle mb-3">
                <h5 class="fw-bold">Roronoa Zoro ⚔️</h5>
                <p class="text-primary fw-bold">Quality Manager</p>
                <p class="text-muted small">Precision & dedication. Ensures every product meets our legendary standards! 🗡️</p>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <img src="{{ asset('images/Usopp.jpg') }}" alt="Usopp" class="team-member-image rounded-circle mb-3">
                <h5 class="fw-bold">Usopp 🎯</h5>
                <p class="text-primary fw-bold">Customer Relations</p>
                <p class="text-muted small">Great storyteller & sniper of solutions. Always hits the mark with customer care! 🎪</p>
            </div>
        </div>
    </div>
</section>

<!-- down Section -->
<section class="down-section py-5 text-center text-white">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to Start Shopping?</h2>
        <p class="lead mb-4">Explore our amazing collection</p>
        <a href="{{ route('user.index') }}" class="btn btn-light btn-lg fw-bold">
            <i class="bi bi-shop"></i> Shop Now
        </a>
    </div>
</section>
@endsection