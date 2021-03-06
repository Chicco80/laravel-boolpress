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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/posts', 'Api\PostController@index');
Route::get('/posts/{slug}', 'Api\PostController@show');
//rotta commenti
//ROTTA PER SALVATAGGIO DEI COMMENTI IN POST, NON IN GET PERCHE' NON HO BISOGNO DI UNA VIEW MA DI RICHIAMARE LA FUNZIONE STORE

Route::post('/comments','Api\CommentController@store');
Route::get('/categories','Api\CategoryController@index');
Route::get('/categories/{slug}', 'Api\CategoryController@show');