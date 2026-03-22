<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ReviewController;

Route::view('/', 'homepage')->name('homepage');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'showReviews'])->name('product.show');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/account', 'account')->name('account');

// CART
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', function () {
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart')->with('error', 'Your cart is empty.');
    }

    return view('checkout', ['cart' => $cart]);
})
->middleware('auth')
->name('checkout');

Route::post('/checkout/finish', [CheckoutController::class, 'finish'])->name('checkout.finish');



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/password/change', [PasswordController::class, 'showChangeForm'])->name('password.change');
    Route::post('/password/change', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    //admin orders section
    Route::get('/admin/orders', [OrderController::class, 'adminOrders'])->name('admin.orders');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    //admin customer section
    Route::get('/admin/customers', [AdminCustomerController::class, 'index'])->name('admin.customers');
    Route::get('/admin/customers/create', [AdminCustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/admin/customers/store', [AdminCustomerController::class, 'store'])->name('admin.customers.store');
    Route::get('/admin/customers/{id}/edit', [AdminCustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::post('/admin/customers/{id}/update', [AdminCustomerController::class, 'update'])->name('admin.customers.update');
    Route::post('/admin/customers/{id}/delete', [AdminCustomerController::class, 'destroy'])->name('admin.customers.delete');

    //admin products section
    Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/admin/products/{id}/update', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::post('/admin/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('admin.products.delete');
    });

Route::get('/homepage', function () {
})->middleware('auth')->name('/homepage');

Route::post('/promo/apply', [CartController::class, 'applyPromo'])->name('promo.apply');
Route::post('/promo/remove', [CartController::class, 'removePromo'])->name('promo.remove');

Route::post('/reviews', [ReviewController::class, 'create'])->name('reviews.create');