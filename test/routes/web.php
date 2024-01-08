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
Route::get('about','AboutController@index');
Route::get('contact','ContactController@index');
//view Route
Route::view('register','register');
Route::post('register/save','RegisterController@save')
    ->name('register.save');

Route::get('product', 'ProductController@index');
Route::post('product/sell','ProductController@sell');
Route::get('upload', 'UploadController@index');
Route::post('upload/save', 'UploadController@save');
Route::get('customer','CustomerController@index');
Route::get('customer/create','CustomerController@create');
Route::get('customer/search','CustomerController@search');
Route::get('customer/edit/{id}','CustomerController@edit');
Route::get('customer/delete/{id}','CustomerController@delete')
    ->name('customer.delete');
Route::post('customer/save','CustomerController@save');
Route::post('customer/update','CustomerController@update');

//Category route
Route::resource('category', 'CategoryController')
    ->except(['show', 'destroy']);
Route::get('category/delete/{id}','CategoryController@delete')
    ->name('category.delete');
Route::get('region', 'RegionController@index');
//login route

Route::get('login','LoginController@login')
    ->name('login');
Route::post('login/dologin','LoginController@do_login');
Route::get('logout','UserController@logout');
Route::resource('product','ProductController')->except(['destroy']);
Route::get('product/delete/{id}','ProductController@delete')->name('product.delete');
//users
Route::resource('user','UserController')->except(['destroy','show']);
Route::get('user/delete/{id}','UserController@delete')->name('user.delete');