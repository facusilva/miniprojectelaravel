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

/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('/', 'HomeController@getHome');

Route::group(['middleware' => 'auth'], function() {
    //DROPBOX
    Route::get('/', 'FileController@index')->name('files.index');
    Route::post('/files', 'FileController@store')->name('files.store');
    Route::delete('/files/{file}', 'FileController@destroy')->name('files.destroy');
    Route::get('/files/{file}/download', 'FileController@download')->name('files.download');

    // CATALOG
    Route::get('catalog', 'CatalogController@getIndex');
    Route::get('catalog/show/{id}', 'CatalogController@getShow');
    Route::get('catalog/create', 'CatalogController@getCreate');
    Route::post('catalog/create', 'CatalogController@postCreate');
    Route::get('catalog/edit/{id}', 'CatalogController@getEdit');
    Route::post('catalog/edit/{id}', 'CatalogController@putEdit');
    
    //HOME
    Route::get('/home', 'HomeController@index')->name('home');
});

//Route::get('/','HomeController@index');

Auth::routes();


