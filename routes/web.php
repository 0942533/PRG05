<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'CardController@index');

Route::resource('cards','CardController');

Route::post('search', 'DashboardController@search');
Route::post('search/filter', 'SearchController@dropdownfilter');

Route::get('favorite', 'FavoriteController@index');

Route::group(['middleware'=>['auth']], function(){
    Route::post('favorite/{cards}/add','FavoriteController@add')->name('cards.favorite');
});

Route::group(['middleware' => ['web','auth']], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});