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

Route::get('/', 'MainController@index')->name('main');

Route::resource('products', 'ProductController');

Route::resource('products.carts', 'ProductCartController')->only(['store','destroy']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/*

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/products/create', 'ProductController@create')->name('products.create');

 
    Even if the routes share the same name it does not matter
    because both have differents verbs , GET and POST
    Depending on the request, the route identifies
    which one it should call

Route::post('/products/create', 'ProductController@store')->name('products.store');

Route::get('/products/{product}', 'ProductController@show')->name('products.show');

Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');

//We can use match to use more than one verb, as below we use put and patch
Route::match(['put', 'patch'],'/products/{product}', 'ProductController@update')->name('products.update');

Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');


*/



