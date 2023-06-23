<?php

use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------- ---------------
| Web Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Auth::routes([

    'register'=>false,
    'reset'=>false,
    'verify'=>false



]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'isAdmin'],function()
{
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::resource('quiz', App\Http\Controllers\QuizController::class);
Route::resource('user', App\Http\Controllers\UserController::class);

Route::resource('question', App\Http\Controllers\QuestionController::class);
Route::get('/quiz/{id}/question', [App\Http\Controllers\QuizController::class, 'question'])->name('quiz.question');

});



