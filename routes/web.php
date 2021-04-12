<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\UserController;
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

//website / frontend routes
Route::get('/',[HomeController::class,'home'])->name('homepage');
Route::get('/login-registration',[UserController::class,'showLoginRegistration'])->name('login.registration.form');
Route::post('/registration',[UserController::class,'registration'])->name('registration');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::get('/logout',[UserController::class,'logout'])->name('logout');




//admin panel routes
Route::group(['prefix'=>'admin'],function (){
    Route::get('/',[DashboardController::class,'home'])->name('home');

//category
    Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
    Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');

//products
    Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
    Route::get('/product/create/form',[ProductController::class,'createForm'])->name('product.create.form');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');

});
