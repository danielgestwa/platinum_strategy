<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Models\User;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('token', TokenController::class, [
        'names' => [
            'store' => 'token'
        ]
    ])
    ->only([
        'store'
    ]);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('products', ProductController::class)
    ->only([
        'index'
    ]);

Route::middleware(['auth:sanctum', 'verified'])
    ->resource('categories', CategoryController::class)
    ->only([
        'index'
    ]);