<?php

use App\Http\Controllers\EloquentExampleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueryBuilderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('query', [QueryBuilderController::class, 'index']);
Route::get('eloquent', [EloquentExampleController::class, 'index']);
Route::get('order', [OrderController::class, 'lihat_view']);
