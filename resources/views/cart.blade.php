@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <!-- Cart Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">Shopping Cart</h2>
            
            @if($cart->products->count() > 0)
                @foreach ($cart->products as $product)
                    <div class="cart-item">
                        <div class="cart-item-info">
                            <h3 class="cart-item-title">{{ $product->name }}</h3>
                            <p class="cart-item-price">Price: <span class="cart-item-price-value">${{ number_format($product->price, 2) }}</span></p>
                            <p class="cart-item-subtotal">Subtotal: <span class="cart-item-subtotal-value">${{ number_format($product->price * $product->pivot->quantity, 2) }}</span></p>
                        </div>
                        
                        <div class="cart-item-controls">
                            <form method="POST" action="{{ route('cart.update', $product->id) }}" onsubmit="return validateQuantity(this)" class="cart-update-form">
                                @csrf
                                @method('PUT')
                                @if($errors->has('quantity'))
                                    <div class="cart-error-message">
                                        {{ $errors->first('quantity') }}
                                    </div>
                                @endif
                                <div class="quantity-selector">
                                    <button type="button" class="quantity-btn quantity-decrease" onclick="decreaseQuantity(this)">-</button>
                                    
                                    <input type="number" name="quantity" id="quantity-{{ $product->id }}" class="quantity-input" value="{{ $product->pivot->quantity }}" min="1" max="99" step="1" required onchange="validateQuantityInput(this)" oninput="validateQuantityInput(this)">
                                    
                                    <button type="button" class="quantity-btn quantity-increase" onclick="increaseQuantity(this)">+</button>
                                </div>
                                <button type="submit" class="btn-update">
                                    Update
                                </button>
                            </form>
                            
                            <form method="POST" action="{{ route('cart.destroy', $product->id) }}" onsubmit="return confirm('Are you sure you want to remove this item from your cart?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-remove">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="cart-empty-message">
                    <p>Your cart is empty</p>
                </div>
            @endif
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
                    <span>Subtotal (<span>{{ $totalItems }}</span> items)</span>
                    <span>${{ number_format($subtotal, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span>Shipping</span>
                    <span>${{ number_format($shipping, 2) }}</span>
                </div>
                <div class="summary-row">
                    <span>Total</span>
                    <span>${{ number_format($total, 2) }}</span>
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

    <script src="{{ asset('js/cart.js') }}"></script>

@endsection
