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
});

//Dashboard
Route::group(['middleware' => ['web','auth']], function()
{
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

// EditProfile
Route::group(['middleware' => ['web','auth']], function() {
    Route::get('/editProfile','ProfileController@index');

    Route::post('/editProfile', 'ProfileController@store');
    Route::get('/editProfile/{id}', 'ProfileController@show')->name('editProfile.show');
    Route::put('/editProfile/{id}', 'ProfileController@update')->name('editProfile.update');

});

// Comments
Route::group(['middleware'=>['auth']], function(){
    Route::post('/cards/{card}/comments', 'CommentsController@store')->name('comments.store');
    Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
});