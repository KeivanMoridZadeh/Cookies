@extends('layouts.app')
@section('content')
    <!-- Products Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">All Our Cookies</h2>
            <p class="section-subtitle">Choose your favorite flavors</p>
            
            <div class="grid grid-4">
                <!-- Product 1 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD6D6 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Chocolate Chip</h3>
                        <p class="card-description">Classic cookies with premium chocolate chips</p>
                        <div class="card-footer">
                            <span class="price">$12.99</span>
                            <a href="{{ route('cookies.show', 1) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #FFD6E8 0%, #FFC1DA 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Double Chocolate</h3>
                        <p class="card-description">Rich chocolate cookies for chocolate lovers</p>
                        <div class="card-footer">
                            <span class="price">$13.99</span>
                            <a href="{{ route('cookies.show', 2) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #FFF4E6 0%, #FFE8CC 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Oatmeal Raisin</h3>
                        <p class="card-description">Healthy and hearty with plump raisins</p>
                        <div class="card-footer">
                            <span class="price">$11.99</span>
                            <a href="{{ route('cookies.show', 3) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Sugar Cookie</h3>
                        <p class="card-description">Soft and sweet, perfect for any occasion</p>
                        <div class="card-footer">
                            <span class="price">$10.99</span>
                            <a href="{{ route('cookies.show', 4) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #FFF3E0 0%, #FFE0B2 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Peanut Butter</h3>
                        <p class="card-description">Creamy peanut butter in every bite</p>
                        <div class="card-footer">
                            <span class="price">$12.99</span>
                            <a href="{{ route('cookies.show', 5) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="card">
                    <div class="card-image" style="background: linear-gradient(135deg, #F3E5F5 0%, #E1BEE7 100%);">
                        <svg class="card-placeholder" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                        </svg>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Snickerdoodle</h3>
                        <p class="card-description">Cinnamon sugar perfection</p>
                        <div class="card-footer">
                            <span class="price">$11.99</span>
                            <a href="{{ route('cookies.show', 6) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
@endsection
