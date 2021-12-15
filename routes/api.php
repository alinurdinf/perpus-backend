<?php

use App\Http\Controllers\API\BookCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\ReadController;
use App\Http\Controllers\API\ReadNewsController;
use App\Http\Controllers\API\UserController;

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


Route::get('books', [BookController::class, 'all']);
Route::get('categories', [BookCategoryController::class, 'all']);
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('logout', [UserController::class, 'logout']);

    Route::get('reads', [ReadController::class, 'all']);
    Route::get('readnews', [NewsController::class, 'all']);

    
});

