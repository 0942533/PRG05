<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'CardsController@index');

Route::resource('cards','CardsController');

Route::post('search', 'DashboardController@search');
Route::post('search/filter', 'SearchController@dropdownfilter');

Auth::routes();

Route::group(['middleware' => ['web','auth']], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});









