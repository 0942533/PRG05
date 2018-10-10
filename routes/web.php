<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'CardsController@index');

Route::resource('cards','CardsController');

Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/dashboard',function() {
        if(Auth::user()->admin == 0 ){
            return view('dashboard');
        }else{
            $users['users'] = \App\User::all();
            return view('admindashboard', $users);
        }
    });
});







