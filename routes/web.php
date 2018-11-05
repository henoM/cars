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
Route::middleware('admin')->group(function () {
     Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
         Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

         Route::group(['prefix' => 'car','namespace' => 'Car'], function () {
             Route::get('/cars','CarController@index')->name('admin.cars');
             Route::get('/cars/create','CarController@create')->name('admin.cars.create');
             Route::post('/cars/store','CarController@store')->name('admin.car.store');
             Route::get('/car/delete{id}','CarController@delete')->name('admin.cars.delete');

         });
         Route::group(['prefix' => 'users','namespace' => 'User'], function () {
             Route::get('/users','UserController@index')->name('admin.users');
             Route::get('/add{id}','UserController@addCars')->name('admin.users.add_cars');
             Route::get('/user/delete{id}','UserController@delete')->name('admin.users.delete');
             Route::post('/cars/attach{id}','UserController@attach')->name('admin.car.attach');
         });
    });
});
Route::middleware('user')->group(function () {
     Route::group(['prefix' => 'user','namespace' => 'User'], function () {
         Route::get('/dashboard','UserController@index')->name('user.dashboard');
         Route::get('/car','UserController@getCar')->name('car');

    });
});
