<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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

//Route untuk menangani Quiz 
Route::post('/quiz/finish',[QuizController::class,'submitFinish']);
Route::get('/quiz/confirm',[QuizController::class,'confirm']);
Route::get('/quiz/review/{id}',[QuizController::class,'review']);
Route::get('/quiz/{exam_id}/start',[QuizController::class,'start'])->name('startQuiz');
Route::get('/quiz/{number_question}',[QuizController::class,'index'])->name('quiz');
Route::post('/quiz/start/{exam_id}',[QuizController::class,'submitStart']);
