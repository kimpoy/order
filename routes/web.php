<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use Illuminate\Support\Facades\Route;

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



Route::resource('index', FoodController::class);
Route::resource('cart', CartController::class);
Route::get('view-category/{id}', [FoodController::class, 'viewcategory']);
