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


Route::group(['middleware'=>['auth']], function(){
    Route::post('favorite/add','FavoriteController@add')->name('cards.favorite');
    Route::resource('favorite', 'FavoriteController@index');
});

Route::group(['middleware' => ['web','auth']], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

// Comments
Route::group(['middleware'=>['auth']], function(){
    Route::post('/cards/{card}/comments', 'CommentsController@store')->name('comments.store');
    Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
});