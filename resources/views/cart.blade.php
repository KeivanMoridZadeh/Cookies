@extends('layouts.app')
@section('content')
    <!-- Cart Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Shopping Cart</h2>
            
            <!-- Empty Cart State -->
            <div id="empty-cart" class="empty-state hidden">
                <svg class="empty-state-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h3 class="empty-state-title">Your cart is empty</h3>
                <p class="empty-state-description">Looks like you haven't added any cookies to your cart yet.</p>
                <a href="{{ route('cookies') }}" class="btn btn-primary">Browse Cookies</a>
            </div>

            <!-- Cart Items -->
            <div id="cart-items"></div>

            <!-- Cart Summary -->
            <div id="cart-summary" class="cart-summary">
                <h3 style="font-size: 1.5rem; margin-bottom: 1.5rem; color: #92400e;">Order Summary</h3>
                <div class="summary-row">
                    <span>Subtotal (<span id="cart-item-count">0</span> items)</span>
                    <span id="cart-subtotal">$0.00</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>$5.99</span>
                </div>
                <div class="summary-row">
                    <span>Total</span>
                    <span id="cart-total">$0.00</span>
                </div>
                <a href="checkout.html" class="btn btn-primary" style="width: 100%; margin-top: 2rem; text-align: center; display: block;">
                    Proceed to Checkout
                </a>
                <a href="{{ route('cookies') }}" class="btn" style="width: 100%; margin-top: 1rem; text-align: center; display: block; background: white; border: 2px solid #d97706; color: #d97706;">
                    Continue Shopping
                </a>
            </div>
        </div>
    </section>

@endsection
