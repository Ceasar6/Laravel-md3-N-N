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
//n-n
Route::middleware('CheckLogin')->prefix('students')->group(function (){
    Route::get('/','StudentController@index')->name('students.index');
    Route::get('/create','StudentController@showFormAdd')->name('students.create');
    Route::post('/create','StudentController@add')->name('students.add');
    Route::get('/update/{id}','StudentController@getId')->name('students.formUpdate');
    Route::post('/update/{id}','StudentController@update')->name('students.update');
    Route::get('/delete/{id}','StudentController@delete')->name('students.delete');

});
// Login
Route::get('/login', 'LoginController@showLogin')->name('show.login');
Route::post('/login', 'LoginController@login')->name('login');
Route::get('/logout', 'LoginController@logout')->name('logout');

//API
Route::prefix('github')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('/', 'Api\GithubController@index');
        Route::get('/search', 'Api\GithubController@search')->name('github.search');
    });
});


