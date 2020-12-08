<?php

use App\Http\Controllers\ListsController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('list', [ListsController::class, 'store'])->name('addList');
Route::get('/list/{id}', [ListsController::class, 'show'])->name('list');

Route::post('goals', [ListsController::class, 'storeGoal'])->name('addGoals');
Route::post('items', [ListsController::class, 'storeGoalItems'])->name('addGoalsItem');
Route::get('items/card/{id}', [ListsController::class, 'showCard'])->name('addcard');


