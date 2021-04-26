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

// Route::get('/', function () {
//    return view('welcome');
//});
Route::group([
    'as' => 'fr.',
    'namespace' => 'Frontend',
], function () {
    Route::get('/category/{slug}~{id}', 'ProductController@getProductsBelongCategory')
        ->name('category.product');
    Route::get('/postcategory/{id}', 'PostController@getPostssBelongCategory')
        ->name('postcategory.product');
    Route::get('/post', 'PostController@index')
        ->name('post.index');
    Route::get('/post/{slug}~{id}', 'PostController@show')
        ->name('post.show');
    Route::get('/brand/{slug}~{id}', 'ProductController@getProductsBelongBrand')
        ->name('brand.product');
    Route::get('/{slug}~{id}', 'ProductController@show')
        ->name('product.show');
    Route::post('/product/increase', 'ProductController@increaseProduct')
        ->middleware('auth')
        ->name('product.increase_product');
    Route::post('/product/decrease', 'ProductController@decreaseProduct')
        ->middleware('auth')
        ->name('product.decrease_product');
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/bill', 'BillController@show')
        ->name('bill');
    Route::get('/bill/detail/{id}', 'BillController@showDetail')
        ->name('bill.detail');
    Route::get('/search', 'ProductController@getSearch')
        ->name('searchproduct');
    Route::get('/cart', 'CartController@index')
        ->middleware('auth')
        ->name('cart');
    Route::post('/cart/add-product', 'CartController@addProduct')
        ->middleware('auth')
        ->name('cart.add_product');
    Route::post('/cart/increase', 'CartController@increaseProduct')
        ->middleware('auth')
        ->name('cart.increase_product');
    Route::post('/cart/decrease', 'CartController@decreaseProduct')
        ->middleware('auth')
        ->name('cart.decrease_product');
    Route::delete('/cart/delete', 'CartController@deleteProduct')
        ->middleware('auth')
        ->name('cart.delete_product');
    Route::post('/cart/checkout', 'CartController@checkout')
        ->middleware('auth')
        ->name('cart.checkout');
    Route::post('cart/overview-bill', 'CartController@overviewBill')
        ->middleware('can:bill')
        ->name('cart.overview_bill');
    Route::get('/check-out', 'CheckoutController@index')->name('check.out');
    Route::get('/register', 'RegisterController@index')->name('reegisgister');
    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')
            ->name('login');
        Route::post('/login', 'LoginController@login')
            ->name('login');
        Route::get('/logout', 'LoginController@logout')
            ->name('logout');
        Route::get('/register', 'RegisterController@showRegistrationForm')
            ->name('register');
        Route::post('/register', 'RegisterController@register')
            ->name('register');
    });

    Route::get('/provinces', 'ProvinceController@list')
        ->name('province.list');
    Route::get('/districts', 'DistrictController@list')
        ->name('district.list');
    Route::get('/wards', 'WardController@list')
        ->name('ward.list');
    Route::get('/shipping-charge/fee', 'ShippingChargeController@getFee')
        ->name('shipping_charge.get_fee');
    Route::get('/contact', 'ContactController@contact')
        ->name('contact.index');
    Route::post('/contact', 'ContactController@send')
        ->name('contact.send');
    Route::get('/about', 'AboutController@index')
        ->name('about.index');

});
