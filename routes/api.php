<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\FatoorahController;

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



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/change-password', [AuthController::class, 'changepassword']);
    Route::POST('/pay',[FatoorahController::class,'payOrder']);
});



Route::middleware(['jwt.verify'])->group(function () {

    Route::get('/posts',[PostController::class,'index']);
    Route::get('/post/{id}',[PostController::class,'show']);
    Route::post('/posts',[PostController::class,'store']);
    Route::post('/post/{id}',[PostController::class,'update']);
    Route::post('/posts/{id}',[PostController::class,'destroy']);


   

    Route::get('/callback',function()
{
    return 'success';
});


Route::get('/error',function()
{
    return 'error';
});

});
