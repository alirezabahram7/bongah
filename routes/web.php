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

Route::get('/', function () {
    return view('homepage',['page'=> 'h']);
});
route::get('/login','xlogin@show')->name('show.login');

Auth::routes();

Route::get('/home', function () {
    return view('homepage',['page'=> 'h']);
})->name('home');

Route::get('/houses/{rors}','HouseController@show')->name('houses.show');

Route::get('/edithouse/{id}','HouseController@edit')->name('house.edit');

Route::get('/editpro/{id}','ProfileController@edit')->name('profile.edit');

Route::get('/profile/{id}','ProfileController@show')->name('profile.show');

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::post('/search','HouseController@search')->name('search.show');

Route::get('/agents','ProfileController@list')->name('agents.show');

Route::get('/addfav/{hid}','MarkedController@save')->name('fav.save');

Route::get('/destfav/{hid}','MarkedController@destroy')->name('fav.destroy');


Route::get('/favorites','HouseController@fav')->name('houses.fav');

Route::get('/inserthouses','HouseController@create');

Route::post('/addhouse','HouseController@store')->name('house.save');

Route::post('/updatehouse/{house}','HouseController@update')->name('house.update');

Route::post('/updateprofile','ProfileController@update')->name('profile.update');

Route::get('/housecard/{id}','HouseController@card')->name('house.card');

Route::get('/myhouses','HouseController@myhouses')->name('myhouses.show');

Route::get('/delhouse/{id}','HouseController@del')->name('house.delete');
Route::get('/delprofile/{id}','ProfileController@del')->name('profile.delete');


Route::get('/mapping','HouseController@map');

Route::get('/aboutus',function (){
    return view('pages.aboutus',['page'=>'ab']);
});