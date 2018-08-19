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



Auth::routes();

Route::get('/exam_controller',function (){

    return view('exam_controller/index');

});
/*this is for the exam test controller*/
Route::get('/home/test','TestController@index')->name('testHome');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@welcome')->name('welcome');
