<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route:: get('/', 'App\Http\Controllers\Home\HomeController@index');

Route:: post('/login', 'App\Http\Controllers\User\UserController@login');
Route:: post('/register', 'App\Http\Controllers\User\UserController@register');

Route:: get('/users', 'App\Http\Controllers\User\UserController@index');
Route:: get('/products', 'App\Http\Controllers\Product\ProductController@showAll');
Route:: get('/buyProduct/{action}/{id}', 'App\Http\Controllers\Product\ProductController@edit');
