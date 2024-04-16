<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\VendorController;
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
});


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




Route::get('/vendor', [VendorController::class, 'index']);
