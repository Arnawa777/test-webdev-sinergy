<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/url', [ProductController::class, 'urlFetch']);
Route::get('/products', [ProductController::class, 'allProducts']);
Route::post('/fetch', [ProductController::class, 'fetchData']);

Route::get('/products/{product:id}', [ProductController::class, 'show']);
Route::get('/products/{product:id}/edit', [ProductController::class, 'edit']);
Route::put('/products/{product:id}', [ProductController::class, 'update']);
