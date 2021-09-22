<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/register', function() {
    return redirect('/login');
});

Route::post('/register', function() {
    return redirect('/login');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', function(){
    return view('users.create');
});



Route::post('/users/create', 'App\Http\Controllers\UserController@createUser');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/users', 'App\Http\Controllers\UserController@index')->middleware('auth');

Route::get('/users/{user_id}','App\Http\Controllers\UserController@detailById' );
Route::get('/messages', 'App\Http\Controllers\MessageController@index');

// Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
// Route::get('/assignments','App\Http\Controllers\AssignmentController@index');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users');
    Route::get('/messages', 'App\Http\Controllers\MessageController@index');
    Route::get('/users/{user_id}','App\Http\Controllers\UserController@detailById' );
    Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
    Route::get('/assignments','App\Http\Controllers\AssignmentController@index');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile');
    Route::post('/profile', 'App\Http\Controllers\UserController@editProfile');
    
});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
//     Route::get('/assignments','App\Http\Controllers\AssignmentController@index');
// });

Route::post('/users/{id}', 'App\Http\Controllers\UserController@sendMsg');

// Route::post('/test', function(){
//     dd("Post detected");
// });
