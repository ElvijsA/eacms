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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {
  Route::resource('users', 'App\Http\Controllers\UserController');
  Route::resource('items', 'App\Http\Controllers\ItemController');
  Route::resource('projects', 'App\Http\Controllers\ProjectController');
  Route::get('projects/adduser/{id}',['as'=>'projects.adduser','uses'=>'App\Http\Controllers\ProjectController@adduser']);
  Route::patch('projects/add/{id}',['as'=>'projects.add','uses'=>'App\Http\Controllers\ProjectController@add']);
});
