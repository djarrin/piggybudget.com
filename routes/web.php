<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::post('/createSettings', 'HomeController@userSettingsCreate');
Route::post('/createIncome', 'HomeController@userIncomeCreate');
Route::post('/createExpense', 'HomeController@userExpensesCreate');
