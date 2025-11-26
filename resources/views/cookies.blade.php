@extends('layouts.app')
@section('content')
    <!-- Products Section -->
    <section class="section">
        <div class="container">
            <h2 class="section-title">All Our Cookies</h2>
            <p class="section-subtitle">Choose your favorite flavors</p>
            
            <div class="grid grid-4">
                @foreach ($products as $product)
                    <x-card :product="$product" />
                @endforeach
            </div>
        </div>
        <div class="container" style="margin-top: 2rem; text-align: center;">
            {{ $products->links() }}
        </div>
    </section>

    <!-- Footer -->
@endsection
