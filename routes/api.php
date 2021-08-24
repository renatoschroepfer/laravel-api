<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('usuario', 'App\Http\Controllers\Api\PessoasController@index');
Route::get('usuario/{id}', 'App\Http\Controllers\Api\PessoasController@show');
Route::post('usuario', 'App\Http\Controllers\Api\PessoasController@store');
Route::patch('usuario/{id}', 'App\Http\Controllers\Api\PessoasController@update');
Route::delete('usuario/{id}', 'App\Http\Controllers\Api\PessoasController@destroy');