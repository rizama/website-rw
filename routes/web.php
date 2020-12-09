<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('educations', 'EducationController')->middleware('auth');
Route::resource('jobs', 'JobController')->middleware('auth');
Route::resource('economics', 'EconomicController')->middleware('auth');
Route::resource('status', 'StatusCitizenController')->middleware('auth');
Route::resource('persons', 'PersonController')->middleware('auth');
