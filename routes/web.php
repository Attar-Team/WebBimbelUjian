<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Leanding_pageController;
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

Route::get('/', [Leanding_pageController::class,'home'])->name('home');
Route::get('/about', [Leanding_pageController::class,'about'])->name('about');
Route::get('/paket', [Leanding_pageController::class,'paket'])->name('paket');
Route::get('/detail_paket', [Leanding_pageController::class,'detail_paket'])->name('detail_paket');
Route::get('/keranjang', [Leanding_pageController::class,'keranjang'])->name('keranjang');
Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/cobak',function(){
    return view('leanding_page.coba_checkbox');
});
