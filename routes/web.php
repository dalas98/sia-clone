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
$login = '/login';

Route::get('/', function () use ($login) {
    return redirect($login);
});

Route::get($login, 'AuthController@index')->middleware('guest');
Route::post($login, 'AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/gate', 'GateController@redirectTo');

    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\DashboardController@index');
        Route::get('subject', 'SubjectController@index');
        Route::get('subject/add', 'SubjectController@add')->name('subject.add');
        Route::post('subject', 'SubjectController@store')->name('subject.store');
        Route::get('subject/{id}/edit', 'SubjectController@edit')->name('subject.edit');
        Route::patch('subject/{subject}', 'SubjectController@update')->name('subject.update');
        Route::delete('subject/{id}', 'SubjectController@destroy')->name('subject.destroy');
    });

    Route::prefix('lecture')->group(function() {
        Route::get('/', 'Lecture\DashboardController@index');
    });

    Route::prefix('student')->group(function() {
        Route::get('/', 'Student\DashboardController@index');
        Route::get('subject', 'SubjectController@enrollStudentSubject')->name('enroll.add');
        Route::post('subject/{id}', 'SubjectController@enrollRegisterStudentSubject')->name('enroll.store');
        Route::delete('subject/{id}', 'SubjectController@deleteEnrollStudent')->name('enroll.destroy');
    });

});