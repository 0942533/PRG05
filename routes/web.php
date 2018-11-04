<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'CardController@index');

Route::resource('cards','CardController');

// Search
Route::post('search', 'DashboardController@search');
Route::post('search/filter', 'SearchController@dropdownfilter');

// Favorite
Route::group(['middleware'=>['auth']], function(){
    Route::post('favorite/add','FavoriteController@add')->name('cards.favorite');
    Route::resource('favorites', 'ShowFavoriteController');
});

//Dashboard
Route::group(['middleware' => ['web','auth']], function()
{
    Route::post('/dashboard', 'DashboardController@store');
    Route::get('/dashboard/{id}', 'DashboardController@show')->name('dashboard.show');
    Route::put('/dashboard/{id}', 'DashboardController@update')->name('dashboard.update');
});

// Comments
Route::group(['middleware'=>['auth']], function(){
    Route::post('/cards/{card}/comments', 'CommentsController@store')->name('comments.store');
    Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
});