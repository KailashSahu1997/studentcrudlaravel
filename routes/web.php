<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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


Route::resource('/', StudentController::class);
Route::match(['GET', 'POST'], 'edit/{id}', [StudentController::class, 'edit']);
Route::match(['GET', 'POST'], 'update/{id}', [StudentController::class, 'update']);
Route::match(['GET', 'POST'], 'destroy/{id}', [StudentController::class, 'destroy']);

