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

Route::get('/', 'App\Http\Controllers\MainController@home');
Route::get('/service', 'App\Http\Controllers\MainController@service');
Route::get('/about', 'App\Http\Controllers\MainController@about');
Route::get('/faq', 'App\Http\Controllers\MainController@faq');
Route::get('/contacts', 'App\Http\Controllers\MainController@contacts');
Route::get('/review', 'App\Http\Controllers\MainController@review');
Route::post('/review/check', 'App\Http\Controllers\MainController@review_check');
Route::get('/task/list', 'App\Http\Controllers\TaskController@tasks');
Route::get('/task/new', 'App\Http\Controllers\TaskController@newTask');
Route::get('/task/{task}', 'App\Http\Controllers\TaskController@task');
Route::get('/task/edit/{task}', 'App\Http\Controllers\TaskController@editTask');
Route::get('/task/delete/{task}', 'App\Http\Controllers\TaskController@deleteTask');
