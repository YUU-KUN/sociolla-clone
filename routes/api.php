<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('timeBomb', [UserController::class, 'timeBomb']);

// AUTH 
Route::get('profile', [UserController::class, 'getAuthenticatedUser']);
Route::post('user-register', [UserController::class, 'register']);
Route::post('user-login', [UserController::class, 'login']);
Route::put('update-profile', [UserController::class, 'updateProfile']);

// USER
Route::get('user', [UserController::class, 'getAllUser']);
Route::get('user/{id}', [UserController::class, 'getUser']);
Route::put('user/{id}', [UserController::class, 'updateUser']);
Route::delete('user/{id}', [UserController::class, 'deleteUser']);

// ADDRESS
Route::get('province', [UserController::class, 'getProvince']);
Route::get('regency/{province_id}', [UserController::class, 'getRegency']);
Route::get('district/{regency_id}', [UserController::class, 'getDisctrict']);
Route::get('village/{district_id}', [UserController::class, 'getVillage']);
// Route::get('user', [UserController::class, 'getAllUser'])->middleware('superadmin');

// PRODUCT
Route::resource('product', ProductController::class);

// BRAND
Route::resource('brand', BrandController::class);

// CART
// Route::put('addQuantity/{id}', [CartController::class, 'addQuantity']);
Route::resource('cart', CartController::class);

// TRANSACTION
Route::resource('transaction', TransactionController::class);