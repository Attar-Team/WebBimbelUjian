<?php

use App\Http\Controllers\Dasboard_userController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Leanding_pageController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\login_registerController;
use App\Http\Controllers\OrderController;
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
Route::get('/detail_paket/{id}', [Leanding_pageController::class,'detail_paket'])->name('detail_paket');
Route::get('/keranjang', [Leanding_pageController::class,'keranjang'])->name('keranjang');

Route::get('/order/{id}', [TransactionController::class, 'index']);

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
Route::get('/admin/question',[QuestionController::class,'index'])->name('question.index');
Route::get('/admin/question/create/{id}',[QuestionController::class,'create'])->name('question.show');
Route::post('/admin/question',[QuestionController::class,'store'])->name('storeQuestion');
Route::get('/admin/question/{id}/edit',[QuestionController::class,'edit'])->name('question.edit');
Route::get('/admin/question/{id}',[QuestionController::class,'show'])->name('question.show');
Route::post('/admin/question/import',[QuestionController::class,'storeWithImport'])->name('storeWithQuestion');
Route::post('/admin/question/update/{id}',[QuestionController::class,'update'])->name('updateQuestion');
Route::post('/admin/question/delete/{id}',[QuestionController::class,'destroy'])->name('destroy');

//Route untuk menangani Quiz 
Route::post('/quiz/finish',[QuizController::class,'submitFinish']);
Route::get('/quiz/confirm',[QuizController::class,'confirm']);
Route::get('/quiz/review/{id}',[QuizController::class,'review']);
Route::get('/quiz/{exam_id}/start',[QuizController::class,'start'])->name('startQuiz');
Route::get('/quiz/{number_question}',[QuizController::class,'index'])->name('quiz');
Route::post('/quiz/start/{exam_id}',[QuizController::class,'submitStart']);

//Route untuk menangani Course
Route::get('/admin/course',[CourseController::class,'index'])->name('course.show');
Route::get('/admin/course/create',[CourseController::class,'create'])->name('course.create');
Route::post('/admin/course/video',[CourseController::class,'storeVideo']);
Route::post('/admin/course/bank-question',[CourseController::class,'storeBankQuestion']);
Route::get('/admin/course/{id}/edit',[CourseController::class,'edit'])->name('course.edit');
Route::post('/admin/course/video/update/{id}',[CourseController::class,'updateVideo']);
Route::post('/admin/course/bank-question/update/{id}',[CourseController::class,'updateBankQuestion']);
Route::post('/admin/course/video',[CourseController::class,'storeVideo']);
Route::post('/admin/course/delete/{id}',[CourseController::class,'destroy']);

Route::prefix('admin')->group(function () {
    Route::prefix('package')->group(function () {
        Route::get('/',[PackageController::class,'index'])->name('package.index');
        Route::get('/create',[PackageController::class,'create'])->name('package.create');
        Route::get('/{id}/edit',[PackageController::class,'edit'])->name('package.edit');
        Route::get('/{id}',[PackageController::class,'show'])->name('package.show');
        Route::post('/create',[PackageController::class,'store']);
        Route::post('/{id}/update',[PackageController::class,'update']);
        Route::post('/{id}/delete',[PackageController::class,'destroy']);
    });

    Route::prefix('order')->group(function () {
        Route::get('/',[OrderController::class,'index'])->name('order.index');
    });
});


Route::get('/show-pdf/{id}', function($id) {
    $url = "storage/uploads/bank_question/$id";
    return response()->file($url);
    })->name('show-pdf');
Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('dashboard');
Route::get('/login', [login_registerController::class,'show_login'])->name('login');
Route::post('/google/login', [login_registerController::class,'Googlelogins'])->name('Googlelogin');
Route::post('/login', [login_registerController::class,'authenticate'])->name('authenticate');
Route::post('/logout', [login_registerController::class,'logout'])->name('logout');


Route::post('/google/login/test', function () {
    return response()->json(['message' => 'Route is working']);
});


Route::get('/success-payment', function(){
    return view('leanding_page.success-payment');
});