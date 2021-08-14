<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\UserController as UserControllerApi;
use \App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\api\Task;
use App\Http\Controllers\api\TaskController;

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

Route::post('auth/login', [AuthController::class,'login']);
Route::post('main/store', [MainController::class,'store']);
Route::get('main/', [MainController::class, 'index']);

Route::get('main/{id?}', [MainController::class, 'show']);
Route::post('main/edit', [MainController::class, 'edit']);
Route::get('delete/{id?}', [MainController::class, 'destroy']);


Route::group(['middleware'=>['apiJwt']], function(){
    Route::get('users', [UserControllerApi::class, 'index']);
    Route::get('user/{email?}', [UserControllerApi::class, 'show']);
    Route::post('auth/logout', [AuthController::class,'logout']);

    Route::post('task/store', [Task::class, 'store']);
    Route::get('tasks', [Task::class, 'index']);
});


