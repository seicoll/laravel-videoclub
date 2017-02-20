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


Route::get('/', 'HomeController@getHome');

/* CATALOG */
Route::get('/catalog/', 'CatalogController@getIndex')->middleware('auth');
Route::get('/catalog/show/{id}', 'CatalogController@getShow')->middleware('auth');

// Crea una nova pel·lícula
Route::get('/catalog/create', 'CatalogController@getCreate')->middleware('auth');
Route::post('/catalog/create', 'CatalogController@postCreate')->middleware('auth');

// Edita una pel·lícula
Route::get('catalog/edit/{id}', 'CatalogController@getEdit')->middleware('auth');
Route::put('catalog/edit/{id}', 'CatalogController@putEdit')->middleware('auth');

// Elimina una pel·lícula
Route::delete('catalog/delete/{id}', 'CatalogController@deleteMovie')->middleware('auth');

/* LLOGAR */
Route::put('catalog/rent/{id}', 'CatalogController@putRent')->middleware('auth');
Route::put('catalog/return/{id}', 'CatalogController@putReturn')->middleware('auth');

/* FAVORITS */
Route::post('catalog/favourite/{id}', 'CatalogController@postFavourite')->middleware('auth');

/* CHAPTERS */
// Crea un nou capítol
Route::post('/chapter/create', 'ChapterController@postCreate')->middleware('auth');

// Afegides pel make:auth
Auth::routes();
Route::get('/home', 'HomeController@index')->middleware('auth');;
