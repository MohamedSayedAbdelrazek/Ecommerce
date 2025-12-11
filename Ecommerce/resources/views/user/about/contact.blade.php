@extends('user.layouts.app')

@section('title', 'Contact Us - E-Shop')

@section('extra-css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="contact-hero py-5 text-white">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">💬 Get In Touch!</h1>
        <p class="lead mb-0">We'd love to hear from you. Send us a message and we'll respond as soon as possible!</p>
    </div>
</section>

<!-- Contact Information & Form Section -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row g-4 mb-5">
            <!-- Contact Info Cards -->
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <i class="bi bi-telephone-fill fs-1 text-primary mb-3 d-block"></i>
                    <h5 class="fw-bold">Phone</h5>
                    <p class="mb-1">+(20)1027208527</p>
                    <p class="small mb-0">Sun-Fri  : 9am-6pm </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <i class="bi bi-envelope-fill fs-1 text-primary mb-3 d-block"></i>
                    <h5 class="fw-bold">Email</h5>
                    <p class="mb-1">support@gmail.com</p>
                    <p class="small mb-0">We reply within 24 hours</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center p-4">
                    <i class="bi bi-geo-alt-fill fs-1 text-primary mb-3 d-block"></i>
                    <h5 class="fw-bold">Address</h5>
                    <p class="mb-1">123 Nasr Street</p>
                    <p class="small mb-0">Egypt</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-card p-5">
                    <h2 class="fw-bold mb-4 text-center">✉️ Send Us a Message</h2>
                    <form method="POST" action="#">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="your.email@gmail.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-bold">Phone (Optional)</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="0123456789">
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label fw-bold">Subject</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select a subject...</option>
                                <option value="order">Order Inquiry</option>
                                <option value="shipping">Shipping Question</option>
                                <option value="product">Product Information</option>
                                <option value="feedback">Feedback</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="6" placeholder="Tell us what's on your mind..." required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold contact-btn">
                            <i class="bi bi-send"></i> Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-white">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Frequently Asked Questions ❓</h2>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="faq-item  p-4 ">
                    <h5 class="fw-bold ">How long does shipping take?</h5>
                    <p >Standard shipping takes 5-7 business days. Express shipping is available for 2-3 business days delivery.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-item  p-4">
                    <h5 class="fw-bold ">What's your return policy?</h5>
                    <p >We accept returns within 30 days of purchase. Items must be unused and in original condition.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-item  p-4">
                    <h5 class="fw-bold ">Do you offer international shipping?</h5>
                    <p >Yes! We ship to over 50 countries. Shipping costs vary based on location.</p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-item  p-4">
                    <h5 class="fw-bold ">How can I track my order?</h5>
                    <p >Once shipped, you'll receive a tracking number via email. Track your order in real-time on our site.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection