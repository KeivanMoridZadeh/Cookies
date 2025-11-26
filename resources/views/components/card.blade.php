@props([
    'product',
    'imageGradient' => 'linear-gradient(135deg, #FFE5E5 0%, #FFD6D6 100%)',
    'showUser' => true
])

<div class="card">
    <div class="card-image" style="background: {{ $imageGradient }};">
        @if(isset($product->image) && $product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="card-image-img">
        @else
            <!-- Cookie Icon SVG -->
            <svg class="card-placeholder" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1H5C3.89 1 3 1.89 3 3V19A2 2 0 0 0 5 21H11.81C11.42 20.34 11.2 19.6 11.2 18.8C11.2 16.77 12.77 15.2 14.8 15.2C16.83 15.2 18.4 16.77 18.4 18.8C18.4 19.6 18.18 20.34 17.79 21H19C20.11 21 21 20.11 21 19V9M14 2V8H20L14 2ZM14.8 16.2C13.34 16.2 12.2 17.34 12.2 18.8S13.34 21.4 14.8 21.4 17.4 20.26 17.4 18.8 16.26 16.2 14.8 16.2M14.5 17.5C14.78 17.5 15 17.72 15 18S14.78 18.5 14.5 18.5 14 18.28 14 18 14.22 17.5 14.5 17.5M15.5 19C15.78 19 16 19.22 16 19.5S15.78 20 15.5 20 15 19.78 15 19.5 15.22 19 15.5 19Z"/>
            </svg>
        @endif
    </div>
    
    <div class="card-body">
        <h3 class="card-title">{{ $product->name }}</h3>
        
        @if($product->type)
            <span class="product-type-badge">{{ ucfirst($product->type) }}</span>
        @endif
        
        <p class="card-description">
            {{ is_array($product->ingredients) ? implode(', ', $product->ingredients) : $product->ingredients }}
        </p>
        
        @if($showUser && $product->user)
            <p class="card-creator">
                <svg class="creator-icon" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
                Made by {{ $product->user->first_name }} {{ $product->user->last_name }}
            </p>
        @endif
        
        <div class="card-footer">
            <span class="price">${{ number_format($product->price, 2) }}</span>
            <div class="card-actions">
                <x-button href="{{ route('cookies.show', $product->id) }}" variant="primary" size="sm">
                    View Details
                </x-button>
                
                @if(isset($showAddToCart) && $showAddToCart)
                    <x-button variant="secondary" size="sm" onclick="addToCart({{ $product->id }})">
                        Add to Cart
                    </x-button>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.product-type-badge {
    display: inline-block;
    background: var(--accent);
    color: var(--text-primary);
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-full);
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin-bottom: 0.5rem;
}

.card-creator {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin-top: 0.5rem;
}

.creator-icon {
    width: 1rem;
    height: 1rem;
    opacity: 0.7;
}

.card-actions {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}


.card-image-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: var(--radius-md) var(--radius-md) 0 0;
}

@media (max-width: 768px) {
    .card-actions {
        flex-direction: column;
    }
}
</style>
