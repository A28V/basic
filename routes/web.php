<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reg/',function(){
    return view('reg');
});
Route::post('/user/reg/',[LoginController::class,'reg'])->name('reg');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('products', ProductController::class);