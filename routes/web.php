<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//Idea
Route::get('/idea','IdeaController@index')->name('idea.index');
Route::get('/idea/create','IdeaController@create')->name('idea.create');

Route::post('/idea','IdeaController@store')->name('idea.store');
//end of idea routes

//Tasks
Route::get('/tasks','UserTaskController@index')->name('usertask.index');
//EndOfTasks


Route::middleware(['secretary'])->group(function(){
 
    //Customer
Route::get('/customer','CustomerController@index')->name('customer.index');
Route::get('/customer/create','CustomerController@create')->name('customer.create');
Route::get('/customer/{id}/edit','CustomerController@edit')->name('customer.edit');
Route::post('/customer','CustomerController@store')->name('customer.store');
Route::put('/customer/{id}/update','CustomerController@update')->name('customer.update');
Route::delete('/customer/{id}','CustomerController@destroy')->name('customer.delete');
    
//OrderType
Route::get('/ordertype','OrderTypeController@index')->name('ordertype.index');
Route::get('/ordertype/create','OrderTypeController@create')->name('ordertype.create');
Route::get('/ordertype/{id}/edit','OrderTypeController@edit')->name('ordertype.edit');
Route::post('/ordertype','OrderTypeController@store')->name('ordertype.store');
Route::put('/ordertype/{id}/update','OrderTypeController@update')->name('ordertype.update');
Route::delete('/ordertype/{id}','OrderTypeController@destroy')->name('ordertype.delete');

//Orders
Route::get('/order','OrderController@index')->name('orders.index');
Route::get('/order/create','OrderController@create')->name('orders.create');
Route::get('/order/{id}/edit','OrderController@edit')->name('orders.edit');

Route::post('/order','OrderController@store')->name('orders.store');
Route::put('/order/{id}/update','OrderController@update')->name('orders.update');
Route::delete('/order/{id}','OrderController@destroy')->name('orders.delete');

//Accounts
Route::get('/account','AccountController@index')->name('accounts.index');
Route::get('/account/create','AccountController@create')->name('accounts.create');
Route::get('/account/{id}/edit','AccountController@edit')->name('accounts.edit');

Route::post('/account','AccountController@store')->name('accounts.store');
Route::put('/account/{id}/update','AccountController@update')->name('accounts.update');
Route::delete('/accouns/{id}','AccountController@destroy')->name('accounts.delete');


//payments
Route::get('/payment','PaymentController@index')->name('payments.index');
Route::get('/payment/create','PaymentController@create')->name('payments.create');
Route::get('/payment/{id}/edit','PaymentController@edit')->name('payments.edit');

Route::post('/payment','PaymentController@store')->name('payments.store');

Route::put('/payment/{id}/update','PaymentController@update')->name('payments.update');
Route::delete('/payment/{id}','PaymentController@destroy')->name('payments.delete');

}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
