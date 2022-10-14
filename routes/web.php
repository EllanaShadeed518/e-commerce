<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;

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

//Home
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('contact',[HomeController::class,'contact']);
Route::get('viewallproduct',[ProductController::class,'viewallproduct'])->name('viewallproduct');
Route::get('DetailesProduct/{product}',[ProductController::class,'DetailesProduct'])->name('DetailesProduct');
//categoris
Route::get('/dislaycategories',[AdminController::class,'dislaycategories'])->name('dislaycategories')->middleware('auth');
Route::get('/createCategory',[AdminController::class,'createCategory'])->name('createCategory')->middleware('auth');
Route::get('/deletecategory/{category}',[AdminController::class,'deletecategory'])->name('deletecategory')->middleware('auth');
Route::post('/storeCategory',[AdminController::class,'storeCategory'])->name('storeCategory')->middleware('auth');
//product
Route::get('/displayproduct',[AdminController::class,'displayproduct'])->name('displayproduct')->middleware('auth');
Route::get('/createproduct',[AdminController::class,'createproduct'])->name('createproduct')->middleware('auth');
Route::get('product/deleteproduct/{product}',[AdminController::class,'deleteproduct'])->name('deleteproduct')->middleware('auth');
Route::post('/storeproduct',[AdminController::class,'storeproduct'])->name('storeproduct')->middleware('auth');
Route::post('/update/{product}' , [AdminController::class , 'updateproduct'])->name('updateproduct')->middleware('auth');
Route::get('product/editproduct/{product}' , [AdminController::class , 'editproduct'])->name('editproduct')->middleware('auth');
//Cart
Route::post('product/addcart/{product}' , [CartController::class , 'addcart']);
Route::get('showcart/{userid}' , [CartController::class , 'showcart'])->name('show')->middleware('auth');
Route::get('cart/deleteproductfromcart/{cartid}',[CartController::class,'deleteproductfromcart'])->name('deleteproductfromcart')->middleware('auth');
//order
Route::post('/orderconfirm/{userid}' , [HomeController::class , 'orderconfirm'])->name('order')->middleware('auth');
Route::get('/adminorder',[AdminController::class,'adminorder'])->middleware('auth');
Route::get('/search',[AdminController::class,'search'])->name('search')->middleware('auth');
Route::get('/delivered/{orderid}',[AdminController::class,'delivered'])->middleware('auth');
Route::get('/print/{orderid}',[AdminController::class,'print'])->middleware('auth');
Route::get('/searchorder',[AdminController::class,'search'])->middleware('auth');
Route::get('/show_order',[HomeController::class,'show_order'])->middleware('auth');
Route::get('/cancelorder/{orderid}',[HomeController::class,'cancelorder'])->middleware('auth');
//payment
Route::get('payment',[ PaymentController::class,'index']);
Route::post('charge',[ PaymentController::class,'charge']);
Route::get('success',[ PaymentController::class,'success']);
Route::get('error', [PaymentController::class,'error']);
Route::get('payment', [PaymentController::class,'payment']);
//Dashboard
Route::get('/dashboardadmin',[AdminController::class,'dashboardadmin'])->name('dashboardadmin');
//Comment
Route::post('/createcomment',[HomeController::class,'createcomment'])->name('createcomment')->middleware('auth');
Route::post('/createreplay',[HomeController::class,'createreplay'])->name('createreplay')->middleware('auth');
//Contact
Route::post('/storecontact',[MessageController::class,'store'])->name('storeContact')->middleware('auth');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
