<?php

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



Route::get('/Johor', function () {
    return view('contact');
});

//Input data into database
Route::get('/addProduct', function () {
    return view('addProduct2');
});// add product page

Route::post('/addProduct/store', // add function
[App\Http\Controllers\ProductController::class,'add'])->name
('addProduct');

Route::get('/showProduct', //show product list
[App\Http\Controllers\ProductController::class,'view'])->name
('showProduct');

Route::get('/editProduct/{id}', //Product id
[App\Http\Controllers\ProductController::class,'edit'])->name
('editProduct');

Route::post('/updateProduct', //update after edit
[App\Http\Controllers\ProductController::class,'update'])->name
('updateProduct');

Route::get('/deleteProduct/{id}', //delete product
[App\Http\Controllers\ProductController::class,'delete'])->name
('deleteProduct');

Route::get('/',//Main page
[App\Http\Controllers\ProductController::class,'viewlist'])
->name('productList');

Route::get('/productDetail/{id}', //Show Product detail
[App\Http\Controllers\ProductController::class,'productdetail'])->name
('product.detail');

Route::post('/addCart', //add to cart
[App\Http\Controllers\CartController::class,'addcart'])->name
('add.to.cart');

Route::get('/myCart', //cart
[App\Http\Controllers\CartController::class,'view'])->name
('myCart');

Route::post('/checkout', [App\Http\Controllers\PaymentController::class, 'paymentPost'])->name('payment.post');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
