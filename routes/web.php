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

//-------------------Frontend Start------------------//
Route::group(['prefix'=>'', 'namespace' => 'Frontend'], function (){
    //Home
    Route::get('/', 'HomeController@home')->name('home');

});
//-------------------Frontend End------------------//


//-------------------Backend Start------------------//
Route::group(['prefix'=>'dashboard', 'namespace' => 'Backend'], function (){
    //Home
    Route::get('/', 'HomeController@home')->name('dashboard');

    Route::group(['prefix'=>'brands'],function (){
        Route::get('/','BrandController@index')->name('brands.index');
        Route::post('/create', 'BrandController@create')->name('brands.create');
    });
});
//-------------------Backend End------------------//
