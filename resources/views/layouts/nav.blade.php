<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <a href="{{ route('home') }}" class="logo">
            <svg class="logo-icon" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
            </svg>
            <span>Sweet Cookie Co.</span>
        </a>
        <div class="nav-links">
            <div class="nav-links-left">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('cookies') }}" class="nav-link">Cookies</a>
                @auth
                    <a href="{{ route('cookies.create') }}" class="nav-link">Create Cookie</a>
                @endauth
            </div>
            <div class="nav-links-right">
                @guest
                    <a href="{{ route('login') }}" class="nav-link">Login</a>
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                @endguest

                @auth
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; padding: 0; cursor: pointer; font: inherit; color: inherit;">Logout</button>
                    </form>
                @endauth
                
                <a href="{{ route('cart') }}" class="cart-link">
                    <svg class="cart-icon" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span id="cart-badge" class="cart-badge" style="display: none;">0</span>
                </a>
            </div>
        </div>
    </div>
</nav>