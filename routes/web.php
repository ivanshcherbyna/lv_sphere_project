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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('clients-panel','ClientsCRUD');

Route::resource('orders-panel','OrdersCRUD');

//Маршрут обработки роли авторизованного пользователя
/*Route::group(['middleware'=>'auth'],function(){
    Route::group(['middleware'=>'role:admin'],function()
    {
        Route::resource('profile','UserProfile');
    });
    Route::group(['middleware'=>'role:client'], function (){

    });


});*/