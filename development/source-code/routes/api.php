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
$baseFolder='Api\\';

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::resource('danh-muc',$baseFolder.'DanhMucController',['names'=>[
    'index'=>'danhmuc.api.index',
    'show'=>'danhmuc.api.show'
]]);
