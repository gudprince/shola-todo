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
    return redirect('todo'); 
});

Route::group(['prefix'  =>   'todo', 'middleware'=>'auth'], function() {

    Route::get('/', 'App\Http\Controllers\TodoController@index')->name('todo.index');
    Route::get('/create', 'App\Http\Controllers\TodoController@create')->name('todo.create');
    Route::post('/create', 'App\Http\Controllers\TodoController@save')->name('todo.save');
    Route::get('/edit/{id}', 'App\Http\Controllers\TodoController@edit')->name('todo.edit');
    Route::post('/update', 'App\Http\Controllers\TodoController@update')->name('todo.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\TodoController@delete')->name('todo.delete');
    Route::post('/complete-toggle', 'App\Http\Controllers\TodoController@toggle_complete')->name('todo.toggle');
});

Route::group(['prefix'  =>   'todo-group', 'middleware'=>'auth'], function() {

    Route::get('/', 'App\Http\Controllers\TodoGroupController@index')->name('todo.group.index');
    Route::get('/create', 'App\Http\Controllers\TodoGroupController@create')->name('todo.group.create');
    Route::post('/create', 'App\Http\Controllers\TodoGroupController@save')->name('todo.group.save');
    Route::get('/edit/{id}', 'App\Http\Controllers\TodoGroupController@edit')->name('todo.group.edit');
    Route::post('/update', 'App\Http\Controllers\TodoGroupController@update')->name('todo.group.update');
    Route::get('/delete/{id}', 'App\Http\Controllers\TodoGroupController@delete')->name('todo.group.delete');
    Route::get('/todo/{id}', 'App\Http\Controllers\TodoGroupController@todo')->name('todo.group.todo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
