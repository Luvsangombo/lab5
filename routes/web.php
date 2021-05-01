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
Route::get('student', 'App\Http\Controllers\studentController@list_student');
Route::get('student/{id}','App\Http\Controllers\studentController@get_student');
Route::get('search', 'App\Http\Controllers\studentController@search');
Route::post('search', 'App\Http\Controllers\studentController@search_by_id');

Route::get('account', 'App\Http\Controllers\AccountController@index');
Route::get('account/{id}', 'App\Http\Controllers\TransactionController@list');
Route::get('transaction', function () {
    return view('transaction', );
});
Route::post('transaction', 'App\Http\Controllers\TransactionController@doTransaction');
Route::get('search_flight', function(){
    return view('search_flight');
});
Route::post('search_flight', 'App\Http\Controllers\FlightController@search');
Route::get('book/{id}', 'App\Http\Controllers\FlightController@order');
Route::post('book', 'App\Http\Controllers\FlightController@book')->name('book');
