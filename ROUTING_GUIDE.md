# Laravel Routing Guide

## How Routes Work in Your Cookie Shop

### 1. Basic Route Structure

```php
Route::get('/url', [Controller::class, 'method'])->name('route.name');
```

### 2. Your Current Routes Explained

#### Route 1: Homepage
```php
Route::get('/', [HomeController::class, 'index'])->name('home');
```
- **URL**: `http://yoursite.com/`
- **Controller**: `HomeController`
- **Method**: `index()`
- **Named Route**: `home`
- **Usage in Blade**: `{{ route('home') }}`

#### Route 2: Cookies List
```php
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies');
```
- **URL**: `http://yoursite.com/cookies`
- **Controller**: `CookiesController`
- **Method**: `index()`
- **Named Route**: `cookies`
- **Usage in Blade**: `{{ route('cookies') }}`

#### Route 3: Cookie Details (with parameter)
```php
Route::get('/cookies/{id}', [CookiesController::class, 'show'])->name('cookies.show');
```
- **URL**: `http://yoursite.com/cookies/1` (or any number)
- **Controller**: `CookiesController`
- **Method**: `show($id)` - receives the `{id}` as parameter
- **Named Route**: `cookies.show`
- **Usage in Blade**: `{{ route('cookies.show', 5) }}` → `/cookies/5`

#### Route 4: Cart
```php
Route::get('/cart', [CartController::class, 'index'])->name('cart');
```
- **URL**: `http://yoursite.com/cart`
- **Controller**: `CartController`
- **Method**: `index()`
- **Named Route**: `cart`
- **Usage in Blade**: `{{ route('cart') }}`

### 3. Route Parameters

#### Single Parameter
```php
Route::get('/cookies/{id}', [CookiesController::class, 'show']);
// /cookies/1 → $id = 1
// /cookies/5 → $id = 5
```

#### Multiple Parameters
```php
Route::get('/cookies/{category}/{id}', [CookiesController::class, 'show']);
// /cookies/chocolate/1 → $category = 'chocolate', $id = 1
```

#### Optional Parameters
```php
Route::get('/cookies/{id?}', [CookiesController::class, 'show']);
// /cookies → $id = null
// /cookies/5 → $id = 5
```

### 4. HTTP Methods

```php
Route::get('/cookies', ...);      // GET - View page
Route::post('/cookies', ...);     // POST - Submit form
Route::put('/cookies/{id}', ...); // PUT - Update
Route::delete('/cookies/{id}', ...); // DELETE - Delete
Route::patch('/cookies/{id}', ...);  // PATCH - Partial update
```

### 5. Route Groups (Advanced)

```php
// Apply prefix to all routes
Route::prefix('admin')->group(function () {
    Route::get('/cookies', ...); // Becomes /admin/cookies
    Route::get('/orders', ...);  // Becomes /admin/orders
});

// Apply middleware to all routes
Route::middleware('auth')->group(function () {
    Route::get('/cart', ...);    // Requires authentication
});
```

### 6. Resource Routes (Advanced)

Instead of writing each route manually:
```php
Route::resource('cookies', CookiesController::class);
```

This automatically creates:
- GET `/cookies` → index()
- GET `/cookies/create` → create()
- POST `/cookies` → store()
- GET `/cookies/{id}` → show()
- GET `/cookies/{id}/edit` → edit()
- PUT `/cookies/{id}` → update()
- DELETE `/cookies/{id}` → destroy()

### 7. Route Naming Conventions

**Good naming:**
- `home` - Homepage
- `cookies.index` - List all cookies
- `cookies.show` - Show one cookie
- `cookies.create` - Show create form
- `cookies.store` - Save new cookie
- `cookies.edit` - Show edit form
- `cookies.update` - Update cookie
- `cookies.destroy` - Delete cookie

### 8. Common Route Patterns

#### View a list
```php
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies.index');
```

#### View a single item
```php
Route::get('/cookies/{id}', [CookiesController::class, 'show'])->name('cookies.show');
```

#### Create new item (show form)
```php
Route::get('/cookies/create', [CookiesController::class, 'create'])->name('cookies.create');
```

#### Save new item (process form)
```php
Route::post('/cookies', [CookiesController::class, 'store'])->name('cookies.store');
```

#### Edit item (show form)
```php
Route::get('/cookies/{id}/edit', [CookiesController::class, 'edit'])->name('cookies.edit');
```

#### Update item (process form)
```php
Route::put('/cookies/{id}', [CookiesController::class, 'update'])->name('cookies.update');
```

#### Delete item
```php
Route::delete('/cookies/{id}', [CookiesController::class, 'destroy'])->name('cookies.destroy');
```

### 9. Testing Your Routes

```bash
# List all routes
php artisan route:list

# List routes with specific name
php artisan route:list --name=cookies

# List routes for specific URI
php artisan route:list --path=cookies
```

### 10. Tips and Best Practices

1. **Always use named routes** - Makes your code more maintainable
2. **Use resource routes** - When you have CRUD operations
3. **Keep routes organized** - Group related routes
4. **Route order matters** - More specific routes first
5. **Use route parameters** - For dynamic content
6. **Validate route parameters** - Use route model binding or validation

### 11. Real Example from Your Code

**In your routes file:**
```php
Route::get('/cookies/{id}', [CookiesController::class, 'show'])->name('cookies.show');
```

**In your controller:**
```php
public function show($id) {
    return view('cooky-details', ['id' => $id]);
}
```

**In your Blade template:**
```php
<a href="{{ route('cookies.show', 1) }}">View Cookie</a>
```

**What happens:**
1. User clicks link → Goes to `/cookies/1`
2. Laravel matches route → Calls `CookiesController::show(1)`
3. Controller receives `$id = 1`
4. Controller returns view with `id = 1`
5. User sees cookie detail page for cookie #1

