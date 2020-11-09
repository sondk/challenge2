<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\ChallengeController;

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

Route::get('login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('post-login', 'App\Http\Controllers\LoginController@authenticate');

Route::get('student', 'App\Http\Controllers\LoginController@student')->name('student')->middleware('auth', 'student');
Route::get('teacher', 'App\Http\Controllers\LoginController@teacher')->name('teacher')->middleware('auth', 'teacher');

Route::put('post-update', 'App\Http\Controllers\UserController@student_update');

Route::post('message/store', 'App\Http\Controllers\ConversationController@sendMessage');
Route::delete('/message/{message}', 'App\Http\Controllers\ConversationController@destroy');
Route::get('/messages', 'App\Http\Controllers\ConversationController@show')->name('messages')->middleware('auth');

Route::resource('users', UserController::class);
Route::resource('assignments', AssignmentController::class);
Route::resource('submissions', SubmissionController::class);
Route::resource('challenges', ChallengeController::class);

Route::post('challenge-submit', 'App\Http\Controllers\ChallengeController@submit');
Route::get('download/{filename}', 'App\Http\Controllers\SubmissionController@download');

Route::get('logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("login");
});


