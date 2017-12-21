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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'namespace' => 'Logistics'], function (){

    // Articles
    Route::get('/articulos', 'ArticleController@index');
    Route::get('/articulos/crear', 'ArticleController@create');
    Route::post('/articulos/crear', 'ArticleController@store');
    Route::get('/articulos/{id}/editar', 'ArticleController@edit');
    Route::post('/articulos/{id}/editar', 'ArticleController@update');
    Route::get('/articulos/{id}/eliminar', 'ArticleController@delete');

    //Quotations
    Route::get('/cotizacion', 'QuotationController@index');
    Route::get('/cotizacion/crear', 'QuotationController@create');
    Route::post('/cotizacion/crear', 'QuotationController@store');
    Route::get('/cotizacion/{id}/editar', 'QuotationController@edit');
    Route::post('/cotizacion/{id}/editar', 'QuotationDetailController@store');
    Route::get('/cotizacion/{id}/detalles', 'QuotationController@detail');
});
