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

Route::middleware(['auth'])->group(function () {
    Route::get('/task', 'TaskController@index')->name('task');
    Route::post('/task','TaskController@store')->name('task.store');
    Route::get('/task/{task}/done','TaskController@done')->name('task.done');
    Route::get('/task/{task}/undo','TaskController@undo')->name('task.undo');
    Route::get('/task/{task}/edit','TaskController@edit')->name('task.edit');
    Route::patch('/task/{task}','TaskController@update')->name('task.update');
    Route::delete('/task/{task}','TaskController@destroy')->name('task.delete');
});

Route::get('/home',function (){
    return redirect('/task');
});

