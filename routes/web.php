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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

    Route::get('client', 'ClientController@index');
    Route::get('client/create', 'ClientController@create');
    Route::get('client/edit/{id}', 'ClientController@edit')->name('client.edit');
    Route::put('client/update/{id}', 'ClientController@update');
    Route::post('client/store', 'ClientController@store');
    Route::delete('client/delete/{id}', 'ClientController@destroy')->name('client.destroy');

});
