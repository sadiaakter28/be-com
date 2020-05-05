<?php
use Illuminate\Support\Facades\Route;

//-------------------Frontend Start------------------//
Route::group(['prefix'=>'', 'namespace' => 'Frontend'], function (){
    //Home
    Route::get('/', 'HomeController@home')->name('home');

    //Auth
    Route::get('/registration', 'RegistrationController@index')->name('registration');
    Route::post('/registration/create', 'RegistrationController@create')->name('registration.create');

    Route::get('/login', 'LoginController@index')->name('login');
    Route::post('/login/create', 'LoginController@create')->name('login.create');

    Route::get('/logout', 'LoginController@logout')->name('logout');



});
//-------------------Frontend End------------------//


//-------------------Backend Start------------------//
Route::group(['prefix'=>'admin', 'namespace' => 'Backend'], function (){
    //Home
    Route::get('/', 'HomeController@home')->name('dashboard');
    //User
    Route::group(['prefix'=>'users'],function (){
        Route::get('/','UserController@index')->name('admin.users');
        Route::get('/create', 'UserController@create')->name('admin.users.create');
        Route::post('/store', 'UserController@store')->name('admin.users.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('admin.users.edit');
        Route::post('/update/{id}', 'UserController@update')->name('admin.users.update');
        Route::post('/delete/{id}', 'UserController@delete')->name('admin.users.delete');
    });
    //Brand
    Route::group(['prefix'=>'brands'],function (){
        Route::get('/','BrandController@index')->name('admin.brands.index');
        Route::get('/create', 'BrandController@create')->name('admin.brands.create');
        Route::post('/store', 'BrandController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('admin.brands.update');
        Route::post('/delete/{id}', 'BrandController@delete')->name('admin.brands.delete');
    });
    //categories
    Route::group(['prefix'=>'categories'],function (){
        Route::get('/','CategoriesController@index')->name('admin.categories');
        Route::get('/create', 'CategoriesController@create')->name('admin.categories.create');
        Route::post('/store', 'CategoriesController@store')->name('admin.categories.store');
        Route::get('/edit/{id}', 'CategoriesController@edit')->name('admin.categories.edit');
        Route::post('/update/{id}', 'CategoriesController@update')->name('admin.categories.update');
        Route::post('/delete/{id}', 'CategoriesController@delete')->name('admin.categories.delete');
    });
    //products
    Route::group(['prefix'=>'products'],function (){
        Route::get('/','ProductController@index')->name('admin.products');
        Route::get('/create', 'ProductController@create')->name('admin.products.create');
        Route::post('/store', 'ProductController@store')->name('admin.products.store');
        Route::get('/edit/{id}', 'ProductController@edit')->name('admin.products.edit');
        Route::post('/update/{id}', 'ProductController@update')->name('admin.products.update');
        Route::post('/delete/{id}', 'ProductController@delete')->name('admin.products.delete');
    });
});
//-------------------Backend End------------------//
