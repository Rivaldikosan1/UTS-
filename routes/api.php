<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix'=>'v1'],function(){
    Route::post('/users',[App\Http\Controllers\ContactController::class,'Create']);

    Route::middleware(App\Http\Middleware\ApiAuthMiddleware::class)->group(function (){
        Route::get('/contact/profile',[App\Http\Controllers\ContactController::class,'search']);
        Route::patch('/contact/profile',[App\Http\Controllers\ContactController::class,'update']);
        Route::delete('/contact/delete',[App\Http\Controllers\ContactController::class,'Delete']);
    });
});