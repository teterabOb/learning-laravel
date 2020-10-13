<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Panel routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Panel" middleware group. Now create something great!
|
*/

Route::get('/', 'PanelController@index')->name('panel');
Route::resource('products', 'ProductController');


