@extends('layouts.app')
@section('content')
    <!-- Product Detail Section -->
    <section class="section">
        <div class="container">
            <div class="product-detail">
                <div class="product-image-large" style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD6D6 100%);">
                    <svg class="card-placeholder" style="width: 200px; height: 200px;" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                </div>
                <div class="product-info">
                    <h1>Chocolate Chip Cookies</h1>
                    <div class="product-price">$12.99</div>
                    <p class="product-description">
                        Our classic chocolate chip cookies are made with the finest ingredients. Each cookie is handcrafted with premium Belgian chocolate chips, real butter, and a touch of vanilla. These cookies are soft on the inside with a slightly crisp edge - the perfect texture that will melt in your mouth. Baked fresh daily, these cookies are a timeless favorite that never goes out of style.
                    </p>
                    <div class="quantity-selector">
                        <button class="quantity-btn quantity-decrease">-</button>
                        <input type="number" class="quantity-input" value="1" min="1" max="99">
                        <button class="quantity-btn quantity-increase">+</button>
                    </div>
                    <button class="btn btn-primary add-to-cart-btn" 
                            data-product-id="1" 
                            data-product-name="Chocolate Chip Cookies" 
                            data-product-price="12.99"
                            style="width: 100%; padding: 1rem; font-size: 1.2rem;">
                        Add to Cart
                    </button>
                    <div style="margin-top: 2rem; padding-top: 2rem; border-top: 2px solid #e5e7eb;">
                        <h3 style="margin-bottom: 1rem; color: #92400e;">Product Details</h3>
                        <ul style="list-style: none; color: #6b7280; line-height: 2;">
                            <li>✓ Made with premium ingredients</li>
                            <li>✓ Baked fresh daily</li>
                            <li>✓ Contains 12 cookies per box</li>
                            <li>✓ Suitable for vegetarians</li>
                            <li>✓ Free shipping on orders over $50</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

