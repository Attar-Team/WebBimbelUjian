<?php

use App\Http\Controllers\login_registerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[login_registerController::class, 'index']);
Route::post('/login',[login_registerController::class, 'apilogin']);
Route::post('/register',[login_registerController::class, 'api_register']);
Route::put('/login/{id}',[login_registerController::class, 'api_editprofile']);
Route::post('/insert_after_login_google',[login_registerController::class, 'apiinsert_akun_google']);
