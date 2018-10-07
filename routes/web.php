<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// De naam van de controller @naamvandefunctie
Route::get('/', 'CardsController@index');
//Route::get('cards/{id}', 'CardsController@show');

Route::resource('cards','CardsController');

//if you visit cards/create URL, I'll reference a create method
//Route::get('/cards/create', 'CardsController@create');
//When we respond to a post request, trigger store
//Route::post('/cards', 'CardsController@store');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
