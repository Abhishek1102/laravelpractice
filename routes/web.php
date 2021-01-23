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


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/student/create','App\Http\Controllers\StudentsController@create');
Route::post('/students/store', 'App\Http\Controllers\StudentsController@store')->name('student_store');
Route::get('/student/{id?}', '\App\Http\Controllers\StudentsController@show');
Route::get('/student', '\App\Http\Controllers\StudentsController@index');
Route::get('/student/edit/{id}', '\App\Http\Controllers\StudentsController@edit');
Route::post('/student/{id}', '\App\Http\Controllers\StudentsController@update')->name('student_update');
