<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard', ['report' => Auth::user()->report()]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('products', ProductController::class, [
        'names' => [
            'index' => 'products',
            'create' => 'createProduct',
            'store' => 'storeProduct',
            'edit' => 'editProduct',
            'update' => 'updateProduct',
            'destroy' => 'deleteProduct'
        ]
    ])
    ->except([
        'show'
    ]);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('categories', CategoryController::class, [
        'names' => [
            'index' => 'categories',
            'create' => 'createCategory',
            'store' => 'storeCategory',
            'edit' => 'editCategory',
            'update' => 'updateCategory',
            'destroy' => 'deleteCategory'
        ]
    ])
    ->except([
        'show'
    ]);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('contact', ContactController::class, [
        'names' => [
            'index' => 'contact',
            'store' => 'sendEmail'
        ]
    ])
    ->only([
        'index',
        'store'
    ]);