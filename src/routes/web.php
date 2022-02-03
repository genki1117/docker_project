<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [EventController::class, 'index'])->name('event.index');
Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('/event/register', [EventController::class, 'register'])->name('event.register');
Route::post('/event/create', [Eventcontroller::class, 'create'])->name('event.create');

//もくもく会詳細画面
Route::get('/event/{id}', [Eventcontroller::class, 'show'])->name('event.show');
