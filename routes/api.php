<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
 Route::resource('getstudent', StudentController::class);
// Route::get('articles', 'StudentController@index');
// Route::get('articles/{id}', 'ArticleController@show');
// Route::post('articles', 'ArticleController@store');
// Route::put('articles/{id}', 'ArticleController@update');
// Route::delete('articles/{id}', 'ArticleController@delete');
