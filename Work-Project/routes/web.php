<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LinorderController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Auth::routes();

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/example', function () {
    Log::info('Example route accessed.');

    $variable1 = "First value";
    Log::info('Variable 1: ' . $variable1);

    $variable2 = "Second value";
    Log::info('Variable 2: ' . $variable2);

    $variable3 = "Third value";
    Log::info('Variable 3: ' . $variable3);

    $variable4 = "Fourth value";
    Log::info('Variable 4: ' . $variable4);

    $variable5 = "Fifth value";
    Log::info('Variable 5: ' . $variable5);

    $variable6 = "Sixth value";
    Log::info('Variable 6: ' . $variable6);

    $variable7 = "Seventh value";
    Log::info('Variable 7: ' . $variable7);

    $variable8 = "Eighth value";
    Log::info('Variable 8: ' . $variable8);

    $variable9 = "Ninth value";
    Log::info('Variable 9: ' . $variable9);

    $variable10 = "Tenth value";
    Log::info('Variable 10: ' . $variable10);

    return view('welcome');
});



Route::get('/vendor', [VendorController::class, 'index'])->name('list.vendors');
Route::post('/vendor/delete', [VendorController::class, 'delete']);
Route::patch('/vendor/update/{id}', [VendorController::class, 'update']);
Route::get('/vendor/create', [VendorController::class, 'create'])->name('vendors.create');
Route::post('/vendor/store', [VendorController::class, 'store'])->name('vendor.store');
Route::get('/vendors/{id}', [VendorController::class, 'show'])->name('vendors.show');
Route::post('/vendor/increment', [VendorController::class, 'increment'])->name('vendor.increment');
Route::post('/vendor/decrement', [VendorController::class, 'decrement'])->name('vendor.decrement');
Route::get('/vendor/sortaz', [VendorController::class, 'sortaz'])->name('vendors.sortaz');
Route::get('/vendor/sortza', [VendorController::class, 'sortza'])->name('vendors.sortza');
Route::get('/vendor/search', [VendorController::class, 'search'])->name('vendors.search');
Route::get('/vendor/filter_hamburguer', [VendorController::class, 'filter_hamburguer'])->name('vendors.filter_hamburguer');
Route::get('/vendor/filter_pizza', [VendorController::class, 'filter_pizza'])->name('vendors.filter_pizza');
Route::get('/vendor/filter_asian', [VendorController::class, 'filter_asian'])->name('vendors.filter_asian');
Route::get('/vendor/filter_mexican', [VendorController::class, 'filter_mexican'])->name('vendors.filter_mexican');
Route::get('/vendor/filter_sandwich', [VendorController::class, 'filter_sandwich'])->name('vendors.filter_sandwich');
Route::get('/vendor/filter_rating', [VendorController::class, 'filter_rating'])->name('vendors.filter_rating');
Route::post('/vendor/rate/{id}', [VendorController::class, 'rate'])->name('vendor.rate');


Route::get('/product', [ProductController::class, 'index'])->name('list.products');
Route::post('/product/delete', [ProductController::class, 'delete']);
Route::patch('/product/update/{id}', [ProductController::class, 'update']);
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/customer', [CustomerController::class, 'index'])->name('list.customers');
Route::post('/customer/delete', [CustomerController::class, 'delete']);
Route::patch('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/order', [OrderController::class, 'index'])->name('list.orders');
Route::post('/order/delete', [OrderController::class, 'delete']);
Route::middleware(['auth'])->group(function () {
    Route::get('/pending', [OrderController::class, 'pendingOrders'])->name('pending');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/last', [OrderController::class, 'lastOrders'])->name('last');
});

Route::get('/linorder', [LinorderController::class, 'index'])->name('list.linorders');
Route::post('/linorder/delete', [LinorderController::class, 'delete']);

Route::middleware(['auth'])->group(function () {
    Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
    Route::post('/basket/add', [BasketController::class, 'add'])->name('basket.add');
    Route::post('/basket/increment', [BasketController::class, 'increment'])->name('basket.increment');
    Route::post('/basket/decrement', [BasketController::class, 'decrement'])->name('basket.decrement');
    Route::post('/basket/remove', [BasketController::class, 'remove'])->name('basket.remove');
    Route::get('/basket/pay', [BasketController::class, 'pay'])->name('basket.pay'); // Add this line
    Route::post('/basket/completePayment', [BasketController::class, 'completePayment'])->name('basket.completePayment'); // Add this line
});

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/info', function () {
    return view('info');
})->name('info');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
