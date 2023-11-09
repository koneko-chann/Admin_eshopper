<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function (){
    return redirect('admin');
});
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/create', [
            'as'=> 'categories.create',
            'uses'=>'App\Http\Controllers\CategoryController@create'
        ]);
        Route::get('/',[
            'as'=>'categories.index',
            'uses'=>'App\Http\Controllers\CategoryController@index'
        ]);
        Route::post('/store',[
            'as'=>'categories.store',
            'uses'=>'App\Http\Controllers\CategoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'categories.edit',
            'uses'=>'App\Http\Controllers\CategoryController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'categories.delete',
            'uses'=>'App\Http\Controllers\CategoryController@delete'
        ]);
        Route::post('/update/{id}',[
            'as'=>'categories.update',
            'uses'=>'App\Http\Controllers\CategoryController@update'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as'=> 'menus.index',
            'uses'=>'App\Http\Controllers\MenuController@index'
        ]);
        Route::get('/create', [
            'as'=> 'menus.create',
            'uses'=>'App\Http\Controllers\MenuController@create'
        ]);
        Route::post('/store',[
            'as'=>'menus.store',
            'uses'=>'App\Http\Controllers\MenuController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'menus.edit',
            'uses'=>'App\Http\Controllers\MenuController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'menus.delete',
            'uses'=>'App\Http\Controllers\MenuController@delete'
        ]);
        Route::post('/update/{id}',[
            'as'=>'menus.update',
            'uses'=>'App\Http\Controllers\MenuController@update'
        ]);
    });
    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as'=> 'product.index',
            'uses'=>'App\Http\Controllers\AdminProductController@index'
        ]);
        Route::get('/create', [
            'as'=> 'product.create',
            'uses'=>'App\Http\Controllers\AdminProductController@create'
        ]);
        Route::post('/store', [
            'as'=> 'product.store',
            'uses'=>'App\Http\Controllers\AdminProductController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'product.edit',
            'uses'=>'App\Http\Controllers\AdminProductController@edit'
        ]);
        Route::post('/update/{id}',[
            'as'=>'product.update',
            'uses'=>'App\Http\Controllers\AdminProductController@update'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'product.delete',
            'uses'=>'App\Http\Controllers\AdminProductController@delete'
        ]);

    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=> 'slider.index',
            'uses'=>'App\Http\Controllers\SliderAdminController@index'
        ]);
        Route::get('/create', [
            'as'=> 'slider.create',
            'uses'=>'App\Http\Controllers\SliderAdminController@create'
        ]);
        Route::post('/store',[
            'as'=>'slider.store',
            'uses'=>'App\Http\Controllers\SliderAdminController@store'
        ]);
        Route::get('/edit/{id}',[
            'as'=>'slider.edit',
            'uses'=>'App\Http\Controllers\SliderAdminController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as'=>'slider.delete',
            'uses'=>'App\Http\Controllers\SliderAdminController@delete'
        ]);
        Route::post('/update/{id}',[
            'as'=>'slider.update',
            'uses'=>'App\Http\Controllers\SliderAdminController@update'
        ]);
    });
});



