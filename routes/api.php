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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/comment","CommentsController");
// Route::get("/comment","CommentsController@index");
// Route::get("/comment/{id}","CommentsController@show");
// Route::post("/comment","CommentsController@store");
// Route::put("/comment/{id}","CommentsController@update");
// Route::delete("/comment/{id}","CommentsController@destroy");
