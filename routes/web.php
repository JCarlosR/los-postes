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
    Route::get('/cotizacion/{id}/eliminar', 'QuotationController@delete');

    //Order
    Route::get('/orden-compra', 'OrderController@index');
    Route::get('/orden-compra/crear', 'OrderController@create');
    Route::post('/orden-compra/crear', 'OrderController@store');
    Route::get('/orden-compra/{id}/editar', 'OrderController@edit');
    Route::post('/orden-compra/{id}/editar', 'OrderDetailController@store');
    Route::get('/orden-compra/{id}/detalles', 'OrderController@detail');
    Route::get('/orden-compra/{id}/eliminar', 'OrderController@delete');
});

Route::group(['middleware' => 'auth', 'namespace' => 'Sales'], function (){

    // Products
    Route::get('/productos', 'ProductController@index');
    Route::get('/productos/crear', 'ProductController@create');
    Route::post('/productos/crear', 'ProductController@store');
    Route::get('/productos/{id}/editar', 'ProductController@edit');
    Route::post('/productos/{id}/editar', 'ProductController@update');
    Route::get('/productos/{id}/eliminar', 'ProductController@delete');

    // Clients
    Route::get('/clientes', 'ClientController@index');
    Route::get('/clientes/crear', 'ClientController@create');
    Route::post('/clientes/crear', 'ClientController@store');
    Route::get('/clientes/{id}/editar', 'ClientController@edit');
    Route::post('/clientes/{id}/editar', 'ClientController@update');
    Route::get('/clientes/{id}/eliminar', 'ClientController@delete');

    //sales
    Route::get('/ventas', 'SaleController@index');
    Route::get('/ventas/crear', 'SaleController@create');
    Route::post('/ventas/crear', 'SaleController@store');
    Route::get('/ventas/{id}/editar', 'SaleController@edit');
    Route::post('/ventas/{id}/editar', 'SaleDetailController@store');
    Route::get('/ventas/{id}/detalles', 'SaleController@detail');
    Route::get('/ventas/{id}/eliminar', 'SaleController@delete');
});
