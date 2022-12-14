<?php

use App\Http\Controllers\Api\V1\NewsController;
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

Route::prefix('v1')->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->middleware('api');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->middleware('api');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
