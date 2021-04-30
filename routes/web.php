<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Backend\BookingController as BackendBooking;
use App\Http\Controllers\Frontend\ProductController as FrontendProduct;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
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

//single product view
Route::get('/show/product/{product_id}',[FrontendProduct::class,'showProduct'])->name('product.show');
Route::get('/products/under/category/{category_id}',[FrontendProduct::class,'productsUnderCategory'])->name('products.under.category');


//booking
Route::get('/show/car/{id}',[BookingController::class,'showCar'])->name('show.car');
Route::post('/booking',[BookingController::class,'booking'])->name('car.booking');


//cart route
Route::get('/add-to-cart/{id}',[OrderController::class,'addToCart'])->name('cart.add');
Route::get('/view-cart',[OrderController::class,'viewCart'])->name('cart.view');




//admin panel routes
Route::group(['prefix'=>'admin'],function (){

    //admin login route
    Route::get('login',[BackendUserController::class,'loginForm'])->name('admin.login');
    Route::post('do-login',[BackendUserController::class,'doLogin'])->name('admin.dologin');

Route::group(['middleware'=>'admin-auth'],function (){
    Route::get('/',[DashboardController::class,'home'])->name('home');
    Route::get('logout',[BackendUserController::class,'logout'])->name('admin.logout');


//category
    Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');
    Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');

//products
    Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
    Route::post('/product/search',[ProductController::class,'search'])->name('product.search');

    Route::get('/product/create/form',[ProductController::class,'createForm'])->name('product.create.form');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('/product/edit/{id}',[ProductController::class,'editProduct'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');

    //booking
    Route::get('/show/booking',[BackendBooking::class,'showBooking'])->name('show.booking');
});

});
