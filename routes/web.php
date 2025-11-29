
<?php
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies');
Route::get('/cookies/create', [CookiesController::class, 'create'])->name('cookies.create');
Route::post('/cookies',[CookiesController::class, 'store'])->name('cookies.store');
Route::get('/cookies/{id}', [CookiesController::class, 'show'])->name('cookies.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/cart/{id}', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');