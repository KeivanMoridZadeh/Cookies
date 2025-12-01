@extends('layouts.app')
@section('content')
    <!-- Product Detail Section -->
    <section class="product-detail-section">
        <div class="container">
            <form method="POST" action="{{ route('cart.store', $product->id) }}">
                @csrf
                <div class="product-detail-modern">
                    <div class="product-image-modern">
                        <div class="image-container">
                            <svg class="product-icon" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                            </svg>
                            <div class="image-overlay"></div>
                        </div>
                    </div>
                    <div class="product-info-modern">
                        <div class="product-header">
                            <h1 class="product-title">{{ $product->name }}</h1>
                            <div class="product-price-modern">
                                <span class="price-currency">$</span>
                                <span class="price-amount">{{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                        
                        @if($product->ingredients && count($product->ingredients) > 0)
                            <div class="ingredients-modern">
                                <h3 class="ingredients-title">
                                    <span class="title-icon">✨</span>
                                    Ingredients
                                </h3>
                                <div class="ingredients-grid">
                                    @foreach($product->ingredients as $ingredient)
                                        <span class="ingredient-badge">{{ $ingredient }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <div class="quantity-modern">
                            <label class="quantity-label">Select Quantity</label>
                            <div class="quantity-controls">
                                <button type="button" class="quantity-btn-modern quantity-decrease" onclick="decreaseQuantity(this)">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 10h10"/>
                                    </svg>
                                </button>
                                <input type="number" name="quantity" class="quantity-input-modern" value="1" min="1" max="99" required>
                                <button type="button" class="quantity-btn-modern quantity-increase" onclick="increaseQuantity(this)">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M10 5v10M5 10h10"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        
                        <div class="action-buttons">
                            @auth
                                <button type="submit" class="btn-add-cart">
                                    <span class="btn-icon">🛒</span>
                                    <span>Add to Cart</span>
                                </button>
                            @endauth
                            @guest
                                <a href="{{ route('login') }}" class="btn-add-cart btn-login">
                                    
                                    <span>Login to Add to Cart</span>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection




