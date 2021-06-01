<?php

use App\Http\Controllers\ApiController\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/get-product',[ProductController::class,'getProduct']);
Route::get('/get-product/{id}',[ProductController::class,'singleProduct']);
Route::post('/create-product',[ProductController::class,'createProduct']);
