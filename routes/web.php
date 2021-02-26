<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function(){
   Route::get('/panel',[MainController::class,'dashboard'])->name('dashboard');
   Route::get('quiz/{slug}',[MainController::class,'quiz_detail'])->name('quiz.detail');
});
/*Route::middleware(['auth', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function () {
    // destroy id ile çalıştığı için mutlaka number gelmesi gerekiyor ayarlama yapmadığımız taktirde hata verecektir.
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}',[QuestionController::class,'destroy'])->whereNumber('id')->name('questions.destroy');

    Route::resource('quizzes',QuizController::class);
    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);


    /* Route::get('deneme',function () {
         return "prefix testi";
      });*/
   /*Route::get('deneme',function () {
      return "middleware testi";
   });*/
});
