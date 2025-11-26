
<?php
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/cookies', [CookiesController::class, 'index'])->name('cookies');
Route::get('/cookies/create', [CookiesController::class, 'create'])->name('cookies.create');
Route::post('/cookies',[CookiesController::class, 'store'])->name('cookies.store');
Route::get('/cookies/{id}', [CookiesController::class, 'show'])->name('cookies.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart');