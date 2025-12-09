@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="container">
            <div class="form-container">
                <h2 class="section-title" style="margin-bottom: 2rem;">Register</h2>
                
                @if(session('error'))
                    <div style="background: #fee; border: 1px solid var(--primary); color: var(--primary); padding: 0.75rem 1rem; border-radius: var(--radius-sm); margin-bottom: 1.5rem; font-size: 0.9rem;">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-input" placeholder="John" value="{{ old('first_name') }}" required />
                        @error('first_name') 
                            <span class="error" style="color: var(--primary); font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> 
                        @enderror            
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-input" placeholder="Doe" value="{{ old('last_name') }}" required />
                        @error('last_name') 
                            <span class="error" style="color: var(--primary); font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> 
                        @enderror            
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Your email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="name@example.com" value="{{ old('email') }}" required />
                        @error('email') 
                            <span class="error" style="color: var(--primary); font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> 
                        @enderror            
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Your password</label>
                        <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required />
                        @error('password') 
                            <span class="error" style="color: var(--primary); font-size: 0.85rem; margin-top: 0.25rem; display: block;">{{ $message }}</span> 
                        @enderror            
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="form-label">Confirm password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="••••••••" required />
                    </div>
                    <div class="form-group">
                        <label for="remember" class="form-label" style="display: flex; align-items: center; gap: 0.5rem; font-weight: 400; cursor: pointer;">
                            <input id="remember" type="checkbox" value="" style="width: 16px; height: 16px; cursor: pointer;" required />
                            <span>I agree with the <a href="#" style="color: var(--primary);">terms and conditions</a>.</span>
                        </label>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" style="flex: 1;">Register</button>
                    </div>
                </form>
                
                <div style="margin-top: 2rem; text-align: center;">
                    <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                        <div style="flex: 1; height: 1px; background: var(--border);"></div>
                        <span style="color: var(--text-secondary); font-size: 0.85rem;">OR</span>
                        <div style="flex: 1; height: 1px; background: var(--border);"></div>
                    </div>
                    <a href="{{ route('google.login') }}" class="btn-google" style="display: flex; align-items: center; justify-content: center; gap: 0.75rem; width: 100%; padding: 0.75rem 1.5rem; background: white; border: 1px solid var(--border); border-radius: var(--radius-md); text-decoration: none; color: var(--text-primary); font-weight: 500; font-size: 0.9rem; transition: all 0.2s ease;">
                        <svg width="18" height="18" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M17.64 9.2045c0-.6371-.0573-1.2516-.1636-1.8409H9v3.4814h4.8436c-.2086 1.125-.8427 2.0782-1.7955 2.7164v2.2581h2.9087c1.7018-1.5668 2.6836-3.874 2.6836-6.6149z" fill="#4285F4"/>
                                <path d="M9 18c2.43 0 4.4673-.806 5.9564-2.1805l-2.9087-2.2581c-.8059.54-1.8368.859-3.0477.859-2.344 0-4.3282-1.5831-5.036-3.7104H.9574v2.3318C2.4382 15.9832 5.482 18 9 18z" fill="#34A853"/>
                                <path d="M3.9636 10.71c-.18-.54-.2822-1.1168-.2822-1.71s.1023-1.17.2823-1.71V4.9582H.9573A8.9965 8.9965 0 0 0 0 9c0 1.4523.3477 2.8268.9573 4.0418l3.0063-2.3318z" fill="#FBBC05"/>
                                <path d="M9 3.5795c1.3214 0 2.5077.4541 3.4405 1.3459l2.5813-2.5814C13.4632.8918 11.426 0 9 0 5.482 0 2.4382 2.0168.9573 4.9582L3.9636 7.29C4.6714 5.1627 6.6556 3.5795 9 3.5795z" fill="#EA4335"/>
                            </g>
                        </svg>
                        Continue with Google
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection