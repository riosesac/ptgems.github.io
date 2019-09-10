<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login','UserController@login');
Route::get('produk', 'ProdukController@produk');

Route::get('allproduk', 'ProdukController@produkAuth')->middleware('jwt.verify');
Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::post('/produk/store','ProdukController@store');
Route::get('/produk/{id}','ProdukController@show');
Route::post('/produk/update/{id}','ProdukController@update');
Route::post('/produk/delete/{id}','ProdukController@destroy');

