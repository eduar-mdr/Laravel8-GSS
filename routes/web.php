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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});



/* Main Routes */
Auth::routes();

Route::resource('promotions', App\Http\Controllers\PromotionController::class );

Route::resource('products', App\Http\Controllers\ProductController::class);


/* Home Route */
Route::resource('/', App\Http\Controllers\PromotionController::class);


/* Privated Routes  */

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

/* Default Routes */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




