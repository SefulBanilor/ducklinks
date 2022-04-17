<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\CompanyDetailsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchController;
use \App\Http\Controllers\FeedBackController;
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



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' =>['cors']], function() {
    Route::post('login', [AuthController::class, 'authenticate']);
    Route::post('register', [AuthController::class, 'register']);
});




Route::get('logout', [AuthController::class, 'logout']);
Route::group(['middleware' =>['cors', 'jwt.verify']], function(){
    Route::resource('users', UsersController::class);
    Route::get('getJobs', [JobsController::class, 'getAll']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::resource('applications', ApplicationController::class);
    Route::resource('compdetails', CompanyDetailsController::class);
    Route::resource('userdetails', UserDetailsController::class);
    Route::resource('jobs', JobsController::class);
    Route::get('match', [MatchController::class, 'getJobs']);
    Route::post('updateFeedback', [FeedBackController::class, 'post_feedback']);
    Route::post('getRating', [FeedBackController::class, 'get_feedback']);
    Route::post('decode', [UsersController::class, 'decodeJWT']);
});

