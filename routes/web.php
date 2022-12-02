<?php

use App\Http\Controllers\TestRedisController;
use App\Http\Controllers\TestWebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/test/session', [TestWebController::class, 'setSession']);
Route::get('/test/session/{name?}', [TestWebController::class, 'getSession']);
Route::get('/test/redis', [TestRedisController::class, 'redisTest']);
