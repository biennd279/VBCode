<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ContestProblemController;
use App\Http\Controllers\ContestProblemSubmissionController;
use App\Http\Controllers\ContestUserController;
use App\Http\Controllers\UserController;
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
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::apiResource('users', UserController::class);
        Route::apiResource('contests', ContestController::class);
        Route::post('/contests/{contest}/join', [ContestController::class, 'join']);
        Route::post('/contests/{contest}/leave', [ContestController::class, 'leave']);
        Route::apiResource('contests.users', ContestUserController::class);
        Route::apiResource('contests.problems', ContestProblemController::class);
        Route::apiResource('contests.problems.submissions', ContestProblemSubmissionController::class);
    });
});


