<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\login_registerController;
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


Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/login', [login_registerController::class,'show_login'])->name('login');
Route::post('/google/login', [login_registerController::class,'Googlelogins'])->name('Googlelogin');

Route::post('/google/login/test', function () {
    return response()->json(['message' => 'Route is working']);
});
