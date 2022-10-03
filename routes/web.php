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

Auth::routes();
Route::group(['middleware'=>'admin','namespace'=>"Admin",'prefix'=>'admin'],function (){
    Route::group(['namespace'=>"User"],function (){
        Route::get('/','IndexController')->name('admin');
        Route::get('/create','CreateController')->name('admin.user.create');
        Route::post('/users','StoreController')->name('admin.user.store');
        Route::post('/workday/user','StoreWorkdayController')->name('admin.workday.store');
        Route::get('/user/{user}','ShowController')->name('admin.user.show');
        Route::get('/user/{user}/edit','EditController')->name('admin.user.edit');
        Route::patch('/users/{user}','UpdateController')->name('admin.user.update');
        Route::delete('/user/{user}/delete','DestroyController')->name('admin.user.delete');
    });

    Route::group(['namespace'=>"client",'prefix'=>'client'],function (){
        Route::get('/','IndexController@index')->name('admin.client.index');
        Route::get('/create','CreateController@create')->name('admin.client.create');
        Route::post('/clients','StoreController@store')->name('admin.client.store');
    });
});


Route::get('/','welcomecontroller@index');

Route::group(['namespace'=>"User",'prefix'=>'user'],function (){
   Route::get('/','IndexController@index')->name('user');
   Route::get('/clients','ClientsController@index')->name('user.clients.index');
   Route::get('/{client}','EditController@edit')->name('user.clients.edit');
   Route::patch('/verification/{user}/update','UpdateController@update')->name('user.clients.update');
});
Route::group(['namespace'=>"Client",'prefix'=>'client'],function (){
    Route::get('/','IndexController@index')->name('client');
    Route::get('/user/{user}/{date}','ShowController@show')->name('client.user.show');
    Route::get('/admin/{user}','EditController@edit')->name('client.user.edit');
    Route::patch('/verification/{user}','UpdateController@update')->name('client.user.update');
});




