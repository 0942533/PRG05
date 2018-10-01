<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// De naam van de controller @naamvandefunctie
Route::get('/', 'CardsController@index');
Route::get('cards/{id}', 'CardsController@show');

//Route::resource('cards','CardsController');


