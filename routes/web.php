<?php

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

Route::get('/tasks', function () {
    $data=App\Task::all();
    return view('task')->with('task',$data);
});

Route::post('/saveTask','taskController@store');

Route::get('/markascompleted/{id}','taskController@updateTask');

Route::get('/markasnotcompleted/{id}','taskController@updateTaskAsNotCompleted');

Route::get('/deletetask/{id}','taskController@deleteTask');

Route::get('/updateTask/{id}','taskController@updateTaskContent');

Route::post('/updateTasks','taskController@updatetasks');