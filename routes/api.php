<?php

use App\Http\Controllers\Employer\PromoteController;
use App\Http\Controllers\Job\SingleJobController;
use App\Http\Controllers\Pages\HomeController;
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

Route::post('/search', [HomeController::class  , 'search'])->name('search');
Route::get('/get_category', [HomeController::class  , 'get_category'])->name('get_category');

Route::post('/check_trans' , [PromoteController::class , 'check_trans'])->name('check_trans');



