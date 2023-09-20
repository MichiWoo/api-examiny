<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\Evaluation;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('activy_token', [UserController::class, 'desencriptarToken']);
Route::post('logout', [UserController::class, 'logout']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Tus rutas protegidas aquí
    Route::resource('users', UserController::class);
    Route::resource('students', StudentController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('tests', TestController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);
    Route::resource('evaluations', EvaluationController::class);
});
