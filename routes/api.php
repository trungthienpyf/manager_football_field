<?php

use App\Http\Controllers\ApiController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('/size_11',[ApiController::class,'getSize11'])->name('size_11');
Route::post('/pass_area',[ApiController::class,'returnValueArea'])->name('pass_area');
Route::post('/check_time',[ApiController::class,'checkTimeApi'])->name('check_time');
