<?php

use App\Http\Controllers\Dasboard_userController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Leanding_pageController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
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

Route::get('/user/paket', [Dasboard_userController::class,'tampil_userpaket'])->name('user_paket');
Route::get('/user/transaksi', [Dasboard_userController::class,'tampil_usertransaksi'])->name('user_transaksi');
Route::get('/user/progres', [Dasboard_userController::class,'tampil_userprogres'])->name('user_progres');
Route::get('/user/setting', [Dasboard_userController::class,'tampil_usersetting'])->name('user_setting');
Route::get('/user/isi_paket', [Dasboard_userController::class,'tampil_userisipaket'])->name('user_isipaket');
Route::get('/user/freebank_soal', [Dasboard_userController::class,'tampil_freebanksoal'])->name('user_freebank_soal');
Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard_user');
Route::get('/cobak',function(){
    return view('leanding_page.coba_checkbox');
});

//Route untuk menangani Exam
Route::resource('/admin/exam', ExamController::class);

//Route untuk menangani Question
Route::get('/admin/question',[QuestionController::class,'index'])->name('viewQuestion');
Route::get('/admin/question/create/{id}',[QuestionController::class,'create'])->name('createQuestion');
Route::post('/admin/question',[QuestionController::class,'store'])->name('storeQuestion');
Route::get('/admin/question/{id}/edit',[QuestionController::class,'edit'])->name('editQuestion');
Route::get('/admin/question/{id}',[QuestionController::class,'show'])->name('showQuestion');
Route::post('/admin/question/import',[QuestionController::class,'storeWithImport'])->name('storeWithQuestion');
Route::post('/admin/question/update/{id}',[QuestionController::class,'update'])->name('updateQuestion');
Route::post('/admin/question/delete/{id}',[QuestionController::class,'destroy'])->name('updateQuestion');
