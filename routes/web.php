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

// Route::get('/users/{user_id}','App\Http\Controllers\UserController@detailById' );
Route::get('/messages', 'App\Http\Controllers\MessageController@index');

// Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
// Route::get('/assignments','App\Http\Controllers\AssignmentController@index');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/users', 'App\Http\Controllers\UserController@index')->name('users');
    Route::get('/messages', 'App\Http\Controllers\MessageController@index');
    Route::get('/users/{user_id}','App\Http\Controllers\UserController@detailById' );
    Route::post('/users/{id}', 'App\Http\Controllers\MessageController@sendMsg');
    Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
    Route::get('/assignments','App\Http\Controllers\AssignmentController@index');
    Route::get('/profile', 'App\Http\Controllers\UserController@profile');
    Route::post('/profile', 'App\Http\Controllers\UserController@editProfile');
    Route::get('/users/edit/{id}', 'App\Http\Controllers\UserController@getEditUser');
    Route::post('/users/delmsg/{id}', 'App\Http\Controllers\MessageController@deleteMsg');
    Route::post('/users/deluser/{id}','App\Http\Controllers\UserController@deleteUser' );
    Route::post('/users/editmsg/{id}','App\Http\Controllers\MessageController@editMsg' );
    Route::post('/challenges/add','App\Http\Controllers\ChallengeController@addChall' );
    Route::post('/challenges/delete','App\Http\Controllers\ChallengeController@delChall' );
    Route::get('/challenges/{id}','App\Http\Controllers\ChallengeController@downloadChall' );


});

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/challenges','App\Http\Controllers\ChallengeController@index');
//     Route::get('/assignments','App\Http\Controllers\AssignmentController@index');
// });


// Route::post('/test', function(){
//     dd("Post detected");
// });
