<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/todo_show','App\Http\Controllers\TodoController@show');
Route::get('/todo_delete/{id}','App\Http\Controllers\TodoController@destroy');
Route::get('/todo_create','App\Http\Controllers\TodoController@create');
Route::post('/todo_submit','App\Http\Controllers\TodoController@store');
Route::get('/todo_edit/{id}','App\Http\Controllers\TodoController@edit');
Route::post('/todo_update/{id}','App\Http\Controllers\TodoController@update')->name('todo.update');
