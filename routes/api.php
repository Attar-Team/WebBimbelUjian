<?php

use App\Http\Controllers\ApiMobileController;
use App\Http\Controllers\login_registerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TransactionController;
use App\Models\Package;

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
    $data = $request->user();
    return response()->json([
          "status"=> 200,
          "message"=> "success",
          "data"=> $data
      ]);
    

});

Route::get('/users',[login_registerController::class, 'index']);
Route::post('/login',[login_registerController::class, 'apilogin']);
Route::post('/register',[login_registerController::class, 'api_register']);
Route::put('/edit_profile/{id}',[login_registerController::class, 'api_editprofile']);
Route::post('/insert_after_login_google',[login_registerController::class, 'apiinsert_akun_google']);
Route::post('/preview-excel',[QuestionController::class,'preview']);

//Route untuk menangani quiz
Route::post('/quiz/answer',[QuizController::class,'apiAnswer']);
Route::post('/quiz/doubtful',[QuizController::class,'apiDoubtful']);



Route::post('/getToken', [TransactionController::class,'getToken']);
Route::post('/midtrans-callback',[TransactionController::class,'callback']);
Route::get('/users',[login_registerController::class, 'index']);

Route::post('/login',[login_registerController::class, 'apilogin']);
Route::post('/insert_after_login_google',[login_registerController::class, 'apiinsert_akun_google']);


Route::post('/order',[ApiMobileController::class, 'order']);
Route::post('/transaction',[ApiMobileController::class, 'transaction']);

Route::get('/purchased-package/{id}',[ApiMobileController::class, 'purchasedPackage']);
Route::get('/history-transaction/{id}',[ApiMobileController::class, 'historyTransaction']);

Route::get('question/{id}',[ApiMobileController::class,'question']);
Route::get('exam/{id}',[ApiMobileController::class,'exam']);

Route::post('answer',[ApiMobileController::class,'answer']);
