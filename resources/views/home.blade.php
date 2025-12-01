@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Homemade Cookies Made with Love</h1>
            <p>Fresh, delicious cookies delivered to your door</p>
            <a href="{{ route('cookies') }}" class="btn">Browse Our Cookies</a>
        </div>
    </section>

    <!-- Features Section --><div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
</div>

    <section class="section bg-white">
        <div class="container">
            <div class="grid grid-3">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Fresh Daily</h3>
                    <p class="feature-description">Baked fresh every morning with premium ingredients</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">100% Natural</h3>
                    <p class="feature-description">No artificial preservatives or flavors</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h3 class="feature-title">Easy Ordering</h3>
                    <p class="feature-description">Order as a guest, no account needed</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section bg-white">
        <div class="container">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
                <div>
                    <h2 class="section-title" style="text-align: left; margin-bottom: 1.5rem;">Our Story</h2>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 1.5rem;">
                        What started as a small family kitchen experiment has grown into a beloved local cookie company. 
                        We believe that the best cookies are made with love, premium ingredients, and a commitment to freshness.
                    </p>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;">
                        Every morning, our bakers wake up early to create batches of cookies using traditional recipes 
                        passed down through generations, combined with modern techniques for the perfect texture and flavor.
                    </p>
                    <a href="{{ route('cookies') }}" class="btn btn-primary">Discover Our Cookies</a>
                </div>
                <div style="background: linear-gradient(135deg, #FFE5E5 0%, #FFD6D6 100%); border-radius: var(--radius-xl); height: 400px; display: flex; align-items: center; justify-content: center; box-shadow: var(--shadow-lg);">
                    <svg class="card-placeholder" style="width: 150px; height: 150px;" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section" style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.05) 0%, rgba(255, 217, 61, 0.05) 100%);">
        <div class="container">
            <div class="grid grid-4">
                <div style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">10K+</div>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; font-weight: 500;">Happy Customers</p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">50K+</div>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; font-weight: 500;">Cookies Baked</p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">15+</div>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; font-weight: 500;">Cookie Flavors</p>
                </div>
                <div style="text-align: center;">
                    <div style="font-size: 3rem; font-weight: 800; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 0.5rem;">5★</div>
                    <p style="color: var(--text-secondary); font-size: 1.1rem; font-weight: 500;">Average Rating</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="section-title">How We Make Our Cookies</h2>
            <p class="section-subtitle">From our kitchen to your door, here's our process</p>
            <div class="grid grid-4">
                <div style="text-align: center; padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 217, 61, 0.1) 100%); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; font-weight: 800; color: var(--primary);">1</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">Select Ingredients</h3>
                    <p style="color: var(--text-secondary); line-height: 1.6;">We source only the finest, natural ingredients from trusted suppliers</p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 217, 61, 0.1) 100%); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; font-weight: 800; color: var(--primary);">2</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">Mix & Prepare</h3>
                    <p style="color: var(--text-secondary); line-height: 1.6;">Traditional recipes meet modern techniques for perfect consistency</p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 217, 61, 0.1) 100%); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; font-weight: 800; color: var(--primary);">3</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">Bake Fresh</h3>
                    <p style="color: var(--text-secondary); line-height: 1.6;">Baked fresh every morning at the perfect temperature</p>
                </div>
                <div style="text-align: center; padding: 2rem;">
                    <div style="width: 80px; height: 80px; background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(255, 217, 61, 0.1) 100%); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; font-weight: 800; color: var(--primary);">4</div>
                    <h3 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem; color: var(--text-primary);">Package & Ship</h3>
                    <p style="color: var(--text-secondary); line-height: 1.6;">Carefully packaged and delivered fresh to your doorstep</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cookies Section -->
    <section class="section" style="background: linear-gradient(135deg, rgba(255, 107, 107, 0.03) 0%, rgba(255, 217, 61, 0.03) 100%);">
        <div class="container">
            <h2 class="section-title">Our Signature Flavors</h2>
            <p class="section-subtitle">Handcrafted with care, one batch at a time</p>
            <div class="grid grid-3">
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
                            <a href="{{ route('cookies.show', 1) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                
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
                            <a href="{{ route('cookies.show', 2) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                
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
                            <a href="{{ route('cookies.show', 3) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('cookies') }}" class="btn btn-secondary">View All Cookies</a>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section bg-white">
        <div class="container">
            <h2 class="section-title">What Our Customers Say</h2>
            <p class="section-subtitle">Real reviews from cookie lovers like you</p>
            <div class="grid grid-3">
                <div class="card" style="border: 1px solid var(--border);">
                    <div class="card-body">
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 1rem; color: #FFD93D;">
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 1.5rem; font-style: italic;">"The best cookies I've ever had! So fresh and delicious. The chocolate chip cookies are absolutely amazing."</p>
                        <div>
                            <p style="font-weight: 700; color: var(--text-primary); margin-bottom: 0.25rem;">Sarah Johnson</p>
                            <p style="color: var(--text-light); font-size: 0.9rem;">Verified Customer</p>
                        </div>
                    </div>
                </div>
                <div class="card" style="border: 1px solid var(--border);">
                    <div class="card-body">
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 1rem; color: #FFD93D;">
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 1.5rem; font-style: italic;">"Fast delivery and the cookies arrived still warm! The quality is exceptional and the packaging is beautiful."</p>
                        <div>
                            <p style="font-weight: 700; color: var(--text-primary); margin-bottom: 0.25rem;">Michael Chen</p>
                            <p style="color: var(--text-light); font-size: 0.9rem;">Verified Customer</p>
                        </div>
                    </div>
                </div>
                <div class="card" style="border: 1px solid var(--border);">
                    <div class="card-body">
                        <div style="display: flex; gap: 0.5rem; margin-bottom: 1rem; color: #FFD93D;">
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            <svg style="width: 20px; height: 20px; fill: currentColor;" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        </div>
                        <p style="color: var(--text-secondary); line-height: 1.8; margin-bottom: 1.5rem; font-style: italic;">"I ordered these as a gift and they were a huge hit! The oatmeal raisin cookies are my new favorite."</p>
                        <div>
                            <p style="font-weight: 700; color: var(--text-primary); margin-bottom: 0.25rem;">Emily Rodriguez</p>
                            <p style="color: var(--text-light); font-size: 0.9rem;">Verified Customer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    <!-- CTA Section -->
    <section class="section" style="background: linear-gradient(135deg, #FF6B6B 0%, #FF8787 50%, #FFD93D 100%); background-size: 200% 200%; animation: gradientShift 8s ease infinite; color: white; position: relative; overflow: hidden;">
        <div class="container text-center" style="position: relative; z-index: 1;">
            <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 1.5rem; font-weight: 800; font-family: 'Playfair Display', serif;">Ready to Order?</h2>
            <p style="font-size: clamp(1.1rem, 2vw, 1.25rem); margin-bottom: 2.5rem; opacity: 0.95;">Browse our full selection of delicious cookies</p>
            <a href="{{ route('cookies') }}" class="btn" style="background: white; color: #FF6B6B;">Shop Now</a>
        </div>
    </section>

@endsection
