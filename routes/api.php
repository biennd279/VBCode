<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ContestProblemController;
use App\Http\Controllers\ContestProblemSubmissionController;
use App\Http\Controllers\ContestUserController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SubmissionController;
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

//Route::group(['middleware' => ['cors', 'json.response']], function () {


Route::group(['middleware' => ['json.response']], function () {
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/auth/logout', [AuthController::class, 'logout']);

        Route::apiResource('users', UserController::class)
            ->only(['index', 'show', 'update']);
        Route::apiResource('contests', ContestController::class)
            ->only(['index', 'store', 'show', 'update']);
        Route::post('/contests/{contest}/join', [ContestController::class, 'join']);
        Route::post('/contests/{contest}/leave', [ContestController::class, 'leave']);
        Route::apiResource('contests.users', ContestUserController::class)
            ->only(['index']);
        Route::apiResource('contests.problems', ContestProblemController::class)
            ->only(['index', 'store', 'show', 'update']);
        Route::apiResource('contests.problems.submissions', ContestProblemSubmissionController::class)
            ->only(['index', 'store', 'show']);
        Route::apiResource('problems', ProblemController::class)
            ->only(['index', 'show']);
        Route::apiResource('submissions', SubmissionController::class)
            ->only(['index', 'store', 'show']);
        Route::apiResource('categories', CategoryController::class)
            ->only(['index']);
        Route::get('/leaderboard', [UserController::class, 'leaderboard']);
        Route::get('/problems/{problem}/history', [ProblemController::class, 'getHistory']);
        Route::get('/problems/{problem}/point', [ProblemController::class, 'getPoint']);
        Route::get('/contests/{contest}/result', [ContestController::class, 'getResult']);
        Route::get('/contests/{contest}/leaderboard', [ContestController::class, 'getLeaderboard']);
    });
});


