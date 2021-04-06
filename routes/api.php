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

/* Signup New User */
Route::post('register', 'RegisterController@userRegister')
    ->name('register');
    
/* Login User */
Route::post('login', 'LoginController@userLogin')
->name('login');

/* Upload User profile picture */
Route::post('upload-profile-pic', 'UserController@uploadProfilePic')
->name('upload-profile-pic');

