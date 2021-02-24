<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
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

Route::middleware(['auth', 'verified'])->get('/panel', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['auth','isAdmin'],'prefix'=>'admin'],function () {
    // destroy id ile çalıştığı için mutlaka number gelmesi gerekiyor ayarlama yapmadığımız taktirde hata verecektir.
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');
     Route::resource('quizzes',QuizController::class);


    /* Route::get('deneme',function () {
         return "prefix testi";
      });*/
   /*Route::get('deneme',function () {
      return "middleware testi";
   });*/
});
