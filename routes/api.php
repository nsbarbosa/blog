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

Route::get('/', function (Request $request) {
    return view('apiposts');
});
Route::get('/', function (Request $request) {
    return view('apilogin');
});

Route::middleware('auth:api')->get('/posts','ApiController@posts');