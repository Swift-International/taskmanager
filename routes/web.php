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



Route::get('/', 'App\Http\Controllers\TaskController@index');
Route::get('/delete/{id}', 'App\Http\Controllers\TaskController@delete');
Route::post('/edittask','App\Http\Controllers\TaskController@edit')->name('edittask');
Route::post('/newtask','App\Http\Controllers\TaskController@save')->name('newtask');

Route::post('/livewire/message/task-table', 'App\Http\Controllers\TaskController@reorder')->name('taskreorder');