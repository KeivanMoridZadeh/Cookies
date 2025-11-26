@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container">
        <h1 class="section-title">Create Your Cookie</h1>
        <p class="section-subtitle">Design a custom cookie with your favorite flavors and textures.</p>

        <div class="form-container">
            <form class="cookie-form" action="{{ route('cookies.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-label">Cookie name</label>
                    <input id="name" type="text" class="form-input" placeholder="e.g. Midnight Chocolate Chunk" name="name" required>
                </div>
                <div class="form-group">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select" required>
                        <option value="">Select a type</option>
                        <option value="cookies">Cookies</option>
                        <option value="brownies">Brownies</option>
                        <option value="cake">Cake</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price" class="form-label">Cookie price</label>
                    <input id="price" name="price" type="text" class="form-input" placeholder="0.00" required>
                </div>

                <div class="form-group">
                    <label for="ingredients" class="form-label">Ingredients</label>
                    <textarea
                        id="ingredients"
                        class="form-textarea"
                        placeholder="Describe your dream cookie: flavor, texture, and special ingredients."
                        name="ingredients"
                        required
                    ></textarea>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save Cookie</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection