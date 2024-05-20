<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LinorderController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applica
tion. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

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
Route::get('/vendor/sortaz', [VendorController::class, 'sortaz'])->name('vendors.sortaz');
Route::get('/vendor/sortza', [VendorController::class, 'sortza'])->name('vendors.sortza');
Route::get('/vendor/search', [VendorController::class, 'search'])->name('vendors.search');

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

Route::get('/linorder', [LinorderController::class, 'index'])->name('list.linorders');
Route::post('/linorder/delete', [LinorderController::class, 'delete']);

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
