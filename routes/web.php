<?php
/*
Route::get('/', function () {
    return view('welcome');
});
*/

// De naam van de controller @naamvandefunctie
//Route::get('cards/{id}', 'CardsController@show');

Route::resource('cards','CardsController');

Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){
    Route::get('/', 'CardsController@index');

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

//if you visit cards/create URL, I'll reference a create method
//Route::get('/cards/create', 'CardsController@create');
//When we respond to a post request, trigger store
//Route::post('/cards', 'CardsController@store');






