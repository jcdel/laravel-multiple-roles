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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/** Admin Routes */
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/{id}', 'AdminController@show')->name('admin.show');
    Route::get('/create', 'AdminController@create')->name('admin.create');
    Route::get('/{id}/edit', 'AdminController@edit')->name('admin.edit');
    Route::post('/store', 'AdminController@store')->name('admin.store');
    Route::patch('/{id}', 'AdminController@update')->name('admin.update');
    Route::delete('/{id}', 'AdminController@destroy')->name('admin.destroy');
});

/** Teacher Routes */
Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
    Route::get('/', 'TeacherController@index')->name('teacher.index');
    Route::get('/{id}', 'TeacherController@show')->name('teacher.show');
    Route::get('/create', 'TeacherController@create')->name('teacher.create');
    Route::post('/store', 'TeacherController@store')->name('teacher.store');
    Route::get('/{id}/edit', 'TeacherController@edit')->name('teacher.edit');
});

/** Student Routes */
Route::group(['prefix' => 'student', 'middleware' => 'student'], function () {
    Route::get('/', 'StudentController@index')->name('student.index');
    Route::get('/{id}', 'StudentController@show')->name('student.show');
});
